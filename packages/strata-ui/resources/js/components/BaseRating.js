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

        value: config.hasWireModel ? null : config.value,
        stars: config.hasWireModel ? null : config.value, // Visual display state
        readonly: config.readonly || false,
        max: config.max || 5,
        name: config.name || null,
        hasWireModel: config.hasWireModel || false,
        
        /**
         * Initialize rating component
         */
        init() {

            if (this.hasWireModel) {
                this.value = config.value;
            }
            

            this.stars = this.value;
            

            if (this.$refs.hiddenInput) {
                this.$refs.hiddenInput.value = this.value || '';
            }
        },
        
        /**
         * Set rating value
         * @param {number} rating - Rating value to set
         */
        setRating(rating) {
            if (this.readonly) return;
            
            this.value = rating;
            this.stars = rating;
            

            if (this.$refs.hiddenInput) {
                this.$refs.hiddenInput.value = rating;
            }
            

            this.dispatchComponentEvent(EVENTS.CHANGE, { value: rating });
            this.$dispatch('change', { value: rating });
        },
        
        /**
         * Clear rating value
         */
        clearRating() {
            if (this.readonly) return;
            
            this.value = null;
            this.stars = null;
            

            if (this.$refs.hiddenInput) {
                this.$refs.hiddenInput.value = '';
            }
            

            this.dispatchComponentEvent(EVENTS.CHANGE, { value: null });
            this.$dispatch('change', { value: null });
        },
        
        /**
         * Handle mouse enter on rating star
         * @param {number} rating - Rating value being hovered
         */
        onMouseEnter(rating) {
            if (this.readonly) return;
            this.stars = rating;
        },
        
        /**
         * Handle mouse leave from rating area
         */
        onMouseLeave() {
            if (this.readonly) return;
            this.stars = this.value;
        },
        
        /**
         * Check if a star at given index should be half active
         * @param {number} index - Star index (1-based)  
         * @returns {boolean}
         */
        isHalfActive(index) {
            return this.stars !== null && index - 0.5 <= this.stars && this.stars < index;
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
        percentage() {
            if (this.stars === null) return 0;
            return (this.stars / this.max) * 100;
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