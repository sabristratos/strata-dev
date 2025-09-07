@props([
    'position' => 'bottom-end',
    'width' => 'w-56'
])

<x-strata::popover :position="$position" :width="$width" data-strata-dropdown="root">

    <x-slot:trigger>
        {{ $trigger }}
    </x-slot:trigger>


    <div class="p-1" data-strata-dropdown="content">
        {{ $slot }}
    </div>
</x-strata::popover>
