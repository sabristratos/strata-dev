/**
 * Livewire Integration Utilities for Strata UI
 * 
 * Helper functions for integrating with Livewire components
 */

/**
 * Check if Livewire is available globally
 * @returns {boolean} True if Livewire is loaded
 */
export function isLivewireAvailable() {
    return typeof window.Livewire !== 'undefined' && window.Livewire !== null;
}

/**
 * Check if an element has a wire:model attribute
 * @param {Element} element - Element to check
 * @returns {boolean} True if element has wire:model
 */
export function hasWireModel(element) {
    if (!element || !element.hasAttribute) return false;
    
    // Check for various wire:model patterns
    const wireModelPatterns = [
        'wire:model',
        'wire:model.defer',
        'wire:model.lazy',
        'wire:model.debounce',
        'wire:model.live'
    ];
    
    return wireModelPatterns.some(pattern => element.hasAttribute(pattern));
}

/**
 * Get the wire:model attribute value from an element
 * @param {Element} element - Element to check
 * @returns {string|null} Wire model property name or null
 */
export function getWireModel(element) {
    if (!element || !element.hasAttribute) return null;
    
    const wireModelPatterns = [
        'wire:model',
        'wire:model.defer', 
        'wire:model.lazy',
        'wire:model.debounce',
        'wire:model.live'
    ];
    
    for (const pattern of wireModelPatterns) {
        if (element.hasAttribute(pattern)) {
            return element.getAttribute(pattern);
        }
    }
    
    return null;
}

/**
 * Check if an element has wire:model with defer modifier
 * @param {Element} element - Element to check
 * @returns {boolean} True if using defer modifier
 */
export function isWireModelDeferred(element) {
    return element && (
        element.hasAttribute('wire:model.defer') ||
        element.hasAttribute('wire:model.lazy')
    );
}

/**
 * Check if an element has wire:model with live modifier
 * @param {Element} element - Element to check  
 * @returns {boolean} True if using live modifier
 */
export function isWireModelLive(element) {
    return element && (
        element.hasAttribute('wire:model.live') ||
        element.hasAttribute('wire:model.debounce')
    );
}

/**
 * Create a two-way binding between Alpine component and Livewire
 * @param {Object} alpineComponent - Alpine component instance (this context)
 * @param {string} property - Property name to bind
 * @param {Element} element - Element with wire:model
 * @returns {Function|null} Cleanup function or null if not applicable
 */
export function createLivewireBinding(alpineComponent, property, element) {
    if (!isLivewireAvailable() || !hasWireModel(element)) {
        return null;
    }
    
    const wireModelProperty = getWireModel(element);
    if (!wireModelProperty) return null;
    
    // Watch Alpine property and sync to Livewire
    const unwatchAlpine = alpineComponent.$watch(property, (value) => {
        if (alpineComponent.$wire) {
            alpineComponent.$wire.set(wireModelProperty, value);
        }
    });
    
    // Listen for Livewire updates and sync to Alpine
    let unwatchLivewire = null;
    if (alpineComponent.$wire && typeof alpineComponent.$wire.watch === 'function') {
        unwatchLivewire = alpineComponent.$wire.watch(wireModelProperty, (value) => {
            alpineComponent[property] = value;
        });
    }
    
    // Return cleanup function
    return function cleanup() {
        if (unwatchAlpine) unwatchAlpine();
        if (unwatchLivewire) unwatchLivewire();
    };
}

/**
 * Initialize Alpine component with Livewire integration
 * @param {Object} config - Component configuration
 * @param {string} property - Property name to bind (default: 'value')
 * @returns {Object} Alpine component configuration
 */
export function createLivewireAlpineComponent(config, property = 'value') {
    return {
        [property]: config.hasWireModel ? null : config[property],
        
        init() {
            // Handle Livewire entanglement
            if (config.hasWireModel && this.$wire) {
                // Set initial value from Livewire
                this[property] = config[property];
                
                // Create binding if element has wire:model
                if (hasWireModel(this.$el)) {
                    this._livewireCleanup = createLivewireBinding(this, property, this.$el);
                }
            }
            
            // Call original init if provided
            if (config.init) {
                config.init.call(this);
            }
        },
        
        destroy() {
            // Cleanup Livewire binding
            if (this._livewireCleanup) {
                this._livewireCleanup();
            }
            
            // Call original destroy if provided  
            if (config.destroy) {
                config.destroy.call(this);
            }
        }
    };
}

/**
 * Dispatch a Livewire event
 * @param {string} eventName - Event name
 * @param {Array} parameters - Event parameters
 * @returns {boolean} True if event was dispatched
 */
export function dispatchLivewireEvent(eventName, ...parameters) {
    if (!isLivewireAvailable()) return false;
    
    try {
        window.Livewire.dispatch(eventName, ...parameters);
        return true;
    } catch (error) {
        console.warn('Failed to dispatch Livewire event:', error);
        return false;
    }
}

/**
 * Get Livewire component instance from element
 * @param {Element} element - Element within Livewire component
 * @returns {Object|null} Livewire component instance or null
 */
export function getLivewireComponent(element) {
    if (!isLivewireAvailable() || !element) return null;
    
    try {
        return window.Livewire.find(element.closest('[wire\\:id]')?.getAttribute('wire:id'));
    } catch (error) {
        return null;
    }
}

/**
 * Check if current element is inside a Livewire component
 * @param {Element} element - Element to check
 * @returns {boolean} True if inside Livewire component
 */
export function isInsideLivewireComponent(element) {
    if (!element) return false;
    return !!element.closest('[wire\\:id]');
}

/**
 * Wait for Livewire to be ready
 * @param {number} timeout - Timeout in milliseconds
 * @returns {Promise<Object>} Promise that resolves with Livewire instance
 */
export function waitForLivewire(timeout = 5000) {
    return new Promise((resolve, reject) => {
        if (isLivewireAvailable()) {
            resolve(window.Livewire);
            return;
        }
        
        let timeoutId;
        
        const checkLivewire = () => {
            if (isLivewireAvailable()) {
                clearTimeout(timeoutId);
                resolve(window.Livewire);
            }
        };
        
        // Listen for livewire:init event
        document.addEventListener('livewire:init', checkLivewire, { once: true });
        
        // Timeout fallback
        timeoutId = setTimeout(() => {
            document.removeEventListener('livewire:init', checkLivewire);
            reject(new Error('Livewire not available within timeout'));
        }, timeout);
        
        // Check immediately in case we missed the init event
        checkLivewire();
    });
}