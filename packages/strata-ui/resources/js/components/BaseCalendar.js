/**
 * Date Range Picker Component for Strata UI
 * 
 * Provides comprehensive date range selection with calendar UI
 */

import { createFormComponent, extendComponent } from './BaseComponent.js';
import { EVENTS } from '../utilities/events.js';

/**
 * Create a date range picker component
 * @param {Object} config - Calendar configuration
 * @returns {Object} Calendar component configuration
 */
export function createBaseCalendar(config = {}) {
    const baseComponent = createFormComponent({
        ...config,
        componentName: 'strata-calendar'
    });
    
    return extendComponent(baseComponent, {
        // Main calendar value
        value: config.value || { start: null, end: null },
        
        // Configuration
        config: config,
        
        // Date state
        currentDate: new Date(config.initialDate || new Date()),
        startDate: null,
        endDate: null,
        
        // UI state
        selecting: config.initialSelecting || false,
        updating: config.initialUpdating || false,
        months: [],
        headerText: '',
        activePreset: '',

        /**
         * Calendar-specific initialization
         */
        init() {
            // Parse initial dates
            this.startDate = this.value.start ? this.parseDate(this.value.start) : null;
            this.endDate = this.value.end ? this.parseDate(this.value.end) : null;
            
            // Initialize Livewire sync if available
            this.initializeLivewireSync();
            
            // Watch for value changes
            this.$watch('value', (newValue) => {
                this.startDate = newValue.start ? this.parseDate(newValue.start) : null;
                this.endDate = newValue.end ? this.parseDate(newValue.end) : null;
                this.generateMonths();
            });
            
            // Generate initial calendar
            this.generateMonths();
        },

        /**
         * Parse date strings as local dates to avoid timezone issues
         * @param {string} dateString - Date string in YYYY-MM-DD format
         * @returns {Date|null} Parsed date or null if invalid
         */
        parseDate(dateString) {
            if (!dateString) return null;
            
            const [year, month, day] = dateString.split('-').map(Number);
            return new Date(year, month - 1, day);
        },

        /**
         * Format dates as YYYY-MM-DD without timezone conversion
         * @param {Date} date - Date object to format
         * @returns {string|null} Formatted date string or null if invalid
         */
        formatLocalDate(date) {
            if (!date) return null;
            
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        },

        /**
         * Initialize Livewire sync if available
         */
        initializeLivewireSync() {
            if (typeof $wire !== 'undefined' && $wire) {
                try {
                    this.selecting = $wire.entangle('selecting');
                    this.updating = $wire.entangle('updating');
                } catch (error) {
                    console.warn('Livewire entanglement failed, using local state:', error);
                }
            }
        },

        /**
         * Generate calendar months data
         */
        generateMonths() {
            const months = [];
            for (let i = 0; i < this.config.monthsToShow; i++) {
                const date = new Date(this.currentDate);
                date.setMonth(date.getMonth() + i);
                months.push(this.generateCalendarData(date));
            }
            this.months = months;
            this.updateHeaderText();
        },

        /**
         * Generate calendar data for a specific month
         * @param {Date} date - Date representing the month
         * @returns {Object} Month data with days array
         */
        generateCalendarData(date) {
            const year = date.getFullYear();
            const month = date.getMonth();
            const monthYear = date.toLocaleDateString(this.config.locale, { month: 'long', year: 'numeric' });
            const firstDayOfMonth = new Date(year, month, 1);
            let dayOfWeek = firstDayOfMonth.getDay();

            if (this.config.weekStart === 'monday') {
                dayOfWeek = (dayOfWeek === 0) ? 6 : dayOfWeek - 1;
            }

            const days = [];

            // Add previous month's days
            for (let i = dayOfWeek; i > 0; i--) {
                days.push(this.formatDay(new Date(year, month, 1 - i), false));
            }

            // Add current month's days
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            for (let i = 1; i <= daysInMonth; i++) {
                days.push(this.formatDay(new Date(year, month, i), true));
            }

            // Add minimal next month's days to complete the final week only
            const currentDaysCount = dayOfWeek + daysInMonth;
            const daysInFinalWeek = currentDaysCount % 7;
            if (daysInFinalWeek > 0) {
                const daysToAdd = 7 - daysInFinalWeek;
                for (let i = 1; i <= daysToAdd; i++) {
                    days.push(this.formatDay(new Date(year, month + 1, i), false));
                }
            }

            return { monthYear, days };
        },

        /**
         * Format a day object with all necessary properties
         * @param {Date} date - Date to format
         * @param {boolean} isCurrentMonth - Whether date is in current month
         * @returns {Object} Formatted day object
         */
        formatDay(date, isCurrentMonth) {
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            date.setHours(0, 0, 0, 0);

            const isStartDate = this.startDate && date.getTime() === this.startDate.getTime();
            const isEndDate = this.endDate && date.getTime() === this.endDate.getTime();

            let isInRange = false;
            if (this.startDate && this.endDate) {
                isInRange = date > this.startDate && date < this.endDate;
            }

            const isDisabled = this.isDateDisabled(date);

            return {
                date: date.getDate(),
                fullDate: new Date(date),
                isCurrentMonth,
                isToday: date.getTime() === today.getTime(),
                isStartDate,
                isEndDate,
                isInRange,
                isSelecting: this.selecting,
                isUpdating: this.updating,
                isDisabled
            };
        },

        /**
         * Check if a date should be disabled
         * @param {Date} date - Date to check
         * @returns {boolean} Whether date is disabled
         */
        isDateDisabled(date) {
            const dateString = date.toISOString().split('T')[0];
            
            // Check min date
            if (this.config.minDate && date < this.parseDate(this.config.minDate)) {
                return true;
            }
            
            // Check max date
            if (this.config.maxDate && date > this.parseDate(this.config.maxDate)) {
                return true;
            }
            
            // Check disabled dates array
            if (this.config.disabledDates && this.config.disabledDates.includes(dateString)) {
                return true;
            }
            
            return false;
        },

        /**
         * Select a date (handles both single date and range selection)
         * @param {Object} day - Day object from formatDay
         */
        selectDate(day) {
            if (!day.isCurrentMonth || day.isDisabled) return;

            if (!this.config.range) {
                // Single date selection
                this.startDate = this.endDate = new Date(day.fullDate);
                this.selecting = false;
                this.updateValue();
                this.generateMonths();
                
                // Auto-close if enabled
                if (this.config.closeOnSelect) {
                    this.$dispatch('calendar-close');
                }
            } else if (!this.selecting || !this.startDate) {
                // Start range selection
                this.startDate = new Date(day.fullDate);
                this.endDate = null;
                this.selecting = true;
                this.activePreset = '';
                this.generateMonths();
            } else {
                // Complete range selection
                if (day.fullDate < this.startDate) {
                    this.endDate = this.startDate;
                    this.startDate = new Date(day.fullDate);
                } else {
                    this.endDate = new Date(day.fullDate);
                }
                this.selecting = false;
                this.updateValue();
                this.generateMonths();
                
                // Auto-close if enabled and range is complete
                if (this.config.closeOnSelect) {
                    this.$dispatch('calendar-close');
                }
            }
        },

        /**
         * Clear the current selection
         */
        clearSelection() {
            this.startDate = null;
            this.endDate = null;
            this.selecting = false;
            this.activePreset = '';
            this.updateValue();
            this.generateMonths();
        },

        /**
         * Set a preset date range
         * @param {string} label - Preset label
         */
        setPreset(label) {
            if (!this.config.presets || !this.config.presets[label]) return;

            const [start, end] = this.config.presets[label];
            this.startDate = new Date(start);
            this.endDate = new Date(end);
            this.activePreset = label;
            this.selecting = false;
            this.currentDate = new Date(start);

            this.updateValue();
            this.generateMonths();
        },

        /**
         * Check if a preset is currently active
         * @param {string} label - Preset label
         * @returns {boolean} Whether preset is active
         */
        isPresetActive(label) {
            if (this.activePreset) return this.activePreset === label;

            if (!this.config.presets || !this.config.presets[label] || !this.startDate || !this.endDate) return false;

            const [start, end] = this.config.presets[label].map(d => {
                const date = new Date(d);
                date.setHours(0, 0, 0, 0);
                return date.getTime();
            });

            const currentStart = new Date(this.startDate);
            currentStart.setHours(0, 0, 0, 0);
            const currentEnd = new Date(this.endDate);
            currentEnd.setHours(0, 0, 0, 0);

            return currentStart.getTime() === start && currentEnd.getTime() === end;
        },

        /**
         * Update the header text based on visible months
         */
        updateHeaderText() {
            if (this.months.length === 0) return;

            const startMonth = this.months[0].monthYear;
            const endMonth = this.months[this.months.length - 1].monthYear;
            this.headerText = startMonth === endMonth ? startMonth : `${startMonth} - ${endMonth}`;
        },

        /**
         * Navigate to previous months
         */
        prevMonths() {
            this.currentDate = new Date(this.currentDate);
            this.currentDate.setMonth(this.currentDate.getMonth() - this.config.monthsToShow);
            this.generateMonths();
        },

        /**
         * Navigate to next months
         */
        nextMonths() {
            this.currentDate = new Date(this.currentDate);
            this.currentDate.setMonth(this.currentDate.getMonth() + this.config.monthsToShow);
            this.generateMonths();
        },

        /**
         * Update the component value and trigger events
         */
        updateValue() {
            this.updating = true;
            this.value = {
                start: this.startDate ? this.formatLocalDate(this.startDate) : null,
                end: this.endDate ? this.formatLocalDate(this.endDate) : null
            };
            
            // Update hidden input for form submission
            this.updateHiddenInput();
            
            // Dispatch change event
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: this.value,
                startDate: this.startDate,
                endDate: this.endDate
            });
            
            this.updating = false;
        }
    });
}

export default {
    createBaseCalendar
};