@php
    $hasWireModel = $attributes->has('wire:model');
@endphp

{{-- 
Rating component color classes for Tailwind scanning:
text-yellow-400 text-yellow-500 text-yellow-600 hover:text-yellow-400 hover:text-yellow-500 hover:text-yellow-600
text-blue-400 text-blue-500 text-blue-600 hover:text-blue-400 hover:text-blue-500 hover:text-blue-600
text-red-400 text-red-500 text-red-600 hover:text-red-400 hover:text-red-500 hover:text-red-600
text-green-400 text-green-500 text-green-600 hover:text-green-400 hover:text-green-500 hover:text-green-600
text-purple-400 text-purple-500 text-purple-600 hover:text-purple-400 hover:text-purple-500 hover:text-purple-600
text-orange-400 text-orange-500 text-orange-600 hover:text-orange-400 hover:text-orange-500 hover:text-orange-600
text-pink-400 text-pink-500 text-pink-600 hover:text-pink-400 hover:text-pink-500 hover:text-pink-600
text-indigo-400 text-indigo-500 text-indigo-600 hover:text-indigo-400 hover:text-indigo-500 hover:text-indigo-600
--}}

<div 
    x-data="strataRating({
        hasWireModel: @js($hasWireModel),
        value: @js($value),
        readonly: @js($readonly),
        max: @js($max),
        name: @js($name)
    })"
    x-modelable="value"
    @if($hasWireModel) {{ $attributes->get('wire:model') }} @endif
    class="flex flex-col space-y-2"
>
    @if($name && !$hasWireModel)
        <input 
            x-ref="hiddenInput"
            type="hidden" 
            name="{{ $name }}" 
            value="{{ $value ?? '' }}"
        >
    @endif

    @if($label || $description)
        <div class="space-y-1">
            @if($label)
                <label 
                    id="{{ $id }}-label"
                    class="text-sm font-medium text-foreground"
                >
                    {{ $label }}
                </label>
            @endif
            @if($description)
                <p 
                    id="{{ $id }}-description"
                    class="text-xs text-muted-foreground"
                >
                    {{ $description }}
                </p>
            @endif
        </div>
    @endif

    <div class="flex items-center {{ $getGapClasses() }}" @if(!$readonly) @mouseleave="onMouseLeave()" @endif>
        @for($i = 1; $i <= $max; $i++)
            <button
                type="button"
                @if(!$readonly)
                    @click="setRating({{ $i }})"
                    @mouseenter="onMouseEnter({{ $i }})"
                @endif
                class="transition-colors duration-150 focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 input-radius-sm"
                :class="{
                    '{{ $getActiveColorClass() }}': (stars || 0) >= {{ $i }},
                    'text-muted-foreground/40': (stars || 0) < {{ $i }},
                    'cursor-pointer': !readonly,
                    'cursor-default': readonly
                }"
                {{ $attributes->except(['wire:model']) }}
                @if($label) aria-labelledby="{{ $id }}-label" @endif
                @if($description) aria-describedby="{{ $id }}-description" @endif
                aria-label="Rate {{ $i }} out of {{ $max }}"
            >
                <x-icon 
                    :name="str_replace('-o-', '-s-', $icon)" 
                    :class="$getSizeClasses()" 
                    x-show="(stars || 0) >= {{ $i }}"
                />
                <x-icon 
                    :name="$icon" 
                    :class="$getSizeClasses()" 
                    x-show="(stars || 0) < {{ $i }}"
                />
            </button>
        @endfor

        @if($clearable && !$readonly)
            <button
                type="button"
                @click="clearRating()"
                x-show="value !== null"
                class="ml-2 text-muted-foreground hover:text-foreground transition-colors duration-150 focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 input-radius-sm"
                aria-label="Clear rating"
                title="Clear rating"
            >
                <x-icon 
                    name="heroicon-o-x-mark" 
                    :class="$getClearButtonSizeClasses()" 
                />
            </button>
        @endif
    </div>

    @if($value !== null)
        <div class="text-xs text-muted-foreground">
            <span x-text="value"></span> out of {{ $max }}
        </div>
    @endif
</div>

