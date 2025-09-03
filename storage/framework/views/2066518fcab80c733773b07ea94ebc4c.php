<?php
    $hasLabel = isset($label) && !empty($label);
?>

<!--[if BLOCK]><![endif]--><?php if($hasLabel): ?>
    <div class="px-3 py-2 border-t border-muted/30">
        <h6 class="text-xs font-semibold text-muted uppercase tracking-wide"><?php echo e($label); ?></h6>
    </div>
<?php else: ?>
    <div class="border-t border-muted/30 my-1" <?php echo e($attributes); ?>></div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/dropdown/separator.blade.php ENDPATH**/ ?>