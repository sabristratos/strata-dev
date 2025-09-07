<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'orientation' => 'horizontal',
    'variant' => 'default',
    'spacing' => 'md',
    'label' => null,
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
    'orientation' => 'horizontal',
    'variant' => 'default',
    'spacing' => 'md',
    'label' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $accessibilityAttrs = collect($getAccessibilityAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
?>

<?php if($hasLabel()): ?>
    
    <div 
        <?php echo e($attributes->merge(['class' => $getContainerClasses()])); ?>

        <?php echo $accessibilityAttrs; ?>

    >
        <?php if($orientation === 'horizontal'): ?>
            <div class="<?php echo e($getSeparatorClasses()); ?>"></div>
            <span class="<?php echo e($getLabelClasses()); ?> <?php echo e($getBackgroundClasses()); ?>"><?php echo e($label); ?></span>
            <div class="<?php echo e($getSeparatorClasses()); ?>"></div>
        <?php else: ?>
            <div class="<?php echo e($getSeparatorClasses()); ?>"></div>
            <span class="<?php echo e($getLabelClasses()); ?> <?php echo e($getBackgroundClasses()); ?>"><?php echo e($label); ?></span>
            <div class="<?php echo e($getSeparatorClasses()); ?>"></div>
        <?php endif; ?>
    </div>
<?php else: ?>
    
    <div 
        <?php echo e($attributes->merge(['class' => $getContainerClasses()])); ?>

        <?php echo $accessibilityAttrs; ?>

    >
        <div class="<?php echo e($getSeparatorClasses()); ?>"></div>
    </div>
<?php endif; ?><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/separator.blade.php ENDPATH**/ ?>