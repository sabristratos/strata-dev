/**
 * Base Rating Component for Strata UI
 * 
 * Handles interactive star ratings with keyboard support and Livewire integration
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { EVENTS } from '../utilities/events.js';

/**
 * Create a rating component
 * @param {Object} config - Rating configuration
 * @returns {Object} Rating component configuration
 */
export function createRatingComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-rating'
    });
    
    return extendComponent(baseComponent, {
        // Rating state
        value: config.hasWireModel ? null : config.value,
        hoverValue: null,
        readonly: config.readonly || false,
        max: config.max || 5,
        name: config.name || null,
        hasWireModel: config.hasWireModel || false,
        
        /**
         * Initialize rating component
         */
        init() {
            // Handle Livewire entanglement
            if (this.hasWireModel) {
                this.value = config.value;
            }
            
            // Initialize hidden input value
            if (this.$refs.hiddenInput) {
                this.$refs.hiddenInput.value = this.value || '';
            }
        },
        
        /**
         * Get display value (hover takes precedence over actual value)
         * @returns {number|null}
         */
        get displayValue() {
            return this.hoverValue !== null ? this.hoverValue : this.value;
        },
        
        /**
         * Set rating value
         * @param {number} rating - Rating value to set
         */
        setRating(rating) {
            if (this.readonly) return;
            
            this.value = rating;
            
            // Update hidden input
            if (this.$refs.hiddenInput) {
                this.$refs.hiddenInput.value = rating;
            }
            
            // Dispatch change event
            this.dispatchComponentEvent(EVENTS.CHANGE, { value: rating });
            this.$dispatch('change', { value: rating });
        },
        
        /**
         * Clear rating value
         */
        clearRating() {
            if (this.readonly) return;
            
            this.value = null;
            
            // Update hidden input
            if (this.$refs.hiddenInput) {
                this.$refs.hiddenInput.value = '';
            }
            
            // Dispatch change event
            this.dispatchComponentEvent(EVENTS.CHANGE, { value: null });
            this.$dispatch('change', { value: null });
        },
        
        /**
         * Handle mouse enter on rating star
         * @param {number} rating - Rating value being hovered
         */
        onMouseEnter(rating) {
            if (this.readonly) return;
            this.hoverValue = rating;
        },
        
        /**
         * Handle mouse leave from rating area
         */
        onMouseLeave() {
            if (this.readonly) return;
            this.hoverValue = null;
        },
        
        /**
         * Check if a star at given index should be active
         * @param {number} index - Star index (1-based)
         * @returns {boolean}
         */
        isActive(index) {
            const current = this.displayValue;
            return current !== null && index <= current;
        },
        
        /**
         * Check if a star at given index should be half active
         * @param {number} index - Star index (1-based)  
         * @returns {boolean}
         */
        isHalfActive(index) {
            const current = this.displayValue;
            return current !== null && index - 0.5 <= current && current < index;
        },
        
        /**
         * Handle keyboard navigation
         * @param {KeyboardEvent} event - Keyboard event
         */
        onKeyDown(event) {
            if (this.readonly) return;
            
            const { key } = event;
            let newValue = this.value || 0;
            
            switch (key) {
                case 'ArrowRight':
                case 'ArrowUp':
                    event.preventDefault();
                    if (newValue < this.max) {
                        this.setRating(newValue + 1);
                    }
                    break;
                    
                case 'ArrowLeft':
                case 'ArrowDown':
                    event.preventDefault();
                    if (newValue > 1) {
                        this.setRating(newValue - 1);
                    }
                    break;
                    
                case 'Home':
                    event.preventDefault();
                    this.setRating(1);
                    break;
                    
                case 'End':
                    event.preventDefault();
                    this.setRating(this.max);
                    break;
                    
                case 'Delete':
                case 'Backspace':
                    event.preventDefault();
                    this.clearRating();
                    break;
                    
                default:
                    // Handle numeric keys (1-9)
                    if (key >= '1' && key <= '9') {
                        const numValue = parseInt(key, 10);
                        if (numValue <= this.max) {
                            event.preventDefault();
                            this.setRating(numValue);
                        }
                    }
                    break;
            }
        },
        
        /**
         * Get rating as percentage for display
         * @returns {number}
         */
        get percentage() {
            const current = this.displayValue;
            if (current === null) return 0;
            return (current / this.max) * 100;
        },
        
        /**
         * Get accessibility label for current rating
         * @returns {string}
         */
        get accessibilityLabel() {
            const current = this.value;
            if (current === null) {
                return `Not rated. Use arrow keys to rate from 1 to ${this.max} stars.`;
            }
            return `Rated ${current} out of ${this.max} stars. Use arrow keys to change rating.`;
        }
    });
}

export default {
    createRatingComponent
};