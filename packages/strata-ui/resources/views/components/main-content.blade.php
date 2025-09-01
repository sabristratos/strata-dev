@props([
    'padding' => 'responsive',
    'mobileHeader' => false,
    'mobileHeaderClass' => null,
])

<div class="{{ $getContainerClasses() }}" {{ $attributes }}>
    {{-- Mobile Header --}}
    @if($mobileHeader && isset($header))
        <header class="{{ $getMobileHeaderClasses() }}">
            {{ $header }}
        </header>
    @endif

    {{-- Main Content Area --}}
    <main class="{{ $getContentClasses() }}">
        {{ $slot }}
    </main>
</div>