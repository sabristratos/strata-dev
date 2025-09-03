@props([
    'value',
    'forceMount' => false
])

<div
    role="tabpanel"
    data-tab-content="{{ $value }}"
    @if($forceMount)
        data-force-mount
    @endif
    x-show="isActive('{{ $value }}') {{ $forceMount ? '|| forceMount' : '' }}"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    :aria-hidden="!isActive('{{ $value }}') ? 'true' : 'false'"
    tabindex="0"
    {{ $attributes->except(['value', 'forceMount'])->merge([
        'class' => $getContentClasses()
    ]) }}
>
    {{ $slot }}
</div>