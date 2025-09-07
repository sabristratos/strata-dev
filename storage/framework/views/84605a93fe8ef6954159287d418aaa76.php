<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'position' => 'bottom-end',
    'width' => 'w-56'
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
    'position' => 'bottom-end',
    'width' => 'w-56'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if (isset($component)) { $__componentOriginal68e1eda73f8026b1e95c49967c1f8bb1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68e1eda73f8026b1e95c49967c1f8bb1 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Popover::resolve(['position' => $position,'width' => $width] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Popover::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
     <?php $__env->slot('trigger', null, []); ?> 
        <?php echo e($trigger); ?>

     <?php $__env->endSlot(); ?>

    
    <div class="p-1">
        <?php echo e($slot); ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68e1eda73f8026b1e95c49967c1f8bb1)): ?>
<?php $attributes = $__attributesOriginal68e1eda73f8026b1e95c49967c1f8bb1; ?>
<?php unset($__attributesOriginal68e1eda73f8026b1e95c49967c1f8bb1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68e1eda73f8026b1e95c49967c1f8bb1)): ?>
<?php $component = $__componentOriginal68e1eda73f8026b1e95c49967c1f8bb1; ?>
<?php unset($__componentOriginal68e1eda73f8026b1e95c49967c1f8bb1); ?>
<?php endif; ?>
<?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/dropdown.blade.php ENDPATH**/ ?>