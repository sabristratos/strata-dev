<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'value',
    'forceMount' => false
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
    'forceMount' => false
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div
    role="tabpanel"
    data-tab-content="<?php echo e($value); ?>"
    <?php if($forceMount): ?>
        data-force-mount
    <?php endif; ?>
    x-show="isActive('<?php echo e($value); ?>') <?php echo e($forceMount ? '|| forceMount' : ''); ?>"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    :aria-hidden="!isActive('<?php echo e($value); ?>') ? 'true' : 'false'"
    tabindex="0"
    <?php echo e($attributes->except(['value', 'forceMount'])->merge([
        'class' => $getContentClasses()
    ])); ?>

>
    <?php echo e($slot); ?>

</div><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/tabs/content.blade.php ENDPATH**/ ?>