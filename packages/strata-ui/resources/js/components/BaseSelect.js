/**
 * Select Component for Strata UI
 * 
 * Provides comprehensive select functionality with search, multi-select, and keyboard navigation
 */

import { createFormComponent, extendComponent } from './BaseComponent.js';
import { addEventListener, EVENTS } from '../utilities/events.js';
import { focusFirst, findFirstFocusable } from '../utilities/focus.js';

/**
 * Create a select component
 * @param {Object} config - Select configuration
 * @returns {Object} Select component configuration
 */
export function createBaseSelect(config = {}) {
    const baseComponent = createFormComponent({
        ...config,
        componentName: 'strata-select'
    });
    
    return extendComponent(baseComponent, {

        open: false,
        highlighted: config.multiple ? 0 : (config.selected ?? 0),
        

        count: config.count || 0,
        multiple: config.multiple || false,
        maxSelections: config.maxSelections || 0,
        items: config.items || {},
        searchable: config.searchable || false,
        

        searchQuery: '',
        filteredItems: config.items || {},
        filteredIndices: Object.keys(config.items || {}),
        



        /**
         * Select-specific initialization
         */
        init() {

            if (config.initialSelected !== undefined) {
                this.value = this.multiple 
                    ? (Array.isArray(config.initialSelected) ? config.initialSelected : [])
                    : config.initialSelected;
            }
            

            this.filteredItems = Object.values(this.items);
            this.filteredIndices = Object.keys(this.items);
            

            this.setupKeyboardHandlers();
        },

        /**
         * Set up keyboard event handlers
         */
        setupKeyboardHandlers() {

            const escapeHandler = (e) => {
                if (e.key === 'Escape') {
                    this.close();
                }
            };
            
            const cleanup = addEventListener(window, 'keydown', escapeHandler);
            this.addCleanup(cleanup);
        },

        /**
         * Navigate to next option
         */
        next() {
            const maxIndex = this.searchable ? this.filteredItems.length - 1 : this.count - 1;
            this.highlighted = Math.min(this.highlighted + 1, maxIndex);
        },

        /**
         * Navigate to previous option
         */
        previous() {
            this.highlighted = Math.max(this.highlighted - 1, 0);
        },

        /**
         * Select the currently highlighted option
         */
        select() {
            if (this.multiple) {
                const actualIndex = this.searchable ? this.filteredIndices[this.highlighted] : this.highlighted;
                this.toggleSelection(actualIndex);
            } else {
                const actualIndex = this.searchable ? this.filteredIndices[this.highlighted] : this.highlighted;
                this.setValue(actualIndex);
                this.open = false;
                if (this.$refs.trigger) {
                    this.$refs.trigger.focus();
                }
            }
        },

        /**
         * Toggle selection for multi-select
         * @param {string|number} index - Option index to toggle
         */
        toggleSelection(index) {
            if (!Array.isArray(this.value)) {
                this.value = [];
            }
            
            const selectedIndex = this.value.indexOf(index);
            
            if (selectedIndex > -1) {
                this.value.splice(selectedIndex, 1);
            } else if (this.maxSelections === 0 || this.value.length < this.maxSelections) {
                this.value.push(index);
            }
            

            this.updateHiddenInput();
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: this.value,
                selected: this.value,
                action: 'toggle',
                index
            });
        },

        /**
         * Check if an option is selected
         * @param {string|number} index - Option index
         * @returns {boolean} Whether option is selected
         */
        isSelected(index) {
            if (this.multiple) {
                return Array.isArray(this.value) && this.value.includes(index);
            }
            return this.value === index;
        },

        /**
         * Get display text for the trigger button
         * @returns {string} Display text
         */
        getDisplayText() {
            if (this.multiple) {
                if (!Array.isArray(this.value) || this.value.length === 0) {
                    return '';
                }
                return this.value.length + ' selected';
            }
            return this.value !== null && this.value !== '' ? (this.items[this.value] || '') : '';
        },

        /**
         * Get visible tags for multi-select display
         * @returns {Array} Array of selected indices to show as tags
         */
        getVisibleTags() {
            if (!Array.isArray(this.value) || this.value.length === 0) {
                return [];
            }

            return this.value.slice(0, 2);
        },

        /**
         * Get count of remaining selections not shown as tags
         * @returns {number} Count of remaining selections
         */
        getRemainingCount() {
            if (!Array.isArray(this.value) || this.value.length <= 2) {
                return 0;
            }
            return this.value.length - 2;
        },

        /**
         * Filter items based on search query
         */
        filterItems() {
            if (!this.searchQuery.trim()) {
                this.filteredItems = Object.values(this.items);
                this.filteredIndices = Object.keys(this.items);
            } else {
                const query = this.searchQuery.toLowerCase();
                this.filteredItems = [];
                this.filteredIndices = [];
                
                Object.keys(this.items).forEach((key) => {
                    if (this.items[key].toLowerCase().includes(query)) {
                        this.filteredItems.push(this.items[key]);
                        this.filteredIndices.push(key);
                    }
                });
            }
            

            this.highlighted = 0;
        },

        /**
         * Clear search query and reset filter
         */
        clearSearch() {
            this.searchQuery = '';
            this.filterItems();
            if (this.searchable && this.$refs.searchInput) {
                this.$refs.searchInput.focus();
            }
        },

        /**
         * Handle keydown events in search input
         * @param {KeyboardEvent} event - Keyboard event
         */
        handleSearchKeydown(event) {
            if (event.key === 'ArrowDown') {
                event.preventDefault();
                this.next();
            } else if (event.key === 'ArrowUp') {
                event.preventDefault();
                this.previous();
            } else if (event.key === 'Enter') {
                event.preventDefault();
                if (this.filteredItems.length > 0) {
                    this.select();
                }
            } else if (event.key === 'Escape') {
                if (this.searchQuery) {
                    this.clearSearch();
                } else {
                    this.close();
                }
            }
        },

        /**
         * Handle keydown events on trigger button
         * @param {KeyboardEvent} event - Keyboard event
         */
        handleTriggerKeydown(event) {
            if (event.key === 'ArrowDown') {
                event.preventDefault();
                if (this.open) {
                    this.next();
                } else {
                    this.open = true;
                }
            } else if (event.key === 'ArrowUp') {
                event.preventDefault();
                if (this.open) {
                    this.previous();
                } else {
                    this.open = true;
                }
            } else if (event.key === 'Enter') {
                event.preventDefault();
                if (this.open) {
                    this.select();
                } else {
                    this.toggle();
                }
            } else if (event.key === ' ') {
                event.preventDefault();
                this.toggle();
            }
        },

        /**
         * Close the dropdown
         */
        close() {
            this.open = false;
            this.dispatchComponentEvent(EVENTS.SELECT_CLOSED);
        },

        /**
         * Toggle dropdown open/closed
         */
        toggle() {
            this.open = !this.open;
            
            if (this.open) {

                this.$nextTick(() => {
                    if (this.searchable && this.$refs.searchInput) {
                        this.$refs.searchInput.focus();
                    } else if (this.$refs.dropdown) {

                        focusFirst(this.$refs.dropdown);
                    }
                });
                

                this.dispatchComponentEvent(EVENTS.SELECT_OPENED);
            } else {

                this.dispatchComponentEvent(EVENTS.SELECT_CLOSED);
            }
        },

        /**
         * Clear all selections
         */
        clearSelection() {
            if (this.multiple) {
                this.setValue([]);
            } else {
                this.setValue(null);
            }
            
            if (this.$refs.trigger) {
                this.$refs.trigger.focus();
            }
            
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: this.value,
                action: 'clear'
            });
        },

        /**
         * Check if component has any selections
         * @returns {boolean} Whether there are selections
         */
        hasSelection() {
            if (this.multiple) {
                return Array.isArray(this.value) && this.value.length > 0;
            }
            return this.value !== null && this.value !== '';
        },

        /**
         * Handle option click for single select
         * @param {string|number} index - Option index
         */
        selectSingle(index) {
            this.setValue(index);
            this.open = false;
            if (this.$refs.trigger) {
                this.$refs.trigger.focus();
            }
            
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: this.value,
                selected: index,
                action: 'select'
            });
        },

        /**
         * Handle option click for multi-select
         * @param {string|number} index - Option index
         */
        selectMultiple(index) {
            this.toggleSelection(index);
        },

        /**
         * Handle option mouse over for highlighting
         * @param {number} index - Option index to highlight
         */
        highlightOption(index) {
            this.highlighted = index;
        },

        /**
         * Check if max selections reached for multi-select
         * @param {string|number} index - Option index to check
         * @returns {boolean} Whether option should be disabled
         */
        isOptionDisabled(index) {
            if (!this.multiple || this.maxSelections === 0) {
                return false;
            }
            
            return !this.isSelected(index) && 
                   Array.isArray(this.value) && 
                   this.value.length >= this.maxSelections;
        },

        /**
         * Update the hidden input value for form submission
         */
        updateHiddenInput() {


            this.$nextTick(() => {

                if (this.multiple) {

                    this.value = [...this.value]; // Trigger reactivity
                } else {

                    const hiddenInput = this.$el.querySelector('input[type="hidden"]');
                    if (hiddenInput) {
                        hiddenInput.value = this.value || '';
                    }
                }
            });
        },

        /**
         * Get filtered items as array for template iteration
         * @returns {Array} Array of filtered items
         */
        getFilteredItemsArray() {
            return Object.entries(this.filteredItems).map(([key, value]) => [key, value]);
        },

        /**
         * Get all items as array for template iteration
         * @returns {Array} Array of all items
         */
        getItemsArray() {
            return Object.entries(this.items);
        }
    });
}

export default {
    createBaseSelect
};