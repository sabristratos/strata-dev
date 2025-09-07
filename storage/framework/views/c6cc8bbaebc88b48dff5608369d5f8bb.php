<div
    x-data="strataToastGroup({
        position: '<?php echo e($position); ?>',
        expanded: <?php echo e($expanded ? 'true' : 'false'); ?>

    })"
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'fixed z-[99] w-full sm:max-w-sm p-4 space-y-3 pointer-events-none',
        'bottom-0 right-0' => $position === 'bottom-end',
        'bottom-0 left-0' => $position === 'bottom-start',
        'bottom-0 left-1/2 -translate-x-1/2' => $position === 'bottom-center',
        'top-0 right-0' => $position === 'top-end',
        'top-0 left-0' => $position === 'top-start',
        'top-0 left-1/2 -translate-x-1/2' => $position === 'top-center',
    ]); ?>"
    x-cloak
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-data="strataToastItem({
                toast: toast,
                position: '<?php echo e($position); ?>'
            })"
            @mouseenter="onMouseEnter()"
            @mouseleave="onMouseLeave()"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform"
            x-transition:enter-end="opacity-100 transform"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform"
            x-transition:leave-end="opacity-0 transform"
            :class="{
                'translate-y-full': '<?php echo e(str($position)->startsWith('bottom-')); ?>' && !show,
                '-translate-y-full': '<?php echo e(str($position)->startsWith('top-')); ?>' && !show,
                'translate-y-0': show,
            }"
            class="w-full pointer-events-auto"
        >
            <template x-if="toast.variant === 'info'">
                <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'info','dismissible' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!shadow-none','x-on:click' => 'visible = false; removeToast()']); ?>
                     <?php $__env->slot('title', null, []); ?> 
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                     <?php $__env->endSlot(); ?>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
            </template>

            <template x-if="toast.variant === 'success'">
                <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'success','dismissible' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!shadow-none','x-on:click' => 'visible = false; removeToast()']); ?>
                     <?php $__env->slot('title', null, []); ?> 
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                     <?php $__env->endSlot(); ?>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
            </template>

            <template x-if="toast.variant === 'warning'">
                <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'warning','dismissible' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!shadow-none','x-on:click' => 'visible = false; removeToast()']); ?>
                     <?php $__env->slot('title', null, []); ?> 
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                     <?php $__env->endSlot(); ?>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
            </template>

            <template x-if="toast.variant === 'destructive'">
                <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'destructive','dismissible' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!shadow-none','x-on:click' => 'visible = false; removeToast()']); ?>
                     <?php $__env->slot('title', null, []); ?> 
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                     <?php $__env->endSlot(); ?>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
            </template>

            <template x-if="toast.variant === 'primary'">
                <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'primary','dismissible' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!shadow-none','x-on:click' => 'visible = false; removeToast()']); ?>
                     <?php $__env->slot('title', null, []); ?> 
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                     <?php $__env->endSlot(); ?>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
            </template>

            <template x-if="toast.variant === 'accent'">
                <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'accent','dismissible' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!shadow-none','x-on:click' => 'visible = false; removeToast()']); ?>
                     <?php $__env->slot('title', null, []); ?> 
                        <span x-cloak x-show="toast.title" x-text="toast.title"></span>
                     <?php $__env->endSlot(); ?>
                    
                    <span x-cloak x-show="toast.message" x-text="toast.message"></span>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $attributes = $__attributesOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__attributesOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e4b9377627708a96922eda997ffd34c)): ?>
<?php $component = $__componentOriginal3e4b9377627708a96922eda997ffd34c; ?>
<?php unset($__componentOriginal3e4b9377627708a96922eda997ffd34c); ?>
<?php endif; ?>
            </template>
        </div>
    </template>
</div>



<?php if(session()->has('strata_toast')): ?>
    <script>
        window.strataSessionToast = <?php echo json_encode(session('strata_toast'), 15, 512) ?>;
    </script>
<?php endif; ?><?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/toast-container.blade.php ENDPATH**/ ?>