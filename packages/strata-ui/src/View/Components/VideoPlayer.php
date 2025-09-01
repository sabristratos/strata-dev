<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Video Player component with comprehensive video playback controls.
 */
class VideoPlayer extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  array  $sources  Video sources (with different formats/quality)
     * @param  string|null  $poster  Poster image URL
     * @param  bool  $controls  Whether to show video controls
     * @param  bool  $autoplay  Whether to autoplay the video
     * @param  bool  $loop  Whether to loop the video
     * @param  bool  $muted  Whether to start muted
     * @param  string  $preload  Preload behavior (none, metadata, auto)
     * @param  float  $volume  Initial volume (0.0 - 1.0)
     * @param  int  $autoHideControlsDelay  Delay before auto-hiding controls (ms)
     * @param  string  $variant  Video player variant (default, compact, theater)
     * @param  string  $size  Video player size (sm, md, lg, xl)
     * @param  bool  $fullscreenSupported  Whether fullscreen is supported
     */
    public function __construct(
        public array $sources = [],
        public ?string $poster = null,
        public bool $controls = true,
        public bool $autoplay = false,
        public bool $loop = false,
        public bool $muted = false,
        public string $preload = 'metadata',
        public float $volume = 1.0,
        public int $autoHideControlsDelay = 3000,
        public string $variant = 'default',
        public string $size = 'md',
        public bool $fullscreenSupported = true,
    ) {
        $this->validateAndNormalizeConfiguration();
    }

    /**
     * Validate and normalize component configuration.
     */
    private function validateAndNormalizeConfiguration(): void
    {
        // Normalize volume to valid range
        $this->volume = max(0.0, min(1.0, $this->volume));

        // Normalize preload to valid values
        if (! in_array($this->preload, ['none', 'metadata', 'auto'])) {
            $this->preload = 'metadata';
        }

        // Normalize variant to valid values
        if (! in_array($this->variant, ['default', 'compact', 'theater'])) {
            $this->variant = 'default';
        }

        // Normalize size to valid values
        if (! in_array($this->size, ['sm', 'md', 'lg', 'xl'])) {
            $this->size = 'md';
        }

        // Normalize auto-hide delay (1-30 seconds)
        $this->autoHideControlsDelay = max(1000, min(30000, $this->autoHideControlsDelay));

        // Validate and normalize sources array
        $this->sources = $this->normalizeSources($this->sources);
    }

    /**
     * Normalize video sources configuration.
     */
    private function normalizeSources(array $sources): array
    {
        $normalized = [];

        foreach ($sources as $key => $value) {
            if (is_string($value)) {
                // Simple format: ['src' => 'url']
                $normalized[$key] = [
                    'src' => $value,
                    'type' => $this->detectMimeType($value),
                ];
            } elseif (is_array($value) && isset($value['src'])) {
                // Extended format: ['quality' => ['src' => 'url', 'type' => 'video/mp4']]
                $normalized[$key] = [
                    'src' => $value['src'],
                    'type' => $value['type'] ?? $this->detectMimeType($value['src']),
                    'label' => $value['label'] ?? null,
                ];
            }
        }

        return $normalized;
    }

    /**
     * Detect MIME type from file extension.
     */
    private function detectMimeType(string $url): string
    {
        $extension = strtolower(pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION));

        return match ($extension) {
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            'ogg', 'ogv' => 'video/ogg',
            'mov' => 'video/quicktime',
            'avi' => 'video/x-msvideo',
            default => 'video/mp4',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.video-player');
    }

    /**
     * Get the CSS classes for the video player variant.
     */
    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'compact' => 'video-player-compact',
            'theater' => 'video-player-theater bg-black',
            default => 'video-player-default',
        };
    }

    /**
     * Get the CSS classes for the video player size.
     */
    public function getSizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'max-w-sm aspect-video',
            'lg' => 'max-w-4xl aspect-video',
            'xl' => 'max-w-6xl aspect-video',
            default => 'max-w-2xl aspect-video',
        };
    }

    /**
     * Get the CSS classes for the video container.
     */
    public function getContainerClasses(): string
    {
        $classes = [
            'relative',
            'w-full',
            'overflow-hidden',
            'rounded-lg',
            'bg-black',
            $this->getSizeClasses(),
            $this->getVariantClasses(),
        ];

        return implode(' ', array_filter($classes));
    }

    /**
     * Get the CSS classes for the video element.
     */
    public function getVideoClasses(): string
    {
        return 'w-full h-full object-cover';
    }

    /**
     * Get the CSS classes for the controls overlay.
     */
    public function getControlsClasses(): string
    {
        return 'absolute inset-0 flex flex-col justify-between p-4 text-white';
    }

    /**
     * Get the CSS classes for control buttons.
     */
    public function getControlButtonClasses(): string
    {
        return 'inline-flex items-center justify-center p-2 text-white hover:text-primary bg-black/50 hover:bg-black/70 rounded-md transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed';
    }

    /**
     * Get the CSS classes for the timeline/progress bar.
     */
    public function getTimelineClasses(): string
    {
        return 'w-full h-1 bg-white/30 rounded-full appearance-none cursor-pointer';
    }

    /**
     * Get the CSS classes for the volume control.
     */
    public function getVolumeClasses(): string
    {
        return 'w-20 h-1 bg-white/30 rounded-full appearance-none cursor-pointer';
    }

    /**
     * Generate unique video player ID.
     */
    public function getVideoPlayerId(): string
    {
        static $playerCount = 0;

        return 'strata-video-player-'.(++$playerCount).'-'.substr(md5(uniqid()), 0, 6);
    }

    /**
     * Check if video player has multiple sources.
     */
    public function hasMultipleSources(): bool
    {
        return count($this->sources) > 1;
    }

    /**
     * Get the primary video source.
     */
    public function getPrimarySource(): ?array
    {
        return reset($this->sources) ?: null;
    }

    /**
     * Check if fullscreen should be supported.
     */
    public function shouldSupportFullscreen(): bool
    {
        return $this->fullscreenSupported && $this->controls;
    }

    /**
     * Get comprehensive video player configuration for JavaScript.
     */
    public function getVideoPlayerConfig(): array
    {
        return [
            'id' => $this->getVideoPlayerId(),
            'sources' => $this->sources,
            'poster' => $this->poster,
            'controls' => $this->controls,
            'autoplay' => $this->autoplay,
            'loop' => $this->loop,
            'muted' => $this->muted,
            'preload' => $this->preload,
            'volume' => $this->volume,
            'autoHideControlsDelay' => $this->autoHideControlsDelay,
            'variant' => $this->variant,
            'size' => $this->size,
            'fullscreenSupported' => $this->shouldSupportFullscreen(),
        ];
    }

    /**
     * Get time display format configuration.
     */
    public function getTimeDisplayConfig(): array
    {
        return [
            'showElapsed' => true,
            'showDuration' => true,
            'format' => 'mm:ss',
        ];
    }

    /**
     * Check if controls should be visible by default.
     */
    public function shouldShowControls(): bool
    {
        return $this->controls;
    }

    /**
     * Get accessibility attributes for the video element.
     */
    public function getVideoAttributes(): array
    {
        $attributes = [
            'aria-label' => 'Video player',
            'tabindex' => '0',
        ];

        if ($this->poster) {
            $attributes['poster'] = $this->poster;
        }

        return $attributes;
    }

    /**
     * Get the CSS classes for the poster overlay.
     */
    public function getPosterClasses(): string
    {
        return 'absolute inset-0 object-cover w-full h-full pointer-events-none';
    }
}