@php
    $editorId = $id ?: 'editor-' . Str::random(8);
    $isDisabled = $disabled ?? false;

    // Prepare editor div attributes
    $editorAttributes = [
        'x-ref' => 'editor',
        'class' => 'block w-full p-4 text-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-card prose prose-sm max-w-none [&_ul]:list-disc [&_ul]:ml-6 [&_ol]:list-decimal [&_ol]:ml-6 [&_p]:font-normal [&_h1]:text-2xl [&_h1]:font-bold [&_h1]:mt-6 [&_h1]:mb-4 [&_h2]:text-xl [&_h2]:font-bold [&_h2]:mt-5 [&_h2]:mb-3 [&_h3]:text-lg [&_h3]:font-bold [&_h3]:mt-4 [&_h3]:mb-2 [&_h4]:text-base [&_h4]:font-bold [&_h4]:mt-3 [&_h4]:mb-2 [&_h5]:text-sm [&_h5]:font-bold [&_h5]:mt-2 [&_h5]:mb-1 [&_h6]:text-xs [&_h6]:font-bold [&_h6]:mt-2 [&_h6]:mb-1',
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

<div
    x-data="strataEditor({ initialValue: '{{ $value }}' })"
    class="w-full"
>
    <div class="overflow-hidden bg-card">
        <div class="flex items-center gap-1 p-2 bg-muted/50">
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
                    class="select-minimal min-w-20 text-xs flex items-center justify-between gap-1 px-2 py-1 text-foreground hover:bg-muted"
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
                                    class="w-full text-left px-2 py-1 text-xs cursor-pointer button-radius transition-colors duration-150 hover:bg-muted text-foreground"
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
                    @click="hasSelection ? openLinkPopover() : null"
                    x-bind:disabled="{{ $isDisabled ? 'true' : '(disabled || !hasSelection)' }}"
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

                {{-- Link Edit Popup --}}
                <template x-teleport="body">
                    <div
                        x-show="linkEditMode"
                        x-anchor.bottom-start.offset.4="$refs.linkTrigger"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute z-50 w-72"
                        style="display: none;"
                        @click.outside="hideLinkEditPopover()"
                    >
                        <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border">
                            <div class="p-3 space-y-3">
                                <div>
                                    <div class="font-medium text-foreground text-sm mb-1">Link</div>
                                    <div class="text-xs text-muted-foreground break-all" x-text="currentLinkUrl"></div>
                                </div>

                                <div class="flex justify-between gap-2">
                                    <x-strata::button
                                        variant="ghost"
                                        size="sm"
                                        @click="openCurrentLink()"
                                        icon="heroicon-o-arrow-top-right-on-square"
                                        class="flex-1"
                                    >
                                        Open
                                    </x-strata::button>
                                    
                                    <x-strata::button
                                        variant="ghost" 
                                        size="sm"
                                        @click="editCurrentLink()"
                                        icon="heroicon-o-pencil"
                                        class="flex-1"
                                    >
                                        Edit
                                    </x-strata::button>
                                    
                                    <x-strata::button
                                        variant="ghost"
                                        size="sm"
                                        @click="hideLinkEditPopover()"
                                        icon="heroicon-o-x-mark"
                                        class="!px-2"
                                    />
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
        x-ref="hiddenInput"
        @foreach($hiddenInputAttributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
    >
</div>
