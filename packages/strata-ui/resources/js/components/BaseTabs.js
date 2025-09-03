/**
 * Base Tabs Component for Strata UI
 * 
 * Accessible tab interface for organizing content into switchable panels
 * Enhanced with Alpine.js for advanced functionality and smooth transitions
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { dispatchElementEvent, addEventListener, EVENTS } from '../utilities/events.js';
import { findAllFocusable, focusFirst } from '../utilities/focus.js';

/**
 * Create a Strata Tabs component
 * @param {Object} config - Component configuration
 * @returns {Object} Alpine component configuration
 */
export function createTabsComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-tabs',
        bindProperty: 'activeTab'
    });

    return extendComponent(baseComponent, {

        activeTab: config.defaultValue || null,
        orientation: config.orientation || 'horizontal',
        activationMode: config.activationMode || 'automatic',
        variant: config.variant || 'default',
        containerId: config.id || null,
        

        triggers: [],
        contents: [],


        _keyboardListeners: [],

        /**
         * Initialize tabs component
         */
        init() {

            baseComponent.init.call(this);


            if (!this.containerId && this.$el) {
                this.containerId = this.$el.id || `strata-tabs-${Math.random().toString(36).substr(2, 9)}`;
            }

            this.$nextTick(() => {
                this.discoverTabElements();
                this.setupKeyboardNavigation();
                this.setupAriaAttributes();
                

                if (!this.activeTab && this.triggers.length > 0) {
                    const firstEnabledTrigger = this.triggers.find(t => !t.disabled);
                    if (firstEnabledTrigger) {
                        this.activeTab = firstEnabledTrigger.value;
                    }
                }

                this.updateAriaStates();


                this.dispatchComponentEvent(EVENTS.COMPONENT_READY, {
                    totalTabs: this.triggers.length,
                    activeTab: this.activeTab,
                    containerId: this.containerId
                });
                
                this.setupFocusManagement();
            });
        },

        /**
         * Discover and catalog tab elements
         */
        discoverTabElements() {
            const triggerElements = this.$el.querySelectorAll('[data-tab-trigger]');
            const contentElements = this.$el.querySelectorAll('[data-tab-content]');
            
            this.triggers = Array.from(triggerElements).map(el => ({
                element: el,
                value: el.dataset.tabTrigger,
                disabled: el.hasAttribute('disabled') || el.getAttribute('aria-disabled') === 'true'
            }));
            
            this.contents = Array.from(contentElements).map(el => ({
                element: el,
                value: el.dataset.tabContent,
                forceMount: el.hasAttribute('data-force-mount')
            }));
        },

        /**
         * Setup keyboard navigation
         */
        setupKeyboardNavigation() {
            this.triggers.forEach(trigger => {
                const keydownHandler = (e) => {
                    this.handleKeyboardNavigation(e, trigger.value);
                };

                const cleanup = addEventListener(trigger.element, 'keydown', keydownHandler);
                this.addCleanup(cleanup);
            });
        },

        /**
         * Handle keyboard navigation events
         */
        handleKeyboardNavigation(event, currentValue) {
            const enabledTriggers = this.triggers.filter(t => !t.disabled);
            const currentIndex = enabledTriggers.findIndex(t => t.value === currentValue);
            
            let targetIndex = currentIndex;
            let handled = true;
            
            switch (event.key) {
                case 'ArrowLeft':
                case 'ArrowUp':
                    targetIndex = currentIndex > 0 ? currentIndex - 1 : enabledTriggers.length - 1;
                    break;
                case 'ArrowRight':
                case 'ArrowDown':
                    targetIndex = currentIndex < enabledTriggers.length - 1 ? currentIndex + 1 : 0;
                    break;
                case 'Home':
                    targetIndex = 0;
                    break;
                case 'End':
                    targetIndex = enabledTriggers.length - 1;
                    break;
                case 'Enter':
                case ' ':
                    this.activateTab(currentValue);
                    break;
                case 'Tab':
                    if (!event.shiftKey) {
                        const activeContent = this.contents.find(c => c.value === this.activeTab);
                        if (activeContent) {
                            const firstFocusableInContent = findAllFocusable(activeContent.element)[0];
                            if (firstFocusableInContent) {
                                event.preventDefault();
                                firstFocusableInContent.focus();
                            }
                        }
                    }
                    break;
                default:
                    handled = false;
            }
            
            if (handled) {
                event.preventDefault();
                
                if (['ArrowLeft', 'ArrowUp', 'ArrowRight', 'ArrowDown', 'Home', 'End'].includes(event.key)) {
                    const targetTrigger = enabledTriggers[targetIndex];
                    if (targetTrigger) {
                        targetTrigger.element.focus();
                        if (this.activationMode === 'automatic') {
                            this.activateTab(targetTrigger.value);
                        }
                    }
                }
            }
        },

        /**
         * Setup ARIA attributes for accessibility
         */
        setupAriaAttributes() {
            this.triggers.forEach(trigger => {
                const content = this.contents.find(c => c.value === trigger.value);
                if (content) {
                    const triggerId = `${this.containerId}-trigger-${trigger.value}`;
                    const contentId = `${this.containerId}-content-${trigger.value}`;
                    
                    trigger.element.id = triggerId;
                    trigger.element.setAttribute('aria-controls', contentId);
                    trigger.element.setAttribute('role', 'tab');
                    
                    content.element.id = contentId;
                    content.element.setAttribute('aria-labelledby', triggerId);
                    content.element.setAttribute('role', 'tabpanel');
                }
            });
            

            const tabList = this.$el.querySelector('[role="tablist"]');
            if (tabList) {
                tabList.setAttribute('aria-orientation', this.orientation);
            }
        },

        /**
         * Activate a specific tab
         */
        activateTab(value) {
            if (!value) return;
            
            const trigger = this.triggers.find(t => t.value === value);
            if (!trigger || trigger.disabled) return;
            
            const previousTab = this.activeTab;
            this.activeTab = value;
            
            this.updateAriaStates();
            

            this.dispatchComponentEvent(EVENTS.TAB_CHANGE, { 
                activeTab: value, 
                previousTab: previousTab,
                containerId: this.containerId 
            });
            
            this.dispatchComponentEvent(EVENTS.TAB_ACTIVATED, { 
                tab: value, 
                containerId: this.containerId 
            });
        },

        /**
         * Update ARIA states based on active tab
         */
        updateAriaStates() {
            this.triggers.forEach(trigger => {
                const isActive = trigger.value === this.activeTab;
                trigger.element.setAttribute('aria-selected', isActive ? 'true' : 'false');
                trigger.element.setAttribute('tabindex', isActive ? '0' : '-1');
                trigger.element.setAttribute('data-state', isActive ? 'active' : 'inactive');
            });
            
            this.contents.forEach(content => {
                const isActive = content.value === this.activeTab;
                content.element.setAttribute('aria-hidden', isActive ? 'false' : 'true');
            });
        },

        /**
         * Check if a tab is active
         */
        isActive(value) {
            return this.activeTab === value;
        },

        /**
         * Check if content should be shown
         */
        shouldShowContent(value, forceMount = false) {
            return forceMount || this.isActive(value);
        },

        /**
         * Get all enabled tabs
         */
        getEnabledTabs() {
            return this.triggers.filter(t => !t.disabled).map(t => t.value);
        },

        /**
         * Get tab by value
         */
        getTab(value) {
            return this.triggers.find(t => t.value === value);
        },

        /**
         * Get tab content by value
         */
        getTabContent(value) {
            return this.contents.find(c => c.value === value);
        },

        /**
         * Check if tab is disabled
         */
        isTabDisabled(value) {
            const tab = this.getTab(value);
            return tab ? tab.disabled : true;
        },

        /**
         * Programmatically enable tab
         */
        enableTab(value) {
            const tab = this.getTab(value);
            if (tab) {
                tab.disabled = false;
                tab.element.removeAttribute('disabled');
                tab.element.setAttribute('aria-disabled', 'false');
                this.updateAriaStates();
            }
        },

        /**
         * Programmatically disable tab
         */
        disableTab(value) {
            const tab = this.getTab(value);
            if (tab) {
                tab.disabled = true;
                tab.element.setAttribute('disabled', 'true');
                tab.element.setAttribute('aria-disabled', 'true');
                

                if (this.activeTab === value) {
                    const firstEnabled = this.triggers.find(t => !t.disabled && t.value !== value);
                    if (firstEnabled) {
                        this.activateTab(firstEnabled.value);
                    }
                }
                
                this.updateAriaStates();
            }
        },

        /**
         * Focus a specific tab trigger with error handling
         */
        focusTrigger(trigger) {
            if (trigger && trigger.element && !trigger.disabled) {
                try {
                    trigger.element.focus();
                } catch (e) {
                    console.warn('Failed to focus tab trigger:', e);
                }
            }
        },

        /**
         * Focus the first focusable tab trigger
         */
        focusFirstTrigger() {
            const firstEnabled = this.triggers.find(t => !t.disabled);
            if (firstEnabled) {
                this.focusTrigger(firstEnabled);
            }
        },

        /**
         * Focus the last focusable tab trigger
         */
        focusLastTrigger() {
            const enabledTriggers = this.triggers.filter(t => !t.disabled);
            const lastEnabled = enabledTriggers[enabledTriggers.length - 1];
            if (lastEnabled) {
                this.focusTrigger(lastEnabled);
            }
        },

        /**
         * Set up additional focus management features
         */
        setupFocusManagement() {
            if (this.triggers.length === 0) return;
            
            this.triggers.forEach(trigger => {
                const isActive = trigger.value === this.activeTab;
                trigger.element?.setAttribute('tabindex', isActive ? '0' : '-1');
            });
            
            this.contents.forEach(content => {
                const isActive = content.value === this.activeTab;
                if (isActive && !content.forceMount) {
                    const focusableElements = findAllFocusable(content.element);
                    focusableElements.forEach(el => {
                        if (!el.hasAttribute('tabindex') || el.getAttribute('tabindex') !== '-1') {
                            el.setAttribute('tabindex', '0');
                        }
                    });
                }
            });
        },

        /**
         * Component cleanup
         */
        destroy() {
            this.triggers = [];
            this.contents = [];
            

            baseComponent.destroy.call(this);
        }
    });
}

export default {
    createTabsComponent
};