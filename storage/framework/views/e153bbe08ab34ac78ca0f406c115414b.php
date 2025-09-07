<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Component Test</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="h-full bg-background font-sans text-foreground">
    <div class="max-w-4xl mx-auto p-8 space-y-8">
        <h1 class="text-3xl font-bold text-center mb-12">Strata UI Text Component Test</h1>
        
        <!-- Basic Variants -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Text Variants</h2>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Body (Default)</h3>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'body']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'body']); ?>
                    This is body text. It's the standard paragraph text used throughout the website. It should be readable and comfortable for extended reading.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Quote</h3>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'quote']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'quote']); ?>
                    "This is a quote variant. It includes special styling with a border and italic text to distinguish it from regular content."
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Lead</h3>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'lead']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'lead']); ?>
                    This is lead text, typically used for introductory paragraphs or important content that needs to stand out.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Small & Caption</h3>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'small']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'small']); ?>
                    This is small text, perfect for metadata or less important information.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'caption']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'caption']); ?>
                    This is caption text, typically used under images or tables.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Muted</h3>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'muted']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'muted']); ?>
                    This is muted text with reduced emphasis, perfect for secondary information.
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
        </section>

        <!-- Size Variations -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Size Variations</h2>
            <div class="space-y-2">
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['size' => 'xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xs']); ?>Extra small text (xs) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm']); ?>Small text (sm) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['size' => 'base']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'base']); ?>Base text (base) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'lg']); ?>Large text (lg) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['size' => 'xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xl']); ?>Extra large text (xl) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['size' => '2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '2xl']); ?>2X large text (2xl) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
        </section>

        <!-- Weight Variations -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Weight Variations</h2>
            <div class="space-y-2">
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['weight' => 'normal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['weight' => 'normal']); ?>Normal weight text <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['weight' => 'medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['weight' => 'medium']); ?>Medium weight text <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['weight' => 'semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['weight' => 'semibold']); ?>Semibold weight text <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['weight' => 'bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['weight' => 'bold']); ?>Bold weight text <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
        </section>

        <!-- Color Variations -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Color Variations</h2>
            <div class="space-y-2">
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['color' => 'foreground']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'foreground']); ?>Foreground color (default) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['color' => 'muted']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'muted']); ?>Muted color <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['color' => 'brand']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'brand']); ?>Brand color <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['color' => 'accent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'accent']); ?>Accent color <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['color' => 'destructive']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'destructive']); ?>Destructive color <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['color' => 'success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'success']); ?>Success color <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['color' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning']); ?>Warning color <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['color' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'info']); ?>Info color <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
        </section>

        <!-- Custom Element Tags -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Custom Element Tags</h2>
            <div class="space-y-2">
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['as' => 'div','class' => 'border p-4 rounded']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'div','class' => 'border p-4 rounded']); ?>Text as div element <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['as' => 'span','class' => 'bg-neutral-100 px-2 py-1 rounded']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'span','class' => 'bg-neutral-100 px-2 py-1 rounded']); ?>Text as span element <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
        </section>

        <!-- Combinations -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Combinations</h2>
            <div class="space-y-2">
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'body','size' => 'lg','weight' => 'semibold','color' => 'brand']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'body','size' => 'lg','weight' => 'semibold','color' => 'brand']); ?>
                    Large semibold brand colored body text
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'small','weight' => 'medium','color' => 'muted']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'small','weight' => 'medium','color' => 'muted']); ?>
                    Medium weight muted small text
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => ['variant' => 'quote','color' => 'accent','weight' => 'medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'quote','color' => 'accent','weight' => 'medium']); ?>
                    "An accented medium weight quote"
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
            </div>
        </section>

        <!-- Dark Mode Toggle -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Dark Mode Test</h2>
            <button 
                onclick="document.documentElement.classList.toggle('dark')"
                class="px-4 py-2 bg-primary text-primary-foreground rounded hover:bg-primary/90 transition-colors"
            >
                Toggle Dark Mode
            </button>
            <?php if (isset($component)) { $__componentOriginal39defe7471fda1545481dbe1423bcac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39defe7471fda1545481dbe1423bcac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                Toggle dark mode to test theme integration. All text colors should adapt properly.
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $attributes = $__attributesOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__attributesOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39defe7471fda1545481dbe1423bcac7)): ?>
<?php $component = $__componentOriginal39defe7471fda1545481dbe1423bcac7; ?>
<?php unset($__componentOriginal39defe7471fda1545481dbe1423bcac7); ?>
<?php endif; ?>
        </section>
    </div>
</body>
</html><?php /**PATH C:\Users\chaab\Herd\strata-dev\resources\views/test-text-component.blade.php ENDPATH**/ ?>