/**
 * Base Sidebar Component for Strata UI
 * 
 * Provides sidebar functionality with multiple variants, responsive behavior,
 * and state management using Alpine.js and the BaseComponent system.
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { lockBodyScroll, unlockBodyScroll } from '../utilities/dom.js';
import { dispatchGlobalEvent, addEventListener, EVENTS } from '../utilities/events.js';
import { createTouchHandler, TOUCH_DIRECTIONS } from '../utilities/touch.js';

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

        show: false,
        collapsed: false,
        name: config.name || 'main',
        variant: config.variant || 'overlay',
        persistent: config.persistent || false,
        collapsible: config.collapsible || false,
        

        _breakpoint: 768, // md breakpoint
        _isMobile: false,
        _storageKey: null,
        _touchHandler: null,
        
        /**
         * Sidebar-specific initialization
         */
        init() {

            this.checkMobile();
            this.setupResponsiveHandling();
            

            if (this.persistent) {
                this._storageKey = `strata-sidebar-${this.name}`;
                this.loadPersistedState();
            }
            

            this.setInitialState();
            

            this.setupEventListeners();
            

            this.setupKeyboardHandling();
            
            this.setupTouchHandling();
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
                    

                    if (wasMobile && !this._isMobile) {

                        this.handleMobileToDesktop();
                    } else if (!wasMobile && this._isMobile) {

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

            this._strataCleanupFunctions.push(
                addEventListener(window, `strata-sidebar-show-${this.name}`, () => this.open()),
                addEventListener(window, `strata-sidebar-hide-${this.name}`, () => this.close()),
                addEventListener(window, `strata-sidebar-toggle-${this.name}`, () => this.toggle())
            );
            

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
            

            if ((this.variant === 'overlay' || (this.variant === 'hybrid' && this._isMobile))) {
                lockBodyScroll();
            }
            

            this.updateToggleButtons(true);
            

            this.saveState();
            

            this.dispatchSidebarEvent('opened');
            

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
            

            unlockBodyScroll();
            

            this.updateToggleButtons(false);
            

            this.saveState();
            

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
         * Set up touch handling using centralized utilities
         */
        setupTouchHandling() {
            if (!this._isMobile || this.variant === 'fixed') return;
            
            this._touchHandler = createTouchHandler(document.body, {
                onSwipe: (swipeInfo) => {
                    this.handleSwipeGesture(swipeInfo);
                }
            });
            
            this._touchHandler.enable();
            this.addCleanup(() => {
                if (this._touchHandler) {
                    this._touchHandler.disable();
                }
            });
        },
        
        /**
         * Handle swipe gestures for sidebar control
         */
        handleSwipeGesture(swipeInfo) {
            if (!this._isMobile || this.variant === 'fixed') return;
            
            const { direction, startX } = swipeInfo;
            const windowWidth = window.innerWidth;
            const edgeThreshold = 20;
            
            const isLeftEdgeStart = startX < edgeThreshold;
            const isRightEdgeStart = startX > windowWidth - edgeThreshold;
            
            if (this.position === 'left') {
                if (direction === TOUCH_DIRECTIONS.LEFT && this.show) {
                    this.close();
                } else if (direction === TOUCH_DIRECTIONS.RIGHT && !this.show && isLeftEdgeStart) {
                    this.open();
                }
            } else if (this.position === 'right') {
                if (direction === TOUCH_DIRECTIONS.RIGHT && this.show) {
                    this.close();
                } else if (direction === TOUCH_DIRECTIONS.LEFT && !this.show && isRightEdgeStart) {
                    this.open();
                }
            }
        },
        
        /**
         * Sidebar-specific cleanup
         */
        destroy() {

            unlockBodyScroll();
            

            this.updateToggleButtons(false);
            

            if (this._touchHandler) {
                this._touchHandler.disable();
                this._touchHandler = null;
            }
        }
    });
}

/**
 * Close all open sidebars (utility function)
 */
export function closeAllSidebars() {
    dispatchGlobalEvent('strata-sidebars-close-all');
}