<?php
    $hasError = !empty($error);
?>

<div class="flex flex-col gap-1">
    <div 
        x-data="{
            value: <?php if($attributes->wire('model')): ?> <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?> <?php else: ?> <?php echo e($checked ? 'true' : 'false'); ?> <?php endif; ?>,
            
            get isOn() {
                return this.value === true || this.value === '1' || this.value === 1;
            },
            
            toggle() {
                this.value = !this.isOn;
                this.$refs.hiddenInput.checked = this.isOn;
            }
        }" 
        class="flex items-center gap-3"
    >
    <!--[if BLOCK]><![endif]--><?php if($name && !$attributes->wire('model')): ?>
        <input type="hidden" name="<?php echo e($name); ?>" value="0">
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <input 
        x-ref="hiddenInput"
        type="checkbox" 
        <?php if($name): ?> name="<?php echo e($name); ?>" <?php endif; ?>
        <?php if($value): ?> value="<?php echo e($value); ?>" <?php else: ?> value="1" <?php endif; ?>
        :checked="isOn"
        class="sr-only"
        <?php echo e($attributes->except(['wire:model'])); ?>

    >

    <button 
        x-ref="switchButton"
        type="button" 
        @click="toggle()"
        :class="isOn ? 'bg-primary' : 'bg-input'" 
        class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
        :aria-pressed="isOn.toString()"
        role="switch"
        <?php if($label): ?> aria-labelledby="<?php echo e($id); ?>-label" <?php endif; ?>
        <?php if($description && !$hasError): ?> aria-describedby="<?php echo e($id); ?>-description" <?php endif; ?>
        <?php if($hasError): ?> aria-describedby="<?php echo e($id); ?>_error" aria-invalid="true" <?php endif; ?>
    >
        <span 
            :class="isOn ? 'translate-x-5' : 'translate-x-0'" 
            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-background shadow-sm ring-0 transition duration-200 ease-in-out"
        ></span>
    </button>

    <!--[if BLOCK]><![endif]--><?php if($label || $description): ?>
        <div class="flex flex-col items-start gap-1">
            <!--[if BLOCK]><![endif]--><?php if($label): ?>
                <?php if (isset($component)) { $__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Label::resolve(['id' => ''.e($id).'-label'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Label::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer select-none','@click' => '$refs.switchButton.click(); $refs.switchButton.focus()']); ?>
                    <?php echo e($label); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412)): ?>
<?php $attributes = $__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412; ?>
<?php unset($__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412)): ?>
<?php $component = $__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412; ?>
<?php unset($__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if($description): ?>
                <?php if (isset($component)) { $__componentOriginalb3a838ced65e177e8ce9c340733dd8dd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Helper::resolve(['id' => ''.e($id).'-description'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.helper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Helper::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($description); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd)): ?>
<?php $attributes = $__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd; ?>
<?php unset($__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3a838ced65e177e8ce9c340733dd8dd)): ?>
<?php $component = $__componentOriginalb3a838ced65e177e8ce9c340733dd8dd; ?>
<?php unset($__componentOriginalb3a838ced65e177e8ce9c340733dd8dd); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    
    <!--[if BLOCK]><![endif]--><?php if($hasError): ?>
        <?php if (isset($component)) { $__componentOriginal432ea598424c224929c48147fe2a40a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal432ea598424c224929c48147fe2a40a7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Error::resolve(['id' => ''.e($id).'_error'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Error::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($error); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal432ea598424c224929c48147fe2a40a7)): ?>
<?php $attributes = $__attributesOriginal432ea598424c224929c48147fe2a40a7; ?>
<?php unset($__attributesOriginal432ea598424c224929c48147fe2a40a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal432ea598424c224929c48147fe2a40a7)): ?>
<?php $component = $__componentOriginal432ea598424c224929c48147fe2a40a7; ?>
<?php unset($__componentOriginal432ea598424c224929c48147fe2a40a7); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/form/toggle.blade.php ENDPATH**/ ?>