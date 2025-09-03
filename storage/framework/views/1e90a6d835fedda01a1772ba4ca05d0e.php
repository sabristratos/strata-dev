<?php
    $radioId = $name . '_' . $value . '_' . uniqid();
?>

<label 
    for="<?php echo e($radioId); ?>" 
    class="flex items-start gap-3 px-3 py-2 text-sm cursor-pointer button-radius-sm hover:bg-accent transition-colors group"
    <?php echo e($attributes); ?>

>
    <div class="flex items-center h-5">
        <input
            id="<?php echo e($radioId); ?>"
            name="<?php echo e($name); ?>"
            type="radio"
            value="<?php echo e($value); ?>"
            <?php if($checked): ?> checked <?php endif; ?>
            class="h-4 w-4 text-primary border-muted focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
        >
    </div>
    
    <div class="flex-1 min-w-0">
        <div class="text-foreground font-medium group-hover:text-foreground">
            <?php echo e($label ?? $slot); ?>

        </div>
        <!--[if BLOCK]><![endif]--><?php if($description): ?>
            <div class="text-xs text-muted-foreground mt-0.5"><?php echo e($description); ?></div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</label><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/dropdown/radio.blade.php ENDPATH**/ ?>