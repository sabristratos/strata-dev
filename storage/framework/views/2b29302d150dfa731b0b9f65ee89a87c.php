<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'padding' => 'responsive',
    'mobileHeader' => false,
    'mobileHeaderClass' => null,
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
    'padding' => 'responsive',
    'mobileHeader' => false,
    'mobileHeaderClass' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div 
    class="<?php echo e($getContainerClasses()); ?> main-content-container" 
    x-data="{ }"
    x-init="document.body.classList.add('has-main-content')"
    x-destroy="document.body.classList.remove('has-main-content')"
    <?php echo e($attributes); ?>

>

    <!--[if BLOCK]><![endif]--><?php if($mobileHeader && isset($header)): ?>
        <header class="<?php echo e($getMobileHeaderClasses()); ?>">
            <?php echo e($header); ?>

        </header>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


    <main class="<?php echo e($getContentClasses()); ?>">
        <?php echo e($slot); ?>

    </main>
</div><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/main-content.blade.php ENDPATH**/ ?>