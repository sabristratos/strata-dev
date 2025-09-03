<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name' => null,
    'variant' => 'default',
    'size' => 'md',
    'position' => 'center',
    'dismissible' => true
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'name' => null,
    'variant' => 'default',
    'size' => 'md',
    'position' => 'center',
    'dismissible' => true
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $modalId = $name ? 'modal-' . $name : uniqid('modal-');
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
    

    $containerClasses = [
        'fixed inset-0 z-50 flex',
        $variant === 'flyout' && $position === 'left' ? 'justify-start' : '',
        $variant === 'flyout' && $position === 'right' ? 'justify-end' : '',
        $variant === 'flyout' && $position === 'bottom' ? 'items-end' : '',
        $variant !== 'flyout' ? 'items-center justify-center p-4' : '',
    ];
    

    $contentClasses = [
        'relative bg-card text-card-foreground shadow-xl border border-border overflow-hidden',
        $getSizeClasses(),
        $getVariantClasses(),
        $variant === 'flyout' ? $getFlyoutPositionClasses() : '',
        $variant !== 'bare' ? 'w-full' : '',
    ];
    

    $enterTransitions = match($variant) {
        'flyout' => match($position) {
            'left' => 'transition ease-out duration-300|opacity-0 -translate-x-full|opacity-100 translate-x-0',
            'right' => 'transition ease-out duration-300|opacity-0 translate-x-full|opacity-100 translate-x-0', 
            'bottom' => 'transition ease-out duration-300|opacity-0 translate-y-full|opacity-100 translate-y-0',
            default => 'transition ease-out duration-300|opacity-0 translate-x-full|opacity-100 translate-x-0',
        },
        default => 'transition ease-out duration-300|opacity-0 scale-95|opacity-100 scale-100'
    };
    
    $leaveTransitions = match($variant) {
        'flyout' => match($position) {
            'left' => 'transition ease-in duration-200|opacity-100 translate-x-0|opacity-0 -translate-x-full',
            'right' => 'transition ease-in duration-200|opacity-100 translate-x-0|opacity-0 translate-x-full',
            'bottom' => 'transition ease-in duration-200|opacity-100 translate-y-0|opacity-0 translate-y-full', 
            default => 'transition ease-in duration-200|opacity-100 translate-x-0|opacity-0 translate-x-full',
        },
        default => 'transition ease-in duration-200|opacity-100 scale-100|opacity-0 scale-95'
    };
    
    [$enterClass, $enterStart, $enterEnd] = explode('|', $enterTransitions);
    [$leaveClass, $leaveStart, $leaveEnd] = explode('|', $leaveTransitions);
?>

<div
    x-data="strataModal({
        name: '<?php echo e($name); ?>',
        dismissible: <?php echo e($dismissible ? 'true' : 'false'); ?>

    })"
    x-show="show"
    x-cloak
    data-variant="<?php echo e($variant); ?>"
    <?php if($variant === 'flyout'): ?>
        data-position="<?php echo e($position); ?>"
    <?php endif; ?>
    <?php if($name): ?>
        data-modal-name="<?php echo e($name); ?>"
        @strata-modal-show-<?php echo e($name); ?>.window="showModal($event.detail)"
        @strata-modal-hide-<?php echo e($name); ?>.window="hideModal()"
        @strata-modal-toggle-<?php echo e($name); ?>.window="toggleModal($event.detail)"
    <?php endif; ?>
    <?php if($isWireModel): ?>
        x-modelable="show"
    <?php endif; ?>
    style="display: none;"
    <?php echo e($attributes->except(['name', 'variant', 'size', 'position', 'dismissible', 'wire:model', 'wire:model.self'])); ?>

>

    <div 
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        <?php if($dismissible): ?>
            @click="handleBackdropClick()"
        <?php endif; ?>
        class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm"
    ></div>
    

    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(array_filter($containerClasses)); ?>">
        <div
            x-show="show"
            x-transition:enter="<?php echo e($enterClass); ?>"
            x-transition:enter-start="<?php echo e($enterStart); ?>"
            x-transition:enter-end="<?php echo e($enterEnd); ?>"
            x-transition:leave="<?php echo e($leaveClass); ?>"
            x-transition:leave-start="<?php echo e($leaveStart); ?>"
            x-transition:leave-end="<?php echo e($leaveEnd); ?>"
            @click.stop
            x-trap.noscroll="show"
            role="dialog"
            aria-modal="true"
            :aria-labelledby="name ? 'modal-title-' + name : null"
            :aria-describedby="name ? 'modal-description-' + name : null"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses(array_filter($contentClasses)); ?>"
        >
            <!--[if BLOCK]><![endif]--><?php if($dismissible && $variant !== 'bare'): ?>
                <div class="absolute right-4 top-4 z-10">
                    <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'ghost','size' => 'sm','icon' => 'heroicon-o-x-mark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'hideModal()','class' => '!p-1.5 hover:bg-muted','aria-label' => 'Close modal']); ?>
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
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            
            <!--[if BLOCK]><![endif]--><?php if($variant !== 'bare'): ?>
                <div class="p-6">
                    <?php echo e($slot); ?>

                </div>
            <?php else: ?>
                <?php echo e($slot); ?>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div>


<!--[if BLOCK]><![endif]--><?php if(session()->has('strata_modal')): ?>
    <script data-strata-session-modal>
        <?php echo json_encode(session('strata_modal'), 15, 512) ?>
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sessionModalScript = document.querySelector('script[data-strata-session-modal]');
            if (sessionModalScript) {
                try {
                    const modalData = JSON.parse(sessionModalScript.textContent);
                    if (modalData.id) {

                        setTimeout(() => {
                            window.dispatchEvent(new CustomEvent(`strata-modal-show-${modalData.id}`, { detail: modalData }));
                        }, 100);
                    }
                } catch (e) {
                    console.warn('Failed to parse session modal data:', e);
                }
            }
        });
    </script>
<?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/modal.blade.php ENDPATH**/ ?>