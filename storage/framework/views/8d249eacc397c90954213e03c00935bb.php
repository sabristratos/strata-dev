<?php if (isset($component)) { $__componentOriginal7dc45db17bc41c13c67ba147257da08f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7dc45db17bc41c13c67ba147257da08f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\MainContent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::main-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\MainContent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="container mx-auto space-y-16">
        
        <div class="text-center space-y-4">
            <div class="flex items-center justify-center gap-4">
                <div class="flex-1 text-center">
                    <h1 class="text-4xl font-bold">Strata UI Components</h1>
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
            <p class="text-xl text-muted-foreground">Complete Design System Demo</p>
            <p class="text-muted-foreground">Showcasing all available components with their variants and features</p>
        </div>

        
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Core UI Components</h2>
                <p class="text-muted-foreground">Essential building blocks for your interface</p>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Alerts</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'info','title' => 'Information'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        This is an informational message with auto-detected icon.
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'success','title' => 'Success','dismissible' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        Operation completed successfully! This alert can be dismissed.
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'warning','title' => 'Warning','variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        Please review the following information carefully.
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'destructive','title' => 'Error','variant' => 'soft'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        An error occurred while processing your request.
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
                </div>
                <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'primary','title' => 'With Actions'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    This alert includes custom action buttons.
                     <?php $__env->slot('actions', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Learn More <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes([]); ?>Dismiss <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Avatars</h3>
                <div class="flex flex-wrap gap-4 items-end">
                    <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'xs','initials' => 'XS'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'sm','initials' => 'SM','status' => 'online','tooltip' => 'Sarah Miller - Online'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'md','initials' => 'MD','status' => 'away','tooltip' => 'Mark Davis - Away'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'lg','initials' => 'LG','status' => 'busy','tooltip' => 'Lisa Green - Busy'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'xl','initials' => 'XL','status' => 'offline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => '2xl','initials' => '2XL'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => '3xl','initials' => '3XL','shape' => 'square','border' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                </div>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Badges</h3>
                <div class="space-y-3">
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
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'accent'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Accent <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'destructive'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Error <?php echo $__env->renderComponent(); ?>
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
                    <div class="flex flex-wrap gap-2">
                        <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['variant' => 'outline','color' => 'primary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Outline <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Badge::resolve(['variant' => 'soft','color' => 'accent'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Soft <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Badge::resolve(['icon' => 'heroicon-o-star','color' => 'warning'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>With Icon <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Badge::resolve(['dismissible' => true,'color' => 'info'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Dismissible <?php echo $__env->renderComponent(); ?>
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

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Buttons</h3>
                <div class="space-y-3">
                    <div class="flex flex-wrap gap-3">
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'primary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'accent'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Accent <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'destructive'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Destructive <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'secondary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Secondary <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <div class="flex flex-wrap gap-3 items-center">
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Small <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Default <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Large <?php echo $__env->renderComponent(); ?>
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
                    <div class="flex flex-wrap gap-3">
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['icon' => 'heroicon-o-plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>With Icon <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['icon' => 'heroicon-o-arrow-right','iconPosition' => 'right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Icon Right <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['loading' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Loading... <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['disabled' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Disabled <?php echo $__env->renderComponent(); ?>
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
                    <div class="space-y-3">
                        <h4 class="font-medium">Buttons with Badges (Slot-based)</h4>
                        <div class="flex flex-wrap gap-3">
                            <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Messages
                                 <?php $__env->slot('badge', null, []); ?> 
                                    <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['size' => 'sm','color' => 'destructive'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component->withAttributes([]); ?>
                                Notifications
                                 <?php $__env->slot('badge', null, []); ?> 
                                    <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['size' => 'sm','color' => 'primary','shape' => 'square'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'secondary','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Cart
                                 <?php $__env->slot('badge', null, []); ?> 
                                    <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['size' => 'sm','color' => 'accent'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>99+ <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','icon' => 'heroicon-o-bell'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Alerts
                                 <?php $__env->slot('badge', null, []); ?> 
                                    <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['size' => 'sm','color' => 'warning'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>! <?php echo $__env->renderComponent(); ?>
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
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Toast</h3>
                <div class="flex flex-wrap gap-3">
                    <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showToast(\'success\')','color' => 'success']); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showToast(\'error\')','color' => 'destructive']); ?>
                        Error Toast
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
<?php $component->withAttributes(['wire:click' => 'showToast(\'warning\')','color' => 'warning']); ?>
                        Warning Toast
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
<?php $component->withAttributes(['wire:click' => 'showToast(\'info\')','color' => 'info']); ?>
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
                </div>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Cards</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
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
                        <h4 class="font-semibold mb-2">Default Card</h4>
                        <p class="text-muted-foreground">Basic card with default styling and medium padding.</p>
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
<?php $component = Strata\UI\View\Components\Card::resolve(['border' => 'primary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php $__env->slot('header', null, []); ?> 
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold">With Header</h4>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'primary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>New <?php echo $__env->renderComponent(); ?>
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
                         <?php $__env->endSlot(); ?>
                        <p class="text-muted-foreground">Card with header section and primary border.</p>
                         <?php $__env->slot('footer', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm','variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Action <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
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
<?php $component = Strata\UI\View\Components\Card::resolve(['size' => 'lg','border' => 'accent'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <h4 class="font-semibold mb-2">Large Card</h4>
                        <p class="text-muted-foreground">Larger padding with accent border for emphasis.</p>
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
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Section Layout</h3>
                <?php if (isset($component)) { $__componentOriginal45c15a36da19b674c97ad63191637c4f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45c15a36da19b674c97ad63191637c4f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Section::resolve(['width' => 'narrow','padding' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Section::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-muted/50 rounded-lg']); ?>
                    <h4 class="font-semibold">Narrow Section</h4>
                    <p class="text-muted-foreground">This section has narrow width constraint and large padding.</p>
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
<?php $component = Strata\UI\View\Components\Section::resolve(['width' => 'full','padding' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Section::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-accent/10 rounded-lg']); ?>
                    <h4 class="font-semibold">Full Width Section</h4>
                    <p class="text-muted-foreground">This section spans full width with small padding.</p>
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
            </div>
        </section>

        
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Form Components</h2>
                <p class="text-muted-foreground">Comprehensive form inputs with validation and features</p>
            </div>

            <form>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                <div class="space-y-6">
                    <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'email','type' => 'email','label' => 'Email Address','placeholder' => 'Enter your email','icon' => 'heroicon-o-envelope','clearable' => true,'required' => true,'description' => 'We\'ll never share your email with anyone else.'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                    <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['type' => 'password','name' => 'password','label' => 'Password','placeholder' => 'Enter your password','showPasswordToggle' => true,'required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                    <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'website','type' => 'url','label' => 'Website URL','placeholder' => 'example.com'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php $__env->slot('leading', null, []); ?> https:// <?php $__env->endSlot(); ?>
                         <?php $__env->slot('trailing', null, []); ?> .com <?php $__env->endSlot(); ?>
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

                    <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'price','type' => 'number','label' => 'Price','placeholder' => '0.00'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['min' => '0','step' => '0.01']); ?>
                         <?php $__env->slot('leading', null, []); ?> $ <?php $__env->endSlot(); ?>
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

                    <?php if (isset($component)) { $__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Textarea::resolve(['name' => 'bio','label' => 'Biography','placeholder' => 'Tell us about yourself...','rows' => '4','autoResize' => true,'description' => 'This textarea will automatically resize as you type.'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Textarea::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161)): ?>
<?php $attributes = $__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161; ?>
<?php unset($__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161)): ?>
<?php $component = $__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161; ?>
<?php unset($__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal6418b97f55a5794a8248d3feca4af550 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6418b97f55a5794a8248d3feca4af550 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Editor::resolve(['name' => 'content','placeholder' => 'Start typing your content here...','minHeight' => 200] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.editor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Editor::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Rich Text Content','description' => 'Rich text editor with formatting capabilities']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6418b97f55a5794a8248d3feca4af550)): ?>
<?php $attributes = $__attributesOriginal6418b97f55a5794a8248d3feca4af550; ?>
<?php unset($__attributesOriginal6418b97f55a5794a8248d3feca4af550); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6418b97f55a5794a8248d3feca4af550)): ?>
<?php $component = $__componentOriginal6418b97f55a5794a8248d3feca4af550; ?>
<?php unset($__componentOriginal6418b97f55a5794a8248d3feca4af550); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc28cfd578380eacc90c0e586eaf6f35e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc28cfd578380eacc90c0e586eaf6f35e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Select::resolve(['name' => 'country','label' => 'Country','placeholder' => 'Choose your country','searchable' => true,'clearable' => true,'items' => [
                            'us' => 'United States',
                            'ca' => 'Canada',
                            'uk' => 'United Kingdom',
                            'au' => 'Australia',
                            'de' => 'Germany',
                            'fr' => 'France',
                            'jp' => 'Japan',
                            'br' => 'Brazil',
                        ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                </div>

                
                <div class="space-y-6">
                    <?php if (isset($component)) { $__componentOriginalc28cfd578380eacc90c0e586eaf6f35e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc28cfd578380eacc90c0e586eaf6f35e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Select::resolve(['name' => 'skills','label' => 'Skills (Multiple)','placeholder' => 'Select your skills','multiple' => true,'searchable' => true,'maxSelections' => 5,'items' => [
                            'php' => 'PHP',
                            'js' => 'JavaScript',
                            'python' => 'Python',
                            'java' => 'Java',
                            'laravel' => 'Laravel',
                            'vue' => 'Vue.js',
                            'react' => 'React',
                            'tailwind' => 'Tailwind CSS',
                        ],'description' => 'Select up to 5 skills'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                    <?php if (isset($component)) { $__componentOriginal9ef7b43f6db2260eef68aed66a66b6ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ef7b43f6db2260eef68aed66a66b6ac = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\ColorPicker::resolve(['name' => 'primary_color','label' => 'Primary Brand Color','placeholder' => 'Choose primary color','format' => 'hex','brandColors' => true,'allowCustom' => true,'description' => 'Select or customize your primary brand color'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.color-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\ColorPicker::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ef7b43f6db2260eef68aed66a66b6ac)): ?>
<?php $attributes = $__attributesOriginal9ef7b43f6db2260eef68aed66a66b6ac; ?>
<?php unset($__attributesOriginal9ef7b43f6db2260eef68aed66a66b6ac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ef7b43f6db2260eef68aed66a66b6ac)): ?>
<?php $component = $__componentOriginal9ef7b43f6db2260eef68aed66a66b6ac; ?>
<?php unset($__componentOriginal9ef7b43f6db2260eef68aed66a66b6ac); ?>
<?php endif; ?>


                    <div class="space-y-4">
                        <?php if (isset($component)) { $__componentOriginal72d418d9f43ee71e56ab05c8b3423141 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72d418d9f43ee71e56ab05c8b3423141 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Checkbox::resolve(['name' => 'terms','id' => 'terms','value' => '1','label' => 'I agree to the Terms of Service','description' => 'Please read our terms before proceeding'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72d418d9f43ee71e56ab05c8b3423141)): ?>
<?php $attributes = $__attributesOriginal72d418d9f43ee71e56ab05c8b3423141; ?>
<?php unset($__attributesOriginal72d418d9f43ee71e56ab05c8b3423141); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72d418d9f43ee71e56ab05c8b3423141)): ?>
<?php $component = $__componentOriginal72d418d9f43ee71e56ab05c8b3423141; ?>
<?php unset($__componentOriginal72d418d9f43ee71e56ab05c8b3423141); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal72d418d9f43ee71e56ab05c8b3423141 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72d418d9f43ee71e56ab05c8b3423141 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Checkbox::resolve(['name' => 'newsletter','id' => 'newsletter','value' => '1','label' => 'Subscribe to newsletter'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72d418d9f43ee71e56ab05c8b3423141)): ?>
<?php $attributes = $__attributesOriginal72d418d9f43ee71e56ab05c8b3423141; ?>
<?php unset($__attributesOriginal72d418d9f43ee71e56ab05c8b3423141); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72d418d9f43ee71e56ab05c8b3423141)): ?>
<?php $component = $__componentOriginal72d418d9f43ee71e56ab05c8b3423141; ?>
<?php unset($__componentOriginal72d418d9f43ee71e56ab05c8b3423141); ?>
<?php endif; ?>
                    </div>

                    <div class="space-y-4">
                        <label class="text-sm font-medium">Preferred Contact Method</label>
                        <?php if (isset($component)) { $__componentOriginal535d531f0a1c77c176c45514045511de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal535d531f0a1c77c176c45514045511de = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Radio::resolve(['name' => 'contact','id' => 'contact_email','value' => 'email','label' => 'Email','description' => 'Receive updates via email'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal535d531f0a1c77c176c45514045511de)): ?>
<?php $attributes = $__attributesOriginal535d531f0a1c77c176c45514045511de; ?>
<?php unset($__attributesOriginal535d531f0a1c77c176c45514045511de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal535d531f0a1c77c176c45514045511de)): ?>
<?php $component = $__componentOriginal535d531f0a1c77c176c45514045511de; ?>
<?php unset($__componentOriginal535d531f0a1c77c176c45514045511de); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal535d531f0a1c77c176c45514045511de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal535d531f0a1c77c176c45514045511de = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Radio::resolve(['name' => 'contact','id' => 'contact_phone','value' => 'phone','label' => 'Phone','description' => 'Receive updates via phone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal535d531f0a1c77c176c45514045511de)): ?>
<?php $attributes = $__attributesOriginal535d531f0a1c77c176c45514045511de; ?>
<?php unset($__attributesOriginal535d531f0a1c77c176c45514045511de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal535d531f0a1c77c176c45514045511de)): ?>
<?php $component = $__componentOriginal535d531f0a1c77c176c45514045511de; ?>
<?php unset($__componentOriginal535d531f0a1c77c176c45514045511de); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal535d531f0a1c77c176c45514045511de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal535d531f0a1c77c176c45514045511de = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Radio::resolve(['name' => 'contact','id' => 'contact_sms','value' => 'sms','label' => 'SMS','description' => 'Receive updates via SMS'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal535d531f0a1c77c176c45514045511de)): ?>
<?php $attributes = $__attributesOriginal535d531f0a1c77c176c45514045511de; ?>
<?php unset($__attributesOriginal535d531f0a1c77c176c45514045511de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal535d531f0a1c77c176c45514045511de)): ?>
<?php $component = $__componentOriginal535d531f0a1c77c176c45514045511de; ?>
<?php unset($__componentOriginal535d531f0a1c77c176c45514045511de); ?>
<?php endif; ?>
                    </div>

                    <?php if (isset($component)) { $__componentOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Toggle::resolve(['name' => 'notifications','label' => 'Email Notifications','description' => 'Receive email notifications for updates'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                    <?php if (isset($component)) { $__componentOriginal81ef7dc34f829de905609903fa8828c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81ef7dc34f829de905609903fa8828c7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Rating::resolve(['name' => 'satisfaction','label' => 'Satisfaction Rating','description' => 'Rate your experience from 1-5 stars','max' => 5] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                    <?php if (isset($component)) { $__componentOriginalda57486be34e0326c539ee1aae2d1a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda57486be34e0326c539ee1aae2d1a3f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Datepicker::resolve(['name' => 'birth_date','label' => 'Birth Date','placeholder' => 'Select your birth date','description' => 'Single date selection','maxDate' => now()->format('Y-m-d')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Datepicker::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'birth_date']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda57486be34e0326c539ee1aae2d1a3f)): ?>
<?php $attributes = $__attributesOriginalda57486be34e0326c539ee1aae2d1a3f; ?>
<?php unset($__attributesOriginalda57486be34e0326c539ee1aae2d1a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda57486be34e0326c539ee1aae2d1a3f)): ?>
<?php $component = $__componentOriginalda57486be34e0326c539ee1aae2d1a3f; ?>
<?php unset($__componentOriginalda57486be34e0326c539ee1aae2d1a3f); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalda57486be34e0326c539ee1aae2d1a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda57486be34e0326c539ee1aae2d1a3f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Datepicker::resolve(['name' => 'event_dates','label' => 'Event Date Range','placeholder' => 'Select event dates','description' => 'Date range with presets','range' => true,'presets' => true,'minDate' => now()->format('Y-m-d'),'clearable' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Datepicker::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'event_dates']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda57486be34e0326c539ee1aae2d1a3f)): ?>
<?php $attributes = $__attributesOriginalda57486be34e0326c539ee1aae2d1a3f; ?>
<?php unset($__attributesOriginalda57486be34e0326c539ee1aae2d1a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda57486be34e0326c539ee1aae2d1a3f)): ?>
<?php $component = $__componentOriginalda57486be34e0326c539ee1aae2d1a3f; ?>
<?php unset($__componentOriginalda57486be34e0326c539ee1aae2d1a3f); ?>
<?php endif; ?>
                </div>
                </div>
            </form>
        </section>

        
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Advanced Components</h2>
                <p class="text-muted-foreground">Complex interactive components</p>
            </div>

            
            <div class="space-y-6">
                <h3 class="text-xl font-semibold">Accordion</h3>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Single Selection (Default)</h4>
                    <p class="text-sm text-muted-foreground">Only one item can be open at a time</p>
                    <?php if (isset($component)) { $__componentOriginalc727abfd89c568258679e307a777d06f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc727abfd89c568258679e307a777d06f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion::resolve(['type' => 'single','defaultValue' => 'item-1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-2xl']); ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'item-1','title' => 'What is Strata UI?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">Strata UI is a comprehensive Laravel component library built with Tailwind CSS and Alpine.js. It provides modern, accessible, and highly customizable components for building beautiful web applications.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'item-2','title' => 'How do I install it?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <div class="space-y-2">
                                <p class="text-muted-foreground">Installation is simple with Composer:</p>
                                <code class="block bg-muted p-2 rounded text-sm">composer require strata/ui</code>
                                <p class="text-muted-foreground">Then publish the assets and you're ready to go!</p>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'item-3','title' => 'Is it accessible?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <div class="space-y-3">
                                <p class="text-muted-foreground">Yes! Strata UI components are built with accessibility in mind:</p>
                                <ul class="space-y-1 text-sm text-muted-foreground ml-4">
                                    <li>• Full ARIA support</li>
                                    <li>• Keyboard navigation</li>
                                    <li>• Screen reader compatibility</li>
                                    <li>• Focus management</li>
                                </ul>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $attributes = $__attributesOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__attributesOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $component = $__componentOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__componentOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
                </div>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Multiple Selection</h4>
                    <p class="text-sm text-muted-foreground">Multiple items can be open simultaneously</p>
                    <?php if (isset($component)) { $__componentOriginalc727abfd89c568258679e307a777d06f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc727abfd89c568258679e307a777d06f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion::resolve(['type' => 'multiple','defaultValue' => ['faq-1', 'faq-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-2xl']); ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'faq-1','title' => 'Can I customize the styling?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">Absolutely! All components are built with Tailwind CSS and can be easily customized through CSS classes, variants, and configuration options.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'faq-2','title' => 'Does it work with Livewire?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">Yes, Strata UI components are designed to work seamlessly with Livewire, including two-way data binding and reactive updates.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'faq-3','title' => 'What about Alpine.js integration?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">All interactive components use Alpine.js for client-side functionality, providing smooth animations and responsive interactions.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'faq-4','title' => 'Is there TypeScript support?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">While the components themselves are built with PHP and JavaScript, they work perfectly with TypeScript projects and provide proper type definitions.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $attributes = $__attributesOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__attributesOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $component = $__componentOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__componentOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
                </div>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Bordered Variant</h4>
                    <p class="text-sm text-muted-foreground">Contained style with borders</p>
                    <?php if (isset($component)) { $__componentOriginalc727abfd89c568258679e307a777d06f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc727abfd89c568258679e307a777d06f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion::resolve(['variant' => 'bordered','size' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-2xl']); ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'feature-1','title' => 'Advanced Components'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">Includes complex components like carousels, calendars, modals, and data tables with full customization options.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'feature-2','title' => 'Form Components'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">Complete form component suite including inputs, selects, checkboxes, file uploads, and validation support.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'feature-3','title' => 'Layout Components','disabled' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">This item is disabled to demonstrate the disabled state functionality.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $attributes = $__attributesOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__attributesOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $component = $__componentOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__componentOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
                </div>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Flush Variant (No Borders)</h4>
                    <p class="text-sm text-muted-foreground">Clean style without borders or background</p>
                    <?php if (isset($component)) { $__componentOriginalc727abfd89c568258679e307a777d06f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc727abfd89c568258679e307a777d06f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion::resolve(['variant' => 'flush','iconPosition' => 'start'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-2xl']); ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'tip-1','title' => 'Performance Optimization'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">Built with modern CSS techniques like scroll-snap for optimal performance across all devices.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'tip-2','title' => 'Developer Experience'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">Intuitive API design with sensible defaults and comprehensive documentation.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'tip-3','title' => 'Browser Support'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground">Compatible with all modern browsers and gracefully degrades on older ones.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $attributes = $__attributesOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__attributesOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $component = $__componentOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__componentOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
                </div>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Filled Variant</h4>
                    <p class="text-sm text-muted-foreground">Filled background style</p>
                    <?php if (isset($component)) { $__componentOriginalc727abfd89c568258679e307a777d06f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc727abfd89c568258679e307a777d06f = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion::resolve(['variant' => 'filled','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-2xl']); ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'compact-1','title' => 'Compact Design'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground text-sm">Perfect for dense layouts with small size option.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'compact-2','title' => 'Responsive'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground text-sm">Works beautifully on mobile, tablet, and desktop.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Accordion\Item::resolve(['value' => 'compact-3','title' => 'Customizable'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::accordion.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Accordion\Item::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <p class="text-muted-foreground text-sm">Easy to customize with Tailwind classes and variants.</p>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $attributes = $__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__attributesOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff)): ?>
<?php $component = $__componentOriginal8d20d228acc2f9d0f90b78188f7911ff; ?>
<?php unset($__componentOriginal8d20d228acc2f9d0f90b78188f7911ff); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $attributes = $__attributesOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__attributesOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc727abfd89c568258679e307a777d06f)): ?>
<?php $component = $__componentOriginalc727abfd89c568258679e307a777d06f; ?>
<?php unset($__componentOriginalc727abfd89c568258679e307a777d06f); ?>
<?php endif; ?>
                </div>
            </div>



            
            <div class="space-y-6">
                <h3 class="text-xl font-semibold">Tabs</h3>

                
                <?php if (isset($component)) { $__componentOriginal3b96afb1fa59af2c1fedde4927520775 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b96afb1fa59af2c1fedde4927520775 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs::resolve(['defaultValue' => 'overview'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-4xl']); ?>
                    <?php if (isset($component)) { $__componentOriginal6ffad6dcfbba29cf40165f6cf6f03fd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ffad6dcfbba29cf40165f6cf6f03fd4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.tabs.list','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Trigger::resolve(['value' => 'overview'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Overview <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $attributes = $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $component = $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Trigger::resolve(['value' => 'features'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Features <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $attributes = $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $component = $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Trigger::resolve(['value' => 'settings'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Settings <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $attributes = $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $component = $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Trigger::resolve(['value' => 'disabled','disabled' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Disabled <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $attributes = $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $component = $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ffad6dcfbba29cf40165f6cf6f03fd4)): ?>
<?php $attributes = $__attributesOriginal6ffad6dcfbba29cf40165f6cf6f03fd4; ?>
<?php unset($__attributesOriginal6ffad6dcfbba29cf40165f6cf6f03fd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ffad6dcfbba29cf40165f6cf6f03fd4)): ?>
<?php $component = $__componentOriginal6ffad6dcfbba29cf40165f6cf6f03fd4; ?>
<?php unset($__componentOriginal6ffad6dcfbba29cf40165f6cf6f03fd4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal50cb7812082ef877cd849db4ce0491a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal50cb7812082ef877cd849db4ce0491a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Content::resolve(['value' => 'overview'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Content::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 bg-card rounded-lg border']); ?>
                        <h4 class="font-semibold mb-3">Overview</h4>
                        <p class="text-muted-foreground mb-4">This is the overview tab content with default styling.</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-primary">1,234</div>
                                    <div class="text-sm text-muted-foreground">Total Users</div>
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
<?php $component = Strata\UI\View\Components\Card::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-accent">89%</div>
                                    <div class="text-sm text-muted-foreground">Success Rate</div>
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
<?php $component = Strata\UI\View\Components\Card::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-success">$12.5K</div>
                                    <div class="text-sm text-muted-foreground">Revenue</div>
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
<?php if (isset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $attributes = $__attributesOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $component = $__componentOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__componentOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal50cb7812082ef877cd849db4ce0491a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal50cb7812082ef877cd849db4ce0491a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Content::resolve(['value' => 'features'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Content::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 bg-card rounded-lg border']); ?>
                        <h4 class="font-semibold mb-3">Features</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span>Keyboard Navigation</span>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'success'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Available <?php echo $__env->renderComponent(); ?>
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
                            <div class="flex items-center justify-between">
                                <span>ARIA Accessibility</span>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'success'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Available <?php echo $__env->renderComponent(); ?>
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
                            <div class="flex items-center justify-between">
                                <span>Multiple Variants</span>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'success'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Available <?php echo $__env->renderComponent(); ?>
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
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $attributes = $__attributesOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $component = $__componentOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__componentOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal50cb7812082ef877cd849db4ce0491a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal50cb7812082ef877cd849db4ce0491a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Content::resolve(['value' => 'settings'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Content::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 bg-card rounded-lg border']); ?>
                        <h4 class="font-semibold mb-3">Settings</h4>
                        <div class="space-y-4">
                            <?php if (isset($component)) { $__componentOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Toggle::resolve(['name' => 'auto_save','label' => 'Auto-save changes','description' => 'Automatically save changes as you work'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                            <?php if (isset($component)) { $__componentOriginalc28cfd578380eacc90c0e586eaf6f35e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc28cfd578380eacc90c0e586eaf6f35e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Select::resolve(['name' => 'theme','label' => 'Theme','items' => [
                                    'light' => 'Light',
                                    'dark' => 'Dark',
                                    'auto' => 'Auto',
                                ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $attributes = $__attributesOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $component = $__componentOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__componentOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b96afb1fa59af2c1fedde4927520775)): ?>
<?php $attributes = $__attributesOriginal3b96afb1fa59af2c1fedde4927520775; ?>
<?php unset($__attributesOriginal3b96afb1fa59af2c1fedde4927520775); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b96afb1fa59af2c1fedde4927520775)): ?>
<?php $component = $__componentOriginal3b96afb1fa59af2c1fedde4927520775; ?>
<?php unset($__componentOriginal3b96afb1fa59af2c1fedde4927520775); ?>
<?php endif; ?>

                
                <?php if (isset($component)) { $__componentOriginal3b96afb1fa59af2c1fedde4927520775 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b96afb1fa59af2c1fedde4927520775 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs::resolve(['defaultValue' => 'dashboard','variant' => 'pills'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-4xl']); ?>
                    <?php if (isset($component)) { $__componentOriginal6ffad6dcfbba29cf40165f6cf6f03fd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ffad6dcfbba29cf40165f6cf6f03fd4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.tabs.list','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Trigger::resolve(['value' => 'dashboard'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Dashboard <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $attributes = $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $component = $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Trigger::resolve(['value' => 'analytics'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Analytics <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $attributes = $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $component = $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Trigger::resolve(['value' => 'reports'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Reports <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $attributes = $__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__attributesOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3)): ?>
<?php $component = $__componentOriginal97b76fbfa96d9b6e5588418e291fcda3; ?>
<?php unset($__componentOriginal97b76fbfa96d9b6e5588418e291fcda3); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ffad6dcfbba29cf40165f6cf6f03fd4)): ?>
<?php $attributes = $__attributesOriginal6ffad6dcfbba29cf40165f6cf6f03fd4; ?>
<?php unset($__attributesOriginal6ffad6dcfbba29cf40165f6cf6f03fd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ffad6dcfbba29cf40165f6cf6f03fd4)): ?>
<?php $component = $__componentOriginal6ffad6dcfbba29cf40165f6cf6f03fd4; ?>
<?php unset($__componentOriginal6ffad6dcfbba29cf40165f6cf6f03fd4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal50cb7812082ef877cd849db4ce0491a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal50cb7812082ef877cd849db4ce0491a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Content::resolve(['value' => 'dashboard'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Content::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 bg-card rounded-lg border']); ?>
                        <h4 class="font-semibold mb-3">Dashboard (Pills Variant)</h4>
                        <p class="text-muted-foreground">This demonstrates the pills variant of the tabs component.</p>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $attributes = $__attributesOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $component = $__componentOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__componentOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal50cb7812082ef877cd849db4ce0491a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal50cb7812082ef877cd849db4ce0491a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Content::resolve(['value' => 'analytics'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Content::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 bg-card rounded-lg border']); ?>
                        <h4 class="font-semibold mb-3">Analytics</h4>
                        <p class="text-muted-foreground">Analytics data would be displayed here.</p>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $attributes = $__attributesOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $component = $__componentOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__componentOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal50cb7812082ef877cd849db4ce0491a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal50cb7812082ef877cd849db4ce0491a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tabs\Content::resolve(['value' => 'reports'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tabs.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tabs\Content::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 bg-card rounded-lg border']); ?>
                        <h4 class="font-semibold mb-3">Reports</h4>
                        <p class="text-muted-foreground">Generate and download reports from this section.</p>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $attributes = $__attributesOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__attributesOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal50cb7812082ef877cd849db4ce0491a4)): ?>
<?php $component = $__componentOriginal50cb7812082ef877cd849db4ce0491a4; ?>
<?php unset($__componentOriginal50cb7812082ef877cd849db4ce0491a4); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b96afb1fa59af2c1fedde4927520775)): ?>
<?php $attributes = $__attributesOriginal3b96afb1fa59af2c1fedde4927520775; ?>
<?php unset($__attributesOriginal3b96afb1fa59af2c1fedde4927520775); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b96afb1fa59af2c1fedde4927520775)): ?>
<?php $component = $__componentOriginal3b96afb1fa59af2c1fedde4927520775; ?>
<?php unset($__componentOriginal3b96afb1fa59af2c1fedde4927520775); ?>
<?php endif; ?>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Modals</h3>
                <div class="flex flex-wrap gap-4">
                    <?php if (isset($component)) { $__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal\Trigger::resolve(['name' => 'basic-modal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Basic Modal <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea)): ?>
<?php $attributes = $__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea; ?>
<?php unset($__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea)): ?>
<?php $component = $__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea; ?>
<?php unset($__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal\Trigger::resolve(['name' => 'large-modal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'accent'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Large Modal <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea)): ?>
<?php $attributes = $__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea; ?>
<?php unset($__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea)): ?>
<?php $component = $__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea; ?>
<?php unset($__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal\Trigger::resolve(['name' => 'flyout-modal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal\Trigger::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Right Flyout <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea)): ?>
<?php $attributes = $__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea; ?>
<?php unset($__attributesOriginaleeaf1b34d63a2ebd5209a278887dd3ea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea)): ?>
<?php $component = $__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea; ?>
<?php unset($__componentOriginaleeaf1b34d63a2ebd5209a278887dd3ea); ?>
<?php endif; ?>
                </div>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Table</h3>
                <?php if (isset($component)) { $__componentOriginal2895adcbcb0d05331c239a4a33c257b1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2895adcbcb0d05331c239a4a33c257b1 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table::resolve(['striped' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal02a508f55882dc523510e4e1c074ccc3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal02a508f55882dc523510e4e1c074ccc3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve(['header' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Name <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve(['header' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Role <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve(['header' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Status <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve(['header' => true,'align' => 'right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Actions <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal02a508f55882dc523510e4e1c074ccc3)): ?>
<?php $attributes = $__attributesOriginal02a508f55882dc523510e4e1c074ccc3; ?>
<?php unset($__attributesOriginal02a508f55882dc523510e4e1c074ccc3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal02a508f55882dc523510e4e1c074ccc3)): ?>
<?php $component = $__componentOriginal02a508f55882dc523510e4e1c074ccc3; ?>
<?php unset($__componentOriginal02a508f55882dc523510e4e1c074ccc3); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalfcb9dc33c2874e8b8dde01143e3bedb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcb9dc33c2874e8b8dde01143e3bedb5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Body::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Body::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal754c544a2f81e122854e3124f6b1209e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal754c544a2f81e122854e3124f6b1209e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Row::resolve(['clickable' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Row::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>John Doe <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Developer <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'success'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Active <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve(['align' => 'right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm','variant' => 'ghost'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Edit <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $attributes = $__attributesOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__attributesOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $component = $__componentOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__componentOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal754c544a2f81e122854e3124f6b1209e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal754c544a2f81e122854e3124f6b1209e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Row::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Row::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Jane Smith <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Designer <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'warning'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Away <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve(['align' => 'right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm','variant' => 'ghost'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Edit <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $attributes = $__attributesOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__attributesOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $component = $__componentOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__componentOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal754c544a2f81e122854e3124f6b1209e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal754c544a2f81e122854e3124f6b1209e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Row::resolve(['selected' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Row::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Bob Wilson <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Manager <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'info'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Busy <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve(['align' => 'right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm','variant' => 'ghost'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Edit <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $attributes = $__attributesOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__attributesOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $component = $__componentOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__componentOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcb9dc33c2874e8b8dde01143e3bedb5)): ?>
<?php $attributes = $__attributesOriginalfcb9dc33c2874e8b8dde01143e3bedb5; ?>
<?php unset($__attributesOriginalfcb9dc33c2874e8b8dde01143e3bedb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcb9dc33c2874e8b8dde01143e3bedb5)): ?>
<?php $component = $__componentOriginalfcb9dc33c2874e8b8dde01143e3bedb5; ?>
<?php unset($__componentOriginalfcb9dc33c2874e8b8dde01143e3bedb5); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2895adcbcb0d05331c239a4a33c257b1)): ?>
<?php $attributes = $__attributesOriginal2895adcbcb0d05331c239a4a33c257b1; ?>
<?php unset($__attributesOriginal2895adcbcb0d05331c239a4a33c257b1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2895adcbcb0d05331c239a4a33c257b1)): ?>
<?php $component = $__componentOriginal2895adcbcb0d05331c239a4a33c257b1; ?>
<?php unset($__componentOriginal2895adcbcb0d05331c239a4a33c257b1); ?>
<?php endif; ?>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Interactive Elements</h3>
                <div class="flex flex-wrap gap-4">
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
                            <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Dropdown Menu <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
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
                            <?php if (isset($component)) { $__componentOriginalbaa761e585381069430e3d6c738df2d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa761e585381069430e3d6c738df2d6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Dropdown\Checkbox::resolve(['name' => 'notifications','value' => '1','label' => 'Notifications'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Dropdown\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbaa761e585381069430e3d6c738df2d6)): ?>
<?php $attributes = $__attributesOriginalbaa761e585381069430e3d6c738df2d6; ?>
<?php unset($__attributesOriginalbaa761e585381069430e3d6c738df2d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbaa761e585381069430e3d6c738df2d6)): ?>
<?php $component = $__componentOriginalbaa761e585381069430e3d6c738df2d6; ?>
<?php unset($__componentOriginalbaa761e585381069430e3d6c738df2d6); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalfb539fb77c96b7b2cf4bcead69a0bf20 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb539fb77c96b7b2cf4bcead69a0bf20 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Dropdown\Radio::resolve(['name' => 'theme','value' => 'dark','label' => 'Dark Mode'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Dropdown\Radio::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb539fb77c96b7b2cf4bcead69a0bf20)): ?>
<?php $attributes = $__attributesOriginalfb539fb77c96b7b2cf4bcead69a0bf20; ?>
<?php unset($__attributesOriginalfb539fb77c96b7b2cf4bcead69a0bf20); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb539fb77c96b7b2cf4bcead69a0bf20)): ?>
<?php $component = $__componentOriginalfb539fb77c96b7b2cf4bcead69a0bf20; ?>
<?php unset($__componentOriginalfb539fb77c96b7b2cf4bcead69a0bf20); ?>
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

                    <?php if (isset($component)) { $__componentOriginal68e1eda73f8026b1e95c49967c1f8bb1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68e1eda73f8026b1e95c49967c1f8bb1 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Popover::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Popover::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Popover <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                        <div class="p-4">
                            <h4 class="font-semibold mb-2">Popover Content</h4>
                            <p class="text-sm text-muted-foreground">This is additional information displayed in a popover.</p>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68e1eda73f8026b1e95c49967c1f8bb1)): ?>
<?php $attributes = $__attributesOriginal68e1eda73f8026b1e95c49967c1f8bb1; ?>
<?php unset($__attributesOriginal68e1eda73f8026b1e95c49967c1f8bb1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68e1eda73f8026b1e95c49967c1f8bb1)): ?>
<?php $component = $__componentOriginal68e1eda73f8026b1e95c49967c1f8bb1; ?>
<?php unset($__componentOriginal68e1eda73f8026b1e95c49967c1f8bb1); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal2ffecaa0e71e3e9840dd80bfddb4526d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ffecaa0e71e3e9840dd80bfddb4526d = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Tooltip::resolve(['text' => 'This is a helpful tooltip'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Tooltip::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Tooltip <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ffecaa0e71e3e9840dd80bfddb4526d)): ?>
<?php $attributes = $__attributesOriginal2ffecaa0e71e3e9840dd80bfddb4526d; ?>
<?php unset($__attributesOriginal2ffecaa0e71e3e9840dd80bfddb4526d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ffecaa0e71e3e9840dd80bfddb4526d)): ?>
<?php $component = $__componentOriginal2ffecaa0e71e3e9840dd80bfddb4526d; ?>
<?php unset($__componentOriginal2ffecaa0e71e3e9840dd80bfddb4526d); ?>
<?php endif; ?>
                </div>
            </div>

            
            <div class="space-y-6">
                <h3 class="text-xl font-semibold">Sidebar</h3>

                
                <div class="space-y-4">
                    <h4 class="font-medium">Sidebar Variants</h4>
                    <p class="text-sm text-muted-foreground">Different sidebar types with toggle buttons</p>

                    <div class="flex flex-wrap gap-4">
                        <?php if (isset($component)) { $__componentOriginal1c1f08c356d18863448b7d61a885e4a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c1f08c356d18863448b7d61a885e4a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarToggle::resolve(['target' => 'overlay-sidebar','variant' => 'button'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarToggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            Overlay Sidebar
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

                        <?php if (isset($component)) { $__componentOriginal1c1f08c356d18863448b7d61a885e4a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c1f08c356d18863448b7d61a885e4a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarToggle::resolve(['target' => 'push-sidebar','variant' => 'button'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarToggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            Push Content
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

                        <?php if (isset($component)) { $__componentOriginal1c1f08c356d18863448b7d61a885e4a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c1f08c356d18863448b7d61a885e4a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarToggle::resolve(['target' => 'right-sidebar','variant' => 'hamburger'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                        <?php if (isset($component)) { $__componentOriginal1c1f08c356d18863448b7d61a885e4a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c1f08c356d18863448b7d61a885e4a4 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarToggle::resolve(['target' => 'collapsible-sidebar','variant' => 'icon','icon' => 'heroicon-o-plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    </div>
                </div>

                
                <div class="space-y-4">
                    <h4 class="font-medium">JavaScript API</h4>
                    <p class="text-sm text-muted-foreground">Control sidebars programmatically</p>

                    <div class="flex flex-wrap gap-3">
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$strata.sidebar(\'overlay-sidebar\').show()']); ?>
                            Show Overlay
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
<?php $component->withAttributes(['@click' => '$strata.sidebar(\'push-sidebar\').toggle()']); ?>
                            Toggle Push
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
<?php $component->withAttributes(['@click' => '$strata.sidebars().closeAll()']); ?>
                            Close All
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
<?php $component->withAttributes(['onclick' => 'Strata.sidebar(\'right-sidebar\').show()']); ?>
                            Vanilla JS API
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
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Carousel</h3>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Single-Item Carousel (Auto-play)</h4>
                    <p class="text-sm text-muted-foreground">Full-width slides with automatic progression</p>
                    <?php if (isset($component)) { $__componentOriginalbe63428c142a931aa88e4f1b69214ddf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Carousel::resolve(['size' => 'lg','autoplay' => true,'interval' => 4000] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Carousel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-4xl']); ?>
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-2">Welcome to Strata UI</h3>
                            <p class="text-lg opacity-90">Beautiful components for modern Laravel applications</p>
                        </div>
                        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-2">CSS Scroll-Snap</h3>
                            <p class="text-lg opacity-90">Built with modern CSS for optimal performance</p>
                        </div>
                        <div class="bg-gradient-to-r from-green-500 to-teal-500 rounded-lg p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-2">Fully Accessible</h3>
                            <p class="text-lg opacity-90">Complete keyboard navigation and screen reader support</p>
                        </div>
                        <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-lg p-8 text-white text-center">
                            <h3 class="text-2xl font-bold mb-2">Touch Friendly</h3>
                            <p class="text-lg opacity-90">Native swipe gestures and touch interactions</p>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $attributes = $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $component = $__componentOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
                </div>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Responsive Image Gallery</h4>
                    <p class="text-sm text-muted-foreground">Perfect fit: 1 item mobile, 2 tablet, 3 desktop with proper gaps</p>
                    <?php if (isset($component)) { $__componentOriginalbe63428c142a931aa88e4f1b69214ddf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Carousel::resolve(['variant' => 'gallery','itemsPerView' => ['default' => 1, 'md' => 2, 'lg' => 3],'gap' => 'md','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Carousel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-5xl']); ?>
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop" alt="Mountain landscape" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=400&h=200&fit=crop" alt="Forest lake" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1500759104159-2b3b37dfdd53?w=400&h=200&fit=crop" alt="Ocean waves" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?w=400&h=200&fit=crop" alt="Desert sunset" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1515623446455-0a6dd49e4b84?w=400&h=200&fit=crop" alt="City skyline" class="h-40 object-cover rounded-lg" />
                        <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&h=200&fit=crop" alt="Forest path" class="h-40 object-cover rounded-lg" />
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $attributes = $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $component = $__componentOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
                </div>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Product Cards Carousel</h4>
                    <p class="text-sm text-muted-foreground">Exact fit: 1 mobile, 2 tablet, 4 desktop - no overflow or partial items</p>
                    <?php if (isset($component)) { $__componentOriginalbe63428c142a931aa88e4f1b69214ddf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Carousel::resolve(['variant' => 'cards','itemsPerView' => ['default' => 1, 'md' => 2, 'lg' => 4],'snapAlign' => 'start','gap' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Carousel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-6xl']); ?>
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
                            <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=400&h=200&fit=crop" alt="Product 1" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Wireless Headphones</h4>
                            <p class="text-sm text-muted-foreground mb-3">Premium noise-canceling headphones</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$299</span>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add to Cart <?php echo $__env->renderComponent(); ?>
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
                            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=400&h=200&fit=crop" alt="Product 2" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Smart Watch</h4>
                            <p class="text-sm text-muted-foreground mb-3">Track your fitness and health</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$399</span>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add to Cart <?php echo $__env->renderComponent(); ?>
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
                            <img src="https://images.unsplash.com/photo-1565814329452-e1efa11c5b89?w=400&h=200&fit=crop" alt="Product 3" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Laptop Stand</h4>
                            <p class="text-sm text-muted-foreground mb-3">Ergonomic aluminum laptop stand</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$79</span>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add to Cart <?php echo $__env->renderComponent(); ?>
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
                            <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?w=400&h=200&fit=crop" alt="Product 4" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Keyboard</h4>
                            <p class="text-sm text-muted-foreground mb-3">Mechanical gaming keyboard</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$159</span>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add to Cart <?php echo $__env->renderComponent(); ?>
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
                            <img src="https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?w=400&h=200&fit=crop" alt="Product 5" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Wireless Mouse</h4>
                            <p class="text-sm text-muted-foreground mb-3">Ergonomic wireless mouse with RGB</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$89</span>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add to Cart <?php echo $__env->renderComponent(); ?>
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
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=200&fit=crop" alt="Product 6" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Studio Headphones</h4>
                            <p class="text-sm text-muted-foreground mb-3">Professional studio monitoring</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$249</span>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add to Cart <?php echo $__env->renderComponent(); ?>
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
                            <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?w=400&h=200&fit=crop" alt="Product 7" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">Laptop Backpack</h4>
                            <p class="text-sm text-muted-foreground mb-3">Waterproof laptop backpack</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$69</span>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add to Cart <?php echo $__env->renderComponent(); ?>
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
                            <img src="https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?w=400&h=200&fit=crop" alt="Product 8" class="h-32 object-cover mb-4 rounded" />
                            <h4 class="font-semibold mb-2">USB-C Hub</h4>
                            <p class="text-sm text-muted-foreground mb-3">7-in-1 USB-C multiport hub</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-primary">$45</span>
                                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Add to Cart <?php echo $__env->renderComponent(); ?>
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
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $attributes = $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $component = $__componentOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
                </div>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Customer Testimonials</h4>
                    <p class="text-sm text-muted-foreground">Full-width single testimonials with dots navigation and auto-play</p>
                    <?php if (isset($component)) { $__componentOriginalbe63428c142a931aa88e4f1b69214ddf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Carousel::resolve(['size' => 'md','autoplay' => true,'interval' => 6000,'showArrows' => false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Carousel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-2xl']); ?>
                        <div class="text-center p-6 bg-card rounded-lg border">
                            <div class="mb-4">
                                <?php if (isset($component)) { $__componentOriginal81ef7dc34f829de905609903fa8828c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81ef7dc34f829de905609903fa8828c7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Rating::resolve(['value' => 5,'readonly' => true,'clearable' => false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Rating::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'justify-center']); ?>
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
                            </div>
                            <blockquote class="text-lg italic mb-4">
                                "Strata UI has completely transformed how we build Laravel applications. The components are beautiful and incredibly easy to use."
                            </blockquote>
                            <div class="flex items-center justify-center gap-3">
                                <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'sm','initials' => 'JS'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                <div class="text-left">
                                    <div class="font-semibold">John Smith</div>
                                    <div class="text-sm text-muted-foreground">Lead Developer</div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center p-6 bg-card rounded-lg border">
                            <div class="mb-4">
                                <?php if (isset($component)) { $__componentOriginal81ef7dc34f829de905609903fa8828c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81ef7dc34f829de905609903fa8828c7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Rating::resolve(['value' => 5,'readonly' => true,'clearable' => false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Rating::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'justify-center']); ?>
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
                            </div>
                            <blockquote class="text-lg italic mb-4">
                                "The accessibility features are outstanding. Our users love the keyboard navigation and screen reader support."
                            </blockquote>
                            <div class="flex items-center justify-center gap-3">
                                <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'sm','initials' => 'MJ'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                <div class="text-left">
                                    <div class="font-semibold">Maria Johnson</div>
                                    <div class="text-sm text-muted-foreground">UX Designer</div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center p-6 bg-card rounded-lg border">
                            <div class="mb-4">
                                <?php if (isset($component)) { $__componentOriginal81ef7dc34f829de905609903fa8828c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81ef7dc34f829de905609903fa8828c7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Rating::resolve(['value' => 4,'readonly' => true,'clearable' => false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Rating::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'justify-center']); ?>
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
                            </div>
                            <blockquote class="text-lg italic mb-4">
                                "Performance is incredible with the CSS scroll-snap implementation. Smooth as butter on all devices."
                            </blockquote>
                            <div class="flex items-center justify-center gap-3">
                                <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'sm','initials' => 'RW'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                <div class="text-left">
                                    <div class="font-semibold">Robert Wilson</div>
                                    <div class="text-sm text-muted-foreground">Frontend Architect</div>
                                </div>
                            </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $attributes = $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $component = $__componentOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
                </div>

                
                <div class="space-y-2">
                    <h4 class="font-medium">Showcase: Different Gap Sizes</h4>
                    <p class="text-sm text-muted-foreground">Demonstrating small, medium, and large gaps with perfect width calculations</p>

                    
                    <div class="space-y-1">
                        <h5 class="text-sm font-medium text-muted-foreground">Small Gap (gap-2)</h5>
                        <?php if (isset($component)) { $__componentOriginalbe63428c142a931aa88e4f1b69214ddf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Carousel::resolve(['variant' => 'cards','itemsPerView' => ['default' => 2, 'lg' => 4],'gap' => 'sm','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Carousel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-4xl']); ?>
                            <div class="bg-blue-100 rounded-lg p-4 text-center">
                                <div class="text-blue-800 font-medium">Card 1</div>
                                <div class="text-sm text-blue-600">Small gap</div>
                            </div>
                            <div class="bg-green-100 rounded-lg p-4 text-center">
                                <div class="text-green-800 font-medium">Card 2</div>
                                <div class="text-sm text-green-600">Small gap</div>
                            </div>
                            <div class="bg-purple-100 rounded-lg p-4 text-center">
                                <div class="text-purple-800 font-medium">Card 3</div>
                                <div class="text-sm text-purple-600">Small gap</div>
                            </div>
                            <div class="bg-orange-100 rounded-lg p-4 text-center">
                                <div class="text-orange-800 font-medium">Card 4</div>
                                <div class="text-sm text-orange-600">Small gap</div>
                            </div>
                            <div class="bg-red-100 rounded-lg p-4 text-center">
                                <div class="text-red-800 font-medium">Card 5</div>
                                <div class="text-sm text-red-600">Small gap</div>
                            </div>
                            <div class="bg-indigo-100 rounded-lg p-4 text-center">
                                <div class="text-indigo-800 font-medium">Card 6</div>
                                <div class="text-sm text-indigo-600">Small gap</div>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $attributes = $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $component = $__componentOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="space-y-1">
                        <h5 class="text-sm font-medium text-muted-foreground">Large Gap (gap-6)</h5>
                        <?php if (isset($component)) { $__componentOriginalbe63428c142a931aa88e4f1b69214ddf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Carousel::resolve(['variant' => 'gallery','itemsPerView' => ['default' => 1, 'md' => 3],'gap' => 'lg','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Carousel::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-4xl']); ?>
                            <div class="bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg p-6 text-white text-center">
                                <div class="font-bold text-lg">Large Gap</div>
                                <div class="text-sm opacity-90">Perfect spacing</div>
                            </div>
                            <div class="bg-gradient-to-br from-violet-500 to-purple-500 rounded-lg p-6 text-white text-center">
                                <div class="font-bold text-lg">Large Gap</div>
                                <div class="text-sm opacity-90">Perfect spacing</div>
                            </div>
                            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 rounded-lg p-6 text-white text-center">
                                <div class="font-bold text-lg">Large Gap</div>
                                <div class="text-sm opacity-90">Perfect spacing</div>
                            </div>
                            <div class="bg-gradient-to-br from-emerald-500 to-green-500 rounded-lg p-6 text-white text-center">
                                <div class="font-bold text-lg">Large Gap</div>
                                <div class="text-sm opacity-90">Perfect spacing</div>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $attributes = $__attributesOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__attributesOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf)): ?>
<?php $component = $__componentOriginalbe63428c142a931aa88e4f1b69214ddf; ?>
<?php unset($__componentOriginalbe63428c142a931aa88e4f1b69214ddf); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Calendar</h3>
                <div class="max-w-4xl">
                    <?php if (isset($component)) { $__componentOriginalcda98dd4562148b99dced84fc8ed9e77 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcda98dd4562148b99dced84fc8ed9e77 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Calendar::resolve(['range' => true,'presets' => true,'showClearButton' => true,'weekStart' => 'sunday'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::calendar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Calendar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcda98dd4562148b99dced84fc8ed9e77)): ?>
<?php $attributes = $__attributesOriginalcda98dd4562148b99dced84fc8ed9e77; ?>
<?php unset($__attributesOriginalcda98dd4562148b99dced84fc8ed9e77); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcda98dd4562148b99dced84fc8ed9e77)): ?>
<?php $component = $__componentOriginalcda98dd4562148b99dced84fc8ed9e77; ?>
<?php unset($__componentOriginalcda98dd4562148b99dced84fc8ed9e77); ?>
<?php endif; ?>
                </div>
            </div>


            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">File Upload</h3>
                <div class="space-y-4">
                    <div class="max-w-2xl">
                        <h4 class="font-medium mb-2">Standard File Upload</h4>
                        <p class="text-sm text-muted-foreground mb-3">Features integrated Progress components for upload tracking</p>
                        <?php if (isset($component)) { $__componentOriginal4f672025261d802be5424439af0a7037 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f672025261d802be5424439af0a7037 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\FileUpload::resolve(['name' => 'demo-files','accept' => 'image/*,.pdf,.doc,.docx','multiple' => true,'placeholder' => 'Drop files here or click to browse'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.file-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\FileUpload::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Upload Files','description' => 'Upload images or documents (max 5MB each) - Progress bars powered by Strata Progress component']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f672025261d802be5424439af0a7037)): ?>
<?php $attributes = $__attributesOriginal4f672025261d802be5424439af0a7037; ?>
<?php unset($__attributesOriginal4f672025261d802be5424439af0a7037); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f672025261d802be5424439af0a7037)): ?>
<?php $component = $__componentOriginal4f672025261d802be5424439af0a7037; ?>
<?php unset($__componentOriginal4f672025261d802be5424439af0a7037); ?>
<?php endif; ?>
                    </div>

                    <div class="max-w-2xl">
                        <h4 class="font-medium mb-2">Gallery View Upload</h4>
                        <p class="text-sm text-muted-foreground mb-3">Perfect for image collections with visual previews</p>
                        <?php if (isset($component)) { $__componentOriginal4f672025261d802be5424439af0a7037 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f672025261d802be5424439af0a7037 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\FileUpload::resolve(['name' => 'gallery-files','variant' => 'gallery','accept' => 'image/*','multiple' => true,'placeholder' => 'Add images to gallery'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.file-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\FileUpload::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Upload Images','description' => 'Visual gallery with integrated progress tracking']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f672025261d802be5424439af0a7037)): ?>
<?php $attributes = $__attributesOriginal4f672025261d802be5424439af0a7037; ?>
<?php unset($__attributesOriginal4f672025261d802be5424439af0a7037); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f672025261d802be5424439af0a7037)): ?>
<?php $component = $__componentOriginal4f672025261d802be5424439af0a7037; ?>
<?php unset($__componentOriginal4f672025261d802be5424439af0a7037); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="space-y-4">
                <h3 class="text-xl font-semibold">Navigation</h3>
                <nav class="space-y-2 max-w-xs">
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
<?php $component->withAttributes([]); ?>Users <?php echo $__env->renderComponent(); ?>
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
                </nav>
            </div>
        </section>

        
        <section class="space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Complete Examples</h2>
                <p class="text-muted-foreground">Real-world usage patterns</p>
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
<?php $component->withAttributes(['class' => 'max-w-2xl mx-auto']); ?>
                 <?php $__env->slot('header', null, []); ?> 
                    <h3 class="text-lg font-semibold">Contact Form</h3>
                 <?php $__env->endSlot(); ?>

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'first_name','label' => 'First Name','placeholder' => 'John','required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'last_name','label' => 'Last Name','placeholder' => 'Doe','required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    </div>

                    <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'email','type' => 'email','label' => 'Email','placeholder' => 'john@example.com','icon' => 'heroicon-o-envelope','required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = Strata\UI\View\Components\Form\Select::resolve(['name' => 'subject','label' => 'Subject','items' => [
                            'general' => 'General Inquiry',
                            'support' => 'Support Request',
                            'bug' => 'Bug Report',
                            'feature' => 'Feature Request',
                        ],'required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                    <?php if (isset($component)) { $__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Textarea::resolve(['name' => 'message','label' => 'Message','placeholder' => 'How can we help you?','rows' => '5','required' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Textarea::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161)): ?>
<?php $attributes = $__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161; ?>
<?php unset($__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161)): ?>
<?php $component = $__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161; ?>
<?php unset($__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal81ef7dc34f829de905609903fa8828c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81ef7dc34f829de905609903fa8828c7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Rating::resolve(['name' => 'priority','label' => 'Priority Level','description' => 'How urgent is this request?','max' => 5] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                    <?php if (isset($component)) { $__componentOriginal72d418d9f43ee71e56ab05c8b3423141 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72d418d9f43ee71e56ab05c8b3423141 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Checkbox::resolve(['name' => 'subscribe','id' => 'subscribe','value' => '1','label' => 'Subscribe to newsletter','description' => 'Get updates about new features and announcements'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72d418d9f43ee71e56ab05c8b3423141)): ?>
<?php $attributes = $__attributesOriginal72d418d9f43ee71e56ab05c8b3423141; ?>
<?php unset($__attributesOriginal72d418d9f43ee71e56ab05c8b3423141); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72d418d9f43ee71e56ab05c8b3423141)): ?>
<?php $component = $__componentOriginal72d418d9f43ee71e56ab05c8b3423141; ?>
<?php unset($__componentOriginal72d418d9f43ee71e56ab05c8b3423141); ?>
<?php endif; ?>
                </div>

                 <?php $__env->slot('footer', null, []); ?> 
                    <div class="flex justify-between">
                        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Save Draft <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Send Message <?php echo $__env->renderComponent(); ?>
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
        </section>

        
        <footer class="text-center py-8 border-t">
            <p class="text-muted-foreground">
                Built with Strata UI - A comprehensive Laravel component library
            </p>
        </footer>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal::resolve(['name' => 'basic-modal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Basic Modal</h3>
            <p class="text-muted-foreground">This is a basic modal dialog with standard styling and behavior.</p>
            <div class="flex justify-end gap-2">
                <?php if (isset($component)) { $__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal\Close::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal.close'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal\Close::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Cancel <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e)): ?>
<?php $attributes = $__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e; ?>
<?php unset($__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e)): ?>
<?php $component = $__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e; ?>
<?php unset($__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Confirm <?php echo $__env->renderComponent(); ?>
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
<?php if (isset($__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b)): ?>
<?php $attributes = $__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b; ?>
<?php unset($__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b)): ?>
<?php $component = $__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b; ?>
<?php unset($__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal::resolve(['name' => 'large-modal','size' => 'lg'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="space-y-6">
            <h3 class="text-lg font-semibold">Large Modal</h3>
            <div class="prose prose-sm max-w-none">
                <p class="text-muted-foreground">This is a larger modal that can accommodate more content and complex layouts.</p>
                <p class="text-muted-foreground">It's perfect for forms, detailed information, or rich content presentations.</p>
            </div>
            <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'info','title' => 'Modal Features'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <ul class="text-sm space-y-1">
                    <li>• Automatic focus management</li>
                    <li>• Backdrop click to close</li>
                    <li>• Escape key support</li>
                    <li>• Body scroll locking</li>
                </ul>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
            <div class="flex justify-end gap-2">
                <?php if (isset($component)) { $__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal\Close::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal.close'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal\Close::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Close <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e)): ?>
<?php $attributes = $__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e; ?>
<?php unset($__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e)): ?>
<?php $component = $__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e; ?>
<?php unset($__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Got it <?php echo $__env->renderComponent(); ?>
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
<?php if (isset($__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b)): ?>
<?php $attributes = $__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b; ?>
<?php unset($__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b)): ?>
<?php $component = $__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b; ?>
<?php unset($__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal::resolve(['name' => 'flyout-modal','variant' => 'flyout','position' => 'right','size' => 'md'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="space-y-6">
            <h3 class="text-lg font-semibold">Right Flyout</h3>
            <p class="text-muted-foreground">This flyout slides in from the right side of the screen.</p>
            <div class="space-y-4">
                <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'flyout_name','label' => 'Name','placeholder' => 'Enter your name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['name' => 'flyout_email','type' => 'email','label' => 'Email','placeholder' => 'Enter your email'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                <?php if (isset($component)) { $__componentOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Toggle::resolve(['name' => 'flyout_notifications','label' => 'Enable notifications'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
            <div class="flex gap-2">
                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Save <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal\Close::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal.close'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal\Close::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'outline','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Cancel <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e)): ?>
<?php $attributes = $__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e; ?>
<?php unset($__attributesOriginal2fbce6926a0f6fe824fbcc0c979a7e4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e)): ?>
<?php $component = $__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e; ?>
<?php unset($__componentOriginal2fbce6926a0f6fe824fbcc0c979a7e4e); ?>
<?php endif; ?>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b)): ?>
<?php $attributes = $__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b; ?>
<?php unset($__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b)): ?>
<?php $component = $__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b; ?>
<?php unset($__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginal28e8d7754f3f4f5cf45b38c536d4911e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28e8d7754f3f4f5cf45b38c536d4911e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Sidebar::resolve(['name' => 'overlay-sidebar','variant' => 'overlay','position' => 'left','width' => 'w-80'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Sidebar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('header', null, []); ?> 
            <div class="flex items-center gap-3">
                <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'sm','initials' => 'SU'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                <div>
                    <div class="font-semibold">Strata UI</div>
                    <div class="text-sm text-muted-foreground">Overlay Sidebar</div>
                </div>
            </div>
         <?php $__env->endSlot(); ?>

        <?php if (isset($component)) { $__componentOriginale5c310191d07e4b95ee54717daba2985 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5c310191d07e4b95ee54717daba2985 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Main Navigation'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component->withAttributes([]); ?>Team <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Recent','collapsible' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarGroup::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-document'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Project Alpha <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-document'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Website Redesign <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-document'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Mobile App <?php echo $__env->renderComponent(); ?>
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

    <?php if (isset($component)) { $__componentOriginal28e8d7754f3f4f5cf45b38c536d4911e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28e8d7754f3f4f5cf45b38c536d4911e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Sidebar::resolve(['name' => 'push-sidebar','variant' => 'push','position' => 'left','width' => 'w-72','persistent' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Sidebar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('header', null, []); ?> 
            <div class="text-center">
                <div class="font-semibold">Push Sidebar</div>
                <div class="text-sm text-muted-foreground">Pushes content aside</div>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-squares-2x2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Overview <?php echo $__env->renderComponent(); ?>
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
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-paint-brush'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Themes <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\SidebarGroup::resolve(['label' => 'Tools','collapsible' => true,'collapsed' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\SidebarGroup::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-wrench-screwdriver'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-bug-ant'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Debug <?php echo $__env->renderComponent(); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-academic-cap'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Learning <?php echo $__env->renderComponent(); ?>
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

    <?php if (isset($component)) { $__componentOriginal28e8d7754f3f4f5cf45b38c536d4911e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28e8d7754f3f4f5cf45b38c536d4911e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Sidebar::resolve(['name' => 'right-sidebar','variant' => 'overlay','position' => 'right','width' => 'w-96'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Sidebar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('header', null, []); ?> 
            <div>
                <div class="font-semibold">Right Sidebar</div>
                <div class="text-sm text-muted-foreground">Information panel</div>
            </div>
         <?php $__env->endSlot(); ?>

        <div class="space-y-6">
            <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="text-center">
                    <div class="text-2xl font-bold text-primary mb-1">1,234</div>
                    <div class="text-sm text-muted-foreground">Active Users</div>
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
<?php $component = Strata\UI\View\Components\Card::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="text-center">
                    <div class="text-2xl font-bold text-accent mb-1">89%</div>
                    <div class="text-sm text-muted-foreground">Success Rate</div>
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

            <div>
                <h4 class="font-medium mb-3">Recent Activity</h4>
                <div class="space-y-2">
                    <div class="flex items-center gap-3 text-sm">
                        <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'xs','initials' => 'JD'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <span class="text-muted-foreground">John deployed to production</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'xs','initials' => 'SM'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <span class="text-muted-foreground">Sarah created new project</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <?php if (isset($component)) { $__componentOriginal504085b8cf8f6696eba64b6eed9c17a6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal504085b8cf8f6696eba64b6eed9c17a6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Avatar::resolve(['size' => 'xs','initials' => 'BW'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <span class="text-muted-foreground">Bob fixed critical bug</span>
                    </div>
                </div>
            </div>
        </div>
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

    <?php if (isset($component)) { $__componentOriginal28e8d7754f3f4f5cf45b38c536d4911e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28e8d7754f3f4f5cf45b38c536d4911e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Sidebar::resolve(['name' => 'collapsible-sidebar','variant' => 'fixed','position' => 'left','width' => 'w-64','collapsible' => true,'persistent' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Sidebar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('header', null, []); ?> 
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-primary-foreground font-bold text-sm">S</span>
                </div>
                <div x-show="!collapsed" x-transition>
                    <div class="font-semibold">Strata UI</div>
                    <div class="text-xs text-muted-foreground">v1.0</div>
                </div>
            </div>
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
<?php $component->withAttributes(['x-show' => '!collapsed']); ?>
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-home'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Users <?php echo $__env->renderComponent(); ?>
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

        <div x-show="collapsed" x-transition class="space-y-1">
            <?php if (isset($component)) { $__componentOriginale4479c27e39ad69bc5b371ea279eb7f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4479c27e39ad69bc5b371ea279eb7f3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-home'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Dashboard')]); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-chart-bar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Analytics')]); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Users')]); ?>
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
<?php $component = Strata\UI\View\Components\NavItem::resolve(['href' => '#','icon' => 'heroicon-o-cog-6-tooth'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::nav-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\NavItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Settings')]); ?>
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
    </div>
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
<?php /**PATH C:\Users\chaab\Herd\strata\resources\views/livewire/demo.blade.php ENDPATH**/ ?>