@props([
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
])

@php
    $videoPlayerId = $getVideoPlayerId();
    $videoPlayerConfig = $getVideoPlayerConfig();
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
    $primarySource = $getPrimarySource();
    $videoElementAttrs = collect($getVideoAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
@endphp

<div
    x-data="strataVideoPlayer(@js($videoPlayerConfig))"
    x-init="init()"
    @if($isWireModel)
        x-modelable="playing"
    @endif
    @mouseenter="mouseEntered()"
    @mouseleave="mouseLeft()"
    data-video-player-id="{{ $videoPlayerId }}"
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    {{ $attributes->except(['sources', 'poster', 'controls', 'autoplay', 'loop', 'muted', 'preload', 'volume', 'autoHideControlsDelay', 'variant', 'size', 'fullscreenSupported', 'wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ]) }}
    role="region"
    aria-label="Video Player"
    tabindex="0"
>
    <video
        x-ref="player"
        class="{{ $getVideoClasses() }}"
        @loadedmetadata="metaDataLoaded($event)"
        @timeupdate="timeUpdatedInterval"
        @play="playing = true"
        @pause="playing = false"
        @ended="videoEnded"
        onerror="this.__x.$data.videoError($event)"
        {!! $videoElementAttrs !!}
        @if($poster) poster="{{ $poster }}" @endif
        @if($autoplay) autoplay @endif
        @if($loop) loop @endif
        @if($muted) muted @endif
        preload="{{ $preload }}"
        playsinline
    >
        @foreach($sources as $quality => $source)
            <source src="{{ $source['src'] }}" type="{{ $source['type'] }}">
        @endforeach
        Your browser does not support the video tag.
    </video>

    @if($controls)
        {{-- Center play/pause button - only show when paused --}}
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
                <x-strata::icon name="heroicon-o-play" class="w-8 h-8" />
            </button>
        </div>

        {{-- Control bar - show on hover or when paused --}}
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
                        class="{{ $getTimelineClasses() }}"
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
                            class="{{ $getControlButtonClasses() }}"
                            :aria-label="playing ? 'Pause video' : 'Play video'"
                        >
                            <x-strata::icon x-show="playing" name="heroicon-o-pause" class="w-4 h-4" />
                            <x-strata::icon x-show="!playing" name="heroicon-o-play" class="w-4 h-4" />
                        </button>

                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                @click="toggleMute"
                                class="{{ $getControlButtonClasses() }}"
                                aria-label="Toggle mute"
                                :aria-pressed="muted ? 'true' : 'false'"
                            >
                                <x-strata::icon x-show="muted || volume === 0" name="heroicon-o-speaker-x-mark" class="w-4 h-4" />
                                <x-strata::icon x-show="!muted && volume > 0 && volume <= 0.5" name="heroicon-o-speaker-wave" class="w-4 h-4" />
                                <x-strata::icon x-show="!muted && volume > 0.5" name="heroicon-o-speaker-wave" class="w-4 h-4" />
                            </button>

                            <input
                                type="range"
                                x-ref="volumeControl"
                                min="0"
                                max="1"
                                step="0.1"
                                :value="volume"
                                @input="updateVolume($event)"
                                class="{{ $getVolumeClasses() }}"
                                aria-label="Volume control"
                            />
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        @isset($customControls)
                            {{ $customControls }}
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    @endif

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
            <x-strata::icon name="heroicon-o-exclamation-triangle" class="w-12 h-12 mx-auto mb-4 text-red-400" />
            <h3 class="text-lg font-semibold mb-2">Video Error</h3>
            <p class="text-sm text-gray-300 mb-4" x-text="errorMessage || 'Unable to load or play this video. Please try again later.'"></p>
            <button
                type="button"
                @click="retryVideo()"
                class="{{ $getControlButtonClasses() }}"
            >
                Try Again
            </button>
        </div>
    </div>

    <div
        class="sr-only"
        aria-live="polite"
        aria-atomic="true"
        id="{{ $videoPlayerId }}-status"
    >
        <span x-text="playing ? 'Video playing' : (ended ? 'Video ended' : 'Video paused')"></span>
        <span x-text="showTime ? `${timeElapsedString} of ${timeDurationString}` : ''"></span>
    </div>
</div>

