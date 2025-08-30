/**
 * DOM Utilities for Strata UI
 * 
 * Common DOM manipulation functions used across components
 */

/**
 * Calculate the current scrollbar width
 * @returns {number} Width of scrollbar in pixels
 */
export function getScrollbarWidth() {
    return window.innerWidth - document.documentElement.clientWidth;
}

/**
 * Lock body scroll and account for scrollbar width
 * Prevents layout shift when modal opens
 */
export function lockBodyScroll() {
    const scrollbarWidth = getScrollbarWidth();
    
    document.body.style.overflow = 'hidden';
    if (scrollbarWidth > 0) {
        document.body.style.paddingRight = `${scrollbarWidth}px`;
    }
}

/**
 * Unlock body scroll and restore original padding
 */
export function unlockBodyScroll() {
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
}

/**
 * Find Alpine components by data attribute pattern
 * @param {string} componentName - Name of the Alpine component (e.g. 'strataModal')
 * @returns {NodeList} Elements with matching x-data attributes
 */
export function findAlpineComponents(componentName) {
    return document.querySelectorAll(`[x-data*="${componentName}"]`);
}

/**
 * Extract component name from Alpine x-data attribute
 * @param {Element} element - Element with x-data attribute
 * @param {string} componentName - Component name to extract data for
 * @returns {string|null} Extracted name or null if not found
 */
export function extractComponentName(element, componentName) {
    const xData = element.getAttribute('x-data');
    if (!xData) return null;
    
    const match = xData.match(new RegExp(`${componentName}\\(\\{[^}]*name:\\s*['"]([^'"]*)`));
    return match ? match[1] : null;
}

/**
 * Check if element is currently visible
 * @param {Element} element 
 * @returns {boolean}
 */
export function isElementVisible(element) {
    return !!(element.offsetWidth || element.offsetHeight || element.getClientRects().length);
}

/**
 * Wait for next frame (requestAnimationFrame)
 * @returns {Promise<void>}
 */
export function nextFrame() {
    return new Promise(resolve => {
        requestAnimationFrame(resolve);
    });
}