@if(!empty($text) || !empty(trim($slot)))
<div 
    id="{{ $id }}"
    data-strata-form="helper"
    {{ $attributes->merge(['class' => $getHelperClasses()]) }}
>
    @if($showIcon)
        <x-icon 
            name="heroicon-o-information-circle" 
            class="h-4 w-4 mt-0.5 flex-shrink-0 text-muted-foreground"
            aria-hidden="true"
            data-strata-form="helper-icon"
        />
        <div class="flex-1 min-w-0" data-strata-form="helper-text">
            @if($text)
                {{ $text }}
            @else
                {{ $slot }}
            @endif
        </div>
    @else
        @if($text)
            {{ $text }}
        @else
            {{ $slot }}
        @endif
    @endif
</div>
@endif