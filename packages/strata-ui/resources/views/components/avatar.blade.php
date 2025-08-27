@php
    $hasStatusIndicator = $status !== 'none';
    
    $containerClasses = $hasStatusIndicator 
        ? 'relative inline-flex' 
        : 'relative inline-flex overflow-hidden';
    
    $innerClasses = implode(' ', array_filter([
        'relative inline-flex items-center justify-center bg-slate-200 text-slate-700 dark:bg-slate-700 dark:text-slate-200 font-medium select-none',
        $hasStatusIndicator ? 'overflow-hidden' : '',
        $getSizeClasses(),
        $getShapeClasses(),
        $getBorderClasses(),
    ]));
@endphp

<div {{ $attributes->merge(['class' => $containerClasses]) }}>
    <div class="{{ $innerClasses }}">
        @if ($src)
            <div x-data="{ imageError: false }">
                <img 
                    x-show="!imageError"
                    src="{{ $src }}" 
                    alt="{{ $alt ?? '' }}"
                    class="w-full h-full object-cover {{ $getShapeClasses() }}"
                    x-on:error="imageError = true"
                />
                <div x-show="imageError" x-cloak class="flex items-center justify-center w-full h-full">
                    <x-icon name="heroicon-o-user" class="w-1/2 h-1/2 text-current" />
                </div>
            </div>
        @elseif ($initials)
            <span class="{{ $getInitialsTextClasses() }} font-semibold">
                {{ $initials }}
            </span>
        @else
            <x-icon name="heroicon-o-user" class="w-1/2 h-1/2 text-current" />
        @endif
    </div>

    @if ($status !== 'none')
        <div class="{{ $getStatusClasses() }}"></div>
    @endif

    {{ $slot }}
</div>