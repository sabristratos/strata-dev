<?php

declare(strict_types=1);

namespace Strata\UI\Facades;

use Illuminate\Support\Facades\Facade;
use Strata\UI\StrataUIService;

/**
 * Strata UI Facade
 *
 * Provides static access to the StrataUIService for convenient toast and modal
 * triggering throughout your application. This is the recommended way to
 * interact with Strata UI components from your controllers, middleware,
 * and service classes.
 *
 * The facade automatically resolves the underlying StrataUIService from the
 * container, providing a clean, static API that's familiar to Laravel developers.
 *
 * @example Simple toast notification
 * use Strata\UI\Facades\Strata;
 *
 * Strata::toast('Welcome to our application!', 'Welcome', 'success');
 * @example Toast with action buttons
 * Strata::toast(
 *     'You have 3 new messages',
 *     'Messages',
 *     'info',
 *     8000,
 *     'heroicon-o-chat-bubble-left',
 *     [
 *         ['label' => 'View Messages', 'action' => 'viewMessages()'],
 *         ['label' => 'Mark All Read', 'action' => 'markAllRead()']
 *     ]
 * );
 * @example Usage in controller
 * class UserController extends Controller
 * {
 *     public function store(Request $request)
 *     {
 *         $user = User::create($request->validated());
 *
 *         Strata::toast(
 *             "User {$user->name} created successfully!",
 *             'User Created',
 *             'success'
 *         );
 *
 *         return redirect()->route('users.index');
 *     }
 * }
 * @example Usage in middleware
 * class NotificationMiddleware
 * {
 *     public function handle($request, Closure $next)
 *     {
 *         if ($user->hasUnreadNotifications()) {
 *             Strata::toast(
 *                 "You have {$user->unread_count} unread notifications",
 *                 'Notifications',
 *                 'info',
 *                 0  // Persistent
 *             );
 *         }
 *
 *         return $next($request);
 *     }
 * }
 *
 * @method static void toast(string $message, string|null $title = null, string $variant = 'info', int $duration = 5000, string|null $icon = null, array|null $actions = null) Create and flash a toast notification
 * @method static void modal(string|null $content = null, string|null $title = null, string $size = 'md', string $variant = 'default', bool $closable = true, bool $backdrop = true, array|null $actions = null, string|null $id = null) Create and flash a modal dialog
 * @method static object modalControl(string|null $name = null) Get modal control helper for specific modals
 * @method static object modals() Get modals helper for controlling all modals
 *
 * @author Strata UI Team
 *
 * @since 1.0.0
 * @see \Strata\UI\StrataUIService For the underlying service implementation
 * @see https://strata-ui.dev/docs/components/toast-system For comprehensive usage guide
 */
class Strata extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * This method tells Laravel's facade system which service to resolve
     * from the container when static methods are called on this facade.
     *
     * @return string The service class name to resolve
     */
    protected static function getFacadeAccessor(): string
    {
        return StrataUIService::class;
    }
}
