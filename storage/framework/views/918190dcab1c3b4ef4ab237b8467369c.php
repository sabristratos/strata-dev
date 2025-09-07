<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'value',
    'disabled' => false
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
    'value',
    'disabled' => false
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<button
    type="button"
    role="tab"
    data-tab-trigger="<?php echo e($value); ?>"
    :aria-selected="isActive('<?php echo e($value); ?>') ? 'true' : 'false'"
    :tabindex="isActive('<?php echo e($value); ?>') ? '0' : '-1'"
    :data-state="isActive('<?php echo e($value); ?>') ? 'active' : 'inactive'"
    @click="activateTab('<?php echo e($value); ?>')"
    <?php if($disabled): ?>
        disabled
        aria-disabled="true"
    <?php endif; ?>
    <?php echo e($attributes->except(['value', 'disabled'])->merge([
        'class' => $getTriggerClasses()
    ])); ?>

>
    <?php echo e($slot); ?>

</button><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/tabs/trigger.blade.php ENDPATH**/ ?>