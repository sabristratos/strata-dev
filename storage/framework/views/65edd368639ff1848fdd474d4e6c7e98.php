<?php
    $role = match ($color) {
        'destructive' => 'alert',
        'warning' => 'alert', 
        default => 'status'
    };
    $ariaLive = $color === 'destructive' ? 'assertive' : 'polite';
?>

<div 
    x-data="{ visible: true }" 
    x-show="visible" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    role="<?php echo e($role); ?>"
    aria-live="<?php echo e($ariaLive); ?>"
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'alert-radius shadow-xs relative',
        'border border-info bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'info',
        'border border-success bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'success',
        'border border-warning bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'warning',
        'border border-destructive bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'destructive',
        'border border-primary bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'primary',
        'border border-accent bg-card text-card-foreground dark:bg-card dark:text-card-foreground' => $color === 'accent',
    ]); ?>"
    <?php echo e($attributes); ?>

>
    <div 
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'flex w-full items-center gap-3 alert-radius transition-all duration-300',
            $getSizeClasses(),
            'bg-info/10' => $color === 'info',
            'bg-success/10' => $color === 'success',
            'bg-warning/10' => $color === 'warning',
            'bg-destructive/10' => $color === 'destructive',
            'bg-primary/10' => $color === 'primary',
            'bg-accent/10' => $color === 'accent',
        ]); ?>"
    >

        <div 
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'rounded-full p-0.5 shrink-0',
                'bg-info/15 text-info toast-pulse-info' => $color === 'info',
                'bg-success/15 text-success toast-pulse-success' => $color === 'success',
                'bg-warning/15 text-warning toast-pulse-warning' => $color === 'warning',
                'bg-destructive/15 text-destructive toast-pulse-destructive' => $color === 'destructive',
                'bg-primary/15 text-primary toast-pulse-primary' => $color === 'primary',
                'bg-accent/15 text-accent toast-pulse-accent' => $color === 'accent',
            ]); ?>"
            aria-hidden="true"
        >
            <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => $getContextualIcon()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getIconSizeClasses())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $attributes = $__attributesOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__attributesOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $component = $__componentOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__componentOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
        </div>


        <div class="flex flex-col gap-2 flex-1 min-w-0 pr-8">
            <?php if($title): ?>
                <h3 
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'font-semibold',
                        $getTitleClasses(),
                        'text-info' => $color === 'info',
                        'text-success' => $color === 'success',
                        'text-warning' => $color === 'warning',
                        'text-destructive' => $color === 'destructive',
                        'text-primary' => $color === 'primary',
                        'text-accent' => $color === 'accent',
                    ]); ?>"
                >
                    <?php echo e($title); ?>

                </h3>
                <?php if($slot->isNotEmpty()): ?>
                    <div class="text-pretty text-sm">
                        <?php echo e($slot); ?>

                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="text-pretty text-sm">
                    <?php echo e($slot); ?>

                </div>
            <?php endif; ?>
            

            <?php if(isset($actions)): ?>
                <div class="flex gap-2 mt-1">
                    <?php echo $actions; ?>

                </div>
            <?php endif; ?>
        </div>


        <?php if($dismissible): ?>
            <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','icon' => 'heroicon-o-x-mark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => 'visible = false','aria-label' => 'Dismiss alert','class' => '!p-1 absolute top-2 right-2 shrink-0']); ?>
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
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/alert.blade.php ENDPATH**/ ?>