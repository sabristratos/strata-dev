/**
 * Base Carousel Component for Strata UI
 * 
 * Simplified CSS scroll-snap carousel with Alpine.js
 * Focus on essential functionality: navigation, autoplay, accessibility
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { dispatchElementEvent, addEventListener, EVENTS } from '../utilities/events.js';
import { ANIMATION_DURATIONS } from '../utilities/animation.js';

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


        _scrollContainer: null,
        _cachedDimensions: null,
        _resizeObserver: null,
        _animationFrameId: null,
        _scrollUpdateScheduled: false,


        autoplay: config.autoplay || false,
        interval: Math.max(1000, Math.min(30000, config.interval || 3000)),
        loop: config.loop !== false,
        itemsPerView: { default: 1 }, // Will be normalized in init()
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
            try {
                for (let i = 0; i < maxRetries; i++) {
                    if (this.$refs.scrollContainer) {
                        return this.$refs.scrollContainer;
                    }
                    await new Promise(resolve => setTimeout(resolve, delay));
                }

                console.warn('Strata Carousel: Scroll container not found after retries');
                return null;
            } catch (error) {
                console.error('Strata Carousel: Error waiting for container:', error);
                return null;
            }
        },

        /**
         * Initialize carousel with retry logic for slides
         */
        async initializeSlides(retries = 3) {
            this.processSlides();
            

            if (this.totalSlides === 0 && retries > 0) {
                await new Promise(resolve => setTimeout(resolve, ANIMATION_DURATIONS.FAST));
                return this.initializeSlides(retries - 1);
            }
        },

        /**
         * Initialize carousel component
         */
        async init() {
            try {

                this.itemsPerView = this.normalizeItemsPerView(config.itemsPerView || { default: 1 });
                

                const container = await this.waitForContainer();
                if (!container) {
                    console.error('Strata Carousel: Cannot initialize without scroll container');
                    return;
                }
                

                this._scrollContainer = container;
                this.setupResizeObserver();
                
                this.$nextTick(async () => {
                    try {
                        await this.initializeSlides();
                        this.setupScrollListener();
                        this.setupKeyboardNavigation();
                        this.updateNavigationState();
                        
                        if (this.autoplay && this.totalSlides > 1) {
                            this.startAutoplay();
                        }
                        

                        this.dispatchComponentEvent(EVENTS.CAROUSEL_READY, {
                            totalSlides: this.totalSlides,
                            currentSlide: this.currentSlide
                        });
                    } catch (error) {
                        console.error('Strata Carousel: Initialization error:', error);
                    }
                });
            } catch (error) {
                console.error('Strata Carousel: Critical initialization error:', error);
            }
        },

        /**
         * Process direct children as slides
         */
        /**
         * Setup resize observer for performance-optimized dimension caching
         */
        setupResizeObserver() {
            try {
                if (typeof ResizeObserver === 'undefined' || !this._scrollContainer) return;

                this._resizeObserver = new ResizeObserver(entries => {
                    for (const entry of entries) {
                        this._cachedDimensions = {
                            width: entry.contentRect.width,
                            height: entry.contentRect.height,
                            timestamp: Date.now()
                        };
                        this.updateNavigationState();
                    }
                });

                this._resizeObserver.observe(this._scrollContainer);
                const cleanup = () => {
                    if (this._resizeObserver) {
                        this._resizeObserver.disconnect();
                        this._resizeObserver = null;
                    }
                };
                this.addCleanup(cleanup);
            } catch (error) {
                console.warn('Strata Carousel: Error setting up resize observer:', error);
            }
        },

        /**
         * Get cached container dimensions for performance
         */
        getContainerDimensions() {
            if (this._cachedDimensions && (Date.now() - this._cachedDimensions.timestamp < 100)) {
                return this._cachedDimensions;
            }
            
            if (this._scrollContainer) {
                this._cachedDimensions = {
                    width: this._scrollContainer.clientWidth,
                    height: this._scrollContainer.clientHeight,
                    timestamp: Date.now()
                };
                return this._cachedDimensions;
            }
            
            return { width: 0, height: 0 };
        },

        processSlides() {
            try {
                const container = this._scrollContainer || this.$refs.scrollContainer;
                if (!container) {
                    console.warn('Strata Carousel: Cannot process slides without container');
                    return;
                }


                const children = Array.from(container.children);
                this.slides = children.map((child, index) => ({
                    element: child,
                    index: index
                }));
                
                this.totalSlides = this.slides.length;
                

                children.forEach((child, index) => {
                    try {
                        const classesToAdd = this.itemClasses.split(' ').filter(cls => cls.trim() !== '');
                        const classesToActuallyAdd = classesToAdd.filter(cls => !child.classList.contains(cls));
                        if (classesToActuallyAdd.length > 0) {
                            child.classList.add(...classesToActuallyAdd);
                        }
                        
                        if (!child.classList.contains('strata-carousel-item')) {
                            child.classList.add('strata-carousel-item');
                        }
                    } catch (error) {
                        console.warn(`Strata Carousel: Error processing slide ${index}:`, error);
                    }
                });
            } catch (error) {
                console.error('Strata Carousel: Critical error processing slides:', error);
                this.slides = [];
                this.totalSlides = 0;
            }
        },


        /**
         * Setup scroll event listener
         */
        setupScrollListener() {
            try {
                const container = this._scrollContainer || this.$refs.scrollContainer;
                if (!container) {
                    console.warn('Strata Carousel: Cannot setup scroll listener without container');
                    return;
                }

                const scrollHandler = () => {
                    try {
                        if (!this.isProgrammaticScroll && !this._scrollUpdateScheduled) {
                            this._scrollUpdateScheduled = true;
                            this._animationFrameId = requestAnimationFrame(() => {
                                this._scrollUpdateScheduled = false;
                                this.updateCurrentSlideFromScroll();
                                this.updateNavigationState();
                            });
                        }
                    } catch (error) {
                        console.warn('Strata Carousel: Error in scroll handler:', error);
                    }
                };
                

                const cleanup = addEventListener(container, 'scroll', scrollHandler, { passive: true });
                this.addCleanup(cleanup);
                

                this.addCleanup(() => {
                    if (this._animationFrameId) {
                        cancelAnimationFrame(this._animationFrameId);
                        this._animationFrameId = null;
                    }
                });
            } catch (error) {
                console.error('Strata Carousel: Error setting up scroll listener:', error);
            }
        },

        /**
         * Setup keyboard navigation
         */
        setupKeyboardNavigation() {
            const keydownHandler = (event) => {
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

            const cleanup = addEventListener(document, 'keydown', keydownHandler);
            this.addCleanup(cleanup);
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
            const container = this._scrollContainer || this.$refs.scrollContainer;
            if (!container || this.slides.length === 0) return;

            const scrollLeft = container.scrollLeft;
            const dimensions = this.getContainerDimensions();
            const itemsPerView = this.getCurrentItemsPerView();
            const slideWidth = dimensions.width / itemsPerView;
            
            let newCurrentSlide = Math.round(scrollLeft / slideWidth);
            newCurrentSlide = Math.max(0, Math.min(newCurrentSlide, this.totalSlides - 1));
            
            if (newCurrentSlide !== this.currentSlide) {
                const previousSlide = this.currentSlide;
                this.currentSlide = newCurrentSlide;
                
                this.dispatchComponentEvent(EVENTS.CAROUSEL_SLIDE_CHANGE, { 
                    currentSlide: this.currentSlide,
                    previousSlide: previousSlide,
                    totalSlides: this.totalSlides,
                    programmatic: false
                });
                

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
            try {
                if (index < 0 || index >= this.totalSlides) {
                    console.warn(`Strata Carousel: Invalid slide index ${index}. Must be between 0 and ${this.totalSlides - 1}`);
                    return;
                }
                
                const container = this._scrollContainer || this.$refs.scrollContainer;
                if (!container) {
                    console.warn('Strata Carousel: Cannot navigate without scroll container');
                    return;
                }

                const itemsPerView = this.getCurrentItemsPerView();
                const dimensions = this.getContainerDimensions();
                const slideWidth = dimensions.width / itemsPerView;
                const targetScrollLeft = index * slideWidth;
                

                this.isProgrammaticScroll = true;
                
                container.scrollTo({
                    left: targetScrollLeft,
                    behavior: smooth ? 'smooth' : 'auto'
                });


                setTimeout(() => {
                    this.isProgrammaticScroll = false;
                }, smooth ? 500 : 50);

                const previousSlide = this.currentSlide;
                this.currentSlide = index;
                
                this.dispatchComponentEvent(EVENTS.CAROUSEL_SLIDE_CHANGE, {
                    currentSlide: this.currentSlide,
                    previousSlide: previousSlide,
                    totalSlides: this.totalSlides,
                    programmatic: true
                });

                this.resetAutoplay();
                this.updateNavigationState();
            } catch (error) {
                console.error('Strata Carousel: Error navigating to slide:', error);
            }
        },

        /**
         * Go to next slide
         */
        nextSlide() {
            const itemsPerView = this.getCurrentItemsPerView();
            let nextIndex;
            
            if (itemsPerView > 1) {

                nextIndex = Math.min(this.currentSlide + itemsPerView, this.totalSlides - 1);
            } else {

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

                prevIndex = Math.max(this.currentSlide - itemsPerView, 0);
            } else {

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
            this.dispatchComponentEvent(EVENTS.CAROUSEL_AUTOPLAY_START);
        },

        /**
         * Stop autoplay functionality
         */
        stopAutoplay() {
            this.autoplayEnabled = false;
            this.clearAutoplayTimer();
            this.dispatchComponentEvent(EVENTS.CAROUSEL_AUTOPLAY_STOP);
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
            this.dispatchComponentEvent(EVENTS.CAROUSEL_AUTOPLAY_PAUSE);
        },

        /**
         * Resume autoplay
         */
        resumeAutoplay() {
            if (!this.autoplayEnabled || !this.isPaused) return;
            
            this.isPaused = false;
            this.scheduleNextSlide();
            this.dispatchComponentEvent(EVENTS.CAROUSEL_AUTOPLAY_RESUME);
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

            if (!this.isProgrammaticScroll) {
                this.pauseAutoplay();

            }
        },






        /**
         * Component cleanup
         */
        destroy() {
            this.clearAutoplayTimer();
            

            this.slides = [];
            this.currentSlide = 0;
            this.totalSlides = 0;
        }
    });
}

export default {
    createCarouselComponent
};


window.strataCarousel = createCarouselComponent;