@php
    $editorId = $id ?: 'editor-' . Str::random(8);
    $isDisabled = $disabled ?? false;

    // Prepare editor div attributes
    $editorAttributes = [
        'x-ref' => 'editor',
        'class' => 'block w-full p-4 text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-white dark:bg-gray-900 prose prose-sm max-w-none [&_ul]:list-disc [&_ul]:ml-6 [&_ol]:list-decimal [&_ol]:ml-6 [&_p]:font-normal [&_h1]:text-2xl [&_h1]:font-bold [&_h1]:mt-6 [&_h1]:mb-4 [&_h2]:text-xl [&_h2]:font-bold [&_h2]:mt-5 [&_h2]:mb-3 [&_h3]:text-lg [&_h3]:font-bold [&_h3]:mt-4 [&_h3]:mb-2 [&_h4]:text-base [&_h4]:font-bold [&_h4]:mt-3 [&_h4]:mb-2 [&_h5]:text-sm [&_h5]:font-bold [&_h5]:mt-2 [&_h5]:mb-1 [&_h6]:text-xs [&_h6]:font-bold [&_h6]:mt-2 [&_h6]:mb-1',
        'style' => 'min-height: ' . $minHeight . 'px;' . ($maxHeight ? ' max-height: ' . $maxHeight . 'px; overflow-y: auto;' : ''),
        '@input' => 'update'
    ];

    if ($id) $editorAttributes['id'] = $id;
    if ($isDisabled) {
        $editorAttributes['readonly'] = 'readonly';
    } else {
        $editorAttributes['contenteditable'] = 'true';
    }
    if ($placeholder) $editorAttributes['data-placeholder'] = $placeholder;

    // Prepare hidden input attributes
    $hiddenInputAttributes = [
        'type' => 'hidden',
        'x-model' => 'content'
    ];
    if ($name) $hiddenInputAttributes['name'] = $name;
@endphp

@once
<script>
document.addEventListener('alpine:initializing', () => {
    Alpine.data('editor', (config) => ({
        /**
         * Rich text editor component state
         * @property {string} content - HTML content of the editor
         * @property {object} activeFormats - Track which formatting is active at cursor
         */
        content: config.initialValue || '',
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

        // Heading level state
        headingLevel: 'p',

        // Event listener tracking to prevent duplicates
        pasteListenerAttached: false,

        /**
         * Initialize the editor component
         * Sets initial content and attaches form submission handler
         */
        init() {
            this.$refs.editor.innerHTML = this.content;
            const form = this.$el.closest('form');
            if (form) {
                form.addEventListener('submit', () => {
                    this.update();
                });
            }

            // Add event listeners for active state updates
            this.$refs.editor.addEventListener('keyup', () => this.updateActiveStates());
            this.$refs.editor.addEventListener('mouseup', () => this.updateActiveStates());
            this.$refs.editor.addEventListener('focus', () => this.updateActiveStates());

            // Add paste event listener for content sanitization (only once)
            if (!this.pasteListenerAttached) {
                this.$refs.editor.addEventListener('paste', (event) => {
                    this.handlePaste(event);
                });
                
                this.pasteListenerAttached = true;
            }

            // Initial active state check
            this.$nextTick(() => {
                this.updateActiveStates();
            });
        },

        /**
         * Update the hidden input with current editor content
         * Called on input events and form submission
         */
        update() {
            this.content = this.$refs.editor.innerHTML;
        },

        /**
         * Apply formatting command to selected text
         * @param {string} command - The execCommand to execute (bold, italic, etc.)
         * @param {?string} param - Optional parameter for the command
         */
        format(command, param = null) {
            this.$refs.editor.focus();
            const selection = window.getSelection();

            if (selection.rangeCount > 0) {
                try {
                    document.execCommand(command, false, param);
                    // Update active states after formatting
                    this.$nextTick(() => this.updateActiveStates());
                } catch (e) {
                    console.error('Format command failed:', e);
                }
            }
        },

        /**
         * Apply heading format to current block
         * @param {string} tag - The heading tag (h1, h2, h3, h4, h5, h6, p)
         */
        setHeading(tag) {
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
         * Check if cursor is in empty space (no text content)
         */
        isInEmptySpace(selection, range) {
            try {
                const container = range.commonAncestorContainer;

                // If we're in a text node, check if it's empty or whitespace
                if (container.nodeType === Node.TEXT_NODE) {
                    const textContent = container.textContent.trim();
                    return textContent === '';
                }

                // If we're in an element, check if it has no text content
                if (container.nodeType === Node.ELEMENT_NODE) {
                    const textContent = container.textContent.trim();
                    return textContent === '';
                }

                // Additional check: if cursor is at the very end of the editor
                const editorText = this.$refs.editor.textContent.trim();
                return range.startOffset >= editorText.length;


            } catch (e) {
                return true; // Default to empty space if we can't determine
            }
        },

        /**
         * Check if cursor is on a link element
         */
        isOnLink(selection, range) {
            try {
                const container = range.commonAncestorContainer;
                let element = container.nodeType === Node.TEXT_NODE ? container.parentElement : container;

                // Check if current element or any parent is a link
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
         * Check if there is text selected
         */
        hasTextSelection() {
            const selection = window.getSelection();
            return selection.rangeCount > 0 && !selection.getRangeAt(0).collapsed;
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
                // Restore the original selection
                const selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(this.selectedRange);

                // Focus the editor
                this.$refs.editor.focus();

                // Create the link
                document.execCommand('createLink', false, this.linkUrl);

                // Set target if needed
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
         * Sanitize HTML content by removing dangerous elements and styling
         * @param {string} html - The HTML content to sanitize
         * @returns {string} - Clean, safe HTML
         */
        sanitizeHtml(html) {
            
            // Allowed HTML tags (whitelist approach)
            const allowedTags = new Set([
                'p', 'div', 'br', 'span',
                'b', 'strong', 'i', 'em', 'u',
                'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
                'ul', 'ol', 'li',
                'a',
                'table', 'thead', 'tbody', 'tr', 'th', 'td'
            ]);

            // Allowed attributes (very restrictive)
            const allowedAttributes = {
                'a': ['href']
            };

            try {
                // Parse HTML using DOMParser
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                // Improved recursive function to clean elements
                const cleanElement = (element, depth = 0) => {
                    const indent = '  '.repeat(depth);
                    const tagName = element.tagName?.toLowerCase();
                    
                    // Process all child nodes (elements + text nodes), not just children
                    const childNodes = Array.from(element.childNodes);
                    childNodes.forEach(child => {
                        if (child.nodeType === Node.ELEMENT_NODE) {
                            cleanElement(child, depth + 1);
                        }
                    });
                    
                    // If element is not allowed, unwrap it (keep content, remove wrapper)
                    if (!allowedTags.has(tagName)) {
                        const parent = element.parentNode;
                        if (parent) {
                            // Create document fragment to safely move nodes
                            const fragment = doc.createDocumentFragment();
                            while (element.firstChild) {
                                fragment.appendChild(element.firstChild);
                            }
                            parent.insertBefore(fragment, element);
                            parent.removeChild(element);
                        }
                        return;
                    }
                    
                    
                    // For allowed elements, remove all attributes except allowed ones
                    const attributes = Array.from(element.attributes);
                    attributes.forEach(attr => {
                        const allowed = allowedAttributes[tagName];
                        if (!allowed || !allowed.includes(attr.name.toLowerCase())) {
                            element.removeAttribute(attr.name);
                        }
                    });
                    
                    // Special handling for links - sanitize href
                    if (tagName === 'a' && element.hasAttribute('href')) {
                        const href = element.getAttribute('href');
                        if (!this.isValidUrl(href)) {
                            element.removeAttribute('href');
                        }
                    }
                };
                
                // Use a different approach - process elements in a safe way
                // Create a copy of children to avoid iteration issues
                const topLevelElements = Array.from(doc.body.childNodes).filter(node => 
                    node.nodeType === Node.ELEMENT_NODE
                );
                
                topLevelElements.forEach((child, index) => {
                    cleanElement(child);
                });
                
                const result = doc.body.innerHTML;
                return result;
                
            } catch (e) {
                console.error('❌ HTML sanitization failed:', e);
                // Fallback: return plain text if parsing fails
                const div = document.createElement('div');
                div.textContent = html;
                const fallbackResult = div.innerHTML;
                return fallbackResult;
            }
        },

        /**
         * Validate if a URL is safe for href attribute
         * @param {string} url - The URL to validate
         * @returns {boolean} - Whether the URL is safe
         */
        isValidUrl(url) {
            if (!url || typeof url !== 'string') {
                return false;
            }
            
            // Remove whitespace
            url = url.trim();
            
            // Block dangerous protocols
            const dangerousProtocols = [
                'javascript:', 'data:', 'vbscript:', 'file:', 'about:',
                'chrome:', 'chrome-extension:', 'moz-extension:'
            ];
            
            const lowerUrl = url.toLowerCase();
            if (dangerousProtocols.some(protocol => lowerUrl.startsWith(protocol))) {
                return false;
            }
            
            // Allow http, https, mailto, and relative URLs
            return /^(https?:\/\/|mailto:|\/|\.\/|#)/.test(lowerUrl) || 
                   /^[^:\/]+$/.test(url); // Simple relative paths without protocol
        },

        /**
         * Handle paste events to sanitize content
         * @param {ClipboardEvent} event - The paste event
         */
        handlePaste(event) {
            // Prevent default paste behavior IMMEDIATELY
            event.preventDefault();
            event.stopPropagation();
            
            
            try {
                // Get HTML content from clipboard
                const clipboardData = event.clipboardData || window.clipboardData;
                const htmlContent = clipboardData.getData('text/html');
                const textContent = clipboardData.getData('text/plain');
                
                let contentToInsert = '';
                
                if (htmlContent) {
                    // Sanitize HTML content
                    contentToInsert = this.sanitizeHtml(htmlContent);
                } else if (textContent) {
                    // For plain text, escape HTML and preserve line breaks
                    const div = document.createElement('div');
                    div.textContent = textContent;
                    contentToInsert = div.innerHTML.replace(/\n/g, '<br>');
                }
                
                
                if (contentToInsert) {
                    
                    // Focus editor and insert sanitized content
                    this.$refs.editor.focus();
                    
                    // Get current selection to verify insertion point
                    const selection = window.getSelection();
                    
                    document.execCommand('insertHTML', false, contentToInsert);
                    
                    
                    // Update content and active states
                    this.update();
                    this.$nextTick(() => this.updateActiveStates());
                
            } catch (e) {
                console.error('Paste handling failed:', e);
                // Fallback: allow default paste behavior
                // (though this shouldn't happen in practice)
            }
        },

        /**
         * Update active format states based on current cursor/selection
         * Checks which formatting commands are currently active
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

                // Check if cursor is in empty space
                const isInEmptySpace = this.isInEmptySpace(selection, range);

                if (isInEmptySpace) {
                    // Clear all active states for empty space
                    this.clearActiveStates();
                } else {
                    // Normal state detection for text content
                    this.activeFormats.bold = document.queryCommandState('bold');
                    this.activeFormats.italic = document.queryCommandState('italic');
                    this.activeFormats.underline = document.queryCommandState('underline');
                    this.activeFormats.insertUnorderedList = document.queryCommandState('insertUnorderedList');
                    this.activeFormats.insertOrderedList = document.queryCommandState('insertOrderedList');

                    // Check if cursor is on a link
                    this.activeFormats.link = this.isOnLink(selection, range);

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
                // Clear states on error
                this.clearActiveStates();
            }
        }
    }));
});
</script>
@endonce
<div
    x-data="editor({ initialValue: '{{ $value }}' })"
    x-init="init()"
    class="w-full"
>
    <div class="overflow-hidden bg-white dark:bg-gray-900">
        <div class="flex items-center gap-1 p-2 bg-muted/30">
            <x-strata::button
                variant="ghost"
                size="sm"
                type="button"
                @click="format('bold')"
                :disabled="$isDisabled"
                class="!w-8 !h-8 !p-0 flex-shrink-0"
                x-bind:class="activeFormats.bold ? 'bg-accent text-accent-foreground' : ''"
            >
                <strong class="font-bold">B</strong>
            </x-strata::button>

            <x-strata::button
                variant="ghost"
                size="sm"
                type="button"
                @click="format('italic')"
                :disabled="$isDisabled"
                class="!w-8 !h-8 !p-0 flex-shrink-0"
                x-bind:class="activeFormats.italic ? 'bg-accent text-accent-foreground' : ''"
            >
                <em class="italic">I</em>
            </x-strata::button>

            <x-strata::button
                variant="ghost"
                size="sm"
                type="button"
                @click="format('underline')"
                :disabled="$isDisabled"
                class="!w-8 !h-8 !p-0 flex-shrink-0"
                x-bind:class="activeFormats.underline ? 'bg-accent text-accent-foreground' : ''"
            >
                <span class="underline">U</span>
            </x-strata::button>

            <div class="w-px h-6 bg-muted mx-1"></div>

            <div
                x-data="{
                    headingOpen: false,
                    headingOptions: {
                        'p': 'Normal',
                        'h1': 'Heading 1',
                        'h2': 'Heading 2',
                        'h3': 'Heading 3',
                        'h4': 'Heading 4',
                        'h5': 'Heading 5',
                        'h6': 'Heading 6'
                    }
                }"
                @click.outside="headingOpen = false"
                class="relative"
            >
                <button
                    @click="headingOpen = !headingOpen"
                    type="button"
                    x-ref="headingTrigger"
                    :disabled="@js($isDisabled)"
                    class="select-minimal min-w-20 text-xs flex items-center justify-between gap-1 px-2 py-1"
                >
                    <span x-text="headingOptions[headingLevel] || 'Format'"></span>
                    <x-icon name="heroicon-o-chevron-down" class="h-3 w-3 text-muted-foreground" />
                </button>

                <template x-teleport="body">
                    <div
                        x-show="headingOpen"
                        x-anchor.bottom-start.offset.4="$refs.headingTrigger"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute z-50 w-56"
                        style="display: none;"
                    >
                        <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border">
                            <template x-for="[key, label] in Object.entries(headingOptions)" :key="key">
                                <button
                                    type="button"
                                    @click="setHeading(key); headingOpen = false"
                                    class="w-full text-left px-2 py-1 text-xs cursor-pointer button-radius transition-colors duration-150 hover:bg-accent hover:text-accent-foreground"
                                    x-text="label"
                                ></button>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <div class="relative">
                <x-strata::button
                    variant="ghost"
                    size="sm"
                    type="button"
                    x-ref="linkTrigger"
                    @click="hasTextSelection() ? openLinkPopover() : null"
                    x-bind:disabled="{{ $isDisabled ? 'true' : 'false' }} || !hasTextSelection()"
                    icon="heroicon-o-link"
                    class="!w-8 !h-8 flex-shrink-0"
                    x-bind:class="activeFormats.link ? 'bg-accent text-accent-foreground' : ''"
                />

                <template x-teleport="body">
                    <div
                        x-show="createLinkMode"
                        x-anchor.bottom-start.offset.4="$refs.linkTrigger"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute z-50 w-80"
                        style="display: none;"
                        @click.outside="closeLinkPopover()"
                    >
                        <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border">
                            <div class="p-4 space-y-4">
                                <div>
                                    <h4 class="font-medium text-foreground mb-2">Add Link</h4>
                                    <p class="text-sm text-muted-foreground" x-text="'Selected text: ' + selectedText"></p>
                                </div>

                                <x-strata::form.input
                                    x-model="linkUrl"
                                    type="url"
                                    placeholder="https://example.com"
                                    label="URL"
                                    class="w-full"
                                />

                                <x-strata::form.toggle
                                    x-model="linkTarget"
                                    label="Open in new window"
                                    class="w-full"
                                />

                                <div class="flex justify-end gap-2 pt-2">
                                    <x-strata::button
                                        variant="ghost"
                                        size="sm"
                                        @click="closeLinkPopover()"
                                    >
                                        Cancel
                                    </x-strata::button>
                                    <x-strata::button
                                        size="sm"
                                        @click="createLink()"
                                        x-bind:disabled="!linkUrl"
                                    >
                                        Create Link
                                    </x-strata::button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="w-px h-6 bg-muted mx-1"></div>

            <x-strata::button
                variant="ghost"
                size="sm"
                type="button"
                @click="format('insertUnorderedList')"
                :disabled="$isDisabled"
                icon="heroicon-o-list-bullet"
                class="!w-8 !h-8 flex-shrink-0"
                x-bind:class="activeFormats.insertUnorderedList ? 'bg-accent text-accent-foreground' : ''"
            />

            <x-strata::button
                variant="ghost"
                size="sm"
                type="button"
                @click="format('insertOrderedList')"
                :disabled="$isDisabled"
                icon="heroicon-o-numbered-list"
                class="!w-8 !h-8 flex-shrink-0"
                x-bind:class="activeFormats.insertOrderedList ? 'bg-accent text-accent-foreground' : ''"
            />
        </div>
        <div
            @foreach($editorAttributes as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            {{ $attributes }}
        ></div>
    </div>
    <input
        @foreach($hiddenInputAttributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
    >
</div>
