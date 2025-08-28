<?php

declare(strict_types=1);

namespace Strata\UI\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Toast Value Object
 *
 * Immutable data structure representing a toast notification. This object
 * encapsulates all the properties needed to display a toast, including
 * content, styling, timing, and interaction options.
 *
 * Toast objects are typically created by the StrataUIService and converted
 * to arrays for storage in the session or transmission to JavaScript.
 *
 * Key Features:
 * - Immutable data structure
 * - Arrayable for easy serialization
 * - JSON-serializable for JavaScript integration
 * - Type-safe property access
 * - Consistent data format
 *
 * @example Creating a toast object
 * $toast = new Toast(
 *     message: 'Operation completed successfully',
 *     title: 'Success',
 *     variant: 'success',
 *     duration: 5000
 * );
 * @example Converting to array for session storage
 * session()->flash('strata_toast', $toast->toArray());
 *
 * @author Strata UI Team
 *
 * @since 1.0.0
 *
 * @implements Arrayable<string, mixed>
 */
class Toast implements Arrayable
{
    /**
     * Create a new toast instance.
     *
     * All parameters are optional to allow flexible toast creation.
     * However, at minimum a message should be provided for meaningful
     * user feedback.
     *
     * @param  string|null  $message  The main toast content. This is the primary
     *                                text users will read. Should be clear, concise,
     *                                and actionable. Maximum recommended length
     *                                is 2 sentences for optimal UX.
     * @param  string|null  $title  Optional toast title/heading. Provides context
     *                              and hierarchy to the message. Good titles are
     *                              short and descriptive: "Success", "Error",
     *                              "Upload Complete", "Validation Failed", etc.
     * @param  string  $variant  The visual variant/type of the toast. Determines
     *                           colors, icons, and semantic meaning. Supported
     *                           values: 'success', 'warning', 'destructive',
     *                           'info', 'primary', 'accent'. Default: 'info'
     * @param  int  $duration  Auto-dismiss duration in milliseconds. The toast
     *                         will automatically hide after this time. Set to 0
     *                         for persistent toasts. Common values:
     *                         - 3000ms: Quick feedback
     *                         - 5000ms: Standard (default)
     *                         - 8000ms: Longer messages
     *                         - 0: Persistent until manually dismissed
     * @param  string|null  $icon  Optional custom icon override. If not provided,
     *                             an appropriate icon is automatically selected
     *                             based on the variant. Use Heroicon class names
     *                             like 'heroicon-o-check-circle' or 'heroicon-s-star'
     * @param  array|null  $actions  Optional interactive action buttons. Array of
     *                               action arrays, each containing 'label' and
     *                               'action' keys. The 'action' should be JavaScript
     *                               function name or code. Max 2 actions recommended.
     *                               Example: [
     *                               ['label' => 'View', 'action' => 'showDetails()'],
     *                               ['label' => 'Dismiss', 'action' => 'close()']
     *                               ]
     *
     * @example Basic toast
     * new Toast(message: 'Hello World!');
     * @example Success notification
     * new Toast(
     *     message: 'Your profile has been updated successfully.',
     *     title: 'Profile Updated',
     *     variant: 'success',
     *     duration: 4000
     * );
     * @example Interactive toast with actions
     * new Toast(
     *     message: 'You have a new message from John Doe.',
     *     title: 'New Message',
     *     variant: 'info',
     *     duration: 10000,
     *     icon: 'heroicon-o-chat-bubble-left',
     *     actions: [
     *         ['label' => 'Reply', 'action' => 'replyToMessage()'],
     *         ['label' => 'Mark Read', 'action' => 'markAsRead()']
     *     ]
     * );
     * @example Persistent error toast
     * new Toast(
     *     message: 'Unable to connect to server. Please check your internet connection.',
     *     title: 'Connection Error',
     *     variant: 'destructive',
     *     duration: 0,  // Persistent
     *     icon: 'heroicon-o-wifi'
     * );
     */
    public function __construct(
        public ?string $message = null,
        public ?string $title = null,
        public string $variant = 'info',
        public int $duration = 5000,
        public ?string $icon = null,
        public ?array $actions = null,
    ) {}

    /**
     * Convert the toast to an array representation.
     *
     * This method converts the toast object to an associative array suitable
     * for JSON serialization, session storage, or transmission to JavaScript.
     * The array format matches what the Alpine.js toast container expects.
     *
     * All properties are included in the array, including null values, to
     * maintain a consistent data structure for frontend consumption.
     *
     * @return array<string, mixed> Associative array representation of the toast
     *
     * @example Array output
     * [
     *     'message' => 'Operation completed',
     *     'title' => 'Success',
     *     'variant' => 'success',
     *     'duration' => 5000,
     *     'icon' => null,
     *     'actions' => null
     * ]
     * @example Usage for session storage
     * $toast = new Toast('Hello World!', 'Greeting', 'info');
     * session()->flash('strata_toast', $toast->toArray());
     * @example Usage for JSON response
     * return response()->json([
     *     'success' => true,
     *     'toast' => $toast->toArray()
     * ]);
     */
    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'title' => $this->title,
            'variant' => $this->variant,
            'duration' => $this->duration,
            'icon' => $this->icon,
            'actions' => $this->actions,
        ];
    }

    /**
     * Get the list of supported toast variants.
     *
     * Returns an array of all valid variant values that can be used
     * when creating toast instances. Useful for validation or building
     * dynamic interfaces.
     *
     * @return array<string> Array of valid variant strings
     *
     * @static
     *
     * @since 1.0.0
     *
     * @example Validate variant
     * $variant = $request->get('variant');
     * if (in_array($variant, Toast::getVariants())) {
     *     $toast = new Toast(message: 'Test', variant: $variant);
     * }
     */
    public static function getVariants(): array
    {
        return ['success', 'warning', 'destructive', 'info', 'primary', 'accent'];
    }

    /**
     * Check if a variant is valid.
     *
     * Utility method to validate variant values before creating toast
     * instances. Useful when accepting variant from user input.
     *
     * @param  string  $variant  The variant to validate
     * @return bool True if the variant is valid, false otherwise
     *
     * @static
     *
     * @since 1.0.0
     *
     * @example Variant validation
     * if (Toast::isValidVariant($userInput)) {
     *     $toast = new Toast(message: 'Valid!', variant: $userInput);
     * }
     */
    public static function isValidVariant(string $variant): bool
    {
        return in_array($variant, static::getVariants());
    }
}
