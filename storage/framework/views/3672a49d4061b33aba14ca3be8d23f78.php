<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo e($title ?? 'Page Title'); ?></title>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    </head>
    <body class="bg-background">
        <?php echo e($slot); ?>


        
        <?php if (isset($component)) { $__componentOriginal013be4ec45b0db571a55b4ebf4994e44 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal013be4ec45b0db571a55b4ebf4994e44 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\ToastContainer::resolve(['position' => 'top-end'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::toast-container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\ToastContainer::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal013be4ec45b0db571a55b4ebf4994e44)): ?>
<?php $attributes = $__attributesOriginal013be4ec45b0db571a55b4ebf4994e44; ?>
<?php unset($__attributesOriginal013be4ec45b0db571a55b4ebf4994e44); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal013be4ec45b0db571a55b4ebf4994e44)): ?>
<?php $component = $__componentOriginal013be4ec45b0db571a55b4ebf4994e44; ?>
<?php unset($__componentOriginal013be4ec45b0db571a55b4ebf4994e44); ?>
<?php endif; ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php
                $publishedPath = public_path("vendor/strata-ui/strata-ui.iife.js");
                if (file_exists($publishedPath)) {
                    $version = filemtime($publishedPath);
                    $assetUrl = asset("vendor/strata-ui/strata-ui.iife.js") . "?v=" . $version;
                    echo "<!-- Strata UI Debug: Loading from " . $assetUrl . " -->";
                    echo "<script src=\"" . $assetUrl . "\" defer></script>";
                    echo "<script>console.log(\"Strata UI: Script loaded from " . $assetUrl . "\");</script>";
                } else {
                    echo "<!-- Strata UI: JavaScript bundle not found at " . $publishedPath . " -->";
                    echo "<script>console.error(\"Strata UI: JavaScript bundle not found. Please run: php artisan vendor:publish --tag=strata-ui-assets\");</script>";
                }
            ?>
    </body>
</html>
<?php /**PATH C:\Users\chaab\Herd\strata-dev\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>