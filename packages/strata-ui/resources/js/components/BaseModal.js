/**
 * Base Modal Component for Strata UI
 * 
 * Pure Alpine.js approach for smooth animations and simple state management
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { lockBodyScroll, unlockBodyScroll, extractComponentName } from '../utilities/dom.js';
import { storeFocus } from '../utilities/focus.js';
import { dispatchGlobalEvent, addEventListener, EVENTS } from '../utilities/events.js';

/**
 * Create a base modal component using pure Alpine.js
 * @param {Object} config - Modal configuration
 * @returns {Object} Modal component configuration
 */
export function createBaseModal(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-modal'
    });
    
    return extendComponent(baseComponent, {
        // Modal state - controlled by Alpine
        show: false,
        name: config.name || null,
        dismissible: config.dismissible !== false,
        
        // Internal state
        _restoreFocus: null,
        
        /**
         * Modal-specific initialization
         */
        init() {
            // Modal starts hidden
            this.show = false;
            
            // Set up event listeners
            this.setupEventListeners();
        },
        
        /**
         * Modal-specific cleanup
         */
        destroy() {
            // Restore focus if modal was open
            if (this.show && this._restoreFocus) {
                this._restoreFocus();
            }
            
            // Ensure body scroll is unlocked
            unlockBodyScroll();
        },
        
        /**
         * Set up modal event listeners
         */
        setupEventListeners() {
            if (!this.name) return;
            
            // Listen for show events
            const showCleanup = addEventListener(window, `strata-modal-show-${this.name}`, (event) => {
                this.showModal(event.detail);
            });
            
            // Listen for hide events
            const hideCleanup = addEventListener(window, `strata-modal-hide-${this.name}`, () => {
                this.hideModal();
            });
            
            // Listen for toggle events
            const toggleCleanup = addEventListener(window, `strata-modal-toggle-${this.name}`, (event) => {
                this.toggleModal(event.detail);
            });
            
            // Listen for ESC key if dismissible
            const escapeCleanup = addEventListener(window, 'keydown', (event) => {
                if (event.key === 'Escape' && this.show && this.dismissible) {
                    this.hideModal();
                }
            });
            
            // Add all cleanup functions
            this.addCleanup(showCleanup);
            this.addCleanup(hideCleanup);
            this.addCleanup(toggleCleanup);
            this.addCleanup(escapeCleanup);
        },
        
        /**
         * Show the modal - Alpine handles all animations
         * @param {Object} data - Data passed with show event
         */
        showModal(data = {}) {
            if (this.show) return;
            
            // Store current focus for restoration
            this._restoreFocus = storeFocus();
            
            // Lock body scroll for better UX
            lockBodyScroll();
            
            // Set Alpine show state - Alpine handles all animations and transitions
            this.show = true;
            
            // Dispatch opened event
            this.dispatchComponentEvent(EVENTS.MODAL_OPENED, {
                name: this.name,
                data
            });
            
            // Also dispatch global event for other components to listen
            dispatchGlobalEvent(EVENTS.MODAL_OPENED, {
                name: this.name,
                data
            });
        },
        
        /**
         * Hide the modal - Alpine handles all animations  
         */
        hideModal() {
            if (!this.show) return;
            
            // Set Alpine show state - Alpine handles smooth closing animation
            this.show = false;
            
            // Unlock body scroll
            unlockBodyScroll();
            
            // Restore focus
            if (this._restoreFocus) {
                this._restoreFocus();
                this._restoreFocus = null;
            }
            
            // Dispatch events
            this.dispatchComponentEvent(EVENTS.MODAL_CLOSED, {
                name: this.name
            });
            
            this.dispatchComponentEvent(EVENTS.CLOSE);
            this.dispatchComponentEvent(EVENTS.CANCEL);
            
            // Global event
            dispatchGlobalEvent(EVENTS.MODAL_CLOSED, {
                name: this.name
            });
        },
        
        
        /**
         * Toggle modal visibility
         * @param {Object} data - Data passed with toggle event
         */
        toggleModal(data = {}) {
            if (this.show) {
                this.hideModal();
            } else {
                this.showModal(data);
            }
        },
        
        /**
         * Handle backdrop click (dismissible modals)
         */
        handleBackdropClick() {
            if (this.dismissible) {
                this.hideModal();
            }
        },
        
        /**
         * Confirm modal action (for confirmation modals)
         */
        confirm() {
            this.dispatchComponentEvent(EVENTS.CONFIRM, {
                name: this.name
            });
            this.hideModal();
        },
        
        /**
         * Cancel modal action
         */
        cancel() {
            this.dispatchComponentEvent(EVENTS.CANCEL, {
                name: this.name
            });
            this.hideModal();
        },
        
        
        /**
         * Get modal state information
         * @returns {Object}
         */
        getModalState() {
            return {
                show: this.show,
                name: this.name,
                dismissible: this.dismissible
            };
        }
    });
}

/**
 * Close all open modals using Alpine.js
 */
export function closeAllModals() {
    // Find all Strata modals (now div elements with Alpine.js)
    const modals = document.querySelectorAll('[x-data*="strataModal"]');
    
    modals.forEach(modalEl => {
        const modalName = modalEl.getAttribute('data-modal-name');
        if (modalName) {
            // Dispatch hide event for named modals
            dispatchGlobalEvent(`strata-modal-hide-${modalName}`);
        } else {
            // Fallback: try to call hideModal directly through Alpine
            if (modalEl.__x && modalEl.__x.$data && modalEl.__x.$data.hideModal) {
                modalEl.__x.$data.hideModal();
            }
        }
    });
    
    // Ensure body scroll is unlocked
    unlockBodyScroll();
}

export default {
    createBaseModal,
    closeAllModals
};