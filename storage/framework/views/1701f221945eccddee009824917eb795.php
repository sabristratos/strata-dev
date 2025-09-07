<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginal8272e33b86809dab1af1162d6134e437 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8272e33b86809dab1af1162d6134e437 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\AppLayout::resolve(['sidebarName' => 'demo-sidebar','sidebarVariant' => 'overlay','sidebarWidth' => 'w-80','sidebarPosition' => 'left','sidebarSticky' => true,'sidebarStashable' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
     <?php $__env->slot('sidebar', null, []); ?> 
         <?php $__env->slot('header', null, []); ?> 
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-primary-foreground font-bold text-sm">S</span>
                </div>
                <div>
                    <div class="font-semibold">Strata UI</div>
                    <div class="text-sm text-muted-foreground">Demo Application</div>
                </div>
            </div>
         <?php $__env->endSlot(); ?>

        <?php if (isset($component)) { $__componentOriginale5c310191d07e4b95ee54717daba2985 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5c310191d07e4b95ee54717daba2985 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Navigation'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarGroup::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '/','icon' => 'heroicon-o-home','active' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Demo Home <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '/sidebar-demo','icon' => 'heroicon-o-squares-2x2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Sidebar Demo <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-document-text'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Documentation <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-code-bracket'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Components <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Examples','collapsible' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarGroup::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#overlay','icon' => 'heroicon-o-rectangle-stack'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Overlay Sidebar <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#push','icon' => 'heroicon-o-arrows-right-left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Push Content <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#fixed','icon' => 'heroicon-o-bars-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Fixed Sidebar <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#responsive','icon' => 'heroicon-o-device-phone-mobile'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Responsive <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes([]); ?>Notifications <?php echo $__env->renderComponent(); ?>
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
            <div class="flex items-center gap-2">
                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex-1']); ?>
                    <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-arrow-right-start-on-rectangle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 mr-2']); ?>
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
                    Sign Out
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
            </div>
         <?php $__env->endSlot(); ?>
     <?php $__env->endSlot(); ?>

    
     <?php $__env->slot('headerActions', null, []); ?> 
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

    
     <?php $__env->slot('main', null, []); ?> 
        <?php if (isset($component)) { $__componentOriginal46ea0da376379bc29d114d13c33d8a8b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal46ea0da376379bc29d114d13c33d8a8b = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Main::resolve(['padding' => 'lg','maxWidth' => '7xl','centerContent' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Main::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <div class="space-y-8">
                
                <div class="text-center space-y-4">
                    <h1 class="text-4xl font-bold tracking-tight">New App Layout System</h1>
                    <p class="text-xl text-muted-foreground">Flux UI inspired layout components for Strata UI</p>
                    <p class="text-muted-foreground">Structured layouts with sidebar, header, and main content areas</p>
                </div>

                
                <?php if (isset($component)) { $__componentOriginal45c15a36da19b674c97ad63191637c4f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45c15a36da19b674c97ad63191637c4f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Section::resolve(['width' => 'full','padding' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Section::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-card/50 rounded-lg border']); ?>
                    <h2 class="text-2xl font-bold mb-6">Layout Features</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-device-phone-mobile'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-primary']); ?>
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
                                </div>
                                <h3 class="font-semibold">Mobile First</h3>
                            </div>
                            <p class="text-sm text-muted-foreground">Responsive design with mobile header and collapsible sidebar. Adapts perfectly to all screen sizes.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal825452dccd8b981c2091740207496798)): ?>
<?php $attributes = $__attributesOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__attributesOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal825452dccd8b981c2091740207496798)): ?>
<?php $component = $__componentOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__componentOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-squares-2x2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-accent']); ?>
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
                                </div>
                                <h3 class="font-semibold">Flexible Layout</h3>
                            </div>
                            <p class="text-sm text-muted-foreground">Multiple sidebar variants: overlay, push, fixed. Choose the best fit for your application needs.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal825452dccd8b981c2091740207496798)): ?>
<?php $attributes = $__attributesOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__attributesOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal825452dccd8b981c2091740207496798)): ?>
<?php $component = $__componentOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__componentOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-success/10 rounded-lg flex items-center justify-center">
                                    <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-code-bracket'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-success']); ?>
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
                                </div>
                                <h3 class="font-semibold">Developer Friendly</h3>
                            </div>
                            <p class="text-sm text-muted-foreground">Clean component API with slots and props. Easy to integrate with existing Strata UI components.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal825452dccd8b981c2091740207496798)): ?>
<?php $attributes = $__attributesOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__attributesOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal825452dccd8b981c2091740207496798)): ?>
<?php $component = $__componentOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__componentOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45c15a36da19b674c97ad63191637c4f)): ?>
<?php $attributes = $__attributesOriginal45c15a36da19b674c97ad63191637c4f; ?>
<?php unset($__attributesOriginal45c15a36da19b674c97ad63191637c4f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45c15a36da19b674c97ad63191637c4f)): ?>
<?php $component = $__componentOriginal45c15a36da19b674c97ad63191637c4f; ?>
<?php unset($__componentOriginal45c15a36da19b674c97ad63191637c4f); ?>
<?php endif; ?>

                
                <?php if (isset($component)) { $__componentOriginal45c15a36da19b674c97ad63191637c4f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45c15a36da19b674c97ad63191637c4f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Section::resolve(['width' => 'full','padding' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Section::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-muted/30 rounded-lg']); ?>
                    <h2 class="text-2xl font-bold mb-6">Usage Example</h2>
                    
                    <div class="bg-background rounded-lg border p-6 font-mono text-sm overflow-x-auto">
                        <div class="text-muted-foreground"></div>
                        <div class="text-blue-600">&lt;x-strata::app-layout</div>
                        <div class="ml-4 text-green-600">sidebarName="main-sidebar"</div>
                        <div class="ml-4 text-green-600">sidebarVariant="overlay"</div>
                        <div class="ml-4 text-green-600">sidebarWidth="w-80"</div>
                        <div class="text-blue-600">&gt;</div>
                        
                        <div class="ml-2 mt-2">
                            <div class="text-muted-foreground"></div>
                            <div class="text-blue-600">&lt;x-slot:sidebar&gt;</div>
                            <div class="ml-4 text-gray-700">Navigation items, groups, footer...</div>
                            <div class="text-blue-600">&lt;/x-slot:sidebar&gt;</div>
                        </div>
                        
                        <div class="ml-2 mt-2">
                            <div class="text-muted-foreground"></div>
                            <div class="text-gray-700">Your page content here...</div>
                        </div>
                        
                        <div class="text-blue-600">&lt;/x-strata::app-layout&gt;</div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45c15a36da19b674c97ad63191637c4f)): ?>
<?php $attributes = $__attributesOriginal45c15a36da19b674c97ad63191637c4f; ?>
<?php unset($__attributesOriginal45c15a36da19b674c97ad63191637c4f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45c15a36da19b674c97ad63191637c4f)): ?>
<?php $component = $__componentOriginal45c15a36da19b674c97ad63191637c4f; ?>
<?php unset($__componentOriginal45c15a36da19b674c97ad63191637c4f); ?>
<?php endif; ?>

                
                <?php if (isset($component)) { $__componentOriginal45c15a36da19b674c97ad63191637c4f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45c15a36da19b674c97ad63191637c4f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Section::resolve(['width' => 'full','padding' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Section::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-card/30 rounded-lg border']); ?>
                    <h2 class="text-2xl font-bold mb-6">Interactive Controls</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h3 class="font-semibold mb-4">Sidebar Controls</h3>
                            <div class="space-y-3">
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$strata.sidebar(\'demo-sidebar\').show()','class' => 'w-full']); ?>
                                    Show Sidebar (Alpine.js)
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                                
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$strata.sidebar(\'demo-sidebar\').hide()','class' => 'w-full']); ?>
                                    Hide Sidebar (Alpine.js)
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                                
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onclick' => 'Strata.sidebar(\'demo-sidebar\').toggle()','class' => 'w-full']); ?>
                                    Toggle Sidebar (Vanilla JS)
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal825452dccd8b981c2091740207496798)): ?>
<?php $attributes = $__attributesOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__attributesOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal825452dccd8b981c2091740207496798)): ?>
<?php $component = $__componentOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__componentOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h3 class="font-semibold mb-4">Toast Notifications</h3>
                            <div class="space-y-3">
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$strata.toast({ title: \'Success!\', message: \'Layout is working perfectly\', type: \'success\' })','class' => 'w-full']); ?>
                                    Success Toast
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                                
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$strata.toast({ title: \'Info\', message: \'This is an information message\', type: \'info\' })','class' => 'w-full']); ?>
                                    Info Toast
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                                
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onclick' => 'Strata.toast({ title: \'Warning\', message: \'Vanilla JS API also works\', type: \'warning\' })','class' => 'w-full']); ?>
                                    Warning Toast (Vanilla JS)
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal825452dccd8b981c2091740207496798)): ?>
<?php $attributes = $__attributesOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__attributesOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal825452dccd8b981c2091740207496798)): ?>
<?php $component = $__componentOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__componentOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45c15a36da19b674c97ad63191637c4f)): ?>
<?php $attributes = $__attributesOriginal45c15a36da19b674c97ad63191637c4f; ?>
<?php unset($__attributesOriginal45c15a36da19b674c97ad63191637c4f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45c15a36da19b674c97ad63191637c4f)): ?>
<?php $component = $__componentOriginal45c15a36da19b674c97ad63191637c4f; ?>
<?php unset($__componentOriginal45c15a36da19b674c97ad63191637c4f); ?>
<?php endif; ?>

                
                <?php if (isset($component)) { $__componentOriginal45c15a36da19b674c97ad63191637c4f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45c15a36da19b674c97ad63191637c4f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Section::resolve(['width' => 'full','padding' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Section::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-gradient-to-r from-primary/5 to-accent/5 rounded-lg border']); ?>
                    <h2 class="text-2xl font-bold mb-6">Integrated Components</h2>
                    <p class="text-muted-foreground mb-6">All Strata UI components work seamlessly within the new layout system</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold">Form Components</h3>
                            
                            <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'demo_name','label' => 'Full Name','placeholder' => 'Enter your name','icon' => 'heroicon-o-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaa9034dc736171512fb8afa189c2f088)): ?>
<?php $attributes = $__attributesOriginalaa9034dc736171512fb8afa189c2f088; ?>
<?php unset($__attributesOriginalaa9034dc736171512fb8afa189c2f088); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9034dc736171512fb8afa189c2f088)): ?>
<?php $component = $__componentOriginalaa9034dc736171512fb8afa189c2f088; ?>
<?php unset($__componentOriginalaa9034dc736171512fb8afa189c2f088); ?>
<?php endif; ?>
                            
                            <?php if (isset($component)) { $__componentOriginalc28cfd578380eacc90c0e586eaf6f35e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc28cfd578380eacc90c0e586eaf6f35e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Select::resolve(['name' => 'demo_role','label' => 'Role','items' => ['developer' => 'Developer', 'designer' => 'Designer', 'manager' => 'Manager'],'placeholder' => 'Select your role'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Select::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc28cfd578380eacc90c0e586eaf6f35e)): ?>
<?php $attributes = $__attributesOriginalc28cfd578380eacc90c0e586eaf6f35e; ?>
<?php unset($__attributesOriginalc28cfd578380eacc90c0e586eaf6f35e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc28cfd578380eacc90c0e586eaf6f35e)): ?>
<?php $component = $__componentOriginalc28cfd578380eacc90c0e586eaf6f35e; ?>
<?php unset($__componentOriginalc28cfd578380eacc90c0e586eaf6f35e); ?>
<?php endif; ?>
                            
                            <?php if (isset($component)) { $__componentOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Toggle::resolve(['name' => 'demo_notifications','label' => 'Enable notifications','description' => 'Receive updates about new features'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Toggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3d7d42cbbce4608bbe86aa8090faf9)): ?>
<?php $attributes = $__attributesOriginal7c3d7d42cbbce4608bbe86aa8090faf9; ?>
<?php unset($__attributesOriginal7c3d7d42cbbce4608bbe86aa8090faf9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3d7d42cbbce4608bbe86aa8090faf9)): ?>
<?php $component = $__componentOriginal7c3d7d42cbbce4608bbe86aa8090faf9; ?>
<?php unset($__componentOriginal7c3d7d42cbbce4608bbe86aa8090faf9); ?>
<?php endif; ?>
                        </div>
                        
                        
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold">Interactive Elements</h3>
                            
                            <div class="flex flex-wrap gap-2">
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'primary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Primary <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'success'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Success <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'warning'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Warning <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'info'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Info <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                            </div>
                            
                            <?php if (isset($component)) { $__componentOriginal81ef7dc34f829de905609903fa8828c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81ef7dc34f829de905609903fa8828c7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Rating::resolve(['name' => 'demo_rating','label' => 'Rate this layout','max' => 5,'description' => 'How do you like the new layout system?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Rating::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81ef7dc34f829de905609903fa8828c7)): ?>
<?php $attributes = $__attributesOriginal81ef7dc34f829de905609903fa8828c7; ?>
<?php unset($__attributesOriginal81ef7dc34f829de905609903fa8828c7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81ef7dc34f829de905609903fa8828c7)): ?>
<?php $component = $__componentOriginal81ef7dc34f829de905609903fa8828c7; ?>
<?php unset($__componentOriginal81ef7dc34f829de905609903fa8828c7); ?>
<?php endif; ?>
                            
                            <div class="flex gap-2">
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'primary','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Primary <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Outline <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Ghost <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45c15a36da19b674c97ad63191637c4f)): ?>
<?php $attributes = $__attributesOriginal45c15a36da19b674c97ad63191637c4f; ?>
<?php unset($__attributesOriginal45c15a36da19b674c97ad63191637c4f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45c15a36da19b674c97ad63191637c4f)): ?>
<?php $component = $__componentOriginal45c15a36da19b674c97ad63191637c4f; ?>
<?php unset($__componentOriginal45c15a36da19b674c97ad63191637c4f); ?>
<?php endif; ?>

                
                <footer class="text-center py-8 border-t">
                    <p class="text-muted-foreground">
                        Built with Strata UI - New App Layout System inspired by Flux UI
                    </p>
                </footer>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal46ea0da376379bc29d114d13c33d8a8b)): ?>
<?php $attributes = $__attributesOriginal46ea0da376379bc29d114d13c33d8a8b; ?>
<?php unset($__attributesOriginal46ea0da376379bc29d114d13c33d8a8b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal46ea0da376379bc29d114d13c33d8a8b)): ?>
<?php $component = $__componentOriginal46ea0da376379bc29d114d13c33d8a8b; ?>
<?php unset($__componentOriginal46ea0da376379bc29d114d13c33d8a8b); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8272e33b86809dab1af1162d6134e437)): ?>
<?php $attributes = $__attributesOriginal8272e33b86809dab1af1162d6134e437; ?>
<?php unset($__attributesOriginal8272e33b86809dab1af1162d6134e437); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8272e33b86809dab1af1162d6134e437)): ?>
<?php $component = $__componentOriginal8272e33b86809dab1af1162d6134e437; ?>
<?php unset($__componentOriginal8272e33b86809dab1af1162d6134e437); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.layouts.sidebar-app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\chaab\Herd\strata-dev\resources\views/livewire/sidebar-demo-new.blade.php ENDPATH**/ ?>