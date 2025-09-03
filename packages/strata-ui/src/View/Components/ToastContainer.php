<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Toast Container Component
 *
 * A centralized container for displaying toast notifications in your application.
 * This component provides a fixed-position overlay that manages the display,
 * positioning, and lifecycle of toast notifications.
 *
 * Features:
 * - Multiple positioning options (corners and centers)
 * - Auto-dismiss with customizable duration
 * - Hover-to-pause functionality
 * - Smooth show/hide animations
 * - Session-based toast support
 * - Alpine.js integration for real-time updates
 *
 * @example Basic usage in layout
 * <x-strata::toast-container />
 * @example Positioned container
 * <x-strata::toast-container position="top-center" expanded="true" />
 * @example Multiple containers for different purposes
 * <x-strata::toast-container position="bottom-end" />  <!-- Main notifications -->
 * <x-strata::toast-container position="top-center" />  <!-- System alerts -->
 *
 * @see https://strata-ui.dev/docs/components/toast-container
 *
 * @author Strata UI Team
 *
 * @since 1.0.0
 */
class ToastContainer extends Component
{
    /**
     * Create a new toast container instance.
     *
     * The toast container serves as a centralized location for displaying
     * notifications. It automatically handles positioning, stacking, timing,
     * and user interaction with toasts.
     *
     * @param  string  $position  The screen position where toasts will appear.
     *                            Available positions:
     *                            - 'bottom-end' (bottom-right, default)
     *                            - 'bottom-start' (bottom-left)
     *                            - 'bottom-center' (bottom-center)
     *                            - 'top-end' (top-right)
     *                            - 'top-start' (top-left)
     *                            - 'top-center' (top-center)
     * @param  bool  $expanded  Whether the container should start in expanded state.
     *                          When true, provides more space for toast content.
     *                          Useful for applications with frequently longer messages.
     *
     * @throws \InvalidArgumentException If an invalid position is provided
     *
     * @example Position examples
     * new ToastContainer('top-end', true);     // Top-right, expanded
     * new ToastContainer('bottom-center');     // Bottom-center, normal
     */
    public function __construct(
        public string $position = 'bottom-end',
        public bool $expanded = false,
    ) {

        $validPositions = [
            'bottom-end', 'bottom-start', 'bottom-center',
            'top-end', 'top-start', 'top-center',
        ];

        if (! in_array($position, $validPositions)) {
            throw new \InvalidArgumentException(
                "Invalid position '{$position}'. Must be one of: ".implode(', ', $validPositions)
            );
        }
    }

    /**
     * Get the view that represents the component.
     *
     * Returns the Blade view responsible for rendering the toast container.
     * The view includes:
     * - Alpine.js data initialization
     * - Event listeners for toast display
     * - Positioning and animation styles
     * - Session toast auto-display logic
     *
     * @return View The compiled Blade view instance
     *
     * @see resources/views/components/toast-container.blade.php
     */
    public function render(): View
    {
        return view('strata::components.toast-container');
    }

    /**
     * Get the available positioning options for the toast container.
     *
     * This method provides a list of all valid position values that can be
     * used when instantiating the component. Useful for validation,
     * documentation, or building dynamic UI configurators.
     *
     * @return array<string> Array of valid position strings
     *
     * @static
     *
     * @since 1.0.0
     */
    public static function getAvailablePositions(): array
    {
        return [
            'bottom-end',
            'bottom-start',
            'bottom-center',
            'top-end',
            'top-start',
            'top-center',
        ];
    }

    /**
     * Check if a given position is valid.
     *
     * Utility method to validate position values before using them.
     * Useful when accepting position from user input or configuration.
     *
     * @param  string  $position  The position string to validate
     * @return bool True if the position is valid, false otherwise
     *
     * @static
     *
     * @since 1.0.0
     *
     * @example
     * if (ToastContainer::isValidPosition($userPosition)) {
     *     $container = new ToastContainer($userPosition);
     * }
     */
    public static function isValidPosition(string $position): bool
    {
        return in_array($position, static::getAvailablePositions());
    }
}
