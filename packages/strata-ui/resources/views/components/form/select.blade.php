@php
    $selectId = $id;
    $itemCount = count($items);
    $initialSelected = $multiple ? (is_array($selected) ? $selected : []) : $selected;
    $isSearchable = $searchable || count($items) >= $searchThreshold;
@endphp

<div data-strata-select="wrapper">

    <div
        x-data="strataSelect({
            highlighted: @js($multiple ? 0 : ($selected ?? 0)),
            count: {{ $itemCount }},
            multiple: {{ $multiple ? 'true' : 'false' }},
            maxSelections: {{ $maxSelections }},
            @if($attributes->has('wire:model'))
            value: @entangle($attributes->get('wire:model')),
            @else
            initialSelected: @js($initialSelected),
            @endif
            items: @js($items),
            searchable: {{ $isSearchable ? 'true' : 'false' }}
        })"
        @click.outside="close()"
        @keydown.escape.window="close()"
        class="relative"
        data-strata-select="container"
    >
        <button
            x-ref="trigger"
            @click="toggle()"
            @keydown="handleTriggerKeydown($event)"
            type="button"
            :disabled="@json($disabled)"
            data-strata-select="trigger"
            {{ $attributes->except(['wire:model']) }}
            class="{{ $getVariantClasses() }} flex items-center justify-between {{ $variant === 'minimal' ? '' : 'pl-3' }}"
            :class="@json($clearable) && hasSelection() ? 'pr-16' : 'pr-10'"
        >
            <div class="flex items-center gap-1 flex-1 min-w-0">
                <template x-if="multiple && Array.isArray(value) && value.length > 0">
                    <div class="flex items-center gap-1 flex-nowrap min-w-0 overflow-hidden">
                        <template x-for="selectedIndex in getVisibleTags()" :key="'tag-' + selectedIndex">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 button-radius-sm bg-primary/20 text-primary text-xs flex-shrink-0">
                                <span x-text="items[selectedIndex]" class="truncate max-w-16"></span>
                                <button 
                                    type="button" 
                                    @click.stop="toggleSelection(selectedIndex)"
                                    class="hover:text-primary/70 flex-shrink-0"
                                >
                                    <x-icon name="heroicon-o-x-mark" class="h-3 w-3" />
                                </button>
                            </span>
                        </template>
                        <span x-show="getRemainingCount() > 0" class="text-muted-foreground text-xs flex-shrink-0 whitespace-nowrap"
                              x-text="'+' + getRemainingCount() + ' more'"></span>
                    </div>
                </template>
                
                <template x-if="!multiple">
                    <span x-show="getDisplayText()" x-text="getDisplayText()"></span>
                </template>
                
                <span x-show="getDisplayText() === ''" class="text-muted-foreground">{{ $placeholder }}</span>
            </div>
        </button>

        <!-- Clear and dropdown buttons -->
        <div class="absolute inset-y-0 right-0 flex items-center">
            @if($clearable)
                <button
                    x-show="hasSelection()"
                    x-on:click.stop="clearSelection()"
                    type="button"
                    class="pr-2 text-muted-foreground hover:text-primary focus:outline-hidden focus:text-primary transition-colors duration-200"
                >
                    <x-icon name="heroicon-o-x-mark" class="h-4 w-4" />
                </button>
            @endif
            
            <div class="pr-3 pointer-events-none">
                <x-icon
                    x-show="!open"
                    name="heroicon-o-chevron-down"
                    class="h-5 w-5 text-muted-foreground transition-transform duration-200"
                />
                <x-icon
                    x-show="open"
                    name="heroicon-o-chevron-up"
                    class="h-5 w-5 text-muted-foreground transition-transform duration-200"
                />
            </div>
        </div>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute z-50 w-full mt-1"
            style="display: none;"
        >
            <div class="bg-popover text-popover-foreground dropdown-radius shadow-lg border border-border max-h-60 overflow-hidden flex flex-col">
                <!-- Search Input (when searchable) -->
                <template x-if="searchable">
                    <div class="p-2 border-b border-border">
                        <x-strata::form.input
                            x-model="searchQuery"
                            x-on:input="filterItems()"
                            x-on:keydown="handleSearchKeydown($event)"
                            x-ref="searchInput"
                            type="text"
                            :placeholder="$searchPlaceholder"
                            clearable="true"
                            class="h-8 text-sm"
                        />
                    </div>
                </template>

                <!-- Options List -->
                <div class="flex-1 overflow-auto p-1">
                    <!-- No Results Message -->
                    <template x-if="searchable && filteredItems.length === 0 && searchQuery">
                        <div class="px-3 py-2 text-sm text-muted-foreground text-center">
                            No results found
                        </div>
                    </template>

                    <!-- Filtered Items (when searchable) -->
                    <template x-if="searchable">
                        <template x-for="(item, index) in filteredItems" :key="'filtered-' + (filteredIndices[index] || index) + '-' + item">
                            <button
                                type="button"
                                x-on:click="multiple ? selectMultiple(filteredIndices[index]) : selectSingle(filteredIndices[index])"
                                x-on:mouseover="highlightOption(index)"
                                :class="highlighted === index ? 'bg-accent text-accent-foreground' : 'text-foreground'"
                                class="w-full text-left px-3 py-2 text-sm cursor-pointer button-radius transition-colors duration-150 flex items-center justify-between hover:bg-accent hover:text-accent-foreground"
                                :disabled="isOptionDisabled(filteredIndices[index])"
                            >
                                <span x-text="item"></span>
                                <x-icon
                                    x-show="isSelected(filteredIndices[index])"
                                    name="heroicon-o-check"
                                    :class="highlighted === index ? 'text-accent-foreground' : 'text-primary'"
                                    class="h-5 w-5"
                                />
                            </button>
                        </template>
                    </template>

                    <!-- Static Items (when not searchable) -->
                    <template x-if="!searchable">
                        <div>
                            <template x-for="(item, index) in Object.entries(items)" :key="'item-' + item[0] + '-' + index">
                                <button
                                    type="button"
                                    x-on:click="multiple ? selectMultiple(item[0]) : selectSingle(item[0])"
                                    x-on:mouseover="highlightOption(index)"
                                    :class="highlighted === index ? 'bg-accent text-accent-foreground' : 'text-foreground'"
                                    class="w-full text-left px-3 py-2 text-sm cursor-pointer button-radius transition-colors duration-150 flex items-center justify-between hover:bg-accent hover:text-accent-foreground"
                                    :disabled="isOptionDisabled(item[0])"
                                >
                                    <span x-text="item[1]"></span>
                                    <x-icon
                                        x-show="isSelected(item[0])"
                                        name="heroicon-o-check"
                                        :class="highlighted === index ? 'text-accent-foreground' : 'text-primary'"
                                        class="h-5 w-5"
                                    />
                                </button>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        @if($name)
            <template x-if="multiple">
                <div>
                    <template x-for="(selectedValue, index) in Array.isArray(value) ? value : []" :key="'hidden-' + selectedValue + '-' + index">
                        <input type="hidden" :name="'{{ $name }}[' + index + ']'" :value="selectedValue" />
                    </template>
                </div>
            </template>
            <template x-if="!multiple">
                <input type="hidden" name="{{ $name }}" :value="value" />
            </template>
        @endif
    </div>
</div>
