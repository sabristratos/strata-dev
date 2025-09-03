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
            {{-- Info Notification --}}
            <template x-if="toast.variant === 'info'">
                <div class="alert-radius border border-info bg-card text-card-foreground dark:bg-card dark:text-card-foreground" role="alert">
                    <div class="flex w-full items-center gap-2.5 bg-info/10 alert-radius p-4 transition-all duration-300">
                        {{-- Icon --}}
                        <div class="rounded-full bg-info/15 p-0.5 text-info toast-pulse-info" aria-hidden="true">
                            <x-icon name="heroicon-o-information-circle" class="w-5 h-5" />
                        </div>

                        {{-- Title & Message --}}
                        <div class="flex flex-col gap-2">
                            <h3 x-cloak x-show="toast.title" class="text-sm font-semibold text-info" x-text="toast.title"></h3>
                            <p x-cloak x-show="toast.message" class="text-pretty text-sm" x-text="toast.message"></p>
                        </div>

                        {{-- Dismiss Button --}}
                        <button type="button" class="ml-auto" aria-label="dismiss notification" @click="removeToast()">
                            <x-icon name="heroicon-o-x-mark" class="w-5 h-5 shrink-0" />
                        </button>
                    </div>
                </div>
            </template>

            {{-- Success Notification --}}
            <template x-if="toast.variant === 'success'">
                <div class="alert-radius border border-success bg-card text-card-foreground dark:bg-card dark:text-card-foreground" role="alert">
                    <div class="flex w-full items-center gap-2.5 bg-success/10 alert-radius p-4 transition-all duration-300">
                        {{-- Icon --}}
                        <div class="rounded-full bg-success/15 p-0.5 text-success toast-pulse-success" aria-hidden="true">
                            <x-icon name="heroicon-o-check-circle" class="w-5 h-5" />
                        </div>

                        {{-- Title & Message --}}
                        <div class="flex flex-col gap-2">
                            <h3 x-cloak x-show="toast.title" class="text-sm font-semibold text-success" x-text="toast.title"></h3>
                            <p x-cloak x-show="toast.message" class="text-pretty text-sm" x-text="toast.message"></p>
                        </div>

                        {{-- Dismiss Button --}}
                        <button type="button" class="ml-auto" aria-label="dismiss notification" @click="removeToast()">
                            <x-icon name="heroicon-o-x-mark" class="w-5 h-5 shrink-0" />
                        </button>
                    </div>
                </div>
            </template>

            {{-- Warning Notification --}}
            <template x-if="toast.variant === 'warning'">
                <div class="alert-radius border border-warning bg-card text-card-foreground dark:bg-card dark:text-card-foreground" role="alert">
                    <div class="flex w-full items-center gap-2.5 bg-warning/10 alert-radius p-4 transition-all duration-300">
                        {{-- Icon --}}
                        <div class="rounded-full bg-warning/15 p-0.5 text-warning toast-pulse-warning" aria-hidden="true">
                            <x-icon name="heroicon-o-exclamation-triangle" class="w-5 h-5" />
                        </div>

                        {{-- Title & Message --}}
                        <div class="flex flex-col gap-2">
                            <h3 x-cloak x-show="toast.title" class="text-sm font-semibold text-warning" x-text="toast.title"></h3>
                            <p x-cloak x-show="toast.message" class="text-pretty text-sm" x-text="toast.message"></p>
                        </div>

                        {{-- Dismiss Button --}}
                        <button type="button" class="ml-auto" aria-label="dismiss notification" @click="removeToast()">
                            <x-icon name="heroicon-o-x-mark" class="w-5 h-5 shrink-0" />
                        </button>
                    </div>
                </div>
            </template>

            {{-- Destructive/Danger Notification --}}
            <template x-if="toast.variant === 'destructive'">
                <div class="alert-radius border border-destructive bg-card text-card-foreground dark:bg-card dark:text-card-foreground" role="alert">
                    <div class="flex w-full items-center gap-2.5 bg-destructive/10 alert-radius p-4 transition-all duration-300">
                        {{-- Icon --}}
                        <div class="rounded-full bg-destructive/15 p-0.5 text-destructive toast-pulse-destructive" aria-hidden="true">
                            <x-icon name="heroicon-o-x-circle" class="w-5 h-5" />
                        </div>

                        {{-- Title & Message --}}
                        <div class="flex flex-col gap-2">
                            <h3 x-cloak x-show="toast.title" class="text-sm font-semibold text-destructive" x-text="toast.title"></h3>
                            <p x-cloak x-show="toast.message" class="text-pretty text-sm" x-text="toast.message"></p>
                        </div>

                        {{-- Dismiss Button --}}
                        <button type="button" class="ml-auto" aria-label="dismiss notification" @click="removeToast()">
                            <x-icon name="heroicon-o-x-mark" class="w-5 h-5 shrink-0" />
                        </button>
                    </div>
                </div>
            </template>

            {{-- Primary Notification --}}
            <template x-if="toast.variant === 'primary'">
                <div class="alert-radius border border-primary bg-card text-card-foreground dark:bg-card dark:text-card-foreground" role="alert">
                    <div class="flex w-full items-center gap-2.5 bg-primary/10 alert-radius p-4 transition-all duration-300">
                        {{-- Icon --}}
                        <div class="rounded-full bg-primary/15 p-0.5 text-primary toast-pulse-primary" aria-hidden="true">
                            <x-icon name="heroicon-o-star" class="w-5 h-5" />
                        </div>

                        {{-- Title & Message --}}
                        <div class="flex flex-col gap-2">
                            <h3 x-cloak x-show="toast.title" class="text-sm font-semibold text-primary" x-text="toast.title"></h3>
                            <p x-cloak x-show="toast.message" class="text-pretty text-sm" x-text="toast.message"></p>
                        </div>

                        {{-- Dismiss Button --}}
                        <button type="button" class="ml-auto" aria-label="dismiss notification" @click="removeToast()">
                            <x-icon name="heroicon-o-x-mark" class="w-5 h-5 shrink-0" />
                        </button>
                    </div>
                </div>
            </template>

            {{-- Accent Notification --}}
            <template x-if="toast.variant === 'accent'">
                <div class="alert-radius border border-accent bg-card text-card-foreground dark:bg-card dark:text-card-foreground" role="alert">
                    <div class="flex w-full items-center gap-2.5 bg-accent/10 alert-radius p-4 transition-all duration-300">
                        {{-- Icon --}}
                        <div class="rounded-full bg-accent/15 p-0.5 text-accent toast-pulse-accent" aria-hidden="true">
                            <x-icon name="heroicon-o-heart" class="w-5 h-5" />
                        </div>

                        {{-- Title & Message --}}
                        <div class="flex flex-col gap-2">
                            <h3 x-cloak x-show="toast.title" class="text-sm font-semibold text-accent" x-text="toast.title"></h3>
                            <p x-cloak x-show="toast.message" class="text-pretty text-sm" x-text="toast.message"></p>
                        </div>

                        {{-- Dismiss Button --}}
                        <button type="button" class="ml-auto" aria-label="dismiss notification" @click="removeToast()">
                            <x-icon name="heroicon-o-x-mark" class="w-5 h-5 shrink-0" />
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </template>
</div>


{{-- Set session toast data for JavaScript handling --}}
@if (session()->has('strata_toast'))
    <script>
        window.strataSessionToast = @json(session('strata_toast'));
    </script>
@endif