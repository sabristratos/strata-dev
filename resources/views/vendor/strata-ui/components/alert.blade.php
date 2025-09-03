@php
    $role = match ($color) {
        'destructive' => 'alert',
        'warning' => 'alert', 
        default => 'status'
    };
    $ariaLive = $color === 'destructive' ? 'assertive' : 'polite';
@endphp

<div 
    x-data="{ visible: true }" 
    x-show="visible" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    role="{{ $role }}"
    aria-live="{{ $ariaLive }}"
    @class([
        'alert-radius shadow-xs',
        'border border-info bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'info',
        'border border-success bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'success',
        'border border-warning bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'warning',
        'border border-destructive bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'destructive',
        'border border-primary bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'primary',
        'border border-accent bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'accent',
    ])
    {{ $attributes }}
>
    <div 
        @class([
            'flex w-full items-center gap-2.5 alert-radius transition-all duration-300',
            $getSizeClasses(),
            'bg-info/10' => $color === 'info',
            'bg-success/10' => $color === 'success',
            'bg-warning/10' => $color === 'warning',
            'bg-destructive/10' => $color === 'destructive',
            'bg-primary/10' => $color === 'primary',
            'bg-accent/10' => $color === 'accent',
        ])
    >
        {{-- Icon --}}
        <div 
            @class([
                'rounded-full p-0.5 shrink-0 animate-pulse',
                'bg-info/15 text-info' => $color === 'info',
                'bg-success/15 text-success' => $color === 'success',
                'bg-warning/15 text-warning' => $color === 'warning',
                'bg-destructive/15 text-destructive' => $color === 'destructive',
                'bg-primary/15 text-primary' => $color === 'primary',
                'bg-accent/15 text-accent' => $color === 'accent',
            ])
            aria-hidden="true"
        >
            <x-icon :name="$getContextualIcon()" :class="$getIconSizeClasses()" />
        </div>

        {{-- Title & Message --}}
        <div class="flex flex-col gap-2 flex-1 min-w-0">
            @if ($title)
                <h3 
                    @class([
                        'font-semibold',
                        $getTitleClasses(),
                        'text-info' => $color === 'info',
                        'text-success' => $color === 'success',
                        'text-warning' => $color === 'warning',
                        'text-destructive' => $color === 'destructive',
                        'text-primary' => $color === 'primary',
                        'text-accent' => $color === 'accent',
                    ])
                >
                    {{ $title }}
                </h3>
                @if ($slot->isNotEmpty())
                    <div class="text-pretty text-sm">
                        {{ $slot }}
                    </div>
                @endif
            @else
                <div class="text-pretty text-sm">
                    {{ $slot }}
                </div>
            @endif
            
            {{-- Actions slot --}}
            @isset($actions)
                <div class="flex gap-2 mt-1">
                    {!! $actions !!}
                </div>
            @endisset
        </div>

        {{-- Dismiss Button --}}
        @if ($dismissible)
            <x-strata::button
                variant="ghost"
                size="sm"
                icon="heroicon-o-x-mark"
                x-on:click="visible = false"
                aria-label="Dismiss alert"
                class="!p-1 ml-auto shrink-0"
            />
        @endif
    </div>
</div>