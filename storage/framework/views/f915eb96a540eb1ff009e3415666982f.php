<label 
    id="<?php echo e($id); ?>"
    <?php if($for): ?> for="<?php echo e($for); ?>" <?php endif; ?>
    <?php echo e($attributes->merge(['class' => $getLabelClasses()])); ?>

>
    <?php echo e($slot); ?>

    <!--[if BLOCK]><![endif]--><?php if($required): ?>
        <span 
            class="text-destructive ml-1" 
            aria-label="required"
            title="This field is required"
        >*</span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</label><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/form/label.blade.php ENDPATH**/ ?>