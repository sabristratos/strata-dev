/**
 * Color Picker Component for Strata UI
 * 
 * Provides comprehensive color picking with multiple color spaces and brand colors
 */

import { createFormComponent, extendComponent } from './BaseComponent.js';
import { EVENTS } from '../utilities/events.js';
import {
    parseColor,
    convertColorFormat,
    formatColor,
    getBrandColors,
    rgbToHsl,
    hslToRgb,
    hsvToRgb,
    rgbToHsv,
    rgbToHex,
    hexToRgb,
    generateColorPalette,
    isValidColor
} from '../utilities/colors.js';

/**
 * Create a color picker component
 * @param {Object} config - Color picker configuration
 * @returns {Object} Color picker component configuration
 */
export function createBaseColorPicker(config = {}) {
    const baseComponent = createFormComponent({
        ...config,
        componentName: 'strata-color-picker'
    });
    
    return extendComponent(baseComponent, {

        open: false,
        

        variant: config.variant || 'default',
        showAlpha: config.showAlpha || false,
        allowCustom: config.allowCustom !== false,
        brandColors: config.brandColors !== false,
        format: config.format || 'hex',
        

        currentColor: null,
        displayValue: '',
        alpha: config.alpha || 1,
        

        hue: 0,
        saturation: 100,
        brightness: 100,  // Renamed from 'value' to avoid collision with form value
        isDragging: false,
        dragTarget: null,
        

        pickerCanvas: null,
        pickerCtx: null,
        hueCanvas: null,
        hueCtx: null,
        

        availableBrandColors: {},
        

        colorSearchQuery: '',
        

        inputError: false,
        
        /**
         * Color picker initialization
         */
        init() {
            try {
                

                this.validateConfiguration();
                

                this.initializeColor();
                

                this.loadBrandColors();
                

                this.$nextTick(() => {
                    this.initializeCanvases();
                    this.updatePickerDisplay();
                });
                

                this.setupGlobalEventHandlers();
                
            } catch (error) {
                

                this.currentColor = parseColor('#6366f1');
                this.displayValue = '#6366f1';
                this.alpha = 1;
                this.hue = 225;
                this.saturation = 92;  // Indigo primary has high saturation  
                this.brightness = 95;       // Indigo primary has high brightness
                this.availableBrandColors = {};
                
            }
        },
        
        /**
         * Validate and auto-correct invalid configuration combinations
         */
        validateConfiguration() {
            try {
                const alphaFormats = ['rgba', 'hsla'];
                const nonAlphaFormats = ['hex', 'hsl', 'rgb'];
                const originalFormat = this.format;
                const originalShowAlpha = this.showAlpha;
                let configChanged = false;


                if (alphaFormats.includes(this.format) && !this.showAlpha) {
                    this.showAlpha = true;
                    configChanged = true;
                }


                if (this.showAlpha && nonAlphaFormats.includes(this.format)) {
                    this.format = 'rgba';
                    configChanged = true;
                }


                const defaultColor = this.value || config.defaultColor;
                if (defaultColor && typeof defaultColor === 'string') {
                    const hasAlphaInColor = defaultColor.includes('rgba') || defaultColor.includes('hsla');
                    
                    if (hasAlphaInColor && nonAlphaFormats.includes(this.format)) {
                    }
                }

                if (configChanged) {
                }

            } catch (error) {
                

                this.format = 'hex';
                this.showAlpha = false;
            }
        },
        
        /**
         * Check if a value is a valid color string
         */
        isValidColorString(value) {
            return typeof value === 'string' && 
                   value.length > 0 && 
                   !value.includes('[object') && 
                   (value.startsWith('#') || value.startsWith('rgb') || value.startsWith('hsl') || value.startsWith('oklch'));
        },
        
        /**
         * Initialize color from value or default
         */
        initializeColor() {
            try {
                let initialColor;
                

                if (this.isValidColorString(this.value)) {
                    initialColor = this.value;
                } else if (this.isValidColorString(config.defaultColor)) {
                    initialColor = config.defaultColor;
                } else {
                    initialColor = '#6366f1';
                }
                
                
                if (typeof initialColor === 'string') {
                    this.currentColor = parseColor(initialColor) || parseColor('#6366f1');
                } else {
                    this.currentColor = initialColor;
                }
                

                if (!this.currentColor) {
                    this.currentColor = parseColor('#6366f1');
                }
                

                let effectiveAlpha = this.alpha;
                if (this.currentColor && this.currentColor.a !== undefined && this.showAlpha) {
                    effectiveAlpha = this.currentColor.a;
                    this.alpha = effectiveAlpha; // Update our alpha to match the color
                }
                

                if (this.currentColor && this.format) {
                    this.currentColor = convertColorFormat(this.currentColor, this.format, effectiveAlpha);
                }
                
                
                if (this.currentColor) {
                    this.syncColorToHSV();
                    this.updateDisplayValue();
                    
                    

                    this.$nextTick(() => {
                        if (this.pickerCanvas && this.hueCanvas) {
                            this.updatePickerDisplay();
                        } else {
                        }
                    });
                }
            } catch (error) {
                

                this.currentColor = parseColor('#6366f1');
                this.displayValue = '#6366f1';
                this.alpha = 1;
                this.hue = 225;
                this.saturation = 92; // Indigo primary has high saturation
                this.brightness = 95;      // Indigo primary has high brightness
            }
        },
        
        /**
         * Load brand colors from CSS custom properties and check accessibility
         */
        loadBrandColors() {
            if (this.brandColors) {
                const colors = getBrandColors();
                

                
                this.availableBrandColors = colors;
            }
        },
        
        /**
         * Set up global event handlers for dragging
         */
        setupGlobalEventHandlers() {
            const handleMouseMove = (e) => {
                if (this.isDragging) {
                    this.handleDrag(e);
                }
            };
            
            const handleMouseUp = () => {
                this.isDragging = false;
                this.dragTarget = null;
            };
            
            window.addEventListener('mousemove', handleMouseMove);
            window.addEventListener('mouseup', handleMouseUp);
            
            this.addCleanup(() => {
                window.removeEventListener('mousemove', handleMouseMove);
                window.removeEventListener('mouseup', handleMouseUp);
            });
        },
        
        /**
         * Initialize canvas elements for color picking
         */
        initializeCanvases() {

            this.pickerCanvas = this.$refs.pickerCanvas;
            if (this.pickerCanvas) {
                this.pickerCtx = this.pickerCanvas.getContext('2d');
                this.drawColorPicker();
            }
            

            this.hueCanvas = this.$refs.hueCanvas;
            if (this.hueCanvas) {
                this.hueCtx = this.hueCanvas.getContext('2d');
                this.drawHueSlider();
            }
        },
        
        /**
         * Draw the main color picker area
         */
        drawColorPicker() {
            if (!this.pickerCtx) return;
            
            const canvas = this.pickerCanvas;
            const ctx = this.pickerCtx;
            const width = canvas.width;
            const height = canvas.height;
            

            const baseColor = hslToRgb(this.hue, 100, 50);
            

            const horizontalGrad = ctx.createLinearGradient(0, 0, width, 0);
            horizontalGrad.addColorStop(0, 'white');
            horizontalGrad.addColorStop(1, `rgb(${baseColor.r}, ${baseColor.g}, ${baseColor.b})`);
            
            ctx.fillStyle = horizontalGrad;
            ctx.fillRect(0, 0, width, height);
            

            const verticalGrad = ctx.createLinearGradient(0, 0, 0, height);
            verticalGrad.addColorStop(0, 'rgba(0, 0, 0, 0)');
            verticalGrad.addColorStop(1, 'rgba(0, 0, 0, 1)');
            
            ctx.fillStyle = verticalGrad;
            ctx.fillRect(0, 0, width, height);
        },
        
        /**
         * Draw the hue slider
         */
        drawHueSlider() {
            if (!this.hueCtx) return;
            
            const canvas = this.hueCanvas;
            const ctx = this.hueCtx;
            const width = canvas.width;
            const height = canvas.height;
            
            const gradient = ctx.createLinearGradient(0, 0, width, 0);
            

            for (let i = 0; i <= 6; i++) {
                const hue = i * 60;
                const color = hslToRgb(hue, 100, 50);
                gradient.addColorStop(i / 6, `rgb(${color.r}, ${color.g}, ${color.b})`);
            }
            
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, width, height);
        },
        
        /**
         * Handle mouse down on picker area
         */
        handlePickerMouseDown(e) {
            this.isDragging = true;
            this.dragTarget = 'picker';
            this.handlePickerMove(e);
        },
        
        /**
         * Handle mouse down on hue slider
         */
        handleHueMouseDown(e) {
            this.isDragging = true;
            this.dragTarget = 'hue';
            this.handleHueMove(e);
        },
        
        /**
         * Handle dragging events
         */
        handleDrag(e) {
            if (this.dragTarget === 'picker') {
                this.handlePickerMove(e);
            } else if (this.dragTarget === 'hue') {
                this.handleHueMove(e);
            } else if (this.dragTarget === 'alpha') {
                this.handleAlphaMove(e);
            }
        },
        
        /**
         * Handle picker area movement
         */
        handlePickerMove(e) {
            if (!this.pickerCanvas || !this.pickerCanvas.getBoundingClientRect) return;
            

            const rect = this.pickerCanvas.getBoundingClientRect.call(this.pickerCanvas);
            const x = Math.max(0, Math.min(e.clientX - rect.left, rect.width));
            const y = Math.max(0, Math.min(e.clientY - rect.top, rect.height));
            
            this.saturation = Math.round((x / rect.width) * 100);
            this.brightness = Math.round(100 - (y / rect.height) * 100);
            

            this.updateColorFromHSV();
        },
        
        /**
         * Handle hue slider movement
         */
        handleHueMove(e) {
            if (!this.hueCanvas || !this.hueCanvas.getBoundingClientRect) {
                return;
            }
            
            try {

                const rect = this.hueCanvas.getBoundingClientRect.call(this.hueCanvas);
                

                if (!rect || typeof rect.left !== 'number' || typeof rect.width !== 'number' || rect.width <= 0) {
                    return;
                }
                

                if (!e || typeof e.clientX !== 'number') {
                    return;
                }
                
                const x = Math.max(0, Math.min(e.clientX - rect.left, rect.width));
                const newHue = Math.round((x / rect.width) * 360);
                

                if (isNaN(newHue) || newHue < 0 || newHue > 360) {
                    return;
                }
                
                this.hue = newHue;
                

                if (isNaN(this.saturation) || this.saturation < 0 || this.saturation > 100) {
                    this.saturation = 100;
                }
                if (isNaN(this.brightness) || this.brightness < 0 || this.brightness > 100) {
                    this.brightness = 100;
                }
                
                this.drawColorPicker();
                this.updateColorFromHSV();
            } catch (error) {
            }
        },
        
        /**
         * Validate and sanitize HSV values
         */
        validateHSVValues() {

            if (typeof this.hue !== 'number' || isNaN(this.hue)) {
                this.hue = 0;
            } else {
                this.hue = Math.max(0, Math.min(360, this.hue));
            }
            

            if (typeof this.saturation !== 'number' || isNaN(this.saturation)) {
                this.saturation = 100;
            } else {
                this.saturation = Math.max(0, Math.min(100, this.saturation));
            }
            

            if (typeof this.brightness !== 'number' || isNaN(this.brightness)) {
                this.brightness = 100;
            } else {
                this.brightness = Math.max(0, Math.min(100, this.brightness));
            }
        },

        /**
         * Update color from HSV values with validation
         */
        updateColorFromHSV() {

            this.validateHSVValues();
            
            const rgb = hsvToRgb(this.hue, this.saturation, this.brightness);
            

            if (!rgb || typeof rgb.r !== 'number' || typeof rgb.g !== 'number' || typeof rgb.b !== 'number') {
                return;
            }
            
            this.currentColor = convertColorFormat(
                { format: 'rgb', ...rgb },
                this.format,
                this.alpha
            );
            
            this.setValue(formatColor(this.currentColor));
            this.updateDisplayValue();
            

            this.syncVisualIndicators();
        },
        
        /**
         * Synchronize visual indicators (crosshair and hue thumb positions)
         */
        syncVisualIndicators() {


            this.drawColorPicker();
            


            const pickerPos = this.getPickerPosition();
            const huePos = this.getHuePosition();
            


        },
        
        /**
         * Sync current color to HSV values for picker
         */
        syncColorToHSV() {
            
            if (!this.currentColor) return;
            
            let rgb = this.currentColor;
            if (this.currentColor.format === 'hex') {
                rgb = hexToRgb(this.currentColor.value);
            }
            
            if (rgb) {
                const hsv = rgbToHsv(rgb.r, rgb.g, rgb.b);
                
                this.hue = hsv.h;
                this.saturation = hsv.s;
                this.brightness = hsv.v;
                
            }
        },
        
        /**
         * Update display value based on current color and format
         */
        updateDisplayValue() {
            if (this.currentColor) {
                this.displayValue = formatColor(this.currentColor);
            }
        },
        
        /**
         * Update picker display when hue changes
         */
        updatePickerDisplay() {
            this.drawColorPicker();
        },
        
        /**
         * Select a brand color
         */
        selectBrandColor(colorKey) {
            const brandColor = this.availableBrandColors[colorKey];
            if (!brandColor) return;
            
            const parsed = parseColor(brandColor.value);
            if (parsed) {
                this.currentColor = convertColorFormat(parsed, this.format, this.alpha);
                this.setValue(formatColor(this.currentColor));
                this.syncColorToHSV();
                this.updateDisplayValue();
                this.updatePickerDisplay();
                
                this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                    value: this.value,
                    color: this.currentColor,
                    source: 'brand'
                });
            }
        },
        
        /**
         * Handle manual color input
         */
        handleColorInput() {
            this.inputError = false;
            
            if (!isValidColor(this.displayValue)) {
                this.inputError = true;
                return;
            }
            
            const parsed = parseColor(this.displayValue);
            if (parsed) {
                this.currentColor = convertColorFormat(parsed, this.format, this.alpha);
                this.setValue(formatColor(this.currentColor));
                this.syncColorToHSV();
                this.updatePickerDisplay();
                
                this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                    value: this.value,
                    color: this.currentColor,
                    source: 'input'
                });
            } else {
                this.inputError = true;
            }
        },
        
        /**
         * Change color format
         */
        changeFormat(newFormat) {
            if (this.currentColor) {
                this.format = newFormat;
                this.currentColor = convertColorFormat(this.currentColor, newFormat, this.alpha);
                this.setValue(formatColor(this.currentColor));
                this.updateDisplayValue();
            }
        },
        
        /**
         * Update alpha value
         */
        updateAlpha(newAlpha) {
            this.alpha = newAlpha;
            if (this.currentColor) {
                this.currentColor = convertColorFormat(this.currentColor, this.format, newAlpha);
                this.setValue(formatColor(this.currentColor));
                this.updateDisplayValue();
            }
        },
        
        /**
         * Get current color as CSS value
         */
        getCurrentColorStyle() {
            if (!this.currentColor) return 'transparent';
            
            return formatColor({
                ...this.currentColor,
                a: this.alpha
            });
        },
        
        /**
         * Get picker position based on current saturation and value
         */
        getPickerPosition() {
            if (!this.pickerCanvas) {
                return { x: 6, y: 6 };
            }
            
            const width = this.pickerCanvas.width || 280;
            const height = this.pickerCanvas.height || 160;
            

            const rawX = Math.round((this.saturation / 100) * width);
            const rawY = Math.round(((100 - this.brightness) / 100) * height);
            


            const position = {
                x: Math.max(6, Math.min(width - 6, rawX)),
                y: Math.max(6, Math.min(height - 6, rawY))
            };
            
            return position;
        },
        
        /**
         * Get hue slider position
         */
        getHuePosition() {
            if (!this.hueCanvas) {
                return { x: 8 };
            }
            
            const width = this.hueCanvas.width || 280;
            

            const rawX = Math.round((this.hue / 360) * width);
            


            const position = {
                x: Math.max(8, Math.min(width - 8, rawX))
            };
            
            return position;
        },
        
        /**
         * Get alpha slider position
         */
        getAlphaPosition() {
            if (!this.$refs.alphaSlider) return { x: 0 };
            
            const width = this.$refs.alphaSlider.offsetWidth || 280;
            
            return {
                x: Math.round(this.alpha * width)
            };
        },
        
        /**
         * Handle alpha slider mouse down
         */
        handleAlphaMouseDown(e) {
            this.isDragging = true;
            this.dragTarget = 'alpha';
            this.handleAlphaMove(e);
        },
        
        /**
         * Handle alpha slider movement
         */
        handleAlphaMove(e) {
            if (!this.$refs.alphaSlider || !this.$refs.alphaSlider.getBoundingClientRect) return;
            

            const rect = this.$refs.alphaSlider.getBoundingClientRect.call(this.$refs.alphaSlider);
            const x = Math.max(0, Math.min(e.clientX - rect.left, rect.width));
            
            this.updateAlpha(x / rect.width);
        },
        
        /**
         * Get brand colors grouped by category with search filtering
         */
        getBrandColorsByCategory() {
            const grouped = {};
            const searchQuery = (this.colorSearchQuery || '').toLowerCase().trim();
            
            Object.entries(this.availableBrandColors).forEach(([key, color]) => {

                if (searchQuery && searchQuery.length > 0) {
                    const searchableText = [
                        color.name,
                        color.value,
                        color.variant,
                        key,
                        color.category
                    ].join(' ').toLowerCase();
                    
                    if (!searchableText.includes(searchQuery)) {
                        return; // Skip this color if it doesn't match search
                    }
                }
                
                if (!grouped[color.category]) {
                    grouped[color.category] = [];
                }
                grouped[color.category].push({ key, ...color });
            });
            

            const categoryPriority = {
                'brand': 1,
                'semantic': 2,
                'neutral': 3,
                'extended': 4,
                'chart': 5
            };
            
            const sortedGrouped = {};
            Object.keys(grouped)
                .sort((a, b) => (categoryPriority[a] || 999) - (categoryPriority[b] || 999))
                .forEach(category => {

                    sortedGrouped[category] = grouped[category].sort((a, b) => {

                        const aVariant = parseInt(a.variant) || 0;
                        const bVariant = parseInt(b.variant) || 0;
                        
                        if (aVariant !== bVariant && aVariant > 0 && bVariant > 0) {
                            return aVariant - bVariant;
                        }
                        

                        return a.name.localeCompare(b.name);
                    });
                });
            
            return sortedGrouped;
        },
        
        /**
         * Generate color palette from current color
         */
        getColorPalette() {
            if (!this.currentColor) return [];
            
            let rgb = this.currentColor;
            if (this.currentColor.format === 'hex') {
                rgb = hexToRgb(this.currentColor.value);
            }
            

            if (!rgb || typeof rgb.r !== 'number' || typeof rgb.g !== 'number' || typeof rgb.b !== 'number') {
                return [];
            }
            
            return generateColorPalette(rgb, 9);
        },
        
        /**
         * Select color from palette
         */
        selectPaletteColor(paletteColor) {
            this.currentColor = convertColorFormat(
                { format: 'rgb', ...paletteColor },
                this.format,
                this.alpha
            );
            this.setValue(formatColor(this.currentColor));
            this.syncColorToHSV();
            this.updateDisplayValue();
            this.updatePickerDisplay();
            
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: this.value,
                color: this.currentColor,
                source: 'palette'
            });
        },
        
        
        /**
         * Toggle color picker dropdown
         */
        toggle() {
            this.open = !this.open;
            
            if (this.open) {
                this.$nextTick(() => {
                    this.initializeCanvases();
                    this.updatePickerDisplay();
                });
            }
        },
        
        /**
         * Close color picker
         */
        close() {
            this.open = false;
            this.isDragging = false;
            this.dragTarget = null;
        },
        
        
        /**
         * Clear color selection
         */
        clearColor() {
            this.currentColor = null;
            this.setValue('');
            this.displayValue = '';
            
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                value: this.value,
                color: null,
                source: 'clear'
            });
        },
        
        /**
         * Get available formats for format switcher
         */
        getAvailableFormats() {
            const formats = [
                { key: 'hex', label: 'HEX' },
                { key: 'rgb', label: 'RGB' },
                { key: 'hsl', label: 'HSL' },
                { key: 'oklch', label: 'OKLCH' }
            ];
            
            if (this.showAlpha) {
                formats.push(
                    { key: 'rgba', label: 'RGBA' },
                    { key: 'hsla', label: 'HSLA' }
                );
            }
            
            return formats;
        },
        
        /**
         * Get color preview style for trigger button
         */
        getPreviewStyle() {
            if (!this.currentColor) {
                return 'background: linear-gradient(45deg, #ccc 25%, transparent 25%), linear-gradient(-45deg, #ccc 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #ccc 75%), linear-gradient(-45deg, transparent 75%, #ccc 75%); background-size: 8px 8px; background-position: 0 0, 0 4px, 4px -4px, -4px 0px;';
            }
            
            const colorStyle = this.getCurrentColorStyle();
            
            if (this.showAlpha && this.alpha < 1) {
                return `background: linear-gradient(45deg, #ccc 25%, transparent 25%), linear-gradient(-45deg, #ccc 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #ccc 75%), linear-gradient(-45deg, transparent 75%, #ccc 75%); background-size: 8px 8px; background-position: 0 0, 0 4px, 4px -4px, -4px 0px; background-color: ${colorStyle};`;
            }
            
            return `background-color: ${colorStyle};`;
        },
        
        /**
         * Get alpha gradient style for the alpha slider
         */
        getAlphaGradientStyle() {
            if (!this.currentColor) {
                return 'background: linear-gradient(to right, transparent, transparent);';
            }
            

            const colorStyle = this.getCurrentColorStyle();
            


            let rgbColor;
            if (colorStyle.includes('rgba') || colorStyle.includes('rgb')) {

                const rgbMatch = colorStyle.match(/rgba?\(([^,]+),\s*([^,]+),\s*([^,)]+)/);
                if (rgbMatch) {
                    const r = Math.round(parseFloat(rgbMatch[1]));
                    const g = Math.round(parseFloat(rgbMatch[2]));
                    const b = Math.round(parseFloat(rgbMatch[3]));
                    rgbColor = `rgb(${r}, ${g}, ${b})`;
                } else {

                    rgbColor = `rgb(${this.currentColor?.r || 0}, ${this.currentColor?.g || 0}, ${this.currentColor?.b || 0})`;
                }
            } else {

                rgbColor = `rgb(${this.currentColor?.r || 0}, ${this.currentColor?.g || 0}, ${this.currentColor?.b || 0})`;
            }
            
            return `background: linear-gradient(to right, transparent, ${rgbColor});`;
        },
        
        /**
         * Handle keyboard navigation in color picker
         */
        handleKeydown(event) {
            if (!this.open) return;
            
            switch (event.key) {
                case 'Escape':
                    this.close();
                    break;
                case 'Tab':

                    break;
                case 'ArrowUp':
                    event.preventDefault();
                    this.brightness = Math.min(100, this.brightness + 1);
                    this.updateColorFromHSV();
                    break;
                case 'ArrowDown':
                    event.preventDefault();
                    this.brightness = Math.max(0, this.brightness - 1);
                    this.updateColorFromHSV();
                    break;
                case 'ArrowLeft':
                    event.preventDefault();
                    this.saturation = Math.max(0, this.saturation - 1);
                    this.updateColorFromHSV();
                    break;
                case 'ArrowRight':
                    event.preventDefault();
                    this.saturation = Math.min(100, this.saturation + 1);
                    this.updateColorFromHSV();
                    break;
            }
        },
        
        /**
         * Copy color value to clipboard
         */
        async copyColor() {
            try {
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    await navigator.clipboard.writeText(this.displayValue);
                    this.dispatchComponentEvent(EVENTS.CHANGE, {
                        action: 'copy',
                        value: this.displayValue,
                        success: true
                    });
                } else {

                    this.copyToClipboardFallback(this.displayValue);
                }
            } catch (error) {

                this.copyToClipboardFallback(this.displayValue);
            }
        },
        
        /**
         * Fallback method for copying to clipboard in non-secure contexts
         */
        copyToClipboardFallback(text) {
            try {
                const textArea = document.createElement('textarea');
                textArea.value = text;
                textArea.style.position = 'fixed';
                textArea.style.left = '-999999px';
                textArea.style.top = '-999999px';
                document.body.appendChild(textArea);
                textArea.select();
                
                const successful = document.execCommand('copy');
                document.body.removeChild(textArea);
                
                this.dispatchComponentEvent(EVENTS.CHANGE, {
                    action: 'copy',
                    value: text,
                    success: successful,
                    fallback: true
                });
                
                if (!successful) {
                }
            } catch (fallbackError) {
                this.dispatchComponentEvent(EVENTS.CHANGE, {
                    action: 'copy',
                    value: text,
                    success: false,
                    error: 'Clipboard not supported'
                });
            }
        },
        
        /**
         * Check if current color has transparency
         */
        hasTransparency() {
            return this.showAlpha && this.alpha < 1;
        },
        
    });
}

export default {
    createBaseColorPicker
};