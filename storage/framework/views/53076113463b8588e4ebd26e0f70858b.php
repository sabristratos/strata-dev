<?php
    $hasLeadingSlot = isset($leading);
    $hasTrailingSlot = isset($trailing);
    $hasIcon = !empty($icon);
    $hasClearable = $clearable;
    $hasPasswordToggle = $showPasswordToggle && $type === 'password';
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

    
    <div
        x-data="{
            /** @type {string} Current input value */
            value: <?php if($attributes->wire('model')): ?> <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?> <?php else: ?> '<?php echo e($value); ?>' <?php endif; ?>,
            /** @type {string} Input type */
            type: '<?php echo e($type); ?>',
            /** @type {boolean} Whether this is a password input */
            isPassword: '<?php echo e($type === 'password'); ?>',
            /** @type {boolean} Whether password is currently visible */
            showPassword: false,

            /**
             * Get the current input type, handling password visibility
             * @returns {string} The input type to use
             */
            get inputType() {
                return this.isPassword && !this.showPassword ? 'password' : (this.isPassword ? 'text' : this.type);
            },

            /**
             * Check if input has a value
             * @returns {boolean} Whether input has content
             */
            get hasValue() {
                return this.value && this.value.toString().length > 0;
            },

            /**
             * Clear the input value and focus the field
             */
            clearInput() {
                this.value = '';
                this.$refs.input.focus();
                this.$dispatch('input-cleared', { name: '<?php echo e($name); ?>' });
            },

            /**
             * Toggle password visibility and focus the field
             */
            togglePassword() {
                this.showPassword = !this.showPassword;
                this.$refs.input.focus();
                this.$dispatch('password-toggled', { visible: this.showPassword });
            }
        }"
    >
        
        <div 
            class="<?php echo e($getWrapperClasses()); ?>"
            @click="$refs.input.focus()"
            :class="{ 'opacity-50': <?php echo e($disabled ? 'true' : 'false'); ?> }"
            <?php echo e($attributes->except(['wire:model', 'id', 'name', 'placeholder', 'required', 'disabled', 'readonly', 'type'])); ?>

        >
            
            <!--[if BLOCK]><![endif]--><?php if($hasIcon || $hasLeadingSlot): ?>
                <div class="flex items-center px-3 py-2">
                    <!--[if BLOCK]><![endif]--><?php if(isset($leading)): ?>
                        <?php echo e($leading); ?>

                    <?php elseif($hasIcon): ?>
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
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <input
                x-ref="input"
                :type="inputType"
                x-model="value"
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
                class="<?php echo e($getInputClasses()); ?>"
            />

            
            <!--[if BLOCK]><![endif]--><?php if($hasClearable || $hasPasswordToggle || $hasTrailingSlot): ?>
                <div class="flex items-center px-3 py-2 gap-1">
                    <!--[if BLOCK]><![endif]--><?php if(isset($trailing)): ?>
                        <?php echo e($trailing); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    
                    <!--[if BLOCK]><![endif]--><?php if($hasClearable): ?>
                        <button
                            type="button"
                            x-show="hasValue"
                            x-on:click.stop="clearInput()"
                            class="text-muted-foreground hover:text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:text-foreground transition-colors duration-200 rounded-sm p-0.5"
                            aria-label="Clear input"
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

                    <!--[if BLOCK]><![endif]--><?php if($hasPasswordToggle): ?>
                        <button
                            type="button"
                            x-on:click.stop="togglePassword()"
                            class="text-muted-foreground hover:text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:text-foreground transition-colors duration-200 rounded-sm p-0.5"
                            :aria-label="showPassword ? 'Hide password' : 'Show password'"
                            tabindex="0"
                        >
                            <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-eye'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => '!showPassword','class' => 'h-4 w-4','aria-hidden' => 'true']); ?>
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
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-eye-slash'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'showPassword','class' => 'h-4 w-4','aria-hidden' => 'true']); ?>
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
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
</div><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/form/input.blade.php ENDPATH**/ ?>