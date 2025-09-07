@php
    $hasLabel = !empty($label);
    $hasDescription = !empty($description);
    $hasError = !empty($error);
@endphp

<div class="space-y-2" data-strata-textarea="wrapper">

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


    <textarea
        @if($autoResize)
            x-data="{
                value: @if($attributes->has('wire:model')) @entangle($attributes->get('wire:model')) @else @js($value ?? '') @endif,

                init() {
                    this.$nextTick(() => this.resize());
                },

                resize() {
                    $el.style.height = 'auto';
                    $el.style.height = $el.scrollHeight + 'px';
                }
            }"
            x-model="value"
            x-on:input="resize"
            x-init="resize()"
        @else
            @if($attributes->has('wire:model'))
                x-data="{ value: @entangle($attributes->get('wire:model')).live }"
                x-model="value"
            @else
                x-data="{ value: @js($value ?? '') }"
                x-model="value"
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
        data-strata-textarea="field"
        {{ $attributes->except(['wire:model', 'id', 'name', 'placeholder', 'required', 'disabled', 'readonly']) }}
        class="{{ $getTextareaClasses() }}"
    >@if(!$attributes->has('wire:model') && $value){!! e($value) !!}@endif</textarea>


    @if($hasError)
        <x-strata::form.error
            :field="$name"
            :message="$error"
        />
    @endif
</div>
