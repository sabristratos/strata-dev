<?php
    $selectId = $id;
    $itemCount = count($items);
    $initialSelected = $multiple ? (is_array($selected) ? $selected : []) : $selected;
    $isSearchable = $searchable || count($items) >= $searchThreshold;
?>

<div>

    <div
        x-data="strataSelect({
            highlighted: <?php echo \Illuminate\Support\Js::from($multiple ? 0 : ($selected ?? 0))->toHtml() ?>,
            count: <?php echo e($itemCount); ?>,
            multiple: <?php echo e($multiple ? 'true' : 'false'); ?>,
            maxSelections: <?php echo e($maxSelections); ?>,
            <?php if($attributes->has('wire:model')): ?>
            value: <?php if ((object) ($attributes->get('wire:model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->get('wire:model')->value()); ?>')<?php echo e($attributes->get('wire:model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->get('wire:model')); ?>')<?php endif; ?>,
            <?php else: ?>
            initialSelected: <?php echo \Illuminate\Support\Js::from($initialSelected)->toHtml() ?>,
            <?php endif; ?>
            items: <?php echo \Illuminate\Support\Js::from($items)->toHtml() ?>,
            searchable: <?php echo e($isSearchable ? 'true' : 'false'); ?>

        })"
        @click.outside="close()"
        @keydown.escape.window="close()"
        class="relative"
    >
        <button
            x-ref="trigger"
            @click="toggle()"
            @keydown="handleTriggerKeydown($event)"
            type="button"
            :disabled="<?php echo json_encode($disabled, 15, 512) ?>"
            <?php echo e($attributes->except(['wire:model'])); ?>

            class="<?php echo e($getVariantClasses()); ?> flex items-center justify-between <?php echo e($variant === 'minimal' ? '' : 'pl-3'); ?>"
            :class="<?php echo json_encode($clearable, 15, 512) ?> && hasSelection() ? 'pr-16' : 'pr-10'"
        >
            <div class="flex items-center gap-1 flex-1 min-w-0">
                <template x-if="multiple && Array.isArray(value) && value.length > 0">
                    <div class="flex items-center gap-1 flex-nowrap min-w-0 overflow-hidden">
                        <template x-for="selectedIndex in getVisibleTags()" :key="'tag-' + selectedIndex">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 button-radius-sm bg-primary/20 text-primary text-xs flex-shrink-0">
                                <span x-text="items[selectedIndex]" class="truncate max-w-16"></span>
                                <button 
                                    type="button" 
                                    @click.stop="toggleSelection(selectedIndex)"
                                    class="hover:text-primary/70 flex-shrink-0"
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
<?php $component->withAttributes(['class' => 'h-3 w-3']); ?>
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
                            </span>
                        </template>
                        <span x-show="getRemainingCount() > 0" class="text-muted-foreground text-xs flex-shrink-0 whitespace-nowrap"
                              x-text="'+' + getRemainingCount() + ' more'"></span>
                    </div>
                </template>
                
                <template x-if="!multiple">
                    <span x-show="getDisplayText()" x-text="getDisplayText()"></span>
                </template>
                
                <span x-show="getDisplayText() === ''" class="text-muted-foreground"><?php echo e($placeholder); ?></span>
            </div>
        </button>

        <!-- Clear and dropdown buttons -->
        <div class="absolute inset-y-0 right-0 flex items-center">
            <!--[if BLOCK]><![endif]--><?php if($clearable): ?>
                <button
                    x-show="hasSelection()"
                    x-on:click.stop="clearSelection()"
                    type="button"
                    class="pr-2 text-muted-foreground hover:text-primary focus:outline-hidden focus:text-primary transition-colors duration-200"
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
<?php $component->withAttributes(['class' => 'h-4 w-4']); ?>
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
            
            <div class="pr-3 pointer-events-none">
                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-chevron-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => '!open','class' => 'h-5 w-5 text-muted-foreground transition-transform duration-200']); ?>
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
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-chevron-up'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'open','class' => 'h-5 w-5 text-muted-foreground transition-transform duration-200']); ?>
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
            class="absolute z-50 w-full mt-1"
            style="display: none;"
        >
            <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border max-h-60 overflow-hidden flex flex-col">
                <!-- Search Input (when searchable) -->
                <template x-if="searchable">
                    <div class="p-2 border-b border-border">
                        <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['type' => 'text','placeholder' => $searchPlaceholder,'clearable' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-model' => 'searchQuery','x-on:input' => 'filterItems()','x-on:keydown' => 'handleSearchKeydown($event)','x-ref' => 'searchInput','class' => 'h-8 text-sm']); ?>
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
                </template>

                <!-- Options List -->
                <div class="flex-1 overflow-auto p-1">
                    <!-- No Results Message -->
                    <template x-if="searchable && filteredItems.length === 0 && searchQuery">
                        <div class="px-3 py-2 text-sm text-muted-foreground text-center">
                            No results found
                        </div>
                    </template>

                    <!-- Filtered Items (when searchable) -->
                    <template x-if="searchable">
                        <template x-for="(item, index) in filteredItems" :key="'filtered-' + (filteredIndices[index] || index) + '-' + item">
                            <button
                                type="button"
                                x-on:click="multiple ? selectMultiple(filteredIndices[index]) : selectSingle(filteredIndices[index])"
                                x-on:mouseover="highlightOption(index)"
                                :class="highlighted === index ? 'bg-accent text-accent-foreground' : 'text-foreground'"
                                class="w-full text-left px-3 py-2 text-sm cursor-pointer button-radius transition-colors duration-150 flex items-center justify-between hover:bg-accent hover:text-accent-foreground"
                                :disabled="isOptionDisabled(filteredIndices[index])"
                            >
                                <span x-text="item"></span>
                                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'isSelected(filteredIndices[index])','class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('h-5 w-5')]); ?>
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
                        </template>
                    </template>

                    <!-- Static Items (when not searchable) -->
                    <template x-if="!searchable">
                        <div>
                            <template x-for="(item, index) in Object.entries(items)" :key="'item-' + item[0] + '-' + index">
                                <button
                                    type="button"
                                    x-on:click="multiple ? selectMultiple(item[0]) : selectSingle(item[0])"
                                    x-on:mouseover="highlightOption(index)"
                                    :class="highlighted === index ? 'bg-accent text-accent-foreground' : 'text-foreground'"
                                    class="w-full text-left px-3 py-2 text-sm cursor-pointer button-radius transition-colors duration-150 flex items-center justify-between hover:bg-accent hover:text-accent-foreground"
                                    :disabled="isOptionDisabled(item[0])"
                                >
                                    <span x-text="item[1]"></span>
                                    <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'isSelected(item[0])','class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('h-5 w-5')]); ?>
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
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!--[if BLOCK]><![endif]--><?php if($name): ?>
            <template x-if="multiple">
                <div>
                    <template x-for="(selectedValue, index) in Array.isArray(value) ? value : []" :key="'hidden-' + selectedValue + '-' + index">
                        <input type="hidden" :name="'<?php echo e($name); ?>[' + index + ']'" :value="selectedValue" />
                    </template>
                </div>
            </template>
            <template x-if="!multiple">
                <input type="hidden" name="<?php echo e($name); ?>" :value="value" />
            </template>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/form/select.blade.php ENDPATH**/ ?>