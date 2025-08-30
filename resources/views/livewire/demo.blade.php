<div class="min-h-screen bg-background text-foreground">
    <div class="container mx-auto p-8 space-y-16">
        {{-- Header --}}
        <div class="text-center space-y-4">
            <h1 class="text-4xl font-bold">Strata UI Components</h1>
            <p class="text-xl text-muted-foreground">Complete Design System Demo</p>
            <p class="text-muted-foreground">Showcasing all available components with their variants and features</p>
        </div>

        {{-- Core UI Components --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Core UI Components</h2>
                <p class="text-muted-foreground">Essential building blocks for your interface</p>
            </div>

            {{-- Alerts --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Alerts</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-strata::alert color="info" title="Information">
                        This is an informational message with auto-detected icon.
                    </x-strata::alert>
                    <x-strata::alert color="success" title="Success" dismissible>
                        Operation completed successfully! This alert can be dismissed.
                    </x-strata::alert>
                    <x-strata::alert color="warning" title="Warning" variant="outline">
                        Please review the following information carefully.
                    </x-strata::alert>
                    <x-strata::alert color="destructive" title="Error" variant="soft">
                        An error occurred while processing your request.
                    </x-strata::alert>
                </div>
                <x-strata::alert color="primary" title="With Actions">
                    This alert includes custom action buttons.
                    <x-slot name="actions">
                        <x-strata::button variant="ghost" size="sm">Learn More</x-strata::button>
                        <x-strata::button variant="outline" size="sm">Dismiss</x-strata::button>
                    </x-slot>
                </x-strata::alert>
            </div>

            {{-- Avatars --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Avatars</h3>
                <div class="flex flex-wrap gap-4 items-end">
                    <x-strata::avatar size="xs" initials="XS" />
                    <x-strata::avatar size="sm" initials="SM" status="online" />
                    <x-strata::avatar size="md" initials="MD" status="away" />
                    <x-strata::avatar size="lg" initials="LG" status="busy" />
                    <x-strata::avatar size="xl" initials="XL" status="offline" />
                    <x-strata::avatar size="2xl" initials="2XL" />
                    <x-strata::avatar size="3xl" initials="3XL" shape="square" border />
                </div>
            </div>

            {{-- Badges --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Badges</h3>
                <div class="space-y-3">
                    <div class="flex flex-wrap gap-2">
                        <x-strata::badge color="primary">Primary</x-strata::badge>
                        <x-strata::badge color="accent">Accent</x-strata::badge>
                        <x-strata::badge color="success">Success</x-strata::badge>
                        <x-strata::badge color="warning">Warning</x-strata::badge>
                        <x-strata::badge color="destructive">Error</x-strata::badge>
                        <x-strata::badge color="info">Info</x-strata::badge>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <x-strata::badge variant="outline" color="primary">Outline</x-strata::badge>
                        <x-strata::badge variant="soft" color="accent">Soft</x-strata::badge>
                        <x-strata::badge icon="heroicon-o-star" color="warning">With Icon</x-strata::badge>
                        <x-strata::badge dismissible color="info">Dismissible</x-strata::badge>
                    </div>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Buttons</h3>
                <div class="space-y-3">
                    <div class="flex flex-wrap gap-3">
                        <x-strata::button variant="primary">Primary</x-strata::button>
                        <x-strata::button variant="accent">Accent</x-strata::button>
                        <x-strata::button variant="destructive">Destructive</x-strata::button>
                        <x-strata::button variant="outline">Outline</x-strata::button>
                        <x-strata::button variant="secondary">Secondary</x-strata::button>
                        <x-strata::button variant="ghost">Ghost</x-strata::button>
                    </div>
                    <div class="flex flex-wrap gap-3 items-center">
                        <x-strata::button size="sm">Small</x-strata::button>
                        <x-strata::button>Default</x-strata::button>
                        <x-strata::button size="lg">Large</x-strata::button>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <x-strata::button icon="heroicon-o-plus">With Icon</x-strata::button>
                        <x-strata::button icon="heroicon-o-arrow-right" iconPosition="right">Icon Right</x-strata::button>
                        <x-strata::button loading>Loading...</x-strata::button>
                        <x-strata::button disabled>Disabled</x-strata::button>
                    </div>
                    <div class="space-y-3">
                        <h4 class="font-medium">Buttons with Badges (Slot-based)</h4>
                        <div class="flex flex-wrap gap-3">
                            <x-strata::button>
                                Messages
                                <x-slot:badge>
                                    <x-strata::badge size="sm" color="destructive">3</x-strata::badge>
                                </x-slot:badge>
                            </x-strata::button>
                            <x-strata::button variant="outline">
                                Notifications
                                <x-slot:badge>
                                    <x-strata::badge size="sm" color="primary" shape="square">12</x-strata::badge>
                                </x-slot:badge>
                            </x-strata::button>
                            <x-strata::button variant="secondary" size="sm">
                                Cart
                                <x-slot:badge>
                                    <x-strata::badge size="sm" color="accent">99+</x-strata::badge>
                                </x-slot:badge>
                            </x-strata::button>
                            <x-strata::button variant="ghost" icon="heroicon-o-bell">
                                Alerts
                                <x-slot:badge>
                                    <x-strata::badge size="sm" color="warning">!</x-strata::badge>
                                </x-slot:badge>
                            </x-strata::button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Toast Testing --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Toast Notifications</h3>
                <div class="flex flex-wrap gap-3">
                    <x-strata::button wire:click="showToast('success')" variant="outline" color="success">
                        Success Toast
                    </x-strata::button>
                    <x-strata::button wire:click="showToast('error')" variant="outline" color="destructive">
                        Error Toast
                    </x-strata::button>
                    <x-strata::button wire:click="showToast('warning')" variant="outline" color="warning">
                        Warning Toast
                    </x-strata::button>
                    <x-strata::button wire:click="showToast('info')" variant="outline" color="info">
                        Info Toast
                    </x-strata::button>
                </div>
            </div>

            {{-- Cards --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Cards</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <x-strata::card>
                        <h4 class="font-semibold mb-2">Default Card</h4>
                        <p class="text-muted-foreground">Basic card with default styling and medium padding.</p>
                    </x-strata::card>
                    <x-strata::card border="primary">
                        <x-slot name="header">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold">With Header</h4>
                                <x-strata::badge color="primary">New</x-strata::badge>
                            </div>
                        </x-slot>
                        <p class="text-muted-foreground">Card with header section and primary border.</p>
                        <x-slot name="footer">
                            <x-strata::button size="sm" variant="outline">Action</x-strata::button>
                        </x-slot>
                    </x-strata::card>
                    <x-strata::card size="lg" border="accent">
                        <h4 class="font-semibold mb-2">Large Card</h4>
                        <p class="text-muted-foreground">Larger padding with accent border for emphasis.</p>
                    </x-strata::card>
                </div>
            </div>

            {{-- Section --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Section Layout</h3>
                <x-strata::section width="narrow" padding="lg" class="bg-muted/50 rounded-lg">
                    <h4 class="font-semibold">Narrow Section</h4>
                    <p class="text-muted-foreground">This section has narrow width constraint and large padding.</p>
                </x-strata::section>
                <x-strata::section width="full" padding="sm" class="bg-accent/10 rounded-lg">
                    <h4 class="font-semibold">Full Width Section</h4>
                    <p class="text-muted-foreground">This section spans full width with small padding.</p>
                </x-strata::section>
            </div>
        </section>

        {{-- Form Components --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Form Components</h2>
                <p class="text-muted-foreground">Comprehensive form inputs with validation and features</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Left Column --}}
                <div class="space-y-6">
                    <x-strata::form.input
                        name="email"
                        type="email"
                        label="Email Address"
                        placeholder="Enter your email"
                        icon="heroicon-o-envelope"
                        clearable
                        required
                        description="We'll never share your email with anyone else."
                    />

                    <x-strata::form.input
                        type="password"
                        name="password"
                        label="Password"
                        placeholder="Enter your password"
                        showPasswordToggle
                        required
                    />

                    <x-strata::form.input
                        name="website"
                        type="url"
                        label="Website URL"
                        placeholder="example.com"
                    >
                        <x-slot name="leading">https://</x-slot>
                        <x-slot name="trailing">.com</x-slot>
                    </x-strata::form.input>

                    <x-strata::form.input
                        name="price"
                        type="number"
                        label="Price"
                        placeholder="0.00"
                        min="0"
                        step="0.01"
                    >
                        <x-slot name="leading">$</x-slot>
                    </x-strata::form.input>

                    <x-strata::form.textarea
                        name="bio"
                        label="Biography"
                        placeholder="Tell us about yourself..."
                        rows="4"
                        autoResize
                        description="This textarea will automatically resize as you type."
                    />

                    <x-strata::form.editor
                        name="content"
                        label="Rich Text Content"
                        placeholder="Start typing your content here..."
                        :minHeight="200"
                        description="Rich text editor with formatting capabilities"
                    />

                    <x-strata::form.select
                        name="country"
                        label="Country"
                        placeholder="Choose your country"
                        searchable
                        clearable
                        :items="[
                            'us' => 'United States',
                            'ca' => 'Canada',
                            'uk' => 'United Kingdom',
                            'au' => 'Australia',
                            'de' => 'Germany',
                            'fr' => 'France',
                            'jp' => 'Japan',
                            'br' => 'Brazil',
                        ]"
                    />
                </div>

                {{-- Right Column --}}
                <div class="space-y-6">
                    <x-strata::form.select
                        name="skills"
                        label="Skills (Multiple)"
                        placeholder="Select your skills"
                        multiple
                        searchable
                        :maxSelections="5"
                        :items="[
                            'php' => 'PHP',
                            'js' => 'JavaScript',
                            'python' => 'Python',
                            'java' => 'Java',
                            'laravel' => 'Laravel',
                            'vue' => 'Vue.js',
                            'react' => 'React',
                            'tailwind' => 'Tailwind CSS',
                        ]"
                        description="Select up to 5 skills"
                    />

                    <x-strata::form.color-picker
                        name="primary_color"
                        label="Primary Brand Color"
                        placeholder="Choose primary color"
                        format="hex"
                        :brandColors="true"
                        :allowCustom="true"
                        description="Select or customize your primary brand color"
                    />


                    <div class="space-y-4">
                        <x-strata::form.checkbox
                            name="terms"
                            id="terms"
                            value="1"
                            label="I agree to the Terms of Service"
                            description="Please read our terms before proceeding"
                        />

                        <x-strata::form.checkbox
                            name="newsletter"
                            id="newsletter"
                            value="1"
                            label="Subscribe to newsletter"
                        />
                    </div>

                    <div class="space-y-4">
                        <label class="text-sm font-medium">Preferred Contact Method</label>
                        <x-strata::form.radio
                            name="contact"
                            id="contact_email"
                            value="email"
                            label="Email"
                            description="Receive updates via email"
                        />
                        <x-strata::form.radio
                            name="contact"
                            id="contact_phone"
                            value="phone"
                            label="Phone"
                            description="Receive updates via phone"
                        />
                        <x-strata::form.radio
                            name="contact"
                            id="contact_sms"
                            value="sms"
                            label="SMS"
                            description="Receive updates via SMS"
                        />
                    </div>

                    <x-strata::form.toggle
                        name="notifications"
                        label="Email Notifications"
                        description="Receive email notifications for updates"
                    />

                    <x-strata::form.rating
                        name="satisfaction"
                        label="Satisfaction Rating"
                        description="Rate your experience from 1-5 stars"
                        :max="5"
                    />
                </div>
            </div>
        </section>

        {{-- Advanced Components --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Advanced Components</h2>
                <p class="text-muted-foreground">Complex interactive components</p>
            </div>

            {{-- Tabs --}}
            <div class="space-y-6">
                <h3 class="text-xl font-semibold">Tabs</h3>

                {{-- Default Tabs --}}
                <x-strata::tabs defaultValue="overview" class="max-w-4xl">
                    <x-strata::tabs.list>
                        <x-strata::tabs.trigger value="overview">Overview</x-strata::tabs.trigger>
                        <x-strata::tabs.trigger value="features">Features</x-strata::tabs.trigger>
                        <x-strata::tabs.trigger value="settings">Settings</x-strata::tabs.trigger>
                        <x-strata::tabs.trigger value="disabled" disabled>Disabled</x-strata::tabs.trigger>
                    </x-strata::tabs.list>

                    <x-strata::tabs.content value="overview" class="p-6 bg-card rounded-lg border">
                        <h4 class="font-semibold mb-3">Overview</h4>
                        <p class="text-muted-foreground mb-4">This is the overview tab content with default styling.</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <x-strata::card size="sm">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-primary">1,234</div>
                                    <div class="text-sm text-muted-foreground">Total Users</div>
                                </div>
                            </x-strata::card>
                            <x-strata::card size="sm">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-accent">89%</div>
                                    <div class="text-sm text-muted-foreground">Success Rate</div>
                                </div>
                            </x-strata::card>
                            <x-strata::card size="sm">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-success">$12.5K</div>
                                    <div class="text-sm text-muted-foreground">Revenue</div>
                                </div>
                            </x-strata::card>
                        </div>
                    </x-strata::tabs.content>

                    <x-strata::tabs.content value="features" class="p-6 bg-card rounded-lg border">
                        <h4 class="font-semibold mb-3">Features</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span>Keyboard Navigation</span>
                                <x-strata::badge color="success">Available</x-strata::badge>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>ARIA Accessibility</span>
                                <x-strata::badge color="success">Available</x-strata::badge>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Multiple Variants</span>
                                <x-strata::badge color="success">Available</x-strata::badge>
                            </div>
                        </div>
                    </x-strata::tabs.content>

                    <x-strata::tabs.content value="settings" class="p-6 bg-card rounded-lg border">
                        <h4 class="font-semibold mb-3">Settings</h4>
                        <div class="space-y-4">
                            <x-strata::form.toggle
                                name="auto_save"
                                label="Auto-save changes"
                                description="Automatically save changes as you work"
                            />
                            <x-strata::form.select
                                name="theme"
                                label="Theme"
                                :items="[
                                    'light' => 'Light',
                                    'dark' => 'Dark',
                                    'auto' => 'Auto',
                                ]"
                            />
                        </div>
                    </x-strata::tabs.content>
                </x-strata::tabs>

                {{-- Pills Variant --}}
                <x-strata::tabs defaultValue="dashboard" variant="pills" class="max-w-4xl">
                    <x-strata::tabs.list>
                        <x-strata::tabs.trigger value="dashboard">Dashboard</x-strata::tabs.trigger>
                        <x-strata::tabs.trigger value="analytics">Analytics</x-strata::tabs.trigger>
                        <x-strata::tabs.trigger value="reports">Reports</x-strata::tabs.trigger>
                    </x-strata::tabs.list>

                    <x-strata::tabs.content value="dashboard" class="p-6 bg-card rounded-lg border">
                        <h4 class="font-semibold mb-3">Dashboard (Pills Variant)</h4>
                        <p class="text-muted-foreground">This demonstrates the pills variant of the tabs component.</p>
                    </x-strata::tabs.content>

                    <x-strata::tabs.content value="analytics" class="p-6 bg-card rounded-lg border">
                        <h4 class="font-semibold mb-3">Analytics</h4>
                        <p class="text-muted-foreground">Analytics data would be displayed here.</p>
                    </x-strata::tabs.content>

                    <x-strata::tabs.content value="reports" class="p-6 bg-card rounded-lg border">
                        <h4 class="font-semibold mb-3">Reports</h4>
                        <p class="text-muted-foreground">Generate and download reports from this section.</p>
                    </x-strata::tabs.content>
                </x-strata::tabs>
            </div>

            {{-- Modal Triggers --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Modals</h3>
                <div class="flex flex-wrap gap-4">
                    <x-strata::modal.trigger name="basic-modal">
                        <x-strata::button>Basic Modal</x-strata::button>
                    </x-strata::modal.trigger>

                    <x-strata::modal.trigger name="large-modal">
                        <x-strata::button variant="accent">Large Modal</x-strata::button>
                    </x-strata::modal.trigger>

                    <x-strata::modal.trigger name="flyout-modal">
                        <x-strata::button variant="outline">Right Flyout</x-strata::button>
                    </x-strata::modal.trigger>
                </div>
            </div>

            {{-- Table --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Table</h3>
                <x-strata::table striped>
                    <x-strata::table.header>
                        <x-strata::table.cell header>Name</x-strata::table.cell>
                        <x-strata::table.cell header>Role</x-strata::table.cell>
                        <x-strata::table.cell header>Status</x-strata::table.cell>
                        <x-strata::table.cell header align="right">Actions</x-strata::table.cell>
                    </x-strata::table.header>
                    <x-strata::table.body>
                        <x-strata::table.row clickable>
                            <x-strata::table.cell>John Doe</x-strata::table.cell>
                            <x-strata::table.cell>Developer</x-strata::table.cell>
                            <x-strata::table.cell>
                                <x-strata::badge color="success">Active</x-strata::badge>
                            </x-strata::table.cell>
                            <x-strata::table.cell align="right">
                                <x-strata::button size="sm" variant="ghost">Edit</x-strata::button>
                            </x-strata::table.cell>
                        </x-strata::table.row>
                        <x-strata::table.row>
                            <x-strata::table.cell>Jane Smith</x-strata::table.cell>
                            <x-strata::table.cell>Designer</x-strata::table.cell>
                            <x-strata::table.cell>
                                <x-strata::badge color="warning">Away</x-strata::badge>
                            </x-strata::table.cell>
                            <x-strata::table.cell align="right">
                                <x-strata::button size="sm" variant="ghost">Edit</x-strata::button>
                            </x-strata::table.cell>
                        </x-strata::table.row>
                        <x-strata::table.row selected>
                            <x-strata::table.cell>Bob Wilson</x-strata::table.cell>
                            <x-strata::table.cell>Manager</x-strata::table.cell>
                            <x-strata::table.cell>
                                <x-strata::badge color="info">Busy</x-strata::badge>
                            </x-strata::table.cell>
                            <x-strata::table.cell align="right">
                                <x-strata::button size="sm" variant="ghost">Edit</x-strata::button>
                            </x-strata::table.cell>
                        </x-strata::table.row>
                    </x-strata::table.body>
                </x-strata::table>
            </div>

            {{-- Dropdown, Popover, Tooltip --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Interactive Elements</h3>
                <div class="flex flex-wrap gap-4">
                    <x-strata::dropdown>
                        <x-slot name="trigger">
                            <x-strata::button variant="outline">Dropdown Menu</x-strata::button>
                        </x-slot>
                        <div class="py-1">
                            <x-strata::nav-item icon="heroicon-o-user">Profile</x-strata::nav-item>
                            <x-strata::dropdown.separator />
                            <x-strata::dropdown.checkbox name="notifications" value="1" label="Notifications" />
                            <x-strata::dropdown.radio name="theme" value="dark" label="Dark Mode" />
                        </div>
                    </x-strata::dropdown>

                    <x-strata::popover>
                        <x-slot name="trigger">
                            <x-strata::button variant="outline">Popover</x-strata::button>
                        </x-slot>
                        <div class="p-4">
                            <h4 class="font-semibold mb-2">Popover Content</h4>
                            <p class="text-sm text-muted-foreground">This is additional information displayed in a popover.</p>
                        </div>
                    </x-strata::popover>

                    <x-strata::tooltip text="This is a helpful tooltip">
                        <x-strata::button variant="outline">Tooltip</x-strata::button>
                    </x-strata::tooltip>
                </div>
            </div>

            {{-- Calendar --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Calendar</h3>
                <div class="max-w-4xl">
                    <x-strata::calendar
                        :range="true"
                        :presets="true"
                        :showClearButton="true"
                        weekStart="sunday"
                    />
                </div>
            </div>

            {{-- File Upload --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">File Upload</h3>
                <div class="max-w-2xl">
                    <x-strata::form.file-upload
                        name="demo-files"
                        label="Upload Files"
                        accept="image/*,.pdf,.doc,.docx"
                        multiple
                        placeholder="Drop files here or click to browse"
                        description="Upload images or documents (max 5MB each)"
                    />
                </div>
            </div>

            {{-- Navigation Item --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Navigation</h3>
                <nav class="space-y-2 max-w-xs">
                    <x-strata::nav-item href="#" icon="heroicon-o-home" :active="true">Dashboard</x-strata::nav-item>
                    <x-strata::nav-item href="#" icon="heroicon-o-users">Users</x-strata::nav-item>
                    <x-strata::nav-item href="#" icon="heroicon-o-cog-6-tooth">Settings</x-strata::nav-item>
                </nav>
            </div>
        </section>

        {{-- Usage Examples --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Complete Examples</h2>
                <p class="text-muted-foreground">Real-world usage patterns</p>
            </div>

            {{-- Contact Form Example --}}
            <x-strata::card class="max-w-2xl mx-auto">
                <x-slot name="header">
                    <h3 class="text-lg font-semibold">Contact Form</h3>
                </x-slot>

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-strata::form.input
                            name="first_name"
                            label="First Name"
                            placeholder="John"
                            required
                        />
                        <x-strata::form.input
                            name="last_name"
                            label="Last Name"
                            placeholder="Doe"
                            required
                        />
                    </div>

                    <x-strata::form.input
                        name="email"
                        type="email"
                        label="Email"
                        placeholder="john@example.com"
                        icon="heroicon-o-envelope"
                        required
                    />

                    <x-strata::form.select
                        name="subject"
                        label="Subject"
                        :items="[
                            'general' => 'General Inquiry',
                            'support' => 'Support Request',
                            'bug' => 'Bug Report',
                            'feature' => 'Feature Request',
                        ]"
                        required
                    />

                    <x-strata::form.textarea
                        name="message"
                        label="Message"
                        placeholder="How can we help you?"
                        rows="5"
                        required
                    />

                    <x-strata::form.rating
                        name="priority"
                        label="Priority Level"
                        description="How urgent is this request?"
                        :max="5"
                    />

                    <x-strata::form.checkbox
                        name="subscribe"
                        id="subscribe"
                        value="1"
                        label="Subscribe to newsletter"
                        description="Get updates about new features and announcements"
                    />
                </div>

                <x-slot name="footer">
                    <div class="flex justify-between">
                        <x-strata::button variant="outline">Save Draft</x-strata::button>
                        <x-strata::button>Send Message</x-strata::button>
                    </div>
                </x-slot>
            </x-strata::card>
        </section>

        {{-- Footer --}}
        <footer class="text-center py-8 border-t">
            <p class="text-muted-foreground">
                Built with Strata UI - A comprehensive Laravel component library
            </p>
        </footer>
    </div>

    {{-- Modal Definitions --}}
    <x-strata::modal name="basic-modal">
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Basic Modal</h3>
            <p class="text-muted-foreground">This is a basic modal dialog with standard styling and behavior.</p>
            <div class="flex justify-end gap-2">
                <x-strata::modal.close>
                    <x-strata::button variant="outline">Cancel</x-strata::button>
                </x-strata::modal.close>
                <x-strata::button>Confirm</x-strata::button>
            </div>
        </div>
    </x-strata::modal>

    <x-strata::modal name="large-modal" size="lg">
        <div class="space-y-6">
            <h3 class="text-lg font-semibold">Large Modal</h3>
            <div class="prose prose-sm max-w-none">
                <p class="text-muted-foreground">This is a larger modal that can accommodate more content and complex layouts.</p>
                <p class="text-muted-foreground">It's perfect for forms, detailed information, or rich content presentations.</p>
            </div>
            <x-strata::alert color="info" title="Modal Features">
                <ul class="text-sm space-y-1">
                    <li>• Automatic focus management</li>
                    <li>• Backdrop click to close</li>
                    <li>• Escape key support</li>
                    <li>• Body scroll locking</li>
                </ul>
            </x-strata::alert>
            <div class="flex justify-end gap-2">
                <x-strata::modal.close>
                    <x-strata::button variant="outline">Close</x-strata::button>
                </x-strata::modal.close>
                <x-strata::button>Got it</x-strata::button>
            </div>
        </div>
    </x-strata::modal>

    <x-strata::modal name="flyout-modal" variant="flyout" position="right" size="md">
        <div class="space-y-6">
            <h3 class="text-lg font-semibold">Right Flyout</h3>
            <p class="text-muted-foreground">This flyout slides in from the right side of the screen.</p>
            <div class="space-y-4">
                <x-strata::form.input
                    name="flyout_name"
                    label="Name"
                    placeholder="Enter your name"
                />
                <x-strata::form.input
                    name="flyout_email"
                    type="email"
                    label="Email"
                    placeholder="Enter your email"
                />
                <x-strata::form.toggle
                    name="flyout_notifications"
                    label="Enable notifications"
                />
            </div>
            <div class="flex gap-2">
                <x-strata::button size="sm">Save</x-strata::button>
                <x-strata::modal.close>
                    <x-strata::button variant="outline" size="sm">Cancel</x-strata::button>
                </x-strata::modal.close>
            </div>
        </div>
    </x-strata::modal>

</div>
