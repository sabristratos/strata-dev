/**
 * Base Video Player Component for Strata UI
 * 
 * Simple video player with essential controls following established patterns
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
import { EVENTS } from '../utilities/events.js';

/**
 * Create a video player component
 * @param {Object} config - Video player configuration
 * @returns {Object} Video player component configuration
 */
export function createVideoPlayerComponent(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-video-player'
    });
    
    return extendComponent(baseComponent, {
        // Basic state
        playing: false,
        ended: false,
        muted: config.muted || false,
        volume: config.volume || 1.0,
        showTime: false,
        videoPlayerReady: false,
        hasError: false,
        errorMessage: '',
        controls: config.controls !== false,
        fullscreen: false,
        showControls: false,
        controlsHovered: false,
        hideControlsTimeout: null,
        
        // Configuration
        sources: config.sources || {},
        autoplay: config.autoplay || false,
        loop: config.loop || false,
        preload: config.preload || 'metadata',
        
        // Time tracking
        videoDuration: 0,
        timeElapsedString: '00:00',
        timeDurationString: '00:00',
        
        /**
         * Initialize video player - keep it simple
         */
        init() {
            // Call base component init
            baseComponent.init.call(this);
            
            // Simple setup after Alpine is ready
            this.$nextTick(() => {
                this.setupVideoPlayer();
                this.updateControlsVisibility();
            });
        },
        
        /**
         * Setup video player after DOM is ready
         */
        setupVideoPlayer() {
            if (!this.$refs.player) return;
            
            // Basic setup
            this.$refs.player.controls = false;
            this.$refs.player.muted = this.muted;
            this.$refs.player.volume = this.volume;
            this.$refs.player.loop = this.loop;
            
            if (this.autoplay) {
                this.play();
            }
        },
        
        /**
         * Handle video metadata loaded
         */
        metaDataLoaded(event) {
            this.videoDuration = event.target.duration;
            
            if (this.$refs.videoProgress) {
                this.$refs.videoProgress.setAttribute('max', this.videoDuration);
            }
            
            const time = this.formatTime(Math.round(this.videoDuration));
            this.timeDurationString = `${time.minutes}:${time.seconds}`;
            this.showTime = true;
            this.videoPlayerReady = true;
            
            this.dispatchComponentEvent(EVENTS.VIDEO_READY, {
                duration: this.videoDuration
            });
        },
        
        /**
         * Handle time update
         */
        timeUpdatedInterval() {
            if (!this.$refs.player || !this.$refs.videoProgress) return;
            
            this.$refs.videoProgress.value = this.$refs.player.currentTime;
            const time = this.formatTime(Math.round(this.$refs.player.currentTime));
            this.timeElapsedString = `${time.minutes}:${time.seconds}`;
        },
        
        /**
         * Toggle play/pause
         */
        togglePlay() {
            if (!this.$refs.player) return;
            
            if (this.$refs.player.paused || this.$refs.player.ended) {
                this.play();
            } else {
                this.pause();
            }
        },
        
        /**
         * Play video
         */
        async play() {
            if (!this.$refs.player) return;
            
            try {
                await this.$refs.player.play();
                this.playing = true;
                this.ended = false;
                this.updateControlsVisibility();
                this.dispatchComponentEvent(EVENTS.VIDEO_PLAY);
            } catch (error) {
                console.warn('Video play failed:', error);
                this.dispatchComponentEvent(EVENTS.VIDEO_ERROR, { error });
            }
        },
        
        /**
         * Pause video
         */
        pause() {
            if (!this.$refs.player) return;
            
            this.$refs.player.pause();
            this.playing = false;
            this.updateControlsVisibility();
            this.dispatchComponentEvent(EVENTS.VIDEO_PAUSE);
        },
        
        /**
         * Toggle mute
         */
        toggleMute() {
            if (!this.$refs.player) return;
            
            this.muted = !this.muted;
            this.$refs.player.muted = this.muted;
            
            this.dispatchComponentEvent(EVENTS.VIDEO_MUTE_TOGGLE, { 
                muted: this.muted 
            });
        },
        
        /**
         * Update volume
         */
        updateVolume(e) {
            if (!this.$refs.player) return;
            
            this.volume = parseFloat(e.target.value);
            this.$refs.player.volume = this.volume;
            
            this.dispatchComponentEvent(EVENTS.VIDEO_VOLUME_CHANGE, { 
                volume: this.volume 
            });
        },
        
        /**
         * Handle timeline seek
         */
        timelineSeek(e) {
            if (!this.$refs.player) return;
            
            this.$refs.player.currentTime = e.target.value;
        },
        
        /**
         * Handle video ended
         */
        videoEnded() {
            this.playing = false;
            this.ended = true;
            this.updateControlsVisibility();
            this.dispatchComponentEvent(EVENTS.VIDEO_ENDED);
        },
        
        /**
         * Handle video error
         */
        videoError(event) {
            const error = event.target.error;
            console.error('Video player error:', error);
            
            this.hasError = true;
            this.videoPlayerReady = false;
            
            // Set user-friendly error message based on error code
            if (error) {
                switch (error.code) {
                    case error.MEDIA_ERR_NETWORK:
                        this.errorMessage = 'Network error - could not load video';
                        break;
                    case error.MEDIA_ERR_DECODE:
                        this.errorMessage = 'Video format not supported';
                        break;
                    case error.MEDIA_ERR_SRC_NOT_SUPPORTED:
                        this.errorMessage = 'Video source not supported';
                        break;
                    case error.MEDIA_ERR_ABORTED:
                        this.errorMessage = 'Video loading aborted';
                        break;
                    default:
                        this.errorMessage = 'Unable to load video';
                }
            } else {
                this.errorMessage = 'Unable to load video';
            }
            
            this.dispatchComponentEvent(EVENTS.VIDEO_ERROR, { 
                error: error?.message || this.errorMessage
            });
        },
        
        /**
         * Format time in seconds to MM:SS
         */
        formatTime(timeInSeconds) {
            if (isNaN(timeInSeconds) || timeInSeconds < 0) {
                return { minutes: '00', seconds: '00' };
            }
            
            const result = new Date(timeInSeconds * 1000).toISOString().substring(11, 19);
            
            return {
                minutes: result.substring(3, 5),
                seconds: result.substring(6, 8),
            };
        },
        
        /**
         * Retry loading the video
         */
        retryVideo() {
            if (!this.$refs.player) return;
            
            this.hasError = false;
            this.errorMessage = '';
            this.videoPlayerReady = false;
            
            // Force reload the video
            this.$refs.player.load();
        },
        
        /**
         * Get current player state
         */
        getPlayerState() {
            return {
                playing: this.playing,
                muted: this.muted,
                volume: this.volume,
                currentTime: this.$refs.player?.currentTime || 0,
                duration: this.videoDuration,
                ready: this.videoPlayerReady,
                hasError: this.hasError,
                errorMessage: this.errorMessage
            };
        },
        
        /**
         * Update controls visibility based on state
         */
        updateControlsVisibility() {
            // Show controls when paused or hovered
            this.showControls = !this.playing || this.controlsHovered;
            
            // Clear any existing timeout
            if (this.hideControlsTimeout) {
                clearTimeout(this.hideControlsTimeout);
                this.hideControlsTimeout = null;
            }
            
            // Auto-hide controls after delay when playing
            if (this.playing && !this.controlsHovered) {
                this.hideControlsTimeout = setTimeout(() => {
                    if (this.playing && !this.controlsHovered) {
                        this.showControls = false;
                    }
                }, 3000); // Hide after 3 seconds
            }
        },
        
        /**
         * Handle mouse enter on video container
         */
        mouseEntered() {
            this.controlsHovered = true;
            this.updateControlsVisibility();
        },
        
        /**
         * Handle mouse leave on video container
         */
        mouseLeft() {
            this.controlsHovered = false;
            this.updateControlsVisibility();
        }
    });
}

export default {
    createVideoPlayerComponent
};