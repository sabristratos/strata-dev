<?php
    $hasLabel = !empty($label);
    $hasDescription = !empty($description);
    $hasError = !empty($error);
?>

<div class="space-y-2">

    <!--[if BLOCK]><![endif]--><?php if($hasLabel): ?>
        <?php if (isset($component)) { $__componentOriginal3ea2f8edb912a0e37cb1305e82ccd412 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ea2f8edb912a0e37cb1305e82ccd412 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Label::resolve(['for' => $id,'required' => $required] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Label::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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


    <!--[if BLOCK]><![endif]--><?php if($hasDescription && !$hasError): ?>
        <?php if (isset($component)) { $__componentOriginalb3a838ced65e177e8ce9c340733dd8dd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3a838ced65e177e8ce9c340733dd8dd = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Helper::resolve(['field' => $name,'text' => $description] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.helper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Helper::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
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


    <textarea
        <?php if($autoResize): ?>
            x-data="{
                value: <?php if($attributes->has('wire:model')): ?> <?php if ((object) ($attributes->get('wire:model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->get('wire:model')->value()); ?>')<?php echo e($attributes->get('wire:model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->get('wire:model')); ?>')<?php endif; ?> <?php else: ?> <?php echo \Illuminate\Support\Js::from($value ?? '')->toHtml() ?> <?php endif; ?>,

                init() {
                    this.$nextTick(() => this.resize());
                },

                resize() {
                    $el.style.height = 'auto';
                    $el.style.height = $el.scrollHeight + 'px';
                }
            }"
            x-model="value"
            x-on:input="resize"
            x-init="resize()"
        <?php else: ?>
            <?php if($attributes->has('wire:model')): ?>
                x-data="{ value: <?php if ((object) ($attributes->get('wire:model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->get('wire:model')->value()); ?>')<?php echo e($attributes->get('wire:model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->get('wire:model')); ?>')<?php endif; ?>.live }"
                x-model="value"
            <?php else: ?>
                x-data="{ value: <?php echo \Illuminate\Support\Js::from($value ?? '')->toHtml() ?> }"
                x-model="value"
            <?php endif; ?>
        <?php endif; ?>
        id="<?php echo e($id); ?>"
        <?php if($name): ?> name="<?php echo e($name); ?>" <?php endif; ?>
        <?php if($placeholder): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?>
        <?php if($required): ?> required aria-required="true" <?php endif; ?>
        <?php if($disabled): ?> disabled <?php endif; ?>
        <?php if($readonly): ?> readonly <?php endif; ?>
        <?php if($hasLabel): ?> aria-labelledby="<?php echo e($id); ?>-label" <?php endif; ?>
        <?php if($hasDescription && !$hasError): ?> aria-describedby="<?php echo e($name); ?>-description" <?php endif; ?>
        <?php if($hasError): ?> aria-describedby="<?php echo e($name); ?>-error" aria-invalid="true" <?php endif; ?>
        <?php if($hasDescription && $hasError): ?> aria-describedby="<?php echo e($name); ?>-description <?php echo e($name); ?>-error" <?php endif; ?>
        rows="<?php echo e($rows); ?>"
        <?php echo e($attributes->except(['wire:model', 'id', 'name', 'placeholder', 'required', 'disabled', 'readonly'])); ?>

        class="<?php echo e($getTextareaClasses()); ?>"
    ><!--[if BLOCK]><![endif]--><?php if(!$attributes->has('wire:model') && $value): ?><?php echo e($value); ?><?php endif; ?><!--[if ENDBLOCK]><![endif]--></textarea>


    <!--[if BLOCK]><![endif]--><?php if($hasError): ?>
        <?php if (isset($component)) { $__componentOriginal432ea598424c224929c48147fe2a40a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal432ea598424c224929c48147fe2a40a7 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Error::resolve(['field' => $name,'message' => $error] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Error::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
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
</div>
<?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/form/textarea.blade.php ENDPATH**/ ?>