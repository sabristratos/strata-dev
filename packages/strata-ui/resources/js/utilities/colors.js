/**
 * Color Conversion Utilities for Strata UI
 * 
 * Provides conversion between different color spaces and formats
 */

/**
 * Parse OKLCH color value from CSS custom property
 * @param {string} oklchValue - OKLCH string like "oklch(0.6104 0.0767 299.7335)"
 * @returns {Object} Parsed OKLCH values
 */
export function parseOKLCH(oklchValue) {
    const match = oklchValue.match(/oklch\(([^)]+)\)/);
    if (!match) return null;
    
    const values = match[1].split(/\s+/);
    return {
        l: parseFloat(values[0]),
        c: parseFloat(values[1]),
        h: parseFloat(values[2]) || 0
    };
}

/**
 * Convert OKLCH to RGB using the correct OKLCH → OKLAB → Linear RGB → sRGB conversion
 * @param {number} l - Lightness (0-1)
 * @param {number} c - Chroma
 * @param {number} h - Hue (degrees)
 * @returns {Object} RGB values
 */
export function oklchToRgb(l, c, h) {

    const hRad = (h * Math.PI) / 180;
    const a = c * Math.cos(hRad);
    const bVal = c * Math.sin(hRad);
    

    let lms1 = l + 0.3963377774 * a + 0.2158037573 * bVal;
    let lms2 = l - 0.1055613458 * a - 0.0638541728 * bVal;
    let lms3 = l - 0.0894841775 * a - 1.2914855480 * bVal;
    

    lms1 = lms1 * lms1 * lms1;
    lms2 = lms2 * lms2 * lms2;
    lms3 = lms3 * lms3 * lms3;
    

    let rLinear = +4.0767416621 * lms1 - 3.3077115913 * lms2 + 0.2309699292 * lms3;
    let gLinear = -1.2684380046 * lms1 + 2.6097574011 * lms2 - 0.3413193965 * lms3;
    let bLinear = -0.0041960863 * lms1 - 0.7034186147 * lms2 + 1.7076147010 * lms3;
    

    const gammaCorrect = (c) => {
        if (c <= 0.0031308) {
            return 12.92 * c;
        } else {
            return 1.055 * Math.pow(c, 1 / 2.4) - 0.055;
        }
    };
    
    let r = gammaCorrect(Math.max(0, rLinear));
    let g = gammaCorrect(Math.max(0, gLinear));
    let b = gammaCorrect(Math.max(0, bLinear));
    

    return {
        r: Math.round(Math.max(0, Math.min(1, r)) * 255),
        g: Math.round(Math.max(0, Math.min(1, g)) * 255),
        b: Math.round(Math.max(0, Math.min(1, b)) * 255)
    };
}

/**
 * Convert RGB to HSL
 * @param {number} r - Red (0-255)
 * @param {number} g - Green (0-255)
 * @param {number} b - Blue (0-255)
 * @returns {Object} HSL values
 */
export function rgbToHsl(r, g, b) {
    r /= 255;
    g /= 255;
    b /= 255;
    
    const max = Math.max(r, g, b);
    const min = Math.min(r, g, b);
    const delta = max - min;
    
    let h = 0;
    const l = (max + min) / 2;
    const s = delta === 0 ? 0 : delta / (1 - Math.abs(2 * l - 1));
    
    if (delta !== 0) {
        switch (max) {
            case r:
                h = ((g - b) / delta) % 6;
                break;
            case g:
                h = (b - r) / delta + 2;
                break;
            case b:
                h = (r - g) / delta + 4;
                break;
        }
    }
    
    h = Math.round(h * 60);
    if (h < 0) h += 360;
    
    return {
        h,
        s: Math.round(s * 100),
        l: Math.round(l * 100)
    };
}

/**
 * Convert HSL to RGB
 * @param {number} h - Hue (0-360)
 * @param {number} s - Saturation (0-100)
 * @param {number} l - Lightness (0-100)
 * @returns {Object} RGB values
 */
export function hslToRgb(h, s, l) {
    h = h % 360;
    s /= 100;
    l /= 100;
    
    const c = (1 - Math.abs(2 * l - 1)) * s;
    const x = c * (1 - Math.abs((h / 60) % 2 - 1));
    const m = l - c / 2;
    
    let r, g, b;
    
    if (h >= 0 && h < 60) {
        [r, g, b] = [c, x, 0];
    } else if (h >= 60 && h < 120) {
        [r, g, b] = [x, c, 0];
    } else if (h >= 120 && h < 180) {
        [r, g, b] = [0, c, x];
    } else if (h >= 180 && h < 240) {
        [r, g, b] = [0, x, c];
    } else if (h >= 240 && h < 300) {
        [r, g, b] = [x, 0, c];
    } else {
        [r, g, b] = [c, 0, x];
    }
    
    return {
        r: Math.round((r + m) * 255),
        g: Math.round((g + m) * 255),
        b: Math.round((b + m) * 255)
    };
}

/**
 * Convert HSV to RGB with input validation
 * @param {number} h - Hue (0-360)
 * @param {number} s - Saturation (0-100)
 * @param {number} v - Value/Brightness (0-100)
 * @returns {Object} RGB values
 */
export function hsvToRgb(h, s, v) {

    if (typeof h !== 'number' || isNaN(h)) {
        console.warn('HSV to RGB: Invalid hue value, using 0');
        h = 0;
    }
    if (typeof s !== 'number' || isNaN(s)) {
        console.warn('HSV to RGB: Invalid saturation value, using 100');
        s = 100;
    }
    if (typeof v !== 'number' || isNaN(v)) {
        console.warn('HSV to RGB: Invalid value/brightness, using 100');
        v = 100;
    }
    

    h = Math.max(0, Math.min(360, h)) % 360;
    s = Math.max(0, Math.min(100, s)) / 100;
    v = Math.max(0, Math.min(100, v)) / 100;
    
    const c = v * s;
    const x = c * (1 - Math.abs((h / 60) % 2 - 1));
    const m = v - c;
    
    let r, g, b;
    
    if (h >= 0 && h < 60) {
        [r, g, b] = [c, x, 0];
    } else if (h >= 60 && h < 120) {
        [r, g, b] = [x, c, 0];
    } else if (h >= 120 && h < 180) {
        [r, g, b] = [0, c, x];
    } else if (h >= 180 && h < 240) {
        [r, g, b] = [0, x, c];
    } else if (h >= 240 && h < 300) {
        [r, g, b] = [x, 0, c];
    } else {
        [r, g, b] = [c, 0, x];
    }
    

    const rFinal = (r + m) * 255;
    const gFinal = (g + m) * 255;
    const bFinal = (b + m) * 255;
    

    const result = {
        r: Math.round(Math.max(0, Math.min(255, isNaN(rFinal) ? 0 : rFinal))),
        g: Math.round(Math.max(0, Math.min(255, isNaN(gFinal) ? 0 : gFinal))),
        b: Math.round(Math.max(0, Math.min(255, isNaN(bFinal) ? 0 : bFinal)))
    };
    
    return result;
}

/**
 * Convert RGB to HSV with input validation
 * @param {number} r - Red (0-255)
 * @param {number} g - Green (0-255)
 * @param {number} b - Blue (0-255)
 * @returns {Object} HSV values
 */
export function rgbToHsv(r, g, b) {

    if (typeof r !== 'number' || isNaN(r)) {
        console.warn('RGB to HSV: Invalid red value, using 0');
        r = 0;
    }
    if (typeof g !== 'number' || isNaN(g)) {
        console.warn('RGB to HSV: Invalid green value, using 0');
        g = 0;
    }
    if (typeof b !== 'number' || isNaN(b)) {
        console.warn('RGB to HSV: Invalid blue value, using 0');
        b = 0;
    }
    

    r = Math.max(0, Math.min(255, r)) / 255;
    g = Math.max(0, Math.min(255, g)) / 255;
    b = Math.max(0, Math.min(255, b)) / 255;
    
    const max = Math.max(r, g, b);
    const min = Math.min(r, g, b);
    const delta = max - min;
    
    let h = 0;
    const s = max === 0 ? 0 : delta / max;
    const v = max;
    
    if (delta !== 0) {
        switch (max) {
            case r:
                h = ((g - b) / delta) % 6;
                break;
            case g:
                h = (b - r) / delta + 2;
                break;
            case b:
                h = (r - g) / delta + 4;
                break;
        }
    }
    
    h = Math.round(h * 60);
    if (h < 0) h += 360;
    

    const result = {
        h: isNaN(h) ? 0 : Math.max(0, Math.min(360, h)),
        s: isNaN(s) ? 0 : Math.round(Math.max(0, Math.min(1, s)) * 100),
        v: isNaN(v) ? 0 : Math.round(Math.max(0, Math.min(1, v)) * 100)
    };
    
    return result;
}

/**
 * Convert RGB to HEX
 * @param {number} r - Red (0-255)
 * @param {number} g - Green (0-255)
 * @param {number} b - Blue (0-255)
 * @returns {string} HEX color value
 */
export function rgbToHex(r, g, b) {
    return "#" + [r, g, b].map(x => {
        const hex = x.toString(16);
        return hex.length === 1 ? "0" + hex : hex;
    }).join("");
}

/**
 * Convert HEX to RGB with input validation
 * @param {string} hex - HEX color value
 * @returns {Object} RGB values or fallback
 */
export function hexToRgb(hex) {

    if (typeof hex !== 'string' || !hex) {
        return { r: 0, g: 0, b: 0 };
    }
    
    const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    if (!result) {
        return { r: 0, g: 0, b: 0 };
    }
    

    const r = parseInt(result[1], 16);
    const g = parseInt(result[2], 16);
    const b = parseInt(result[3], 16);
    
    return {
        r: isNaN(r) ? 0 : Math.max(0, Math.min(255, r)),
        g: isNaN(g) ? 0 : Math.max(0, Math.min(255, g)),
        b: isNaN(b) ? 0 : Math.max(0, Math.min(255, b))
    };
}

/**
 * Convert RGB to OKLCH (approximate)
 * @param {number} r - Red (0-255)
 * @param {number} g - Green (0-255)
 * @param {number} b - Blue (0-255)
 * @returns {Object} OKLCH values
 */
export function rgbToOklch(r, g, b) {
    r /= 255;
    g /= 255;
    b /= 255;
    
    r = r > 0.04045 ? Math.pow((r + 0.055) / 1.055, 2.4) : r / 12.92;
    g = g > 0.04045 ? Math.pow((g + 0.055) / 1.055, 2.4) : g / 12.92;
    b = b > 0.04045 ? Math.pow((b + 0.055) / 1.055, 2.4) : b / 12.92;
    
    let x = r * 0.4124 + g * 0.3576 + b * 0.1805;
    let y = r * 0.2126 + g * 0.7152 + b * 0.0722;
    let z = r * 0.0193 + g * 0.1192 + b * 0.9505;
    
    x = x > 0.008856 ? Math.pow(x, 1/3) : (7.787 * x + 16/116);
    y = y > 0.008856 ? Math.pow(y, 1/3) : (7.787 * y + 16/116);
    z = z > 0.008856 ? Math.pow(z, 1/3) : (7.787 * z + 16/116);
    
    const l = Math.max(0, 116 * y - 16) / 100;
    const a = 500 * (x - y);
    const bVal = 200 * (y - z);
    
    const c = Math.sqrt(a * a + bVal * bVal) / 100;
    let h = Math.atan2(bVal, a) * 180 / Math.PI;
    if (h < 0) h += 360;
    
    return {
        l: Math.round(l * 1000) / 1000,
        c: Math.round(c * 10000) / 10000,
        h: Math.round(h * 100) / 100
    };
}

/**
 * Format color values for display
 * @param {Object} color - Color object with format and values
 * @returns {string} Formatted color string
 */
export function formatColor(color) {
    switch (color.format) {
        case 'hex':
            return color.value;
        case 'rgb':
            return `rgb(${color.r}, ${color.g}, ${color.b})`;
        case 'rgba':
            return `rgba(${color.r}, ${color.g}, ${color.b}, ${color.a})`;
        case 'hsl':
            return `hsl(${color.h}, ${color.s}%, ${color.l}%)`;
        case 'hsla':
            return `hsla(${color.h}, ${color.s}%, ${color.l}%, ${color.a})`;
        case 'oklch':
            return `oklch(${color.l} ${color.c} ${color.h})`;
        default:
            return color.value || '#000000';
    }
}

/**
 * Parse color string to object
 * @param {string} colorString - Color string in any format
 * @returns {Object} Parsed color object
 */
export function parseColor(colorString) {
    if (!colorString) return null;
    

    if (colorString.startsWith('#')) {
        const rgb = hexToRgb(colorString);
        if (rgb) {
            return {
                format: 'hex',
                value: colorString,
                ...rgb
            };
        }
    }
    

    const rgbMatch = colorString.match(/rgba?\(([^)]+)\)/);
    if (rgbMatch) {
        const values = rgbMatch[1].split(',').map(v => parseFloat(v.trim()));
        return {
            format: values.length === 4 ? 'rgba' : 'rgb',
            r: values[0],
            g: values[1],
            b: values[2],
            a: values[3] || 1
        };
    }
    

    const hslMatch = colorString.match(/hsla?\(([^)]+)\)/);
    if (hslMatch) {
        const values = hslMatch[1].split(',').map(v => parseFloat(v.trim()));
        return {
            format: values.length === 4 ? 'hsla' : 'hsl',
            h: values[0],
            s: values[1],
            l: values[2],
            a: values[3] || 1
        };
    }
    

    const oklchMatch = colorString.match(/oklch\(([^)]+)\)/);
    if (oklchMatch) {
        const values = oklchMatch[1].split(/\s+/).map(v => parseFloat(v));
        return {
            format: 'oklch',
            l: values[0],
            c: values[1],
            h: values[2] || 0
        };
    }
    
    return null;
}

/**
 * Convert color to different format
 * @param {Object} color - Source color object
 * @param {string} targetFormat - Target format (hex, rgb, hsl, oklch, etc.)
 * @param {number} alpha - Optional alpha value (0-1)
 * @returns {Object} Converted color object
 */
export function convertColorFormat(color, targetFormat, alpha = 1) {
    let rgb = { r: 0, g: 0, b: 0 };
    

    if (color.format === 'hex' || (color.r !== undefined && color.g !== undefined && color.b !== undefined)) {
        rgb = color.format === 'hex' ? hexToRgb(color.value) : { r: color.r, g: color.g, b: color.b };
    } else if (color.format === 'hsl' || color.format === 'hsla') {
        rgb = hslToRgb(color.h, color.s, color.l);
    } else if (color.format === 'oklch') {
        rgb = oklchToRgb(color.l, color.c, color.h);
    }
    

    switch (targetFormat) {
        case 'hex':
            return {
                format: 'hex',
                value: rgbToHex(rgb.r, rgb.g, rgb.b),
                ...rgb
            };
        case 'rgb':
            return {
                format: 'rgb',
                ...rgb
            };
        case 'rgba':
            return {
                format: 'rgba',
                ...rgb,
                a: alpha
            };
        case 'hsl': {
            const hsl = rgbToHsl(rgb.r, rgb.g, rgb.b);
            return {
                format: 'hsl',
                ...rgb,
                ...hsl
            };
        }
        case 'hsla': {
            const hsl = rgbToHsl(rgb.r, rgb.g, rgb.b);
            return {
                format: 'hsla',
                ...rgb,
                ...hsl,
                a: alpha
            };
        }
        case 'oklch': {
            const oklch = rgbToOklch(rgb.r, rgb.g, rgb.b);
            return {
                format: 'oklch',
                ...rgb,
                ...oklch
            };
        }
        default:
            return color;
    }
}

/**
 * Check if a CSS property value represents a color
 * @param {string} value - The CSS property value to check
 * @returns {boolean} Whether the value appears to be a color
 */
export function isColorValue(value) {
    if (!value || typeof value !== 'string') {
        return false;
    }
    
    value = value.trim();
    

    return (
        value.startsWith('#') || // Hex colors
        value.startsWith('rgb(') || // RGB colors
        value.startsWith('rgba(') || // RGBA colors
        value.startsWith('hsl(') || // HSL colors
        value.startsWith('hsla(') || // HSLA colors
        value.startsWith('oklch(') || // OKLCH colors
        value.startsWith('oklab(') || // OKLAB colors
        /^[a-zA-Z]+$/.test(value) // Named colors like 'red', 'blue'
    );
}

/**
 * Get brand colors dynamically from all CSS custom properties in the theme
 * @returns {Object} Brand colors with their values, organized by category
 */
export function getBrandColors() {
    const root = document.documentElement;
    const style = getComputedStyle(root);
    const brandColors = {};
    

    const colorCategories = {
        brand: [
            { pattern: /^--primary-?(.*)$/, baseName: 'Primary' },
            { pattern: /^--accent-?(.*)$/, baseName: 'Accent' }
        ],
        semantic: [
            { pattern: /^--destructive-?(.*)$/, baseName: 'Destructive' },
            { pattern: /^--success-?(.*)$/, baseName: 'Success' },
            { pattern: /^--warning-?(.*)$/, baseName: 'Warning' },
            { pattern: /^--info-?(.*)$/, baseName: 'Info' }
        ],
        neutral: [
            { pattern: /^--slate-?(.*)$/, baseName: 'Slate' }
        ],
        extended: [
            { pattern: /^--teal-?(.*)$/, baseName: 'Teal' },
            { pattern: /^--yellow-?(.*)$/, baseName: 'Yellow' },
            { pattern: /^--indigo-?(.*)$/, baseName: 'Indigo' }
        ],
        chart: [
            { pattern: /^--chart-(.+)$/, baseName: 'Chart' }
        ]
    };
    

    for (let i = 0; i < style.length; i++) {
        const property = style[i];
        if (property.startsWith('--')) {
            const value = style.getPropertyValue(property).trim();
            

            if (!isColorValue(value)) {
                continue;
            }
            

            let categorized = false;
            for (const [category, patterns] of Object.entries(colorCategories)) {
                for (const { pattern, baseName } of patterns) {
                    const match = property.match(pattern);
                    if (match) {
                        const variant = match[1] || '500';
                        const key = `${property.substring(2)}`; // Remove --
                        const displayName = variant ? `${baseName} ${variant}` : baseName;
                        
                        brandColors[key] = {
                            name: displayName,
                            value: value,
                            category: category,
                            property: property,
                            variant: variant
                        };
                        categorized = true;
                        break;
                    }
                }
                if (categorized) break;
            }
        }
    }
    
    return brandColors;
}

/**
 * Calculate relative luminance for accessibility
 * @param {number} r - Red (0-255)
 * @param {number} g - Green (0-255)
 * @param {number} b - Blue (0-255)
 * @returns {number} Relative luminance
 */
export function getRelativeLuminance(r, g, b) {
    const [rs, gs, bs] = [r, g, b].map(c => {
        c = c / 255;
        return c <= 0.03928 ? c / 12.92 : Math.pow((c + 0.055) / 1.055, 2.4);
    });
    
    return 0.2126 * rs + 0.7152 * gs + 0.0722 * bs;
}

/**
 * Calculate contrast ratio between two colors
 * @param {Object} color1 - First color (RGB)
 * @param {Object} color2 - Second color (RGB)
 * @returns {number} Contrast ratio
 */
export function getContrastRatio(color1, color2) {
    const l1 = getRelativeLuminance(color1.r, color1.g, color1.b);
    const l2 = getRelativeLuminance(color2.r, color2.g, color2.b);
    
    const lighter = Math.max(l1, l2);
    const darker = Math.min(l1, l2);
    
    return (lighter + 0.05) / (darker + 0.05);
}

/**
 * Check if a color meets WCAG accessibility standards
 * @param {Object} foreground - Foreground color (RGB)
 * @param {Object} background - Background color (RGB)
 * @param {string} level - WCAG level ('AA' or 'AAA')
 * @returns {Object} Accessibility check result
 */
export function checkColorAccessibility(foreground, background, level = 'AA') {
    const ratio = getContrastRatio(foreground, background);
    
    const thresholds = {
        'AA': { normal: 4.5, large: 3 },
        'AAA': { normal: 7, large: 4.5 }
    };
    
    const threshold = thresholds[level];
    
    return {
        ratio: Math.round(ratio * 100) / 100,
        passes: {
            normal: ratio >= threshold.normal,
            large: ratio >= threshold.large
        },
        level
    };
}

/**
 * Generate a palette of similar colors
 * @param {Object} baseColor - Base RGB color
 * @param {number} count - Number of colors to generate
 * @returns {Array} Array of similar colors
 */
export function generateColorPalette(baseColor, count = 9) {
    const hsl = rgbToHsl(baseColor.r, baseColor.g, baseColor.b);
    const colors = [];
    
    for (let i = 0; i < count; i++) {
        const lightness = Math.round((i / (count - 1)) * 90 + 5); // 5% to 95%
        const adjustedColor = hslToRgb(hsl.h, hsl.s, lightness);
        colors.push({
            ...adjustedColor,
            hex: rgbToHex(adjustedColor.r, adjustedColor.g, adjustedColor.b),
            lightness
        });
    }
    
    return colors;
}

/**
 * Validate color string format
 * @param {string} colorString - Color string to validate
 * @returns {boolean} Whether the color string is valid
 */
export function isValidColor(colorString) {
    if (!colorString) return false;
    

    const testEl = document.createElement('div');
    testEl.style.color = colorString;
    return testEl.style.color !== '';
}

export default {
    parseOKLCH,
    oklchToRgb,
    rgbToHsl,
    hslToRgb,
    hsvToRgb,
    rgbToHsv,
    rgbToHex,
    hexToRgb,
    rgbToOklch,
    formatColor,
    parseColor,
    convertColorFormat,
    getBrandColors,
    isColorValue,
    getRelativeLuminance,
    getContrastRatio,
    checkColorAccessibility,
    generateColorPalette,
    isValidColor
};