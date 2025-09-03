/**
 * Animation Utilities for Strata UI
 * 
 * Centralized animation helpers for consistent transitions across components
 */

/**
 * Standard animation durations in milliseconds
 */
export const ANIMATION_DURATIONS = {
    FAST: 150,
    NORMAL: 200,
    SLOW: 300,
    EXTRA_SLOW: 500
};

/**
 * Standard easing functions
 */
export const EASING = {
    EASE_OUT: 'ease-out',
    EASE_IN: 'ease-in',
    EASE_IN_OUT: 'ease-in-out',
    EASE_OUT_BACK: 'cubic-bezier(0.34, 1.56, 0.64, 1)',
    EASE_OUT_QUART: 'cubic-bezier(0.25, 1, 0.5, 1)',
    EASE_OUT_EXPO: 'cubic-bezier(0.19, 1, 0.22, 1)'
};

/**
 * Create a smooth fade-in animation
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Promise} Promise that resolves when animation completes
 */
export function fadeIn(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT,
        from = 0,
        to = 1
    } = options;

    return new Promise((resolve) => {
        element.style.opacity = from;
        element.style.transition = `opacity ${duration}ms ${easing}`;
        
        requestAnimationFrame(() => {
            element.style.opacity = to;
            
            setTimeout(() => {
                element.style.transition = '';
                resolve();
            }, duration);
        });
    });
}

/**
 * Create a smooth fade-out animation
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Promise} Promise that resolves when animation completes
 */
export function fadeOut(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT,
        from = 1,
        to = 0
    } = options;

    return new Promise((resolve) => {
        element.style.opacity = from;
        element.style.transition = `opacity ${duration}ms ${easing}`;
        
        requestAnimationFrame(() => {
            element.style.opacity = to;
            
            setTimeout(() => {
                element.style.transition = '';
                resolve();
            }, duration);
        });
    });
}

/**
 * Create a slide-in animation from top
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Promise} Promise that resolves when animation completes
 */
export function slideInFromTop(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT_QUART,
        distance = '-8px'
    } = options;

    return new Promise((resolve) => {
        element.style.transform = `translateY(${distance})`;
        element.style.opacity = '0';
        element.style.transition = `transform ${duration}ms ${easing}, opacity ${duration}ms ${easing}`;
        
        requestAnimationFrame(() => {
            element.style.transform = 'translateY(0)';
            element.style.opacity = '1';
            
            setTimeout(() => {
                element.style.transition = '';
                element.style.transform = '';
                resolve();
            }, duration);
        });
    });
}

/**
 * Create a slide-out animation to top
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Promise} Promise that resolves when animation completes
 */
export function slideOutToTop(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT,
        distance = '-8px'
    } = options;

    return new Promise((resolve) => {
        element.style.transition = `transform ${duration}ms ${easing}, opacity ${duration}ms ${easing}`;
        element.style.transform = `translateY(${distance})`;
        element.style.opacity = '0';
        
        setTimeout(() => {
            element.style.transition = '';
            resolve();
        }, duration);
    });
}

/**
 * Create a scale-in animation
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Promise} Promise that resolves when animation completes
 */
export function scaleIn(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT_BACK,
        from = 0.95,
        to = 1
    } = options;

    return new Promise((resolve) => {
        element.style.transform = `scale(${from})`;
        element.style.opacity = '0';
        element.style.transition = `transform ${duration}ms ${easing}, opacity ${duration}ms ${easing}`;
        
        requestAnimationFrame(() => {
            element.style.transform = `scale(${to})`;
            element.style.opacity = '1';
            
            setTimeout(() => {
                element.style.transition = '';
                element.style.transform = '';
                resolve();
            }, duration);
        });
    });
}

/**
 * Create a scale-out animation
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Promise} Promise that resolves when animation completes
 */
export function scaleOut(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT,
        from = 1,
        to = 0.95
    } = options;

    return new Promise((resolve) => {
        element.style.transition = `transform ${duration}ms ${easing}, opacity ${duration}ms ${easing}`;
        element.style.transform = `scale(${to})`;
        element.style.opacity = '0';
        
        setTimeout(() => {
            element.style.transition = '';
            resolve();
        }, duration);
    });
}

/**
 * Create a combined fade + slide animation for content opening
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Promise} Promise that resolves when animation completes
 */
export function openContent(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT_QUART
    } = options;

    return Promise.all([
        fadeIn(element, { duration, easing }),
        slideInFromTop(element, { duration, easing, distance: '-8px' })
    ]);
}

/**
 * Create a combined fade + slide animation for content closing
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Promise} Promise that resolves when animation completes
 */
export function closeContent(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT
    } = options;

    return Promise.all([
        fadeOut(element, { duration, easing }),
        slideOutToTop(element, { duration, easing, distance: '-8px' })
    ]);
}

/**
 * Wait for an element's CSS transition to complete
 * @param {Element} element - Element with transition
 * @param {string} property - CSS property being transitioned (optional)
 * @returns {Promise} Promise that resolves when transition completes
 */
export function waitForTransition(element, property = null) {
    return new Promise((resolve) => {
        const handleTransitionEnd = (event) => {
            if (property && event.propertyName !== property) {
                return;
            }
            
            element.removeEventListener('transitionend', handleTransitionEnd);
            resolve();
        };

        element.addEventListener('transitionend', handleTransitionEnd);
        
        setTimeout(() => {
            element.removeEventListener('transitionend', handleTransitionEnd);
            resolve();
        }, 1000);
    });
}

/**
 * Animate height changes smoothly
 * @param {Element} element - Element to animate
 * @param {Object} options - Animation options
 * @returns {Object} Object with expand and collapse methods
 */
export function createHeightAnimator(element, options = {}) {
    const {
        duration = ANIMATION_DURATIONS.NORMAL,
        easing = EASING.EASE_OUT_QUART
    } = options;

    return {
        /**
         * Expand element to its natural height
         */
        expand() {
            return new Promise((resolve) => {
                const startHeight = element.offsetHeight;
                element.style.height = 'auto';
                const endHeight = element.offsetHeight;
                
                element.style.height = startHeight + 'px';
                element.style.transition = `height ${duration}ms ${easing}`;
                
                requestAnimationFrame(() => {
                    element.style.height = endHeight + 'px';
                    
                    setTimeout(() => {
                        element.style.height = '';
                        element.style.transition = '';
                        resolve();
                    }, duration);
                });
            });
        },

        /**
         * Collapse element to zero height
         */
        collapse() {
            return new Promise((resolve) => {
                const startHeight = element.offsetHeight;
                element.style.height = startHeight + 'px';
                element.style.transition = `height ${duration}ms ${easing}`;
                
                requestAnimationFrame(() => {
                    element.style.height = '0px';
                    
                    setTimeout(() => {
                        element.style.height = '';
                        element.style.transition = '';
                        resolve();
                    }, duration);
                });
            });
        }
    };
}

/**
 * Simple utility to run animations sequentially
 * @param {Function[]} animations - Array of animation functions that return promises
 * @returns {Promise} Promise that resolves when all animations complete
 */
export async function sequence(...animations) {
    for (const animation of animations) {
        await animation();
    }
}

/**
 * Simple utility to run animations in parallel
 * @param {Function[]} animations - Array of animation functions that return promises
 * @returns {Promise} Promise that resolves when all animations complete
 */
export function parallel(...animations) {
    return Promise.all(animations.map(animation => animation()));
}

export default {
    ANIMATION_DURATIONS,
    EASING,
    fadeIn,
    fadeOut,
    slideInFromTop,
    slideOutToTop,
    scaleIn,
    scaleOut,
    openContent,
    closeContent,
    waitForTransition,
    createHeightAnimator,
    sequence,
    parallel
};