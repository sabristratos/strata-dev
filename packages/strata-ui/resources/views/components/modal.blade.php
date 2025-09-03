@props([
    'name' => null,
    'variant' => 'default',
    'size' => 'md',
    'position' => 'center',
    'dismissible' => true
])

@php
    $modalId = $name ? 'modal-' . $name : uniqid('modal-');
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
    

    $containerClasses = [
        'fixed inset-0 z-50 flex',
        $variant === 'flyout' && $position === 'left' ? 'justify-start' : '',
        $variant === 'flyout' && $position === 'right' ? 'justify-end' : '',
        $variant === 'flyout' && $position === 'bottom' ? 'items-end' : '',
        $variant !== 'flyout' ? 'items-center justify-center p-4' : '',
    ];
    

    $contentClasses = [
        'relative bg-card text-card-foreground shadow-xl border border-border overflow-hidden',
        $getSizeClasses(),
        $getVariantClasses(),
        $variant === 'flyout' ? $getFlyoutPositionClasses() : '',
        $variant !== 'bare' ? 'w-full' : '',
    ];
    

    $enterTransitions = match($variant) {
        'flyout' => match($position) {
            'left' => 'transition ease-out duration-300|opacity-0 -translate-x-full|opacity-100 translate-x-0',
            'right' => 'transition ease-out duration-300|opacity-0 translate-x-full|opacity-100 translate-x-0', 
            'bottom' => 'transition ease-out duration-300|opacity-0 translate-y-full|opacity-100 translate-y-0',
            default => 'transition ease-out duration-300|opacity-0 translate-x-full|opacity-100 translate-x-0',
        },
        default => 'transition ease-out duration-300|opacity-0 scale-95|opacity-100 scale-100'
    };
    
    $leaveTransitions = match($variant) {
        'flyout' => match($position) {
            'left' => 'transition ease-in duration-200|opacity-100 translate-x-0|opacity-0 -translate-x-full',
            'right' => 'transition ease-in duration-200|opacity-100 translate-x-0|opacity-0 translate-x-full',
            'bottom' => 'transition ease-in duration-200|opacity-100 translate-y-0|opacity-0 translate-y-full', 
            default => 'transition ease-in duration-200|opacity-100 translate-x-0|opacity-0 translate-x-full',
        },
        default => 'transition ease-in duration-200|opacity-100 scale-100|opacity-0 scale-95'
    };
    
    [$enterClass, $enterStart, $enterEnd] = explode('|', $enterTransitions);
    [$leaveClass, $leaveStart, $leaveEnd] = explode('|', $leaveTransitions);
@endphp

<div
    x-data="strataModal({
        name: '{{ $name }}',
        dismissible: {{ $dismissible ? 'true' : 'false' }}
    })"
    x-show="show"
    x-cloak
    data-variant="{{ $variant }}"
    @if($variant === 'flyout')
        data-position="{{ $position }}"
    @endif
    @if($name)
        data-modal-name="{{ $name }}"
        @strata-modal-show-{{ $name }}.window="showModal($event.detail)"
        @strata-modal-hide-{{ $name }}.window="hideModal()"
        @strata-modal-toggle-{{ $name }}.window="toggleModal($event.detail)"
    @endif
    @if($isWireModel)
        x-modelable="show"
    @endif
    style="display: none;"
    {{ $attributes->except(['name', 'variant', 'size', 'position', 'dismissible', 'wire:model', 'wire:model.self']) }}
>

    <div 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @if($dismissible)
            @click="handleBackdropClick()"
        @endif
        class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm"
    ></div>
    

    <div @class(array_filter($containerClasses))>
        <div
            x-show="show"
            x-transition:enter="{{ $enterClass }}"
            x-transition:enter-start="{{ $enterStart }}"
            x-transition:enter-end="{{ $enterEnd }}"
            x-transition:leave="{{ $leaveClass }}"
            x-transition:leave-start="{{ $leaveStart }}"
            x-transition:leave-end="{{ $leaveEnd }}"
            @click.stop
            x-trap.noscroll="show"
            role="dialog"
            aria-modal="true"
            :aria-labelledby="name ? 'modal-title-' + name : null"
            :aria-describedby="name ? 'modal-description-' + name : null"
            @class(array_filter($contentClasses))
        >
            @if($dismissible && $variant !== 'bare')
                <div class="absolute right-4 top-4 z-10">
                    <x-strata::button
                        variant="ghost"
                        size="sm"
                        icon="heroicon-o-x-mark"
                        @click="hideModal()"
                        class="!p-1.5 hover:bg-muted"
                        aria-label="Close modal"
                    />
                </div>
            @endif
            
            @if($variant !== 'bare')
                <div class="p-6">
                    {{ $slot }}
                </div>
            @else
                {{ $slot }}
            @endif
        </div>
    </div>
</div>


@if (session()->has('strata_modal'))
    <script data-strata-session-modal>
        @json(session('strata_modal'))
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sessionModalScript = document.querySelector('script[data-strata-session-modal]');
            if (sessionModalScript) {
                try {
                    const modalData = JSON.parse(sessionModalScript.textContent);
                    if (modalData.id) {

                        setTimeout(() => {
                            window.dispatchEvent(new CustomEvent(`strata-modal-show-${modalData.id}`, { detail: modalData }));
                        }, 100);
                    }
                } catch (e) {
                    console.warn('Failed to parse session modal data:', e);
                }
            }
        });
    </script>
@endif