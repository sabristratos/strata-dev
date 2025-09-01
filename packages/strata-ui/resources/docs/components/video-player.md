# Video Player Component

The Video Player component provides a comprehensive, accessible video player with custom controls and modern UX patterns.

## Basic Usage

```blade
<x-strata::video-player 
    :sources="[
        'hd' => ['src' => '/videos/sample-hd.mp4', 'type' => 'video/mp4'],
        'sd' => ['src' => '/videos/sample-sd.mp4', 'type' => 'video/mp4']
    ]"
    poster="/images/video-poster.jpg"
/>
```

## Simple Usage

```blade
<x-strata::video-player 
    :sources="['/videos/sample.mp4']"
    poster="/images/poster.jpg"
/>
```

## Configuration Options

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `sources` | array | `[]` | Video sources with quality levels |
| `poster` | string\|null | `null` | Poster image URL |
| `controls` | bool | `true` | Show video controls |
| `autoplay` | bool | `false` | Auto-play video on load |
| `loop` | bool | `false` | Loop video playback |
| `muted` | bool | `false` | Start video muted |
| `preload` | string | `'metadata'` | Preload behavior (`none`, `metadata`, `auto`) |
| `volume` | float | `1.0` | Initial volume (0.0 - 1.0) |
| `autoHideControlsDelay` | int | `3000` | Auto-hide delay in milliseconds |
| `variant` | string | `'default'` | Player variant (`default`, `compact`, `theater`) |
| `size` | string | `'md'` | Player size (`sm`, `md`, `lg`, `xl`) |
| `fullscreenSupported` | bool | `true` | Enable fullscreen support |

## Video Sources

The video player supports multiple source formats and quality levels:

### Simple Array Format
```blade
:sources="[
    '/videos/sample.mp4',
    '/videos/sample.webm'
]"
```

### Extended Format with Quality Labels
```blade
:sources="[
    '1080p' => [
        'src' => '/videos/sample-1080p.mp4',
        'type' => 'video/mp4',
        'label' => '1080p HD'
    ],
    '720p' => [
        'src' => '/videos/sample-720p.mp4', 
        'type' => 'video/mp4',
        'label' => '720p'
    ],
    'webm' => [
        'src' => '/videos/sample.webm',
        'type' => 'video/webm'
    ]
]"
```

## Size Variants

### Small Player
```blade
<x-strata::video-player 
    size="sm"
    :sources="['/videos/sample.mp4']"
/>
```

### Large Player
```blade
<x-strata::video-player 
    size="lg"
    :sources="['/videos/sample.mp4']"
/>
```

### Extra Large Player
```blade
<x-strata::video-player 
    size="xl"
    :sources="['/videos/sample.mp4']"
/>
```

## Player Variants

### Compact Variant
```blade
<x-strata::video-player 
    variant="compact"
    :sources="['/videos/sample.mp4']"
/>
```

### Theater Mode
```blade
<x-strata::video-player 
    variant="theater"
    size="xl"
    :sources="['/videos/sample.mp4']"
/>
```

## Advanced Configuration

### Auto-play with Custom Settings
```blade
<x-strata::video-player 
    :sources="['/videos/sample.mp4']"
    autoplay
    muted
    loop
    preload="auto"
    :volume="0.8"
/>
```

### Custom Control Hiding Delay
```blade
<x-strata::video-player 
    :sources="['/videos/sample.mp4']"
    :autoHideControlsDelay="5000"
/>
```

### No Controls (Presentation Mode)
```blade
<x-strata::video-player 
    :sources="['/videos/sample.mp4']"
    :controls="false"
    autoplay
    muted
    loop
/>
```

## Livewire Integration

The video player supports Livewire wire:model for reactive state management:

```blade
<x-strata::video-player 
    :sources="$videoSources"
    wire:model="videoPlaying"
/>
```

```php
// In your Livewire component
class VideoDemo extends Component
{
    public bool $videoPlaying = false;
    public array $videoSources = [
        '/videos/sample.mp4'
    ];
    
    public function updatedVideoPlaying($value)
    {
        // React to video play/pause state changes
        if ($value) {
            $this->dispatch('video-started');
        }
    }
}
```

## Event Handling

The video player dispatches custom events that you can listen to:

### JavaScript Event Listeners
```javascript
// Listen for video ready
document.addEventListener('strata-video-ready', function(event) {
    console.log('Video ready:', event.detail);
});

// Listen for play/pause events
document.addEventListener('strata-video-play', function(event) {
    console.log('Video started playing');
});

document.addEventListener('strata-video-pause', function(event) {
    console.log('Video paused');
});

// Listen for volume changes
document.addEventListener('strata-video-volume-change', function(event) {
    console.log('Volume changed to:', event.detail.volume);
});

// Listen for errors
document.addEventListener('strata-video-error', function(event) {
    console.log('Video error:', event.detail.error);
});
```

### Alpine.js Integration
```blade
<div x-data="{ videoReady: false }">
    <x-strata::video-player 
        :sources="['/videos/sample.mp4']"
        @strata-video-ready="videoReady = true"
    />
    
    <div x-show="videoReady" x-transition>
        Video is ready to play!
    </div>
</div>
```

## Control Behavior

### Auto-hide Controls
- Controls automatically hide after 3 seconds (configurable) during playback
- Controls remain visible when video is paused
- Hovering over the video shows controls instantly
- Controls fade in/out smoothly with transitions

### Center Play Button
- Large play button appears in center when video is paused
- Button disappears when video starts playing
- Clicking anywhere on the video (when paused) will play it

### Control Bar
- Positioned at bottom with gradient overlay
- Contains play/pause, volume, timeline, and custom controls
- Shows elapsed time and total duration
- Volume slider with mute toggle
- Progress bar allows seeking

## Error Handling

The video player includes comprehensive error handling:

### Network Errors
- Shows user-friendly error message for connection timeouts
- Provides "Try Again" button to retry loading
- Gracefully handles different error types

### Unsupported Formats
- Detects unsupported video formats
- Shows appropriate error message
- Falls back gracefully to next available source

### Error States
```blade
<x-strata::video-player 
    :sources="['https://invalid-url.com/video.mp4']"
/>
```

Will show: "Network error - could not load video" with retry option.

## Accessibility

The video player is fully accessible:

- **Keyboard Navigation**: All controls are keyboard accessible
- **Screen Reader Support**: Proper ARIA labels and live regions
- **Focus Management**: Logical tab order through controls
- **Semantic HTML**: Uses proper semantic elements
- **Status Updates**: Screen readers announce play state changes

### ARIA Features
- `role="region"` with `aria-label="Video Player"`
- Play/pause buttons have dynamic `aria-label` values
- Progress indicators announce current time and duration
- Error states are announced via `aria-live` regions

## Styling and Customization

### CSS Classes
The video player generates semantic CSS classes for styling:

```css
/* Container classes based on variant */
.video-player-default { /* default styling */ }
.video-player-compact { /* compact variant */ }
.video-player-theater { /* theater mode */ }

/* Size classes */
.max-w-sm.aspect-video { /* sm size */ }
.max-w-2xl.aspect-video { /* md size */ }
.max-w-4xl.aspect-video { /* lg size */ }
.max-w-6xl.aspect-video { /* xl size */ }
```

### Custom Controls Slot
Add custom controls to the control bar:

```blade
<x-strata::video-player :sources="['/videos/sample.mp4']">
    <x-slot name="customControls">
        <button type="button" class="text-white hover:text-primary">
            <x-heroicon-o-share class="w-4 h-4" />
        </button>
        <button type="button" class="text-white hover:text-primary">
            <x-heroicon-o-heart class="w-4 h-4" />
        </button>
    </x-slot>
</x-strata::video-player>
```

## Best Practices

### Performance
1. **Use appropriate preload settings**: `metadata` for most cases, `none` for data-sensitive scenarios
2. **Optimize video files**: Provide multiple formats and quality levels
3. **Include poster images**: Improves perceived performance

### User Experience
1. **Start videos muted**: Especially for autoplay videos
2. **Provide captions**: Use WebVTT tracks for accessibility
3. **Consider mobile**: Test on various screen sizes and orientations

### SEO and Accessibility
1. **Use descriptive poster alt text**: Include meaningful descriptions
2. **Provide video transcripts**: For full accessibility compliance
3. **Structure metadata properly**: Include proper video schema markup

## Browser Support

The video player supports all modern browsers:

- **Chrome/Edge**: Full support including all features
- **Firefox**: Full support with all controls
- **Safari**: Full support including mobile Safari
- **iOS/Android**: Native video controls integration

### Fallbacks
- Graceful degradation for older browsers
- Native controls fallback when JavaScript is disabled
- Accessible keyboard navigation in all supported browsers

## Troubleshooting

### Common Issues

**Video won't play**
- Check video file formats are supported
- Verify CORS settings for external videos
- Ensure autoplay policies are followed (muted for autoplay)

**Controls not showing**
- Verify JavaScript is enabled
- Check console for Alpine.js errors  
- Ensure Strata UI bundle is loaded

**Performance issues**
- Optimize video file sizes
- Use appropriate preload settings
- Consider lazy loading for multiple videos

### Debug Mode
Enable debug logging in development:

```blade
<x-strata::video-player 
    :sources="['/videos/sample.mp4']"
    data-debug="true"
/>
```