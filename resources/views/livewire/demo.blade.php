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

