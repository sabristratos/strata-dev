<div class="max-w-7xl mx-auto p-6 space-y-12">
    <h1 class="text-4xl font-bold text-center mb-12">Strata UI Components Demo</h1>

    <!-- Button Components -->
    <x-strata::section width="wide" padding="lg">
        <h2 class="text-2xl font-semibold mb-6">Buttons</h2>

        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Variants</h3>
                <div class="flex flex-wrap gap-3">
                    <x-strata::button variant="primary">Primary</x-strata::button>
                    <x-strata::button variant="secondary">Secondary</x-strata::button>
                    <x-strata::button variant="destructive">Destructive</x-strata::button>
                    <x-strata::button variant="outline">Outline</x-strata::button>
                    <x-strata::button variant="ghost">Ghost</x-strata::button>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Sizes</h3>
                <div class="flex items-center gap-3">
                    <x-strata::button size="sm">Small</x-strata::button>
                    <x-strata::button size="md">Medium</x-strata::button>
                    <x-strata::button size="lg">Large</x-strata::button>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">With Icons</h3>
                <div class="flex flex-wrap gap-3">
                    <x-strata::button icon="heroicon-o-user">Profile</x-strata::button>
                    <x-strata::button icon="heroicon-o-cog" icon-position="right">Settings</x-strata::button>
                    <x-strata::button variant="outline" icon="heroicon-o-arrow-down-tray">Download</x-strata::button>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">States</h3>
                <div class="flex gap-3">
                    <x-strata::button disabled>Disabled</x-strata::button>
                    <x-strata::button loading>Loading</x-strata::button>
                </div>
            </div>
        </div>
    </x-strata::section>

    <!-- Alert Components -->
    <x-strata::section width="wide" padding="lg">
        <h2 class="text-2xl font-semibold mb-6">Alerts</h2>

        <div class="space-y-4">
            <x-strata::alert color="info" title="Information Alert">
                This is an informational alert with helpful content.
            </x-strata::alert>

            <x-strata::alert color="success" title="Success!" icon="heroicon-o-check-circle">
                Operation completed successfully!
            </x-strata::alert>

            <x-strata::alert color="warning" dismissible>
                This is a dismissible warning alert. Click the X to dismiss.
            </x-strata::alert>

            <x-strata::alert color="destructive" title="Error" variant="outline">
                Something went wrong. Please try again.
            </x-strata::alert>

            <x-strata::alert color="primary" variant="soft" size="lg">
                <x-slot name="actions">
                    <x-strata::button size="sm">Take Action</x-strata::button>
                </x-slot>
                This alert includes an action button.
            </x-strata::alert>
        </div>
    </x-strata::section>

    <!-- Badge Components -->
    <x-strata::section width="wide" padding="lg">
        <h2 class="text-2xl font-semibold mb-6">Badges</h2>

        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Colors & Variants</h3>
                <div class="flex flex-wrap gap-3">
                    <x-strata::badge color="primary">Primary</x-strata::badge>
                    <x-strata::badge color="secondary">Secondary</x-strata::badge>
                    <x-strata::badge color="success">Success</x-strata::badge>
                    <x-strata::badge color="warning">Warning</x-strata::badge>
                    <x-strata::badge color="destructive">Error</x-strata::badge>
                    <x-strata::badge color="info">Info</x-strata::badge>
                </div>

                <div class="flex flex-wrap gap-3 mt-3">
                    <x-strata::badge variant="outline" color="primary">Outline</x-strata::badge>
                    <x-strata::badge variant="soft" color="success">Soft</x-strata::badge>
                    <x-strata::badge variant="solid" color="warning">Solid</x-strata::badge>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Sizes & Shapes</h3>
                <div class="flex items-center gap-3">
                    <x-strata::badge size="sm">Small</x-strata::badge>
                    <x-strata::badge size="md">Medium</x-strata::badge>
                    <x-strata::badge size="lg">Large</x-strata::badge>
                    <x-strata::badge shape="square">99+</x-strata::badge>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">With Icons & Dismissible</h3>
                <div class="flex gap-3">
                    <x-strata::badge icon="heroicon-o-star" color="warning">Featured</x-strata::badge>
                    <x-strata::badge dismissible color="info">Removable</x-strata::badge>
                </div>
            </div>
        </div>
    </x-strata::section>

    <!-- Avatar Components -->
    <x-strata::section width="wide" padding="lg">
        <h2 class="text-2xl font-semibold mb-6">Avatars</h2>

        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Sizes</h3>
                <div class="flex items-center gap-4">
                    <x-strata::avatar src="https://via.placeholder.com/32" alt="User" size="xs" />
                    <x-strata::avatar src="https://via.placeholder.com/40" alt="User" size="sm" />
                    <x-strata::avatar src="https://via.placeholder.com/48" alt="User" size="md" />
                    <x-strata::avatar src="https://via.placeholder.com/56" alt="User" size="lg" />
                    <x-strata::avatar src="https://via.placeholder.com/64" alt="User" size="xl" />
                    <x-strata::avatar src="https://via.placeholder.com/80" alt="User" size="2xl" />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Initials & Shapes</h3>
                <div class="flex items-center gap-4">
                    <x-strata::avatar initials="JD" shape="circle" />
                    <x-strata::avatar initials="AB" shape="square" />
                    <x-strata::avatar initials="XY" shape="rounded" />
                    <x-strata::avatar initials="MN" border />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Status Indicators</h3>
                <div class="flex items-center gap-4">
                    <x-strata::avatar initials="ON" status="online" />
                    <x-strata::avatar initials="AW" status="away" status-position="top-right" />
                    <x-strata::avatar initials="BS" status="busy" status-position="bottom-left" />
                    <x-strata::avatar initials="OF" status="offline" />
                </div>
            </div>
        </div>
    </x-strata::section>

    <!-- Card Components -->
    <x-strata::section width="wide" padding="lg">
        <h2 class="text-2xl font-semibold mb-6">Cards</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-strata::card>
                <h3 class="text-lg font-semibold mb-2">Simple Card</h3>
                <p>Basic card with default styling and medium size.</p>
            </x-strata::card>

            <x-strata::card size="lg" border="primary">
                <h3 class="text-lg font-semibold mb-2">Large Card</h3>
                <p>This card has large padding and a primary border.</p>
            </x-strata::card>

            <x-strata::card border="none">
                <h3 class="text-lg font-semibold mb-2">No Border</h3>
                <p>Card without border for cleaner look.</p>
            </x-strata::card>
        </div>
    </x-strata::section>

    <!-- Calendar Component -->
    <x-strata::section width="wide" padding="lg">
        <h2 class="text-2xl font-semibold mb-6">Calendar</h2>

        <div class="space-y-8">
            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Date Range Picker (Default)</h3>
                <p class="text-xs text-gray-500 mb-2">Standard date range picker with presets</p>
                <x-strata::calendar />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Single Date Picker</h3>
                <p class="text-xs text-gray-500 mb-2">Single date selection without presets</p>
                <x-strata::calendar :range="false" :multiple="false" :presets="false" />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">With Clear Button</h3>
                <p class="text-xs text-gray-500 mb-2">Includes a clear button to reset selection</p>
                <x-strata::calendar show-clear-button />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Date Restrictions</h3>
                <p class="text-xs text-gray-500 mb-2">Min date: 7 days ago, Max date: 30 days from now, Disabled: weekends in current month</p>
                @php
                    $minDate = now()->subDays(7)->format('Y-m-d');
                    $maxDate = now()->addDays(30)->format('Y-m-d');
                    
                    // Disable weekends in current month
                    $disabledDates = [];
                    $currentMonth = now()->startOfMonth();
                    $endOfMonth = now()->endOfMonth();
                    
                    while ($currentMonth <= $endOfMonth) {
                        if ($currentMonth->isWeekend()) {
                            $disabledDates[] = $currentMonth->format('Y-m-d');
                        }
                        $currentMonth->addDay();
                    }
                @endphp
                <x-strata::calendar 
                    :min-date="$minDate"
                    :max-date="$maxDate"
                    :disabled-dates="$disabledDates"
                    show-clear-button
                    :presets="false"
                />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Multi-Month View (3 months)</h3>
                <p class="text-xs text-gray-500 mb-2">Three months visible with Monday as first day</p>
                <x-strata::calendar 
                    :visible-months="3" 
                    week-start="monday"
                    show-clear-button
                />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Compact Single Month</h3>
                <p class="text-xs text-gray-500 mb-2">Single month view without presets, ideal for forms</p>
                <div class="max-w-sm">
                    <x-strata::calendar 
                        :range="false"
                        :multiple="false" 
                        :presets="false"
                        show-clear-button
                    />
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Year View (12 months)</h3>
                <p class="text-xs text-gray-500 mb-2">Full year calendar view</p>
                <x-strata::calendar 
                    :visible-months="12" 
                    :presets="false"
                    week-start="monday"
                />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Custom Disabled Dates</h3>
                <p class="text-xs text-gray-500 mb-2">Specific dates disabled (holidays example)</p>
                @php
                    $holidays = [
                        now()->year . '-12-24', // Christmas Eve
                        now()->year . '-12-25', // Christmas
                        now()->year . '-12-26', // Boxing Day
                        now()->year . '-12-31', // New Year's Eve
                        (now()->year + 1) . '-01-01', // New Year's Day
                    ];
                @endphp
                <x-strata::calendar 
                    :disabled-dates="$holidays"
                    show-clear-button
                    :visible-months="2"
                />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Future Dates Only</h3>
                <p class="text-xs text-gray-500 mb-2">Only allows selection of future dates</p>
                <x-strata::calendar 
                    :min-date="now()->format('Y-m-d')"
                    show-clear-button
                />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Past 30 Days Only</h3>
                <p class="text-xs text-gray-500 mb-2">Restricts selection to the last 30 days</p>
                <x-strata::calendar 
                    :min-date="now()->subDays(30)->format('Y-m-d')"
                    :max-date="now()->format('Y-m-d')"
                    show-clear-button
                    :presets="false"
                />
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Custom Day Cell Slot</h3>
                <p class="text-xs text-gray-500 mb-2">Custom day cells with event indicators</p>
                <x-strata::calendar :range="false" :multiple="false" :presets="false">
                    <x-slot:day>
                        <div class="relative w-full h-full flex items-center justify-center">
                            <span x-text="day.date"></span>
                            <template x-if="day.date % 7 === 0 && day.isCurrentMonth">
                                <div class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></div>
                            </template>
                            <template x-if="day.date % 5 === 0 && day.isCurrentMonth">
                                <div class="absolute bottom-1 left-1 w-1.5 h-1.5 bg-blue-500 rounded-full"></div>
                            </template>
                        </div>
                    </x-slot:day>
                </x-strata::calendar>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Calendar with Footer Actions</h3>
                <p class="text-xs text-gray-500 mb-2">Includes custom footer with action buttons</p>
                <x-strata::calendar>
                    <x-slot:footer>
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-600">
                                <span x-show="startDate || endDate" x-text="
                                    startDate && endDate ? 
                                    `Selected: ${formatLocalDate(startDate)} - ${formatLocalDate(endDate)}` :
                                    startDate ? 
                                    `Start: ${formatLocalDate(startDate)}` : 
                                    'No dates selected'
                                "></span>
                                <span x-show="!startDate && !endDate">Select a date range</span>
                            </div>
                            <div class="flex gap-2">
                                <x-strata::button size="sm" variant="outline" 
                                    x-on:click="clearSelection(); $dispatch('calendar-close')"
                                >
                                    Cancel
                                </x-strata::button>
                                <x-strata::button size="sm" 
                                    x-bind:disabled="!startDate || (config.range && !endDate)"
                                    x-on:click="$dispatch('calendar-apply', { start: startDate, end: endDate })"
                                >
                                    Apply
                                </x-strata::button>
                            </div>
                        </div>
                    </x-slot:footer>
                </x-strata::calendar>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-600 mb-3">Event Calendar Example</h3>
                <p class="text-xs text-gray-500 mb-2">Day cells with custom content and pricing</p>
                @php
                    $eventDates = [
                        now()->format('Y-m-d') => ['price' => '$299', 'available' => true],
                        now()->addDays(3)->format('Y-m-d') => ['price' => '$199', 'available' => true],
                        now()->addDays(7)->format('Y-m-d') => ['price' => '$399', 'available' => false],
                        now()->addDays(12)->format('Y-m-d') => ['price' => '$249', 'available' => true],
                        now()->addDays(15)->format('Y-m-d') => ['price' => '$349', 'available' => true],
                    ];
                @endphp
                <x-strata::calendar :range="false" :multiple="false" :presets="false">
                    <x-slot:day>
                        <div class="relative w-full h-full flex flex-col items-center justify-center text-xs">
                            <span x-text="day.date" class="font-medium"></span>
                            <template x-if="day.isCurrentMonth">
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span x-text="day.date" class="font-medium"></span>
                                    @foreach($eventDates as $date => $event)
                                        <template x-if="formatLocalDate(day.fullDate) === '{{ $date }}'">
                                            <div class="mt-0.5 text-center">
                                                <div class="text-xs font-bold {{ $event['available'] ? 'text-green-600' : 'text-red-600' }}">
                                                    {{ $event['price'] }}
                                                </div>
                                                <div class="w-1 h-1 mx-auto {{ $event['available'] ? 'bg-green-500' : 'bg-red-500' }} rounded-full"></div>
                                            </div>
                                        </template>
                                    @endforeach
                                </div>
                            </template>
                        </div>
                    </x-slot:day>
                    <x-slot:footer>
                        <div class="text-center">
                            <div class="flex items-center justify-center gap-4 text-xs">
                                <div class="flex items-center gap-1">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <span>Available</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                    <span>Unavailable</span>
                                </div>
                            </div>
                        </div>
                    </x-slot:footer>
                </x-strata::calendar>
            </div>
        </div>
    </x-strata::section>

    <!-- Combined Components Demo -->
    <x-strata::section width="wide" padding="lg">
        <h2 class="text-2xl font-semibold mb-6">Real-World Examples</h2>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- User Profile Card -->
            <x-strata::card size="lg">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <x-strata::avatar initials="JS" size="lg" status="online" />
                        <div>
                            <h4 class="font-semibold">John Smith</h4>
                            <p class="text-sm text-gray-600">Senior Developer</p>
                        </div>
                    </div>
                    <x-strata::badge color="success" variant="soft">Active</x-strata::badge>
                </div>

                <p class="text-gray-600 mb-4">Experienced full-stack developer specializing in Laravel and Vue.js applications.</p>

                <div class="flex flex-wrap gap-2 mb-4">
                    <x-strata::badge size="sm" variant="outline">PHP</x-strata::badge>
                    <x-strata::badge size="sm" variant="outline">Laravel</x-strata::badge>
                    <x-strata::badge size="sm" variant="outline">Vue.js</x-strata::badge>
                    <x-strata::badge size="sm" variant="outline">MySQL</x-strata::badge>
                </div>

                <div class="flex gap-2">
                    <x-strata::button size="sm" variant="outline" icon="heroicon-o-envelope">Message</x-strata::button>
                    <x-strata::button size="sm" icon="heroicon-o-user">View Profile</x-strata::button>
                </div>
            </x-strata::card>

            <!-- Notification Card -->
            <x-strata::card>
                <div class="space-y-3">
                    <x-strata::alert color="info" size="sm">
                        You have 3 new messages
                    </x-strata::alert>

                    <x-strata::alert color="warning" size="sm" dismissible>
                        System maintenance scheduled for tonight
                    </x-strata::alert>

                    <x-strata::alert color="success" size="sm">
                        <x-slot name="actions">
                            <x-strata::button size="sm" variant="ghost">View</x-strata::button>
                        </x-slot>
                        Deployment completed successfully
                    </x-strata::alert>
                </div>
            </x-strata::card>
        </div>

        <!-- Button with Badge -->
        <div class="mt-6">
            <h3 class="text-sm font-medium text-gray-600 mb-3">Button with Badge Overlay</h3>
            <x-strata::button icon="heroicon-o-bell">
                <x-slot name="badge">
                    <x-strata::badge size="sm" color="destructive" shape="square">5</x-strata::badge>
                </x-slot>
                Notifications
            </x-strata::button>
        </div>
    </x-strata::section>
</div>
