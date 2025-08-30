/**
 * Event Utilities for Strata UI
 * 
 * Consistent event creation and dispatching across components
 */

/**
 * Strata event name constants
 * Centralizes event naming to prevent typos and ensure consistency
 */
export const EVENTS = {
    // Modal events
    MODAL_OPENED: 'strata-modal-opened',
    MODAL_CLOSED: 'strata-modal-closed', 
    MODAL_SHOW: 'strata-modal-show',
    MODAL_HIDE: 'strata-modal-hide',
    MODAL_TOGGLE: 'strata-modal-toggle',
    
    // Toast events  
    TOAST_SHOW: 'strata-toast-show',
    TOAST_HIDE: 'strata-toast-hide',
    TOAST_DISMISS: 'strata-toast-dismiss',
    
    // Tab events
    TAB_CHANGE: 'strata-tab-change',
    TAB_ACTIVATED: 'strata-tab-activated',
    
    // Form events
    FORM_CHANGE: 'strata-form-change',
    FORM_SUBMIT: 'strata-form-submit',
    FORM_RESET: 'strata-form-reset',
    
    // Generic component events
    COMPONENT_INIT: 'strata-component-init',
    COMPONENT_DESTROY: 'strata-component-destroy',
    
    // Common interaction events
    CHANGE: 'change',
    CLOSE: 'close',
    CANCEL: 'cancel',
    CONFIRM: 'confirm'
};

/**
 * Create a standardized Strata custom event
 * @param {string} eventName - Name of the event
 * @param {Object} detail - Event detail data
 * @param {Object} options - Additional event options
 * @returns {CustomEvent} Created custom event
 */
export function createStrataEvent(eventName, detail = {}, options = {}) {
    return new CustomEvent(eventName, {
        detail,
        bubbles: true,
        composed: true,
        cancelable: true,
        ...options
    });
}

/**
 * Dispatch a custom event on the global window
 * @param {string} eventName - Name of the event
 * @param {Object} detail - Event detail data
 * @param {Object} options - Additional event options
 * @returns {boolean} False if event was cancelled, true otherwise
 */
export function dispatchGlobalEvent(eventName, detail = {}, options = {}) {
    const event = createStrataEvent(eventName, detail, options);
    return window.dispatchEvent(event);
}

/**
 * Dispatch a custom event on a specific element
 * @param {Element} element - Target element
 * @param {string} eventName - Name of the event
 * @param {Object} detail - Event detail data
 * @param {Object} options - Additional event options
 * @returns {boolean} False if event was cancelled, true otherwise
 */
export function dispatchElementEvent(element, eventName, detail = {}, options = {}) {
    const event = createStrataEvent(eventName, detail, options);
    return element.dispatchEvent(event);
}

/**
 * Create a modal-specific event name with component name
 * @param {string} action - Action (show, hide, toggle)
 * @param {string} modalName - Name of the modal
 * @returns {string} Formatted event name
 */
export function createModalEventName(action, modalName) {
    return `strata-modal-${action}-${modalName}`;
}

/**
 * Dispatch a modal event
 * @param {string} action - Modal action (show, hide, toggle)
 * @param {string} modalName - Name of the modal
 * @param {Object} data - Event data
 * @returns {boolean} False if event was cancelled, true otherwise
 */
export function dispatchModalEvent(action, modalName, data = {}) {
    const eventName = createModalEventName(action, modalName);
    return dispatchGlobalEvent(eventName, data);
}

/**
 * Dispatch a toast event
 * @param {string} action - Toast action (show, hide, dismiss)
 * @param {Object} data - Toast data
 * @returns {boolean} False if event was cancelled, true otherwise
 */
export function dispatchToastEvent(action = 'show', data = {}) {
    const eventName = `strata-toast-${action}`;
    return dispatchGlobalEvent(eventName, data);
}

/**
 * Create an event listener with automatic cleanup
 * @param {Element|Window} target - Event target
 * @param {string} eventName - Event name
 * @param {Function} handler - Event handler
 * @param {Object} options - Event listener options
 * @returns {Function} Cleanup function to remove the listener
 */
export function addEventListener(target, eventName, handler, options = {}) {
    target.addEventListener(eventName, handler, options);
    
    return function removeEventListener() {
        target.removeEventListener(eventName, handler, options);
    };
}

/**
 * Add multiple event listeners with single cleanup function
 * @param {Array} listeners - Array of [target, eventName, handler, options] arrays
 * @returns {Function} Cleanup function to remove all listeners
 */
export function addEventListeners(listeners) {
    const cleanupFunctions = listeners.map(([target, eventName, handler, options]) => {
        return addEventListener(target, eventName, handler, options);
    });
    
    return function removeAllEventListeners() {
        cleanupFunctions.forEach(cleanup => cleanup());
    };
}

/**
 * Create a debounced event dispatcher
 * @param {Function} dispatcher - Event dispatching function
 * @param {number} delay - Debounce delay in milliseconds
 * @returns {Function} Debounced dispatcher function
 */
export function createDebouncedDispatcher(dispatcher, delay = 300) {
    let timeoutId;
    
    return function debouncedDispatch(...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            dispatcher(...args);
        }, delay);
    };
}

/**
 * Wait for a specific event to be dispatched
 * @param {Element|Window} target - Event target
 * @param {string} eventName - Event name to wait for
 * @param {number} timeout - Timeout in milliseconds (default: 5000)
 * @returns {Promise<CustomEvent>} Promise that resolves with the event
 */
export function waitForEvent(target, eventName, timeout = 5000) {
    return new Promise((resolve, reject) => {
        let timeoutId;
        
        const cleanup = addEventListener(target, eventName, (event) => {
            clearTimeout(timeoutId);
            cleanup();
            resolve(event);
        });
        
        timeoutId = setTimeout(() => {
            cleanup();
            reject(new Error(`Event '${eventName}' not received within ${timeout}ms`));
        }, timeout);
    });
}