<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-8 space-y-8">
    <h1 class="text-3xl font-bold mb-8">Strata UI Data Attributes Test</h1>
    
    <!-- Custom CSS for testing -->
    <style>
        /* Button customizations */
        [data-strata-button="icon"] {
            color: #10b981 !important;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }
        
        [data-strata-button="text"] {
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        [data-strata-button="badge"] {
            background: linear-gradient(45deg, #f59e0b, #ef4444) !important;
            animation: pulse 2s infinite;
        }
        
        /* Form customizations */
        [data-strata-form="label"] {
            font-weight: 700;
            color: #4338ca;
        }
        
        [data-strata-input="field"] {
            border: 2px solid #8b5cf6;
            transition: all 0.3s ease;
        }
        
        [data-strata-input="field"]:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
        
        [data-strata-form="error"] {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
            padding: 0.5rem;
        }
        
        /* Modal customizations */
        [data-strata-modal="overlay"] {
            backdrop-filter: blur(12px);
            background: rgba(0, 0, 0, 0.7);
        }
        
        [data-strata-modal="content"] {
            border: 2px solid #8b5cf6;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        /* Alert customizations */
        [data-strata-alert="icon"] {
            animation: bounce 1s infinite;
        }
        
        [data-strata-alert="title"] {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Table customizations */
        [data-strata-table="table"] {
            border: 2px solid #6366f1;
        }
        
        [data-strata-card="root"] {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translate3d(0,0,0); }
            40%, 43% { transform: translate3d(0,-5px,0); }
            70% { transform: translate3d(0,-3px,0); }
            90% { transform: translate3d(0,-1px,0); }
        }
    </style>
    
    <!-- Button Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Button Components</h2>
        <div class="flex gap-4 flex-wrap">
            <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['icon' => 'heroicon-o-plus','variant' => 'primary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                Add Item
                 <?php $__env->slot('badge', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Badge::resolve(['color' => 'destructive'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Badge::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>New <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $attributes = $__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__attributesOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6)): ?>
<?php $component = $__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6; ?>
<?php unset($__componentOriginale033bb5dd3a0b6b3ab4760ff92e2e5f6); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>
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
<?php $component = Strata\UI\View\Components\Button::resolve(['icon' => 'heroicon-o-cog-6-tooth','variant' => 'secondary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                Settings
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
<?php $component = Strata\UI\View\Components\Button::resolve(['icon' => 'heroicon-o-trash','variant' => 'destructive','size' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                Delete
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
    </section>
    
    <!-- Form Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Form Components</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['label' => 'Email Address','name' => 'email','type' => 'email','description' => 'We\'ll never share your email','placeholder' => 'Enter your email'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                
                <?php if (isset($component)) { $__componentOriginalaa9034dc736171512fb8afa189c2f088 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9034dc736171512fb8afa189c2f088 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Input::resolve(['label' => 'Password','name' => 'password','type' => 'password','error' => 'Password must be at least 8 characters'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Input::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
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
            
            <div>
                <?php if (isset($component)) { $__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Textarea::resolve(['label' => 'Message','name' => 'message','placeholder' => 'Enter your message','rows' => '4'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Textarea::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161)): ?>
<?php $attributes = $__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161; ?>
<?php unset($__attributesOriginalb4d08d36acd4763dce5d9a1faa0a9161); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161)): ?>
<?php $component = $__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161; ?>
<?php unset($__componentOriginalb4d08d36acd4763dce5d9a1faa0a9161); ?>
<?php endif; ?>
                
                <?php if (isset($component)) { $__componentOriginal72d418d9f43ee71e56ab05c8b3423141 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72d418d9f43ee71e56ab05c8b3423141 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Checkbox::resolve(['label' => 'Subscribe to newsletter','name' => 'subscribe'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72d418d9f43ee71e56ab05c8b3423141)): ?>
<?php $attributes = $__attributesOriginal72d418d9f43ee71e56ab05c8b3423141; ?>
<?php unset($__attributesOriginal72d418d9f43ee71e56ab05c8b3423141); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72d418d9f43ee71e56ab05c8b3423141)): ?>
<?php $component = $__componentOriginal72d418d9f43ee71e56ab05c8b3423141; ?>
<?php unset($__componentOriginal72d418d9f43ee71e56ab05c8b3423141); ?>
<?php endif; ?>
                
                <?php if (isset($component)) { $__componentOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3d7d42cbbce4608bbe86aa8090faf9 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Form\Toggle::resolve(['label' => 'Enable notifications','name' => 'notifications'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::form.toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Form\Toggle::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
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
            </div>
        </div>
    </section>
    
    <!-- Alert Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Alert Components</h2>
        <div class="space-y-4">
            <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'success','title' => 'Success!','dismissible' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                Your account has been created successfully.
                 <?php $__env->slot('actions', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['size' => 'sm','variant' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>View Account <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $attributes = $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__attributesOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5)): ?>
<?php $component = $__componentOriginal95445069a1a7fd595fddae94c95ee9b5; ?>
<?php unset($__componentOriginal95445069a1a7fd595fddae94c95ee9b5); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>
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
            
            <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'warning','title' => 'Warning'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                Your subscription will expire in 3 days.
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
            
            <?php if (isset($component)) { $__componentOriginal3e4b9377627708a96922eda997ffd34c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e4b9377627708a96922eda997ffd34c = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Alert::resolve(['color' => 'info'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                New features are available in the latest update.
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
        </div>
    </section>
    
    <!-- Card Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Card Component</h2>
        <div class="grid md:grid-cols-3 gap-4">
            <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6']); ?>
                <h3 class="text-lg font-semibold mb-2">Custom Card</h3>
                <p>This card has custom gradient styling applied via data attributes.</p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal825452dccd8b981c2091740207496798)): ?>
<?php $attributes = $__attributesOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__attributesOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal825452dccd8b981c2091740207496798)): ?>
<?php $component = $__componentOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__componentOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
            
            <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6']); ?>
                <h3 class="text-lg font-semibold mb-2">Another Card</h3>
                <p>All cards with data-strata-card="root" get the custom styling.</p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal825452dccd8b981c2091740207496798)): ?>
<?php $attributes = $__attributesOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__attributesOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal825452dccd8b981c2091740207496798)): ?>
<?php $component = $__componentOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__componentOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
            
            <?php if (isset($component)) { $__componentOriginal825452dccd8b981c2091740207496798 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal825452dccd8b981c2091740207496798 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6']); ?>
                <h3 class="text-lg font-semibold mb-2">Third Card</h3>
                <p>Consistent styling across all card components.</p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal825452dccd8b981c2091740207496798)): ?>
<?php $attributes = $__attributesOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__attributesOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal825452dccd8b981c2091740207496798)): ?>
<?php $component = $__componentOriginal825452dccd8b981c2091740207496798; ?>
<?php unset($__componentOriginal825452dccd8b981c2091740207496798); ?>
<?php endif; ?>
        </div>
    </section>
    
    <!-- Table Tests -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Table Component</h2>
        <?php if (isset($component)) { $__componentOriginal2895adcbcb0d05331c239a4a33c257b1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2895adcbcb0d05331c239a4a33c257b1 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table::resolve(['striped' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal02a508f55882dc523510e4e1c074ccc3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal02a508f55882dc523510e4e1c074ccc3 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal754c544a2f81e122854e3124f6b1209e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal754c544a2f81e122854e3124f6b1209e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Row::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Row::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'th']); ?>Name <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'th']); ?>Email <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'th']); ?>Status <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $attributes = $__attributesOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__attributesOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $component = $__componentOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__componentOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal02a508f55882dc523510e4e1c074ccc3)): ?>
<?php $attributes = $__attributesOriginal02a508f55882dc523510e4e1c074ccc3; ?>
<?php unset($__attributesOriginal02a508f55882dc523510e4e1c074ccc3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal02a508f55882dc523510e4e1c074ccc3)): ?>
<?php $component = $__componentOriginal02a508f55882dc523510e4e1c074ccc3; ?>
<?php unset($__componentOriginal02a508f55882dc523510e4e1c074ccc3); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalfcb9dc33c2874e8b8dde01143e3bedb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfcb9dc33c2874e8b8dde01143e3bedb5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Body::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Body::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal754c544a2f81e122854e3124f6b1209e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal754c544a2f81e122854e3124f6b1209e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Row::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Row::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>John Doe <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>john@example.com <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Active <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $attributes = $__attributesOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__attributesOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $component = $__componentOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__componentOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal754c544a2f81e122854e3124f6b1209e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal754c544a2f81e122854e3124f6b1209e = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Row::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Row::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Jane Smith <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>jane@example.com <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal794892f06531ce4076f85980f113f7ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal794892f06531ce4076f85980f113f7ec = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Table\Cell::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::table.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Table\Cell::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Pending <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $attributes = $__attributesOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__attributesOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal794892f06531ce4076f85980f113f7ec)): ?>
<?php $component = $__componentOriginal794892f06531ce4076f85980f113f7ec; ?>
<?php unset($__componentOriginal794892f06531ce4076f85980f113f7ec); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $attributes = $__attributesOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__attributesOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal754c544a2f81e122854e3124f6b1209e)): ?>
<?php $component = $__componentOriginal754c544a2f81e122854e3124f6b1209e; ?>
<?php unset($__componentOriginal754c544a2f81e122854e3124f6b1209e); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfcb9dc33c2874e8b8dde01143e3bedb5)): ?>
<?php $attributes = $__attributesOriginalfcb9dc33c2874e8b8dde01143e3bedb5; ?>
<?php unset($__attributesOriginalfcb9dc33c2874e8b8dde01143e3bedb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfcb9dc33c2874e8b8dde01143e3bedb5)): ?>
<?php $component = $__componentOriginalfcb9dc33c2874e8b8dde01143e3bedb5; ?>
<?php unset($__componentOriginalfcb9dc33c2874e8b8dde01143e3bedb5); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2895adcbcb0d05331c239a4a33c257b1)): ?>
<?php $attributes = $__attributesOriginal2895adcbcb0d05331c239a4a33c257b1; ?>
<?php unset($__attributesOriginal2895adcbcb0d05331c239a4a33c257b1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2895adcbcb0d05331c239a4a33c257b1)): ?>
<?php $component = $__componentOriginal2895adcbcb0d05331c239a4a33c257b1; ?>
<?php unset($__componentOriginal2895adcbcb0d05331c239a4a33c257b1); ?>
<?php endif; ?>
    </section>
    
    <!-- Modal Test -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Modal Component</h2>
        <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$dispatch(\'strata-modal-show-test\')']); ?>
            Open Test Modal
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
        
        <?php if (isset($component)) { $__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Modal::resolve(['name' => 'test'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Modal::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Test Modal</h3>
                <p class="mb-4">This modal has custom styling applied via data attributes:</p>
                <ul class="list-disc list-inside space-y-1 mb-6">
                    <li>Custom blur backdrop</li>
                    <li>Purple border</li>
                    <li>Enhanced shadow</li>
                </ul>
                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['variant' => 'primary'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => '$dispatch(\'strata-modal-hide-test\')']); ?>
                    Close Modal
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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b)): ?>
<?php $attributes = $__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b; ?>
<?php unset($__attributesOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b)): ?>
<?php $component = $__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b; ?>
<?php unset($__componentOriginal8bfb54b0da6c2ed1c2e6ae2715b4938b); ?>
<?php endif; ?>
    </section>
    
    <!-- Dropdown Test -->
    <section>
        <h2 class="text-2xl font-semibold mb-4">Dropdown Component</h2>
        <?php if (isset($component)) { $__componentOriginal5dd770645231832d28570cdd1a10b56b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5dd770645231832d28570cdd1a10b56b = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Dropdown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Dropdown::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('trigger', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginal95445069a1a7fd595fddae94c95ee9b5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95445069a1a7fd595fddae94c95ee9b5 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Button::resolve(['icon' => 'heroicon-o-chevron-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    Options
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
             <?php $__env->endSlot(); ?>
            
            <?php if (isset($component)) { $__componentOriginalbaa761e585381069430e3d6c738df2d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa761e585381069430e3d6c738df2d6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Dropdown\Checkbox::resolve(['label' => 'Option 1'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Dropdown\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbaa761e585381069430e3d6c738df2d6)): ?>
<?php $attributes = $__attributesOriginalbaa761e585381069430e3d6c738df2d6; ?>
<?php unset($__attributesOriginalbaa761e585381069430e3d6c738df2d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbaa761e585381069430e3d6c738df2d6)): ?>
<?php $component = $__componentOriginalbaa761e585381069430e3d6c738df2d6; ?>
<?php unset($__componentOriginalbaa761e585381069430e3d6c738df2d6); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalbaa761e585381069430e3d6c738df2d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa761e585381069430e3d6c738df2d6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Dropdown\Checkbox::resolve(['label' => 'Option 2'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Dropdown\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbaa761e585381069430e3d6c738df2d6)): ?>
<?php $attributes = $__attributesOriginalbaa761e585381069430e3d6c738df2d6; ?>
<?php unset($__attributesOriginalbaa761e585381069430e3d6c738df2d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbaa761e585381069430e3d6c738df2d6)): ?>
<?php $component = $__componentOriginalbaa761e585381069430e3d6c738df2d6; ?>
<?php unset($__componentOriginalbaa761e585381069430e3d6c738df2d6); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7f8c8178514c8ba199d9d4ee9373e028 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'strata::components.dropdown.separator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028)): ?>
<?php $attributes = $__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028; ?>
<?php unset($__attributesOriginal7f8c8178514c8ba199d9d4ee9373e028); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f8c8178514c8ba199d9d4ee9373e028)): ?>
<?php $component = $__componentOriginal7f8c8178514c8ba199d9d4ee9373e028; ?>
<?php unset($__componentOriginal7f8c8178514c8ba199d9d4ee9373e028); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalbaa761e585381069430e3d6c738df2d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa761e585381069430e3d6c738df2d6 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Dropdown\Checkbox::resolve(['label' => 'Option 3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::dropdown.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Dropdown\Checkbox::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbaa761e585381069430e3d6c738df2d6)): ?>
<?php $attributes = $__attributesOriginalbaa761e585381069430e3d6c738df2d6; ?>
<?php unset($__attributesOriginalbaa761e585381069430e3d6c738df2d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbaa761e585381069430e3d6c738df2d6)): ?>
<?php $component = $__componentOriginalbaa761e585381069430e3d6c738df2d6; ?>
<?php unset($__componentOriginalbaa761e585381069430e3d6c738df2d6); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5dd770645231832d28570cdd1a10b56b)): ?>
<?php $attributes = $__attributesOriginal5dd770645231832d28570cdd1a10b56b; ?>
<?php unset($__attributesOriginal5dd770645231832d28570cdd1a10b56b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5dd770645231832d28570cdd1a10b56b)): ?>
<?php $component = $__componentOriginal5dd770645231832d28570cdd1a10b56b; ?>
<?php unset($__componentOriginal5dd770645231832d28570cdd1a10b56b); ?>
<?php endif; ?>
    </section>
    
    <div class="mt-12 p-6 bg-gray-50 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">About This Test</h3>
        <p class="text-gray-700">
            This page demonstrates the new data attribute system for Strata UI components. 
            Each component has been styled using data-strata-* attributes instead of relying on CSS classes. 
            Inspect the elements to see the data attributes in action!
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\chaab\Herd\strata\resources\views/data-attributes-test.blade.php ENDPATH**/ ?>