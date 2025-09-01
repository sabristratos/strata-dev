<div class="min-h-screen bg-gray-50">
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Strata UI Sidebar Demo</h1>
                    <p class="mt-1 text-sm text-gray-600">Interactive examples of sidebar components</p>
                </div>
                <div class="flex space-x-2">
                    <x-strata::button @click="$strata.sidebars().closeAll()">
                        <x-strata::icon name="heroicon-o-x-mark" class="w-4 h-4 mr-2" />
                        Close All Sidebars
                    </x-strata::button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid gap-12">
            
            <!-- Overlay Sidebar Demo -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Overlay Sidebar</h2>
                        <p class="text-gray-600 mt-1">Slides over content with backdrop overlay</p>
                    </div>
                    <x-strata::sidebar-toggle 
                        target="overlay-sidebar" 
                        variant="button" 
                        size="md"
                        class="bg-blue-600 hover:bg-blue-700 text-white">
                        <x-strata::icon name="heroicon-o-bars-3" class="w-5 h-5 mr-2" />
                        Open Overlay Sidebar
                    </x-strata::sidebar-toggle>
                </div>
                
                <div class="prose max-w-none">
                    <p>This sidebar appears on top of the main content with a semi-transparent backdrop. Perfect for navigation menus on mobile devices or temporary panels.</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>Slides in from left with smooth animation</li>
                        <li>Semi-transparent backdrop overlay</li>
                        <li>Click outside or press Escape to close</li>
                        <li>Locks body scroll when open</li>
                    </ul>
                </div>
            </div>

            <!-- Push Sidebar Demo -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Push Sidebar</h2>
                        <p class="text-gray-600 mt-1">Pushes content to the side when opened</p>
                    </div>
                    <x-strata::sidebar-toggle 
                        target="push-sidebar" 
                        variant="button" 
                        size="md"
                        class="bg-green-600 hover:bg-green-700 text-white">
                        <x-strata::icon name="heroicon-o-arrow-right-on-rectangle" class="w-5 h-5 mr-2" />
                        Toggle Push Sidebar
                    </x-strata::sidebar-toggle>
                </div>
                
                <div class="prose max-w-none">
                    <p>This sidebar pushes the main content to make room for itself. Great for dashboards or applications where you want the sidebar to feel like part of the layout.</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>Content shifts to accommodate sidebar</li>
                        <li>No backdrop overlay needed</li>
                        <li>Persistent by default</li>
                        <li>Smooth push/pull animations</li>
                    </ul>
                </div>
            </div>

            <!-- Right Sidebar Demo -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Right Sidebar</h2>
                        <p class="text-gray-600 mt-1">Slides in from the right side</p>
                    </div>
                    <x-strata::sidebar-toggle 
                        target="right-sidebar" 
                        variant="hamburger" 
                        size="md">
                    </x-strata::sidebar-toggle>
                </div>
                
                <div class="prose max-w-none">
                    <p>Perfect for secondary navigation, filters, or contextual information panels. The animated hamburger icon provides clear visual feedback.</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>Slides in from right side</li>
                        <li>Animated hamburger toggle button</li>
                        <li>Great for filters or secondary content</li>
                        <li>Responsive behavior</li>
                    </ul>
                </div>
            </div>

            <!-- Collapsible Sidebar Demo -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Collapsible Fixed Sidebar</h2>
                        <p class="text-gray-600 mt-1">Always visible but can collapse to save space</p>
                    </div>
                    <x-strata::sidebar-toggle 
                        target="collapsible-sidebar" 
                        variant="icon" 
                        size="md">
                    </x-strata::sidebar-toggle>
                </div>
                
                <div class="prose max-w-none">
                    <p>A fixed sidebar that stays visible but can be collapsed to show only icons. Perfect for navigation bars in admin interfaces or dashboards.</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>Always visible (fixed variant)</li>
                        <li>Collapses to icon-only view</li>
                        <li>Smooth expand/collapse animation</li>
                        <li>Persistent state across sessions</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Code Examples -->
        <div class="mt-16 bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Usage Examples</h2>
            
            <div class="space-y-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Toggle Button</h3>
                    <div class="bg-gray-900 rounded-lg p-4 text-sm">
                        <code class="text-green-400">
&lt;x-strata::sidebar-toggle 
    target="my-sidebar" 
    variant="button" 
    size="md"
    class="bg-blue-600 text-white"&gt;
    Open Sidebar
&lt;/x-strata::sidebar-toggle&gt;
                        </code>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Sidebar Component</h3>
                    <div class="bg-gray-900 rounded-lg p-4 text-sm">
                        <code class="text-green-400">
&lt;x-strata::sidebar 
    name="my-sidebar"
    variant="overlay"
    position="left"
    persistent="false"
    collapsible="false"&gt;
    &lt;!-- Sidebar content --&gt;
&lt;/x-strata::sidebar&gt;
                        </code>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">JavaScript API</h3>
                    <div class="bg-gray-900 rounded-lg p-4 text-sm">
                        <code class="text-green-400">
// Using Alpine.js magic helper
$strata.sidebar('my-sidebar').show()
$strata.sidebar('my-sidebar').hide()
$strata.sidebar('my-sidebar').toggle()

// Close all sidebars
$strata.sidebars().closeAll()

// Using global Strata object
Strata.sidebar('my-sidebar').toggle()
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Components -->
    
    <!-- Overlay Sidebar -->
    <x-strata::sidebar 
        name="overlay-sidebar"
        variant="overlay"
        position="left"
        persistent="false"
        collapsible="false">
        
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Overlay Sidebar</h3>
            <p class="text-sm text-gray-600 mt-1">This sidebar slides over the content</p>
        </div>
        
        <div class="p-6">
            <nav class="space-y-2">
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-home" class="w-5 h-5 mr-3" />
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-users" class="w-5 h-5 mr-3" />
                    Users
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-cog-6-tooth" class="w-5 h-5 mr-3" />
                    Settings
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-document-text" class="w-5 h-5 mr-3" />
                    Documents
                </a>
            </nav>
            
            <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                <h4 class="text-sm font-medium text-blue-900">Pro Tip</h4>
                <p class="text-sm text-blue-700 mt-1">Click outside the sidebar or press Escape to close it.</p>
            </div>
        </div>
    </x-strata::sidebar>

    <!-- Push Sidebar -->
    <x-strata::sidebar 
        name="push-sidebar"
        variant="push"
        position="left"
        persistent="true"
        collapsible="false">
        
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Push Sidebar</h3>
            <p class="text-sm text-gray-600 mt-1">Content shifts to make room</p>
        </div>
        
        <div class="p-6">
            <x-strata::sidebar-group label="Main Navigation" collapsible="true">
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-chart-bar" class="w-5 h-5 mr-3" />
                    Analytics
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-inbox" class="w-5 h-5 mr-3" />
                    Inbox
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-calendar" class="w-5 h-5 mr-3" />
                    Calendar
                </a>
            </x-strata::sidebar-group>
            
            <x-strata::sidebar-group label="Settings" collapsible="true" collapsed="true">
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-user-circle" class="w-5 h-5 mr-3" />
                    Profile
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-bell" class="w-5 h-5 mr-3" />
                    Notifications
                </a>
            </x-strata::sidebar-group>
        </div>
    </x-strata::sidebar>

    <!-- Right Sidebar -->
    <x-strata::sidebar 
        name="right-sidebar"
        variant="overlay"
        position="right"
        persistent="false"
        collapsible="false">
        
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Right Sidebar</h3>
            <p class="text-sm text-gray-600 mt-1">Contextual information panel</p>
        </div>
        
        <div class="p-6">
            <div class="space-y-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-3">Quick Actions</h4>
                    <div class="space-y-2">
                        <button class="w-full flex items-center px-3 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100">
                            <x-strata::icon name="heroicon-o-plus" class="w-4 h-4 mr-3" />
                            Create New
                        </button>
                        <button class="w-full flex items-center px-3 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100">
                            <x-strata::icon name="heroicon-o-funnel" class="w-4 h-4 mr-3" />
                            Apply Filters
                        </button>
                        <button class="w-full flex items-center px-3 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100">
                            <x-strata::icon name="heroicon-o-arrow-down-tray" class="w-4 h-4 mr-3" />
                            Export Data
                        </button>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-3">Recent Activity</h4>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <div class="w-2 h-2 bg-blue-400 rounded-full mt-2 mr-3"></div>
                            <div>
                                <p class="text-sm text-gray-900">New user registered</p>
                                <p class="text-xs text-gray-500">2 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-2 h-2 bg-green-400 rounded-full mt-2 mr-3"></div>
                            <div>
                                <p class="text-sm text-gray-900">Order completed</p>
                                <p class="text-xs text-gray-500">5 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3"></div>
                            <div>
                                <p class="text-sm text-gray-900">System update</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-strata::sidebar>

    <!-- Collapsible Fixed Sidebar -->
    <x-strata::sidebar 
        name="collapsible-sidebar"
        variant="fixed"
        position="left"
        persistent="true"
        collapsible="true">
        
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Fixed Sidebar</h3>
            <p class="text-sm text-gray-600 mt-1">Always visible, can collapse</p>
        </div>
        
        <div class="p-6">
            <nav class="space-y-2">
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md">
                    <x-strata::icon name="heroicon-o-home" class="w-5 h-5 mr-3" />
                    <span>Home</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-squares-2x2" class="w-5 h-5 mr-3" />
                    <span>Projects</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-user-group" class="w-5 h-5 mr-3" />
                    <span>Team</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                    <x-strata::icon name="heroicon-o-chart-pie" class="w-5 h-5 mr-3" />
                    <span>Reports</span>
                </a>
            </nav>
            
            <div class="mt-8">
                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="text-xs text-gray-600">When collapsed, only icons are visible. Click the toggle to expand.</p>
                </div>
            </div>
        </div>
    </x-strata::sidebar>
</div>
