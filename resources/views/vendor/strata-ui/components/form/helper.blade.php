@if(!empty($text) || !empty(trim($slot)))
<div 
    id="{{ $id }}"
    {{ $attributes->merge(['class' => $getHelperClasses()]) }}
>
    @if($showIcon)
        <x-icon 
            name="heroicon-o-information-circle" 
            class="h-4 w-4 mt-0.5 flex-shrink-0 text-muted-foreground"
            aria-hidden="true"
        />
        <div class="flex-1 min-w-0">
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