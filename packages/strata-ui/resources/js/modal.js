/**
 * Strata UI - Modal JavaScript API
 * 
 * Provides Alpine.js magic methods and global JavaScript API for modal components.
 * This script runs immediately when Alpine initializes, making the modal API
 * globally available regardless of whether modal components are rendered.
 */


function registerModalAPI(Alpine) {

    Alpine.data('strataModal', (config) => ({
        show: false,
        name: config.name || null,
        dismissible: config.dismissible !== false,

        init() {

            if (this.$wire && this.$el.hasAttribute('x-model')) {
                this.$watch('show', value => {
                    this.$wire.set(this.$el.getAttribute('x-model'), value);
                });
            }
        },

        showModal(data = {}) {
            this.show = true;
            this.$dispatch('strata-modal-opened', { name: this.name, data });
            document.body.style.overflow = 'hidden';
        },

        hideModal() {
            this.show = false;
            this.$dispatch('strata-modal-closed', { name: this.name });
            this.$dispatch('close'); // For compatibility
            this.$dispatch('cancel'); // For compatibility  
            document.body.style.overflow = '';
        },

        toggleModal(data = {}) {
            if (this.show) {
                this.hideModal();
            } else {
                this.showModal(data);
            }
        }
    }));


    Alpine.magic('strata', (el) => ({
        modal(name) {
            return {
                show(data = {}) {
                    window.dispatchEvent(new CustomEvent(`strata-modal-show-${name}`, { detail: data }));
                },
                hide() {
                    window.dispatchEvent(new CustomEvent(`strata-modal-hide-${name}`));
                },
                toggle(data = {}) {
                    window.dispatchEvent(new CustomEvent(`strata-modal-toggle-${name}`, { detail: data }));
                }
            };
        },
        modals() {
            return {
                close() {

                    document.querySelectorAll('[x-data*="strataModal"]').forEach(el => {
                        const modalName = el.getAttribute('x-data').match(/name:\s*'([^']*)'/)
                        if (modalName && modalName[1]) {
                            window.dispatchEvent(new CustomEvent(`strata-modal-hide-${modalName[1]}`));
                        } else {

                            if (el.__x && el.__x.$data && el.__x.$data.hideModal) {
                                el.__x.$data.hideModal();
                            }
                        }
                    });
                    document.body.style.overflow = '';
                }
            };
        }
    }));
}


function createGlobalStrataAPI() {
    window.Strata = window.Strata || {};
    
    window.Strata.modal = function(name) {
        return {
            show(data = {}) {
                window.dispatchEvent(new CustomEvent(`strata-modal-show-${name}`, { detail: data }));
            },
            hide() {
                window.dispatchEvent(new CustomEvent(`strata-modal-hide-${name}`));
            },
            toggle(data = {}) {
                window.dispatchEvent(new CustomEvent(`strata-modal-toggle-${name}`, { detail: data }));
            }
        };
    };

    window.Strata.modals = function() {
        return {
            close() {
                document.querySelectorAll('[x-data*="strataModal"]').forEach(el => {
                    const modalName = el.getAttribute('x-data').match(/name:\s*'([^']*)'/)
                    if (modalName && modalName[1]) {
                        window.dispatchEvent(new CustomEvent(`strata-modal-hide-${modalName[1]}`));
                    } else {
                        if (el.__x && el.__x.$data && el.__x.$data.hideModal) {
                            el.__x.$data.hideModal();
                        }
                    }
                });
                document.body.style.overflow = '';
            }
        };
    };
}


function initializeModalAPI() {

    if (window.Alpine) {
        registerModalAPI(window.Alpine);
        createGlobalStrataAPI();
    } else {

        document.addEventListener('alpine:init', () => {
            registerModalAPI(window.Alpine);
            createGlobalStrataAPI();
        });
    }
}


if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeModalAPI);
} else {
    initializeModalAPI();
}


document.addEventListener('alpine:initializing', () => {
    registerModalAPI(window.Alpine);
    createGlobalStrataAPI();
});


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


if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', handleSessionModals);
} else {
    handleSessionModals();
}

export { registerModalAPI, createGlobalStrataAPI };