/**
 * Base Toast Component for Strata UI
 * 
 * Handles toast notifications with positioning, timing, and interactions
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { dispatchGlobalEvent, addEventListener, EVENTS } from '../utilities/events.js';
import { ANIMATION_DURATIONS } from '../utilities/animation.js';

/**
 * Create a toast group component
 * @param {Object} config - Toast group configuration
 * @returns {Object} Toast group component configuration
 */
export function createToastGroupComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-toast-group'
    });
    
    return extendComponent(baseComponent, {

        toasts: [],
        position: config.position || 'bottom-end',
        expanded: config.expanded || false,
        
        /**
         * Initialize toast group
         */
        init() {
            this.setupEventListeners();
        },
        
        /**
         * Set up event listeners for toast management
         */
        setupEventListeners() {

            const showCleanup = addEventListener(window, 'strata-toast-show', (event) => {
                this.addToast(event.detail);
            });
            
            this.addCleanup(showCleanup);
        },
        
        /**
         * Add a new toast to the group
         * @param {Object|string} detail - Toast configuration or message
         */
        addToast(detail) {
            const toast = {
                id: Date.now() + Math.random(),
                duration: detail.duration === 0 ? 0 : (detail.duration || window.strataUIConfig?.defaults?.toast_duration || ANIMATION_DURATIONS.EXTRA_SLOW * 10),
                message: typeof detail === 'string' ? detail : (detail.message || ''),
                title: detail.title || null,
                variant: detail.variant || 'info',
                icon: detail.icon || null,
                actions: detail.actions || null,
            };

            this.toasts.push(toast);
            

            this.dispatchComponentEvent(EVENTS.TOAST_ADDED, { toast });
        },
        
        /**
         * Remove a toast by ID
         * @param {string|number} toastId - ID of toast to remove
         */
        removeToast(toastId) {
            const index = this.toasts.findIndex(t => t.id === toastId);
            if (index > -1) {
                const removedToast = this.toasts.splice(index, 1)[0];
                this.dispatchComponentEvent(EVENTS.TOAST_REMOVED, { toast: removedToast });
            }
        },
        
        /**
         * Clear all toasts
         */
        clearAllToasts() {
            this.toasts = [];
            this.dispatchComponentEvent(EVENTS.TOAST_CLEARED);
        },
        
        /**
         * Handle toast action execution
         * @param {Object} action - Action configuration
         */
        handleAction(action) {

            if (typeof window[action.action] === 'function') {
                window[action.action]();
            } else {

                try {
                    new Function(action.action)();
                } catch (e) {
                    console.warn('Toast action failed to execute:', action.action, e);
                }
            }
            

            this.dispatchComponentEvent(EVENTS.TOAST_ACTION_EXECUTED, { action });
        },
        
    });
}

/**
 * Create an individual toast item component
 * @param {Object} config - Toast item configuration
 * @returns {Object} Toast item component configuration
 */
export function createToastItemComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-toast-item'
    });
    
    return extendComponent(baseComponent, {

        show: false,
        timer: null,
        toast: config.toast || {},
        position: config.position || 'bottom-end',
        
        /**
         * Initialize individual toast item
         */
        init() {

            this.$nextTick(() => {
                this.show = true;
                this.startTimer();
            });
        },
        
        /**
         * Start the auto-dismiss timer
         */
        startTimer() {
            if (this.toast.duration > 0) {
                this.timer = setTimeout(() => this.removeToast(), this.toast.duration);
            }
        },
        
        /**
         * Cancel the auto-dismiss timer
         */
        cancelTimer() {
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }
        },
        
        /**
         * Remove this toast with animation
         */
        removeToast() {
            this.show = false;
            setTimeout(() => {

                const toastGroup = this.findParentToastGroup();
                if (toastGroup && toastGroup.removeToast) {
                    toastGroup.removeToast(this.toast.id);
                }
            }, 200);
        },
        
        /**
         * Find parent toast group component
         * @returns {Object|null} Parent toast group component
         */
        findParentToastGroup() {
            let parent = this.$el.parentElement;
            while (parent) {
                if (parent.__x && parent.__x.$data && parent.__x.$data.toasts) {
                    return parent.__x.$data;
                }
                parent = parent.parentElement;
            }
            return null;
        },
        
        /**
         * Handle mouse enter - pause auto-dismiss
         */
        onMouseEnter() {
            this.cancelTimer();
        },
        
        /**
         * Handle mouse leave - resume auto-dismiss
         */
        onMouseLeave() {
            this.startTimer();
        },
        
        /**
         * Clean up timers when component is destroyed
         */
        destroy() {
            this.cancelTimer();
        }
    });
}

export default {
    createToastGroupComponent,
    createToastItemComponent
};