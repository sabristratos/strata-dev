<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name' => null,
    'variant' => 'overlay',
    'width' => 'w-64',
    'position' => 'left',
    'persistent' => false,
    'backdrop' => true,
    'collapsible' => false,
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
    'name' => null,
    'variant' => 'overlay',
    'width' => 'w-64',
    'position' => 'left',
    'persistent' => false,
    'backdrop' => true,
    'collapsible' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $sidebarId = $getSidebarId();
    $targetId = $name ? "strata-sidebar-{$name}" : $sidebarId;
    $accessibilityAttrs = collect($getAccessibilityAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
?>


<?php if($shouldShowBackdrop()): ?>
    <div
        x-show="show"
        x-transition:enter="transition-opacity duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
        @click="close()"
        class="<?php echo e($getBackdropClasses()); ?>"
        aria-hidden="true"
    ></div>
<?php endif; ?>


<aside
    x-data="strataSidebar({
        name: '<?php echo e($name); ?>',
        variant: '<?php echo e($variant); ?>',
        persistent: <?php echo e($persistent ? 'true' : 'false'); ?>,
        collapsible: <?php echo e($collapsible ? 'true' : 'false'); ?>

    })"
    x-show="show || variant === 'fixed'"
    x-transition:enter="transform transition-transform duration-300 ease-in-out"
    x-transition:enter-start="<?php echo e($getTransformClasses()); ?>"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transform transition-transform duration-300 ease-in-out"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="<?php echo e($getTransformClasses()); ?>"
    :class="{ 
        '<?php echo e($getTransformClasses()); ?>': !show && variant !== 'fixed',
        'strata-sidebar-reduced-motion': window.matchMedia('(prefers-reduced-motion: reduce)').matches
    }"
    x-cloak
    id="<?php echo e($targetId); ?>"
    class="<?php echo e($getContainerClasses()); ?>"
    <?php echo e($attributes->except(['name', 'variant', 'width', 'position', 'persistent', 'backdrop', 'collapsible'])); ?>

    <?php echo $accessibilityAttrs; ?>

    :aria-hidden="show ? 'false' : 'true'"
    @touchstart.passive="handleTouchStart"
    @touchmove.passive="handleTouchMove"
    @touchend.passive="handleTouchEnd"
>
    
    <?php if(isset($header)): ?>
        <div class="p-4" id="<?php echo e($targetId); ?>-header">
            <?php echo e($header); ?>

        </div>
    <?php elseif($isCollapsible()): ?>
        <div class="flex items-center justify-between p-4" id="<?php echo e($targetId); ?>-header">
            <div class="flex-1">
                <span class="sr-only">Sidebar header</span>
            </div>
            <button
                type="button"
                @click="toggleCollapsed()"
                class="p-1 rounded-md text-muted-foreground hover:text-foreground hover:bg-accent transition-colors"
                :aria-label="collapsed ? 'Expand sidebar' : 'Collapse sidebar'"
                aria-describedby="<?php echo e($targetId); ?>-header"
            >
                <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => $position === 'right' ? 'heroicon-o-chevron-right' : 'heroicon-o-chevron-left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4','x-show' => '!collapsed']); ?>
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
                <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => $position === 'right' ? 'heroicon-o-chevron-left' : 'heroicon-o-chevron-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4','x-show' => 'collapsed']); ?>
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
        </div>
    <?php endif; ?>

    
    <nav
        class="overflow-y-auto p-4 space-y-1 focus:outline-none min-h-0"
        :class="{ 'px-2': collapsed && collapsible }"
        aria-labelledby="<?php echo e(isset($header) ? $targetId . '-header' : null); ?>"
        x-ref="sidebarContent"
        x-trap.inert.noscroll="show && (variant === 'overlay' || (variant === 'hybrid' && _isMobile))"
    >
        <?php echo e($slot); ?>

    </nav>

    
    <?php if(isset($footer)): ?>
        <div class="p-4 border-t border-border">
            <?php echo e($footer); ?>

        </div>
    <?php endif; ?>
</aside>


<div
    class="sr-only"
    aria-live="polite"
    aria-atomic="true"
    role="status"
>
    <span x-text="show ? `${$data.name || 'Sidebar'} navigation opened` : `${$data.name || 'Sidebar'} navigation closed`"></span>
</div>


<?php if (! $__env->hasRenderedOnce('71bb4eda-bf5b-42c1-b6d0-0edce072f7e3')): $__env->markAsRenderedOnce('71bb4eda-bf5b-42c1-b6d0-0edce072f7e3'); ?>
<style>
@media (prefers-reduced-motion: reduce) {
    .strata-sidebar-reduced-motion * {
        transition-duration: 0.01ms !important;
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
    }
}
</style>
<?php endif; ?>
<?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/sidebar.blade.php ENDPATH**/ ?>