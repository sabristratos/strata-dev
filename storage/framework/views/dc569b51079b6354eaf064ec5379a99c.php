<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'default',
    'size' => 'md',
    'type' => 'single',
    'defaultValue' => null,
    'animated' => true,
    'iconPosition' => 'end',
    'disabled' => false,
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
    'variant' => 'default',
    'size' => 'md',
    'type' => 'single',
    'defaultValue' => null,
    'animated' => true,
    'iconPosition' => 'end',
    'disabled' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $accordionConfig = $getAccordionConfig();
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
?>

<div
    x-data="strataAccordion(<?php echo \Illuminate\Support\Js::from($accordionConfig)->toHtml() ?>)"
    x-init="init()"
    <?php if($isWireModel): ?>
        x-modelable="openItems"
    <?php endif; ?>
    data-accordion-id="<?php echo e($accordionId); ?>"
    data-variant="<?php echo e($variant); ?>"
    data-size="<?php echo e($size); ?>"
    data-type="<?php echo e($type); ?>"
    data-icon-position="<?php echo e($iconPosition); ?>"
    data-animated="<?php echo e($animated ? 'true' : 'false'); ?>"
    <?php echo e($attributes->except(['variant', 'size', 'type', 'defaultValue', 'animated', 'iconPosition', 'disabled', 'wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ])); ?>

    role="region"
    aria-label="Accordion"
    <?php if($disabled): ?>
        aria-disabled="true"
    <?php endif; ?>
>
    <?php echo e($slot->isEmpty() ? '' : $slot); ?>

    
    <?php if (! $__env->hasRenderedOnce('9ae3fbe6-0188-453b-8546-bee494680540')): $__env->markAsRenderedOnce('9ae3fbe6-0188-453b-8546-bee494680540'); ?>
    <?php $__env->startPush('styles'); ?>
        <style>
            /* x-cloak support for Alpine.js */
            [x-cloak] { display: none !important; }
        </style>
    <?php $__env->stopPush(); ?>
    <?php endif; ?>
</div><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/accordion.blade.php ENDPATH**/ ?>