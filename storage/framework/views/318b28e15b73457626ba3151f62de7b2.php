<?php
    $editorId = $id ?: 'editor-' . Str::random(8);
    $isDisabled = $disabled ?? false;


    $editorAttributes = [
        'x-ref' => 'editor',
        'class' => 'block w-full p-4 text-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-card prose prose-sm max-w-none [&_ul]:list-disc [&_ul]:ml-6 [&_ol]:list-decimal [&_ol]:ml-6 [&_p]:font-normal [&_h1]:text-2xl [&_h1]:font-bold [&_h1]:mt-6 [&_h1]:mb-4 [&_h2]:text-xl [&_h2]:font-bold [&_h2]:mt-5 [&_h2]:mb-3 [&_h3]:text-lg [&_h3]:font-bold [&_h3]:mt-4 [&_h3]:mb-2 [&_h4]:text-base [&_h4]:font-bold [&_h4]:mt-3 [&_h4]:mb-2 [&_h5]:text-sm [&_h5]:font-bold [&_h5]:mt-2 [&_h5]:mb-1 [&_h6]:text-xs [&_h6]:font-bold [&_h6]:mt-2 [&_h6]:mb-1',
        'style' => 'min-height: ' . $minHeight . 'px;' . ($maxHeight ? ' max-height: ' . $maxHeight . 'px; overflow-y: auto;' : ''),
        '@input' => 'update'
    ];

    if ($id) $editorAttributes['id'] = $id;
    if ($isDisabled) {
        $editorAttributes['readonly'] = 'readonly';
    } else {
        $editorAttributes['contenteditable'] = 'true';
    }
    if ($placeholder) $editorAttributes['data-placeholder'] = $placeholder;


    $hiddenInputAttributes = [
        'type' => 'hidden',
        'x-model' => 'content'
    ];
    if ($name) $hiddenInputAttributes['name'] = $name;
?>

<div
    x-data="strataEditor({ initialValue: <?php echo \Illuminate\Support\Js::from($value ?? '')->toHtml() ?> })"
    class="w-full"
>
    <div class="overflow-hidden bg-card">
        <div class="flex items-center gap-1 p-2 bg-muted/50">
            <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','type' => 'button','disabled' => $isDisabled] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'format(\'bold\')','class' => '!w-8 !h-8 !p-0 flex-shrink-0','x-bind:class' => 'activeFormats.bold ? \'bg-accent text-accent-foreground\' : \'\'']); ?>
                <strong class="font-bold">B</strong>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','type' => 'button','disabled' => $isDisabled] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'format(\'italic\')','class' => '!w-8 !h-8 !p-0 flex-shrink-0','x-bind:class' => 'activeFormats.italic ? \'bg-accent text-accent-foreground\' : \'\'']); ?>
                <em class="italic">I</em>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','type' => 'button','disabled' => $isDisabled] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'format(\'underline\')','class' => '!w-8 !h-8 !p-0 flex-shrink-0','x-bind:class' => 'activeFormats.underline ? \'bg-accent text-accent-foreground\' : \'\'']); ?>
                <span class="underline">U</span>
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

            <div class="w-px h-6 bg-muted mx-1"></div>

            <div
                x-data="{
                    headingOpen: false,
                    headingOptions: {
                        'p': 'Normal',
                        'h1': 'Heading 1',
                        'h2': 'Heading 2',
                        'h3': 'Heading 3',
                        'h4': 'Heading 4',
                        'h5': 'Heading 5',
                        'h6': 'Heading 6'
                    }
                }"
                @click.outside="headingOpen = false"
                class="relative"
            >
                <button
                    @click="headingOpen = !headingOpen"
                    type="button"
                    x-ref="headingTrigger"
                    :disabled="<?php echo \Illuminate\Support\Js::from($isDisabled)->toHtml() ?>"
                    class="select-minimal min-w-20 text-xs flex items-center justify-between gap-1 px-2 py-1 text-foreground hover:bg-muted"
                >
                    <span x-text="headingOptions[headingLevel] || 'Format'"></span>
                    <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-chevron-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-3 w-3 text-muted-foreground']); ?>
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

                <template x-teleport="body">
                    <div
                        x-show="headingOpen"
                        x-anchor.bottom-start.offset.4="$refs.headingTrigger"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute z-50 w-56"
                        style="display: none;"
                    >
                        <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border">
                            <template x-for="[key, label] in Object.entries(headingOptions)" :key="key">
                                <button
                                    type="button"
                                    @click="setHeading(key); headingOpen = false"
                                    class="w-full text-left px-2 py-1 text-xs cursor-pointer button-radius transition-colors duration-150 hover:bg-muted text-foreground"
                                    x-text="label"
                                ></button>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <div class="relative">
                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','type' => 'button','icon' => 'heroicon-o-link'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-ref' => 'linkTrigger','@click' => 'hasSelection ? openLinkPopover() : null','x-bind:disabled' => ''.e($isDisabled ? 'true' : '(disabled || !hasSelection)').'','class' => '!w-8 !h-8 flex-shrink-0','x-bind:class' => 'activeFormats.link ? \'bg-accent text-accent-foreground\' : \'\'']); ?>
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

                <template x-teleport="body">
                    <div
                        x-show="createLinkMode"
                        x-anchor.bottom-start.offset.4="$refs.linkTrigger"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute z-50 w-80"
                        style="display: none;"
                        @click.outside="closeLinkPopover()"
                    >
                        <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border">
                            <div class="p-4 space-y-4">
                                <div>
                                    <h4 class="font-medium text-foreground mb-2">Add Link</h4>
                                    <p class="text-sm text-muted-foreground" x-text="'Selected text: ' + selectedText"></p>
                                </div>

                                <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['type' => 'url','placeholder' => 'https://example.com','label' => 'URL'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-model' => 'linkUrl','class' => 'w-full']); ?>
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
<?php $component = Strata\UI\View\Components\Form\Toggle::resolve(['label' => 'Open in new window'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Toggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-model' => 'linkTarget','class' => 'w-full']); ?>
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

                                <div class="flex justify-end gap-2 pt-2">
                                    <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'closeLinkPopover()']); ?>
                                        Cancel
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
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'createLink()','x-bind:disabled' => '!linkUrl']); ?>
                                        Create Link
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
                </template>


                <template x-teleport="body">
                    <div
                        x-show="linkEditMode"
                        x-anchor.bottom-start.offset.4="$refs.linkTrigger"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute z-50 w-72"
                        style="display: none;"
                        @click.outside="hideLinkEditPopover()"
                    >
                        <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border">
                            <div class="p-3 space-y-3">
                                <div>
                                    <div class="font-medium text-foreground text-sm mb-1">Link</div>
                                    <div class="text-xs text-muted-foreground break-all" x-text="currentLinkUrl"></div>
                                </div>

                                <div class="flex justify-between gap-2">
                                    <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','icon' => 'heroicon-o-arrow-top-right-on-square'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'openCurrentLink()','class' => 'flex-1']); ?>
                                        Open
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','icon' => 'heroicon-o-pencil'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'editCurrentLink()','class' => 'flex-1']); ?>
                                        Edit
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','icon' => 'heroicon-o-x-mark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'hideLinkEditPopover()','class' => '!px-2']); ?>
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
                </template>
            </div>

            <div class="w-px h-6 bg-muted mx-1"></div>

            <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','type' => 'button','disabled' => $isDisabled,'icon' => 'heroicon-o-list-bullet'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'format(\'insertUnorderedList\')','class' => '!w-8 !h-8 flex-shrink-0','x-bind:class' => 'activeFormats.insertUnorderedList ? \'bg-accent text-accent-foreground\' : \'\'']); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','type' => 'button','disabled' => $isDisabled,'icon' => 'heroicon-o-numbered-list'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'format(\'insertOrderedList\')','class' => '!w-8 !h-8 flex-shrink-0','x-bind:class' => 'activeFormats.insertOrderedList ? \'bg-accent text-accent-foreground\' : \'\'']); ?>
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
        <div
            <?php $__currentLoopData = $editorAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($key); ?>="<?php echo e($value); ?>"
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($attributes); ?>

        ></div>
    </div>
    <input
        x-ref="hiddenInput"
        <?php $__currentLoopData = $hiddenInputAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($key); ?>="<?php echo e($value); ?>"
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    >
</div>
<?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/form/editor.blade.php ENDPATH**/ ?>