/**
 * Alpine.js Helper Utilities for Strata UI
 * 
 * Helper functions for working with Alpine.js
 */

/**
 * Check if Alpine.js is available globally
 * @returns {boolean} True if Alpine.js is loaded
 */
export function isAlpineAvailable() {
    return typeof window.Alpine !== 'undefined' && window.Alpine !== null;
}

/**
 * Get Alpine.js version if available
 * @returns {string|null} Alpine version or null
 */
export function getAlpineVersion() {
    return isAlpineAvailable() ? window.Alpine.version : null;
}

/**
 * Check if Alpine version is v3 or higher
 * @returns {boolean} True if v3+, false otherwise
 */
export function isAlpineV3OrHigher() {
    const version = getAlpineVersion();
    if (!version) return false;
    
    const majorVersion = parseInt(version.split('.')[0], 10);
    return majorVersion >= 3;
}

/**
 * Safely register Alpine plugins
 * @param {Object} Alpine - Alpine.js instance
 * @param {Object} plugins - Object mapping plugin names to plugin functions
 */
export function safePluginRegistration(Alpine, plugins) {
    if (!isAlpineV3OrHigher()) {
        console.warn('Strata UI: Alpine.js v3+ required for plugin registration');
        return;
    }
    
    Object.entries(plugins).forEach(([name, plugin]) => {
        try {
            // Check if plugin is already registered by looking for plugin markers
            if (Alpine[name] || (Alpine.directive && Alpine.directive[name])) {
                return; // Plugin already registered
            }
            
            Alpine.plugin(plugin);
        } catch (error) {
            console.warn(`Failed to register Alpine plugin '${name}':`, error);
        }
    });
}

/**
 * Register an Alpine component safely
 * @param {Object} Alpine - Alpine.js instance
 * @param {string} name - Component name
 * @param {Function} factory - Component factory function
 */
export function registerAlpineComponent(Alpine, name, factory) {
    if (!isAlpineAvailable()) {
        console.warn('Strata UI: Alpine.js not available for component registration');
        return;
    }
    
    try {
        Alpine.data(name, factory);
    } catch (error) {
        console.error(`Failed to register Alpine component '${name}':`, error);
    }
}

/**
 * Register multiple Alpine components
 * @param {Object} Alpine - Alpine.js instance
 * @param {Object} components - Object mapping component names to factory functions
 */
export function registerAlpineComponents(Alpine, components) {
    Object.entries(components).forEach(([name, factory]) => {
        registerAlpineComponent(Alpine, name, factory);
    });
}

/**
 * Register Alpine magic property safely
 * @param {Object} Alpine - Alpine.js instance
 * @param {string} name - Magic property name (without $)
 * @param {Function} factory - Magic property factory function
 */
export function registerAlpineMagic(Alpine, name, factory) {
    if (!isAlpineAvailable()) {
        console.warn('Strata UI: Alpine.js not available for magic property registration');
        return;
    }
    
    try {
        Alpine.magic(name, factory);
    } catch (error) {
        console.error(`Failed to register Alpine magic '${name}':`, error);
    }
}

/**
 * Wait for Alpine.js to be ready
 * @param {number} timeout - Timeout in milliseconds
 * @returns {Promise<Object>} Promise that resolves with Alpine instance
 */
export function waitForAlpine(timeout = 5000) {
    return new Promise((resolve, reject) => {
        if (isAlpineAvailable()) {
            resolve(window.Alpine);
            return;
        }
        
        let timeoutId;
        
        const checkAlpine = () => {
            if (isAlpineAvailable()) {
                clearTimeout(timeoutId);
                resolve(window.Alpine);
            }
        };
        
        // Listen for alpine:init event
        document.addEventListener('alpine:init', checkAlpine, { once: true });
        
        // Timeout fallback
        timeoutId = setTimeout(() => {
            document.removeEventListener('alpine:init', checkAlpine);
            reject(new Error('Alpine.js not available within timeout'));
        }, timeout);
        
        // Check immediately in case we missed the init event
        checkAlpine();
    });
}

/**
 * Create a component factory with standard initialization
 * @param {Function} componentFactory - Function that returns component config
 * @returns {Function} Enhanced component factory
 */
export function createComponentFactory(componentFactory) {
    return function(config = {}) {
        const componentConfig = componentFactory(config);
        
        // Add standard component lifecycle
        const originalInit = componentConfig.init || function() {};
        const originalDestroy = componentConfig.destroy || function() {};
        
        componentConfig.init = function() {
            // Standard initialization
            this._strataComponentName = componentConfig.name || 'unknown';
            this._strataInitialized = true;
            
            // Call original init
            originalInit.call(this);
            
            // Dispatch initialization event
            this.$dispatch('strata-component-init', { 
                component: this._strataComponentName 
            });
        };
        
        componentConfig.destroy = function() {
            // Call original destroy
            originalDestroy.call(this);
            
            // Dispatch destroy event
            this.$dispatch('strata-component-destroy', { 
                component: this._strataComponentName 
            });
            
            // Cleanup
            this._strataInitialized = false;
        };
        
        return componentConfig;
    };
}

/**
 * Check if an Alpine directive exists
 * @param {Object} Alpine - Alpine.js instance
 * @param {string} name - Directive name
 * @returns {boolean} True if directive exists
 */
export function hasAlpineDirective(Alpine, name) {
    return !!(Alpine.directive && Alpine.directive[name]);
}

/**
 * Check if an Alpine magic property exists
 * @param {Object} Alpine - Alpine.js instance
 * @param {string} name - Magic property name
 * @returns {boolean} True if magic property exists
 */
export function hasAlpineMagic(Alpine, name) {
    return !!(Alpine.magic && Alpine.magic[name]);
}

/**
 * Get Alpine component data from element
 * @param {Element} element - Element with x-data attribute
 * @returns {Object|null} Alpine component data or null
 */
export function getAlpineComponentData(element) {
    if (!element || !element.__x) return null;
    
    try {
        return element.__x.$data;
    } catch (error) {
        return null;
    }
}

/**
 * Check if element has Alpine component
 * @param {Element} element - Element to check
 * @param {string} componentName - Optional component name to check for
 * @returns {boolean} True if element has Alpine component
 */
export function hasAlpineComponent(element, componentName = null) {
    if (!element || !element.hasAttribute('x-data')) return false;
    
    if (componentName) {
        const xData = element.getAttribute('x-data');
        return xData && xData.includes(componentName);
    }
    
    return true;
}

/**
 * Initialize Alpine.js with Strata configuration
 * @param {Object} Alpine - Alpine.js instance to configure
 * @param {Object} config - Configuration options
 */
export function initializeAlpineForStrata(Alpine, config = {}) {
    // Configure Alpine for Strata UI
    if (config.prefix && Alpine.prefix) {
        Alpine.prefix(config.prefix);
    }
    
    // Set up error handling
    if (config.errorHandler) {
        Alpine.bind = new Proxy(Alpine.bind, {
            apply(target, thisArg, argumentsList) {
                try {
                    return target.apply(thisArg, argumentsList);
                } catch (error) {
                    config.errorHandler(error, 'alpine-bind');
                    return null;
                }
            }
        });
    }
    
    // Add development helpers
    if (config.development && typeof window !== 'undefined') {
        window.__STRATA_ALPINE__ = Alpine;
    }
}