<?php
    $hasLabel = !empty($label);
    $hasDescription = !empty($description);
    $hasError = !empty($error);
    $hasIcon = !empty($icon);
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


    <div
        x-data="strataDatepicker({
            value: <?php echo \Illuminate\Support\Js::from($getFormValue())->toHtml() ?>,
            range: <?php echo \Illuminate\Support\Js::from($range)->toHtml() ?>,
            format: <?php echo \Illuminate\Support\Js::from($format)->toHtml() ?>,
            disabled: <?php echo \Illuminate\Support\Js::from($disabled)->toHtml() ?>,
            readonly: <?php echo \Illuminate\Support\Js::from($readonly)->toHtml() ?>,
            placeholder: <?php echo \Illuminate\Support\Js::from($placeholder)->toHtml() ?>
        })"
        @keydown.escape.window="open = false"
        @click.outside="open = false"
        class="relative"
        @strata-calendar-change="handleCalendarChange($event)"
    >

        <!--[if BLOCK]><![endif]--><?php if($name): ?>
            <!--[if BLOCK]><![endif]--><?php if($range): ?>
                <input 
                    type="hidden" 
                    x-bind:value="value ? JSON.stringify(value) : ''" 
                    name="<?php echo e($name); ?>" 
                    x-ref="hiddenInput"
                    <?php if($attributes->has('wire:model')): ?> <?php echo e($attributes->get('wire:model')); ?> <?php endif; ?>
                />
            <?php else: ?>
                <input 
                    type="hidden" 
                    x-bind:value="value || ''" 
                    name="<?php echo e($name); ?>" 
                    x-ref="hiddenInput"
                    <?php if($attributes->has('wire:model')): ?> <?php echo e($attributes->get('wire:model')); ?> <?php endif; ?>
                />
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        <div 
            class="<?php echo e($getWrapperClasses()); ?>"
            @click="openCalendar()"
            @keydown.enter.prevent="openCalendar()"
            @keydown.space.prevent="openCalendar()"
            tabindex="<?php echo e($disabled ? -1 : 0); ?>"
            role="combobox"
            :aria-expanded="open"
            aria-haspopup="dialog"
            <?php if($hasLabel): ?> aria-labelledby="<?php echo e($id); ?>-label" <?php endif; ?>
            <?php if($hasDescription && !$hasError): ?> aria-describedby="<?php echo e($name); ?>-description" <?php endif; ?>
            <?php if($hasError): ?> aria-describedby="<?php echo e($name); ?>-error" aria-invalid="true" <?php endif; ?>
            <?php if($hasDescription && $hasError): ?> aria-describedby="<?php echo e($name); ?>-description <?php echo e($name); ?>-error" <?php endif; ?>
            :class="{ 'opacity-50': disabled || <?php echo e($disabled ? 'true' : 'false'); ?> }"
        >

            <!--[if BLOCK]><![endif]--><?php if($hasIcon): ?>
                <div class="flex items-center px-3 py-2">
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-muted-foreground','aria-hidden' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


            <div class="input-element flex-1 px-3 py-2">
                <span 
                    x-show="displayValue" 
                    x-text="displayValue"
                    class="text-foreground"
                ></span>
                <span 
                    x-show="!displayValue" 
                    class="text-muted-foreground"
                    x-text="placeholder"
                ></span>
            </div>


            <div class="flex items-center px-3 py-2 gap-1">
                <!--[if BLOCK]><![endif]--><?php if($clearable): ?>
                    <button
                        type="button"
                        x-show="displayValue"
                        @click.stop="clearValue()"
                        class="text-muted-foreground hover:text-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:text-foreground transition-colors duration-200 rounded-sm p-0.5"
                        aria-label="<?php echo e(trans('strata::datepicker.clear', [], $locale)); ?>"
                        tabindex="0"
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
<?php $component->withAttributes(['class' => 'h-4 w-4','aria-hidden' => 'true']); ?>
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
                
                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-chevron-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 text-muted-foreground','aria-hidden' => 'true']); ?>
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
        </div>


        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute z-50 min-w-fit w-auto mt-2"
            style="display: none;"
        >
            <?php if (isset($component)) { $__componentOriginalcda98dd4562148b99dced84fc8ed9e77 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcda98dd4562148b99dced84fc8ed9e77 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Calendar::resolve(['value' => $range ? ['start' => $startDate?->toDateString(), 'end' => $endDate?->toDateString()] : $startDate?->toDateString(),'initialDate' => $initialDate->toIso8601String(),'weekStart' => $weekStart,'multiple' => $multiple,'visibleMonths' => $visibleMonths,'range' => $range,'locale' => $locale,'presets' => !empty($presets),'selecting' => $selecting,'updating' => $updating,'minDate' => $minDate,'maxDate' => $maxDate,'disabledDates' => $disabledDates,'showClearButton' => $showClearButton,'closeOnSelect' => $closeOnSelect] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
</div><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/form/datepicker.blade.php ENDPATH**/ ?>