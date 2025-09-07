<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Component Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-background font-sans text-foreground">
    <div class="max-w-4xl mx-auto p-8 space-y-8">
        <h1 class="text-3xl font-bold text-center mb-12">Strata UI Text Component Test</h1>
        
        <!-- Basic Variants -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Text Variants</h2>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Body (Default)</h3>
                <x-strata::text variant="body">
                    This is body text. It's the standard paragraph text used throughout the website. It should be readable and comfortable for extended reading.
                </x-strata::text>
            </div>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Quote</h3>
                <x-strata::text variant="quote">
                    "This is a quote variant. It includes special styling with a border and italic text to distinguish it from regular content."
                </x-strata::text>
            </div>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Lead</h3>
                <x-strata::text variant="lead">
                    This is lead text, typically used for introductory paragraphs or important content that needs to stand out.
                </x-strata::text>
            </div>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Small & Caption</h3>
                <x-strata::text variant="small">
                    This is small text, perfect for metadata or less important information.
                </x-strata::text>
                <x-strata::text variant="caption">
                    This is caption text, typically used under images or tables.
                </x-strata::text>
            </div>
            
            <div class="space-y-2">
                <h3 class="text-lg font-medium">Muted</h3>
                <x-strata::text variant="muted">
                    This is muted text with reduced emphasis, perfect for secondary information.
                </x-strata::text>
            </div>
        </section>

        <!-- Size Variations -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Size Variations</h2>
            <div class="space-y-2">
                <x-strata::text size="xs">Extra small text (xs)</x-strata::text>
                <x-strata::text size="sm">Small text (sm)</x-strata::text>
                <x-strata::text size="base">Base text (base)</x-strata::text>
                <x-strata::text size="lg">Large text (lg)</x-strata::text>
                <x-strata::text size="xl">Extra large text (xl)</x-strata::text>
                <x-strata::text size="2xl">2X large text (2xl)</x-strata::text>
            </div>
        </section>

        <!-- Weight Variations -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Weight Variations</h2>
            <div class="space-y-2">
                <x-strata::text weight="normal">Normal weight text</x-strata::text>
                <x-strata::text weight="medium">Medium weight text</x-strata::text>
                <x-strata::text weight="semibold">Semibold weight text</x-strata::text>
                <x-strata::text weight="bold">Bold weight text</x-strata::text>
            </div>
        </section>

        <!-- Color Variations -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Color Variations</h2>
            <div class="space-y-2">
                <x-strata::text color="foreground">Foreground color (default)</x-strata::text>
                <x-strata::text color="muted">Muted color</x-strata::text>
                <x-strata::text color="brand">Brand color</x-strata::text>
                <x-strata::text color="accent">Accent color</x-strata::text>
                <x-strata::text color="destructive">Destructive color</x-strata::text>
                <x-strata::text color="success">Success color</x-strata::text>
                <x-strata::text color="warning">Warning color</x-strata::text>
                <x-strata::text color="info">Info color</x-strata::text>
            </div>
        </section>

        <!-- Custom Element Tags -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Custom Element Tags</h2>
            <div class="space-y-2">
                <x-strata::text as="div" class="border p-4 rounded">Text as div element</x-strata::text>
                <x-strata::text as="span" class="bg-neutral-100 px-2 py-1 rounded">Text as span element</x-strata::text>
            </div>
        </section>

        <!-- Combinations -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Combinations</h2>
            <div class="space-y-2">
                <x-strata::text variant="body" size="lg" weight="semibold" color="brand">
                    Large semibold brand colored body text
                </x-strata::text>
                <x-strata::text variant="small" weight="medium" color="muted">
                    Medium weight muted small text
                </x-strata::text>
                <x-strata::text variant="quote" color="accent" weight="medium">
                    "An accented medium weight quote"
                </x-strata::text>
            </div>
        </section>

        <!-- Dark Mode Toggle -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Dark Mode Test</h2>
            <button 
                onclick="document.documentElement.classList.toggle('dark')"
                class="px-4 py-2 bg-primary text-primary-foreground rounded hover:bg-primary/90 transition-colors"
            >
                Toggle Dark Mode
            </button>
            <x-strata::text>
                Toggle dark mode to test theme integration. All text colors should adapt properly.
            </x-strata::text>
        </section>
    </div>
</body>
</html>