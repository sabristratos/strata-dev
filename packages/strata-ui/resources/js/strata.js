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


import { safePluginRegistration, registerAlpineComponent, registerAlpineMagic } from './utilities/alpine.js'
import { createBaseModal, closeAllModals } from './components/BaseModal.js'
import { createBaseEditor } from './components/BaseEditor.js'
import { createBaseCalendar } from './components/BaseCalendar.js'
import { createBaseDatepicker } from './components/BaseDatepicker.js'
import { createBaseFileUpload } from './components/BaseFileUpload.js'
import { createBaseSelect } from './components/BaseSelect.js'
import { createBaseColorPicker } from './components/BaseColorPicker.js'
import { createCarouselComponent } from './components/BaseCarousel.js'
import { createAccordionComponent } from './components/BaseAccordion.js'
import { createTabsComponent } from './components/BaseTabs.js'
import { createToastGroupComponent, createToastItemComponent } from './components/BaseToast.js'
import { createRatingComponent } from './components/BaseRating.js'
import { createSidebarComponent, closeAllSidebars } from './components/BaseSidebar.js'
import { dispatchModalEvent, dispatchToastEvent, dispatchGlobalEvent, EVENTS } from './utilities/events.js'


function registerStrataComponents(Alpine) {

    registerAlpineComponent(Alpine, 'strataModal', (config) => {
        return createBaseModal(config);
    });


    registerAlpineComponent(Alpine, 'strataEditor', (config) => {
        return createBaseEditor(config);
    });


    registerAlpineComponent(Alpine, 'strataDateRangePicker', (config) => {
        return createBaseCalendar(config);
    });


    registerAlpineComponent(Alpine, 'strataDatepicker', (config) => {
        return createBaseDatepicker(config);
    });


    registerAlpineComponent(Alpine, 'strataFileUpload', (config) => {
        return createBaseFileUpload(config);
    });


    registerAlpineComponent(Alpine, 'strataSelect', (config) => {
        return createBaseSelect(config);
    });


    registerAlpineComponent(Alpine, 'strataColorPicker', (config) => {
        return createBaseColorPicker(config);
    });


    registerAlpineComponent(Alpine, 'strataCarousel', (config) => {
        return createCarouselComponent(config);
    });


    registerAlpineComponent(Alpine, 'strataAccordion', (config) => {
        return createAccordionComponent(config);
    });


    registerAlpineComponent(Alpine, 'strataTabs', (config) => {
        return createTabsComponent(config);
    });


    registerAlpineComponent(Alpine, 'strataToastGroup', (config) => {
        return createToastGroupComponent(config);
    });


    registerAlpineComponent(Alpine, 'strataToastItem', (config) => {
        return createToastItemComponent(config);
    });


    registerAlpineComponent(Alpine, 'strataRating', (config) => {
        return createRatingComponent(config);
    });



    registerAlpineComponent(Alpine, 'strataSidebar', (config) => {
        return createSidebarComponent(config);
    });


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
        sidebar(name) {
            return {
                show() {
                    dispatchGlobalEvent(`strata-sidebar-show-${name}`);
                },
                hide() {
                    dispatchGlobalEvent(`strata-sidebar-hide-${name}`);
                },
                toggle() {
                    dispatchGlobalEvent(`strata-sidebar-toggle-${name}`);
                }
            };
        },
        sidebars() {
            return {
                closeAll() {
                    closeAllSidebars();
                }
            };
        },
        toast(detail) {
            dispatchToastEvent('show', detail);
        }
    }));
}


function createGlobalStrataAPI() {
    window.Strata = window.Strata || {};
    

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


    window.Strata.modals = function() {
        return {
            close() {
                closeAllModals();
            }
        };
    };


    window.Strata.toast = function(detail) {
        dispatchToastEvent('show', detail);
    };
}


function init() {
    if (window.Alpine) {

        safePluginRegistration(window.Alpine, { collapse, anchor, focus });
        registerStrataComponents(window.Alpine);
        createGlobalStrataAPI();
    } else {

        safePluginRegistration(Alpine, { collapse, anchor, focus });
        registerStrataComponents(Alpine);
        
        window.Alpine = Alpine;
        Alpine.start();
        
        createGlobalStrataAPI();
    }
}


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


function handleSessionToasts() {

    if (window.strataSessionToast) {
        dispatchToastEvent('show', window.strataSessionToast);
    }
}


if (window.Alpine && window.Alpine.version) {

    init();
} else {

    document.addEventListener('alpine:init', () => {
        init();
    });
    

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(init, 50);
        });
    } else {
        setTimeout(init, 50);
    }
}


if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        handleSessionModals();
        handleSessionToasts();
    });
} else {
    handleSessionModals();
    handleSessionToasts();
}

export default Alpine
