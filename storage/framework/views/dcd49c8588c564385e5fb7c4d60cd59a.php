<?php
    $baseClasses = 'bg-card text-card-foreground transition-colors duration-200';
    $classes = implode(' ', [$baseClasses, $getSizeClasses(), $getBorderClasses()]);
?>

<div <?php echo e($attributes->merge(['class' => $classes . ' card-radius'])); ?>>
    <?php echo e($slot); ?>

</div><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/card.blade.php ENDPATH**/ ?>