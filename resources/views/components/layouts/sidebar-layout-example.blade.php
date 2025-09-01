<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="min-h-screen bg-background text-foreground">
        <div class="min-h-screen bg-background flex" x-data="{ sidebarOpen: false }">

            {{-- Sidebar --}}
            <x-strata::sidebar
                name="main-sidebar"
                variant="push"
                width="w-64"
                position="left"
                class="hidden lg:block"
            >
                <x-slot name="header">
                    <x-strata::dropdown>
                        <x-slot name="trigger">
                            <button class="flex items-center gap-3 w-full p-3 rounded-lg hover:bg-muted/50 transition-colors">
                                <x-strata::avatar size="md" initials="JD" />
                                <div class="flex-1 text-left">
                                    <div class="font-semibold text-foreground">John Doe</div>
                                    <div class="text-sm text-muted-foreground">john@company.com</div>
                                </div>
                                <x-strata::icon name="heroicon-o-chevron-up-down" class="w-4 h-4 text-muted-foreground" />
                            </button>
                        </x-slot>

                        <x-strata::nav-item href="#" icon="heroicon-o-user">Profile</x-strata::nav-item>
                        <x-strata::nav-item href="#" icon="heroicon-o-cog-6-tooth">Account Settings</x-strata::nav-item>
                        <x-strata::nav-item href="#" icon="heroicon-o-building-office">Switch Team</x-strata::nav-item>
                        <x-strata::dropdown.separator />
                        <x-strata::nav-item href="#" icon="heroicon-o-question-mark-circle">Help & Support</x-strata::nav-item>
                    </x-strata::dropdown>
                </x-slot>

                <x-strata::sidebar-group label="Main">
                    <x-strata::nav-item href="#" icon="heroicon-o-home" active>Dashboard</x-strata::nav-item>
                    <x-strata::nav-item href="#" icon="heroicon-o-users">
                        Team
                        <x-slot name="badge">
                            <x-strata::badge size="sm" color="primary" shape="pill">12</x-strata::badge>
                        </x-slot>
                    </x-strata::nav-item>
                    <x-strata::nav-item href="#" icon="heroicon-o-folder">Projects</x-strata::nav-item>
                    <x-strata::nav-item href="#" icon="heroicon-o-chart-bar">Analytics</x-strata::nav-item>
                </x-strata::sidebar-group>

                <x-strata::sidebar-group label="Workspace" collapsible>
                    <x-strata::nav-item href="#" nested>Recent Documents</x-strata::nav-item>
                    <x-strata::nav-item href="#" nested>
                        Media Files
                        <x-slot name="badge">
                            <x-strata::badge size="sm" color="success" variant="soft">8</x-strata::badge>
                        </x-slot>
                    </x-strata::nav-item>
                    <x-strata::nav-item href="#" nested>Templates</x-strata::nav-item>
                    <x-strata::nav-item href="#" nested>Archive</x-strata::nav-item>
                </x-strata::sidebar-group>

                <x-strata::sidebar-group label="Admin" collapsible>
                    <x-strata::nav-item href="#" nested>User Management</x-strata::nav-item>
                    <x-strata::nav-item href="#" nested>View Users</x-strata::nav-item>
                    <x-strata::nav-item href="#" nested>Add User</x-strata::nav-item>
                    <x-strata::nav-item href="#" nested>
                        Permissions
                        <x-slot name="badge">
                            <x-strata::badge size="sm" color="warning" variant="soft">2</x-strata::badge>
                        </x-slot>
                    </x-strata::nav-item>
                </x-strata::sidebar-group>

                <x-strata::sidebar-group label="Settings">
                    <x-strata::nav-item href="#" icon="heroicon-o-cog-6-tooth">Preferences</x-strata::nav-item>
                    <x-strata::nav-item href="#" icon="heroicon-o-bell">
                        Notifications
                        <x-slot name="badge">
                            <x-strata::badge size="sm" color="destructive" variant="soft">3</x-strata::badge>
                        </x-slot>
                    </x-strata::nav-item>
                </x-strata::sidebar-group>

                <x-slot name="footer">
                    <div class="space-y-1">
                        <x-strata::nav-item href="#" icon="heroicon-o-question-mark-circle">Help & Support</x-strata::nav-item>
                        <x-strata::nav-item href="#" icon="heroicon-o-arrow-right-start-on-rectangle">
                            Sign Out
                        </x-strata::nav-item>
                    </div>
                </x-slot>
            </x-strata::sidebar>

            {{-- Main Content --}}
            <x-strata::main-content :mobile-header="true">
                <x-slot name="header">
                    <x-strata::sidebar-toggle
                        target="main-sidebar"
                        variant="hamburger"
                        icon="heroicon-o-bars-2"
                    />

                    <div class="flex-1"></div>

                    {{-- Mobile user menu --}}
                    <x-strata::dropdown>
                        <x-slot name="trigger">
                            <x-strata::avatar size="sm" initials="JD" />
                        </x-slot>
                        <div class="py-1">
                            <x-strata::nav-item icon="heroicon-o-user">Profile</x-strata::nav-item>
                            <x-strata::nav-item icon="heroicon-o-cog-6-tooth">Settings</x-strata::nav-item>
                            <x-strata::dropdown.separator />
                            <x-strata::nav-item icon="heroicon-o-arrow-right-start-on-rectangle">Sign Out</x-strata::nav-item>
                        </div>
                    </x-strata::dropdown>
                </x-slot>

                {{ $slot }}
            </x-strata::main-content>
        </div>

        {{-- Toast notification container --}}
        <x-strata::toast-container position="top-end" />

        @livewireScripts
        @strataScripts
    </body>
</html>
