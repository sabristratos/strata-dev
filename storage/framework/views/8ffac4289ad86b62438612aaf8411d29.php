<?php
    $listClasses = [
        'flex',
        'gap-1',
        'border-b border-border',
        'mb-4'
    ];
?>

<div 
    role="tablist"
    <?php echo e($attributes->merge([
        'class' => implode(' ', $listClasses)
    ])); ?>

>
    <?php echo e($slot); ?>

</div><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/tabs/list.blade.php ENDPATH**/ ?>