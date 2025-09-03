@props([
    'padding' => 'responsive',
    'mobileHeader' => false,
    'mobileHeaderClass' => null,
])

<div 
    class="{{ $getContainerClasses() }} main-content-container" 
    x-data="{ }"
    x-init="document.body.classList.add('has-main-content')"
    x-destroy="document.body.classList.remove('has-main-content')"
    {{ $attributes }}
>
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