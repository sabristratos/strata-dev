/**
 * Base Accordion Component for Strata UI
 * 
 * Progressive enhancement approach using native <details>/<summary> elements
 * Enhanced with Alpine.js for advanced functionality and smooth animations
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { dispatchElementEvent, EVENTS } from '../utilities/events.js';

/**
 * Create a Strata Accordion component
 * @param {Object} config - Component configuration
 * @returns {Object} Alpine component configuration
 */
export function createAccordionComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-accordion',
        bindProperty: 'openItems'
    });

    return extendComponent(baseComponent, {
        // Configuration
        type: config.type || 'single',
        variant: config.variant || 'default',
        size: config.size || 'md',
        animated: config.animated !== false,
        iconPosition: config.iconPosition || 'end',
        disabled: config.disabled || false,

        // State management
        openItems: [],
        accordionItems: [],

        // Event listener cleanup
        _detailsListeners: [],
        _keyboardHandler: null,

        /**
         * Initialize accordion component
         */
        init() {
            // Call base component init
            baseComponent.init.call(this);

            // Set initial open items from config
            if (config.defaultValue !== null && config.defaultValue !== undefined) {
                if (this.type === 'single') {
                    this.openItems = typeof config.defaultValue === 'string' ? [config.defaultValue] : [];
                } else {
                    this.openItems = Array.isArray(config.defaultValue) ? config.defaultValue : [config.defaultValue];
                }
            }

            this.$nextTick(() => {
                this.discoverAccordionItems();
                this.enhanceNativeElements();
                this.setupKeyboardNavigation();
                this.updateItemStates();
                
                // Dispatch ready event
                this.dispatchComponentEvent(EVENTS.COMPONENT_READY, {
                    totalItems: this.accordionItems.length,
                    openItems: this.openItems
                });
            });
        },

        /**
         * Discover accordion items (native details elements)
         */
        discoverAccordionItems() {
            const detailsElements = this.$el.querySelectorAll('details[data-accordion-item]');
            
            this.accordionItems = Array.from(detailsElements).map(element => {
                const summary = element.querySelector('summary');
                return {
                    element: element,
                    summary: summary,
                    value: element.dataset.accordionItem,
                    disabled: element.hasAttribute('data-disabled') || (summary && summary.hasAttribute('disabled'))
                };
            });
        },

        /**
         * Enhance native details elements with Alpine.js functionality and smooth animations
         */
        enhanceNativeElements() {
            this.accordionItems.forEach(item => {
                // Add animation class to accordion container if animated
                if (this.animated) {
                    this.$el.setAttribute('data-animated', 'true');
                }

                // Override default details behavior for single mode
                if (this.type === 'single') {
                    // Prevent native toggle for single mode with animation support
                    const toggleHandler = (event) => {
                        if (item.disabled || this.disabled) {
                            event.preventDefault();
                            return;
                        }

                        // Always allow native behavior, then handle additional logic
                        setTimeout(() => {
                            const isOpen = item.element.open;
                            if (isOpen && this.type === 'single') {
                                // Close other items in single mode
                                this.closeOtherItems(item.value);
                            }
                            this.syncStateFromDOM();
                        }, 0);
                    };

                    item.summary?.addEventListener('click', toggleHandler);
                    this.addCleanup(() => {
                        item.summary?.removeEventListener('click', toggleHandler);
                    });
                } else {
                    // For multiple mode, handle both animated and non-animated
                    const toggleHandler = (event) => {
                        if (item.disabled || this.disabled) {
                            event.preventDefault();
                            return;
                        }

                        // Always allow native behavior for multiple mode
                        setTimeout(() => {
                            this.syncStateFromDOM();
                        }, 0);
                    };

                    item.summary?.addEventListener('click', toggleHandler);
                    this.addCleanup(() => {
                        item.summary?.removeEventListener('click', toggleHandler);
                    });
                }

                // Setup ARIA attributes
                this.setupAriaAttributes(item);
            });
        },

        /**
         * Setup ARIA attributes for accessibility
         */
        setupAriaAttributes(item) {
            const accordionId = this.id || 'accordion';
            const triggerId = `${accordionId}-trigger-${item.value}`;
            const contentId = `${accordionId}-content-${item.value}`;

            if (item.summary) {
                item.summary.id = triggerId;
                item.summary.setAttribute('aria-controls', contentId);
                item.summary.setAttribute('aria-expanded', item.element.open ? 'true' : 'false');
            }

            const content = item.element.querySelector('[data-accordion-content]');
            if (content) {
                content.id = contentId;
                content.setAttribute('aria-labelledby', triggerId);
            }
        },

        /**
         * Setup enhanced keyboard navigation
         */
        setupKeyboardNavigation() {
            this._keyboardHandler = (event) => {
                const activeElement = document.activeElement;
                const currentItem = this.accordionItems.find(item => 
                    item.summary === activeElement
                );

                if (!currentItem) return;

                let handled = true;
                const enabledItems = this.accordionItems.filter(item => !item.disabled);
                const currentIndex = enabledItems.findIndex(item => item.value === currentItem.value);

                switch (event.key) {
                    case 'ArrowDown':
                        event.preventDefault();
                        this.focusItem(enabledItems[(currentIndex + 1) % enabledItems.length]);
                        break;
                    case 'ArrowUp':
                        event.preventDefault();
                        this.focusItem(enabledItems[(currentIndex - 1 + enabledItems.length) % enabledItems.length]);
                        break;
                    case 'Home':
                        event.preventDefault();
                        this.focusItem(enabledItems[0]);
                        break;
                    case 'End':
                        event.preventDefault();
                        this.focusItem(enabledItems[enabledItems.length - 1]);
                        break;
                    case 'Enter':
                    case ' ':
                        event.preventDefault();
                        this.toggleItem(currentItem.value);
                        break;
                    default:
                        handled = false;
                }
            };

            this.$el.addEventListener('keydown', this._keyboardHandler);
            this.addCleanup(() => {
                this.$el.removeEventListener('keydown', this._keyboardHandler);
            });
        },

        /**
         * Focus a specific accordion item
         */
        focusItem(item) {
            if (item && item.summary && !item.disabled) {
                item.summary.focus();
            }
        },

        /**
         * Toggle an accordion item with animation support
         */
        animatedToggleItem(value) {
            if (this.disabled) return;

            const item = this.accordionItems.find(item => item.value === value);
            if (!item || item.disabled) return;

            const isCurrentlyOpen = item.element.open;
            const animationDuration = this.getAnimationDuration();
            
            if (this.type === 'single') {
                if (isCurrentlyOpen) {
                    // Animate close current item
                    this.animateClose(item, () => {
                        item.element.open = false;
                        this.openItems = [];
                        this.updateAriaStates();
                        this.dispatchChangeEvent(value, false);
                    });
                } else {
                    // Close other items first, then open this one
                    this.closeOtherItems(value);
                    this.animateOpen(item, () => {
                        item.element.open = true;
                        this.openItems = [value];
                        this.updateAriaStates();
                        this.dispatchChangeEvent(value, true);
                    });
                }
            } else {
                // Multiple mode
                if (isCurrentlyOpen) {
                    this.animateClose(item, () => {
                        item.element.open = false;
                        this.openItems = this.openItems.filter(openItem => openItem !== value);
                        this.updateAriaStates();
                        this.dispatchChangeEvent(value, false);
                    });
                } else {
                    this.animateOpen(item, () => {
                        item.element.open = true;
                        this.openItems = [...this.openItems, value];
                        this.updateAriaStates();
                        this.dispatchChangeEvent(value, true);
                    });
                }
            }
        },

        /**
         * Toggle an accordion item (legacy method for non-animated)
         */
        toggleItem(value) {
            if (this.animated) {
                return this.animatedToggleItem(value);
            }

            if (this.disabled) return;

            const item = this.accordionItems.find(item => item.value === value);
            if (!item || item.disabled) return;

            const isCurrentlyOpen = item.element.open;
            
            if (this.type === 'single') {
                if (isCurrentlyOpen) {
                    // Close current item
                    item.element.open = false;
                    this.openItems = [];
                } else {
                    // Close all other items and open this one
                    this.closeOtherItems(value);
                    item.element.open = true;
                    this.openItems = [value];
                }
            } else {
                // Multiple mode
                item.element.open = !isCurrentlyOpen;
                if (isCurrentlyOpen) {
                    this.openItems = this.openItems.filter(item => item !== value);
                } else {
                    this.openItems = [...this.openItems, value];
                }
            }

            this.updateAriaStates();
            this.dispatchChangeEvent(value, !isCurrentlyOpen);
        },

        /**
         * Animate accordion item opening
         */
        animateOpen(item, callback) {
            const content = item.element.querySelector('[data-accordion-content]');
            if (!content) {
                callback();
                return;
            }

            // Set up the opening animation
            item.element.open = true;
            
            // Use Alpine.js collapse functionality if available, otherwise fallback
            if (content.getAttribute('x-collapse') !== null) {
                // Let Alpine.js handle the animation
                setTimeout(callback, this.getAnimationDuration());
            } else {
                // Fallback animation
                content.style.opacity = '0';
                content.style.transform = 'translateY(-8px)';
                
                requestAnimationFrame(() => {
                    content.style.transition = 'opacity 200ms ease-out, transform 200ms ease-out';
                    content.style.opacity = '1';
                    content.style.transform = 'translateY(0)';
                    
                    setTimeout(() => {
                        content.style.transition = '';
                        callback();
                    }, 200);
                });
            }
        },

        /**
         * Animate accordion item closing
         */
        animateClose(item, callback) {
            const content = item.element.querySelector('[data-accordion-content]');
            if (!content) {
                callback();
                return;
            }

            // Use Alpine.js collapse functionality if available, otherwise fallback
            if (content.getAttribute('x-collapse') !== null) {
                // Let Alpine.js handle the animation
                setTimeout(() => {
                    callback();
                }, this.getAnimationDuration());
            } else {
                // Fallback animation
                content.style.transition = 'opacity 200ms ease-out, transform 200ms ease-out';
                content.style.opacity = '0';
                content.style.transform = 'translateY(-8px)';
                
                setTimeout(() => {
                    content.style.transition = '';
                    callback();
                }, 200);
            }
        },

        /**
         * Get animation duration based on configuration
         */
        getAnimationDuration() {
            return this.animated ? 300 : 0;
        },

        /**
         * Open an accordion item
         */
        openItem(value) {
            const item = this.accordionItems.find(item => item.value === value);
            if (!item || item.disabled || item.element.open) return;

            if (this.type === 'single') {
                this.closeOtherItems(value);
                this.openItems = [value];
            } else {
                this.openItems = [...this.openItems, value];
            }

            item.element.open = true;
            this.updateAriaStates();
            this.dispatchChangeEvent(value, true);
        },

        /**
         * Close an accordion item
         */
        closeItem(value) {
            const item = this.accordionItems.find(item => item.value === value);
            if (!item || !item.element.open) return;

            item.element.open = false;
            this.openItems = this.openItems.filter(item => item !== value);
            this.updateAriaStates();
            this.dispatchChangeEvent(value, false);
        },

        /**
         * Close all other items (for single mode)
         */
        closeOtherItems(exceptValue) {
            this.accordionItems.forEach(item => {
                if (item.value !== exceptValue && item.element.open) {
                    item.element.open = false;
                }
            });
        },


        /**
         * Sync internal state with DOM state
         */
        syncStateFromDOM() {
            this.openItems = this.accordionItems
                .filter(item => item.element.open)
                .map(item => item.value);
            
            this.updateAriaStates();
        },

        /**
         * Update item states based on open items
         */
        updateItemStates() {
            this.accordionItems.forEach(item => {
                const shouldBeOpen = this.openItems.includes(item.value);
                if (item.element.open !== shouldBeOpen) {
                    item.element.open = shouldBeOpen;
                }
            });
            this.updateAriaStates();
        },

        /**
         * Update ARIA states for accessibility
         */
        updateAriaStates() {
            this.accordionItems.forEach(item => {
                if (item.summary) {
                    item.summary.setAttribute('aria-expanded', item.element.open ? 'true' : 'false');
                }
            });
        },

        /**
         * Check if an item is open
         */
        isItemOpen(value) {
            return this.openItems.includes(value);
        },

        /**
         * Get all open items
         */
        getOpenItems() {
            return [...this.openItems];
        },


        /**
         * Dispatch change events
         */
        dispatchChangeEvent(value, isOpen) {
            this.dispatchComponentEvent(EVENTS.CHANGE, {
                value: value,
                isOpen: isOpen,
                openItems: this.getOpenItems(),
                type: this.type
            });

        },

        /**
         * Component cleanup
         */
        destroy() {
            // Base component cleanup will handle most cleanup
            this.accordionItems = [];
            this.openItems = [];
            
            // Call base component destroy
            baseComponent.destroy.call(this);
        }
    });
}

export default {
    createAccordionComponent
};

// Global registration for template access
window.strataAccordion = createAccordionComponent;