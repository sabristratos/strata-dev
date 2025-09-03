<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo e($title ?? 'Page Title'); ?></title>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    </head>
    <body class="bg-surface text-foreground">

            
            <?php if (isset($component)) { $__componentOriginal28e8d7754f3f4f5cf45b38c536d4911e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28e8d7754f3f4f5cf45b38c536d4911e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Sidebar::resolve(['name' => 'main-sidebar','variant' => 'push','width' => 'w-64','position' => 'left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Sidebar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hidden lg:block']); ?>
                 <?php $__env->slot('header', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginal5dd770645231832d28570cdd1a10b56b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5dd770645231832d28570cdd1a10b56b = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Dropdown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Dropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <button class="flex items-center gap-3 w-full p-3 button-radius hover:bg-muted/50 transition-colors">
                                <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'md','initials' => 'JD'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Avatar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6)): ?>
<?php $attributes = $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6; ?>
<?php unset($__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal504085b8cf8f6696eba64b6eed9c17a6)): ?>
<?php $component = $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6; ?>
<?php unset($__componentOriginal504085b8cf8f6696eba64b6eed9c17a6); ?>
<?php endif; ?>
                                <div class="flex-1 text-left">
                                    <div class="font-semibold text-foreground">John Doe</div>
                                    <div class="text-sm text-muted-foreground">john@company.com</div>
                                </div>
                                <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-chevron-up-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-muted-foreground']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
                            </button>
                         <?php $__env->endSlot(); ?>

                        <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Profile <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-cog-6-tooth'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Account Settings <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-building-office'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Switch Team <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal7f8c8178514c8ba199d9d4ee9373e028 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.dropdown.separator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028)): ?>
<?php $attributes = $__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028; ?>
<?php unset($__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f8c8178514c8ba199d9d4ee9373e028)): ?>
<?php $component = $__componentOriginal7f8c8178514c8ba199d9d4ee9373e028; ?>
<?php unset($__componentOriginal7f8c8178514c8ba199d9d4ee9373e028); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-question-mark-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Help & Support <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5dd770645231832d28570cdd1a10b56b)): ?>
<?php $attributes = $__attributesOriginal5dd770645231832d28570cdd1a10b56b; ?>
<?php unset($__attributesOriginal5dd770645231832d28570cdd1a10b56b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5dd770645231832d28570cdd1a10b56b)): ?>
<?php $component = $__componentOriginal5dd770645231832d28570cdd1a10b56b; ?>
<?php unset($__componentOriginal5dd770645231832d28570cdd1a10b56b); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>

                <?php if (isset($component)) { $__componentOriginale5c310191d07e4b95ee54717daba2985 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5c310191d07e4b95ee54717daba2985 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Main'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarGroup::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-home','active' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Dashboard <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        Team
                         <?php $__env->slot('badge', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['size' => 'sm','color' => 'primary','shape' => 'pill'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>12 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-folder'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Projects <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-chart-bar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Analytics <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale5c310191d07e4b95ee54717daba2985)): ?>
<?php $attributes = $__attributesOriginale5c310191d07e4b95ee54717daba2985; ?>
<?php unset($__attributesOriginale5c310191d07e4b95ee54717daba2985); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale5c310191d07e4b95ee54717daba2985)): ?>
<?php $component = $__componentOriginale5c310191d07e4b95ee54717daba2985; ?>
<?php unset($__componentOriginale5c310191d07e4b95ee54717daba2985); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginale5c310191d07e4b95ee54717daba2985 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5c310191d07e4b95ee54717daba2985 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Workspace','collapsible' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarGroup::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','nested' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Recent Documents <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','nested' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        Media Files
                         <?php $__env->slot('badge', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['size' => 'sm','color' => 'success','variant' => 'soft'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>8 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','nested' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Templates <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','nested' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Archive <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale5c310191d07e4b95ee54717daba2985)): ?>
<?php $attributes = $__attributesOriginale5c310191d07e4b95ee54717daba2985; ?>
<?php unset($__attributesOriginale5c310191d07e4b95ee54717daba2985); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale5c310191d07e4b95ee54717daba2985)): ?>
<?php $component = $__componentOriginale5c310191d07e4b95ee54717daba2985; ?>
<?php unset($__componentOriginale5c310191d07e4b95ee54717daba2985); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginale5c310191d07e4b95ee54717daba2985 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5c310191d07e4b95ee54717daba2985 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Admin','collapsible' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarGroup::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','nested' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>User Management <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','nested' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>View Users <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','nested' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add User <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','nested' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        Permissions
                         <?php $__env->slot('badge', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['size' => 'sm','color' => 'warning','variant' => 'soft'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>2 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale5c310191d07e4b95ee54717daba2985)): ?>
<?php $attributes = $__attributesOriginale5c310191d07e4b95ee54717daba2985; ?>
<?php unset($__attributesOriginale5c310191d07e4b95ee54717daba2985); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale5c310191d07e4b95ee54717daba2985)): ?>
<?php $component = $__componentOriginale5c310191d07e4b95ee54717daba2985; ?>
<?php unset($__componentOriginale5c310191d07e4b95ee54717daba2985); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginale5c310191d07e4b95ee54717daba2985 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5c310191d07e4b95ee54717daba2985 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Settings'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarGroup::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-cog-6-tooth'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Preferences <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-bell'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        Notifications
                         <?php $__env->slot('badge', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['size' => 'sm','color' => 'destructive','variant' => 'soft'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>3 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale5c310191d07e4b95ee54717daba2985)): ?>
<?php $attributes = $__attributesOriginale5c310191d07e4b95ee54717daba2985; ?>
<?php unset($__attributesOriginale5c310191d07e4b95ee54717daba2985); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale5c310191d07e4b95ee54717daba2985)): ?>
<?php $component = $__componentOriginale5c310191d07e4b95ee54717daba2985; ?>
<?php unset($__componentOriginale5c310191d07e4b95ee54717daba2985); ?>
<?php endif; ?>

                 <?php $__env->slot('footer', null, []); ?> 
                    <div class="space-y-1">
                        <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-question-mark-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Help & Support <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-arrow-right-start-on-rectangle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            Sign Out
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                    </div>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal28e8d7754f3f4f5cf45b38c536d4911e)): ?>
<?php $attributes = $__attributesOriginal28e8d7754f3f4f5cf45b38c536d4911e; ?>
<?php unset($__attributesOriginal28e8d7754f3f4f5cf45b38c536d4911e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal28e8d7754f3f4f5cf45b38c536d4911e)): ?>
<?php $component = $__componentOriginal28e8d7754f3f4f5cf45b38c536d4911e; ?>
<?php unset($__componentOriginal28e8d7754f3f4f5cf45b38c536d4911e); ?>
<?php endif; ?>

            
            <?php if (isset($component)) { $__componentOriginal7dc45db17bc41c13c67ba147257da08f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7dc45db17bc41c13c67ba147257da08f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\MainContent::resolve(['mobileHeader' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::main-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\MainContent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php $__env->slot('header', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginal1c1f08c356d18863448b7d61a885e4a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c1f08c356d18863448b7d61a885e4a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarToggle::resolve(['target' => 'main-sidebar','variant' => 'hamburger','icon' => 'heroicon-o-bars-2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarToggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c1f08c356d18863448b7d61a885e4a4)): ?>
<?php $attributes = $__attributesOriginal1c1f08c356d18863448b7d61a885e4a4; ?>
<?php unset($__attributesOriginal1c1f08c356d18863448b7d61a885e4a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c1f08c356d18863448b7d61a885e4a4)): ?>
<?php $component = $__componentOriginal1c1f08c356d18863448b7d61a885e4a4; ?>
<?php unset($__componentOriginal1c1f08c356d18863448b7d61a885e4a4); ?>
<?php endif; ?>

                    <div class="flex-1"></div>

                    
                    <?php if (isset($component)) { $__componentOriginal5dd770645231832d28570cdd1a10b56b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5dd770645231832d28570cdd1a10b56b = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Dropdown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Dropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'sm','initials' => 'JD'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Avatar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6)): ?>
<?php $attributes = $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6; ?>
<?php unset($__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal504085b8cf8f6696eba64b6eed9c17a6)): ?>
<?php $component = $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6; ?>
<?php unset($__componentOriginal504085b8cf8f6696eba64b6eed9c17a6); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                        <div class="py-1">
                            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['icon' => 'heroicon-o-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Profile <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['icon' => 'heroicon-o-cog-6-tooth'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Settings <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal7f8c8178514c8ba199d9d4ee9373e028 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.dropdown.separator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028)): ?>
<?php $attributes = $__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028; ?>
<?php unset($__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f8c8178514c8ba199d9d4ee9373e028)): ?>
<?php $component = $__componentOriginal7f8c8178514c8ba199d9d4ee9373e028; ?>
<?php unset($__componentOriginal7f8c8178514c8ba199d9d4ee9373e028); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['icon' => 'heroicon-o-arrow-right-start-on-rectangle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Sign Out <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $attributes = $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3)): ?>
<?php $component = $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3; ?>
<?php unset($__componentOriginale4479c27e39ad69bc5b371ea279eb7f3); ?>
<?php endif; ?>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5dd770645231832d28570cdd1a10b56b)): ?>
<?php $attributes = $__attributesOriginal5dd770645231832d28570cdd1a10b56b; ?>
<?php unset($__attributesOriginal5dd770645231832d28570cdd1a10b56b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5dd770645231832d28570cdd1a10b56b)): ?>
<?php $component = $__componentOriginal5dd770645231832d28570cdd1a10b56b; ?>
<?php unset($__componentOriginal5dd770645231832d28570cdd1a10b56b); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>

                <?php echo e($slot); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7dc45db17bc41c13c67ba147257da08f)): ?>
<?php $attributes = $__attributesOriginal7dc45db17bc41c13c67ba147257da08f; ?>
<?php unset($__attributesOriginal7dc45db17bc41c13c67ba147257da08f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7dc45db17bc41c13c67ba147257da08f)): ?>
<?php $component = $__componentOriginal7dc45db17bc41c13c67ba147257da08f; ?>
<?php unset($__componentOriginal7dc45db17bc41c13c67ba147257da08f); ?>
<?php endif; ?>

        
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
                // For development, always use a cache-busting timestamp
                $developmentPath = base_path("packages/strata-ui/resources/dist/strata-ui.iife.js");
                $publishedPath = public_path("vendor/strata-ui/strata-ui.iife.js");
                
                if (file_exists($developmentPath)) {
                    $version = time(); // Always fresh for development
                    $assetUrl = asset("vendor/strata-ui/strata-ui.iife.js") . "?v=" . $version;
                    echo "<!-- Strata UI Debug: Loading from development path -->";
                    echo "<script src=\"" . $assetUrl . "\" defer></script>";
                    echo "<script>console.log(\"Strata UI: Script loaded (dev mode) from " . $assetUrl . "\");</script>";
                } elseif (file_exists($publishedPath)) {
                    $version = filemtime($publishedPath);
                    $assetUrl = asset("vendor/strata-ui/strata-ui.iife.js") . "?v=" . $version;
                    echo "<!-- Strata UI Debug: Loading from published path -->";
                    echo "<script src=\"" . $assetUrl . "\" defer></script>";
                    echo "<script>console.log(\"Strata UI: Script loaded from " . $assetUrl . "\");</script>";
                } else {
                    echo "<!-- Strata UI: JavaScript bundle not found -->";
                    echo "<script>console.error(\"Strata UI: JavaScript bundle not found. Please run: php artisan vendor:publish --tag=strata-ui-assets\");</script>";
                }
            ?>
    </body>
</html>
<?php /**PATH C:\Users\chaab\Herd\strata\resources\views/components/layouts/sidebar-layout-example.blade.php ENDPATH**/ ?>