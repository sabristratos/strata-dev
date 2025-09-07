<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'text',
    'position' => 'top',
    'offset' => 8
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
    'text',
    'position' => 'top',
    'offset' => 8
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div
    x-data="{ open: false }"
    @mouseenter="open = true"
    @mouseleave="open = false"
    class="relative inline-block max-w-max"
    x-ref="trigger"
>
    
    <?php echo e($slot); ?>


    
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-75"
        x-anchor.<?php echo e($position); ?>.offset.<?php echo e($offset); ?>="$refs.trigger"
        role="tooltip"
        class="absolute z-50 px-2.5 py-1.5 text-sm font-medium text-primary-foreground bg-primary/90 tooltip-radius shadow-sm backdrop-blur-sm pointer-events-none whitespace-nowrap max-w-max"
        style="display: none;"
    >
        <?php echo e($text); ?>

    </div>
</div><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/tooltip.blade.php ENDPATH**/ ?>