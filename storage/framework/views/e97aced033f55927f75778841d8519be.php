<?php
    $colorPickerId = $id ?? null;
    $initialColor = $value ?? ($defaultColor ?? '#6366f1');
    $showAlphaControl = $showAlpha ?? false;
    $allowCustomColors = $allowCustom ?? true;
    $includeBrandColors = $brandColors ?? true;
    $colorFormat = $format ?? 'hex';
    $initialAlpha = $alpha ?? 1;
    

    if ($initialColor && (str_contains($initialColor, 'rgba') || str_contains($initialColor, 'hsla'))) {

        if (preg_match('/rgba\s*\(\s*[^,]+\s*,\s*[^,]+\s*,\s*[^,]+\s*,\s*([\d.]+)\s*\)/', $initialColor, $matches)) {
            $extractedAlpha = (float) $matches[1];

            if (!isset($alpha)) {
                $initialAlpha = $extractedAlpha;
            }
        } elseif (preg_match('/hsla\s*\(\s*[^,]+\s*,\s*[^,]+\s*,\s*[^,]+\s*,\s*([\d.]+)\s*\)/', $initialColor, $matches)) {
            $extractedAlpha = (float) $matches[1];

            if (!isset($alpha)) {
                $initialAlpha = $extractedAlpha;
            }
        }
    }
    

    $hasWireModel = $attributes->has('wire:model');
    
?>

<div>
    <div
        <?php if($hasWireModel): ?>
        x-data="strataColorPicker({
            value: <?php if ((object) ($attributes->get('wire:model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->get('wire:model')->value()); ?>')<?php echo e($attributes->get('wire:model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->get('wire:model')); ?>')<?php endif; ?>,
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
        @keydown.escape="close()"
        @keydown.enter="toggle()"
        @keydown.space.prevent="toggle()"
        @keydown.arrow-down.prevent="open = true"
        @keydown.tab="close()"
        class="relative"
    >
        <!-- Trigger Input (styled like other form inputs) -->
        <button
            type="button"
            @click="toggle()"
            :disabled="<?php echo json_encode($disabled ?? false, 15, 512) ?>"
            <?php echo e($attributes->except(['wire:model'])); ?>

            :aria-expanded="open"
            aria-haspopup="dialog"
            :aria-label="displayValue ? `Selected color: ${displayValue}` : '<?php echo e($placeholder ?? 'Select color'); ?>'"
            class="w-full px-3 py-2 text-sm bg-background border border-input rounded-md focus:outline-hidden focus:ring-2 focus:ring-ring focus:border-ring disabled:cursor-not-allowed disabled:opacity-50 transition-colors duration-200 flex items-center justify-between hover:bg-accent/50"
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
            role="dialog"
            aria-modal="true"
            aria-label="Color picker"
            class="absolute z-50 mt-1 w-80 bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border"
            style="display: none;"
        >
            <div class="p-4 space-y-4">

                <!-- Main Color Picker Section -->
                <div class="grid grid-cols-5 gap-4">
                    <!-- Left: Color Canvas -->
                    <div class="col-span-3 space-y-3">
                        <!-- Color Canvas -->
                        <div class="relative">
                            <canvas
                                x-ref="pickerCanvas"
                                @mousedown="handlePickerMouseDown($event)"
                                width="200"
                                height="120"
                                class="w-full h-30 cursor-crosshair rounded-md border border-border"
                            ></canvas>
                            
                            <!-- Picker Crosshair -->
                            <div
                                class="absolute w-3 h-3 border-2 border-white rounded-full pointer-events-none shadow-xs"
                                :style="`left: calc(${getPickerPosition().x}px - 6px); top: calc(${getPickerPosition().y}px - 6px);`"
                            ></div>
                        </div>

                        <!-- Sliders -->
                        <div class="space-y-2">
                            <!-- Hue Slider -->
                            <div class="relative">
                                <canvas
                                    x-ref="hueCanvas"
                                    @mousedown="handleHueMouseDown($event)"
                                    width="200"
                                    height="12"
                                    class="w-full h-3 cursor-pointer rounded-sm border border-border"
                                ></canvas>
                                
                                <!-- Hue Handle -->
                                <div
                                    class="absolute w-3 h-5 bg-white border border-border rounded-sm shadow-xs pointer-events-none"
                                    :style="`left: calc(${getHuePosition().x}px - 6px); top: -4px;`"
                                ></div>
                            </div>

                            <!-- Alpha Slider -->
                            <div x-show="showAlpha" class="relative">
                                <div
                                    x-ref="alphaSlider"
                                    @mousedown="handleAlphaMouseDown($event)"
                                    class="w-full h-3 cursor-pointer rounded-sm border border-border relative overflow-hidden"
                                    style="background: linear-gradient(45deg, #ccc 25%, transparent 25%), linear-gradient(-45deg, #ccc 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #ccc 75%), linear-gradient(-45deg, transparent 75%, #ccc 75%); background-size: 6px 6px; background-position: 0 0, 0 3px, 3px -3px, -3px 0px;"
                                >
                                    <!-- Alpha Gradient Overlay -->
                                    <div
                                        class="absolute inset-0"
                                        :style="getAlphaGradientStyle()"
                                    ></div>
                                </div>
                                
                                <!-- Alpha Handle -->
                                <div
                                    class="absolute w-3 h-5 bg-white border border-border rounded-sm shadow-xs pointer-events-none"
                                    :style="`left: calc(${getAlphaPosition().x}px - 6px); top: -4px;`"
                                ></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Controls & Preview -->
                    <div class="col-span-2 space-y-3">
                        <!-- Current Color Preview -->
                        <div class="space-y-2">
                            <div class="text-xs font-medium text-muted-foreground">Current</div>
                            <div 
                                class="w-full h-16 rounded-md border border-border"
                                :style="getPreviewStyle()"
                            ></div>
                        </div>

                        <!-- Format Selector -->
                        <div class="space-y-2">
                            <div class="text-xs font-medium text-muted-foreground">Format</div>
                            <div class="grid grid-cols-2 gap-1">
                                <template x-for="fmt in getAvailableFormats()" :key="fmt.key">
                                    <button
                                        type="button"
                                        @click="changeFormat(fmt.key)"
                                        :class="format === fmt.key ? 'bg-primary text-primary-foreground' : 'bg-muted text-muted-foreground hover:bg-accent hover:text-accent-foreground'"
                                        class="px-2 py-1 text-xs font-medium rounded-sm transition-colors duration-150"
                                        x-text="fmt.label"
                                    ></button>
                                </template>
                            </div>
                        </div>

                        <!-- Live Color Input -->
                        <div class="space-y-2">
                            <div class="text-xs font-medium text-muted-foreground">Value</div>
                            <input
                                x-model="displayValue"
                                @input="handleColorInput()"
                                @keydown.enter="handleColorInput()"
                                @keydown.escape="$el.blur()"
                                @keydown.tab="close()"
                                type="text"
                                placeholder="Enter color value"
                                aria-label="Color value input"
                                aria-describedby="color-input-help"
                                class="w-full px-2 py-1 text-xs font-mono bg-background border border-input rounded-sm focus:outline-hidden focus:ring-1 focus:ring-ring focus:border-ring"
                                :class="inputError ? 'border-destructive focus:border-destructive focus:ring-destructive' : ''"
                            />
                            
                            <template x-if="inputError">
                                <div class="text-destructive text-xs" role="alert" aria-live="polite">
                                    Invalid color format
                                </div>
                            </template>
                            
                            <div id="color-input-help" class="text-xs text-muted-foreground sr-only">
                                Enter color in hex, rgb, hsl, or other supported format
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Brand Colors Section -->
                <template x-if="brandColors && Object.keys(availableBrandColors).length > 0">
                    <div class="border-t border-border pt-4 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="text-sm font-medium text-foreground">Brand Colors</div>
                            <!-- Search input -->
                            <input
                                type="text"
                                placeholder="Search..."
                                x-model="colorSearchQuery"
                                class="w-24 px-2 py-1 text-xs bg-background border border-input rounded-sm focus:outline-hidden focus:ring-1 focus:ring-ring focus:border-ring"
                            />
                        </div>
                        
                        <template x-for="(colors, category) in getBrandColorsByCategory()" :key="category">
                            <div class="space-y-2" x-show="colors.length > 0">
                                <!-- Category Header -->
                                <div class="text-xs font-medium text-muted-foreground capitalize" x-text="category"></div>
                                
                                <!-- Color Grid -->
                                <div class="grid grid-cols-8 gap-1">
                                    <template x-for="brandColor in colors.slice(0, 8)" :key="brandColor.key">
                                        <button
                                            type="button"
                                            @click="selectBrandColor(brandColor.key)"
                                            class="group relative w-6 h-6 rounded-sm border border-border hover:scale-110 transition-all duration-150 focus:outline-hidden focus:ring-1 focus:ring-ring"
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
<?php $component->withAttributes(['class' => 'h-3 w-3 text-white drop-shadow-lg']); ?>
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
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>

                <!-- Color Palette Section -->
                <div class="border-t border-border pt-4 space-y-3">
                    <div class="text-sm font-medium text-foreground">Similar Colors</div>
                    <div class="grid grid-cols-9 gap-1">
                        <template x-for="paletteColor in getColorPalette()" :key="paletteColor.lightness">
                            <button
                                type="button"
                                @click="selectPaletteColor(paletteColor)"
                                class="w-6 h-6 rounded-sm border border-border hover:scale-110 transition-transform duration-150"
                                :style="`background-color: ${paletteColor.hex};`"
                                :title="`Lightness: ${paletteColor.lightness}%`"
                            ></button>
                        </template>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="border-t border-border pt-4">
                    <div class="flex gap-2">
                        <button
                            x-show="displayValue"
                            @click="copyColor()"
                            type="button"
                            class="flex-1 px-3 py-2 text-sm bg-muted hover:bg-accent text-muted-foreground hover:text-accent-foreground rounded-md transition-colors duration-150 flex items-center justify-center gap-2"
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
                            Copy
                        </button>
                        <template x-if="clearable">
                            <button
                                x-show="displayValue"
                                @click="clearColor()"
                                type="button"
                                class="px-3 py-2 text-sm text-muted-foreground hover:text-destructive rounded-md transition-colors duration-150"
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
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden Input for Form Submission -->
        <!--[if BLOCK]><![endif]--><?php if($name): ?>
            <input type="hidden" name="<?php echo e($name); ?>" :value="value" />
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/form/color-picker.blade.php ENDPATH**/ ?>