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

    MODAL_OPENED: 'strata-modal-opened',
    MODAL_CLOSED: 'strata-modal-closed', 
    MODAL_SHOW: 'strata-modal-show',
    MODAL_HIDE: 'strata-modal-hide',
    MODAL_TOGGLE: 'strata-modal-toggle',
    

    TOAST_SHOW: 'strata-toast-show',
    TOAST_HIDE: 'strata-toast-hide',
    TOAST_DISMISS: 'strata-toast-dismiss',
    TOAST_ADDED: 'strata-toast-added',
    TOAST_REMOVED: 'strata-toast-removed',
    TOAST_CLEARED: 'strata-toast-cleared',
    TOAST_ACTION_EXECUTED: 'strata-toast-action-executed',
    

    TAB_CHANGE: 'strata-tab-change',
    TAB_ACTIVATED: 'strata-tab-activated',
    

    RATING_CHANGE: 'strata-rating-change',
    RATING_CLEARED: 'strata-rating-cleared',
    

    VIDEO_READY: 'strata-video-ready',
    VIDEO_PLAY: 'strata-video-play',
    VIDEO_PAUSE: 'strata-video-pause',
    VIDEO_MUTE_TOGGLE: 'strata-video-mute-toggle',
    VIDEO_TIME_UPDATE: 'strata-video-time-update',
    VIDEO_VOLUME_CHANGE: 'strata-video-volume-change',
    VIDEO_SEEK: 'strata-video-seek',
    VIDEO_FULLSCREEN_CHANGE: 'strata-video-fullscreen-change',
    VIDEO_FULLSCREEN_ENTER: 'strata-video-fullscreen-enter',
    VIDEO_FULLSCREEN_EXIT: 'strata-video-fullscreen-exit',
    VIDEO_SPEED_CHANGE: 'strata-video-speed-change',
    VIDEO_ENDED: 'strata-video-ended',
    VIDEO_ERROR: 'strata-video-error',
    VIDEO_LOADING: 'strata-video-loading',
    VIDEO_LOADED: 'strata-video-loaded',
    VIDEO_SOURCE_CHANGE: 'strata-video-source-change',
    

    CAROUSEL_SLIDE_CHANGE: 'strata-carousel-slide-change',
    CAROUSEL_NEXT: 'strata-carousel-next',
    CAROUSEL_PREVIOUS: 'strata-carousel-previous',
    CAROUSEL_AUTOPLAY_START: 'strata-carousel-autoplay-start',
    CAROUSEL_AUTOPLAY_STOP: 'strata-carousel-autoplay-stop',
    CAROUSEL_AUTOPLAY_PAUSE: 'strata-carousel-autoplay-pause',
    CAROUSEL_AUTOPLAY_RESUME: 'strata-carousel-autoplay-resume',
    CAROUSEL_READY: 'strata-carousel-ready',
    

    ACCORDION_ITEM_TOGGLE: 'strata-accordion-item-toggle',
    ACCORDION_ITEM_OPENED: 'strata-accordion-item-opened',
    ACCORDION_ITEM_CLOSED: 'strata-accordion-item-closed',
    

    SELECT_OPTION_CHANGE: 'strata-select-option-change',
    SELECT_OPENED: 'strata-select-opened',
    SELECT_CLOSED: 'strata-select-closed',
    

    FORM_CHANGE: 'strata-form-change',
    FORM_SUBMIT: 'strata-form-submit',
    FORM_RESET: 'strata-form-reset',
    

    COMPONENT_INIT: 'strata-component-init',
    COMPONENT_DESTROY: 'strata-component-destroy',
    

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