<div class="space-y-8">
    {{-- Header --}}
    <div class="text-center space-y-4">
        <div class="flex items-center justify-center gap-4">
            <div class="flex-1 text-center">
                <h1 class="text-4xl font-bold tracking-tight">Modern Sidebar Layout</h1>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-sm text-muted-foreground">Theme:</span>
                <x-dark-mode-toggle />
            </div>
        </div>
        <p class="text-xl text-muted-foreground">Clean, modern sidebar with badges and collapsible groups</p>
        <p class="text-muted-foreground">Enhanced with muted colors, bigger icons, and better typography</p>
    </div>

    {{-- Key Features --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <x-strata::card>
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                    <x-strata::icon name="heroicon-o-sparkles" class="w-5 h-5 text-primary" />
                </div>
                <h3 class="font-semibold">Modern Design</h3>
            </div>
            <p class="text-sm text-muted-foreground">Muted colors, bigger icons (20px), and improved typography. Clean, professional appearance inspired by modern design trends.</p>
        </x-strata::card>

        <x-strata::card>
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center">
                    <x-strata::icon name="heroicon-o-squares-2x2" class="w-5 h-5 text-accent" />
                </div>
                <h3 class="font-semibold">Visual Hierarchy</h3>
            </div>
            <p class="text-sm text-muted-foreground">Collapsible groups with nested items create clear hierarchy. Nested items are smaller, indented, and without icons by default.</p>
        </x-strata::card>

        <x-strata::card>
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-success/10 rounded-lg flex items-center justify-center">
                    <x-strata::icon name="heroicon-o-bell-alert" class="w-5 h-5 text-success" />
                </div>
                <h3 class="font-semibold">Badge Support</h3>
            </div>
            <p class="text-sm text-muted-foreground">Built-in badge support for notifications, counts, and status indicators. Multiple variants and colors available.</p>
        </x-strata::card>
    </div>

    {{-- Layout Structure --}}
    <x-strata::card>
        <x-slot name="header">
            <h2 class="text-xl font-semibold">Layout Structure</h2>
        </x-slot>

        <div class="space-y-4">
            <p class="text-muted-foreground">This layout follows a simple pattern:</p>
            
            <div class="bg-muted/50 rounded-lg p-4 font-mono text-sm space-y-2">
                <div class="text-muted-foreground">{{-- Container with sidebar state --}}</div>
                <div class="text-blue-600">&lt;div x-data="{ sidebarOpen: false }"&gt;</div>
                
                <div class="ml-4 space-y-1">
                    <div class="text-muted-foreground">{{-- Sidebar (hidden on mobile) --}}</div>
                    <div class="text-green-600">&lt;x-strata::sidebar class="hidden lg:block" /&gt;</div>
                </div>
                
                <div class="ml-4 space-y-1">
                    <div class="text-muted-foreground">{{-- Main content area --}}</div>
                    <div class="text-purple-600">&lt;div class="flex-1"&gt;</div>
                    <div class="ml-4 space-y-1">
                        <div class="text-orange-600">&lt;header class="lg:hidden"&gt; {{-- Mobile header --}}</div>
                        <div class="text-teal-600">&lt;main&gt; {{-- Your content --}} &lt;/main&gt;</div>
                    </div>
                    <div class="text-purple-600">&lt;/div&gt;</div>
                </div>
                
                <div class="text-blue-600">&lt;/div&gt;</div>
            </div>
        </div>
    </x-strata::card>

    {{-- Interactive Demo --}}
    <x-strata::card>
        <x-slot name="header">
            <h2 class="text-xl font-semibold">Interactive Demo</h2>
        </x-slot>

        <div class="space-y-4">
            <p class="text-muted-foreground">Try the sidebar controls:</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-strata::button 
                    variant="outline"
                    @click="$strata.sidebar('main-sidebar').show()"
                    class="w-full"
                >
                    Show Sidebar
                </x-strata::button>
                
                <x-strata::button 
                    variant="outline"
                    @click="$strata.sidebar('main-sidebar').hide()"
                    class="w-full"
                >
                    Hide Sidebar
                </x-strata::button>
                
                <x-strata::button 
                    variant="outline"
                    @click="$strata.sidebar('main-sidebar').toggle()"
                    class="w-full"
                >
                    Toggle Sidebar
                </x-strata::button>
            </div>
        </div>
    </x-strata::card>

    {{-- Modern Features Demo --}}
    <x-strata::card>
        <x-slot name="header">
            <h2 class="text-xl font-semibold">Modern Features</h2>
        </x-slot>

        <div class="space-y-6">
            {{-- Badge Examples --}}
            <div class="space-y-3">
                <h3 class="font-medium">Navigation Badges</h3>
                <p class="text-sm text-muted-foreground mb-4">Add notifications, counts, and status indicators to navigation items:</p>
                
                <div class="bg-muted/30 rounded-lg p-4 space-y-2">
                    <div class="font-mono text-sm">
                        <span class="text-blue-600">&lt;x-strata::nav-item</span> <span class="text-green-600">icon="heroicon-o-users"</span><span class="text-blue-600">&gt;</span><br>
                        <span class="ml-4">Team</span><br>
                        <span class="ml-4 text-purple-600">&lt;x-slot name="badge"&gt;</span><br>
                        <span class="ml-8 text-orange-600">&lt;x-strata::badge size="sm" color="primary"&gt;12&lt;/x-strata::badge&gt;</span><br>
                        <span class="ml-4 text-purple-600">&lt;/x-slot&gt;</span><br>
                        <span class="text-blue-600">&lt;/x-strata::nav-item&gt;</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-background border rounded-lg p-3">
                        <div class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md bg-muted text-foreground shadow-sm">
                            <x-strata::icon name="heroicon-o-users" class="w-5 h-5 flex-shrink-0" />
                            <span class="flex-1">Team</span>
                            <x-strata::badge size="sm" color="primary" shape="pill">12</x-strata::badge>
                        </div>
                    </div>
                    <div class="bg-background border rounded-lg p-3">
                        <div class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md text-muted-foreground hover:text-foreground hover:bg-muted/60">
                            <x-strata::icon name="heroicon-o-bell" class="w-5 h-5 flex-shrink-0" />
                            <span class="flex-1">Alerts</span>
                            <x-strata::badge size="sm" color="destructive" variant="soft">3</x-strata::badge>
                        </div>
                    </div>
                    <div class="bg-background border rounded-lg p-3">
                        <div class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md text-muted-foreground hover:text-foreground hover:bg-muted/60">
                            <x-strata::icon name="heroicon-o-photo" class="w-5 h-5 flex-shrink-0" />
                            <span class="flex-1">Media</span>
                            <x-strata::badge size="sm" color="success" variant="soft">8</x-strata::badge>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Collapsible Groups with Nested Items --}}
            <div class="space-y-3">
                <h3 class="font-medium">Collapsible Groups & Nested Items</h3>
                <p class="text-sm text-muted-foreground mb-4">Create visual hierarchy with collapsible groups and nested navigation items:</p>
                
                <div class="bg-muted/30 rounded-lg p-4 space-y-2">
                    <div class="font-mono text-sm">
                        <span class="text-blue-600">&lt;x-strata::sidebar-group</span> <span class="text-green-600">label="Admin"</span> <span class="text-green-600">collapsible</span><span class="text-blue-600">&gt;</span><br>
                        <span class="ml-4 text-orange-600">&lt;x-strata::nav-item icon="heroicon-o-users"&gt;User Management&lt;/x-strata::nav-item&gt;</span><br>
                        <span class="ml-4 text-purple-600">&lt;x-strata::nav-item nested&gt;View Users&lt;/x-strata::nav-item&gt;</span><br>
                        <span class="ml-4 text-purple-600">&lt;x-strata::nav-item nested&gt;Add User&lt;/x-strata::nav-item&gt;</span><br>
                        <span class="text-blue-600">&lt;/x-strata::sidebar-group&gt;</span>
                    </div>
                </div>

                <div class="bg-background border rounded-lg p-4 space-y-4">
                    <div class="text-xs font-medium text-muted-foreground/80 uppercase tracking-wide px-3 py-2 cursor-pointer hover:text-muted-foreground/90 transition-colors duration-200 flex items-center justify-between focus:outline-none">
                        <span>Admin</span>
                        <x-strata::icon name="heroicon-o-chevron-down" class="w-3 h-3 transition-transform duration-200" />
                    </div>
                    <div class="space-y-0.5">
                        {{-- Parent item with icon --}}
                        <div class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md text-muted-foreground hover:text-foreground hover:bg-muted/60">
                            <x-strata::icon name="heroicon-o-users" class="w-5 h-5 flex-shrink-0" />
                            <span class="flex-1">User Management</span>
                        </div>
                        {{-- Nested items without icons, smaller, indented --}}
                        <div class="flex items-center gap-3 px-3 pl-8 py-2 text-sm font-normal rounded-md text-muted-foreground/70 hover:text-foreground hover:bg-muted/40">
                            <span class="flex-1">View Users</span>
                        </div>
                        <div class="flex items-center gap-3 px-3 pl-8 py-2 text-sm font-normal rounded-md text-muted-foreground/70 hover:text-foreground hover:bg-muted/40">
                            <span class="flex-1">Add User</span>
                        </div>
                        <div class="flex items-center gap-3 px-3 pl-8 py-2 text-sm font-normal rounded-md text-muted-foreground/70 hover:text-foreground hover:bg-muted/40">
                            <span class="flex-1">Permissions</span>
                            <x-strata::badge size="sm" color="warning" variant="soft">2</x-strata::badge>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-strata::card>

    {{-- Separator Component Demo --}}
    <x-strata::card>
        <x-slot name="header">
            <h2 class="text-xl font-semibold">Separator Component</h2>
        </x-slot>

        <div class="space-y-6">
            <div class="space-y-3">
                <h3 class="font-medium">Flexible Visual Separation</h3>
                <p class="text-sm text-muted-foreground">Replace hard-coded borders with a flexible separator component that offers consistent styling and spacing options.</p>
                
                <div class="bg-muted/30 rounded-lg p-4 space-y-4">
                    <div class="space-y-2">
                        <p class="text-sm font-medium">Basic Separator</p>
                        <x-strata::separator />
                        <p class="text-sm text-muted-foreground">Default horizontal separator</p>
                    </div>
                    
                    <div class="space-y-2">
                        <p class="text-sm font-medium">With Different Variants</p>
                        <x-strata::separator variant="subtle" />
                        <p class="text-sm text-muted-foreground">Subtle variant</p>
                        <x-strata::separator variant="strong" />
                        <p class="text-sm text-muted-foreground">Strong variant</p>
                    </div>
                    
                    <div class="space-y-2">
                        <p class="text-sm font-medium">With Custom Spacing</p>
                        <x-strata::separator spacing="sm" />
                        <p class="text-sm text-muted-foreground">Small spacing</p>
                        <x-strata::separator spacing="lg" />
                        <p class="text-sm text-muted-foreground">Large spacing</p>
                    </div>
                    
                    <div class="space-y-2">
                        <p class="text-sm font-medium">With Labels</p>
                        <x-strata::separator label="Account Settings" />
                        <p class="text-sm text-muted-foreground">Separator with section label</p>
                    </div>
                </div>
                
                <div class="bg-background border rounded-lg p-4">
                    <div class="font-mono text-sm space-y-2">
                        <div><span class="text-blue-600">&lt;x-strata::separator /&gt;</span> <span class="text-gray-600">{{-- Basic separator --}}</span></div>
                        <div><span class="text-blue-600">&lt;x-strata::separator</span> <span class="text-green-600">variant="subtle"</span> <span class="text-green-600">spacing="lg"</span> <span class="text-blue-600">/&gt;</span></div>
                        <div><span class="text-blue-600">&lt;x-strata::separator</span> <span class="text-green-600">label="Settings"</span> <span class="text-blue-600">/&gt;</span></div>
                    </div>
                </div>
            </div>
        </div>
    </x-strata::card>

    {{-- Implementation Guide --}}
    <x-strata::card>
        <x-slot name="header">
            <h2 class="text-xl font-semibold">How to Use</h2>
        </x-slot>

        <div class="space-y-4">
            <div class="space-y-2">
                <h3 class="font-medium">1. Copy the Layout</h3>
                <p class="text-sm text-muted-foreground">
                    Copy <code class="bg-muted px-1 py-0.5 rounded text-xs">resources/views/components/layouts/sidebar-layout-example.blade.php</code> 
                    to your own layout file.
                </p>
            </div>
            
            <div class="space-y-2">
                <h3 class="font-medium">2. Add Modern Features</h3>
                <ul class="text-sm text-muted-foreground space-y-1">
                    <li>• <strong>Badges:</strong> Use <code class="bg-muted px-1 py-0.5 rounded text-xs">&lt;x-slot name="badge"&gt;</code> in nav-items</li>
                    <li>• <strong>Collapsible Groups:</strong> Add <code class="bg-muted px-1 py-0.5 rounded text-xs">collapsible</code> prop to sidebar-group</li>
                    <li>• <strong>Nested Items:</strong> Add <code class="bg-muted px-1 py-0.5 rounded text-xs">nested</code> prop for smaller, indented items</li>
                    <li>• <strong>Separators:</strong> Use <code class="bg-muted px-1 py-0.5 rounded text-xs">&lt;x-strata::separator /&gt;</code> instead of borders</li>
                    <li>• <strong>Modern Styling:</strong> Automatic muted colors and improved typography</li>
                </ul>
            </div>
            
            <div class="space-y-2">
                <h3 class="font-medium">3. Customize & Integrate</h3>
                <p class="text-sm text-muted-foreground">
                    Use the <code class="bg-muted px-1 py-0.5 rounded text-xs">#[Layout('your-layout')]</code> 
                    attribute in your Livewire components or extend the layout in Blade views.
                </p>
            </div>
        </div>
    </x-strata::card>

    {{-- Sample Components --}}
    <x-strata::card>
        <x-slot name="header">
            <h2 class="text-xl font-semibold">Sample Components</h2>
        </x-slot>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <h3 class="font-medium">Form Elements</h3>
                
                <x-strata::form.input
                    name="sample_name"
                    label="Name"
                    placeholder="Enter your name"
                    icon="heroicon-o-user"
                />
                
                <x-strata::form.select
                    name="sample_role"
                    label="Role"
                    :items="['admin' => 'Administrator', 'user' => 'User', 'guest' => 'Guest']"
                />
                
                <x-strata::form.toggle
                    name="sample_notifications"
                    label="Enable notifications"
                />
            </div>
            
            <div class="space-y-4">
                <h3 class="font-medium">UI Elements</h3>
                
                <div class="flex flex-wrap gap-2">
                    <x-strata::badge color="primary">Primary</x-strata::badge>
                    <x-strata::badge color="success">Success</x-strata::badge>
                    <x-strata::badge color="warning">Warning</x-strata::badge>
                </div>
                
                <x-strata::form.rating
                    name="sample_rating"
                    label="Rating"
                    :max="5"
                />
                
                <div class="flex gap-2">
                    <x-strata::button variant="primary" size="sm">Primary</x-strata::button>
                    <x-strata::button variant="outline" size="sm">Outline</x-strata::button>
                </div>
            </div>
        </div>
    </x-strata::card>

    {{-- Footer --}}
    <div class="text-center py-8 border-t">
        <p class="text-muted-foreground">
            Modern sidebar layout with badges and collapsible groups - clean, flexible, and ready to customize
        </p>
    </div>
</div>