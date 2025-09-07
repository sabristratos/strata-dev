<?php
    $colorPickerId = $id ?? null;
    $initialColor = $value ?? ($defaultColor ?? '#6366f1');
    $showAlphaControl = $showAlpha ?? false;
    $allowCustomColors = $allowCustom ?? true;
    $includeBrandColors = $brandColors ?? true;
    $colorFormat = $format ?? 'hex';
    $initialAlpha = $alpha ?? 1;
    
    // Extract alpha from defaultColor if it contains alpha information
    if ($initialColor && (str_contains($initialColor, 'rgba') || str_contains($initialColor, 'hsla'))) {
        // Parse RGBA: rgba(r, g, b, a) or HSLA: hsla(h, s%, l%, a)
        if (preg_match('/rgba\s*\(\s*[^,]+\s*,\s*[^,]+\s*,\s*[^,]+\s*,\s*([\d.]+)\s*\)/', $initialColor, $matches)) {
            $extractedAlpha = (float) $matches[1];
            // Use extracted alpha if no explicit alpha was provided via attribute
            if (!isset($alpha)) {
                $initialAlpha = $extractedAlpha;
            }
        } elseif (preg_match('/hsla\s*\(\s*[^,]+\s*,\s*[^,]+\s*,\s*[^,]+\s*,\s*([\d.]+)\s*\)/', $initialColor, $matches)) {
            $extractedAlpha = (float) $matches[1];
            // Use extracted alpha if no explicit alpha was provided via attribute
            if (!isset($alpha)) {
                $initialAlpha = $extractedAlpha;
            }
        }
    }
    
    // Pre-check for wire model to avoid Blade directives in x-data
    $hasWireModel = $attributes->wire('model');
    
?>

<div>
    <div
        <?php if($hasWireModel): ?>
        x-data="strataColorPicker({
            value: <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?>,
            defaultColor: <?php echo \Illuminate\Support\Js::from($initialColor)->toHtml() ?>,
            format: <?php echo \Illuminate\Support\Js::from($colorFormat)->toHtml() ?>,
            showAlpha: <?php echo e($showAlphaControl ? 'true' : 'false'); ?>,
            allowCustom: <?php echo e($allowCustomColors ? 'true' : 'false'); ?>,
            brandColors: <?php echo e($includeBrandColors ? 'true' : 'false'); ?>,
            alpha: <?php echo e($initialAlpha); ?>,
            variant: <?php echo \Illuminate\Support\Js::from($variant ?? 'default')->toHtml() ?>
        })"
        <?php else: ?>
        x-data="strataColorPicker({
            value: <?php echo \Illuminate\Support\Js::from($initialColor)->toHtml() ?>,
            defaultColor: <?php echo \Illuminate\Support\Js::from($initialColor)->toHtml() ?>,
            format: <?php echo \Illuminate\Support\Js::from($colorFormat)->toHtml() ?>,
            showAlpha: <?php echo e($showAlphaControl ? 'true' : 'false'); ?>,
            allowCustom: <?php echo e($allowCustomColors ? 'true' : 'false'); ?>,
            brandColors: <?php echo e($includeBrandColors ? 'true' : 'false'); ?>,
            alpha: <?php echo e($initialAlpha); ?>,
            variant: <?php echo \Illuminate\Support\Js::from($variant ?? 'default')->toHtml() ?>
        })"
        <?php endif; ?>
        @click.outside="close()"
        @keydown="handleKeydown($event)"
        class="relative"
    >
        <!-- Trigger Button -->
        <button
            type="button"
            @click="toggle()"
            :disabled="<?php echo json_encode($disabled ?? false, 15, 512) ?>"
            <?php echo e($attributes->except(['wire:model'])); ?>

            class="<?php echo e($getVariantClasses()); ?> flex items-center justify-between"
        >
            <div class="flex items-center gap-2">
                <!-- Color Preview -->
                <div 
                    class="w-6 h-6 button-radius border border-border flex-shrink-0"
                    :style="getPreviewStyle()"
                ></div>
                
                <!-- Display Value -->
                <span 
                    x-show="displayValue" 
                    x-text="displayValue"
                    class="font-mono text-sm"
                ></span>
                <span 
                    x-show="!displayValue" 
                    class="text-muted-foreground"
                >
                    <?php echo e($placeholder ?? 'Select color'); ?>

                </span>
            </div>
            
            <!-- Dropdown Icon -->
            <div class="flex items-center gap-2">
                <!--[if BLOCK]><![endif]--><?php if($clearable ?? false): ?>
                    <button
                        x-show="displayValue"
                        @click.stop="clearColor()"
                        type="button"
                        class="text-muted-foreground hover:text-primary transition-colors duration-150"
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
                
                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-chevron-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 text-muted-foreground transition-transform duration-200','x-bind:class' => 'open ? \'rotate-180\' : \'\'']); ?>
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
        </button>

        <!-- Color Picker Dropdown -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute z-50 mt-1 w-80 bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border"
            style="display: none;"
        >
            <div class="p-4">
                <!-- Tab Navigation -->
                <div class="flex gap-1 mb-4 p-1 bg-muted button-radius">
                    <button
                        type="button"
                        @click="switchTab('picker')"
                        :class="getTabClasses('picker')"
                    >
                        Picker
                    </button>
                    
                    <template x-if="brandColors && Object.keys(availableBrandColors).length > 0">
                        <button
                            type="button"
                            @click="switchTab('brand')"
                            :class="getTabClasses('brand')"
                        >
                            Brand
                        </button>
                    </template>
                    
                    <template x-if="allowCustom">
                        <button
                            type="button"
                            @click="switchTab('input')"
                            :class="getTabClasses('input')"
                        >
                            Input
                        </button>
                    </template>
                </div>

                <!-- Color Picker Tab -->
                <div x-show="activeTab === 'picker'" class="space-y-4">
                    <!-- Main Color Picker Area -->
                    <div class="relative">
                        <canvas
                            x-ref="pickerCanvas"
                            @mousedown="handlePickerMouseDown($event)"
                            width="280"
                            height="160"
                            class="w-full h-40 cursor-crosshair button-radius border border-border"
                        ></canvas>
                        
                        <!-- Picker Crosshair -->
                        <div
                            class="absolute w-3 h-3 border-2 border-white rounded-full pointer-events-none shadow-sm"
                            :style="`left: calc(${getPickerPosition().x}px - 6px); top: calc(${getPickerPosition().y}px - 6px);`"
                        ></div>
                    </div>

                    <!-- Hue Slider -->
                    <div class="relative">
                        <canvas
                            x-ref="hueCanvas"
                            @mousedown="handleHueMouseDown($event)"
                            width="280"
                            height="16"
                            class="w-full h-4 cursor-pointer button-radius border border-border"
                        ></canvas>
                        
                        <!-- Hue Handle -->
                        <div
                            class="absolute w-4 h-6 bg-white border-2 border-border rounded shadow-sm pointer-events-none"
                            :style="`left: calc(${getHuePosition().x}px - 8px); top: -4px;`"
                        ></div>
                    </div>

                    <!-- Alpha Slider -->
                    <div x-show="showAlpha" class="relative">
                        <div
                            x-ref="alphaSlider"
                            @mousedown="handleAlphaMouseDown($event)"
                            class="w-full h-4 cursor-pointer button-radius border border-border relative overflow-hidden"
                            style="background: linear-gradient(45deg, #ccc 25%, transparent 25%), linear-gradient(-45deg, #ccc 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #ccc 75%), linear-gradient(-45deg, transparent 75%, #ccc 75%); background-size: 8px 8px; background-position: 0 0, 0 4px, 4px -4px, -4px 0px;"
                        >
                            <!-- Alpha Gradient Overlay -->
                            <div
                                class="absolute inset-0"
                                :style="getAlphaGradientStyle()"
                            ></div>
                        </div>
                        
                        <!-- Alpha Handle -->
                        <div
                            class="absolute w-4 h-6 bg-white border-2 border-border rounded shadow-sm pointer-events-none"
                            :style="`left: calc(${getAlphaPosition().x}px - 8px); top: -4px;`"
                        ></div>
                    </div>

                    <!-- Color Palette -->
                    <div class="space-y-2">
                        <div class="text-xs font-medium text-muted-foreground">Similar Colors</div>
                        <div class="grid grid-cols-9 gap-1">
                            <template x-for="paletteColor in getColorPalette()" :key="paletteColor.lightness">
                                <button
                                    type="button"
                                    @click="selectPaletteColor(paletteColor)"
                                    class="w-6 h-6 button-radius-sm border border-border hover:scale-110 transition-transform duration-150"
                                    :style="`background-color: ${paletteColor.hex};`"
                                    :title="`Lightness: ${paletteColor.lightness}%`"
                                ></button>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Brand Colors Tab -->
                <template x-if="brandColors && Object.keys(availableBrandColors).length > 0">
                    <div x-show="activeTab === 'brand'" class="space-y-6">
                        <!-- Color Search -->
                        <div class="space-y-2">
                            <input
                                type="text"
                                placeholder="Search colors..."
                                x-model="colorSearchQuery"
                                class="input-base w-full text-sm"
                            />
                        </div>
                        
                        <template x-for="(colors, category) in getBrandColorsByCategory()" :key="category">
                            <div class="space-y-3" x-show="colors.length > 0">
                                <!-- Category Header -->
                                <div class="flex items-center justify-between">
                                    <h4 class="text-sm font-semibold text-foreground capitalize" x-text="category"></h4>
                                    <span class="text-xs text-muted-foreground" x-text="`${colors.length} colors`"></span>
                                </div>
                                
                                <!-- Color Grid -->
                                <div class="grid grid-cols-6 gap-2">
                                    <template x-for="brandColor in colors" :key="brandColor.key">
                                        <div class="space-y-1">
                                            <button
                                                type="button"
                                                @click="selectBrandColor(brandColor.key)"
                                                class="group relative w-full aspect-square button-radius border border-border hover:scale-110 hover:shadow-md transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2"
                                                :style="`background-color: ${brandColor.value};`"
                                                :title="`${brandColor.name} - ${brandColor.value}`"
                                            >
                                                <!-- Selected Indicator -->
                                                <template x-if="displayValue === brandColor.value">
                                                    <div class="absolute inset-0 flex items-center justify-center">
                                                        <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 text-white drop-shadow-lg']); ?>
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
                                                </template>
                                            </button>
                                            
                                            <!-- Color Name -->
                                            <div class="text-xs text-center text-muted-foreground truncate" x-text="brandColor.variant || brandColor.name.split(' ').pop()"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                        
                        <!-- No Results -->
                        <template x-if="colorSearchQuery && Object.values(getBrandColorsByCategory()).every(colors => colors.length === 0)">
                            <div class="text-center py-6 text-muted-foreground">
                                <div class="text-sm">No colors found matching "<span x-text="colorSearchQuery"></span>"</div>
                            </div>
                        </template>
                    </div>
                </template>

                <!-- Manual Input Tab -->
                <template x-if="allowCustom">
                    <div x-show="activeTab === 'input'" class="space-y-4">
                        <!-- Format Selector -->
                        <div class="flex gap-1">
                            <template x-for="fmt in getAvailableFormats()" :key="fmt.key">
                                <button
                                    type="button"
                                    @click="changeFormat(fmt.key)"
                                    :class="format === fmt.key ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground hover:bg-accent hover:text-accent-foreground'"
                                    class="px-2 py-1 text-xs font-medium button-radius-sm transition-colors duration-150"
                                    x-text="fmt.label"
                                ></button>
                            </template>
                        </div>

                        <!-- Color Input -->
                        <div class="space-y-2">
                            <input
                                x-model="displayValue"
                                @input="handleColorInput()"
                                @keydown.enter="handleColorInput()"
                                type="text"
                                placeholder="Enter color value"
                                class="input-base w-full font-mono"
                                :class="inputError ? 'border-destructive focus:border-destructive focus:ring-destructive' : ''"
                            />
                            
                            <template x-if="inputError">
                                <div class="text-destructive text-xs">
                                    Invalid color format. Please check your input.
                                </div>
                            </template>
                        </div>

                        <!-- Copy Button -->
                        <button
                            x-show="displayValue"
                            @click="copyColor()"
                            type="button"
                            class="btn-secondary text-sm w-full flex items-center justify-center gap-2"
                        >
                            <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-clipboard-document'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                            Copy Color
                        </button>
                    </div>
                </template>

                <!-- Color Info Footer -->
                <template x-if="currentColor">
                    <div class="mt-4 pt-4 border-t border-border">
                        <!-- Current Color Display -->
                        <div class="flex items-center gap-3 mb-3">
                            <div 
                                class="w-8 h-8 button-radius border border-border flex-shrink-0"
                                :style="getPreviewStyle()"
                            ></div>
                            <div class="flex-1 min-w-0">
                                <div class="font-mono text-sm truncate" x-text="displayValue"></div>
                                <template x-if="showAlpha && alpha < 1">
                                    <div class="text-xs text-muted-foreground">
                                        Alpha: <span x-text="Math.round(alpha * 100) + '%'"></span>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>
                </template>
            </div>
        </div>

        <!-- Hidden Input for Form Submission -->
        <!--[if BLOCK]><![endif]--><?php if($name): ?>
            <input type="hidden" name="<?php echo e($name); ?>" :value="value" />
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/form/color-picker.blade.php ENDPATH**/ ?>