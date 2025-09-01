@props([
    'value',
    'disabled' => false
])

<button
    type="button"
    role="tab"
    data-tab-trigger="{{ $value }}"
    :aria-selected="isActive('{{ $value }}') ? 'true' : 'false'"
    :tabindex="isActive('{{ $value }}') ? '0' : '-1'"
    :data-state="isActive('{{ $value }}') ? 'active' : 'inactive'"
    @click="activateTab('{{ $value }}')"
    @if($disabled)
        disabled
        aria-disabled="true"
    @endif
    {{ $attributes->except(['value', 'disabled'])->merge([
        'class' => $getTriggerClasses()
    ]) }}
>
    {{ $slot }}
</button>