<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label' => null,
    'collapsible' => false,
    'collapsed' => false,
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
    'label' => null,
    'collapsible' => false,
    'collapsed' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $groupId = $getGroupId();
    $contentId = $groupId . '-content';
    $accessibilityAttrs = collect($getAccessibilityAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
?>

<div
    class="<?php echo e($getContainerClasses()); ?>"
    <?php echo e($attributes->except(['label', 'collapsible', 'collapsed'])); ?>

    <?php if($collapsible): ?>
        x-data="{ collapsed: <?php echo e($collapsed ? 'true' : 'false'); ?> }"
    <?php endif; ?>
>
    
    <!--[if BLOCK]><![endif]--><?php if($hasLabel()): ?>
        <!--[if BLOCK]><![endif]--><?php if($collapsible): ?>
            <button
                type="button"
                @click="collapsed = !collapsed"
                class="<?php echo e($getLabelClasses()); ?>"
                <?php echo $accessibilityAttrs; ?>

            >
                <span><?php echo e($label); ?></span>
                <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-chevron-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 transition-transform duration-200','x-bind:class' => '{ \'rotate-180\': !collapsed }']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
            </button>
        <?php else: ?>
            <div class="<?php echo e($getLabelClasses()); ?>">
                <?php echo e($label); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <div
        <?php if($collapsible): ?>
            x-show="!collapsed"
            x-collapse
            id="<?php echo e($contentId); ?>"
        <?php endif; ?>
        class="<?php echo e($getContentClasses()); ?>"
    >
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/sidebar-group.blade.php ENDPATH**/ ?>