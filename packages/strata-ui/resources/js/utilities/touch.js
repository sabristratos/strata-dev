/**
 * Touch and Gesture Utilities for Strata UI
 * 
 * Centralized touch handling for swipe gestures and mobile interactions
 */

/**
 * Default touch configuration values
 */
export const TOUCH_DEFAULTS = {
    DRAG_THRESHOLD: 10,
    SWIPE_THRESHOLD: 100,
    EDGE_DETECTION_THRESHOLD: 20,
    VELOCITY_THRESHOLD: 0.3,
    MAX_TIME_FOR_SWIPE: 300
};

/**
 * Touch direction constants
 */
export const TOUCH_DIRECTIONS = {
    LEFT: 'left',
    RIGHT: 'right',
    UP: 'up',
    DOWN: 'down'
};

/**
 * Create a touch handler for swipe gestures
 * @param {Element} element - Element to attach touch handlers to
 * @param {Object} options - Touch handler options
 * @returns {Object} Object with methods to control touch handling
 */
export function createTouchHandler(element, options = {}) {
    const {
        dragThreshold = TOUCH_DEFAULTS.DRAG_THRESHOLD,
        swipeThreshold = TOUCH_DEFAULTS.SWIPE_THRESHOLD,
        edgeThreshold = TOUCH_DEFAULTS.EDGE_DETECTION_THRESHOLD,
        velocityThreshold = TOUCH_DEFAULTS.VELOCITY_THRESHOLD,
        maxSwipeTime = TOUCH_DEFAULTS.MAX_TIME_FOR_SWIPE,
        onSwipe = null,
        onDragStart = null,
        onDragMove = null,
        onDragEnd = null,
        preventScroll = false
    } = options;

    let state = {
        startX: null,
        startY: null,
        currentX: null,
        currentY: null,
        startTime: null,
        isDragging: false,
        hasMovedBeyondThreshold: false
    };

    /**
     * Reset touch state
     */
    function resetState() {
        state = {
            startX: null,
            startY: null,
            currentX: null,
            currentY: null,
            startTime: null,
            isDragging: false,
            hasMovedBeyondThreshold: false
        };
    }

    /**
     * Calculate swipe direction and distance
     */
    function calculateSwipe() {
        const deltaX = state.currentX - state.startX;
        const deltaY = state.currentY - state.startY;
        const absDeltaX = Math.abs(deltaX);
        const absDeltaY = Math.abs(deltaY);
        
        const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
        const duration = Date.now() - state.startTime;
        const velocity = distance / duration;
        
        let direction = null;
        
        if (absDeltaX > absDeltaY) {
            direction = deltaX > 0 ? TOUCH_DIRECTIONS.RIGHT : TOUCH_DIRECTIONS.LEFT;
        } else {
            direction = deltaY > 0 ? TOUCH_DIRECTIONS.DOWN : TOUCH_DIRECTIONS.UP;
        }
        
        return {
            direction,
            distance,
            deltaX,
            deltaY,
            velocity,
            duration,
            isHorizontal: absDeltaX > absDeltaY,
            isVertical: absDeltaY > absDeltaX
        };
    }

    /**
     * Check if touch started from screen edge
     */
    function isEdgeStart(x, y) {
        const windowWidth = window.innerWidth;
        const windowHeight = window.innerHeight;
        
        return {
            left: x < edgeThreshold,
            right: x > windowWidth - edgeThreshold,
            top: y < edgeThreshold,
            bottom: y > windowHeight - edgeThreshold
        };
    }

    /**
     * Handle touch start
     */
    function handleTouchStart(event) {
        const touch = event.touches[0];
        
        state.startX = touch.clientX;
        state.startY = touch.clientY;
        state.currentX = touch.clientX;
        state.currentY = touch.clientY;
        state.startTime = Date.now();
        state.isDragging = false;
        state.hasMovedBeyondThreshold = false;
        
        const edgeInfo = isEdgeStart(touch.clientX, touch.clientY);
        
        if (onDragStart) {
            onDragStart({
                startX: state.startX,
                startY: state.startY,
                edge: edgeInfo,
                originalEvent: event
            });
        }
    }

    /**
     * Handle touch move
     */
    function handleTouchMove(event) {
        if (!state.startX || !state.startY) return;
        
        const touch = event.touches[0];
        state.currentX = touch.clientX;
        state.currentY = touch.clientY;
        
        const deltaX = state.currentX - state.startX;
        const deltaY = state.currentY - state.startY;
        const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
        
        if (!state.hasMovedBeyondThreshold && distance > dragThreshold) {
            state.hasMovedBeyondThreshold = true;
            state.isDragging = true;
        }
        
        if (state.isDragging) {
            if (preventScroll) {
                event.preventDefault();
            }
            
            if (onDragMove) {
                const swipeInfo = calculateSwipe();
                onDragMove({
                    ...swipeInfo,
                    currentX: state.currentX,
                    currentY: state.currentY,
                    isDragging: state.isDragging,
                    originalEvent: event
                });
            }
        }
    }

    /**
     * Handle touch end
     */
    function handleTouchEnd(event) {
        if (!state.startX || !state.startY) {
            resetState();
            return;
        }
        
        const swipeInfo = calculateSwipe();
        const isValidSwipe = swipeInfo.distance > swipeThreshold && 
                           swipeInfo.velocity > velocityThreshold &&
                           swipeInfo.duration < maxSwipeTime;
        
        if (onDragEnd) {
            onDragEnd({
                ...swipeInfo,
                wasSwipe: isValidSwipe,
                wasDragging: state.isDragging,
                originalEvent: event
            });
        }
        
        if (isValidSwipe && onSwipe) {
            onSwipe({
                ...swipeInfo,
                originalEvent: event
            });
        }
        
        resetState();
    }

    /**
     * Handle touch cancel
     */
    function handleTouchCancel(event) {
        if (onDragEnd) {
            onDragEnd({
                cancelled: true,
                originalEvent: event
            });
        }
        
        resetState();
    }

    /**
     * Attach event listeners
     */
    function enable() {
        element.addEventListener('touchstart', handleTouchStart, { passive: true });
        element.addEventListener('touchmove', handleTouchMove, { passive: !preventScroll });
        element.addEventListener('touchend', handleTouchEnd, { passive: true });
        element.addEventListener('touchcancel', handleTouchCancel, { passive: true });
    }

    /**
     * Remove event listeners
     */
    function disable() {
        element.removeEventListener('touchstart', handleTouchStart);
        element.removeEventListener('touchmove', handleTouchMove);
        element.removeEventListener('touchend', handleTouchEnd);
        element.removeEventListener('touchcancel', handleTouchCancel);
        resetState();
    }

    /**
     * Get current touch state
     */
    function getState() {
        return { ...state };
    }

    /**
     * Update configuration
     */
    function updateConfig(newOptions) {
        Object.assign(options, newOptions);
    }

    return {
        enable,
        disable,
        getState,
        updateConfig,
        resetState
    };
}

/**
 * Create a simple swipe detector
 * @param {Element} element - Element to detect swipes on
 * @param {Object} options - Swipe detection options
 * @returns {Object} Swipe detector with enable/disable methods
 */
export function createSwipeDetector(element, options = {}) {
    const { onSwipeLeft, onSwipeRight, onSwipeUp, onSwipeDown, ...touchOptions } = options;
    
    return createTouchHandler(element, {
        ...touchOptions,
        onSwipe: (swipeInfo) => {
            switch (swipeInfo.direction) {
                case TOUCH_DIRECTIONS.LEFT:
                    if (onSwipeLeft) onSwipeLeft(swipeInfo);
                    break;
                case TOUCH_DIRECTIONS.RIGHT:
                    if (onSwipeRight) onSwipeRight(swipeInfo);
                    break;
                case TOUCH_DIRECTIONS.UP:
                    if (onSwipeUp) onSwipeUp(swipeInfo);
                    break;
                case TOUCH_DIRECTIONS.DOWN:
                    if (onSwipeDown) onSwipeDown(swipeInfo);
                    break;
            }
        }
    });
}

/**
 * Create edge swipe detector for navigation
 * @param {Object} options - Edge swipe options
 * @returns {Object} Edge swipe detector
 */
export function createEdgeSwipeDetector(options = {}) {
    const {
        onLeftEdgeSwipeRight,
        onRightEdgeSwipeLeft,
        edgeThreshold = TOUCH_DEFAULTS.EDGE_DETECTION_THRESHOLD,
        ...touchOptions
    } = options;

    let startFromEdge = null;

    return createTouchHandler(document.body, {
        ...touchOptions,
        edgeThreshold,
        onDragStart: ({ startX, edge }) => {
            if (edge.left) {
                startFromEdge = 'left';
            } else if (edge.right) {
                startFromEdge = 'right';
            } else {
                startFromEdge = null;
            }
        },
        onSwipe: (swipeInfo) => {
            if (startFromEdge === 'left' && 
                swipeInfo.direction === TOUCH_DIRECTIONS.RIGHT && 
                onLeftEdgeSwipeRight) {
                onLeftEdgeSwipeRight(swipeInfo);
            } else if (startFromEdge === 'right' && 
                      swipeInfo.direction === TOUCH_DIRECTIONS.LEFT && 
                      onRightEdgeSwipeLeft) {
                onRightEdgeSwipeLeft(swipeInfo);
            }
            
            startFromEdge = null;
        },
        onDragEnd: () => {
            startFromEdge = null;
        }
    });
}

/**
 * Check if the device supports touch
 * @returns {boolean} True if touch is supported
 */
export function isTouchDevice() {
    return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
}

/**
 * Get touch position from event
 * @param {TouchEvent} event - Touch event
 * @returns {Object} Touch position
 */
export function getTouchPosition(event) {
    const touch = event.touches[0] || event.changedTouches[0];
    return {
        x: touch.clientX,
        y: touch.clientY,
        pageX: touch.pageX,
        pageY: touch.pageY
    };
}

/**
 * Calculate distance between two touch points
 * @param {Object} point1 - First touch point {x, y}
 * @param {Object} point2 - Second touch point {x, y}
 * @returns {number} Distance between points
 */
export function calculateTouchDistance(point1, point2) {
    const deltaX = point2.x - point1.x;
    const deltaY = point2.y - point1.y;
    return Math.sqrt(deltaX * deltaX + deltaY * deltaY);
}

export default {
    TOUCH_DEFAULTS,
    TOUCH_DIRECTIONS,
    createTouchHandler,
    createSwipeDetector,
    createEdgeSwipeDetector,
    isTouchDevice,
    getTouchPosition,
    calculateTouchDistance
};