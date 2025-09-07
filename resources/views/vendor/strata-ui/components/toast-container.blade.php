<div
    x-data="strataToastGroup({
        position: '{{ $position }}',
        expanded: {{ $expanded ? 'true' : 'false' }}
    })"
    @class([
        'fixed z-[99] w-full sm:max-w-sm p-4 space-y-3 pointer-events-none',
        'bottom-0 right-0' => $position === 'bottom-end',
        'bottom-0 left-0' => $position === 'bottom-start',
        'bottom-0 left-1/2 -translate-x-1/2' => $position === 'bottom-center',
        'top-0 right-0' => $position === 'top-end',
        'top-0 left-0' => $position === 'top-start',
        'top-0 left-1/2 -translate-x-1/2' => $position === 'top-center',
    ])
    x-cloak
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-data="strataToastItem({
                toast: toast,
                position: '{{ $position }}'
            })"
            @mouseenter="onMouseEnter()"
            @mouseleave="onMouseLeave()"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform"
            x-transition:enter-end="opacity-100 transform"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform"
            x-transition:leave-end="opacity-0 transform"
            :class="{
                'translate-y-full': '{{ str($position)->startsWith('bottom-') }}' && !show,
                '-translate-y-full': '{{ str($position)->startsWith('top-') }}' && !show,
                'translate-y-0': show,
            }"
            class="w-full pointer-events-auto"
        >
            <template x-if="toast.variant === 'info'">
                <x-strata::alert
                    color="info"
                    dismissible="true"
                    class="!shadow-none"
                    x-on:click="visible = false; removeToast()"
                >
                    <x-slot name="title">
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                    </x-slot>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                </x-strata::alert>
            </template>

            <template x-if="toast.variant === 'success'">
                <x-strata::alert
                    color="success"
                    dismissible="true"
                    class="!shadow-none"
                    x-on:click="visible = false; removeToast()"
                >
                    <x-slot name="title">
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                    </x-slot>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                </x-strata::alert>
            </template>

            <template x-if="toast.variant === 'warning'">
                <x-strata::alert
                    color="warning"
                    dismissible="true"
                    class="!shadow-none"
                    x-on:click="visible = false; removeToast()"
                >
                    <x-slot name="title">
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                    </x-slot>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                </x-strata::alert>
            </template>

            <template x-if="toast.variant === 'destructive'">
                <x-strata::alert
                    color="destructive"
                    dismissible="true"
                    class="!shadow-none"
                    x-on:click="visible = false; removeToast()"
                >
                    <x-slot name="title">
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                    </x-slot>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                </x-strata::alert>
            </template>

            <template x-if="toast.variant === 'primary'">
                <x-strata::alert
                    color="primary"
                    dismissible="true"
                    class="!shadow-none"
                    x-on:click="visible = false; removeToast()"
                >
                    <x-slot name="title">
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                    </x-slot>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                </x-strata::alert>
            </template>

            <template x-if="toast.variant === 'accent'">
                <x-strata::alert
                    color="accent"
                    dismissible="true"
                    class="!shadow-none"
                    x-on:click="visible = false; removeToast()"
                >
                    <x-slot name="title">
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                    </x-slot>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                </x-strata::alert>
            </template>
        </div>
    </template>
</div>



@if (session()->has('strata_toast'))
    <script>
        window.strataSessionToast = @json(session('strata_toast'));
    </script>
@endif