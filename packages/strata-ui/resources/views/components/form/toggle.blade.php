@php
    $hasError = !empty($error);
@endphp

<div class="flex flex-col gap-1">
    <div 
        x-data="{
            value: @if($attributes->wire('model')) @entangle($attributes->wire('model')) @else {{ $checked ? 'true' : 'false' }} @endif,
            
            get isOn() {
                return this.value === true || this.value === '1' || this.value === 1;
            },
            
            toggle() {
                this.value = !this.isOn;
                this.$refs.hiddenInput.checked = this.isOn;
            }
        }" 
        class="flex items-center gap-3"
    >
    @if($name && !$attributes->wire('model'))
        <input type="hidden" name="{{ $name }}" value="0">
    @endif
    
    <input 
        x-ref="hiddenInput"
        type="checkbox" 
        @if($name) name="{{ $name }}" @endif
        @if($value) value="{{ $value }}" @else value="1" @endif
        :checked="isOn"
        class="sr-only"
        {{ $attributes->except(['wire:model']) }}
    >

    <button 
        x-ref="switchButton"
        type="button" 
        @click="toggle()"
        :class="isOn ? 'bg-primary' : 'bg-input'" 
        class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
        :aria-pressed="isOn.toString()"
        role="switch"
        @if($label) aria-labelledby="{{ $id }}-label" @endif
        @if($description && !$hasError) aria-describedby="{{ $id }}-description" @endif
        @if($hasError) aria-describedby="{{ $id }}_error" aria-invalid="true" @endif
    >
        <span 
            :class="isOn ? 'translate-x-5' : 'translate-x-0'" 
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-background shadow-sm ring-0 transition duration-200 ease-in-out"
        ></span>
    </button>

    @if($label || $description)
        <div class="flex flex-col items-start gap-1">
            @if($label)
                <x-strata::form.label 
                    id="{{ $id }}-label"
                    class="cursor-pointer select-none"
                    @click="$refs.switchButton.click(); $refs.switchButton.focus()"
                >
                    {{ $label }}
                </x-strata::form.label>
            @endif
            @if($description)
                <x-strata::form.helper id="{{ $id }}-description">{{ $description }}</x-strata::form.helper>
            @endif
        </div>
    @endif
    </div>
    
    @if($hasError)
        <x-strata::form.error id="{{ $id }}_error">{{ $error }}</x-strata::form.error>
    @endif
</div>