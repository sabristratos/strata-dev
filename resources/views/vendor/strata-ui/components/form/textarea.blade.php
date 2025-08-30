@php
    $hasLabel = !empty($label);
    $hasDescription = !empty($description);
    $hasError = !empty($error);
@endphp

<div class="space-y-2">
    {{-- Label Component --}}
    @if($hasLabel)
        <x-strata::form.label 
            :for="$id" 
            :required="$required"
        >
            {{ $label }}
        </x-strata::form.label>
    @endif
    
    {{-- Helper Text Component --}}
    @if($hasDescription && !$hasError)
        <x-strata::form.helper 
            :field="$name"
            :text="$description"
        />
    @endif

    {{-- Textarea Element --}}
    <textarea
        @if($autoResize)
            x-data="{
                value: @if($attributes->wire('model')) @entangle($attributes->wire('model')) @else '{{ $value }}' @endif,
                
                resize() {
                    $el.style.height = 'auto';
                    $el.style.height = $el.scrollHeight + 'px';
                },
                
                init() {
                    this.$nextTick(() => this.resize());
                }
            }"
            x-model="value"
            x-on:input="resize"
            x-init="resize()"
        @else
            @if($attributes->wire('model'))
                x-data="{ value: @entangle($attributes->wire('model')) }"
                x-model="value"
            @else
                @if($value) value="{{ $value }}" @endif
            @endif
        @endif
        id="{{ $id }}"
        @if($name) name="{{ $name }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($required) required aria-required="true" @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        @if($hasLabel) aria-labelledby="{{ $id }}-label" @endif
        @if($hasDescription && !$hasError) aria-describedby="{{ $name }}-description" @endif
        @if($hasError) aria-describedby="{{ $name }}-error" aria-invalid="true" @endif
        @if($hasDescription && $hasError) aria-describedby="{{ $name }}-description {{ $name }}-error" @endif
        rows="{{ $rows }}"
        {{ $attributes->except(['wire:model', 'id', 'name', 'placeholder', 'required', 'disabled', 'readonly']) }}
        class="{{ $getTextareaClasses() }}"
    >@if(!$attributes->wire('model') && $value){{ $value }}@endif</textarea>
    
    {{-- Error Component --}}
    @if($hasError)
        <x-strata::form.error 
            :field="$name"
            :message="$error"
        />
    @endif
</div>