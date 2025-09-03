/**
 * Base Accordion Component for Strata UI
 * 
 * Progressive enhancement approach using native <details>/<summary> elements
 * Enhanced with Alpine.js for advanced functionality and smooth animations
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { dispatchElementEvent, EVENTS } from '../utilities/events.js';
import { findAllFocusable, focusNext, focusPrevious } from '../utilities/focus.js';
import { openContent, closeContent, ANIMATION_DURATIONS } from '../utilities/animation.js';

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

        type: config.type || 'single',
        variant: config.variant || 'default',
        size: config.size || 'md',
        animated: config.animated !== false,
        iconPosition: config.iconPosition || 'end',
        disabled: config.disabled || false,


        openItems: [],
        accordionItems: [],


        _detailsListeners: [],
        _keyboardHandler: null,

        /**
         * Initialize accordion component
         */
        init() {

            baseComponent.init.call(this);


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
                

                this.dispatchComponentEvent(EVENTS.COMPONENT_READY, {
                    totalItems: this.accordionItems.length,
                    openItems: this.openItems
                });
                
                this.setupFocusManagement();
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

                if (this.animated) {
                    this.$el.setAttribute('data-animated', 'true');
                }


                if (this.type === 'single') {

                    const toggleHandler = (event) => {
                        if (item.disabled || this.disabled) {
                            event.preventDefault();
                            return;
                        }


                        setTimeout(() => {
                            const isOpen = item.element.open;
                            if (isOpen && this.type === 'single') {

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

                    const toggleHandler = (event) => {
                        if (item.disabled || this.disabled) {
                            event.preventDefault();
                            return;
                        }


                        setTimeout(() => {
                            this.syncStateFromDOM();
                        }, 0);
                    };

                    item.summary?.addEventListener('click', toggleHandler);
                    this.addCleanup(() => {
                        item.summary?.removeEventListener('click', toggleHandler);
                    });
                }


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
                        this.focusFirstItem();
                        break;
                    case 'End':
                        event.preventDefault();
                        this.focusLastItem();
                        break;
                    case 'Tab':
                        if (event.shiftKey) {
                            if (currentIndex === 0) {
                                return;
                            }
                        } else {
                            if (currentIndex === enabledItems.length - 1) {
                                return;
                            }
                        }
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
         * Focus a specific accordion item with fallback handling
         */
        focusItem(item) {
            if (item && item.summary && !item.disabled) {
                try {
                    item.summary.focus();
                } catch (e) {
                    console.warn('Failed to focus accordion item:', e);
                }
            }
        },

        /**
         * Focus the first focusable accordion item
         */
        focusFirstItem() {
            const firstEnabled = this.accordionItems.find(item => !item.disabled);
            if (firstEnabled) {
                this.focusItem(firstEnabled);
            }
        },

        /**
         * Focus the last focusable accordion item  
         */
        focusLastItem() {
            const enabledItems = this.accordionItems.filter(item => !item.disabled);
            const lastEnabled = enabledItems[enabledItems.length - 1];
            if (lastEnabled) {
                this.focusItem(lastEnabled);
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

                    this.animateClose(item, () => {
                        item.element.open = false;
                        this.openItems = [];
                        this.updateAriaStates();
                        this.dispatchChangeEvent(value, false);
                    });
                } else {

                    this.closeOtherItems(value);
                    this.animateOpen(item, () => {
                        item.element.open = true;
                        this.openItems = [value];
                        this.updateAriaStates();
                        this.dispatchChangeEvent(value, true);
                    });
                }
            } else {

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

                    item.element.open = false;
                    this.openItems = [];
                } else {

                    this.closeOtherItems(value);
                    item.element.open = true;
                    this.openItems = [value];
                }
            } else {

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
         * Animate accordion item opening using centralized utilities
         */
        animateOpen(item, callback) {
            const content = item.element.querySelector('[data-accordion-content]');
            if (!content) {
                callback();
                return;
            }

            item.element.open = true;
            
            if (content.getAttribute('x-collapse') !== null) {
                setTimeout(callback, this.getAnimationDuration());
            } else {
                openContent(content, {
                    duration: ANIMATION_DURATIONS.NORMAL
                }).then(callback);
            }
        },

        /**
         * Animate accordion item closing using centralized utilities
         */
        animateClose(item, callback) {
            const content = item.element.querySelector('[data-accordion-content]');
            if (!content) {
                callback();
                return;
            }

            if (content.getAttribute('x-collapse') !== null) {
                setTimeout(() => {
                    callback();
                }, this.getAnimationDuration());
            } else {
                closeContent(content, {
                    duration: ANIMATION_DURATIONS.NORMAL
                }).then(callback);
            }
        },

        /**
         * Get animation duration based on configuration
         */
        getAnimationDuration() {
            return this.animated ? ANIMATION_DURATIONS.SLOW : 0;
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
         * Set up additional focus management features
         */
        setupFocusManagement() {
            if (this.accordionItems.length === 0) return;
            
            const firstEnabledItem = this.accordionItems.find(item => !item.disabled);
            if (firstEnabledItem) {
                firstEnabledItem.summary?.setAttribute('tabindex', '0');
                
                this.accordionItems.forEach(item => {
                    if (item !== firstEnabledItem && item.summary) {
                        item.summary.setAttribute('tabindex', '-1');
                    }
                });
            }
        },

        /**
         * Component cleanup
         */
        destroy() {

            this.accordionItems = [];
            this.openItems = [];
            

            baseComponent.destroy.call(this);
        }
    });
}

export default {
    createAccordionComponent
};


window.strataAccordion = createAccordionComponent;