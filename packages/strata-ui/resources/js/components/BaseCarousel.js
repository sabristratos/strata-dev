/**
 * Base Carousel Component for Strata UI
 * 
 * Modern CSS scroll-snap carousel with Alpine.js
 * Provides smooth scrolling, touch support, accessibility, and autoplay
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
        // State consolidation
        state: {
            slides: [],
            current: { slide: 0, page: 0 },
            totals: { slides: 0, pages: 0 },
            navigation: { showPrev: false, showNext: false, mode: 'slide' },
            autoplay: { enabled: false, progress: 0, timer: null, progressTimer: null, paused: false },
            touch: { isActive: false, startX: 0, startY: 0, startTime: 0 },
            config: config,
            fallbackMode: false
        },

        // Legacy properties for backward compatibility
        get slides() { return this.state.slides; },
        set slides(value) { this.state.slides = value; },
        get currentSlide() { return this.state.current.slide; },
        set currentSlide(value) { 
            this.state.current.slide = value;
            this.updatePageFromSlide();
        },
        get totalSlides() { return this.state.totals.slides; },
        set totalSlides(value) { this.state.totals.slides = value; },
        get currentPage() { return this.state.current.page; },
        set currentPage(value) { this.state.current.page = value; },
        get totalPages() { return this.state.totals.pages; },
        set totalPages(value) { this.state.totals.pages = value; },
        get showPrevArrow() { return this.state.navigation.showPrev; },
        set showPrevArrow(value) { this.state.navigation.showPrev = value; },
        get showNextArrow() { return this.state.navigation.showNext; },
        set showNextArrow(value) { this.state.navigation.showNext = value; },
        get autoplayEnabled() { return this.state.autoplay.enabled; },
        set autoplayEnabled(value) { this.state.autoplay.enabled = value; },
        get autoplayProgress() { return this.state.autoplay.progress; },
        set autoplayProgress(value) { this.state.autoplay.progress = value; },
        get autoplayTimer() { return this.state.autoplay.timer; },
        set autoplayTimer(value) { this.state.autoplay.timer = value; },
        get progressTimer() { return this.state.autoplay.progressTimer; },
        set progressTimer(value) { this.state.autoplay.progressTimer = value; },
        get isPaused() { return this.state.autoplay.paused; },
        set isPaused(value) { this.state.autoplay.paused = value; },
        get isTouching() { return this.state.touch.isActive; },
        set isTouching(value) { this.state.touch.isActive = value; },
        get touchStartX() { return this.state.touch.startX; },
        set touchStartX(value) { this.state.touch.startX = value; },
        get touchStartY() { return this.state.touch.startY; },
        set touchStartY(value) { this.state.touch.startY = value; },
        get touchStartTime() { return this.state.touch.startTime; },
        set touchStartTime(value) { this.state.touch.startTime = value; },

        // Configuration with defaults and validation
        autoplay: this.validateConfig(config.autoplay || false, 'boolean'),
        interval: this.validateConfig(config.interval || 3000, 'number', { min: 1000, max: 30000 }),
        loop: config.loop !== false,
        itemsPerView: this.normalizeItemsPerView(config.itemsPerView || { default: 1 }),
        variant: this.validateConfig(config.variant || 'default', 'string', { allowed: ['default', 'gallery', 'cards'] }),
        size: this.validateConfig(config.size || 'md', 'string', { allowed: ['sm', 'md', 'lg'] }),
        
        // Touch swipe detection
        swipeThreshold: 50,
        velocityThreshold: 0.3,
        
        // Visibility state
        showProgress: false,
        
        // Performance optimizations
        intersectionObserver: null,
        scrollThrottle: null,
        
        // CSS classes from PHP component
        itemClasses: config.itemClasses || 'flex-shrink-0 snap-center w-full',
        
        /**
         * Validate configuration values
         * @param {any} value - Value to validate
         * @param {string} type - Expected type
         * @param {Object} options - Validation options
         * @returns {any} Validated value
         */
        validateConfig(value, type, options = {}) {
            try {
                if (type === 'boolean' && typeof value === 'boolean') return value;
                if (type === 'string' && typeof value === 'string') {
                    if (options.allowed && !options.allowed.includes(value)) {
                        console.warn(`Invalid ${type} value: ${value}. Using default.`);
                        return options.allowed[0];
                    }
                    return value;
                }
                if (type === 'number' && typeof value === 'number') {
                    if (options.min !== undefined && value < options.min) return options.min;
                    if (options.max !== undefined && value > options.max) return options.max;
                    return value;
                }
                throw new Error(`Invalid type: expected ${type}, got ${typeof value}`);
            } catch (error) {
                console.warn(`Config validation error:`, error);
                return type === 'boolean' ? false : type === 'number' ? 0 : '';
            }
        },

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
         * Execute function safely with error handling
         * @param {string} name - Function name for logging
         * @param {Function} fn - Function to execute
         */
        safeExecute(name, fn) {
            try {
                fn.call(this);
            } catch (error) {
                console.warn(`Carousel ${name} failed:`, error);
                this.state.fallbackMode = true;
            }
        },

        /**
         * Throttle function execution
         * @param {Function} func - Function to throttle
         * @param {number} delay - Delay in milliseconds
         * @returns {Function} Throttled function
         */
        throttle(func, delay) {
            let timeoutId;
            let lastExecTime = 0;
            return function (...args) {
                const currentTime = Date.now();
                
                if (currentTime - lastExecTime > delay) {
                    func.apply(this, args);
                    lastExecTime = currentTime;
                } else {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(() => {
                        func.apply(this, args);
                        lastExecTime = Date.now();
                    }, delay - (currentTime - lastExecTime));
                }
            };
        },

        /**
         * Get navigation mode based on items per view
         * @returns {string} Navigation mode ('slide' or 'page')
         */
        getNavigationMode() {
            const itemsPerView = this.getCurrentItemsPerView();
            const mode = itemsPerView > 1 ? 'page' : 'slide';
            this.state.navigation.mode = mode;
            return mode;
        },

        /**
         * Update page state based on current slide
         */
        updatePageFromSlide() {
            const itemsPerView = this.getCurrentItemsPerView();
            this.state.current.page = Math.floor(this.state.current.slide / itemsPerView);
        },

        /**
         * Initialize carousel component with error handling
         */
        init() {
            try {
                this.$nextTick(() => {
                    this.safeExecute('processSlides', this.processSlides);
                    this.safeExecute('setupScrollListener', this.setupScrollListener);
                    this.safeExecute('setupIntersectionObserver', this.setupIntersectionObserver);
                    this.safeExecute('setupKeyboardNavigation', this.setupKeyboardNavigation);
                    this.safeExecute('updateNavigationState', this.updateNavigationState);
                    this.safeExecute('startAutoplay', this.startAutoplay);
                    
                    // Dispatch ready event
                    this.dispatchComponentEvent(EVENTS.COMPONENT_READY, {
                        totalSlides: this.totalSlides,
                        navigationMode: this.getNavigationMode()
                    });
                });
            } catch (error) {
                console.error('Carousel initialization failed:', error);
                this.state.fallbackMode = true;
            }
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
                index: index,
                isVisible: false
            }));
            
            this.totalSlides = this.slides.length;
            
            // Update page state after slides are processed
            this.updatePageState();
            
            // Apply item classes to each slide with width class replacement
            children.forEach((child, index) => {
                const classesToAdd = this.itemClasses.split(' ').filter(cls => cls.trim() !== '');
                // Get current classes and new width classes to add
                const existingClasses = Array.from(child.classList);
                const newWidthClasses = classesToAdd.filter(cls => 
                    cls.match(/^w-/) || cls.match(/^sm:w-/) || cls.match(/^md:w-/) || cls.match(/^lg:w-/) || cls.match(/^xl:w-/)
                );
                
                // Only remove width classes that are NOT in the new classes to add
                const widthClassesToRemove = existingClasses.filter(cls => {
                    const isWidthClass = cls.match(/^w-/) || cls.match(/^sm:w-/) || cls.match(/^md:w-/) || cls.match(/^lg:w-/) || cls.match(/^xl:w-/);
                    return isWidthClass && !newWidthClasses.includes(cls);
                });
                
                if (widthClassesToRemove.length > 0) {
                    child.classList.remove(...widthClassesToRemove);
                }
                
                // Add only new classes that aren't already present
                const classesToActuallyAdd = classesToAdd.filter(cls => !child.classList.contains(cls));
                if (classesToActuallyAdd.length > 0) {
                    child.classList.add(...classesToActuallyAdd);
                }
            });
        },

        /**
         * Register slide element when rendered
         */
        registerSlide(index, element) {
            if (this.slides[index]) {
                this.slides[index].element = element;
            }
        },

        /**
         * Setup intersection observer for performance optimization with error handling
         */
        setupIntersectionObserver() {
            if (!window.IntersectionObserver || !this.$refs.scrollContainer) return;
            
            try {
                this.intersectionObserver = new IntersectionObserver(
                    this.handleIntersectionChanges.bind(this),
                    { 
                        root: this.$refs.scrollContainer,
                        rootMargin: '0px',
                        threshold: [0, 0.5, 1] // Multiple thresholds for better tracking
                    }
                );
                
                this.addCleanup(() => {
                    if (this.intersectionObserver) {
                        this.intersectionObserver.disconnect();
                        this.intersectionObserver = null;
                    }
                });
            } catch (error) {
                console.warn('IntersectionObserver setup failed:', error);
            }
        },

        /**
         * Handle intersection observer changes
         * @param {IntersectionObserverEntry[]} entries - Observer entries
         */
        handleIntersectionChanges(entries) {
            entries.forEach(entry => {
                const slideIndex = parseInt(entry.target.dataset.slideIndex);
                if (this.slides[slideIndex]) {
                    this.slides[slideIndex].isVisible = entry.isIntersecting;
                    
                    // Announce visible slides to screen readers
                    if (entry.isIntersecting && entry.intersectionRatio > 0.5) {
                        this.announceSlideToScreenReader(slideIndex);
                    }
                }
            });
        },

        /**
         * Setup scroll event listener with proper throttling
         */
        setupScrollListener() {
            const container = this.$refs.scrollContainer;
            if (!container) return;

            const throttledHandler = this.throttle((event) => {
                if (!this.isProgrammaticScroll && !this.state.fallbackMode) {
                    this.updateCurrentSlideFromScroll();
                    this.updateNavigationState();
                }
            }, 16); // 60fps

            container.addEventListener('scroll', throttledHandler, { passive: true });
            this.addCleanup(() => {
                container.removeEventListener('scroll', throttledHandler);
                if (this.scrollThrottle) {
                    clearTimeout(this.scrollThrottle);
                }
            });
        },

        /**
         * Setup enhanced keyboard navigation with accessibility improvements
         */
        setupKeyboardNavigation() {
            const handleKeydown = (event) => {
                if (!this.$el.contains(document.activeElement)) return;

                let handled = true;
                const navigationMode = this.getNavigationMode();

                switch (event.key) {
                    case 'ArrowLeft':
                        this.navigateWithMode('previous', navigationMode);
                        break;
                    case 'ArrowRight':
                        this.navigateWithMode('next', navigationMode);
                        break;
                    case 'PageUp':
                        this.navigateByPage(-1);
                        break;
                    case 'PageDown':
                        this.navigateByPage(1);
                        break;
                    case 'Home':
                        this.goToSlide(0, { reason: 'keyboard' });
                        break;
                    case 'End':
                        this.goToSlide(this.totalSlides - 1, { reason: 'keyboard' });
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

            document.addEventListener('keydown', handleKeydown);
            this.addCleanup(() => document.removeEventListener('keydown', handleKeydown));
        },

        /**
         * Navigate with current mode (slide or page)
         * @param {string} direction - 'next' or 'previous'
         * @param {string} mode - 'slide' or 'page'
         */
        navigateWithMode(direction, mode) {
            if (mode === 'page') {
                direction === 'next' ? this.nextPage() : this.previousPage();
            } else {
                direction === 'next' ? this.nextSlide() : this.previousSlide();
            }
        },

        /**
         * Navigate by page for multi-item carousels
         * @param {number} direction - 1 for next, -1 for previous
         */
        navigateByPage(direction) {
            const navigationMode = this.getNavigationMode();
            if (navigationMode === 'page') {
                direction > 0 ? this.nextPage() : this.previousPage();
            } else {
                const itemsPerView = this.getCurrentItemsPerView();
                const targetSlide = this.currentSlide + (direction * itemsPerView);
                const clampedTarget = Math.max(0, Math.min(targetSlide, this.totalSlides - 1));
                this.goToSlide(clampedTarget, { reason: 'keyboard' });
            }
        },

        /**
         * Announce slide change to screen readers
         */
        announceSlideChange() {
            const announcement = `Slide ${this.currentSlide + 1} of ${this.totalSlides}`;
            this.announceToScreenReader(announcement);
        },

        /**
         * Announce slide to screen readers
         * @param {number} slideIndex - Index of slide to announce
         */
        announceSlideToScreenReader(slideIndex) {
            if (this.shouldAnnounceSlide(slideIndex)) {
                const slide = this.slides[slideIndex];
                if (slide && slide.element) {
                    const content = this.extractSlideContent(slide.element);
                    const announcement = `Slide ${slideIndex + 1}: ${content}`;
                    this.announceToScreenReader(announcement);
                }
            }
        },

        /**
         * Check if slide should be announced
         * @param {number} slideIndex - Index of slide
         * @returns {boolean}
         */
        shouldAnnounceSlide(slideIndex) {
            return slideIndex === this.currentSlide && !this.state.autoplay.enabled;
        },

        /**
         * Extract content from slide for screen reader announcement
         * @param {Element} element - Slide element
         * @returns {string} Slide content
         */
        extractSlideContent(element) {
            const headings = element.querySelectorAll('h1, h2, h3, h4, h5, h6');
            if (headings.length > 0) {
                return headings[0].textContent.trim();
            }
            
            const images = element.querySelectorAll('img[alt]');
            if (images.length > 0) {
                return images[0].alt;
            }
            
            return element.textContent.trim().substring(0, 50) + '...';
        },

        /**
         * Announce to screen readers using live region
         * @param {string} message - Message to announce
         */
        announceToScreenReader(message) {
            const liveRegion = this.$el.querySelector('[aria-live]');
            if (liveRegion) {
                liveRegion.textContent = message;
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
                
                // Update page state after scroll-based slide change
                this.updatePageState();
                
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
         * Update navigation button states with consistent mode logic
         */
        updateNavigationState() {
            if (this.totalSlides <= 1) {
                this.showPrevArrow = false;
                this.showNextArrow = false;
                return;
            }
            
            const navigationMode = this.getNavigationMode();
            let canGoPrev, canGoNext;
            
            if (navigationMode === 'page') {
                // Multi-item carousel: use page-based logic
                canGoPrev = this.loop || this.currentPage > 0;
                canGoNext = this.loop || this.currentPage < this.totalPages - 1;
            } else {
                // Single-item carousel: use slide-based logic
                canGoPrev = this.loop || this.currentSlide > 0;
                canGoNext = this.loop || this.currentSlide < this.totalSlides - 1;
            }
            
            this.state.navigation.showPrev = canGoPrev;
            this.state.navigation.showNext = canGoNext;
        },

        /**
         * Navigate to specific slide with smooth animation
         * @param {number} index - Target slide index (0-based)
         * @param {Object} options - Animation options
         * @param {boolean} options.smooth - Use smooth scrolling (default: true)
         * @param {string} options.reason - Reason for navigation (user|auto|programmatic|keyboard)
         */
        goToSlide(index, options = {}) {
            if (index < 0 || index >= this.totalSlides || this.state.fallbackMode) return;
            
            const container = this.$refs.scrollContainer;
            if (!container) return;

            const itemsPerView = this.getCurrentItemsPerView();
            const slideWidth = container.clientWidth / itemsPerView;
            const targetScrollLeft = index * slideWidth;
            
            // Mark as programmatic scroll to prevent event conflicts
            this.isProgrammaticScroll = true;
            
            try {
                container.scrollTo({
                    left: targetScrollLeft,
                    behavior: options.smooth !== false ? 'smooth' : 'auto'
                });
            } catch (error) {
                console.warn('Scroll failed, using fallback:', error);
                container.scrollLeft = targetScrollLeft;
            }

            // Reset programmatic scroll flag after animation
            const resetDelay = options.smooth !== false ? 500 : 50;
            setTimeout(() => {
                this.isProgrammaticScroll = false;
            }, resetDelay);

            const previousSlide = this.currentSlide;
            this.currentSlide = index;
            
            // Update page state after slide change
            this.updatePageState();
            
            this.dispatchComponentEvent(EVENTS.CHANGE, {
                currentSlide: this.currentSlide,
                previousSlide: previousSlide,
                totalSlides: this.totalSlides,
                totalPages: this.totalPages,
                programmatic: true,
                reason: options.reason || 'programmatic',
                navigationMode: this.getNavigationMode()
            });

            this.resetAutoplay();
            this.updateNavigationState();
            
            // Announce change if initiated by user
            if (options.reason && ['keyboard', 'user'].includes(options.reason)) {
                this.announceSlideChange();
            }
        },

        /**
         * Go to next slide with consistent navigation mode
         */
        nextSlide() {
            const navigationMode = this.getNavigationMode();
            
            if (navigationMode === 'page') {
                this.nextPage();
            } else {
                this.nextSlideDirect();
            }
        },

        /**
         * Go to next page in multi-item view
         */
        nextPage() {
            const nextPage = this.currentPage + 1;
            if (nextPage >= this.totalPages) {
                if (this.loop) {
                    this.goToPage(0, 'next');
                }
            } else {
                this.goToPage(nextPage, 'next');
            }
        },

        /**
         * Go to next slide directly (always slide-based, used for touch and autoplay)
         */
        nextSlideDirect() {
            const nextIndex = this.currentSlide + 1;
            if (nextIndex >= this.totalSlides) {
                if (this.loop) {
                    this.goToSlide(0);
                }
            } else {
                this.goToSlide(nextIndex);
            }
        },

        /**
         * Go to previous slide with consistent navigation mode
         */
        previousSlide() {
            const navigationMode = this.getNavigationMode();
            
            if (navigationMode === 'page') {
                this.previousPage();
            } else {
                this.previousSlideDirect();
            }
        },

        /**
         * Go to previous page in multi-item view
         */
        previousPage() {
            const prevPage = this.currentPage - 1;
            if (prevPage < 0) {
                if (this.loop) {
                    this.goToPage(this.totalPages - 1, 'prev');
                }
            } else {
                this.goToPage(prevPage, 'prev');
            }
        },

        /**
         * Go to previous slide directly (always slide-based, used for touch and autoplay)
         */
        previousSlideDirect() {
            const prevIndex = this.currentSlide - 1;
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
            this.showProgress = true;
            this.scheduleNextSlide();

            this.dispatchComponentEvent('carousel-autoplay-start');
        },

        /**
         * Stop autoplay functionality
         */
        stopAutoplay() {
            this.autoplayEnabled = false;
            this.showProgress = false;
            this.clearAutoplayTimer();
            this.clearProgressTimer();

            this.dispatchComponentEvent('carousel-autoplay-stop');
        },

        /**
         * Schedule next slide for autoplay
         */
        scheduleNextSlide() {
            if (this.isPaused || !this.autoplayEnabled) return;

            this.autoplayProgress = 0;
            
            // Progress animation
            this.progressTimer = setInterval(() => {
                if (this.isPaused || !this.autoplayEnabled) return;
                
                this.autoplayProgress += (100 / (this.interval / 100));
                if (this.autoplayProgress >= 100) {
                    this.clearProgressTimer();
                }
            }, 100);

            // Next slide timer
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
            this.clearProgressTimer();
            
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
            this.clearProgressTimer();
            
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
         * Clear progress timer
         */
        clearProgressTimer() {
            if (this.progressTimer) {
                clearInterval(this.progressTimer);
                this.progressTimer = null;
            }
        },

        /**
         * Handle touch start event
         */
        handleTouchStart(event) {
            this.isTouching = true;
            this.touchStartX = event.touches[0].clientX;
            this.touchStartY = event.touches[0].clientY;
            this.touchStartTime = Date.now();
            this.pauseAutoplay();
        },

        /**
         * Handle touch move event
         */
        handleTouchMove(event) {
            // Let browser handle native scrolling - no custom logic needed
            // The CSS scroll-snap will handle smooth snapping automatically
        },

        /**
         * Handle touch end event with navigation mode awareness
         */
        handleTouchEnd(event) {
            if (!this.isTouching) return;
            
            this.isTouching = false;
            const touchEndX = event.changedTouches[0].clientX;
            const touchEndY = event.changedTouches[0].clientY;
            const touchEndTime = Date.now();
            
            // Calculate swipe metrics
            const deltaX = touchEndX - this.touchStartX;
            const deltaY = touchEndY - this.touchStartY;
            const deltaTime = touchEndTime - this.touchStartTime;
            const velocity = Math.abs(deltaX) / deltaTime; // px per ms
            
            // Determine if this was a deliberate swipe (vs accidental touch)
            const isHorizontalSwipe = Math.abs(deltaX) > Math.abs(deltaY);
            const isQuickSwipe = velocity > this.velocityThreshold;
            const isLongSwipe = Math.abs(deltaX) > this.swipeThreshold;
            
            // Navigate if swipe was intentional
            if (isHorizontalSwipe && (isQuickSwipe || isLongSwipe)) {
                const navigationMode = this.getNavigationMode();
                
                // For page mode, use page navigation; for slide mode, use direct slide navigation
                if (navigationMode === 'page') {
                    if (deltaX > 0) {
                        this.previousPage();
                    } else {
                        this.nextPage();
                    }
                } else {
                    // Always use direct slide navigation for natural touch feel in slide mode
                    if (deltaX > 0) {
                        this.previousSlideDirect();
                    } else {
                        this.nextSlideDirect();
                    }
                }
                
                // Dispatch swipe event
                this.dispatchComponentEvent('carousel-swipe', {
                    direction: deltaX > 0 ? 'right' : 'left',
                    distance: Math.abs(deltaX),
                    velocity: velocity,
                    navigationMode: navigationMode
                });
            }
            
            // Resume autoplay after a delay
            setTimeout(() => {
                this.resumeAutoplay();
            }, 1000);
        },





        /**
         * Handle scroll event
         */
        handleScroll(event) {
            // This is called from the template
            if (!this.isProgrammaticScroll) {
                this.pauseAutoplay();
                
                // Update current slide based on scroll position
                this.updateCurrentSlideFromScroll();
            }
        },


        /**
         * Get item CSS classes
         */
        getItemClasses() {
            // This will be populated from the PHP component
            return this.itemClasses || 'flex-shrink-0 snap-center w-full';
        },


        /**
         * Get total number of pages based on items per view
         */
        getTotalPages() {
            const itemsPerView = this.getCurrentItemsPerView();
            return Math.ceil(this.totalSlides / itemsPerView);
        },

        /**
         * Get current page index based on current slide
         */
        getCurrentPage() {
            const itemsPerView = this.getCurrentItemsPerView();
            return Math.floor(this.currentSlide / itemsPerView);
        },

        /**
         * Navigate to specific page
         * @param {number} pageIndex - Target page index
         * @param {string} direction - Navigation direction ('next' or 'prev')
         */
        goToPage(pageIndex, direction = 'next') {
            const itemsPerView = this.getCurrentItemsPerView();
            let targetSlideIndex;
            
            if (direction === 'prev') {
                // When going backward, go to the last slide of the page for intuitive navigation
                targetSlideIndex = Math.min(
                    (pageIndex + 1) * itemsPerView - 1,
                    this.totalSlides - 1
                );
            } else {
                // When going forward, go to the first slide of the page for consistent looping
                targetSlideIndex = pageIndex * itemsPerView;
            }
            
            this.goToSlide(targetSlideIndex);
        },

        /**
         * Update page state based on current slide and itemsPerView
         */
        updatePageState() {
            this.currentPage = this.getCurrentPage();
            this.totalPages = this.getTotalPages();
        },

        /**
         * Check if can go to previous slide/page with consistent mode logic
         */
        get canGoPrevious() {
            if (this.totalSlides <= 1) return false;
            
            const navigationMode = this.getNavigationMode();
            if (navigationMode === 'page') {
                return this.loop || this.currentPage > 0;
            } else {
                return this.loop || this.currentSlide > 0;
            }
        },

        /**
         * Check if can go to next slide/page with consistent mode logic
         */
        get canGoNext() {
            if (this.totalSlides <= 1) return false;
            
            const navigationMode = this.getNavigationMode();
            if (navigationMode === 'page') {
                return this.loop || this.currentPage < this.totalPages - 1;
            } else {
                return this.loop || this.currentSlide < this.totalSlides - 1;
            }
        },

        /**
         * Get progress percentage for progress indicators
         */
        get progressPercentage() {
            if (this.totalSlides <= 1) return 100;
            return ((this.currentSlide + 1) / this.totalSlides) * 100;
        },

        /**
         * Get carousel statistics
         */
        get stats() {
            return {
                currentSlide: this.currentSlide,
                totalSlides: this.totalSlides,
                isAutoplayActive: this.autoplayEnabled && !this.isPaused,
                canGoPrevious: this.canGoPrevious,
                canGoNext: this.canGoNext
            };
        },

        /**
         * Enhanced component cleanup
         */
        destroy() {
            this.clearAutoplayTimer();
            this.clearProgressTimer();
            
            if (this.intersectionObserver) {
                this.intersectionObserver.disconnect();
                this.intersectionObserver = null;
            }
            
            if (this.scrollThrottle) {
                clearTimeout(this.scrollThrottle);
                this.scrollThrottle = null;
            }
            
            // Reset state
            this.state.fallbackMode = false;
            this.state.slides = [];
            this.state.current = { slide: 0, page: 0 };
            this.state.totals = { slides: 0, pages: 0 };
        }
    });
}

export default {
    createCarouselComponent
};