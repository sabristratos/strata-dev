<label 
    id="<?php echo e($id); ?>"
    <?php if($for): ?> for="<?php echo e($for); ?>" <?php endif; ?>
    data-strata-form="label"
    <?php echo e($attributes->merge(['class' => $getLabelClasses()])); ?>

>
    <?php echo e($slot); ?>

    <?php if($required): ?>
        <span 
            class="text-destructive ml-1" 
            aria-label="required"
            title="This field is required"
            data-strata-form="label-required"
        >*</span>
    <?php endif; ?>
</label><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/form/label.blade.php ENDPATH**/ ?>