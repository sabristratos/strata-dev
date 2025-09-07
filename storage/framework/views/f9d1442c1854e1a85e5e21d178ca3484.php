<?php
    $hasWireModel = $attributes->wire('model');
?>

<div 
    x-data="strataRating({
        hasWireModel: <?php echo \Illuminate\Support\Js::from($hasWireModel)->toHtml() ?>,
        value: <?php echo \Illuminate\Support\Js::from($value)->toHtml() ?>,
        readonly: <?php echo \Illuminate\Support\Js::from($readonly)->toHtml() ?>,
        max: <?php echo \Illuminate\Support\Js::from($max)->toHtml() ?>,
        name: <?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>
    })"
    x-modelable="value"
    <?php if($hasWireModel): ?> <?php echo e($attributes->wire('model')); ?> <?php endif; ?>
    class="flex flex-col space-y-2"
>
    <!--[if BLOCK]><![endif]--><?php if($name && !$hasWireModel): ?>
        <input 
            x-ref="hiddenInput"
            type="hidden" 
            name="<?php echo e($name); ?>" 
            value="<?php echo e($value ?? ''); ?>"
        >
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($label || $description): ?>
        <div class="space-y-1">
            <!--[if BLOCK]><![endif]--><?php if($label): ?>
                <label 
                    id="<?php echo e($id); ?>-label"
                    class="text-sm font-medium text-foreground"
                >
                    <?php echo e($label); ?>

                </label>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if($description): ?>
                <p 
                    id="<?php echo e($id); ?>-description"
                    class="text-xs text-muted-foreground"
                >
                    <?php echo e($description); ?>

                </p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="flex items-center <?php echo e($getGapClasses()); ?>">
        <!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= $max; $i++): ?>
            <button
                type="button"
                <?php if(!$readonly): ?>
                    @click="setRating(<?php echo e($i); ?>)"
                    @mouseenter="onMouseEnter(<?php echo e($i); ?>)"
                    @mouseleave="onMouseLeave()"
                <?php endif; ?>
                :class="{
                    'text-rating-star': isActive(<?php echo e($i); ?>),
                    'text-muted-foreground': !isActive(<?php echo e($i); ?>),
                    'hover:text-rating-star': !readonly && !isActive(<?php echo e($i); ?>),
                    'cursor-pointer': !readonly,
                    'cursor-default': readonly
                }"
                class="transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 input-radius-sm"
                <?php echo e($attributes->except(['wire:model'])); ?>

                <?php if($label): ?> aria-labelledby="<?php echo e($id); ?>-label" <?php endif; ?>
                <?php if($description): ?> aria-describedby="<?php echo e($id); ?>-description" <?php endif; ?>
                aria-label="Rate <?php echo e($i); ?> out of <?php echo e($max); ?>"
            >
                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => str_replace('-o-', '-s-', $icon)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getSizeClasses()),'x-show' => 'isActive('.e($i).')']); ?>
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
                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getSizeClasses() . ' opacity-40'),'x-show' => '!isActive('.e($i).')']); ?>
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
            </button>
        <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($clearable && !$readonly): ?>
            <button
                type="button"
                @click="clearRating()"
                x-show="value !== null"
                class="ml-2 text-muted-foreground hover:text-foreground transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 input-radius-sm"
                aria-label="Clear rating"
                title="Clear rating"
            >
                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-x-mark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getClearButtonSizeClasses())]); ?>
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
            </button>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php if($value !== null): ?>
        <div class="text-xs text-muted-foreground">
            <span x-text="value"></span> out of <?php echo e($max); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>

<?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/form/rating.blade.php ENDPATH**/ ?>