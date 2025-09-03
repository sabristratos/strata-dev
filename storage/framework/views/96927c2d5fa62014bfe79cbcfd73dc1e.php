<?php
    $hasStatusIndicator = $status !== 'none';
    
    $containerClasses = $hasStatusIndicator 
        ? 'relative inline-flex' 
        : 'relative inline-flex overflow-hidden';
    
    $innerClasses = implode(' ', array_filter([
        'relative inline-flex items-center justify-center bg-muted text-muted-foreground font-medium select-none',
        $hasStatusIndicator ? 'overflow-hidden' : '',
        $getSizeClasses(),
        $getShapeClasses(),
        $getBorderClasses(),
    ]));
?>

<!--[if BLOCK]><![endif]--><?php if($tooltip): ?>
<?php if (isset($component)) { $__componentOriginal2ffecaa0e71e3e9840dd80bfddb4526d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ffecaa0e71e3e9840dd80bfddb4526d = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tooltip::resolve(['text' => $tooltip,'position' => $tooltipPosition] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tooltip::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<div <?php echo e($attributes->merge(['class' => $containerClasses])); ?>>
    <div class="<?php echo e($innerClasses); ?>">
        <!--[if BLOCK]><![endif]--><?php if($src): ?>
            <div x-data="{ imageError: false }">
                <img 
                    x-show="!imageError"
                    src="<?php echo e($src); ?>" 
                    alt="<?php echo e($alt ?? ''); ?>"
                    class="w-full h-full object-cover <?php echo e($getShapeClasses()); ?>"
                    x-on:error="imageError = true"
                />
                <div x-show="imageError" x-cloak class="flex items-center justify-center w-full h-full">
                    <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-1/2 h-1/2 text-current']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $attributes = $__attributesOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__attributesOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $component = $__componentOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__componentOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
                </div>
            </div>
        <?php elseif($initials): ?>
            <span class="<?php echo e($getInitialsTextClasses()); ?> font-semibold">
                <?php echo e($initials); ?>

            </span>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-1/2 h-1/2 text-current']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $attributes = $__attributesOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__attributesOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $component = $__componentOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__componentOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php if($status !== 'none'): ?>
        <div class="<?php echo e($getStatusClasses()); ?>"></div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php echo e($slot); ?>

</div>

<!--[if BLOCK]><![endif]--><?php if($tooltip): ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ffecaa0e71e3e9840dd80bfddb4526d)): ?>
<?php $attributes = $__attributesOriginal2ffecaa0e71e3e9840dd80bfddb4526d; ?>
<?php unset($__attributesOriginal2ffecaa0e71e3e9840dd80bfddb4526d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ffecaa0e71e3e9840dd80bfddb4526d)): ?>
<?php $component = $__componentOriginal2ffecaa0e71e3e9840dd80bfddb4526d; ?>
<?php unset($__componentOriginal2ffecaa0e71e3e9840dd80bfddb4526d); ?>
<?php endif; ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/avatar.blade.php ENDPATH**/ ?>