<?php
    $baseClasses = '';
    
    if ($selected) {
        $baseClasses .= ' bg-primary-50 dark:bg-primary-900/20';
    }
    
    if ($clickable) {
        $baseClasses .= ' hover:bg-default cursor-pointer transition-colors duration-150';
    }
?>

<tr <?php echo e($attributes->merge(['class' => trim($baseClasses)])); ?>>
    <?php echo e($slot); ?>

</tr><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/table/row.blade.php ENDPATH**/ ?>