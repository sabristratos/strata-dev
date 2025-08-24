<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabs Component Test</title>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-background text-foreground">
    <h1 class="text-2xl font-bold mb-8">Tabs Component Tests</h1>
    
    <!-- Basic Default Tabs -->
    <div class="mb-12">
        <h2 class="text-xl font-semibold mb-4">Default Tabs</h2>
        <x-strata::tabs default-value="account" class="w-full max-w-2xl">
            <x-strata::tabs.list>
                <x-strata::tabs.trigger value="account">Account</x-strata::tabs.trigger>
                <x-strata::tabs.trigger value="security">Security</x-strata::tabs.trigger>
                <x-strata::tabs.trigger value="notifications">Notifications</x-strata::tabs.trigger>
                <x-strata::tabs.trigger value="billing" disabled>Billing</x-strata::tabs.trigger>
            </x-strata::tabs.list>
            
            <x-strata::tabs.content value="account" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Account Settings</h3>
                <p>Manage your account preferences and profile information.</p>
            </x-strata::tabs.content>
            
            <x-strata::tabs.content value="security" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Security Settings</h3>
                <p>Configure your security preferences, passwords, and two-factor authentication.</p>
            </x-strata::tabs.content>
            
            <x-strata::tabs.content value="notifications" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Notification Settings</h3>
                <p>Choose how and when you want to receive notifications.</p>
            </x-strata::tabs.content>
            
            <x-strata::tabs.content value="billing" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Billing Settings</h3>
                <p>Manage your billing information and subscription.</p>
            </x-strata::tabs.content>
        </x-strata::tabs>
    </div>
    
    <!-- Pills Variant -->
    <div class="mb-12">
        <h2 class="text-xl font-semibold mb-4">Pills Variant</h2>
        <x-strata::tabs default-value="overview" variant="pills" class="w-full max-w-2xl">
            <x-strata::tabs.list>
                <x-strata::tabs.trigger value="overview">Overview</x-strata::tabs.trigger>
                <x-strata::tabs.trigger value="analytics">Analytics</x-strata::tabs.trigger>
                <x-strata::tabs.trigger value="reports">Reports</x-strata::tabs.trigger>
            </x-strata::tabs.list>
            
            <x-strata::tabs.content value="overview" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Overview</h3>
                <p>General overview of your dashboard.</p>
            </x-strata::tabs.content>
            
            <x-strata::tabs.content value="analytics" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Analytics</h3>
                <p>Detailed analytics and metrics.</p>
            </x-strata::tabs.content>
            
            <x-strata::tabs.content value="reports" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Reports</h3>
                <p>Generated reports and data exports.</p>
            </x-strata::tabs.content>
        </x-strata::tabs>
    </div>
    
    <!-- Underline Variant -->
    <div class="mb-12">
        <h2 class="text-xl font-semibold mb-4">Underline Variant</h2>
        <x-strata::tabs default-value="design" variant="underline" class="w-full max-w-2xl">
            <x-strata::tabs.list>
                <x-strata::tabs.trigger value="design">Design</x-strata::tabs.trigger>
                <x-strata::tabs.trigger value="code">Code</x-strata::tabs.trigger>
                <x-strata::tabs.trigger value="preview">Preview</x-strata::tabs.trigger>
            </x-strata::tabs.list>
            
            <x-strata::tabs.content value="design" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Design</h3>
                <p>Visual design and mockups.</p>
            </x-strata::tabs.content>
            
            <x-strata::tabs.content value="code" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Code</h3>
                <p>Code implementation and documentation.</p>
            </x-strata::tabs.content>
            
            <x-strata::tabs.content value="preview" class="p-4">
                <h3 class="text-lg font-semibold mb-2">Preview</h3>
                <p>Live preview of the component.</p>
            </x-strata::tabs.content>
        </x-strata::tabs>
    </div>

    <script>
        // Test keyboard navigation
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Tabs test page loaded');
            
            // Listen for tab change events
            document.addEventListener('strata-tab-change', function(event) {
                console.log('Tab changed:', event.detail);
            });
        });
    </script>
</body>
</html>