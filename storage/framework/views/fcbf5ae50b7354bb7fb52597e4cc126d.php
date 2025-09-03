<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'target' => null,
    'variant' => 'button',
    'size' => 'md',
    'icon' => null,
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
    'target' => null,
    'variant' => 'button',
    'size' => 'md',
    'icon' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $targetId = $getTargetId();
    $accessibilityAttrs = collect($getAccessibilityAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
?>

<button
    type="button"
    @click="$strata.sidebar('<?php echo e($target ?: 'main'); ?>').toggle()"
    class="<?php echo e($getVariantClasses()); ?>"
    <?php echo e($attributes->except(['target', 'variant', 'size', 'icon'])); ?>

    <?php echo $accessibilityAttrs; ?>

>
    <?php if($isHamburger()): ?>

        <div class="hamburger-icon">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </div>
    <?php else: ?>

        <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($getIconSizeClasses()).'']); ?>
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
        
        <?php if($variant === 'button' && $slot->isNotEmpty()): ?>
            <span class="ml-2">
                <?php echo e($slot); ?>

            </span>
        <?php endif; ?>
    <?php endif; ?>
</button>

<?php if($isHamburger()): ?>

    <style>
        .hamburger-toggle {
            --hamburger-line-height: 2px;
            --hamburger-line-spacing: 4px;
        }

        .hamburger-icon {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 18px;
            height: 14px;
        }

        .hamburger-line {
            display: block;
            width: 100%;
            height: var(--hamburger-line-height);
            background-color: currentColor;
            transition: all 0.2s ease-in-out;
            transform-origin: center;
        }

        .hamburger-line:not(:last-child) {
            margin-bottom: var(--hamburger-line-spacing);
        }

        .hamburger-toggle[aria-expanded="true"] .hamburger-line:first-child {
            transform: translateY(calc(var(--hamburger-line-height) + var(--hamburger-line-spacing))) rotate(45deg);
        }

        .hamburger-toggle[aria-expanded="true"] .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger-toggle[aria-expanded="true"] .hamburger-line:last-child {
            transform: translateY(calc(-1 * (var(--hamburger-line-height) + var(--hamburger-line-spacing)))) rotate(-45deg);
        }
    </style>
<?php endif; ?><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/sidebar-toggle.blade.php ENDPATH**/ ?>