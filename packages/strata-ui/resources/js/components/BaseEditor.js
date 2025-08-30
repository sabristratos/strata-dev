/**
 * Rich Text Editor Component for Strata UI
 * 
 * Provides a rich text editor with formatting controls and sanitization
 */

import { createFormComponent, extendComponent } from './BaseComponent.js';
import { EVENTS } from '../utilities/events.js';

/**
 * Create a rich text editor component
 * @param {Object} config - Editor configuration
 * @returns {Object} Editor component configuration
 */
export function createBaseEditor(config = {}) {
    const baseComponent = createFormComponent({
        ...config,
        componentName: 'strata-editor'
    });
    
    return extendComponent(baseComponent, {
        // Editor content (HTML)
        content: config.initialValue || '',
        
        // Active format tracking
        activeFormats: {
            bold: false,
            italic: false,
            underline: false,
            insertUnorderedList: false,
            insertOrderedList: false,
            link: false,
            heading: 'p'
        },

        // Link creation state
        createLinkMode: false,
        selectedText: '',
        selectedRange: null,
        linkUrl: '',
        linkTarget: false,

        // Link editing state
        linkEditMode: false,
        currentLink: null,
        currentLinkUrl: '',
        currentLinkText: '',

        // Heading level state
        headingLevel: 'p',

        // Text selection state for UI reactivity
        hasSelection: false,

        // Event listener tracking to prevent duplicates
        _eventListeners: [],

        /**
         * Editor-specific initialization
         */
        init() {
            // Set initial content
            if (this.$refs.editor) {
                this.$refs.editor.innerHTML = this.content;
            }
            
            // Set up form submission handler
            this.setupFormSubmission();
            
            // Set up editor event listeners
            this.setupEditorEventListeners();
            
            // Initial active state check
            this.$nextTick(() => {
                this.updateActiveStates();
            });
        },

        /**
         * Editor-specific cleanup
         */
        destroy() {
            // Clean up event listeners
            this._eventListeners.forEach(({ target, event, handler }) => {
                target.removeEventListener(event, handler);
            });
            this._eventListeners = [];
        },

        /**
         * Set up form submission handler
         */
        setupFormSubmission() {
            const form = this.$el.closest('form');
            if (form) {
                const handler = () => this.update();
                form.addEventListener('submit', handler);
                
                this._eventListeners.push({
                    target: form,
                    event: 'submit',
                    handler
                });
            }
        },

        /**
         * Set up editor-specific event listeners
         */
        setupEditorEventListeners() {
            if (!this.$refs.editor) return;

            const events = [
                { event: 'keyup', handler: () => { this.updateActiveStates(); this.updateSelectionState(); } },
                { event: 'mouseup', handler: () => { this.updateActiveStates(); this.updateSelectionState(); } },
                { event: 'focus', handler: () => { this.updateActiveStates(); this.updateSelectionState(); } },
                { event: 'selectstart', handler: () => this.$nextTick(() => this.updateSelectionState()) },
                { event: 'click', handler: (e) => this.handleEditorClick(e) },
                { event: 'paste', handler: (e) => this.handlePaste(e) },
                { event: 'input', handler: () => this.update() }
            ];

            events.forEach(({ event, handler }) => {
                this.$refs.editor.addEventListener(event, handler);
                this._eventListeners.push({
                    target: this.$refs.editor,
                    event,
                    handler
                });
            });
        },

        /**
         * Update the hidden input with current editor content
         */
        update() {
            this.content = this.$refs.editor.innerHTML;
            this.updateHiddenInput();
        },

        /**
         * Apply formatting command to selected text
         * @param {string} command - The execCommand to execute
         * @param {string} param - Optional parameter for the command
         */
        format(command, param = null) {
            if (!this.$refs.editor) return;
            
            this.$refs.editor.focus();
            const selection = window.getSelection();

            if (selection.rangeCount > 0) {
                try {
                    document.execCommand(command, false, param);
                    this.$nextTick(() => this.updateActiveStates());
                } catch (e) {
                    console.error('Format command failed:', e);
                }
            }
        },

        /**
         * Apply heading format to current block
         * @param {string} tag - The heading tag (h1-h6, p)
         */
        setHeading(tag) {
            if (!this.$refs.editor) return;
            
            this.$refs.editor.focus();
            const selection = window.getSelection();

            if (selection.rangeCount > 0) {
                try {
                    if (tag === 'p') {
                        document.execCommand('formatBlock', false, 'div');
                    } else {
                        document.execCommand('formatBlock', false, tag);
                    }
                    this.headingLevel = tag;
                    this.$nextTick(() => this.updateActiveStates());
                } catch (e) {
                    console.error('Heading format command failed:', e);
                }
            }
        },

        /**
         * Clear all active format states
         */
        clearActiveStates() {
            this.activeFormats.bold = false;
            this.activeFormats.italic = false;
            this.activeFormats.underline = false;
            this.activeFormats.insertUnorderedList = false;
            this.activeFormats.insertOrderedList = false;
            this.activeFormats.link = false;
            this.activeFormats.heading = 'p';
            this.headingLevel = 'p';
        },

        /**
         * Check if cursor is in empty space
         */
        isInEmptySpace(selection, range) {
            try {
                const container = range.commonAncestorContainer;

                if (container.nodeType === Node.TEXT_NODE) {
                    return container.textContent.trim() === '';
                }

                if (container.nodeType === Node.ELEMENT_NODE) {
                    return container.textContent.trim() === '';
                }

                const editorText = this.$refs.editor.textContent.trim();
                return range.startOffset >= editorText.length;
            } catch (e) {
                return true;
            }
        },

        /**
         * Check if cursor is on a link element
         */
        isOnLink(selection, range) {
            try {
                const container = range.commonAncestorContainer;
                let element = container.nodeType === Node.TEXT_NODE ? container.parentElement : container;

                while (element && element !== this.$refs.editor) {
                    if (element.tagName === 'A') {
                        return true;
                    }
                    element = element.parentElement;
                }
                return false;
            } catch (e) {
                return false;
            }
        },

        /**
         * Get the current link element under cursor
         */
        getCurrentLinkElement(selection, range) {
            try {
                const container = range.commonAncestorContainer;
                let element = container.nodeType === Node.TEXT_NODE ? container.parentElement : container;

                while (element && element !== this.$refs.editor) {
                    if (element.tagName === 'A') {
                        return element;
                    }
                    element = element.parentElement;
                }
                return null;
            } catch (e) {
                return null;
            }
        },

        /**
         * Check if there is text selected
         */
        hasTextSelection() {
            const selection = window.getSelection();
            return selection.rangeCount > 0 && !selection.getRangeAt(0).collapsed;
        },

        /**
         * Update text selection state for reactive UI
         */
        updateSelectionState() {
            this.hasSelection = this.hasTextSelection();
        },

        /**
         * Handle click events in the editor
         * @param {Event} event - Click event
         */
        handleEditorClick(event) {
            // Check if click was on a link
            if (event.target.tagName === 'A') {
                event.preventDefault(); // Prevent default link behavior
                
                // Small delay to ensure selection/cursor is updated
                setTimeout(() => {
                    this.showLinkEditPopover();
                }, 10);
            } else {
                // Hide link edit popup if clicking elsewhere
                if (this.linkEditMode) {
                    this.hideLinkEditPopover();
                }
            }
        },

        /**
         * Open link creation popover
         */
        openLinkPopover() {
            const selection = window.getSelection();
            if (selection.rangeCount > 0 && !selection.getRangeAt(0).collapsed) {
                this.selectedText = selection.toString();
                this.selectedRange = selection.getRangeAt(0).cloneRange();
                this.linkUrl = '';
                this.linkTarget = false;
                this.createLinkMode = true;
            }
        },

        /**
         * Create link from selected text
         */
        createLink() {
            if (this.linkUrl && this.selectedText && this.selectedRange) {
                const selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(this.selectedRange);

                this.$refs.editor.focus();
                document.execCommand('createLink', false, this.linkUrl);

                if (this.linkTarget) {
                    const links = this.$refs.editor.querySelectorAll('a');
                    const lastLink = links[links.length - 1];
                    if (lastLink && lastLink.href === this.linkUrl) {
                        lastLink.target = '_blank';
                    }
                }

                this.closeLinkPopover();
                this.$nextTick(() => this.updateActiveStates());
            }
        },

        /**
         * Close link popover and reset state
         */
        closeLinkPopover() {
            this.createLinkMode = false;
            this.linkUrl = '';
            this.linkTarget = false;
            this.selectedText = '';
            this.selectedRange = null;
        },

        /**
         * Show link edit popover for existing link
         */
        showLinkEditPopover() {
            const selection = window.getSelection();
            if (selection.rangeCount > 0) {
                const range = selection.getRangeAt(0);
                const linkElement = this.getCurrentLinkElement(selection, range);
                
                if (linkElement) {
                    this.currentLink = linkElement;
                    this.currentLinkUrl = linkElement.href || '';
                    this.currentLinkText = linkElement.textContent || '';
                    this.linkEditMode = true;
                }
            }
        },

        /**
         * Hide link edit popover
         */
        hideLinkEditPopover() {
            this.linkEditMode = false;
            this.currentLink = null;
            this.currentLinkUrl = '';
            this.currentLinkText = '';
        },

        /**
         * Open current link in new tab
         */
        openCurrentLink() {
            if (this.currentLink && this.currentLinkUrl) {
                window.open(this.currentLinkUrl, '_blank');
                this.hideLinkEditPopover();
            }
        },

        /**
         * Edit current link - switch to edit mode
         */
        editCurrentLink() {
            if (this.currentLink) {
                // Set up edit state
                this.linkUrl = this.currentLinkUrl;
                this.linkTarget = this.currentLink.target === '_blank';
                this.selectedText = this.currentLinkText;
                
                // Select the link content
                const range = document.createRange();
                range.selectNodeContents(this.currentLink);
                const selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(range);
                this.selectedRange = range.cloneRange();
                
                // Hide edit popup and show create popup
                this.hideLinkEditPopover();
                this.createLinkMode = true;
                
                this.$refs.editor.focus();
            }
        },

        /**
         * Sanitize HTML content
         * @param {string} html - HTML to sanitize
         * @returns {string} Clean HTML
         */
        sanitizeHtml(html) {
            const allowedTags = new Set([
                'p', 'div', 'br', 'span',
                'b', 'strong', 'i', 'em', 'u',
                'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
                'ul', 'ol', 'li',
                'a',
                'table', 'thead', 'tbody', 'tr', 'th', 'td'
            ]);

            const allowedAttributes = {
                'a': ['href']
            };

            try {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                const cleanElement = (element) => {
                    const tagName = element.tagName?.toLowerCase();
                    
                    Array.from(element.childNodes).forEach(child => {
                        if (child.nodeType === Node.ELEMENT_NODE) {
                            cleanElement(child);
                        }
                    });
                    
                    if (!allowedTags.has(tagName)) {
                        const parent = element.parentNode;
                        if (parent) {
                            const fragment = doc.createDocumentFragment();
                            while (element.firstChild) {
                                fragment.appendChild(element.firstChild);
                            }
                            parent.insertBefore(fragment, element);
                            parent.removeChild(element);
                        }
                        return;
                    }
                    
                    const attributes = Array.from(element.attributes);
                    attributes.forEach(attr => {
                        const allowed = allowedAttributes[tagName];
                        if (!allowed || !allowed.includes(attr.name.toLowerCase())) {
                            element.removeAttribute(attr.name);
                        }
                    });
                    
                    if (tagName === 'a' && element.hasAttribute('href')) {
                        const href = element.getAttribute('href');
                        if (!this.isValidUrl(href)) {
                            element.removeAttribute('href');
                        }
                    }
                };
                
                Array.from(doc.body.childNodes)
                    .filter(node => node.nodeType === Node.ELEMENT_NODE)
                    .forEach(child => cleanElement(child));
                
                return doc.body.innerHTML;
            } catch (e) {
                console.error('HTML sanitization failed:', e);
                const div = document.createElement('div');
                div.textContent = html;
                return div.innerHTML;
            }
        },

        /**
         * Validate URL for safety
         * @param {string} url - URL to validate
         * @returns {boolean} Whether URL is safe
         */
        isValidUrl(url) {
            if (!url || typeof url !== 'string') {
                return false;
            }
            
            url = url.trim();
            const dangerousProtocols = [
                'javascript:', 'data:', 'vbscript:', 'file:', 'about:',
                'chrome:', 'chrome-extension:', 'moz-extension:'
            ];
            
            const lowerUrl = url.toLowerCase();
            if (dangerousProtocols.some(protocol => lowerUrl.startsWith(protocol))) {
                return false;
            }
            
            return /^(https?:\/\/|mailto:|\/|\.\/|#)/.test(lowerUrl) || 
                   /^[^:\/]+$/.test(url);
        },

        /**
         * Handle paste events to sanitize content
         * @param {ClipboardEvent} event - Paste event
         */
        handlePaste(event) {
            event.preventDefault();
            event.stopPropagation();
            
            try {
                const clipboardData = event.clipboardData || window.clipboardData;
                const htmlContent = clipboardData.getData('text/html');
                const textContent = clipboardData.getData('text/plain');
                
                let contentToInsert = '';
                
                if (htmlContent) {
                    contentToInsert = this.sanitizeHtml(htmlContent);
                } else if (textContent) {
                    const div = document.createElement('div');
                    div.textContent = textContent;
                    contentToInsert = div.innerHTML.replace(/\n/g, '<br>');
                }
                
                if (contentToInsert) {
                    this.$refs.editor.focus();
                    document.execCommand('insertHTML', false, contentToInsert);
                    this.update();
                    this.$nextTick(() => this.updateActiveStates());
                }
            } catch (e) {
                console.error('Paste handling failed:', e);
            }
        },

        /**
         * Update active format states based on cursor position
         */
        updateActiveStates() {
            if (document.activeElement !== this.$refs.editor) {
                return;
            }

            try {
                const selection = window.getSelection();
                if (selection.rangeCount === 0) {
                    this.clearActiveStates();
                    return;
                }

                const range = selection.getRangeAt(0);
                const isInEmptySpace = this.isInEmptySpace(selection, range);

                if (isInEmptySpace) {
                    this.clearActiveStates();
                } else {
                    this.activeFormats.bold = document.queryCommandState('bold');
                    this.activeFormats.italic = document.queryCommandState('italic');
                    this.activeFormats.underline = document.queryCommandState('underline');
                    this.activeFormats.insertUnorderedList = document.queryCommandState('insertUnorderedList');
                    this.activeFormats.insertOrderedList = document.queryCommandState('insertOrderedList');
                    this.activeFormats.link = this.isOnLink(selection, range);
                    
                    // Update current link if cursor is on one
                    const linkElement = this.getCurrentLinkElement(selection, range);
                    if (linkElement) {
                        this.currentLink = linkElement;
                        this.currentLinkUrl = linkElement.href || '';
                        this.currentLinkText = linkElement.textContent || '';
                    } else {
                        this.currentLink = null;
                        this.currentLinkUrl = '';
                        this.currentLinkText = '';
                    }

                    // Detect current heading level
                    const container = range.commonAncestorContainer;
                    let element = container.nodeType === Node.TEXT_NODE ? container.parentElement : container;
                    let currentHeading = 'p';

                    while (element && element !== this.$refs.editor) {
                        const tagName = element.tagName?.toLowerCase();
                        if (['h1', 'h2', 'h3', 'h4', 'h5', 'h6'].includes(tagName)) {
                            currentHeading = tagName;
                            break;
                        }
                        element = element.parentElement;
                    }

                    this.activeFormats.heading = currentHeading;
                    this.headingLevel = currentHeading;
                }
            } catch (e) {
                console.error('Failed to update active states:', e);
                this.clearActiveStates();
            }
        }
    });
}

export default {
    createBaseEditor
};