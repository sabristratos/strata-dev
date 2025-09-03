/**
 * Base Component for Strata UI Alpine Components
 * 
 * Provides common functionality and patterns for all Strata components
 */

import { hasWireModel, createLivewireBinding } from '../utilities/livewire.js';
import { dispatchElementEvent, EVENTS } from '../utilities/events.js';

/**
 * Create a base Strata component with common functionality
 * @param {Object} config - Component configuration
 * @returns {Object} Alpine component configuration
 */
export function createBaseComponent(config = {}) {
    return {

        _strataComponentName: config.componentName || 'strata-component',
        _strataInitialized: false,
        _strataCleanupFunctions: [],
        

        id: config.id || null,
        name: config.name || null,
        disabled: config.disabled || false,
        
        /**
         * Component initialization
         */
        init() {
            this._strataInitialized = true;
            

            if (!this.id && this.$el) {
                this.id = this.$el.id || `strata-${Math.random().toString(36).substr(2, 9)}`;
            }
            

            this.initializeLivewireBinding();
            

            if (config.init && typeof config.init === 'function') {
                config.init.call(this);
            }
            

            this.dispatchComponentEvent(EVENTS.COMPONENT_INIT);
        },
        
        /**
         * Component destruction cleanup
         */
        destroy() {

            if (config.destroy && typeof config.destroy === 'function') {
                config.destroy.call(this);
            }
            

            this._strataCleanupFunctions.forEach(cleanup => {
                try {
                    cleanup();
                } catch (error) {
                    console.warn('Error during component cleanup:', error);
                }
            });
            this._strataCleanupFunctions = [];
            

            this.dispatchComponentEvent(EVENTS.COMPONENT_DESTROY);
            
            this._strataInitialized = false;
        },
        
        /**
         * Initialize Livewire binding if element has wire:model
         */
        initializeLivewireBinding() {
            if (hasWireModel(this.$el) && config.bindProperty) {
                const cleanup = createLivewireBinding(this, config.bindProperty, this.$el);
                if (cleanup) {
                    this.addCleanup(cleanup);
                }
            }
        },
        
        /**
         * Add a cleanup function to be called on destroy
         * @param {Function} cleanupFn - Cleanup function
         */
        addCleanup(cleanupFn) {
            if (typeof cleanupFn === 'function') {
                this._strataCleanupFunctions.push(cleanupFn);
            }
        },
        
        /**
         * Dispatch a component-specific event
         * @param {string} eventName - Event name
         * @param {Object} detail - Event detail data
         */
        dispatchComponentEvent(eventName, detail = {}) {
            return dispatchElementEvent(this.$el, eventName, {
                component: this._strataComponentName,
                componentId: this.id,
                ...detail
            });
        },
        
        /**
         * Check if component is initialized
         * @returns {boolean}
         */
        isInitialized() {
            return this._strataInitialized;
        },
        
        /**
         * Get component information
         * @returns {Object} Component metadata
         */
        getComponentInfo() {
            return {
                name: this._strataComponentName,
                id: this.id,
                initialized: this._strataInitialized,
                disabled: this.disabled,
                element: this.$el
            };
        },
        
        /**
         * Enable the component
         */
        enable() {
            this.disabled = false;
            this.dispatchComponentEvent(EVENTS.CHANGE, { disabled: false });
        },
        
        /**
         * Disable the component
         */
        disable() {
            this.disabled = true;
            this.dispatchComponentEvent(EVENTS.CHANGE, { disabled: true });
        },
        
        /**
         * Toggle component disabled state
         */
        toggleDisabled() {
            if (this.disabled) {
                this.enable();
            } else {
                this.disable();
            }
        }
    };
}

/**
 * Extend base component with additional functionality
 * @param {Object} baseComponent - Base component configuration
 * @param {Object} extensions - Additional properties and methods
 * @returns {Object} Extended component configuration
 */
export function extendComponent(baseComponent, extensions) {

    const baseInit = baseComponent.init || function() {};
    const extendedInit = extensions.init || function() {};
    
    extensions.init = function() {
        baseInit.call(this);
        extendedInit.call(this);
    };
    

    const baseDestroy = baseComponent.destroy || function() {};
    const extendedDestroy = extensions.destroy || function() {};
    
    extensions.destroy = function() {
        extendedDestroy.call(this);
        baseDestroy.call(this);
    };
    
    return {
        ...baseComponent,
        ...extensions
    };
}

/**
 * Create a form component with standard form handling
 * @param {Object} config - Component configuration
 * @returns {Object} Form component configuration
 */
export function createFormComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        bindProperty: 'value' // Standard property for form components
    });
    
    return extendComponent(baseComponent, {

        value: config.hasWireModel ? null : (config.value ?? ''),
        required: config.required || false,
        readonly: config.readonly || false,
        placeholder: config.placeholder || '',
        
        /**
         * Update component value
         * @param {*} newValue - New value
         */
        setValue(newValue) {
            if (this.readonly || this.disabled) return;
            
            const oldValue = this.value;
            this.value = newValue;
            

            this.updateHiddenInput();
            

            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: newValue,
                oldValue: oldValue
            });
        },
        
        /**
         * Update hidden input value for form submission
         */
        updateHiddenInput() {
            const hiddenInput = this.$refs.hiddenInput;
            if (hiddenInput && !hasWireModel(this.$el)) {
                hiddenInput.value = this.value ?? '';
            }
        },
        
        /**
         * Clear component value
         */
        clearValue() {
            this.setValue(config.clearValue ?? '');
        },
        
        /**
         * Check if component has value
         * @returns {boolean}
         */
        hasValue() {
            return this.value !== null && this.value !== undefined && this.value !== '';
        },
        
        /**
         * Validate component value
         * @returns {boolean} True if valid
         */
        isValid() {
            if (this.required && !this.hasValue()) {
                return false;
            }
            

            if (config.validate && typeof config.validate === 'function') {
                return config.validate.call(this, this.value);
            }
            
            return true;
        }
    });
}

export default {
    createBaseComponent,
    extendComponent,
    createFormComponent
};