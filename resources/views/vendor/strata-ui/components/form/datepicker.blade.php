@php
    $hasLabel = !empty($label);
    $hasDescription = !empty($description);
    $hasError = !empty($error);
    $hasIcon = !empty($icon);
@endphp

<div class="space-y-2">

    @if($hasLabel)
        <x-strata::form.label 
            :for="$id" 
            :required="$required"
        >
            {{ $label }}
        </x-strata::form.label>
    @endif
    

    @if($hasDescription && !$hasError)
        <x-strata::form.helper 
            :field="$name"
            :text="$description"
        />
    @endif


    <div
        x-data="strataDatepicker({
            value: @js($getFormValue()),
            range: @js($range),
            format: @js($format),
            disabled: @js($disabled),
            readonly: @js($readonly),
            placeholder: @js($placeholder)
        })"
        @keydown.escape.window="open = false"
        @click.outside="open = false"
        class="relative"
        @strata-calendar-change="handleCalendarChange($event)"
    >

        @if($name)
            @if($range)
                <input 
                    type="hidden" 
                    x-bind:value="value ? JSON.stringify(value) : ''" 
                    name="{{ $name }}" 
                    x-ref="hiddenInput"
                    @if($attributes->has('wire:model')) {{ $attributes->get('wire:model') }} @endif
                />
            @else
                <input 
                    type="hidden" 
                    x-bind:value="value || ''" 
                    name="{{ $name }}" 
                    x-ref="hiddenInput"
                    @if($attributes->has('wire:model')) {{ $attributes->get('wire:model') }} @endif
                />
            @endif
        @endif


        <div 
            class="{{ $getWrapperClasses() }}"
            @click="openCalendar()"
            @keydown.enter.prevent="openCalendar()"
            @keydown.space.prevent="openCalendar()"
            tabindex="{{ $disabled ? -1 : 0 }}"
            role="combobox"
            :aria-expanded="open"
            aria-haspopup="dialog"
            @if($hasLabel) aria-labelledby="{{ $id }}-label" @endif
            @if($hasDescription && !$hasError) aria-describedby="{{ $name }}-description" @endif
            @if($hasError) aria-describedby="{{ $name }}-error" aria-invalid="true" @endif
            @if($hasDescription && $hasError) aria-describedby="{{ $name }}-description {{ $name }}-error" @endif
            :class="{ 'opacity-50': disabled || {{ $disabled ? 'true' : 'false' }} }"
        >

            @if($hasIcon)
                <div class="flex items-center px-3 py-2">
                    <x-dynamic-component 
                        :component="$icon" 
                        class="h-5 w-5 text-muted-foreground" 
                        aria-hidden="true" 
                    />
                </div>
            @endif


            <div class="input-element flex-1 px-3 py-2">
                <span 
                    x-show="displayValue" 
                    x-text="displayValue"
                    class="text-foreground"
                ></span>
                <span 
                    x-show="!displayValue" 
                    class="text-muted-foreground"
                    x-text="placeholder"
                ></span>
            </div>


            <div class="flex items-center px-3 py-2 gap-1">
                @if($clearable)
                    <button
                        type="button"
                        x-show="displayValue"
                        @click.stop="clearValue()"
                        class="text-muted-foreground hover:text-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:text-foreground transition-colors duration-200 rounded-sm p-0.5"
                        aria-label="{{ trans('strata::datepicker.clear', [], $locale) }}"
                        tabindex="0"
                    >
                        <x-icon name="heroicon-o-x-mark" class="h-4 w-4" aria-hidden="true" />
                    </button>
                @endif
                
                <x-icon name="heroicon-o-chevron-down" class="h-4 w-4 text-muted-foreground" aria-hidden="true" />
            </div>
        </div>


        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute z-50 min-w-fit w-auto mt-2"
            style="display: none;"
        >
            <x-strata::calendar
                :value="$range ? ['start' => $startDate?->toDateString(), 'end' => $endDate?->toDateString()] : $startDate?->toDateString()"
                :initial-date="$initialDate->toIso8601String()"
                :week-start="$weekStart"
                :multiple="$multiple"
                :visible-months="$visibleMonths"
                :range="$range"
                :locale="$locale"
                :presets="!empty($presets)"
                :selecting="$selecting"
                :updating="$updating"
                :min-date="$minDate"
                :max-date="$maxDate"
                :disabled-dates="$disabledDates"
                :show-clear-button="$showClearButton"
                :close-on-select="$closeOnSelect"
            />
        </div>
    </div>
    

    @if($hasError)
        <x-strata::form.error 
            :field="$name"
            :message="$error"
        />
    @endif
</div>