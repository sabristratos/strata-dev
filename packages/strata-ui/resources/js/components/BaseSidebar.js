/**
 * Base Sidebar Component for Strata UI
 * 
 * Provides sidebar functionality with multiple variants, responsive behavior,
 * and state management using Alpine.js and the BaseComponent system.
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { lockBodyScroll, unlockBodyScroll } from '../utilities/dom.js';
import { dispatchGlobalEvent, addEventListener, EVENTS } from '../utilities/events.js';

/**
 * Create a base sidebar component using Alpine.js
 * @param {Object} config - Sidebar configuration
 * @returns {Object} Sidebar component configuration
 */
export function createSidebarComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-sidebar'
    });
    
    return extendComponent(baseComponent, {
        // Sidebar state
        show: false,
        collapsed: false,
        name: config.name || 'main',
        variant: config.variant || 'overlay',
        persistent: config.persistent || false,
        collapsible: config.collapsible || false,
        
        // Internal state
        _breakpoint: 768, // md breakpoint
        _isMobile: false,
        _storageKey: null,
        _touchStartX: null,
        _touchStartY: null,
        _touchCurrentX: null,
        _isDragging: false,
        _dragThreshold: 10,
        _swipeThreshold: 100,
        
        /**
         * Sidebar-specific initialization
         */
        init() {
            // Initialize responsive behavior
            this.checkMobile();
            this.setupResponsiveHandling();
            
            // Set up storage key for persistence
            if (this.persistent) {
                this._storageKey = `strata-sidebar-${this.name}`;
                this.loadPersistedState();
            }
            
            // Set initial state based on variant
            this.setInitialState();
            
            // Set up event listeners
            this.setupEventListeners();
            
            // Set up keyboard handling
            this.setupKeyboardHandling();
        },
        
        /**
         * Check if current viewport is mobile
         */
        checkMobile() {
            this._isMobile = window.innerWidth < this._breakpoint;
        },
        
        /**
         * Set up responsive window handling with debouncing
         */
        setupResponsiveHandling() {
            let resizeTimeout;
            const handleResize = () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    const wasMobile = this._isMobile;
                    this.checkMobile();
                    
                    // Handle mobile/desktop transitions
                    if (wasMobile && !this._isMobile) {
                        // Switched from mobile to desktop
                        this.handleMobileToDesktop();
                    } else if (!wasMobile && this._isMobile) {
                        // Switched from desktop to mobile
                        this.handleDesktopToMobile();
                    }
                }, 150); // Debounce resize events
            };
            
            this._strataCleanupFunctions.push(
                addEventListener(window, 'resize', handleResize, { passive: true })
            );
        },
        
        /**
         * Handle transition from mobile to desktop
         */
        handleMobileToDesktop() {
            if (this.variant === 'fixed') {
                this.show = true;
                unlockBodyScroll();
            } else if (this.variant === 'hybrid') {
                this.show = true;
                unlockBodyScroll();
            }
        },
        
        /**
         * Handle transition from desktop to mobile
         */
        handleDesktopToMobile() {
            if (this.variant === 'fixed' || this.variant === 'hybrid') {
                this.show = false;
            }
        },
        
        /**
         * Set initial sidebar state based on variant and screen size
         */
        setInitialState() {
            if (this.variant === 'fixed' && !this._isMobile) {
                this.show = true;
            } else if (this.variant === 'hybrid' && !this._isMobile) {
                this.show = true;
            } else {
                this.show = false;
            }
        },
        
        /**
         * Set up sidebar-specific event listeners
         */
        setupEventListeners() {
            // Listen for global sidebar events
            this._strataCleanupFunctions.push(
                addEventListener(window, `strata-sidebar-show-${this.name}`, () => this.open()),
                addEventListener(window, `strata-sidebar-hide-${this.name}`, () => this.close()),
                addEventListener(window, `strata-sidebar-toggle-${this.name}`, () => this.toggle())
            );
            
            // Listen for global close all sidebars
            this._strataCleanupFunctions.push(
                addEventListener(window, 'strata-sidebars-close-all', () => {
                    if (this.variant !== 'fixed') {
                        this.close();
                    }
                })
            );
        },
        
        /**
         * Set up keyboard handling
         */
        setupKeyboardHandling() {
            const handleEscape = (event) => {
                if (event.key === 'Escape' && this.show && this.variant !== 'fixed') {
                    this.close();
                }
            };
            
            this._strataCleanupFunctions.push(
                addEventListener(document, 'keydown', handleEscape)
            );
        },
        
        /**
         * Open the sidebar
         */
        open() {
            if (this.show) return;
            
            this.show = true;
            
            // Lock body scroll for overlay variants on mobile
            if ((this.variant === 'overlay' || (this.variant === 'hybrid' && this._isMobile))) {
                lockBodyScroll();
            }
            
            // Update aria-expanded on toggle buttons
            this.updateToggleButtons(true);
            
            // Save state if persistent
            this.saveState();
            
            // Dispatch event
            this.dispatchSidebarEvent('opened');
            
            // Focus management - focus first focusable element in sidebar
            this.$nextTick(() => {
                const firstFocusable = this.$el.querySelector('a, button, [tabindex]:not([tabindex="-1"])');
                if (firstFocusable) {
                    firstFocusable.focus();
                }
            });
        },
        
        /**
         * Close the sidebar
         */
        close() {
            if (!this.show) return;
            
            this.show = false;
            
            // Unlock body scroll
            unlockBodyScroll();
            
            // Update aria-expanded on toggle buttons
            this.updateToggleButtons(false);
            
            // Save state if persistent
            this.saveState();
            
            // Dispatch event
            this.dispatchSidebarEvent('closed');
        },
        
        /**
         * Toggle sidebar open/closed state
         */
        toggle() {
            if (this.show) {
                this.close();
            } else {
                this.open();
            }
        },
        
        /**
         * Toggle collapsed state (for collapsible sidebars)
         */
        toggleCollapsed() {
            if (!this.collapsible) return;
            
            this.collapsed = !this.collapsed;
            this.saveState();
            this.dispatchSidebarEvent('collapsed');
        },
        
        /**
         * Update aria-expanded attribute on toggle buttons
         */
        updateToggleButtons(expanded) {
            const toggleButtons = document.querySelectorAll(`[aria-controls="strata-sidebar-${this.name}"]`);
            toggleButtons.forEach(button => {
                button.setAttribute('aria-expanded', expanded ? 'true' : 'false');
            });
        },
        
        /**
         * Load persisted state from storage
         */
        loadPersistedState() {
            if (!this._storageKey) return;
            
            try {
                const stored = localStorage.getItem(this._storageKey);
                if (stored) {
                    const state = JSON.parse(stored);
                    if (typeof state.show === 'boolean') {
                        this.show = state.show;
                    }
                    if (typeof state.collapsed === 'boolean') {
                        this.collapsed = state.collapsed;
                    }
                }
            } catch (error) {
                console.warn('Failed to load sidebar state:', error);
            }
        },
        
        /**
         * Save current state to storage
         */
        saveState() {
            if (!this.persistent || !this._storageKey) return;
            
            try {
                const state = {
                    show: this.show,
                    collapsed: this.collapsed,
                };
                localStorage.setItem(this._storageKey, JSON.stringify(state));
            } catch (error) {
                console.warn('Failed to save sidebar state:', error);
            }
        },
        
        /**
         * Dispatch sidebar-specific events
         */
        dispatchSidebarEvent(action) {
            const eventName = `strata-sidebar-${action}`;
            dispatchGlobalEvent(eventName, {
                name: this.name,
                variant: this.variant,
                show: this.show,
                collapsed: this.collapsed
            });
        },
        
        /**
         * Handle touch start for swipe gestures
         */
        handleTouchStart(event) {
            if (!this._isMobile || this.variant === 'fixed') return;
            
            this._touchStartX = event.touches[0].clientX;
            this._touchStartY = event.touches[0].clientY;
            this._touchCurrentX = this._touchStartX;
            this._isDragging = false;
        },
        
        /**
         * Handle touch move for swipe gestures
         */
        handleTouchMove(event) {
            if (!this._touchStartX || !this._isMobile || this.variant === 'fixed') return;
            
            this._touchCurrentX = event.touches[0].clientX;
            const touchDeltaX = this._touchCurrentX - this._touchStartX;
            const touchDeltaY = event.touches[0].clientY - this._touchStartY;
            
            // Determine if this is a horizontal swipe
            if (Math.abs(touchDeltaX) > this._dragThreshold && Math.abs(touchDeltaX) > Math.abs(touchDeltaY)) {
                this._isDragging = true;
                
                // For overlay sidebars, allow visual feedback during drag
                if (this.show && this.variant === 'overlay') {
                    const shouldClose = this.position === 'left' ? touchDeltaX < 0 : touchDeltaX > 0;
                    if (shouldClose && Math.abs(touchDeltaX) > this._dragThreshold) {
                        // Add visual feedback here if desired
                    }
                }
            }
        },
        
        /**
         * Handle touch end for swipe gestures
         */
        handleTouchEnd(event) {
            if (!this._touchStartX || !this._isMobile || this.variant === 'fixed') {
                this._resetTouchState();
                return;
            }
            
            const touchDeltaX = this._touchCurrentX - this._touchStartX;
            const swipeDistance = Math.abs(touchDeltaX);
            
            // Only process if this was a horizontal drag and meets threshold
            if (this._isDragging && swipeDistance > this._swipeThreshold) {
                const isLeftSwipe = touchDeltaX < 0;
                const isRightSwipe = touchDeltaX > 0;
                
                // Handle swipe based on sidebar position and direction
                if (this.position === 'left') {
                    if (isLeftSwipe && this.show) {
                        this.close();
                    } else if (isRightSwipe && !this.show) {
                        // Could open sidebar with right swipe from screen edge
                        const startFromEdge = this._touchStartX < 20; // Within 20px of left edge
                        if (startFromEdge) {
                            this.open();
                        }
                    }
                } else if (this.position === 'right') {
                    if (isRightSwipe && this.show) {
                        this.close();
                    } else if (isLeftSwipe && !this.show) {
                        // Could open sidebar with left swipe from right edge
                        const startFromEdge = this._touchStartX > window.innerWidth - 20;
                        if (startFromEdge) {
                            this.open();
                        }
                    }
                }
            }
            
            this._resetTouchState();
        },
        
        /**
         * Reset touch tracking state
         */
        _resetTouchState() {
            this._touchStartX = null;
            this._touchStartY = null;
            this._touchCurrentX = null;
            this._isDragging = false;
        },
        
        /**
         * Sidebar-specific cleanup
         */
        destroy() {
            // Unlock body scroll if locked
            unlockBodyScroll();
            
            // Update toggle buttons
            this.updateToggleButtons(false);
            
            // Reset touch state
            this._resetTouchState();
        }
    });
}

/**
 * Close all open sidebars (utility function)
 */
export function closeAllSidebars() {
    dispatchGlobalEvent('strata-sidebars-close-all');
}