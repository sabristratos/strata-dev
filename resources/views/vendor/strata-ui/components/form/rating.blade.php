@php
    $hasWireModel = $attributes->wire('model');
@endphp

<div 
    x-data="strataRating({
        hasWireModel: @js($hasWireModel),
        value: @js($value),
        readonly: @js($readonly),
        max: @js($max),
        name: @js($name)
    })"
    x-modelable="value"
    @if($hasWireModel) {{ $attributes->wire('model') }} @endif
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
                    'text-rating-star': (stars || 0) >= {{ $i }},
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

