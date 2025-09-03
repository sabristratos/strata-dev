/**
 * Datepicker Component for Strata UI
 * 
 * Provides form input wrapper for the calendar component
 */

import { createFormComponent, extendComponent } from './BaseComponent.js';
import { EVENTS } from '../utilities/events.js';
import { ANIMATION_DURATIONS } from '../utilities/animation.js';

/**
 * Create a datepicker component that wraps the calendar component
 * @param {Object} config - Datepicker configuration
 * @returns {Object} Datepicker component configuration
 */
export function createBaseDatepicker(config = {}) {
    const baseComponent = createFormComponent({
        ...config,
        componentName: 'strata-datepicker'
    });
    
    return extendComponent(baseComponent, {

        range: config.range || false,
        format: config.format || 'M j, Y',
        

        open: false,
        

        displayValue: '',
        

        placeholder: config.placeholder || baseComponent.placeholder || '',

        /**
         * Datepicker-specific initialization
         */
        init() {

            if (!this.placeholder && config.placeholder) {
                this.placeholder = config.placeholder;
            }
            

            this.updateDisplayValue();
            

            this.$watch('value', () => {
                this.updateDisplayValue();
                this.updateHiddenInput();
            });
        },

        /**
         * Update the display value based on current value
         * Handles any input type gracefully without throwing errors
         */
        updateDisplayValue() {

            this.displayValue = '';
            

            if (!this.value || this.value === 'null' || this.value === 'undefined') {
                return;
            }
            
            try {
                if (this.range) {

                    let rangeValue = this.value;
                    

                    if (typeof rangeValue === 'object' && rangeValue !== null && rangeValue.constructor) {
                        try {

                            const startDate = rangeValue.start || null;
                            const endDate = rangeValue.end || null;
                            
                            if (startDate && endDate) {
                                this.displayValue = this.formatDisplayDate(startDate) + ' - ' + this.formatDisplayDate(endDate);
                            } else if (startDate) {
                                this.displayValue = this.formatDisplayDate(startDate);
                            }
                        } catch (error) {

                        }
                    }
                } else {

                    let dateValue = null;
                    
                    if (typeof this.value === 'string') {

                        dateValue = this.value;
                    } else if (typeof this.value === 'object' && this.value !== null) {
                        try {

                            if (this.value.date) {

                                dateValue = this.value.date;
                            } else if (this.value.start) {

                                dateValue = this.value.start;
                            }
                        } catch (error) {

                        }
                    }
                    
                    if (dateValue && dateValue !== 'null') {
                        this.displayValue = this.formatDisplayDate(dateValue);
                    }
                }
            } catch (error) {

                this.displayValue = '';
            }
        },

        /**
         * Format date for display in the input field
         * @param {string} dateInput - Date string in YYYY-MM-DD format (always normalized)
         * @returns {string} Formatted display date
         */
        formatDisplayDate(dateInput) {

            if (!dateInput || dateInput === 'null' || dateInput === 'undefined') {
                return '';
            }
            

            if (typeof dateInput !== 'string') {
                return '';
            }
            
            try {

                let date;
                if (dateInput.includes('T')) {

                    date = new Date(dateInput);
                } else if (dateInput.match(/^\d{4}-\d{2}-\d{2}$/)) {

                    date = new Date(dateInput + 'T00:00:00');
                } else {

                    date = new Date(dateInput);
                }
                

                if (isNaN(date.getTime())) {
                    return '';
                }
                
                return date.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                });
            } catch (error) {

                return '';
            }
        },


        /**
         * Open the calendar popover
         */
        openCalendar() {
            if (this.disabled || this.readonly) return;
            this.open = true;
        },

        /**
         * Close the calendar popover
         */
        closeCalendar() {
            this.open = false;
        },

        /**
         * Clear the current selection
         */
        clearValue() {
            if (this.range) {
                this.setValue({ start: null, end: null });
            } else {
                this.setValue(null);
            }
        },

        /**
         * Handle calendar change events from the calendar component
         * @param {CustomEvent} event - Calendar change event
         */
        handleCalendarChange(event) {
            const { value, action } = event.detail;
            

            this.setValue(value);
            

            if (action === 'select' || action === 'preset') {
                setTimeout(() => this.closeCalendar(), ANIMATION_DURATIONS.FAST);
            }
            

            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: this.value,
                action: action,
                source: 'calendar'
            });
        },

        /**
         * Override setValue to update display value
         * @param {*} newValue - New value
         */
        setValue(newValue) {
            if (this.readonly || this.disabled) return;
            
            const oldValue = this.value;
            

            if (this.range) {

                if (newValue && typeof newValue === 'object') {
                    this.value = {
                        start: newValue.start || null,
                        end: newValue.end || null
                    };
                } else {
                    this.value = { start: null, end: null };
                }
            } else {

                if (newValue && typeof newValue === 'object' && newValue.start) {

                    this.value = newValue.start;
                } else if (typeof newValue === 'string') {

                    this.value = newValue;
                } else {

                    this.value = null;
                }
            }
            

            this.updateDisplayValue();
            

            this.updateHiddenInput();
            

            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: newValue,
                oldValue: oldValue
            });
        },

        /**
         * Override updateHiddenInput to properly serialize values for form submission
         * and trigger Livewire updates when wire:model is present
         */
        updateHiddenInput() {
            const hiddenInput = this.$refs.hiddenInput;
            if (!hiddenInput) return;
            
            let serializedValue = '';
            
            if (this.value) {
                if (this.range) {

                    if (typeof this.value === 'object') {
                        serializedValue = JSON.stringify({
                            start: this.value.start || null,
                            end: this.value.end || null
                        });
                    }
                } else {

                    if (typeof this.value === 'string') {
                        serializedValue = this.value;
                    } else if (typeof this.value === 'object' && this.value !== null) {
                        if (this.value.date) {
                            serializedValue = this.value.date;
                        } else if (this.value.start) {

                            serializedValue = this.value.start;
                        }
                    }
                }
            }
            

            hiddenInput.value = serializedValue;
            


            if (hiddenInput.hasAttribute('wire:model') || hiddenInput.hasAttribute('wire:model.live')) {

                hiddenInput.dispatchEvent(new Event('input', { bubbles: true }));
            }
        }
    });
}

export default {
    createBaseDatepicker
};