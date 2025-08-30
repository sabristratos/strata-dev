/**
 * File Upload Component for Strata UI
 * 
 * Provides comprehensive file upload with drag-drop, validation, and preview functionality
 */

import { createFormComponent, extendComponent } from './BaseComponent.js';
import { EVENTS } from '../utilities/events.js';

/**
 * Create a file upload component
 * @param {Object} config - File upload configuration
 * @returns {Object} File upload component configuration
 */
export function createBaseFileUpload(config = {}) {
    const baseComponent = createFormComponent({
        ...config,
        componentName: 'strata-file-upload'
    });
    
    return extendComponent(baseComponent, {
        // File state
        files: config.multiple ? [] : null,
        dragOver: false,
        uploading: false,
        processingDrop: false,
        progress: {},
        previews: {},
        errors: {},
        
        // Configuration
        hasWireModel: config.hasWireModel || false,
        maxSize: config.maxSize || 5120, // KB
        accept: config.accept || '*/*',
        multiple: config.multiple || false,
        mediaLibrary: config.mediaLibrary || false,
        enableReordering: config.enableReordering || false,
        maxSizeFormatted: config.maxSizeFormatted || '5MB',
        
        // Event handlers
        _fileInputHandler: null,

        /**
         * File upload specific initialization
         */
        init() {
            // Initialize existing files if any
            this.initializeExistingFiles();
            
            // Add file input change listener
            if (this.$refs.fileInput) {
                this._fileInputHandler = (e) => {
                    // Skip if we're processing a drop (to avoid double processing)
                    if (!this.processingDrop) {
                        this.handleFileSelection(e.target.files);
                    }
                };
                this.$refs.fileInput.addEventListener('change', this._fileInputHandler);
                this.addCleanup(() => {
                    if (this._fileInputHandler && this.$refs.fileInput) {
                        this.$refs.fileInput.removeEventListener('change', this._fileInputHandler);
                    }
                });
            }
        },

        /**
         * File upload specific cleanup
         */
        destroy() {
            // Clean up blob URLs
            Object.values(this.previews).forEach(url => {
                if (url && typeof url === 'string' && url.startsWith('blob:')) {
                    URL.revokeObjectURL(url);
                }
            });
        },

        /**
         * Initialize existing files if any
         */
        initializeExistingFiles() {
            if (this.files && Array.isArray(this.files)) {
                this.files.forEach(file => {
                    const fileId = this.getFileId(file);
                    if (file.url && !this.previews[fileId]) {
                        this.previews[fileId] = file.url;
                    }
                });
            }
        },

        /**
         * Handle drag over event
         * @param {DragEvent} e - Drag event
         */
        handleDragOver(e) {
            e.preventDefault();
            this.dragOver = true;
        },

        /**
         * Handle drag leave event
         * @param {DragEvent} e - Drag event
         */
        handleDragLeave(e) {
            e.preventDefault();
            if (!this.$el.contains(e.relatedTarget)) {
                this.dragOver = false;
            }
        },

        /**
         * Handle file drop event
         * @param {DragEvent} e - Drop event
         */
        handleDrop(e) {
            e.preventDefault();
            this.dragOver = false;
            
            // For Livewire integration, we need to transfer files to the input
            if (this.$wire && this.hasWireModel) {
                this.processingDrop = true;
                
                const dataTransfer = new DataTransfer();
                Array.from(e.dataTransfer.files).forEach(file => {
                    dataTransfer.items.add(file);
                });
                
                // Update the file input and let Livewire handle it
                this.$refs.fileInput.files = dataTransfer.files;
                
                // Handle UI updates separately
                this.handleFileSelection(e.dataTransfer.files);
                
                // Reset flag after a brief delay to allow change event to be ignored
                setTimeout(() => {
                    this.processingDrop = false;
                }, 10);
            } else {
                this.handleFileSelection(e.dataTransfer.files);
            }
        },

        /**
         * Open file browser dialog
         */
        openFileBrowser() {
            if (this.$refs.fileInput) {
                this.$refs.fileInput.click();
            }
        },

        /**
         * Handle file selection from input or drop
         * @param {FileList} fileList - Selected files
         */
        handleFileSelection(fileList) {
            const files = Array.from(fileList);
            this.errors = {};
            
            // Validate files
            const validFiles = files.filter(file => this.validateFile(file));
            
            if (validFiles.length === 0) return;
            
            // For both Livewire and non-Livewire, just handle UI state
            // Let the actual file input and wire:model handle the data
            if (this.multiple) {
                validFiles.forEach(file => this.addFile(file));
            } else {
                // Single file mode - replace existing
                this.clearFiles();
                this.addFile(validFiles[0]);
            }

            // Dispatch change event
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                files: this.files,
                fileCount: this.multiple ? (this.files ? this.files.length : 0) : (this.files ? 1 : 0)
            });
        },

        /**
         * Validate a file against constraints
         * @param {File} file - File to validate
         * @returns {boolean} Whether file is valid
         */
        validateFile(file) {
            const fileId = this.generateFileId(file);
            
            // Check file size
            if (file.size > this.maxSize * 1024) {
                this.errors[fileId] = `File size exceeds ${this.maxSizeFormatted}`;
                return false;
            }
            
            // Check file type if accept is specified
            if (this.accept && this.accept !== '*/*') {
                const acceptedTypes = this.accept.split(',').map(type => type.trim());
                const isAccepted = acceptedTypes.some(type => {
                    if (type.startsWith('.')) {
                        return file.name.toLowerCase().endsWith(type.toLowerCase());
                    }
                    if (type.includes('/*')) {
                        const mimeCategory = type.split('/')[0];
                        return file.type.startsWith(mimeCategory);
                    }
                    return file.type === type;
                });
                
                if (!isAccepted) {
                    this.errors[fileId] = 'File type not accepted';
                    return false;
                }
            }
            
            return true;
        },

        /**
         * Generate unique file ID
         * @param {File} file - File object
         * @returns {string} Unique file identifier
         */
        generateFileId(file) {
            return file.name + '_' + file.size + '_' + file.lastModified;
        },

        /**
         * Add a file to the component
         * @param {File} file - File to add
         */
        addFile(file) {
            const fileId = this.generateFileId(file);
            
            // Create preview for images
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.previews[fileId] = e.target.result;
                };
                reader.readAsDataURL(file);
            }
            
            // For Livewire integration, only manage UI state
            if (this.$wire && this.hasWireModel) {
                // Create UI-only file objects for display purposes
                const uiFileObject = {
                    id: fileId,
                    name: file.name,
                    size: file.size,
                    type: file.type,
                    file: file,
                    uploaded: false // Will be managed by Livewire
                };
                
                if (this.multiple) {
                    if (!Array.isArray(this.files)) {
                        this.files = [];
                    }
                    this.files.push(uiFileObject);
                } else {
                    this.files = uiFileObject;
                }
                
                // Livewire will handle the actual file upload automatically
                // We just need to trigger the file input change event
                // The wire:model on the input will sync with Livewire
                
            } else {
                // For non-Livewire usage, use custom file objects
                const fileObject = {
                    id: fileId,
                    name: file.name,
                    size: file.size,
                    type: file.type,
                    file: file,
                    uploaded: false
                };
                
                if (this.multiple) {
                    if (!Array.isArray(this.files)) {
                        this.files = [];
                    }
                    this.files.push(fileObject);
                } else {
                    this.files = fileObject;
                }
                
                // Start simulated upload for non-Livewire usage
                this.uploadFile(fileObject);
            }
        },

        /**
         * Simulate file upload progress (for non-Livewire usage)
         * @param {Object} fileObject - File object to upload
         */
        uploadFile(fileObject) {
            this.uploading = true;
            this.progress[fileObject.id] = 0;
            
            // Simulate upload progress for demo purposes
            // In real implementation, this would be handled by Livewire
            const interval = setInterval(() => {
                if (this.progress[fileObject.id] < 90) {
                    this.progress[fileObject.id] += Math.random() * 20;
                } else {
                    this.progress[fileObject.id] = 100;
                    fileObject.uploaded = true;
                    this.uploading = false;
                    clearInterval(interval);
                }
            }, 200);
        },

        /**
         * Remove a file by ID
         * @param {string} fileId - File ID to remove
         */
        removeFile(fileId) {
            if (this.multiple && Array.isArray(this.files)) {
                this.files = this.files.filter(file => this.getFileId(file) !== fileId);
            } else {
                this.files = null;
            }
            
            // Clean up preview
            if (this.previews[fileId] && this.previews[fileId].startsWith('blob:')) {
                URL.revokeObjectURL(this.previews[fileId]);
            }
            delete this.previews[fileId];
            delete this.progress[fileId];
            delete this.errors[fileId];
            
            // Clear the file input to allow re-selection of the same file
            if (this.$refs.fileInput) {
                this.$refs.fileInput.value = '';
            }

            // Dispatch change event
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                files: this.files,
                fileCount: this.multiple ? (this.files ? this.files.length : 0) : (this.files ? 1 : 0),
                action: 'remove',
                removedFileId: fileId
            });
        },

        /**
         * Clear all files
         */
        clearFiles() {
            if (Array.isArray(this.files)) {
                this.files.forEach(file => {
                    const fileId = this.getFileId(file);
                    if (this.previews[fileId] && this.previews[fileId].startsWith('blob:')) {
                        URL.revokeObjectURL(this.previews[fileId]);
                    }
                });
            }
            this.files = this.multiple ? [] : null;
            this.previews = {};
            this.progress = {};
            this.errors = {};
            
            // Clear the file input to allow re-selection
            if (this.$refs.fileInput) {
                this.$refs.fileInput.value = '';
            }

            // Dispatch change event
            this.dispatchComponentEvent(EVENTS.FORM_CHANGE, {
                files: this.files,
                fileCount: 0,
                action: 'clear'
            });
        },

        /**
         * Format file size in human readable format
         * @param {number} bytes - File size in bytes
         * @returns {string} Formatted file size
         */
        formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        },

        /**
         * Get appropriate icon name for file type
         * @param {Object} file - File object
         * @returns {string} Icon name
         */
        getFileIconName(file) {
            const fileType = this.getFileType(file);
            if (fileType.startsWith('image/')) return 'heroicon-o-photo';
            if (fileType === 'application/pdf') return 'heroicon-o-document-text';
            if (fileType.includes('word') || this.getFileName(file).endsWith('.doc') || this.getFileName(file).endsWith('.docx')) return 'heroicon-o-document-text';
            if (fileType.includes('spreadsheet') || this.getFileName(file).endsWith('.xls') || this.getFileName(file).endsWith('.xlsx')) return 'heroicon-o-table-cells';
            if (fileType.startsWith('video/')) return 'heroicon-o-video-camera';
            if (fileType.startsWith('audio/')) return 'heroicon-o-musical-note';
            return 'heroicon-o-document';
        },

        /**
         * Get HTML for file type icon
         * @param {Object} file - File object
         * @param {string} classes - CSS classes for icon
         * @returns {string} Icon HTML
         */
        getFileIconHtml(file, classes = 'w-6 h-6') {
            const iconName = this.getFileIconName(file);
            // Return appropriate Heroicon SVG based on icon name
            const icons = {
                'heroicon-o-photo': `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 3a3 3 0 00-3 3v2.25a3 3 0 003 3h2.25a3 3 0 003-3V6a3 3 0 00-3-3H6zM15.75 3a3 3 0 013 3v2.25a3 3 0 01-3 3H13.5a3 3 0 01-3-3V6a3 3 0 013-3h2.25zM6 12.75a3 3 0 00-3 3V18a3 3 0 003 3h2.25a3 3 0 003-3v-2.25a3 3 0 00-3-3H6zM15.75 12.75a3 3 0 013 3V18a3 3 0 01-3 3H13.5a3 3 0 01-3-3v-2.25a3 3 0 013-3h2.25z"></path></svg>`,
                'heroicon-o-document-text': `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5-3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0-1.125.504-1.125 1.125V11.25a9 9 0 00-9-9z"></path></svg>`,
                'heroicon-o-table-cells': `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625v1.5c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-12.75c0-.621-.504-1.125-1.125-1.125m0 0V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m-1.125 1.125v-1.5c0-.621.504-1.125 1.125-1.125m0 0h7.5"></path></svg>`,
                'heroicon-o-video-camera': `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"></path></svg>`,
                'heroicon-o-musical-note': `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z"></path></svg>`,
                'heroicon-o-document': `<svg class="${classes}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"></path></svg>`
            };
            return icons[iconName] || icons['heroicon-o-document'];
        },

        /**
         * Get file name from file object
         * @param {Object} file - File object
         * @returns {string} File name
         */
        getFileName(file) {
            return file.name || (file.file ? file.file.name : 'Unknown');
        },

        /**
         * Get file size from file object
         * @param {Object} file - File object
         * @returns {number} File size in bytes
         */
        getFileSize(file) {
            return file.size || (file.file ? file.file.size : 0);
        },

        /**
         * Get file type from file object
         * @param {Object} file - File object
         * @returns {string} File MIME type
         */
        getFileType(file) {
            return file.type || (file.file ? file.file.type : '');
        },

        /**
         * Get unique file ID from file object
         * @param {Object} file - File object
         * @returns {string} File ID
         */
        getFileId(file) {
            if (file.id) return file.id;
            if (file.name && file.size && file.lastModified) {
                return this.generateFileId(file);
            }
            return this.getFileName(file) + '_' + this.getFileSize(file);
        }
    });
}

export default {
    createBaseFileUpload
};