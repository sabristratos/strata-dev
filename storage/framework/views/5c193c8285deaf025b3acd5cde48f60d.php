<?php
    $hasError = !empty($error);
    $inputClasses = $hasError 
        ? 'h-4 w-4 text-primary border-destructive focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-destructive focus-visible:ring-offset-2 bg-white dark:bg-gray-900'
        : 'h-4 w-4 text-primary border-muted focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 bg-white dark:bg-gray-900';
?>

<div>
    <div class="relative flex items-start">
        <div class="flex items-center h-5">
            <input
                id="<?php echo e($id); ?>"
                name="<?php echo e($name); ?>"
                type="radio"
                value="<?php echo e($value); ?>"
                <?php if($checked): ?> checked <?php endif; ?>
                <?php if($hasError): ?> aria-invalid="true" aria-describedby="<?php echo e($id); ?>_error" <?php endif; ?>
                <?php if($description): ?> aria-describedby="<?php echo e($id); ?>_description" <?php endif; ?>
                <?php echo e($attributes->except(['error'])); ?>

                class="<?php echo e($inputClasses); ?>"
            >
        </div>
        <!--[if BLOCK]><![endif]--><?php if($label): ?>
            <div class="ml-3 text-sm">
                <?php if (isset($component)) { $__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Label::resolve(['for' => ''.e($id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Label::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-medium text-foreground cursor-pointer']); ?>
                    <?php echo e($label); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412)): ?>
<?php $attributes = $__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412; ?>
<?php unset($__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412)): ?>
<?php $component = $__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412; ?>
<?php unset($__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412); ?>
<?php endif; ?>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    
    <!--[if BLOCK]><![endif]--><?php if($description): ?>
        <?php if (isset($component)) { $__componentOriginalb3a838ced65e177e8ce9c340733dd8dd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Helper::resolve(['id' => ''.e($id).'_description'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.helper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Helper::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($description); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd)): ?>
<?php $attributes = $__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd; ?>
<?php unset($__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3a838ced65e177e8ce9c340733dd8dd)): ?>
<?php $component = $__componentOriginalb3a838ced65e177e8ce9c340733dd8dd; ?>
<?php unset($__componentOriginalb3a838ced65e177e8ce9c340733dd8dd); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if($hasError): ?>
        <?php if (isset($component)) { $__componentOriginal432ea598424c224929c48147fe2a40a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal432ea598424c224929c48147fe2a40a7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Error::resolve(['id' => ''.e($id).'_error'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Error::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($error); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal432ea598424c224929c48147fe2a40a7)): ?>
<?php $attributes = $__attributesOriginal432ea598424c224929c48147fe2a40a7; ?>
<?php unset($__attributesOriginal432ea598424c224929c48147fe2a40a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal432ea598424c224929c48147fe2a40a7)): ?>
<?php $component = $__componentOriginal432ea598424c224929c48147fe2a40a7; ?>
<?php unset($__componentOriginal432ea598424c224929c48147fe2a40a7); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/form/radio.blade.php ENDPATH**/ ?>