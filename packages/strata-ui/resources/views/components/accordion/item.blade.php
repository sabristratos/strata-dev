@props([
    'value',
    'title' => '',
    'disabled' => false,
    'icon' => null,
])

@php
    // Get parent accordion context
    $accordionId = $attributes->get('data-accordion-id', 'accordion-' . uniqid());
    $itemId = "item-{$value}";
    $triggerId = "trigger-{$value}";
    $contentId = "content-{$value}";
@endphp

{{-- Progressive Enhancement: Native HTML details/summary --}}
<details
    data-accordion-item="{{ $value }}"
    @if($disabled)
        data-disabled="true"
    @endif
    {{ $attributes->except(['value', 'title', 'disabled', 'icon'])->merge([
        'class' => 'accordion-item border-b border-border last:border-b-0'
    ]) }}
>
    {{-- Semantic summary element for the accordion trigger --}}
    <summary
        @if($disabled)
            disabled
        @endif
        class="flex items-center justify-between w-full text-left group {{ $disabled ? 'cursor-not-allowed opacity-50' : 'cursor-pointer' }} p-4"
        aria-controls="{{ $contentId }}"
        aria-expanded="false"
    >
        @if(isset($trigger))
            {{-- Custom Trigger Slot --}}
            {{ $trigger }}
        @else
            {{-- Default Trigger Layout --}}
            <div class="flex items-center justify-between w-full">
                {{-- Icon Start Position --}}
                <div class="flex items-center mr-3" style="display: none;">
                    @if($icon)
                        <x-strata::icon :name="$icon" class="w-4 h-4 text-muted-foreground" />
                    @endif
                </div>

                {{-- Title Content --}}
                <div class="flex-1 font-medium group-focus-visible:underline group-focus-visible:decoration-2 underline-offset-2">
                    {{ $title ?: 'Accordion Item' }}
                </div>

                {{-- Icon End Position (Default) --}}
                <div class="flex items-center ml-3">
                    @if($icon)
                        <x-strata::icon :name="$icon" class="w-4 h-4 text-muted-foreground" />
                    @endif
                    
                    {{-- Toggle Chevron --}}
                    <svg class="w-4 h-4 transition-transform duration-200 group-data-[state=open]:rotate-180 accordion-toggle-icon" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        @endif
    </summary>

    {{-- Accordion Content with Progressive Enhancement and Smooth Animations --}}
    <div 
        data-accordion-content
        class="accordion-item-content overflow-hidden"
        id="{{ $contentId }}"
        role="region"
        aria-labelledby="{{ $triggerId }}"
    >
        <div class="accordion-content-inner p-4 pt-0">
            {{ $slot }}
        </div>
    </div>
</details>

