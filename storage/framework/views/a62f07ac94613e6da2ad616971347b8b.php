<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'position' => 'bottom-start',
    'offset' => 8,
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
    'position' => 'bottom-start',
    'offset' => 8,
    'width' => 'w-56'
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
    @keydown.escape.window="open = false"
    @click.outside="open = false"
    class="relative"
    <?php echo e($attributes->except(['position', 'offset', 'width'])); ?>

>
    <div @click="open = !open" x-ref="trigger" class="inline-block w-full">
        <?php echo e($trigger); ?>

    </div>
    <template x-teleport="body">
        <div
            x-show="open"
            x-anchor.<?php echo e($position); ?>.offset.<?php echo e($offset); ?>="$refs.trigger"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute z-50 <?php echo e($width); ?>"
            style="display: none;"
        >
            <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border">
                <?php echo e($slot); ?>

            </div>
        </div>
    </template>
</div>
<?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/popover.blade.php ENDPATH**/ ?>