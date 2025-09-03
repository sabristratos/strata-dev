<x-strata::main-content>
    <div class="container mx-auto space-y-16">
        {{-- Header --}}
        <div class="text-center space-y-4">
            <div class="flex items-center justify-center gap-4">
                <div class="flex-1 text-center">
                    <h1 class="text-4xl font-bold">Strata UI Components</h1>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-muted-foreground">Theme:</span>
                    <x-dark-mode-toggle />
                </div>
            </div>
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
                    <x-strata::avatar size="sm" initials="SM" status="online" tooltip="Sarah Miller - Online" />
                    <x-strata::avatar size="md" initials="MD" status="away" tooltip="Mark Davis - Away" />
                    <x-strata::avatar size="lg" initials="LG" status="busy" tooltip="Lisa Green - Busy" />
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

            {{-- Toast --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Toast</h3>
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

            <form>
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

                    <x-strata::form.datepicker
                        name="birth_date"
                        label="Birth Date"
                        placeholder="Select your birth date"
                        description="Single date selection"
                        :maxDate="now()->format('Y-m-d')"
                        wire:model="birth_date"
                    />

                    <x-strata::form.datepicker
                        name="event_dates"
                        label="Event Date Range"
                        placeholder="Select event dates"
                        description="Date range with presets"
                        :range="true"
                        :presets="true"
                        :minDate="now()->format('Y-m-d')"
                        :clearable="true"
                        wire:model="event_dates"
                    />
                </div>
                </div>
            </form>
        </section>

        {{-- Advanced Components --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Advanced Components</h2>
                <p class="text-muted-foreground">Complex interactive components</p>
            </div>

            {{-- Accordion --}}
            <div class="space-y-6">
                <h3 class="text-xl font-semibold">Accordion</h3>

                {{-- Default Single Accordion --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Single Selection (Default)</h4>
                    <p class="text-sm text-muted-foreground">Only one item can be open at a time</p>
                    <x-strata::accordion type="single" defaultValue="item-1" class="max-w-2xl">
                        <x-strata::accordion.item value="item-1" title="What is Strata UI?">
                            <p class="text-muted-foreground">Strata UI is a comprehensive Laravel component library built with Tailwind CSS and Alpine.js. It provides modern, accessible, and highly customizable components for building beautiful web applications.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="item-2" title="How do I install it?">
                            <div class="space-y-2">
                                <p class="text-muted-foreground">Installation is simple with Composer:</p>
                                <code class="block bg-muted p-2 rounded text-sm">composer require strata/ui</code>
                                <p class="text-muted-foreground">Then publish the assets and you're ready to go!</p>
                            </div>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="item-3" title="Is it accessible?">
                            <div class="space-y-3">
                                <p class="text-muted-foreground">Yes! Strata UI components are built with accessibility in mind:</p>
                                <ul class="space-y-1 text-sm text-muted-foreground ml-4">
                                    <li>• Full ARIA support</li>
                                    <li>• Keyboard navigation</li>
                                    <li>• Screen reader compatibility</li>
                                    <li>• Focus management</li>
                                </ul>
                            </div>
                        </x-strata::accordion.item>
                    </x-strata::accordion>
                </div>

                {{-- Multiple Selection Accordion --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Multiple Selection</h4>
                    <p class="text-sm text-muted-foreground">Multiple items can be open simultaneously</p>
                    <x-strata::accordion type="multiple" :defaultValue="['faq-1', 'faq-3']" class="max-w-2xl">
                        <x-strata::accordion.item value="faq-1" title="Can I customize the styling?">
                            <p class="text-muted-foreground">Absolutely! All components are built with Tailwind CSS and can be easily customized through CSS classes, variants, and configuration options.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="faq-2" title="Does it work with Livewire?">
                            <p class="text-muted-foreground">Yes, Strata UI components are designed to work seamlessly with Livewire, including two-way data binding and reactive updates.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="faq-3" title="What about Alpine.js integration?">
                            <p class="text-muted-foreground">All interactive components use Alpine.js for client-side functionality, providing smooth animations and responsive interactions.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="faq-4" title="Is there TypeScript support?">
                            <p class="text-muted-foreground">While the components themselves are built with PHP and JavaScript, they work perfectly with TypeScript projects and provide proper type definitions.</p>
                        </x-strata::accordion.item>
                    </x-strata::accordion>
                </div>

                {{-- Bordered Variant --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Bordered Variant</h4>
                    <p class="text-sm text-muted-foreground">Contained style with borders</p>
                    <x-strata::accordion variant="bordered" size="lg" class="max-w-2xl">
                        <x-strata::accordion.item value="feature-1" title="Advanced Components">
                            <p class="text-muted-foreground">Includes complex components like carousels, calendars, modals, and data tables with full customization options.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="feature-2" title="Form Components">
                            <p class="text-muted-foreground">Complete form component suite including inputs, selects, checkboxes, file uploads, and validation support.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="feature-3" title="Layout Components" disabled>
                            <p class="text-muted-foreground">This item is disabled to demonstrate the disabled state functionality.</p>
                        </x-strata::accordion.item>
                    </x-strata::accordion>
                </div>

                {{-- Flush Variant --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Flush Variant (No Borders)</h4>
                    <p class="text-sm text-muted-foreground">Clean style without borders or background</p>
                    <x-strata::accordion variant="flush" iconPosition="start" class="max-w-2xl">
                        <x-strata::accordion.item value="tip-1" title="Performance Optimization">
                            <p class="text-muted-foreground">Built with modern CSS techniques like scroll-snap for optimal performance across all devices.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="tip-2" title="Developer Experience">
                            <p class="text-muted-foreground">Intuitive API design with sensible defaults and comprehensive documentation.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="tip-3" title="Browser Support">
                            <p class="text-muted-foreground">Compatible with all modern browsers and gracefully degrades on older ones.</p>
                        </x-strata::accordion.item>
                    </x-strata::accordion>
                </div>

                {{-- Filled Variant --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Filled Variant</h4>
                    <p class="text-sm text-muted-foreground">Filled background style</p>
                    <x-strata::accordion variant="filled" size="sm" class="max-w-2xl">
                        <x-strata::accordion.item value="compact-1" title="Compact Design">
                            <p class="text-muted-foreground text-sm">Perfect for dense layouts with small size option.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="compact-2" title="Responsive">
                            <p class="text-muted-foreground text-sm">Works beautifully on mobile, tablet, and desktop.</p>
                        </x-strata::accordion.item>
                        <x-strata::accordion.item value="compact-3" title="Customizable">
                            <p class="text-muted-foreground text-sm">Easy to customize with Tailwind classes and variants.</p>
                        </x-strata::accordion.item>
                    </x-strata::accordion>
                </div>
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

            {{-- Sidebar --}}
            <div class="space-y-6">
                <h3 class="text-xl font-semibold">Sidebar</h3>

                {{-- Sidebar Toggle Examples --}}
                <div class="space-y-4">
                    <h4 class="font-medium">Sidebar Variants</h4>
                    <p class="text-sm text-muted-foreground">Different sidebar types with toggle buttons</p>

                    <div class="flex flex-wrap gap-4">
                        <x-strata::sidebar-toggle target="overlay-sidebar" variant="button">
                            Overlay Sidebar
                        </x-strata::sidebar-toggle>

                        <x-strata::sidebar-toggle target="push-sidebar" variant="button">
                            Push Content
                        </x-strata::sidebar-toggle>

                        <x-strata::sidebar-toggle target="right-sidebar" variant="hamburger" />

                        <x-strata::sidebar-toggle target="collapsible-sidebar" variant="icon" icon="heroicon-o-plus" />
                    </div>
                </div>

                {{-- Sidebar Implementation Examples --}}
                <div class="space-y-4">
                    <h4 class="font-medium">JavaScript API</h4>
                    <p class="text-sm text-muted-foreground">Control sidebars programmatically</p>

                    <div class="flex flex-wrap gap-3">
                        <x-strata::button
                            variant="outline"
                            size="sm"
                            @click="$strata.sidebar('overlay-sidebar').show()"
                        >
                            Show Overlay
                        </x-strata::button>

                        <x-strata::button
                            variant="outline"
                            size="sm"
                            @click="$strata.sidebar('push-sidebar').toggle()"
                        >
                            Toggle Push
                        </x-strata::button>

                        <x-strata::button
                            variant="outline"
                            size="sm"
                            @click="$strata.sidebars().closeAll()"
                        >
                            Close All
                        </x-strata::button>

                        <x-strata::button
                            variant="outline"
                            size="sm"
                            onclick="Strata.sidebar('right-sidebar').show()"
                        >
                            Vanilla JS API
                        </x-strata::button>
                    </div>
                </div>
            </div>

            {{-- Carousel --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Carousel</h3>

                {{-- Basic Single-Item Carousel --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Single-Item Carousel (Auto-play)</h4>
                    <p class="text-sm text-muted-foreground">Full-width slides with automatic progression</p>
                    <x-strata::carousel size="lg" autoplay :interval="4000" class="max-w-4xl">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-2">Welcome to Strata UI</h3>
                            <p class="text-lg opacity-90">Beautiful components for modern Laravel applications</p>
                        </div>
                        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-2">CSS Scroll-Snap</h3>
                            <p class="text-lg opacity-90">Built with modern CSS for optimal performance</p>
                        </div>
                        <div class="bg-gradient-to-r from-green-500 to-teal-500 rounded-lg p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-2">Fully Accessible</h3>
                            <p class="text-lg opacity-90">Complete keyboard navigation and screen reader support</p>
                        </div>
                        <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-lg p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-2">Touch Friendly</h3>
                            <p class="text-lg opacity-90">Native swipe gestures and touch interactions</p>
                        </div>
                    </x-strata::carousel>
                </div>

                {{-- Responsive Image Gallery --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Responsive Image Gallery</h4>
                    <p class="text-sm text-muted-foreground">Perfect fit: 1 item mobile, 2 tablet, 3 desktop with proper gaps</p>
                    <x-strata::carousel
                        variant="gallery"
                        :itemsPerView="['default' => 1, 'md' => 2, 'lg' => 3]"
                        gap="md"
                        size="sm"
                        class="max-w-5xl"
                    >
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop" alt="Mountain landscape" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=400&h=200&fit=crop" alt="Forest lake" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1500759104159-2b3b37dfdd53?w=400&h=200&fit=crop" alt="Ocean waves" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?w=400&h=200&fit=crop" alt="Desert sunset" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1515623446455-0a6dd49e4b84?w=400&h=200&fit=crop" alt="City skyline" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&h=200&fit=crop" alt="Forest path" class="h-40 object-cover rounded-lg" />
                    </x-strata::carousel>
                </div>

                {{-- Product Cards Showcase --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Product Cards Carousel</h4>
                    <p class="text-sm text-muted-foreground">Exact fit: 1 mobile, 2 tablet, 4 desktop - no overflow or partial items</p>
                    <x-strata::carousel
                        variant="cards"
                        :itemsPerView="['default' => 1, 'md' => 2, 'lg' => 4]"
                        snapAlign="start"
                        gap="sm"
                        class="max-w-6xl"
                    >
                        <x-strata::card>
                            <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=400&h=200&fit=crop" alt="Product 1" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Wireless Headphones</h4>
                            <p class="text-sm text-muted-foreground mb-3">Premium noise-canceling headphones</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$299</span>
                                <x-strata::button size="sm">Add to Cart</x-strata::button>
                            </div>
                        </x-strata::card>

                        <x-strata::card>
                            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=400&h=200&fit=crop" alt="Product 2" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Smart Watch</h4>
                            <p class="text-sm text-muted-foreground mb-3">Track your fitness and health</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$399</span>
                                <x-strata::button size="sm">Add to Cart</x-strata::button>
                            </div>
                        </x-strata::card>

                        <x-strata::card>
                            <img src="https://images.unsplash.com/photo-1565814329452-e1efa11c5b89?w=400&h=200&fit=crop" alt="Product 3" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Laptop Stand</h4>
                            <p class="text-sm text-muted-foreground mb-3">Ergonomic aluminum laptop stand</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$79</span>
                                <x-strata::button size="sm">Add to Cart</x-strata::button>
                            </div>
                        </x-strata::card>

                        <x-strata::card>
                            <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?w=400&h=200&fit=crop" alt="Product 4" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Keyboard</h4>
                            <p class="text-sm text-muted-foreground mb-3">Mechanical gaming keyboard</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$159</span>
                                <x-strata::button size="sm">Add to Cart</x-strata::button>
                            </div>
                        </x-strata::card>

                        <x-strata::card>
                            <img src="https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?w=400&h=200&fit=crop" alt="Product 5" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Wireless Mouse</h4>
                            <p class="text-sm text-muted-foreground mb-3">Ergonomic wireless mouse with RGB</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$89</span>
                                <x-strata::button size="sm">Add to Cart</x-strata::button>
                            </div>
                        </x-strata::card>

                        <x-strata::card>
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=200&fit=crop" alt="Product 6" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Studio Headphones</h4>
                            <p class="text-sm text-muted-foreground mb-3">Professional studio monitoring</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$249</span>
                                <x-strata::button size="sm">Add to Cart</x-strata::button>
                            </div>
                        </x-strata::card>

                        <x-strata::card>
                            <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?w=400&h=200&fit=crop" alt="Product 7" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Laptop Backpack</h4>
                            <p class="text-sm text-muted-foreground mb-3">Waterproof laptop backpack</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$69</span>
                                <x-strata::button size="sm">Add to Cart</x-strata::button>
                            </div>
                        </x-strata::card>

                        <x-strata::card>
                            <img src="https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?w=400&h=200&fit=crop" alt="Product 8" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">USB-C Hub</h4>
                            <p class="text-sm text-muted-foreground mb-3">7-in-1 USB-C multiport hub</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$45</span>
                                <x-strata::button size="sm">Add to Cart</x-strata::button>
                            </div>
                        </x-strata::card>
                    </x-strata::carousel>
                </div>

                {{-- Testimonials Slideshow --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Customer Testimonials</h4>
                    <p class="text-sm text-muted-foreground">Full-width single testimonials with dots navigation and auto-play</p>
                    <x-strata::carousel
                        size="md"
                        autoplay
                        :interval="6000"
                        :showArrows="false"
                        class="max-w-2xl"
                    >
                        <div class="text-center p-6 bg-card rounded-lg border">
                            <div class="mb-4">
                                <x-strata::form.rating :value="5" readonly :clearable="false" class="justify-center" />
                            </div>
                            <blockquote class="text-lg italic mb-4">
                                "Strata UI has completely transformed how we build Laravel applications. The components are beautiful and incredibly easy to use."
                            </blockquote>
                            <div class="flex items-center justify-center gap-3">
                                <x-strata::avatar size="sm" initials="JS" />
                                <div class="text-left">
                                    <div class="font-semibold">John Smith</div>
                                    <div class="text-sm text-muted-foreground">Lead Developer</div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center p-6 bg-card rounded-lg border">
                            <div class="mb-4">
                                <x-strata::form.rating :value="5" readonly :clearable="false" class="justify-center" />
                            </div>
                            <blockquote class="text-lg italic mb-4">
                                "The accessibility features are outstanding. Our users love the keyboard navigation and screen reader support."
                            </blockquote>
                            <div class="flex items-center justify-center gap-3">
                                <x-strata::avatar size="sm" initials="MJ" />
                                <div class="text-left">
                                    <div class="font-semibold">Maria Johnson</div>
                                    <div class="text-sm text-muted-foreground">UX Designer</div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center p-6 bg-card rounded-lg border">
                            <div class="mb-4">
                                <x-strata::form.rating :value="4" readonly :clearable="false" class="justify-center" />
                            </div>
                            <blockquote class="text-lg italic mb-4">
                                "Performance is incredible with the CSS scroll-snap implementation. Smooth as butter on all devices."
                            </blockquote>
                            <div class="flex items-center justify-center gap-3">
                                <x-strata::avatar size="sm" initials="RW" />
                                <div class="text-left">
                                    <div class="font-semibold">Robert Wilson</div>
                                    <div class="text-sm text-muted-foreground">Frontend Architect</div>
                                </div>
                            </div>
                        </div>
                    </x-strata::carousel>
                </div>

                {{-- Additional Carousel Examples --}}
                <div class="space-y-2">
                    <h4 class="font-medium">Showcase: Different Gap Sizes</h4>
                    <p class="text-sm text-muted-foreground">Demonstrating small, medium, and large gaps with perfect width calculations</p>

                    {{-- Small Gap Example --}}
                    <div class="space-y-1">
                        <h5 class="text-sm font-medium text-muted-foreground">Small Gap (gap-2)</h5>
                        <x-strata::carousel
                            variant="cards"
                            :itemsPerView="['default' => 2, 'lg' => 4]"
                            gap="sm"
                            size="sm"
                            class="max-w-4xl"
                        >
                            <div class="bg-blue-100 rounded-lg p-4 text-center">
                                <div class="text-blue-800 font-medium">Card 1</div>
                                <div class="text-sm text-blue-600">Small gap</div>
                            </div>
                            <div class="bg-green-100 rounded-lg p-4 text-center">
                                <div class="text-green-800 font-medium">Card 2</div>
                                <div class="text-sm text-green-600">Small gap</div>
                            </div>
                            <div class="bg-purple-100 rounded-lg p-4 text-center">
                                <div class="text-purple-800 font-medium">Card 3</div>
                                <div class="text-sm text-purple-600">Small gap</div>
                            </div>
                            <div class="bg-orange-100 rounded-lg p-4 text-center">
                                <div class="text-orange-800 font-medium">Card 4</div>
                                <div class="text-sm text-orange-600">Small gap</div>
                            </div>
                            <div class="bg-red-100 rounded-lg p-4 text-center">
                                <div class="text-red-800 font-medium">Card 5</div>
                                <div class="text-sm text-red-600">Small gap</div>
                            </div>
                            <div class="bg-indigo-100 rounded-lg p-4 text-center">
                                <div class="text-indigo-800 font-medium">Card 6</div>
                                <div class="text-sm text-indigo-600">Small gap</div>
                            </div>
                        </x-strata::carousel>
                    </div>

                    {{-- Large Gap Example --}}
                    <div class="space-y-1">
                        <h5 class="text-sm font-medium text-muted-foreground">Large Gap (gap-6)</h5>
                        <x-strata::carousel
                            variant="gallery"
                            :itemsPerView="['default' => 1, 'md' => 3]"
                            gap="lg"
                            size="sm"
                            class="max-w-4xl"
                        >
                            <div class="bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg p-6 text-white text-center">
                                <div class="font-bold text-lg">Large Gap</div>
                                <div class="text-sm opacity-90">Perfect spacing</div>
                            </div>
                            <div class="bg-gradient-to-br from-violet-500 to-purple-500 rounded-lg p-6 text-white text-center">
                                <div class="font-bold text-lg">Large Gap</div>
                                <div class="text-sm opacity-90">Perfect spacing</div>
                            </div>
                            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 rounded-lg p-6 text-white text-center">
                                <div class="font-bold text-lg">Large Gap</div>
                                <div class="text-sm opacity-90">Perfect spacing</div>
                            </div>
                            <div class="bg-gradient-to-br from-emerald-500 to-green-500 rounded-lg p-6 text-white text-center">
                                <div class="font-bold text-lg">Large Gap</div>
                                <div class="text-sm opacity-90">Perfect spacing</div>
                            </div>
                        </x-strata::carousel>
                    </div>
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
                <div class="space-y-4">
                    <div class="max-w-2xl">
                        <h4 class="font-medium mb-2">Standard File Upload</h4>
                        <p class="text-sm text-muted-foreground mb-3">Features integrated Progress components for upload tracking</p>
                        <x-strata::form.file-upload
                            name="demo-files"
                            label="Upload Files"
                            accept="image/*,.pdf,.doc,.docx"
                            multiple
                            placeholder="Drop files here or click to browse"
                            description="Upload images or documents (max 5MB each) - Progress bars powered by Strata Progress component"
                        />
                    </div>

                    <div class="max-w-2xl">
                        <h4 class="font-medium mb-2">Gallery View Upload</h4>
                        <p class="text-sm text-muted-foreground mb-3">Perfect for image collections with visual previews</p>
                        <x-strata::form.file-upload
                            name="gallery-files"
                            variant="gallery"
                            label="Upload Images"
                            accept="image/*"
                            multiple
                            placeholder="Add images to gallery"
                            description="Visual gallery with integrated progress tracking"
                        />
                    </div>
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

    {{-- Sidebar Definitions --}}
    <x-strata::sidebar
        name="overlay-sidebar"
        variant="overlay"
        position="left"
        width="w-80"
    >
        <x-slot name="header">
            <div class="flex items-center gap-3">
                <x-strata::avatar size="sm" initials="SU" />
                <div>
                    <div class="font-semibold">Strata UI</div>
                    <div class="text-sm text-muted-foreground">Overlay Sidebar</div>
                </div>
            </div>
        </x-slot>

        <x-strata::sidebar-group label="Main Navigation">
            <x-strata::nav-item href="#" icon="heroicon-o-home" active>Dashboard</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-users">Team</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-folder">Projects</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-chart-bar">Analytics</x-strata::nav-item>
        </x-strata::sidebar-group>

        <x-strata::sidebar-group label="Recent" collapsible>
            <x-strata::nav-item href="#" icon="heroicon-o-document">Project Alpha</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-document">Website Redesign</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-document">Mobile App</x-strata::nav-item>
        </x-strata::sidebar-group>

        <x-strata::sidebar-group label="Settings">
            <x-strata::nav-item href="#" icon="heroicon-o-cog-6-tooth">Preferences</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-bell">Notifications</x-strata::nav-item>
        </x-strata::sidebar-group>

        <x-slot name="footer">
            <div class="flex items-center gap-2">
                <x-strata::button variant="ghost" size="sm" class="flex-1">
                    <x-strata::icon name="heroicon-o-arrow-right-start-on-rectangle" class="w-4 h-4 mr-2" />
                    Sign Out
                </x-strata::button>
            </div>
        </x-slot>
    </x-strata::sidebar>

    <x-strata::sidebar
        name="push-sidebar"
        variant="push"
        position="left"
        width="w-72"
        persistent
    >
        <x-slot name="header">
            <div class="text-center">
                <div class="font-semibold">Push Sidebar</div>
                <div class="text-sm text-muted-foreground">Pushes content aside</div>
            </div>
        </x-slot>

        <x-strata::sidebar-group label="Navigation">
            <x-strata::nav-item href="#" icon="heroicon-o-squares-2x2">Overview</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-document-text">Documentation</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-code-bracket">Components</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-paint-brush">Themes</x-strata::nav-item>
        </x-strata::sidebar-group>

        <x-strata::sidebar-group label="Tools" collapsible collapsed>
            <x-strata::nav-item href="#" icon="heroicon-o-wrench-screwdriver">Settings</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-bug-ant">Debug</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-academic-cap">Learning</x-strata::nav-item>
        </x-strata::sidebar-group>
    </x-strata::sidebar>

    <x-strata::sidebar
        name="right-sidebar"
        variant="overlay"
        position="right"
        width="w-96"
    >
        <x-slot name="header">
            <div>
                <div class="font-semibold">Right Sidebar</div>
                <div class="text-sm text-muted-foreground">Information panel</div>
            </div>
        </x-slot>

        <div class="space-y-6">
            <x-strata::card size="sm">
                <div class="text-center">
                    <div class="text-2xl font-bold text-primary mb-1">1,234</div>
                    <div class="text-sm text-muted-foreground">Active Users</div>
                </div>
            </x-strata::card>

            <x-strata::card size="sm">
                <div class="text-center">
                    <div class="text-2xl font-bold text-accent mb-1">89%</div>
                    <div class="text-sm text-muted-foreground">Success Rate</div>
                </div>
            </x-strata::card>

            <div>
                <h4 class="font-medium mb-3">Recent Activity</h4>
                <div class="space-y-2">
                    <div class="flex items-center gap-3 text-sm">
                        <x-strata::avatar size="xs" initials="JD" />
                        <span class="text-muted-foreground">John deployed to production</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <x-strata::avatar size="xs" initials="SM" />
                        <span class="text-muted-foreground">Sarah created new project</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <x-strata::avatar size="xs" initials="BW" />
                        <span class="text-muted-foreground">Bob fixed critical bug</span>
                    </div>
                </div>
            </div>
        </div>
    </x-strata::sidebar>

    <x-strata::sidebar
        name="collapsible-sidebar"
        variant="fixed"
        position="left"
        width="w-64"
        collapsible
        persistent
    >
        <x-slot name="header">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-primary-foreground font-bold text-sm">S</span>
                </div>
                <div x-show="!collapsed" x-transition>
                    <div class="font-semibold">Strata UI</div>
                    <div class="text-xs text-muted-foreground">v1.0</div>
                </div>
            </div>
        </x-slot>

        <x-strata::sidebar-group label="Main" x-show="!collapsed">
            <x-strata::nav-item href="#" icon="heroicon-o-home">Dashboard</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-chart-bar">Analytics</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-users">Users</x-strata::nav-item>
            <x-strata::nav-item href="#" icon="heroicon-o-cog-6-tooth">Settings</x-strata::nav-item>
        </x-strata::sidebar-group>

        <div x-show="collapsed" x-transition class="space-y-1">
            <x-strata::nav-item href="#" icon="heroicon-o-home" :tooltip="'Dashboard'" />
            <x-strata::nav-item href="#" icon="heroicon-o-chart-bar" :tooltip="'Analytics'" />
            <x-strata::nav-item href="#" icon="heroicon-o-users" :tooltip="'Users'" />
            <x-strata::nav-item href="#" icon="heroicon-o-cog-6-tooth" :tooltip="'Settings'" />
        </div>
    </x-strata::sidebar>
    </div>
</x-strata::main-content>
