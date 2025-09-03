@props([
    'position' => 'bottom-end',
    'width' => 'w-56'
])

<x-strata::popover :position="$position" :width="$width">

    <x-slot:trigger>
        {{ $trigger }}
    </x-slot:trigger>


    <div class="p-1">
        {{ $slot }}
    </div>
</x-strata::popover>
