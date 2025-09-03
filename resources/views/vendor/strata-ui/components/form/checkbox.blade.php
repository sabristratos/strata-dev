@php
    $hasError = !empty($error);
    $inputClasses = $hasError 
        ? 'h-4 w-4 text-primary border-destructive input-radius-sm focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-destructive focus-visible:ring-offset-2 bg-white dark:bg-gray-900'
        : 'h-4 w-4 text-primary border-muted input-radius-sm focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 bg-white dark:bg-gray-900';
@endphp

<div>
    <div class="relative flex items-start">
        @if($name && !$attributes->wire('model'))
            <input type="hidden" name="{{ $name }}" value="0">
        @endif
        
        <div class="flex items-center h-5">
            <input
                id="{{ $id }}"
                name="{{ $name }}"
                type="checkbox"
                value="{{ $value }}"
                @if($checked) checked @endif
                @if($hasError) aria-invalid="true" aria-describedby="{{ $id }}_error" @endif
                @if($description) aria-describedby="{{ $id }}_description" @endif
                {{ $attributes->except(['error']) }}
                class="{{ $inputClasses }}"
            >
        </div>
        @if($label)
            <div class="ml-3 text-sm">
                <x-strata::form.label for="{{ $id }}" class="font-medium text-foreground cursor-pointer">
                    {{ $label }}
                </x-strata::form.label>
            </div>
        @endif
    </div>
    
    @if($description)
        <x-strata::form.helper id="{{ $id }}_description">{{ $description }}</x-strata::form.helper>
    @endif
    
    @if($hasError)
        <x-strata::form.error id="{{ $id }}_error">{{ $error }}</x-strata::form.error>
    @endif
</div>