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
            <div class="w-full">
                <x-strata::card class="!p-4">
                    <div class="flex items-start gap-3">
                        {{-- Variant icons --}}
                        <div class="w-5 h-5 mt-0.5 shrink-0">
                            <x-icon 
                                name="heroicon-o-check-circle" 
                                x-show="toast.variant === 'success'"
                                class="w-5 h-5 text-success"
                            />
                            <x-icon 
                                name="heroicon-o-exclamation-triangle" 
                                x-show="toast.variant === 'warning'"
                                class="w-5 h-5 text-warning"
                            />
                            <x-icon 
                                name="heroicon-o-x-circle" 
                                x-show="toast.variant === 'destructive'"
                                class="w-5 h-5 text-destructive"
                            />
                            <x-icon 
                                name="heroicon-o-information-circle" 
                                x-show="toast.variant === 'info' || toast.variant === 'primary' || toast.variant === 'accent'"
                                x-bind:class="toast.variant === 'primary' ? 'text-primary' : toast.variant === 'accent' ? 'text-accent' : 'text-info'"
                                class="w-5 h-5"
                            />
                        </div>
                        
                        {{-- Content area --}}
                        <div class="flex-1 min-w-0">
                            <template x-if="toast.title">
                                <h4 class="text-base font-medium text-foreground" x-text="toast.title"></h4>
                            </template>
                            
                            <p 
                                x-text="toast.message" 
                                x-bind:class="{ 'mt-1': toast.title }" 
                                class="text-sm text-muted-foreground"
                            ></p>
                            
                            {{-- Action buttons using Button components --}}
                            <template x-if="toast.actions && toast.actions.length > 0">
                                <div class="flex gap-2 mt-3">
                                    {{-- Primary action (index 0) --}}
                                    <template x-if="toast.actions[0]">
                                        <x-strata::button
                                            size="sm"
                                            variant="primary"
                                            x-text="toast.actions[0].label"
                                            @click="$parent.handleAction(toast.actions[0])"
                                        />
                                    </template>
                                    
                                    {{-- Secondary action (index 1) --}}
                                    <template x-if="toast.actions[1]">
                                        <x-strata::button
                                            size="sm" 
                                            variant="outline"
                                            x-text="toast.actions[1].label"
                                            @click="$parent.handleAction(toast.actions[1])"
                                        />
                                    </template>
                                </div>
                            </template>
                        </div>
                        
                        {{-- Dismiss button using Button component --}}
                        <x-strata::button
                            variant="ghost"
                            size="sm"
                            icon="heroicon-o-x-mark"
                            @click="removeToast()"
                            class="!p-1 shrink-0"
                            aria-label="Dismiss notification"
                        />
                    </div>
                </x-strata::card>
            </div>
        </div>
    </template>
</div>


{{-- Set session toast data for JavaScript handling --}}
@if (session()->has('strata_toast'))
    <script>
        window.strataSessionToast = @json(session('strata_toast'));
    </script>
@endif