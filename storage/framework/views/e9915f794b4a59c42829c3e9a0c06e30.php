<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'body',
    'size' => 'base',
    'weight' => 'normal', 
    'color' => 'foreground',
    'as' => null
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'variant' => 'body',
    'size' => 'base',
    'weight' => 'normal', 
    'color' => 'foreground',
    'as' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    // Determine the HTML element tag based on variant or as prop
    if ($as) {
        $elementTag = $as;
    } else {
        $elementTag = match ($variant) {
            'quote' => 'blockquote',
            'small', 'caption' => 'small',
            'lead' => 'p',
            default => 'p',
        };
    }
    
    // Get variant classes
    $variantClasses = match ($variant) {
        'quote' => 'border-l-4 border-border pl-6 italic',
        'small', 'caption' => 'text-sm',
        'lead' => 'text-xl text-muted-foreground',
        'muted' => 'text-muted-foreground',
        default => '',
    };
    
    // Get size classes (don't override size for variants that have specific sizes)
    if (in_array($variant, ['small', 'caption', 'lead']) && $size === 'base') {
        $sizeClasses = '';
    } else {
        $sizeClasses = match ($size) {
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'lg' => 'text-lg',
            'xl' => 'text-xl',
            '2xl' => 'text-2xl',
            default => '',
        };
    }
    
    // Get weight classes
    $weightClasses = match ($weight) {
        'medium' => 'font-medium',
        'semibold' => 'font-semibold',
        'bold' => 'font-bold',
        default => '',
    };
    
    // Get color classes (don't override color for muted variant unless explicitly set)
    if ($variant === 'muted' && $color === 'foreground') {
        $colorClasses = '';
    } else {
        $colorClasses = match ($color) {
            'muted' => 'text-muted-foreground',
            'brand' => 'text-brand-600',
            'accent' => 'text-accent',
            'destructive' => 'text-destructive',
            'success' => 'text-success-600',
            'warning' => 'text-warning-600',
            'info' => 'text-info-600',
            default => '',
        };
    }
    
    // Combine all classes
    $allClasses = implode(' ', array_filter([
        $variantClasses,
        $sizeClasses,
        $weightClasses,
        $colorClasses,
    ]));
?>

<<?php echo e($elementTag); ?>

    <?php echo e($attributes->merge([
        'class' => $allClasses
    ])); ?>

    data-strata-text="root"
    data-strata-text-variant="<?php echo e($variant); ?>"
    data-strata-text-size="<?php echo e($size); ?>"
    data-strata-text-weight="<?php echo e($weight); ?>"
    data-strata-text-color="<?php echo e($color); ?>"
>
    <span data-strata-text="content"><?php echo $slot; ?></span>
</<?php echo e($elementTag); ?>><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/text.blade.php ENDPATH**/ ?>