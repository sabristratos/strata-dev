/**
 * Focus Management Utilities for Strata UI
 * 
 * Consistent focus handling across interactive components
 */

/**
 * Standard focusable element selector
 * Used for modals, dropdowns, and other focus-trapping components
 */
export const FOCUSABLE_ELEMENTS = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';

/**
 * Find the first focusable element within a container
 * @param {Element} container - Container to search within
 * @returns {Element|null} First focusable element or null
 */
export function findFirstFocusable(container) {
    return container.querySelector(FOCUSABLE_ELEMENTS);
}

/**
 * Find all focusable elements within a container
 * @param {Element} container - Container to search within
 * @returns {Element[]} Array of focusable elements
 */
export function findAllFocusable(container) {
    return Array.from(container.querySelectorAll(FOCUSABLE_ELEMENTS));
}

/**
 * Focus the first focusable element in a container
 * @param {Element} container - Container to search within
 * @returns {boolean} True if an element was focused
 */
export function focusFirst(container) {
    const firstFocusable = findFirstFocusable(container);
    if (firstFocusable) {
        firstFocusable.focus();
        return true;
    }
    return false;
}

/**
 * Create a focus trap for modal dialogs
 * @param {Element} container - Container element to trap focus within
 * @returns {Function} Cleanup function to remove the trap
 */
export function createFocusTrap(container) {
    const focusableElements = findAllFocusable(container);
    
    if (focusableElements.length === 0) {
        return () => {}; // No focusable elements, no trap needed
    }
    
    const firstFocusable = focusableElements[0];
    const lastFocusable = focusableElements[focusableElements.length - 1];
    
    function handleKeyDown(e) {
        if (e.key !== 'Tab') return;
        
        if (e.shiftKey) {
            // Shift + Tab (backward)
            if (document.activeElement === firstFocusable) {
                e.preventDefault();
                lastFocusable.focus();
            }
        } else {
            // Tab (forward)
            if (document.activeElement === lastFocusable) {
                e.preventDefault();
                firstFocusable.focus();
            }
        }
    }
    
    container.addEventListener('keydown', handleKeyDown);
    
    // Focus first element initially
    focusFirst(container);
    
    // Return cleanup function
    return () => {
        container.removeEventListener('keydown', handleKeyDown);
    };
}

/**
 * Store the currently focused element and return a restore function
 * Useful for modals that need to restore focus when closed
 * @returns {Function} Function to restore the previously focused element
 */
export function storeFocus() {
    const previouslyFocused = document.activeElement;
    
    return function restoreFocus() {
        if (previouslyFocused && typeof previouslyFocused.focus === 'function') {
            previouslyFocused.focus();
        }
    };
}

/**
 * Check if an element can receive focus
 * @param {Element} element - Element to check
 * @returns {boolean} True if element is focusable
 */
export function isFocusable(element) {
    if (!element) return false;
    
    // Check if element matches focusable selector
    if (!element.matches(FOCUSABLE_ELEMENTS)) return false;
    
    // Check if element is visible and not disabled
    return element.offsetParent !== null && !element.disabled;
}

/**
 * Move focus to next focusable element
 * @param {Element} currentElement - Currently focused element
 * @param {Element} container - Container to search within (default: document)
 * @returns {boolean} True if focus was moved
 */
export function focusNext(currentElement, container = document) {
    const focusableElements = findAllFocusable(container);
    const currentIndex = focusableElements.indexOf(currentElement);
    
    if (currentIndex === -1) return false;
    
    const nextIndex = (currentIndex + 1) % focusableElements.length;
    focusableElements[nextIndex].focus();
    return true;
}

/**
 * Move focus to previous focusable element
 * @param {Element} currentElement - Currently focused element  
 * @param {Element} container - Container to search within (default: document)
 * @returns {boolean} True if focus was moved
 */
export function focusPrevious(currentElement, container = document) {
    const focusableElements = findAllFocusable(container);
    const currentIndex = focusableElements.indexOf(currentElement);
    
    if (currentIndex === -1) return false;
    
    const previousIndex = currentIndex === 0 ? focusableElements.length - 1 : currentIndex - 1;
    focusableElements[previousIndex].focus();
    return true;
}