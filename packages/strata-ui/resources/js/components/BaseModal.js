/**
 * Base Modal Component for Strata UI
 * 
 * Pure Alpine.js approach for smooth animations and simple state management
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { lockBodyScroll, unlockBodyScroll, extractComponentName } from '../utilities/dom.js';
import { storeFocus, createFocusTrap } from '../utilities/focus.js';
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

        show: false,
        name: config.name || null,
        dismissible: config.dismissible !== false,
        

        _restoreFocus: null,
        _focusTrap: null,
        
        /**
         * Modal-specific initialization
         */
        init() {

            this.show = false;
            

            this.setupEventListeners();
        },
        
        /**
         * Modal-specific cleanup
         */
        destroy() {

            if (this._focusTrap) {
                this._focusTrap();
                this._focusTrap = null;
            }
            

            if (this.show && this._restoreFocus) {
                this._restoreFocus();
            }
            

            unlockBodyScroll();
        },
        
        /**
         * Set up modal event listeners
         */
        setupEventListeners() {
            if (!this.name) return;
            

            const showCleanup = addEventListener(window, `strata-modal-show-${this.name}`, (event) => {
                this.showModal(event.detail);
            });
            

            const hideCleanup = addEventListener(window, `strata-modal-hide-${this.name}`, () => {
                this.hideModal();
            });
            

            const toggleCleanup = addEventListener(window, `strata-modal-toggle-${this.name}`, (event) => {
                this.toggleModal(event.detail);
            });
            

            const escapeCleanup = addEventListener(window, 'keydown', (event) => {
                if (event.key === 'Escape' && this.show && this.dismissible) {
                    this.hideModal();
                }
            });
            

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
            

            this._restoreFocus = storeFocus();
            

            lockBodyScroll();
            

            this.show = true;
            

            this.$nextTick(() => {
                this._focusTrap = createFocusTrap(this.$el);
            });
            

            this.dispatchComponentEvent(EVENTS.MODAL_OPENED, {
                name: this.name,
                data
            });
            

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
            

            this.show = false;
            

            if (this._focusTrap) {
                this._focusTrap();
                this._focusTrap = null;
            }
            

            unlockBodyScroll();
            

            if (this._restoreFocus) {
                this._restoreFocus();
                this._restoreFocus = null;
            }
            

            this.dispatchComponentEvent(EVENTS.MODAL_CLOSED, {
                name: this.name
            });
            
            this.dispatchComponentEvent(EVENTS.CLOSE);
            this.dispatchComponentEvent(EVENTS.CANCEL);
            

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

    const modals = document.querySelectorAll('[x-data*="strataModal"]');
    
    modals.forEach(modalEl => {
        const modalName = modalEl.getAttribute('data-modal-name');
        if (modalName) {

            dispatchGlobalEvent(`strata-modal-hide-${modalName}`);
        } else {

            if (modalEl.__x && modalEl.__x.$data && modalEl.__x.$data.hideModal) {
                modalEl.__x.$data.hideModal();
            }
        }
    });
    

    unlockBodyScroll();
}

export default {
    createBaseModal,
    closeAllModals
};