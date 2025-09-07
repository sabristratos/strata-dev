<div class="space-y-8">
    
    <div class="text-center space-y-4">
        <div class="flex items-center justify-center gap-4">
            <div class="flex-1 text-center">
                <h1 class="text-4xl font-bold tracking-tight">Modern Sidebar Layout</h1>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-sm text-muted-foreground">Theme:</span>
                <?php if (isset($component)) { $__componentOriginalfefe5dbf3b22960644eea9a713073a08 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfefe5dbf3b22960644eea9a713073a08 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dark-mode-toggle','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dark-mode-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfefe5dbf3b22960644eea9a713073a08)): ?>
<?php $attributes = $__attributesOriginalfefe5dbf3b22960644eea9a713073a08; ?>
<?php unset($__attributesOriginalfefe5dbf3b22960644eea9a713073a08); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfefe5dbf3b22960644eea9a713073a08)): ?>
<?php $component = $__componentOriginalfefe5dbf3b22960644eea9a713073a08; ?>
<?php unset($__componentOriginalfefe5dbf3b22960644eea9a713073a08); ?>
<?php endif; ?>
            </div>
        </div>
        <p class="text-xl text-muted-foreground">Clean, modern sidebar with badges and collapsible groups</p>
        <p class="text-muted-foreground">Enhanced with muted colors, bigger icons, and better typography</p>
    </div>

    
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
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-sparkles'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                <h3 class="font-semibold">Modern Design</h3>
            </div>
            <p class="text-sm text-muted-foreground">Muted colors, bigger icons (20px), and improved typography. Clean, professional appearance inspired by modern design trends.</p>
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
                <h3 class="font-semibold">Visual Hierarchy</h3>
            </div>
            <p class="text-sm text-muted-foreground">Collapsible groups with nested items create clear hierarchy. Nested items are smaller, indented, and without icons by default.</p>
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
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-bell-alert'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                <h3 class="font-semibold">Badge Support</h3>
            </div>
            <p class="text-sm text-muted-foreground">Built-in badge support for notifications, counts, and status indicators. Multiple variants and colors available.</p>
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
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="text-xl font-semibold">Layout Structure</h2>
         <?php $__env->endSlot(); ?>

        <div class="space-y-4">
            <p class="text-muted-foreground">This layout follows a simple pattern:</p>
            
            <div class="bg-muted/50 rounded-lg p-4 font-mono text-sm space-y-2">
                <div class="text-muted-foreground"></div>
                <div class="text-blue-600">&lt;div x-data="{ sidebarOpen: false }"&gt;</div>
                
                <div class="ml-4 space-y-1">
                    <div class="text-muted-foreground"></div>
                    <div class="text-green-600">&lt;x-strata::sidebar class="hidden lg:block" /&gt;</div>
                </div>
                
                <div class="ml-4 space-y-1">
                    <div class="text-muted-foreground"></div>
                    <div class="text-purple-600">&lt;div class="flex-1"&gt;</div>
                    <div class="ml-4 space-y-1">
                        <div class="text-orange-600">&lt;header class="lg:hidden"&gt; </div>
                        <div class="text-teal-600">&lt;main&gt;  &lt;/main&gt;</div>
                    </div>
                    <div class="text-purple-600">&lt;/div&gt;</div>
                </div>
                
                <div class="text-blue-600">&lt;/div&gt;</div>
            </div>
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
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="text-xl font-semibold">Interactive Demo</h2>
         <?php $__env->endSlot(); ?>

        <div class="space-y-4">
            <p class="text-muted-foreground">Try the sidebar controls:</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$strata.sidebar(\'main-sidebar\').show()','class' => 'w-full']); ?>
                    Show Sidebar
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$strata.sidebar(\'main-sidebar\').hide()','class' => 'w-full']); ?>
                    Hide Sidebar
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$strata.sidebar(\'main-sidebar\').toggle()','class' => 'w-full']); ?>
                    Toggle Sidebar
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
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="text-xl font-semibold">Modern Features</h2>
         <?php $__env->endSlot(); ?>

        <div class="space-y-6">
            
            <div class="space-y-3">
                <h3 class="font-medium">Navigation Badges</h3>
                <p class="text-sm text-muted-foreground mb-4">Add notifications, counts, and status indicators to navigation items:</p>
                
                <div class="bg-muted/30 rounded-lg p-4 space-y-2">
                    <div class="font-mono text-sm">
                        <span class="text-blue-600">&lt;x-strata::nav-item</span> <span class="text-green-600">icon="heroicon-o-users"</span><span class="text-blue-600">&gt;</span><br>
                        <span class="ml-4">Team</span><br>
                        <span class="ml-4 text-purple-600">&lt;x-slot name="badge"&gt;</span><br>
                        <span class="ml-8 text-orange-600">&lt;x-strata::badge size="sm" color="primary"&gt;12&lt;/x-strata::badge&gt;</span><br>
                        <span class="ml-4 text-purple-600">&lt;/x-slot&gt;</span><br>
                        <span class="text-blue-600">&lt;/x-strata::nav-item&gt;</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-background border rounded-lg p-3">
                        <div class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md bg-muted text-foreground shadow-sm">
                            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 flex-shrink-0']); ?>
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
                            <span class="flex-1">Team</span>
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
                        </div>
                    </div>
                    <div class="bg-background border rounded-lg p-3">
                        <div class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md text-muted-foreground hover:text-foreground hover:bg-muted/60">
                            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-bell'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 flex-shrink-0']); ?>
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
                            <span class="flex-1">Alerts</span>
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
                        </div>
                    </div>
                    <div class="bg-background border rounded-lg p-3">
                        <div class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md text-muted-foreground hover:text-foreground hover:bg-muted/60">
                            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-photo'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 flex-shrink-0']); ?>
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
                            <span class="flex-1">Media</span>
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
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="space-y-3">
                <h3 class="font-medium">Collapsible Groups & Nested Items</h3>
                <p class="text-sm text-muted-foreground mb-4">Create visual hierarchy with collapsible groups and nested navigation items:</p>
                
                <div class="bg-muted/30 rounded-lg p-4 space-y-2">
                    <div class="font-mono text-sm">
                        <span class="text-blue-600">&lt;x-strata::sidebar-group</span> <span class="text-green-600">label="Admin"</span> <span class="text-green-600">collapsible</span><span class="text-blue-600">&gt;</span><br>
                        <span class="ml-4 text-orange-600">&lt;x-strata::nav-item icon="heroicon-o-users"&gt;User Management&lt;/x-strata::nav-item&gt;</span><br>
                        <span class="ml-4 text-purple-600">&lt;x-strata::nav-item nested&gt;View Users&lt;/x-strata::nav-item&gt;</span><br>
                        <span class="ml-4 text-purple-600">&lt;x-strata::nav-item nested&gt;Add User&lt;/x-strata::nav-item&gt;</span><br>
                        <span class="text-blue-600">&lt;/x-strata::sidebar-group&gt;</span>
                    </div>
                </div>

                <div class="bg-background border rounded-lg p-4 space-y-4">
                    <div class="text-xs font-medium text-muted-foreground/80 uppercase tracking-wide px-3 py-2 cursor-pointer hover:text-muted-foreground/90 transition-colors duration-200 flex items-center justify-between focus:outline-none">
                        <span>Admin</span>
                        <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-chevron-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 transition-transform duration-200']); ?>
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
                    <div class="space-y-0.5">
                        
                        <div class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md text-muted-foreground hover:text-foreground hover:bg-muted/60">
                            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 flex-shrink-0']); ?>
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
                            <span class="flex-1">User Management</span>
                        </div>
                        
                        <div class="flex items-center gap-3 px-3 pl-8 py-2 text-sm font-normal rounded-md text-muted-foreground/70 hover:text-foreground hover:bg-muted/40">
                            <span class="flex-1">View Users</span>
                        </div>
                        <div class="flex items-center gap-3 px-3 pl-8 py-2 text-sm font-normal rounded-md text-muted-foreground/70 hover:text-foreground hover:bg-muted/40">
                            <span class="flex-1">Add User</span>
                        </div>
                        <div class="flex items-center gap-3 px-3 pl-8 py-2 text-sm font-normal rounded-md text-muted-foreground/70 hover:text-foreground hover:bg-muted/40">
                            <span class="flex-1">Permissions</span>
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
                        </div>
                    </div>
                </div>
            </div>
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
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="text-xl font-semibold">Separator Component</h2>
         <?php $__env->endSlot(); ?>

        <div class="space-y-6">
            <div class="space-y-3">
                <h3 class="font-medium">Flexible Visual Separation</h3>
                <p class="text-sm text-muted-foreground">Replace hard-coded borders with a flexible separator component that offers consistent styling and spacing options.</p>
                
                <div class="bg-muted/30 rounded-lg p-4 space-y-4">
                    <div class="space-y-2">
                        <p class="text-sm font-medium">Basic Separator</p>
                        <?php if (isset($component)) { $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Separator::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Separator::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $attributes = $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $component = $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
                        <p class="text-sm text-muted-foreground">Default horizontal separator</p>
                    </div>
                    
                    <div class="space-y-2">
                        <p class="text-sm font-medium">With Different Variants</p>
                        <?php if (isset($component)) { $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Separator::resolve(['variant' => 'subtle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Separator::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $attributes = $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $component = $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
                        <p class="text-sm text-muted-foreground">Subtle variant</p>
                        <?php if (isset($component)) { $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Separator::resolve(['variant' => 'strong'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Separator::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $attributes = $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $component = $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
                        <p class="text-sm text-muted-foreground">Strong variant</p>
                    </div>
                    
                    <div class="space-y-2">
                        <p class="text-sm font-medium">With Custom Spacing</p>
                        <?php if (isset($component)) { $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Separator::resolve(['spacing' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Separator::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $attributes = $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $component = $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
                        <p class="text-sm text-muted-foreground">Small spacing</p>
                        <?php if (isset($component)) { $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Separator::resolve(['spacing' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Separator::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $attributes = $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $component = $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
                        <p class="text-sm text-muted-foreground">Large spacing</p>
                    </div>
                    
                    <div class="space-y-2">
                        <p class="text-sm font-medium">With Labels</p>
                        <?php if (isset($component)) { $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Separator::resolve(['label' => 'Account Settings'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Separator::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $attributes = $__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__attributesOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d)): ?>
<?php $component = $__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d; ?>
<?php unset($__componentOriginal1c02549001f52ad9dc1933c7ca5d7f4d); ?>
<?php endif; ?>
                        <p class="text-sm text-muted-foreground">Separator with section label</p>
                    </div>
                </div>
                
                <div class="bg-background border rounded-lg p-4">
                    <div class="font-mono text-sm space-y-2">
                        <div><span class="text-blue-600">&lt;x-strata::separator /&gt;</span> <span class="text-gray-600"></span></div>
                        <div><span class="text-blue-600">&lt;x-strata::separator</span> <span class="text-green-600">variant="subtle"</span> <span class="text-green-600">spacing="lg"</span> <span class="text-blue-600">/&gt;</span></div>
                        <div><span class="text-blue-600">&lt;x-strata::separator</span> <span class="text-green-600">label="Settings"</span> <span class="text-blue-600">/&gt;</span></div>
                    </div>
                </div>
            </div>
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
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="text-xl font-semibold">How to Use</h2>
         <?php $__env->endSlot(); ?>

        <div class="space-y-4">
            <div class="space-y-2">
                <h3 class="font-medium">1. Copy the Layout</h3>
                <p class="text-sm text-muted-foreground">
                    Copy <code class="bg-muted px-1 py-0.5 rounded text-xs">resources/views/components/layouts/sidebar-layout-example.blade.php</code> 
                    to your own layout file.
                </p>
            </div>
            
            <div class="space-y-2">
                <h3 class="font-medium">2. Add Modern Features</h3>
                <ul class="text-sm text-muted-foreground space-y-1">
                    <li>• <strong>Badges:</strong> Use <code class="bg-muted px-1 py-0.5 rounded text-xs">&lt;x-slot name="badge"&gt;</code> in nav-items</li>
                    <li>• <strong>Collapsible Groups:</strong> Add <code class="bg-muted px-1 py-0.5 rounded text-xs">collapsible</code> prop to sidebar-group</li>
                    <li>• <strong>Nested Items:</strong> Add <code class="bg-muted px-1 py-0.5 rounded text-xs">nested</code> prop for smaller, indented items</li>
                    <li>• <strong>Separators:</strong> Use <code class="bg-muted px-1 py-0.5 rounded text-xs">&lt;x-strata::separator /&gt;</code> instead of borders</li>
                    <li>• <strong>Modern Styling:</strong> Automatic muted colors and improved typography</li>
                </ul>
            </div>
            
            <div class="space-y-2">
                <h3 class="font-medium">3. Customize & Integrate</h3>
                <p class="text-sm text-muted-foreground">
                    Use the <code class="bg-muted px-1 py-0.5 rounded text-xs">#[Layout('your-layout')]</code> 
                    attribute in your Livewire components or extend the layout in Blade views.
                </p>
            </div>
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
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="text-xl font-semibold">Sample Components</h2>
         <?php $__env->endSlot(); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <h3 class="font-medium">Form Elements</h3>
                
                <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'sample_name','label' => 'Name','placeholder' => 'Enter your name','icon' => 'heroicon-o-user'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = Strata\UI\View\Components\Form\Select::resolve(['name' => 'sample_role','label' => 'Role','items' => ['admin' => 'Administrator', 'user' => 'User', 'guest' => 'Guest']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = Strata\UI\View\Components\Form\Toggle::resolve(['name' => 'sample_notifications','label' => 'Enable notifications'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                <h3 class="font-medium">UI Elements</h3>
                
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
                </div>
                
                <?php if (isset($component)) { $__componentOriginal81ef7dc34f829de905609903fa8828c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81ef7dc34f829de905609903fa8828c7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Rating::resolve(['name' => 'sample_rating','label' => 'Rating','max' => 5] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                </div>
            </div>
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

    
    <div class="text-center py-8 border-t">
        <p class="text-muted-foreground">
            Modern sidebar layout with badges and collapsible groups - clean, flexible, and ready to customize
        </p>
    </div>
</div><?php /**PATH C:\Users\chaab\Herd\strata-dev\resources\views/livewire/sidebar-demo-simple.blade.php ENDPATH**/ ?>