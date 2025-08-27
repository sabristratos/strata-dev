<label 
    id="{{ $id }}"
    @if($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => $getLabelClasses()]) }}
>
    {{ $slot }}
    @if($required)
        <span 
            class="text-destructive ml-1" 
            aria-label="required"
            title="This field is required"
        >*</span>
    @endif
</label>