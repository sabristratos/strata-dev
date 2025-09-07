<label 
    id="{{ $id }}"
    @if($for) for="{{ $for }}" @endif
    data-strata-form="label"
    {{ $attributes->merge(['class' => $getLabelClasses()]) }}
>
    {{ $slot }}
    @if($required)
        <span 
            class="text-destructive ml-1" 
            aria-label="required"
            title="This field is required"
            data-strata-form="label-required"
        >*</span>
    @endif
</label>