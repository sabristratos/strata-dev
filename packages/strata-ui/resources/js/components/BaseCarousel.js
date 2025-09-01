/**
 * Base Carousel Component for Strata UI
 * 
 * Simplified CSS scroll-snap carousel with Alpine.js
 * Focus on essential functionality: navigation, autoplay, accessibility
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { dispatchElementEvent, EVENTS } from '../utilities/events.js';

/**
 * Create a Strata Carousel component
 * @param {Object} config - Component configuration
 * @returns {Object} Alpine component configuration
 */
export function createCarouselComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-carousel',
        bindProperty: 'currentSlide'
    });

    return extendComponent(baseComponent, {
        // Simplified state management
        slides: [],
        currentSlide: 0,
        totalSlides: 0,
        canGoPrevious: false,
        canGoNext: false,
        showPrevArrow: false,
        showNextArrow: false,
        autoplayEnabled: false,
        autoplayTimer: null,
        isPaused: false,
        isProgrammaticScroll: false,

        // Event listener references for cleanup
        _scrollHandler: null,
        _keydownHandler: null,
        _scrollContainer: null,

        // Store raw config for deferred processing
        _rawConfig: config,

        // Configuration with validation - will be set in init()
        autoplay: config.autoplay || false,
        interval: Math.max(1000, Math.min(30000, config.interval || 3000)),
        loop: config.loop !== false,
        itemsPerView: { default: 1 }, // Will be normalized in init()

        // CSS classes from PHP component
        itemClasses: config.itemClasses || 'flex-shrink-0 snap-center w-full',
        

        /**
         * Normalize itemsPerView configuration
         * @param {any} itemsPerView - Items per view config
         * @returns {Object} Normalized configuration
         */
        normalizeItemsPerView(itemsPerView) {
            if (typeof itemsPerView === 'number' || typeof itemsPerView === 'string') {
                const count = parseInt(itemsPerView);
                return { default: Math.max(1, Math.min(10, count)) };
            }
            if (typeof itemsPerView === 'object' && itemsPerView !== null) {
                const normalized = {};
                for (const [key, value] of Object.entries(itemsPerView)) {
                    const count = parseInt(value);
                    if (!isNaN(count)) {
                        normalized[key] = Math.max(1, Math.min(10, count));
                    }
                }
                return Object.keys(normalized).length > 0 ? normalized : { default: 1 };
            }
            return { default: 1 };
        },



        /**
         * Wait for container to be available with retry mechanism
         */
        async waitForContainer(maxRetries = 10, delay = 50) {
            for (let i = 0; i < maxRetries; i++) {
                if (this.$refs.scrollContainer) {
                    return this.$refs.scrollContainer;
                }
                await new Promise(resolve => setTimeout(resolve, delay));
            }
            // Container not found after retries
            return null;
        },

        /**
         * Initialize carousel with retry logic for slides
         */
        async initializeSlides(retries = 3) {
            this.processSlides();
            
            // If no slides found, retry after a short delay
            if (this.totalSlides === 0 && retries > 0) {
                await new Promise(resolve => setTimeout(resolve, 100));
                return this.initializeSlides(retries - 1);
            }
        },

        /**
         * Initialize carousel component
         */
        async init() {
            // Process deferred configuration
            this.itemsPerView = this.normalizeItemsPerView(this._rawConfig.itemsPerView || { default: 1 });
            
            // Wait for container to be ready
            await this.waitForContainer();
            
            this.$nextTick(async () => {
                await this.initializeSlides();
                this.setupScrollListener();
                this.setupKeyboardNavigation();
                this.updateNavigationState();
                
                if (this.autoplay) {
                    this.startAutoplay();
                }
                
                // Dispatch ready event
                this.dispatchComponentEvent(EVENTS.COMPONENT_READY, {
                    totalSlides: this.totalSlides,
                    currentSlide: this.currentSlide
                });
            });
        },

        /**
         * Process direct children as slides
         */
        processSlides() {
            const container = this.$refs.scrollContainer;
            if (!container) {
                return;
            }

            // Get direct children as slides
            const children = Array.from(container.children);
            this.slides = children.map((child, index) => ({
                element: child,
                index: index
            }));
            
            this.totalSlides = this.slides.length;
            
            // Apply item classes (width handled by CSS container queries)
            children.forEach((child) => {
                const classesToAdd = this.itemClasses.split(' ').filter(cls => cls.trim() !== '');
                const classesToActuallyAdd = classesToAdd.filter(cls => !child.classList.contains(cls));
                if (classesToActuallyAdd.length > 0) {
                    child.classList.add(...classesToActuallyAdd);
                }
            });
        },


        /**
         * Setup scroll event listener
         */
        setupScrollListener() {
            const container = this.$refs.scrollContainer;
            if (!container) return;

            this._scrollHandler = () => {
                if (!this.isProgrammaticScroll) {
                    this.updateCurrentSlideFromScroll();
                    this.updateNavigationState();
                }
            };
            
            this._scrollContainer = container;
            container.addEventListener('scroll', this._scrollHandler, { passive: true });
        },

        /**
         * Setup keyboard navigation
         */
        setupKeyboardNavigation() {
            this._keydownHandler = (event) => {
                if (!this.$el.contains(document.activeElement)) return;

                let handled = true;

                switch (event.key) {
                    case 'ArrowLeft':
                        this.previousSlide();
                        break;
                    case 'ArrowRight':
                        this.nextSlide();
                        break;
                    case 'Home':
                        this.goToSlide(0);
                        break;
                    case 'End':
                        this.goToSlide(this.totalSlides - 1);
                        break;
                    case ' ':
                    case 'Enter':
                        if (event.target.hasAttribute('data-carousel-control')) {
                            event.target.click();
                        } else {
                            handled = false;
                        }
                        break;
                    default:
                        handled = false;
                }

                if (handled) {
                    event.preventDefault();
                    this.announceSlideChange();
                }
            };

            document.addEventListener('keydown', this._keydownHandler);
        },


        /**
         * Announce slide change to screen readers
         */
        announceSlideChange() {
            const announcement = `Slide ${this.currentSlide + 1} of ${this.totalSlides}`;
            const liveRegion = this.$el.querySelector('[aria-live]');
            if (liveRegion) {
                liveRegion.textContent = announcement;
            }
        },

        /**
         * Update current slide based on scroll position
         */
        updateCurrentSlideFromScroll() {
            const container = this.$refs.scrollContainer;
            if (!container || this.slides.length === 0) return;

            const scrollLeft = container.scrollLeft;
            const containerWidth = container.clientWidth;
            const itemsPerView = this.getCurrentItemsPerView();
            const slideWidth = containerWidth / itemsPerView;
            
            let newCurrentSlide = Math.round(scrollLeft / slideWidth);
            newCurrentSlide = Math.max(0, Math.min(newCurrentSlide, this.totalSlides - 1));
            
            if (newCurrentSlide !== this.currentSlide) {
                const previousSlide = this.currentSlide;
                this.currentSlide = newCurrentSlide;
                
                this.dispatchComponentEvent(EVENTS.CHANGE, { 
                    currentSlide: this.currentSlide,
                    previousSlide: previousSlide,
                    totalSlides: this.totalSlides,
                    programmatic: false
                });
                
                this.$dispatch('carousel-change', {
                    currentSlide: this.currentSlide,
                    previousSlide: previousSlide,
                    totalSlides: this.totalSlides
                });
                
                // Update navigation state after scroll-based change
                this.updateNavigationState();
            }
        },

        /**
         * Get current items per view based on responsive config
         */
        getCurrentItemsPerView() {
            if (typeof this.itemsPerView === 'number') {
                return this.itemsPerView;
            }

            // Simple responsive implementation
            // In a production app, you'd want proper breakpoint detection
            const width = window.innerWidth;
            let result;
            
            if (width >= 1024 && this.itemsPerView.lg) {
                result = this.itemsPerView.lg;
            } else if (width >= 768 && this.itemsPerView.md) {
                result = this.itemsPerView.md;
            } else if (width >= 640 && this.itemsPerView.sm) {
                result = this.itemsPerView.sm;
            } else {
                result = this.itemsPerView.default || 1;
            }
            
            return result;
        },

        /**
         * Update navigation button states
         */
        updateNavigationState() {
            if (this.totalSlides <= 1) {
                this.canGoPrevious = false;
                this.canGoNext = false;
                this.showPrevArrow = false;
                this.showNextArrow = false;
                return;
            }
            
            // Update navigation state based on current position and loop setting
            this.canGoPrevious = this.loop || this.currentSlide > 0;
            this.canGoNext = this.loop || this.currentSlide < this.totalSlides - 1;
            
            this.showPrevArrow = this.canGoPrevious;
            this.showNextArrow = this.canGoNext;
        },

        /**
         * Navigate to specific slide
         * @param {number} index - Target slide index (0-based)
         * @param {boolean} smooth - Use smooth scrolling (default: true)
         */
        goToSlide(index, smooth = true) {
            if (index < 0 || index >= this.totalSlides) return;
            
            const container = this.$refs.scrollContainer;
            if (!container) return;

            const itemsPerView = this.getCurrentItemsPerView();
            const slideWidth = container.clientWidth / itemsPerView;
            const targetScrollLeft = index * slideWidth;
            
            // Mark as programmatic scroll to prevent event conflicts
            this.isProgrammaticScroll = true;
            
            container.scrollTo({
                left: targetScrollLeft,
                behavior: smooth ? 'smooth' : 'auto'
            });

            // Reset programmatic scroll flag after animation
            setTimeout(() => {
                this.isProgrammaticScroll = false;
            }, smooth ? 500 : 50);

            const previousSlide = this.currentSlide;
            this.currentSlide = index;
            
            this.dispatchComponentEvent(EVENTS.CHANGE, {
                currentSlide: this.currentSlide,
                previousSlide: previousSlide,
                totalSlides: this.totalSlides,
                programmatic: true
            });

            this.resetAutoplay();
            this.updateNavigationState();
        },

        /**
         * Go to next slide
         */
        nextSlide() {
            const itemsPerView = this.getCurrentItemsPerView();
            let nextIndex;
            
            if (itemsPerView > 1) {
                // For multi-item view, advance by number of visible items
                nextIndex = Math.min(this.currentSlide + itemsPerView, this.totalSlides - 1);
            } else {
                // For single-item view, advance by 1
                nextIndex = this.currentSlide + 1;
            }
            
            if (nextIndex >= this.totalSlides) {
                if (this.loop) {
                    this.goToSlide(0);
                }
            } else {
                this.goToSlide(nextIndex);
            }
        },

        /**
         * Go to previous slide
         */
        previousSlide() {
            const itemsPerView = this.getCurrentItemsPerView();
            let prevIndex;
            
            if (itemsPerView > 1) {
                // For multi-item view, go back by number of visible items
                prevIndex = Math.max(this.currentSlide - itemsPerView, 0);
            } else {
                // For single-item view, go back by 1
                prevIndex = this.currentSlide - 1;
            }
            
            if (prevIndex < 0) {
                if (this.loop) {
                    this.goToSlide(this.totalSlides - 1);
                }
            } else {
                this.goToSlide(prevIndex);
            }
        },

        /**
         * Start autoplay functionality
         */
        startAutoplay() {
            if (!this.autoplay || this.totalSlides <= 1) return;
            
            this.autoplayEnabled = true;
            this.scheduleNextSlide();
            this.dispatchComponentEvent('carousel-autoplay-start');
        },

        /**
         * Stop autoplay functionality
         */
        stopAutoplay() {
            this.autoplayEnabled = false;
            this.clearAutoplayTimer();
            this.dispatchComponentEvent('carousel-autoplay-stop');
        },

        /**
         * Schedule next slide for autoplay
         */
        scheduleNextSlide() {
            if (this.isPaused || !this.autoplayEnabled) return;

            this.autoplayTimer = setTimeout(() => {
                if (this.autoplayEnabled && !this.isPaused) {
                    this.nextSlide();
                    this.scheduleNextSlide();
                }
            }, this.interval);
        },

        /**
         * Reset autoplay timers
         */
        resetAutoplay() {
            if (!this.autoplayEnabled) return;
            
            this.clearAutoplayTimer();
            
            if (!this.isPaused) {
                this.scheduleNextSlide();
            }
        },

        /**
         * Pause autoplay
         */
        pauseAutoplay() {
            if (!this.autoplayEnabled) return;
            
            this.isPaused = true;
            this.clearAutoplayTimer();
            this.dispatchComponentEvent('carousel-autoplay-pause');
        },

        /**
         * Resume autoplay
         */
        resumeAutoplay() {
            if (!this.autoplayEnabled || !this.isPaused) return;
            
            this.isPaused = false;
            this.scheduleNextSlide();
            this.dispatchComponentEvent('carousel-autoplay-resume');
        },

        /**
         * Clear autoplay timer
         */
        clearAutoplayTimer() {
            if (this.autoplayTimer) {
                clearTimeout(this.autoplayTimer);
                this.autoplayTimer = null;
            }
        },






        /**
         * Handle scroll event
         */
        handleScroll(event) {
            // This is called from the template
            if (!this.isProgrammaticScroll) {
                this.pauseAutoplay();
                // Note: updateCurrentSlideFromScroll is called by the scroll listener
            }
        },






        /**
         * Component cleanup
         */
        destroy() {
            this.clearAutoplayTimer();
            
            // Clean up event listeners
            if (this._scrollHandler && this._scrollContainer) {
                this._scrollContainer.removeEventListener('scroll', this._scrollHandler);
                this._scrollHandler = null;
                this._scrollContainer = null;
            }
            
            if (this._keydownHandler) {
                document.removeEventListener('keydown', this._keydownHandler);
                this._keydownHandler = null;
            }
            
            // Reset state
            this.slides = [];
            this.currentSlide = 0;
            this.totalSlides = 0;
        }
    });
}

export default {
    createCarouselComponent
};

// Global registration for Alpine template access
window.strataCarousel = createCarouselComponent;