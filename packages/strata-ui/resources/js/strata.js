/**
 * Strata UI - Main JavaScript Bundle
 * 
 * Provides Alpine.js components and global API for Strata UI.
 * Uses modular utilities for maintainable, reusable code.
 */

import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import anchor from '@alpinejs/anchor'
import focus from '@alpinejs/focus'

// Import utilities
import { safePluginRegistration, registerAlpineComponent, registerAlpineMagic } from './utilities/alpine.js'
import { createBaseModal, closeAllModals } from './components/BaseModal.js'
import { createBaseEditor } from './components/BaseEditor.js'
import { createBaseCalendar } from './components/BaseCalendar.js'
import { createBaseFileUpload } from './components/BaseFileUpload.js'
import { createBaseSelect } from './components/BaseSelect.js'
import { createBaseColorPicker } from './components/BaseColorPicker.js'
import { dispatchModalEvent, dispatchToastEvent, EVENTS } from './utilities/events.js'

// Register Strata components
function registerStrataComponents(Alpine) {
    // Register Modal Component using base modal class
    registerAlpineComponent(Alpine, 'strataModal', (config) => {
        return createBaseModal(config);
    });

    // Register Editor Component using base editor class
    registerAlpineComponent(Alpine, 'strataEditor', (config) => {
        return createBaseEditor(config);
    });

    // Register Calendar Component using base calendar class
    registerAlpineComponent(Alpine, 'strataDateRangePicker', (config) => {
        return createBaseCalendar(config);
    });

    // Register File Upload Component using base file upload class
    registerAlpineComponent(Alpine, 'strataFileUpload', (config) => {
        return createBaseFileUpload(config);
    });

    // Register Select Component using base select class
    registerAlpineComponent(Alpine, 'strataSelect', (config) => {
        return createBaseSelect(config);
    });

    // Register Color Picker Component using base color picker class
    registerAlpineComponent(Alpine, 'strataColorPicker', (config) => {
        return createBaseColorPicker(config);
    });

    // Register Alpine magic property using utility
    registerAlpineMagic(Alpine, 'strata', () => ({
        modal(name) {
            return {
                show(data = {}) {
                    dispatchModalEvent('show', name, data);
                },
                hide() {
                    dispatchModalEvent('hide', name);
                },
                toggle(data = {}) {
                    dispatchModalEvent('toggle', name, data);
                }
            };
        },
        modals() {
            return {
                close() {
                    closeAllModals();
                }
            };
        },
        toast(detail) {
            dispatchToastEvent('show', detail);
        }
    }));
}

// Create Global Strata API (vanilla JavaScript)
function createGlobalStrataAPI() {
    window.Strata = window.Strata || {};
    
    // Modal API using utilities
    window.Strata.modal = function(name) {
        return {
            show(data = {}) {
                dispatchModalEvent('show', name, data);
            },
            hide() {
                dispatchModalEvent('hide', name);
            },
            toggle(data = {}) {
                dispatchModalEvent('toggle', name, data);
            }
        };
    };

    // Modals API using utilities
    window.Strata.modals = function() {
        return {
            close() {
                closeAllModals();
            }
        };
    };

    // Toast API using utilities
    window.Strata.toast = function(detail) {
        dispatchToastEvent('show', detail);
    };
}

// Initialize Strata UI with utilities
function init() {
    if (window.Alpine) {
        // Alpine.js already loaded (e.g., by Livewire)
        safePluginRegistration(window.Alpine, { collapse, anchor, focus });
        registerStrataComponents(window.Alpine);
        createGlobalStrataAPI();
    } else {
        // No Alpine.js found, use our own instance
        safePluginRegistration(Alpine, { collapse, anchor, focus });
        registerStrataComponents(Alpine);
        
        window.Alpine = Alpine;
        Alpine.start();
        
        createGlobalStrataAPI();
    }
}

// Handle session modals from Laravel
function handleSessionModals() {
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
}

// Initialize based on Alpine.js availability  
if (window.Alpine && window.Alpine.version) {
    // Alpine is already loaded
    init();
} else {
    // Wait for Alpine to be available
    document.addEventListener('alpine:init', () => {
        init();
    });
    
    // Fallback if alpine:init doesn't fire
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(init, 50);
        });
    } else {
        setTimeout(init, 50);
    }
}

// Handle session modals
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', handleSessionModals);
} else {
    handleSessionModals();
}

export default Alpine