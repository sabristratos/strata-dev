@if(!empty($message) || !empty(trim($slot)))
<div 
    id="{{ $id }}"
    role="alert"
    aria-live="polite"
    data-strata-form="error"
    {{ $attributes->merge(['class' => $getErrorClasses()]) }}
>
    <x-icon 
        name="heroicon-o-exclamation-circle" 
        class="h-4 w-4 mt-0.5 flex-shrink-0 text-destructive"
        aria-hidden="true"
        data-strata-form="error-icon"
    />
    <div class="flex-1 min-w-0" data-strata-form="error-message">
        @if($message)
            {{ $message }}
        @else
            {{ $slot }}
        @endif
    </div>
</div>
@endif