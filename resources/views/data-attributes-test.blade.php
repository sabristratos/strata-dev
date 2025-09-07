@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8 space-y-8">
    <h1 class="text-3xl font-bold mb-8">Strata UI Data Attributes Test</h1>
    
    <!-- Custom CSS for testing -->
    <style>
        /* Button customizations */
        [data-strata-button="icon"] {
            color: #10b981 !important;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }
        
        [data-strata-button="text"] {
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        [data-strata-button="badge"] {
            background: linear-gradient(45deg, #f59e0b, #ef4444) !important;
            animation: pulse 2s infinite;
        }
        
        /* Form customizations */
        [data-strata-form="label"] {
            font-weight: 700;
            color: #4338ca;
        }
        
        [data-strata-input="field"] {
            border: 2px solid #8b5cf6;
            transition: all 0.3s ease;
        }
        
        [data-strata-input="field"]:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
        
        [data-strata-form="error"] {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
            padding: 0.5rem;
        }
        
        /* Modal customizations */
        [data-strata-modal="overlay"] {
            backdrop-filter: blur(12px);
            background: rgba(0, 0, 0, 0.7);
        }
        
        [data-strata-modal="content"] {
            border: 2px solid #8b5cf6;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        /* Alert customizations */
        [data-strata-alert="icon"] {
            animation: bounce 1s infinite;
        }
        
        [data-strata-alert="title"] {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Table customizations */
        [data-strata-table="table"] {
            border: 2px solid #6366f1;
        }
        
        [data-strata-card="root"] {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translate3d(0,0,0); }
            40%, 43% { transform: translate3d(0,-5px,0); }
            70% { transform: translate3d(0,-3px,0); }
            90% { transform: translate3d(0,-1px,0); }
        }
    </style>
    
    <!-- Button Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Button Components</h2>
        <div class="flex gap-4 flex-wrap">
            <x-strata::button icon="heroicon-o-plus" variant="primary">
                Add Item
                <x-slot:badge>
                    <x-strata::badge color="destructive">New</x-strata::badge>
                </x-slot:badge>
            </x-strata::button>
            
            <x-strata::button icon="heroicon-o-cog-6-tooth" variant="secondary">
                Settings
            </x-strata::button>
            
            <x-strata::button icon="heroicon-o-trash" variant="destructive" size="sm">
                Delete
            </x-strata::button>
        </div>
    </section>
    
    <!-- Form Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Form Components</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <x-strata::form.input 
                    label="Email Address" 
                    name="email" 
                    type="email"
                    description="We'll never share your email"
                    placeholder="Enter your email"
                />
                
                <x-strata::form.input 
                    label="Password" 
                    name="password" 
                    type="password"
                    error="Password must be at least 8 characters"
                    class="mt-4"
                />
            </div>
            
            <div>
                <x-strata::form.textarea 
                    label="Message"
                    name="message" 
                    placeholder="Enter your message"
                    rows="4"
                />
                
                <x-strata::form.checkbox 
                    label="Subscribe to newsletter"
                    name="subscribe"
                    class="mt-4"
                />
                
                <x-strata::form.toggle 
                    label="Enable notifications"
                    name="notifications"
                    class="mt-4"
                />
            </div>
        </div>
    </section>
    
    <!-- Alert Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Alert Components</h2>
        <div class="space-y-4">
            <x-strata::alert color="success" title="Success!" dismissible>
                Your account has been created successfully.
                <x-slot:actions>
                    <x-strata::button size="sm" variant="outline">View Account</x-strata::button>
                </x-slot:actions>
            </x-strata::alert>
            
            <x-strata::alert color="warning" title="Warning">
                Your subscription will expire in 3 days.
            </x-strata::alert>
            
            <x-strata::alert color="info">
                New features are available in the latest update.
            </x-strata::alert>
        </div>
    </section>
    
    <!-- Card Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Card Component</h2>
        <div class="grid md:grid-cols-3 gap-4">
            <x-strata::card class="p-6">
                <h3 class="text-lg font-semibold mb-2">Custom Card</h3>
                <p>This card has custom gradient styling applied via data attributes.</p>
            </x-strata::card>
            
            <x-strata::card class="p-6">
                <h3 class="text-lg font-semibold mb-2">Another Card</h3>
                <p>All cards with data-strata-card="root" get the custom styling.</p>
            </x-strata::card>
            
            <x-strata::card class="p-6">
                <h3 class="text-lg font-semibold mb-2">Third Card</h3>
                <p>Consistent styling across all card components.</p>
            </x-strata::card>
        </div>
    </section>
    
    <!-- Table Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Table Component</h2>
        <x-strata::table striped>
            <x-strata::table.header>
                <x-strata::table.row>
                    <x-strata::table.cell tag="th">Name</x-strata::table.cell>
                    <x-strata::table.cell tag="th">Email</x-strata::table.cell>
                    <x-strata::table.cell tag="th">Status</x-strata::table.cell>
                </x-strata::table.row>
            </x-strata::table.header>
            <x-strata::table.body>
                <x-strata::table.row>
                    <x-strata::table.cell>John Doe</x-strata::table.cell>
                    <x-strata::table.cell>john@example.com</x-strata::table.cell>
                    <x-strata::table.cell>Active</x-strata::table.cell>
                </x-strata::table.row>
                <x-strata::table.row>
                    <x-strata::table.cell>Jane Smith</x-strata::table.cell>
                    <x-strata::table.cell>jane@example.com</x-strata::table.cell>
                    <x-strata::table.cell>Pending</x-strata::table.cell>
                </x-strata::table.row>
            </x-strata::table.body>
        </x-strata::table>
    </section>
    
    <!-- Modal Test -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Modal Component</h2>
        <x-strata::button @click="$dispatch('strata-modal-show-test')">
            Open Test Modal
        </x-strata::button>
        
        <x-strata::modal name="test">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Test Modal</h3>
                <p class="mb-4">This modal has custom styling applied via data attributes:</p>
                <ul class="list-disc list-inside space-y-1 mb-6">
                    <li>Custom blur backdrop</li>
                    <li>Purple border</li>
                    <li>Enhanced shadow</li>
                </ul>
                <x-strata::button @click="$dispatch('strata-modal-hide-test')" variant="primary">
                    Close Modal
                </x-strata::button>
            </div>
        </x-strata::modal>
    </section>
    
    <!-- Dropdown Test -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Dropdown Component</h2>
        <x-strata::dropdown>
            <x-slot:trigger>
                <x-strata::button icon="heroicon-o-chevron-down">
                    Options
                </x-strata::button>
            </x-slot:trigger>
            
            <x-strata::dropdown.checkbox label="Option 1" />
            <x-strata::dropdown.checkbox label="Option 2" />
            <x-strata::dropdown.separator />
            <x-strata::dropdown.checkbox label="Option 3" />
        </x-strata::dropdown>
    </section>
    
    <div class="mt-12 p-6 bg-gray-50 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">About This Test</h3>
        <p class="text-gray-700">
            This page demonstrates the new data attribute system for Strata UI components. 
            Each component has been styled using data-strata-* attributes instead of relying on CSS classes. 
            Inspect the elements to see the data attributes in action!
        </p>
    </div>
</div>
@endsection