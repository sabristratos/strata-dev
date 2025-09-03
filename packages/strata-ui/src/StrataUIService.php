<?php

declare(strict_types=1);

namespace Strata\UI;

use Strata\UI\ValueObjects\Modal;
use Strata\UI\ValueObjects\Toast;

/**
 * Strata UI Service
 *
 * Central service class for managing UI components including toasts, modals,
 * and other interactive elements. This service provides a programmatic way
 * to trigger UI components from your application logic.
 *
 * The service uses Laravel's session system to store component data, which
 * is then automatically displayed when the next page loads. This makes it
 * perfect for traditional Laravel applications with page navigation.
 *
 * Key Features:
 * - Session-based component triggering
 * - Toast notifications with multiple variants
 * - Modal dialog management
 * - Action button support
 * - Automatic icon detection
 * - Flexible configuration options
 *
 * @example Basic usage via dependency injection
 * public function store(Request $request, StrataUIService $ui)
 * {
 *     // Your logic here...
 *     $ui->toast('Data saved successfully!', 'Success', 'success');
 *     return redirect()->route('dashboard');
 * }
 * @example Usage via facade (recommended)
 * use Strata\UI\Facades\Strata;
 *
 * Strata::toast('Hello World!', 'Greeting', 'info');
 *
 * @author Strata UI Team
 *
 * @since 1.0.0
 * @see \Strata\UI\Facades\Strata For facade access
 */
class StrataUIService
{
    /**
     * Dispatch a toast notification via session flash.
     *
     * Creates a toast notification that will be displayed when the next page
     * loads. This is the primary method for showing toasts in traditional
     * Laravel applications where you're redirecting after actions.
     *
     * The toast will be automatically displayed by the ToastContainer component
     * if it's present in your layout. The session data is automatically cleaned
     * up after display.
     *
     * Supported variants:
     * - 'success' - Green, checkmark icon, for successful operations
     * - 'warning' - Yellow, exclamation icon, for warnings and cautions
     * - 'destructive' - Red, X icon, for errors and failures
     * - 'info' - Blue, info icon, for informational messages
     * - 'primary' - Primary theme color, info icon, for brand messages
     * - 'accent' - Accent theme color, info icon, for highlights
     *
     * @param  string  $message  The main toast message content. Keep it concise
     *                           and actionable. Aim for 1-2 sentences maximum.
     * @param  string|null  $title  Optional toast title. Provides context for the
     *                              message. Good titles: "Success", "Warning",
     *                              "Upload Complete", "Validation Failed"
     * @param  string  $variant  The toast type/variant. Determines colors, icons,
     *                           and overall styling. Must be one of the supported
     *                           variant types listed above.
     * @param  int  $duration  Auto-dismiss duration in milliseconds. Set to 0
     *                         for persistent toasts that don't auto-dismiss.
     *                         Common values: 3000 (quick), 5000 (default),
     *                         8000 (longer messages), 0 (persistent)
     * @param  string|null  $icon  Optional custom icon name. If not provided,
     *                             an appropriate icon is automatically selected
     *                             based on the variant. Use Heroicon names like
     *                             'heroicon-o-check-circle' or 'heroicon-s-star'
     * @param  array|null  $actions  Optional action buttons configuration.
     *                               Each action should be an array with 'label'
     *                               and 'action' keys. The 'action' should be
     *                               JavaScript function name or code to execute.
     *                               Maximum 2 actions recommended for UX.
     *
     * @throws \InvalidArgumentException If an invalid variant is provided
     *
     * @example Simple success toast
     * $service->toast('Profile updated successfully!', 'Success', 'success');
     * @example Warning with custom duration
     * $service->toast(
     *     'Session expires in 5 minutes. Please save your work.',
     *     'Session Warning',
     *     'warning',
     *     8000  // 8 seconds for longer message
     * );
     * @example Error toast with custom icon
     * $service->toast(
     *     'Unable to connect to payment gateway.',
     *     'Payment Failed',
     *     'destructive',
     *     0,  // Persistent until manually dismissed
     *     'heroicon-o-credit-card'
     * );
     * @example Interactive toast with actions
     * $service->toast(
     *     'New message from John Doe: "Are you available for a meeting?"',
     *     'New Message',
     *     'info',
     *     10000,  // Longer duration for interactive content
     *     'heroicon-o-chat-bubble-left',
     *     [
     *         ['label' => 'Reply', 'action' => 'openReplyModal()'],
     *         ['label' => 'Mark Read', 'action' => 'markMessageAsRead()']
     *     ]
     * );
     * @example Form validation error
     * $service->toast(
     *     'Please correct the highlighted fields and try again.',
     *     'Validation Failed',
     *     'destructive',
     *     7000  // Longer for users to read and act
     * );
     *
     * @since 1.0.0
     * @see \Strata\UI\ValueObjects\Toast For the underlying data structure
     * @see \Strata\UI\View\Components\ToastContainer For the display component
     */
    public function toast(
        string $message,
        ?string $title = null,
        string $variant = 'info',
        int $duration = null,
        ?string $icon = null,
        ?array $actions = null
    ): void {
        // Use config default if no duration specified
        if ($duration === null) {
            $duration = config('strata-ui.defaults.toast_duration', 5000);
        }
        $validVariants = ['success', 'warning', 'destructive', 'info', 'primary', 'accent'];
        if (! in_array($variant, $validVariants)) {
            throw new \InvalidArgumentException(
                "Invalid variant '{$variant}'. Must be one of: ".implode(', ', $validVariants)
            );
        }

        if ($duration < 0) {
            throw new \InvalidArgumentException('Duration must be 0 or positive integer');
        }

        if ($actions !== null) {
            foreach ($actions as $index => $action) {
                if (! is_array($action) || ! isset($action['label']) || ! isset($action['action'])) {
                    throw new \InvalidArgumentException(
                        "Action at index {$index} must be an array with 'label' and 'action' keys"
                    );
                }
            }

            if (count($actions) > 2) {
                throw new \InvalidArgumentException('Maximum 2 action buttons allowed per toast');
            }
        }

        $toast = new Toast(
            message: $message,
            title: $title,
            variant: $variant,
            duration: $duration,
            icon: $icon,
            actions: $actions,
        );

        session()->flash('strata_toast', $toast->toArray());
    }

    /**
     * Dispatch a modal dialog with optional actions.
     */
    public function modal(
        ?string $content = null,
        ?string $title = null,
        string $size = 'md',
        string $variant = 'default',
        bool $closable = true,
        bool $backdrop = true,
        ?array $actions = null,
        ?string $id = null
    ): void {
        $modal = new Modal(
            id: $id,
            title: $title,
            content: $content,
            size: $size,
            variant: $variant,
            closable: $closable,
            backdrop: $backdrop,
            actions: $actions,
        );

        session()->flash('strata_modal', $modal->toArray());
    }

    /**
     * Get modal helper for Livewire components to control specific modals.
     */
    public function modalControl(?string $name = null): object
    {
        return new class($name)
        {
            public function __construct(private ?string $name = null) {}

            public function show(array $data = []): void
            {
                if (! $this->name) {
                    throw new \InvalidArgumentException('Modal name is required to show a modal');
                }

                session()->put("strata_modal_show_{$this->name}", $data);
                if (function_exists('dispatch')) {
                    dispatch('strata-modal-show', [
                        'name' => $this->name,
                        'data' => $data,
                    ])->self();
                }
            }

            public function hide(): void
            {
                if (! $this->name) {
                    throw new \InvalidArgumentException('Modal name is required to hide a modal');
                }

                if (function_exists('dispatch')) {
                    dispatch('strata-modal-hide', [
                        'name' => $this->name,
                    ])->self();
                }
            }

            public function toggle(array $data = []): void
            {
                if (! $this->name) {
                    throw new \InvalidArgumentException('Modal name is required to toggle a modal');
                }


                if (function_exists('dispatch')) {
                    dispatch('strata-modal-toggle', [
                        'name' => $this->name,
                        'data' => $data,
                    ])->self();
                }
            }
        };
    }

    /**
     * Get modals helper for controlling all modals.
     */
    public function modals(): object
    {
        return new class
        {
            public function close(): void
            {
                if (function_exists('dispatch')) {
                    dispatch('strata-modals-close-all')->self();
                }
            }
        };
    }

    /**
     * Render the Strata UI scripts with optional attributes.
     */
    public function renderScripts(array $attributes = []): string
    {
        $assetPath = $this->getAssetPath();

        if (! $assetPath) {
            return '<!-- Strata UI: JavaScript bundle not found. Please run: cd packages/strata-ui && npm run build -->';
        }

        $attributes = array_merge(['defer' => true], $attributes);

        $attributeString = $this->buildAttributes($attributes);

        return sprintf(
            '<script src="%s"%s></script>',
            $assetPath,
            $attributeString
        );
    }

    /**
     * Get the asset path for the compiled JavaScript bundle.
     */
    protected function getAssetPath(): ?string
    {
        $strategy = config('strata-ui.assets.strategy', 'route');
        
        if ($strategy === 'static') {
            // Static strategy - only use published assets
            $publishedPath = public_path('vendor/strata-ui/strata-ui.iife.js');
            if (file_exists($publishedPath)) {
                $timestamp = filemtime($publishedPath);
                return asset('vendor/strata-ui/strata-ui.iife.js?v='.$timestamp);
            }
            return null;
        }
        
        // Route strategy (default) - prefer published, fallback to embedded
        $publishedPath = public_path('vendor/strata-ui/strata-ui.iife.js');
        if (file_exists($publishedPath)) {
            $timestamp = filemtime($publishedPath);
            return asset('vendor/strata-ui/strata-ui.iife.js?v='.$timestamp);
        }

        $packagePath = __DIR__.'/../resources/dist/strata-ui.iife.js';
        if (file_exists($packagePath)) {
            $content = file_get_contents($packagePath);
            return 'data:application/javascript;base64,'.base64_encode($content);
        }

        return null;
    }

    /**
     * Build HTML attributes string from array.
     */
    protected function buildAttributes(array $attributes): string
    {
        $attributePairs = [];

        foreach ($attributes as $key => $value) {
            if (is_bool($value)) {
                $attributePairs[] = $value ? $key : '';
            } else {
                $attributePairs[] = sprintf('%s="%s"', $key, htmlspecialchars($value));
            }
        }

        return $attributePairs ? ' '.implode(' ', array_filter($attributePairs)) : '';
    }
}
