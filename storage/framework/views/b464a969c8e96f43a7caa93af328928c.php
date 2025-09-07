<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'sources' => [],
    'poster' => null,
    'controls' => true,
    'autoplay' => false,
    'loop' => false,
    'muted' => false,
    'preload' => 'metadata',
    'volume' => 1.0,
    'autoHideControlsDelay' => 3000,
    'variant' => 'default',
    'size' => 'md',
    'fullscreenSupported' => true,
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
    'sources' => [],
    'poster' => null,
    'controls' => true,
    'autoplay' => false,
    'loop' => false,
    'muted' => false,
    'preload' => 'metadata',
    'volume' => 1.0,
    'autoHideControlsDelay' => 3000,
    'variant' => 'default',
    'size' => 'md',
    'fullscreenSupported' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $videoPlayerId = $getVideoPlayerId();
    $videoPlayerConfig = $getVideoPlayerConfig();
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
    $primarySource = $getPrimarySource();
    $videoElementAttrs = collect($getVideoAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
?>

<div
    x-data="strataVideoPlayer(<?php echo \Illuminate\Support\Js::from($videoPlayerConfig)->toHtml() ?>)"
    x-init="init()"
    <?php if($isWireModel): ?>
        x-modelable="playing"
    <?php endif; ?>
    @mouseenter="mouseEntered()"
    @mouseleave="mouseLeft()"
    data-video-player-id="<?php echo e($videoPlayerId); ?>"
    data-variant="<?php echo e($variant); ?>"
    data-size="<?php echo e($size); ?>"
    <?php echo e($attributes->except(['sources', 'poster', 'controls', 'autoplay', 'loop', 'muted', 'preload', 'volume', 'autoHideControlsDelay', 'variant', 'size', 'fullscreenSupported', 'wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ])); ?>

    role="region"
    aria-label="Video Player"
    tabindex="0"
>
    <video
        x-ref="player"
        class="<?php echo e($getVideoClasses()); ?>"
        @loadedmetadata="metaDataLoaded($event)"
        @timeupdate="timeUpdatedInterval"
        @play="playing = true"
        @pause="playing = false"
        @ended="videoEnded"
        onerror="this.__x.$data.videoError($event)"
        <?php echo $videoElementAttrs; ?>

        <?php if($poster): ?> poster="<?php echo e($poster); ?>" <?php endif; ?>
        <?php if($autoplay): ?> autoplay <?php endif; ?>
        <?php if($loop): ?> loop <?php endif; ?>
        <?php if($muted): ?> muted <?php endif; ?>
        preload="<?php echo e($preload); ?>"
        playsinline
    >
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quality => $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <source src="<?php echo e($source['src']); ?>" type="<?php echo e($source['type']); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        Your browser does not support the video tag.
    </video>

    <!--[if BLOCK]><![endif]--><?php if($controls): ?>
        
        <div
            x-show="!playing"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0 flex items-center justify-center"
        >
            <button
                type="button"
                @click="togglePlay"
                class="inline-flex items-center justify-center w-16 h-16 text-white bg-black/50 hover:bg-black/70 rounded-full transition-all duration-200"
                aria-label="Play video"
            >
                <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-play'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-8 h-8']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
            </button>
        </div>

        
        <div
            x-show="showControls"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @mouseenter="controlsHovered = true"
            @mouseleave="controlsHovered = false"
            class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent text-white"
        >
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <span
                        x-show="showTime"
                        x-text="timeElapsedString"
                        class="text-sm font-mono min-w-[3rem]"
                        aria-label="Current time"
                    ></span>

                    <input
                        type="range"
                        x-ref="videoProgress"
                        min="0"
                        :max="videoDuration"
                        :value="$refs.player?.currentTime || 0"
                        @input="timelineSeek($event)"
                        class="<?php echo e($getTimelineClasses()); ?>"
                        aria-label="Video timeline"
                        x-bind:style="`background: linear-gradient(to right, white 0%, white ${($refs.player?.currentTime / $refs.player?.duration * 100) || 0}%, rgba(255,255,255,0.3) ${($refs.player?.currentTime / $refs.player?.duration * 100) || 0}%, rgba(255,255,255,0.3) 100%)`"
                    />

                    <span
                        x-show="showTime"
                        x-text="timeDurationString"
                        class="text-sm font-mono min-w-[3rem]"
                        aria-label="Video duration"
                    ></span>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <button
                            type="button"
                            @click="togglePlay"
                            class="<?php echo e($getControlButtonClasses()); ?>"
                            :aria-label="playing ? 'Pause video' : 'Play video'"
                        >
                            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-pause'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'playing','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-play'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => '!playing','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
                        </button>

                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                @click="toggleMute"
                                class="<?php echo e($getControlButtonClasses()); ?>"
                                aria-label="Toggle mute"
                                :aria-pressed="muted ? 'true' : 'false'"
                            >
                                <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-speaker-x-mark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'muted || volume === 0','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-speaker-wave'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => '!muted && volume > 0 && volume <= 0.5','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-speaker-wave'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => '!muted && volume > 0.5','class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
                            </button>

                            <input
                                type="range"
                                x-ref="volumeControl"
                                min="0"
                                max="1"
                                step="0.1"
                                :value="volume"
                                @input="updateVolume($event)"
                                class="<?php echo e($getVolumeClasses()); ?>"
                                aria-label="Volume control"
                            />
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <!--[if BLOCK]><![endif]--><?php if(isset($customControls)): ?>
                            <?php echo e($customControls); ?>

                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div
        x-show="!videoPlayerReady && !hasError"
        class="absolute inset-0 flex items-center justify-center bg-black/50 text-white"
    >
        <div class="text-center">
            <div class="animate-spin w-8 h-8 border-2 border-white border-t-transparent rounded-full mx-auto mb-2"></div>
            <p class="text-sm">Loading video...</p>
        </div>
    </div>

    <div
        x-show="hasError"
        class="absolute inset-0 flex items-center justify-center bg-black/80 text-white"
    >
        <div class="text-center max-w-sm">
            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-exclamation-triangle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-12 h-12 mx-auto mb-4 text-red-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
            <h3 class="text-lg font-semibold mb-2">Video Error</h3>
            <p class="text-sm text-gray-300 mb-4" x-text="errorMessage || 'Unable to load or play this video. Please try again later.'"></p>
            <button
                type="button"
                @click="retryVideo()"
                class="<?php echo e($getControlButtonClasses()); ?>"
            >
                Try Again
            </button>
        </div>
    </div>

    <div
        class="sr-only"
        aria-live="polite"
        aria-atomic="true"
        id="<?php echo e($videoPlayerId); ?>-status"
    >
        <span x-text="playing ? 'Video playing' : (ended ? 'Video ended' : 'Video paused')"></span>
        <span x-text="showTime ? `${timeElapsedString} of ${timeDurationString}` : ''"></span>
    </div>
</div>

<?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/video-player.blade.php ENDPATH**/ ?>