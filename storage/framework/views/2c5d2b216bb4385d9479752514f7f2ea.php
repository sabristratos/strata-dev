<?php if(!empty($text) || !empty(trim($slot))): ?>
<div 
    id="<?php echo e($id); ?>"
    data-strata-form="helper"
    <?php echo e($attributes->merge(['class' => $getHelperClasses()])); ?>

>
    <?php if($showIcon): ?>
        <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-information-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 mt-0.5 flex-shrink-0 text-muted-foreground','aria-hidden' => 'true','data-strata-form' => 'helper-icon']); ?>
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
        <div class="flex-1 min-w-0" data-strata-form="helper-text">
            <?php if($text): ?>
                <?php echo e($text); ?>

            <?php else: ?>
                <?php echo e($slot); ?>

            <?php endif; ?>
        </div>
    <?php else: ?>
        <?php if($text): ?>
            <?php echo e($text); ?>

        <?php else: ?>
            <?php echo e($slot); ?>

        <?php endif; ?>
    <?php endif; ?>
</div>
<?php endif; ?><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/form/helper.blade.php ENDPATH**/ ?>