<div class="min-h-screen bg-background text-foreground">
<div class="container mx-auto p-8 space-y-12">
    {{-- Header with Dark Mode Toggle --}}
    <div class="flex justify-between items-start">
        <section class="space-y-4">
            <h1>Strata UI Demo</h1>
            <h2>Semantic Design System</h2>
            <p>Showcasing updated components with semantic color variables</p>
        </section>
        <div class="flex flex-col items-end space-y-2">
            <small class="text-muted-foreground">Dark Mode</small>
            <x-dark-mode-toggle />
        </div>
    </div>

    {{-- Button Component Demo --}}
    <section class="space-y-6">
        <h3>Button Components</h3>
        <div class="flex flex-wrap gap-4">
            <x-strata::button>Primary Button</x-strata::button>
            <x-strata::button variant="accent">Accent Button</x-strata::button>
            <x-strata::button variant="secondary">Secondary Button</x-strata::button>
            <x-strata::button variant="destructive">Destructive Button</x-strata::button>
            <x-strata::button variant="outline">Outline Button</x-strata::button>
            <x-strata::button variant="ghost">Ghost Button</x-strata::button>
        </div>
        <div class="flex flex-wrap gap-4">
            <x-strata::button size="sm">Small Button</x-strata::button>
            <x-strata::button>Default Button</x-strata::button>
            <x-strata::button size="lg">Large Button</x-strata::button>
        </div>
    </section>

    {{-- Alert Component Demo --}}
    <section class="space-y-6">
        <h3>Alert Components</h3>
        <div class="space-y-4 max-w-2xl">
            <x-strata::alert color="primary" title="Primary Alert">
                This is a primary alert message using semantic colors.
            </x-strata::alert>
            <x-strata::alert color="accent" title="Accent Alert" variant="soft">
                This is an accent alert with soft variant styling.
            </x-strata::alert>
            <x-strata::alert color="success" title="Success Alert" dismissible>
                Operation completed successfully! This alert is dismissible.
            </x-strata::alert>
            <x-strata::alert color="warning" title="Warning Alert" variant="outline">
                Please review the following information carefully.
            </x-strata::alert>
            <x-strata::alert color="destructive" title="Error Alert">
                An error occurred while processing your request.
            </x-strata::alert>
        </div>
    </section>

    {{-- Badge Component Demo --}}
    <section class="space-y-6">
        <h3>Badge Components</h3>
        <div class="flex flex-wrap gap-4 items-center">
            <x-strata::badge>Default Badge</x-strata::badge>
            <x-strata::badge color="accent">Accent Badge</x-strata::badge>
            <x-strata::badge color="success">Success Badge</x-strata::badge>
            <x-strata::badge color="warning">Warning Badge</x-strata::badge>
            <x-strata::badge color="destructive">Error Badge</x-strata::badge>
            <x-strata::badge color="info">Info Badge</x-strata::badge>
        </div>
        <div class="flex flex-wrap gap-4 items-center">
            <x-strata::badge variant="outline" color="primary">Outline Badge</x-strata::badge>
            <x-strata::badge variant="soft" color="accent">Soft Badge</x-strata::badge>
            <x-strata::badge size="sm">Small Badge</x-strata::badge>
            <x-strata::badge size="lg">Large Badge</x-strata::badge>
        </div>
    </section>

    {{-- Card Component Demo --}}
    <section class="space-y-6">
        <h3>Card Components</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-strata::card>
                <h4 class="font-semibold mb-2">Default Card</h4>
                <p class="text-muted-foreground">This card uses bg-card and text-card-foreground semantic colors.</p>
                <div class="mt-4">
                    <x-strata::button size="sm">Action</x-strata::button>
                </div>
            </x-strata::card>

            <x-strata::card border="primary" size="lg">
                <h4 class="font-semibold mb-2">Primary Border Card</h4>
                <p class="text-muted-foreground">This card has a primary color border and large padding.</p>
                <div class="mt-4 flex gap-2">
                    <x-strata::badge color="primary">Featured</x-strata::badge>
                </div>
            </x-strata::card>

            <x-strata::card border="accent" size="sm">
                <h4 class="font-semibold mb-2">Accent Border Card</h4>
                <p class="text-muted-foreground text-sm">Compact card with accent border.</p>
            </x-strata::card>
        </div>
    </section>

    {{-- Form Component Demo --}}
    <section class="space-y-6">
        <h3>Form Components</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <x-strata::form.group
                    label="Email Address"
                    for="email"
                    help-text="We'll never share your email"
                >
                    <x-strata::form.input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        clearable
                    />
                </x-strata::form.group>

                <x-strata::form.group
                    label="Password"
                    for="password"
                >
                    <x-strata::form.input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        show-password-toggle
                    />
                </x-strata::form.group>

                <x-strata::form.group
                    label="Choose a Framework"
                    for="framework"
                    help-text="Select your preferred framework"
                >
                    <x-strata::form.select
                        :items="['Laravel', 'Vue.js', 'React', 'Alpine.js', 'Tailwind CSS']"
                        :selected="0"
                        name="framework"
                    />
                </x-strata::form.group>

                <x-strata::form.group
                    label="Multiple Skills"
                    for="skills"
                    help-text="Auto-searchable when 10+ items (threshold reached)"
                >
                    <x-strata::form.select
                        :items="['PHP', 'JavaScript', 'Python', 'Java', 'C#', 'Go', 'Rust', 'Laravel', 'Vue.js', 'React', 'Angular', 'TypeScript', 'Node.js', 'Docker']"
                        :selected="[0, 7]"
                        name="skills"
                        :multiple="true"
                        placeholder="Select your skills..."
                    />
                </x-strata::form.group>

                <x-strata::form.group
                    label="Top 3 Preferences"
                    for="preferences"
                    help-text="Select up to 3 preferred technologies (searchable)"
                >
                    <x-strata::form.select
                        :items="['Backend Development', 'Frontend Development', 'Database Design', 'UI/UX Design', 'DevOps', 'Mobile Development', 'API Development', 'Testing', 'Machine Learning', 'Data Science', 'Cloud Computing', 'Security']"
                        :selected="[0]"
                        name="preferences"
                        :multiple="true"
                        :max-selections="3"
                        :searchable="true"
                        placeholder="Choose up to 3..."
                    />
                </x-strata::form.group>

                <x-strata::form.group
                    label="Country Selection"
                    for="country"
                    help-text="Search and select your country (with clear button)"
                >
                    <x-strata::form.select
                        :items="[
                            'Afghanistan', 'Albania', 'Algeria', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan',
                            'Bangladesh', 'Belgium', 'Bolivia', 'Bosnia and Herzegovina', 'Brazil', 'Bulgaria', 'Canada',
                            'Chile', 'China', 'Colombia', 'Croatia', 'Czech Republic', 'Denmark', 'Ecuador', 'Egypt',
                            'Estonia', 'Finland', 'France', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Hungary', 'Iceland',
                            'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Japan', 'Jordan',
                            'Kazakhstan', 'Kenya', 'South Korea', 'Latvia', 'Lebanon', 'Lithuania', 'Luxembourg', 'Malaysia',
                            'Mexico', 'Morocco', 'Netherlands', 'New Zealand', 'Nigeria', 'Norway', 'Pakistan', 'Peru',
                            'Philippines', 'Poland', 'Portugal', 'Romania', 'Russia', 'Saudi Arabia', 'Singapore',
                            'Slovakia', 'Slovenia', 'South Africa', 'Spain', 'Sweden', 'Switzerland', 'Thailand', 'Turkey',
                            'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Venezuela', 'Vietnam'
                        ]"
                        :selected="63"
                        name="country"
                        :searchable="true"
                        :clearable="true"
                        placeholder="Search for your country..."
                    />
                </x-strata::form.group>
            </div>

            <div class="space-y-4">
                <x-strata::form.group
                    label="Message"
                    for="message"
                >
                    <x-strata::form.textarea
                        name="message"
                        placeholder="Enter your message..."
                        rows="4"
                    />
                </x-strata::form.group>

                <div class="space-y-3">
                    <label class="text-sm font-medium">Preferences</label>
                    <x-strata::form.checkbox
                        name="newsletter"
                        id="newsletter"
                        value="1"
                        label="Subscribe to newsletter"
                    />
                    <x-strata::form.checkbox
                        name="marketing"
                        id="marketing"
                        value="1"
                        label="Receive marketing emails"
                    />
                    <x-strata::form.toggle
                        name="notifications"
                        id="notifications"
                        label="Enable notifications"
                    />
                </div>
            </div>
        </div>

        <div class="flex gap-4 pt-4">
            <x-strata::button>Submit Form</x-strata::button>
            <x-strata::button variant="outline">Cancel</x-strata::button>
        </div>
    </section>

    {{-- Tabs Component Demo --}}
    <section class="space-y-6">
        <h3>Tabs Components</h3>

        {{-- Basic Default Tabs --}}
        <div class="space-y-4">
            <h4>Default Tabs</h4>
            <x-strata::tabs default-value="account" class="w-full max-w-4xl">
                <x-strata::tabs.tab-list>
                    <x-strata::tabs.trigger value="account">Account</x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="security">Security</x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="notifications">Notifications</x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="billing" disabled>Billing</x-strata::tabs.trigger>
                </x-strata::tabs.tab-list>
                
                <x-strata::tabs.content value="account" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Account Settings</h5>
                    <p class="text-muted-foreground mb-4">Manage your account preferences and profile information.</p>
                    <div class="space-y-4">
                        <x-strata::form.group label="Display Name" for="account-name">
                            <x-strata::form.input name="account-name" placeholder="Enter your display name" />
                        </x-strata::form.group>
                        <x-strata::form.group label="Bio" for="account-bio">
                            <x-strata::form.textarea name="account-bio" placeholder="Tell us about yourself" rows="3" />
                        </x-strata::form.group>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="security" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Security Settings</h5>
                    <p class="text-muted-foreground mb-4">Configure your security preferences, passwords, and two-factor authentication.</p>
                    <div class="space-y-4">
                        <x-strata::form.group label="Current Password" for="current-password">
                            <x-strata::form.input type="password" name="current-password" placeholder="Enter current password" show-password-toggle />
                        </x-strata::form.group>
                        <x-strata::form.checkbox
                            name="two-factor"
                            id="two-factor"
                            value="1"
                            label="Enable two-factor authentication"
                        />
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="notifications" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Notification Settings</h5>
                    <p class="text-muted-foreground mb-4">Choose how and when you want to receive notifications.</p>
                    <div class="space-y-3">
                        <x-strata::form.checkbox
                            name="email-notifications"
                            id="email-notifications"
                            value="1"
                            label="Email notifications"
                        />
                        <x-strata::form.checkbox
                            name="push-notifications"
                            id="push-notifications"
                            value="1"
                            label="Push notifications"
                        />
                        <x-strata::form.toggle
                            name="marketing-emails"
                            id="marketing-emails"
                            label="Marketing emails"
                        />
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="billing" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Billing Settings</h5>
                    <p class="text-muted-foreground">Manage your billing information and subscription.</p>
                    <x-strata::badge color="warning" class="mt-4">Coming Soon</x-strata::badge>
                </x-strata::tabs.content>
            </x-strata::tabs>
        </div>

        {{-- Pills Variant --}}
        <div class="space-y-4">
            <h4>Pills Variant</h4>
            <x-strata::tabs default-value="overview" variant="pills" class="w-full max-w-4xl">
                <x-strata::tabs.tab-list>
                    <x-strata::tabs.trigger value="overview">
                        <span class="flex items-center gap-2">
                            <x-icon name="heroicon-o-chart-bar" class="w-4 h-4" />
                            Overview
                        </span>
                    </x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="analytics">
                        <span class="flex items-center gap-2">
                            <x-icon name="heroicon-o-presentation-chart-line" class="w-4 h-4" />
                            Analytics
                        </span>
                    </x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="reports">
                        <span class="flex items-center gap-2">
                            <x-icon name="heroicon-o-document-chart-bar" class="w-4 h-4" />
                            Reports
                        </span>
                    </x-strata::tabs.trigger>
                </x-strata::tabs.tab-list>
                
                <x-strata::tabs.content value="overview" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Dashboard Overview</h5>
                    <p class="text-muted-foreground mb-6">General overview of your dashboard metrics and key performance indicators.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <x-strata::card size="sm">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary">1,234</div>
                                <div class="text-sm text-muted-foreground">Total Users</div>
                            </div>
                        </x-strata::card>
                        <x-strata::card size="sm">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-accent">89.2%</div>
                                <div class="text-sm text-muted-foreground">Success Rate</div>
                            </div>
                        </x-strata::card>
                        <x-strata::card size="sm">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-chart-3">$12.5K</div>
                                <div class="text-sm text-muted-foreground">Revenue</div>
                            </div>
                        </x-strata::card>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="analytics" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Analytics Dashboard</h5>
                    <p class="text-muted-foreground mb-4">Detailed analytics and performance metrics for your application.</p>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium">Page Views</span>
                            <x-strata::badge color="success">+12%</x-strata::badge>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium">Unique Visitors</span>
                            <x-strata::badge color="info">+8.5%</x-strata::badge>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium">Bounce Rate</span>
                            <x-strata::badge color="warning">-2.1%</x-strata::badge>
                        </div>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="reports" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Reports & Exports</h5>
                    <p class="text-muted-foreground mb-4">Generate and download detailed reports for your data analysis needs.</p>
                    <div class="space-y-3">
                        <x-strata::button variant="outline" size="sm" class="w-full">
                            Export Monthly Report
                        </x-strata::button>
                        <x-strata::button variant="outline" size="sm" class="w-full">
                            Export User Analytics
                        </x-strata::button>
                        <x-strata::button variant="outline" size="sm" class="w-full">
                            Export Revenue Data
                        </x-strata::button>
                    </div>
                </x-strata::tabs.content>
            </x-strata::tabs>
        </div>

        {{-- Underline Variant --}}
        <div class="space-y-4">
            <h4>Underline Variant</h4>
            <x-strata::tabs default-value="design" variant="underline" class="w-full max-w-4xl">
                <x-strata::tabs.tab-list>
                    <x-strata::tabs.trigger value="design">Design</x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="code">Code</x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="preview">Preview</x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="settings">Settings</x-strata::tabs.trigger>
                </x-strata::tabs.tab-list>
                
                <x-strata::tabs.content value="design" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Design System</h5>
                    <p class="text-muted-foreground mb-6">Visual design guidelines, components, and style specifications.</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <h6>Color Palette</h6>
                            <div class="flex gap-2">
                                <div class="w-8 h-8 bg-primary rounded"></div>
                                <div class="w-8 h-8 bg-accent rounded"></div>
                                <div class="w-8 h-8 bg-secondary rounded"></div>
                                <div class="w-8 h-8 bg-muted rounded"></div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <h6>Typography</h6>
                            <div class="space-y-1">
                                <div class="text-lg font-bold">Heading Large</div>
                                <div class="text-base font-medium">Heading Medium</div>
                                <div class="text-sm text-muted-foreground">Body text</div>
                            </div>
                        </div>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="code" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Code Examples</h5>
                    <p class="text-muted-foreground mb-4">Implementation examples and code snippets for developers.</p>
                    <div class="bg-muted p-4 rounded-lg font-mono text-sm">
                        <div class="text-muted-foreground">// Basic tabs usage</div>
                        <div>&lt;x-strata::tabs default-value="tab1"&gt;</div>
                        <div class="pl-2">&lt;x-strata::tabs.list&gt;</div>
                        <div class="pl-4">&lt;x-strata::tabs.trigger value="tab1"&gt;Tab 1&lt;/x-strata::tabs.trigger&gt;</div>
                        <div class="pl-2">&lt;/x-strata::tabs.list&gt;</div>
                        <div class="pl-2">&lt;x-strata::tabs.content value="tab1"&gt;Content&lt;/x-strata::tabs.content&gt;</div>
                        <div>&lt;/x-strata::tabs&gt;</div>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="preview" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Live Preview</h5>
                    <p class="text-muted-foreground mb-4">Interactive preview of the component in action.</p>
                    <x-strata::alert color="success" title="Component Ready">
                        The tabs component is fully functional with keyboard navigation, accessibility features, and smooth animations.
                    </x-strata::alert>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="settings" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Configuration</h5>
                    <p class="text-muted-foreground mb-4">Available configuration options and customization settings.</p>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <strong class="text-sm">Variants:</strong>
                                <ul class="text-sm text-muted-foreground mt-1">
                                    <li>• default</li>
                                    <li>• pills</li>
                                    <li>• underline</li>
                                </ul>
                            </div>
                            <div>
                                <strong class="text-sm">Features:</strong>
                                <ul class="text-sm text-muted-foreground mt-1">
                                    <li>• Keyboard navigation</li>
                                    <li>• ARIA accessibility</li>
                                    <li>• Smooth transitions</li>
                                    <li>• Livewire support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </x-strata::tabs.content>
            </x-strata::tabs>
        </div>

        {{-- Vertical Tabs --}}
        <div class="space-y-4">
            <h4>Vertical Orientation</h4>
            <p class="text-sm text-muted-foreground mb-4">
                Clean sidebar navigation on desktop with subtle background and no borders. Responsive stacking on mobile with horizontal scrolling.
            </p>
            <x-strata::tabs default-value="profile" orientation="vertical" class="grid grid-cols-1 lg:grid-cols-[240px_1fr] gap-8 max-w-6xl">
                <x-strata::tabs.tab-list class="flex lg:flex-col gap-2 lg:gap-2 border-b lg:border-b-0 border-border pb-4 lg:pb-0 overflow-x-auto lg:overflow-x-visible lg:bg-muted/30 lg:p-2 lg:rounded-lg">
                    <x-strata::tabs.trigger value="profile" class="justify-center lg:justify-start whitespace-nowrap lg:whitespace-normal">
                        <span class="flex items-center gap-2">
                            <x-icon name="heroicon-o-user" class="w-4 h-4" />
                            <span class="hidden sm:inline">Profile</span>
                        </span>
                    </x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="preferences" class="justify-center lg:justify-start whitespace-nowrap lg:whitespace-normal">
                        <span class="flex items-center gap-2">
                            <x-icon name="heroicon-o-cog-6-tooth" class="w-4 h-4" />
                            <span class="hidden sm:inline">Preferences</span>
                        </span>
                    </x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="integrations" class="justify-center lg:justify-start whitespace-nowrap lg:whitespace-normal">
                        <span class="flex items-center gap-2">
                            <x-icon name="heroicon-o-puzzle-piece" class="w-4 h-4" />
                            <span class="hidden sm:inline">Integrations</span>
                        </span>
                    </x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="advanced" class="justify-center lg:justify-start whitespace-nowrap lg:whitespace-normal">
                        <span class="flex items-center gap-2">
                            <x-icon name="heroicon-o-wrench-screwdriver" class="w-4 h-4" />
                            <span class="hidden sm:inline">Advanced</span>
                        </span>
                    </x-strata::tabs.trigger>
                </x-strata::tabs.tab-list>
                
                <div class="min-w-0">
                    <x-strata::tabs.content value="profile" class="p-6 bg-card rounded-lg border border-border">
                        <h5>Profile Information</h5>
                        <p class="text-muted-foreground mb-4">Update your personal information and profile picture.</p>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center">
                                    <x-icon name="heroicon-o-user" class="w-8 h-8 text-primary" />
                                </div>
                                <div>
                                    <x-strata::button size="sm" variant="outline">Change Avatar</x-strata::button>
                                </div>
                            </div>
                            <x-strata::form.group label="Full Name" for="profile-name">
                                <x-strata::form.input name="profile-name" placeholder="Enter your full name" />
                            </x-strata::form.group>
                            <x-strata::form.group label="Job Title" for="profile-title">
                                <x-strata::form.input name="profile-title" placeholder="Your job title" />
                            </x-strata::form.group>
                        </div>
                    </x-strata::tabs.content>
                    
                    <x-strata::tabs.content value="preferences" class="p-6 bg-card rounded-lg border border-border">
                        <h5>User Preferences</h5>
                        <p class="text-muted-foreground mb-4">Customize your application experience.</p>
                        <div class="space-y-4">
                            <x-strata::form.group label="Language" for="language">
                                <x-strata::form.select
                                    :items="['English', 'Français', 'Español', 'Deutsch']"
                                    :selected="0"
                                    name="language"
                                />
                            </x-strata::form.group>
                            <div class="space-y-3">
                                <x-strata::form.toggle
                                    name="dark-mode"
                                    id="dark-mode-toggle"
                                    label="Enable dark mode"
                                />
                                <x-strata::form.toggle
                                    name="compact-view"
                                    id="compact-view"
                                    label="Use compact view"
                                />
                            </div>
                        </div>
                    </x-strata::tabs.content>
                    
                    <x-strata::tabs.content value="integrations" class="p-6 bg-card rounded-lg border border-border">
                        <h5>Third-party Integrations</h5>
                        <p class="text-muted-foreground mb-4">Connect with external services and tools.</p>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 border border-border rounded-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg"></div>
                                    <div>
                                        <div class="font-medium">GitHub</div>
                                        <div class="text-sm text-muted-foreground">Connect your GitHub account</div>
                                    </div>
                                </div>
                                <x-strata::button size="sm" variant="outline">Connect</x-strata::button>
                            </div>
                            <div class="flex items-center justify-between p-3 border border-border rounded-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg"></div>
                                    <div>
                                        <div class="font-medium">Slack</div>
                                        <div class="text-sm text-muted-foreground">Get notifications in Slack</div>
                                    </div>
                                </div>
                                <x-strata::badge color="success">Connected</x-strata::badge>
                            </div>
                        </div>
                    </x-strata::tabs.content>
                    
                    <x-strata::tabs.content value="advanced" class="p-6 bg-card rounded-lg border border-border">
                        <h5>Advanced Settings</h5>
                        <p class="text-muted-foreground mb-4">Configure advanced options and developer settings.</p>
                        <div class="space-y-4">
                            <x-strata::alert color="warning" title="Warning">
                                These settings are for advanced users only. Incorrect configuration may affect application performance.
                            </x-strata::alert>
                            <x-strata::form.group label="API Endpoint" for="api-endpoint">
                                <x-strata::form.input name="api-endpoint" placeholder="https://api.example.com" />
                            </x-strata::form.group>
                            <x-strata::form.checkbox
                                name="debug-mode"
                                id="debug-mode"
                                value="1"
                                label="Enable debug mode"
                            />
                        </div>
                    </x-strata::tabs.content>
                </div>
            </x-strata::tabs>
        </div>

        {{-- Manual Activation Mode --}}
        <div class="space-y-4">
            <h4>Manual Activation Mode</h4>
            <p class="text-sm text-muted-foreground mb-4">
                With manual activation, pressing arrow keys focuses tabs but doesn't activate them. Use Space or Enter to activate.
            </p>
            <x-strata::tabs default-value="step1" activation-mode="manual" variant="pills" class="w-full max-w-4xl">
                <x-strata::tabs.tab-list>
                    <x-strata::tabs.trigger value="step1">
                        <span class="flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full bg-primary text-primary-foreground text-xs flex items-center justify-center">1</span>
                            Basic Info
                        </span>
                    </x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="step2">
                        <span class="flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full bg-muted text-muted-foreground text-xs flex items-center justify-center">2</span>
                            Contact Details
                        </span>
                    </x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="step3">
                        <span class="flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full bg-muted text-muted-foreground text-xs flex items-center justify-center">3</span>
                            Confirmation
                        </span>
                    </x-strata::tabs.trigger>
                </x-strata::tabs.tab-list>
                
                <x-strata::tabs.content value="step1" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Step 1: Basic Information</h5>
                    <p class="text-muted-foreground mb-4">Let's start with your basic information.</p>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <x-strata::form.group label="First Name" for="first-name">
                                <x-strata::form.input name="first-name" placeholder="John" />
                            </x-strata::form.group>
                            <x-strata::form.group label="Last Name" for="last-name">
                                <x-strata::form.input name="last-name" placeholder="Doe" />
                            </x-strata::form.group>
                        </div>
                        <x-strata::form.group label="Date of Birth" for="dob">
                            <x-strata::form.input type="date" name="dob" />
                        </x-strata::form.group>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="step2" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Step 2: Contact Details</h5>
                    <p class="text-muted-foreground mb-4">How can we reach you?</p>
                    <div class="space-y-4">
                        <x-strata::form.group label="Email Address" for="email">
                            <x-strata::form.input type="email" name="email" placeholder="john@example.com" />
                        </x-strata::form.group>
                        <x-strata::form.group label="Phone Number" for="phone">
                            <x-strata::form.input type="tel" name="phone" placeholder="+1 (555) 123-4567" />
                        </x-strata::form.group>
                        <x-strata::form.group label="Address" for="address">
                            <x-strata::form.textarea name="address" placeholder="Enter your full address" rows="3" />
                        </x-strata::form.group>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="step3" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Step 3: Confirmation</h5>
                    <p class="text-muted-foreground mb-4">Please review and confirm your information.</p>
                    <x-strata::alert color="success" title="All Set!">
                        Your information has been collected. Click submit to complete the process.
                    </x-strata::alert>
                    <div class="mt-6">
                        <x-strata::button>Submit Application</x-strata::button>
                    </div>
                </x-strata::tabs.content>
            </x-strata::tabs>
        </div>

        {{-- Force Mount Example --}}
        <div class="space-y-4">
            <h4>Force Mount Content</h4>
            <p class="text-sm text-muted-foreground mb-4">
                Some tab content can be force-mounted (always rendered) for better performance or to maintain state.
            </p>
            <x-strata::tabs default-value="live-data" variant="underline" class="w-full max-w-4xl">
                <x-strata::tabs.tab-list class="gap-8">
                    <x-strata::tabs.trigger value="live-data">
                        <span class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            Live Data
                        </span>
                    </x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="cached-data">Cached Data</x-strata::tabs.trigger>
                    <x-strata::tabs.trigger value="settings">Settings</x-strata::tabs.trigger>
                </x-strata::tabs.tab-list>
                
                <x-strata::tabs.content value="live-data" force-mount class="p-6 bg-card rounded-lg border border-border">
                    <h5>Live Data Stream</h5>
                    <p class="text-muted-foreground mb-4">This content is always mounted to maintain real-time connections.</p>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Server Status</span>
                            <x-strata::badge color="success">Online</x-strata::badge>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Active Users</span>
                            <span class="font-mono text-sm">1,247</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">CPU Usage</span>
                            <span class="font-mono text-sm">23%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Memory Usage</span>
                            <span class="font-mono text-sm">67%</span>
                        </div>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="cached-data" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Cached Data</h5>
                    <p class="text-muted-foreground mb-4">Historical data cached for performance.</p>
                    <div class="bg-muted p-4 rounded-lg">
                        <p class="text-center text-muted-foreground">📊 Charts and historical data would be loaded here</p>
                    </div>
                </x-strata::tabs.content>
                
                <x-strata::tabs.content value="settings" class="p-6 bg-card rounded-lg border border-border">
                    <h5>Display Settings</h5>
                    <p class="text-muted-foreground mb-4">Configure how data is displayed.</p>
                    <div class="space-y-3">
                        <x-strata::form.toggle
                            name="auto-refresh"
                            id="auto-refresh"
                            label="Auto-refresh data"
                        />
                        <x-strata::form.group label="Refresh Interval" for="refresh-interval">
                            <x-strata::form.select
                                :items="['30 seconds', '1 minute', '5 minutes', '10 minutes']"
                                :selected="1"
                                name="refresh-interval"
                            />
                        </x-strata::form.group>
                    </div>
                </x-strata::tabs.content>
            </x-strata::tabs>
        </div>

        {{-- Keyboard Navigation Info --}}
        <div class="space-y-4">
            <h4>Keyboard Navigation</h4>
            <x-strata::alert color="info" title="Accessibility Features">
                <div class="space-y-2">
                    <p>The tabs component includes full keyboard navigation support:</p>
                    <ul class="text-sm space-y-1">
                        <li><strong>Arrow Keys:</strong> Navigate between tabs (automatic activation by default)</li>
                        <li><strong>Home/End:</strong> Jump to first/last tab</li>
                        <li><strong>Space/Enter:</strong> Activate focused tab (required in manual mode)</li>
                        <li><strong>Tab:</strong> Focus tab content area</li>
                    </ul>
                    <p class="text-xs text-muted-foreground mt-3">
                        Try the manual activation example above - arrow keys will focus but not activate tabs.
                    </p>
                </div>
            </x-strata::alert>
        </div>
    </section>

    {{-- Modal Component Demo --}}
    <section class="space-y-6">
        <h3>Modal Components</h3>

        {{-- Basic Modal Example --}}
        <div class="space-y-4">
            <h4>Basic Modal</h4>
            <div class="flex flex-wrap gap-4">
                <x-strata::modal.trigger name="basic-modal">
                    <x-strata::button>Open Basic Modal</x-strata::button>
                </x-strata::modal.trigger>

                <x-strata::modal name="basic-modal">
                    <div class="space-y-4">
                        <h4>Welcome to Strata Modals</h4>
                        <p class="text-muted-foreground">
                            This is a basic modal dialog. You can click outside or press escape to close it.
                        </p>
                        <div class="flex justify-end gap-2">
                            <x-strata::modal.close>
                                <x-strata::button variant="outline">Close</x-strata::button>
                            </x-strata::modal.close>
                        </div>
                    </div>
                </x-strata::modal>
            </div>
        </div>

        {{-- Modal Sizes --}}
        <div class="space-y-4">
            <h4>Modal Sizes</h4>
            <div class="flex flex-wrap gap-4">
                <x-strata::modal.trigger name="small-modal">
                    <x-strata::button size="sm">Small Modal</x-strata::button>
                </x-strata::modal.trigger>

                <x-strata::modal.trigger name="large-modal">
                    <x-strata::button>Large Modal</x-strata::button>
                </x-strata::modal.trigger>

                <x-strata::modal.trigger name="xl-modal">
                    <x-strata::button size="lg">Extra Large Modal</x-strata::button>
                </x-strata::modal.trigger>
            </div>

            {{-- Small Modal --}}
            <x-strata::modal name="small-modal" size="sm">
                <div class="space-y-4">
                    <h5>Small Modal</h5>
                    <p class="text-sm text-muted-foreground">This is a small modal dialog.</p>
                    <x-strata::modal.close>
                        <x-strata::button size="sm" variant="outline">Close</x-strata::button>
                    </x-strata::modal.close>
                </div>
            </x-strata::modal>

            {{-- Large Modal --}}
            <x-strata::modal name="large-modal" size="lg">
                <div class="space-y-6">
                    <h4>Large Modal Dialog</h4>
                    <div class="prose prose-sm max-w-none text-muted-foreground">
                        <p>This is a larger modal that can accommodate more content. Perfect for forms, detailed information, or complex interactions.</p>
                        <p>You can include multiple paragraphs, lists, and other content here.</p>
                        <ul>
                            <li>Feature one</li>
                            <li>Feature two</li>
                            <li>Feature three</li>
                        </ul>
                    </div>
                    <div class="flex justify-between">
                        <x-strata::button variant="secondary">Learn More</x-strata::button>
                        <x-strata::modal.close>
                            <x-strata::button variant="outline">Close</x-strata::button>
                        </x-strata::modal.close>
                    </div>
                </div>
            </x-strata::modal>

            {{-- XL Modal --}}
            <x-strata::modal name="xl-modal" size="xl">
                <div class="space-y-6">
                    <h4>Extra Large Modal</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h5>Content Section 1</h5>
                            <p class="text-muted-foreground">This extra large modal can contain complex layouts with multiple columns.</p>
                            <div class="mt-4">
                                <x-strata::badge color="primary">Featured</x-strata::badge>
                            </div>
                        </div>
                        <div>
                            <h5>Content Section 2</h5>
                            <p class="text-muted-foreground">Perfect for dashboards, detailed forms, or rich content presentations.</p>
                            <div class="mt-4 space-y-2">
                                <x-strata::button variant="outline" size="sm">Action 1</x-strata::button>
                                <x-strata::button variant="outline" size="sm">Action 2</x-strata::button>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 pt-4 border-t border-border">
                        <x-strata::button variant="secondary">Save Draft</x-strata::button>
                        <x-strata::modal.close>
                            <x-strata::button>Save & Close</x-strata::button>
                        </x-strata::modal.close>
                    </div>
                </div>
            </x-strata::modal>
        </div>

        {{-- Flyout Modal Example --}}
        <div class="space-y-4">
            <h4>Flyout Modals</h4>
            <div class="flex flex-wrap gap-4">
                <x-strata::modal.trigger name="right-flyout">
                    <x-strata::button variant="secondary">Right Flyout</x-strata::button>
                </x-strata::modal.trigger>

                <x-strata::modal.trigger name="left-flyout">
                    <x-strata::button variant="secondary">Left Flyout</x-strata::button>
                </x-strata::modal.trigger>

                <x-strata::modal.trigger name="bottom-flyout">
                    <x-strata::button variant="secondary">Bottom Flyout</x-strata::button>
                </x-strata::modal.trigger>
            </div>

            {{-- Right Flyout --}}
            <x-strata::modal name="right-flyout" variant="flyout" position="right" size="md">
                <div class="space-y-6">
                    <h4>Right Flyout Panel</h4>
                    <p class="text-muted-foreground">This flyout slides in from the right side of the screen.</p>
                    <div class="space-y-4">
                        <x-strata::form.group label="Name" for="flyout-name">
                            <x-strata::form.input name="flyout-name" placeholder="Enter your name" />
                        </x-strata::form.group>
                        <x-strata::form.group label="Email" for="flyout-email">
                            <x-strata::form.input type="email" name="flyout-email" placeholder="Enter your email" />
                        </x-strata::form.group>
                    </div>
                    <div class="flex gap-2">
                        <x-strata::button size="sm">Save</x-strata::button>
                        <x-strata::modal.close>
                            <x-strata::button variant="outline" size="sm">Cancel</x-strata::button>
                        </x-strata::modal.close>
                    </div>
                </div>
            </x-strata::modal>

            {{-- Left Flyout --}}
            <x-strata::modal name="left-flyout" variant="flyout" position="left" size="md">
                <div class="space-y-6">
                    <h4>Left Flyout Panel</h4>
                    <p class="text-muted-foreground">This flyout slides in from the left side.</p>
                    <div class="space-y-3">
                        <x-strata::badge color="success">Status: Active</x-strata::badge>
                        <x-strata::badge color="info">Type: Premium</x-strata::badge>
                        <x-strata::badge color="warning">Expires: Soon</x-strata::badge>
                    </div>
                    <x-strata::modal.close>
                        <x-strata::button variant="outline">Close Panel</x-strata::button>
                    </x-strata::modal.close>
                </div>
            </x-strata::modal>

            {{-- Bottom Flyout --}}
            <x-strata::modal name="bottom-flyout" variant="flyout" position="bottom" size="lg">
                <div class="space-y-4">
                    <h4>Bottom Flyout Sheet</h4>
                    <p class="text-muted-foreground">This flyout slides up from the bottom. Great for mobile-friendly interactions.</p>
                    <div class="grid grid-cols-3 gap-4">
                        <x-strata::card size="sm">
                            <h6>Option 1</h6>
                            <p class="text-sm text-muted-foreground">Description here</p>
                        </x-strata::card>
                        <x-strata::card size="sm">
                            <h6>Option 2</h6>
                            <p class="text-sm text-muted-foreground">Description here</p>
                        </x-strata::card>
                        <x-strata::card size="sm">
                            <h6>Option 3</h6>
                            <p class="text-sm text-muted-foreground">Description here</p>
                        </x-strata::card>
                    </div>
                    <x-strata::modal.close>
                        <x-strata::button class="w-full">Done</x-strata::button>
                    </x-strata::modal.close>
                </div>
            </x-strata::modal>
        </div>

        {{-- Confirmation Modal Example --}}
        <div class="space-y-4">
            <h4>Confirmation Modal</h4>
            <x-strata::modal.trigger name="confirm-delete">
                <x-strata::button variant="destructive">Delete Account</x-strata::button>
            </x-strata::modal.trigger>

            <x-strata::modal name="confirm-delete" size="sm" :dismissible="false">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-destructive/10 rounded-full flex items-center justify-center">
                            <x-icon name="heroicon-o-exclamation-triangle" class="w-5 h-5 text-destructive" />
                        </div>
                        <div>
                            <h5>Delete Account</h5>
                        </div>
                    </div>
                    <p class="text-sm text-muted-foreground">
                        Are you sure you want to delete your account? This action cannot be undone and all your data will be permanently removed.
                    </p>
                    <div class="flex gap-2 justify-end">
                        <x-strata::modal.close>
                            <x-strata::button variant="outline" size="sm">Cancel</x-strata::button>
                        </x-strata::modal.close>
                        <x-strata::button variant="destructive" size="sm">Delete Account</x-strata::button>
                    </div>
                </div>
            </x-strata::modal>
        </div>

        {{-- JavaScript API Demo --}}
        <div class="space-y-4">
            <h4>JavaScript API</h4>
            <p class="text-sm text-muted-foreground">Modals can also be controlled via JavaScript:</p>
            <div class="flex flex-wrap gap-4">
                <x-strata::button
                    variant="outline"
                    onclick="$strata.modal('js-modal').show()"
                >
                    Open via $strata
                </x-strata::button>
                <x-strata::button
                    variant="outline"
                    onclick="Strata.modal('js-modal').show()"
                >
                    Open via window.Strata
                </x-strata::button>
                <x-strata::button
                    variant="outline"
                    onclick="Strata.modals().close()"
                >
                    Close All Modals
                </x-strata::button>
            </div>

            <x-strata::modal name="js-modal">
                <div class="space-y-4">
                    <h4>JavaScript API Modal</h4>
                    <p class="text-muted-foreground">This modal was opened using the JavaScript API!</p>
                    <div class="flex gap-2 justify-end">
                        <x-strata::button
                            variant="outline"
                            onclick="$strata.modal('js-modal').hide()"
                        >
                            Close via JS
                        </x-strata::button>
                        <x-strata::modal.close>
                            <x-strata::button>Close Normally</x-strata::button>
                        </x-strata::modal.close>
                    </div>
                </div>
            </x-strata::modal>
        </div>
    </section>

    {{-- File Upload Component Demo --}}
    <section class="space-y-6">
        <h3>File Upload Components</h3>
        <p class="text-muted-foreground">
            Comprehensive file upload system with multi-mode support, solving the Spatie Media Library challenge 
            by allowing uploads before model creation.
        </p>

        {{-- Basic File Upload --}}
        <div class="space-y-4">
            <h4>Basic File Upload</h4>
            <x-strata::form.file-upload
                name="basic-files"
                accept="image/*,.pdf,.doc,.docx"
                multiple
                max-size="5MB"
                max-files="3"
            />
        </div>

        {{-- Image Upload with Preview --}}
        <div class="space-y-4">
            <h4>Image Upload with Preview</h4>
            <x-strata::form.file-upload
                name="image-files"
                accept="image/*"
                multiple
                max-size="2MB"
                max-files="5"
                :image-preview="true"
                :validation-rules="[
                    'max_size' => '2MB',
                    'allowed_types' => ['image/jpeg', 'image/png', 'image/webp']
                ]"
            />
        </div>

        {{-- Direct Upload Mode (for existing models) --}}
        <div class="space-y-4">
            <h4>Direct Upload Mode</h4>
            <p class="text-sm text-muted-foreground mb-4">
                For existing models - files are immediately attached to the model instance.
            </p>
            <x-strata::form.file-upload
                name="direct-files"
                mode="direct"
                accept="image/*,.pdf"
                multiple
                max-size="10MB"
                collection="attachments"
                :show-progress="true"
            />
        </div>

        {{-- Temporary Upload Mode --}}
        <div class="space-y-4">
            <h4>Temporary Upload Mode</h4>
            <p class="text-sm text-muted-foreground mb-4">
                Files are stored temporarily and can be attached to models later. Perfect for multi-step forms.
            </p>
            <x-strata::form.file-upload
                name="temp-files"
                mode="temporary"
                accept=".pdf,.doc,.docx,.txt"
                multiple
                max-files="10"
                :validation-rules="[
                    'max_size' => '5MB',
                    'allowed_types' => ['.pdf', '.doc', '.docx', '.txt']
                ]"
            />
        </div>

        {{-- Deferred Upload Mode --}}
        <div class="space-y-4">
            <h4>Deferred Upload Mode</h4>
            <p class="text-sm text-muted-foreground mb-4">
                Uploads are stored with session tracking and automatically attached when the model is created.
                This solves the Spatie Media Library challenge.
            </p>
            <x-strata::form.file-upload
                name="deferred-files"
                mode="deferred"
                accept="*"
                multiple
                max-size="20MB"
                :collections-map="[
                    'documents' => 'documents',
                    'images' => 'gallery',
                    'attachments' => 'attachments'
                ]"
                :show-progress="true"
                layout="list"
            />
        </div>

        {{-- Single File Upload --}}
        <div class="space-y-4">
            <h4>Single File Upload</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h5>Profile Picture Upload</h5>
                    <x-strata::form.file-upload
                        name="avatar"
                        accept="image/*"
                        max-size="1MB"
                        :image-preview="true"
                        :validation-rules="[
                            'max_size' => '1MB',
                            'allowed_types' => ['image/jpeg', 'image/png']
                        ]"
                        placeholder="Drop your profile picture here"
                        class="max-w-sm"
                    />
                </div>
                <div>
                    <h5>Document Upload</h5>
                    <x-strata::form.file-upload
                        name="document"
                        accept=".pdf"
                        max-size="10MB"
                        placeholder="Upload a PDF document"
                        class="max-w-sm"
                    />
                </div>
            </div>
        </div>

        {{-- Advanced Configuration --}}
        <div class="space-y-4">
            <h4>Advanced Configuration</h4>
            <x-strata::form.file-upload
                name="advanced-files"
                mode="temporary"
                accept="*"
                multiple
                max-files="20"
                max-size="50MB"
                :image-preview="true"
                :show-progress="true"
                :show-remove="true"
                layout="grid"
                upload-text="Drop files here or click to browse"
                :validation-rules="[
                    'max_size' => '50MB',
                    'allowed_types' => ['*']
                ]"
                :collections-map="[
                    'default' => 'uploads',
                    'images' => 'images',
                    'documents' => 'documents'
                ]"
                session-key="advanced-upload-demo"
            />
        </div>

        {{-- List Layout Example --}}
        <div class="space-y-4">
            <h4>List Layout</h4>
            <p class="text-sm text-muted-foreground mb-4">
                Alternative layout showing files in a vertical list format, ideal for document uploads.
            </p>
            <x-strata::form.file-upload
                name="list-files"
                accept=".pdf,.doc,.docx,.txt,.csv,.xlsx"
                multiple
                max-files="8"
                max-size="5MB"
                layout="list"
                :show-progress="true"
                placeholder="Upload documents in list format"
            />
        </div>

        {{-- Validation Examples --}}
        <div class="space-y-4">
            <h4>File Validation Examples</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <h5>Strict Image Validation</h5>
                    <x-strata::form.file-upload
                        name="strict-images"
                        accept="image/jpeg,image/png"
                        multiple
                        max-files="3"
                        max-size="500KB"
                        :validation-rules="[
                            'max_size' => '500KB',
                            'allowed_types' => ['image/jpeg', 'image/png']
                        ]"
                        :image-preview="true"
                        placeholder="Only JPEG/PNG, max 500KB each"
                    />
                </div>
                <div class="space-y-4">
                    <h5>Document Upload with Size Limits</h5>
                    <x-strata::form.file-upload
                        name="large-docs"
                        accept=".pdf,.docx"
                        multiple
                        max-files="2"
                        max-size="10MB"
                        :validation-rules="[
                            'max_size' => '10MB',
                            'allowed_types' => ['.pdf', '.docx']
                        ]"
                        placeholder="PDF or DOCX files, up to 10MB"
                    />
                </div>
            </div>
        </div>

        {{-- Integration Example --}}
        <div class="space-y-4">
            <h4>Form Integration Example</h4>
            <x-strata::card class="max-w-2xl">
                <div class="space-y-6">
                    <h5>Create Project</h5>
                    <div class="space-y-4">
                        <x-strata::form.group label="Project Name" for="project-name">
                            <x-strata::form.input name="project-name" placeholder="Enter project name" />
                        </x-strata::form.group>
                        
                        <x-strata::form.group label="Description" for="project-description">
                            <x-strata::form.textarea name="project-description" placeholder="Describe your project" rows="3" />
                        </x-strata::form.group>
                        
                        <x-strata::form.group label="Project Documents" for="project-files">
                            <x-strata::form.file-upload
                                name="project-files"
                                mode="deferred"
                                accept=".pdf,.doc,.docx,.txt,.md"
                                multiple
                                max-files="10"
                                max-size="5MB"
                                :collections-map="[
                                    'documents' => 'project-documents'
                                ]"
                                placeholder="Upload project documents"
                            />
                        </x-strata::form.group>
                        
                        <x-strata::form.group label="Cover Image (Optional)" for="cover-image">
                            <x-strata::form.file-upload
                                name="cover-image"
                                accept="image/*"
                                max-size="2MB"
                                :image-preview="true"
                                placeholder="Upload a cover image"
                            />
                        </x-strata::form.group>
                    </div>
                    
                    <div class="flex gap-4 pt-4">
                        <x-strata::button>Create Project</x-strata::button>
                        <x-strata::button variant="outline">Save as Draft</x-strata::button>
                    </div>
                </div>
            </x-strata::card>
        </div>

        {{-- API Information --}}
        <div class="space-y-4">
            <h4>Upload Modes & API</h4>
            <x-strata::alert color="info" title="File Upload Modes">
                <div class="space-y-3">
                    <div>
                        <strong class="text-sm">Direct Mode:</strong>
                        <p class="text-sm text-muted-foreground">Files are immediately attached to existing models using Spatie Media Library.</p>
                    </div>
                    <div>
                        <strong class="text-sm">Temporary Mode:</strong>
                        <p class="text-sm text-muted-foreground">Files are stored temporarily for later processing or attachment.</p>
                    </div>
                    <div>
                        <strong class="text-sm">Deferred Mode:</strong>
                        <p class="text-sm text-muted-foreground">Files are uploaded and stored with session tracking, automatically attached when models are created. Perfect for solving the Spatie Media Library requirement.</p>
                    </div>
                </div>
            </x-strata::alert>

            <x-strata::alert color="primary" title="HasDeferredUploads Trait">
                <div class="space-y-2">
                    <p class="text-sm">Add the <code class="text-xs">HasDeferredUploads</code> trait to your models:</p>
                    <div class="bg-muted p-3 rounded-lg font-mono text-sm">
                        <div class="text-muted-foreground">// In your model</div>
                        <div>use Strata\UI\Traits\HasDeferredUploads;</div>
                        <div class="mt-2">class Post extends Model implements HasMedia</div>
                        <div>{</div>
                        <div class="pl-4">use HasDeferredUploads;</div>
                        <div>}</div>
                    </div>
                    <p class="text-xs text-muted-foreground mt-2">
                        The trait automatically attaches deferred uploads when the model is created, solving the Spatie challenge.
                    </p>
                </div>
            </x-strata::alert>
        </div>
    </section>

    {{-- Color Palette Demo --}}
    <section class="space-y-6">
        <h3>Semantic Color Palette</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="space-y-2">
                <div class="h-16 bg-background border-2 border-border rounded-lg flex items-center justify-center">
                    <span class="text-xs font-mono">background</span>
                </div>
                <p class="text-xs text-center text-muted-foreground">Background</p>
            </div>
            <div class="space-y-2">
                <div class="h-16 bg-card border-2 border-border rounded-lg flex items-center justify-center">
                    <span class="text-xs font-mono">card</span>
                </div>
                <p class="text-xs text-center text-muted-foreground">Card</p>
            </div>
            <div class="space-y-2">
                <div class="h-16 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-xs font-mono text-primary-foreground">primary</span>
                </div>
                <p class="text-xs text-center text-muted-foreground">Primary</p>
            </div>
            <div class="space-y-2">
                <div class="h-16 bg-accent rounded-lg flex items-center justify-center">
                    <span class="text-xs font-mono text-accent-foreground">accent</span>
                </div>
                <p class="text-xs text-center text-muted-foreground">Accent</p>
            </div>
            <div class="space-y-2">
                <div class="h-16 bg-secondary rounded-lg flex items-center justify-center">
                    <span class="text-xs font-mono text-secondary-foreground">secondary</span>
                </div>
                <p class="text-xs text-center text-muted-foreground">Secondary</p>
            </div>
            <div class="space-y-2">
                <div class="h-16 bg-destructive rounded-lg flex items-center justify-center">
                    <span class="text-xs font-mono text-destructive-foreground">destructive</span>
                </div>
                <p class="text-xs text-center text-muted-foreground">Destructive</p>
            </div>
            <div class="space-y-2">
                <div class="h-16 bg-muted rounded-lg flex items-center justify-center">
                    <span class="text-xs font-mono text-muted-foreground">muted</span>
                </div>
                <p class="text-xs text-center text-muted-foreground">Muted</p>
            </div>
            <div class="space-y-2">
                <div class="h-16 border-2 border-border rounded-lg flex items-center justify-center">
                    <span class="text-xs font-mono">border</span>
                </div>
                <p class="text-xs text-center text-muted-foreground">Border</p>
            </div>
        </div>
    </section>

</div>

    {{-- Toast container for Strata magic method registration --}}
    <x-strata::toast-container />
</div>

