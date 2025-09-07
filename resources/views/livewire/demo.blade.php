<x-strata::main-content>
    <div class="container mx-auto space-y-16">
        {{-- Header --}}
        <div class="text-center space-y-4">
            <div class="flex items-center justify-center gap-4">
                <div class="flex-1 text-center">
                    <h1>Strata Design System</h1>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-muted-foreground">Theme:</span>
                    <x-dark-mode-toggle />
                </div>
            </div>
            <p class="text-xl text-muted-foreground">Modern, Maintainable, and Scalable</p>
            <p class="text-muted-foreground">Built with semantic colors, scalable radius, and modular typography</p>
        </div>

        {{-- Typography Scale --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2>Typography Scale</h2>
                <p class="text-muted-foreground">Mathematical progression using Major Third (1.25) ratio</p>
            </div>

            <div class="space-y-6 max-w-4xl mx-auto">
                <div class="space-y-4">
                    <h1 class="text-4xl font-bold leading-tight tracking-tight mb-4">Heading 1 - 4xl (~3.05rem)</h1>
                    <h2 class="text-3xl font-bold leading-tight tracking-tight mb-3">Heading 2 - 3xl (~2.44rem)</h2>
                    <h3 class="text-2xl font-semibold leading-snug mb-2">Heading 3 - 2xl (~1.95rem)</h3>
                    <h4 class="text-xl font-semibold leading-snug mb-2">Heading 4 - xl (~1.56rem)</h4>
                    <h5 class="text-lg font-medium leading-normal mb-1">Heading 5 - lg (~1.25rem)</h5>
                    <h6 class="text-base font-medium leading-normal mb-1">Heading 6 - base (1rem)</h6>
                </div>

                <div class="border-t pt-6 space-y-3">
                    <p class="text-lg leading-relaxed mb-4">Large body text - lg (~1.25rem)</p>
                    <p class="text-base leading-relaxed mb-4">Regular body text - base (1rem)</p>
                    <p class="text-sm leading-relaxed mb-4">Small text - sm (~0.8rem)</p>
                    <p class="text-xs leading-relaxed">Extra small text - xs (~0.64rem)</p>
                </div>

                <div class="bg-muted p-4 rounded">
                    <p class="text-sm font-medium text-muted-foreground mb-2">Scale Control</p>
                    <p class="text-sm">Change <code>--font-scale-ratio</code> to adjust the entire hierarchy:</p>
                    <ul class="text-sm space-y-1 mt-2">
                        <li>• <code>1.2</code> - Minor Third (subtle)</li>
                        <li>• <code>1.25</code> - Major Third (current)</li>
                        <li>• <code>1.333</code> - Perfect Fourth (dramatic)</li>
                        <li>• <code>1.414</code> - Augmented Fourth (very dramatic)</li>
                    </ul>
                </div>
            </div>
        </section>

        {{-- Color Swatches --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2>Color System</h2>
                <p class="text-muted-foreground">Generative colors using color-mix() with OKLCH color space</p>
            </div>

            {{-- Brand Colors --}}
            <div class="space-y-4">
                <h3>Brand Colors</h3>
                <p class="text-sm text-muted-foreground">Change <code>--color-brand</code> and all shades update automatically</p>
                <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
                    <div class="space-y-2">
                        <div class="h-16 bg-brand-50 rounded border flex items-center justify-center">
                            <span class="text-xs font-mono">50</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">brand-50</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-brand-100 rounded border flex items-center justify-center">
                            <span class="text-xs font-mono">100</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">brand-100</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-brand-300 rounded border flex items-center justify-center">
                            <span class="text-xs font-mono">300</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">brand-300</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-brand-500 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">500</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">brand-500 (base)</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-brand-700 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">700</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">brand-700</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-brand-900 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">900</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">brand-900</p>
                    </div>
                </div>
            </div>

            {{-- Action Colors --}}
            <div class="space-y-4">
                <h3>Action Colors</h3>
                <p class="text-sm text-muted-foreground">Used for call-to-action elements and interactive states</p>
                <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
                    <div class="space-y-2">
                        <div class="h-16 bg-action-50 rounded border flex items-center justify-center">
                            <span class="text-xs font-mono">50</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">action-50</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-action-100 rounded border flex items-center justify-center">
                            <span class="text-xs font-mono">100</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">action-100</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-action-300 rounded border flex items-center justify-center">
                            <span class="text-xs font-mono">300</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">action-300</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-action-500 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">500</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">action-500 (base)</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-action-700 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">700</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">action-700</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-action-900 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">900</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">action-900</p>
                    </div>
                </div>
            </div>

            {{-- Neutral Colors --}}
            <div class="space-y-4">
                <h3>Neutral Colors</h3>
                <p class="text-sm text-muted-foreground">Foundation grays with subtle coolness for modern interfaces</p>
                <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
                    <div class="space-y-2">
                        <div class="h-16 bg-neutral-50 rounded border flex items-center justify-center">
                            <span class="text-xs font-mono">50</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">neutral-50</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-neutral-200 rounded border flex items-center justify-center">
                            <span class="text-xs font-mono">200</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">neutral-200</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-neutral-400 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">400</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">neutral-400</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-neutral-600 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">600</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">neutral-600</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-neutral-800 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">800</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">neutral-800</p>
                    </div>
                    <div class="space-y-2">
                        <div class="h-16 bg-neutral-950 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">950</span>
                        </div>
                        <p class="text-xs text-muted-foreground text-center">neutral-950</p>
                    </div>
                </div>
            </div>

            {{-- State Colors --}}
            <div class="space-y-4">
                <h3>Semantic State Colors</h3>
                <p class="text-sm text-muted-foreground">Consistent feedback colors for success, warning, error, and info states</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="space-y-3">
                        <div class="h-16 bg-success-500 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">Success</span>
                        </div>
                        <div class="flex gap-1">
                            <div class="flex-1 h-4 bg-success-50 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-success-200 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-success-500 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-success-700 rounded-sm"></div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="h-16 bg-warning-500 rounded border flex items-center justify-center text-warning-foreground">
                            <span class="text-xs font-mono">Warning</span>
                        </div>
                        <div class="flex gap-1">
                            <div class="flex-1 h-4 bg-warning-50 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-warning-200 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-warning-500 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-warning-700 rounded-sm"></div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="h-16 bg-destructive-500 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">Error</span>
                        </div>
                        <div class="flex gap-1">
                            <div class="flex-1 h-4 bg-destructive-50 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-destructive-200 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-destructive-500 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-destructive-700 rounded-sm"></div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="h-16 bg-info-500 rounded border flex items-center justify-center text-white">
                            <span class="text-xs font-mono">Info</span>
                        </div>
                        <div class="flex gap-1">
                            <div class="flex-1 h-4 bg-info-50 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-info-200 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-info-500 rounded-sm"></div>
                            <div class="flex-1 h-4 bg-info-700 rounded-sm"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-muted p-4 rounded">
                <p class="text-sm font-medium text-muted-foreground mb-2">Color System Benefits</p>
                <ul class="text-sm space-y-1">
                    <li>• <strong>Auto-generated shades:</strong> Change base colors and all variants update</li>
                    <li>• <strong>OKLCH color space:</strong> Perceptually uniform and future-proof</li>
                    <li>• <strong>Consistent mixing:</strong> Standardized percentages across all color families</li>
                    <li>• <strong>50-variants added:</strong> Ultra-light shades for subtle backgrounds</li>
                    <li>• <strong>Dark mode optimized:</strong> Only neutrals adjust, semantics stay consistent</li>
                </ul>
            </div>
        </section>

        {{-- Buttons --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2>Button Components</h2>
                <p class="text-muted-foreground">All variants now use the new semantic color system</p>
            </div>

            {{-- Button Variants --}}
            <div class="space-y-6">
                <div class="space-y-4">
                    <h3>Color Variants</h3>
                    <p class="text-sm text-muted-foreground">Each variant automatically uses the appropriate semantic colors</p>
                    <div class="flex flex-wrap gap-3">
                        <x-strata::button variant="primary">Primary</x-strata::button>
                        <x-strata::button variant="brand">Brand</x-strata::button>
                        <x-strata::button variant="action">Action</x-strata::button>
                        <x-strata::button variant="accent">Accent</x-strata::button>
                        <x-strata::button variant="success">Success</x-strata::button>
                        <x-strata::button variant="warning">Warning</x-strata::button>
                        <x-strata::button variant="info">Info</x-strata::button>
                        <x-strata::button variant="destructive">Destructive</x-strata::button>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3>Style Variants</h3>
                    <p class="text-sm text-muted-foreground">Different visual approaches for various interface needs</p>
                    <div class="flex flex-wrap gap-3">
                        <x-strata::button variant="primary">Filled</x-strata::button>
                        <x-strata::button variant="outline">Outline</x-strata::button>
                        <x-strata::button variant="secondary">Secondary</x-strata::button>
                        <x-strata::button variant="ghost">Ghost</x-strata::button>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3>Size Variants</h3>
                    <p class="text-sm text-muted-foreground">Sizes now use modular typography scale</p>
                    <div class="flex flex-wrap gap-3 items-center">
                        <x-strata::button size="sm">Small (text-sm)</x-strata::button>
                        <x-strata::button>Medium (text-base)</x-strata::button>
                        <x-strata::button size="lg">Large (text-lg)</x-strata::button>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3>Interactive States</h3>
                    <p class="text-sm text-muted-foreground">Enhanced focus states with semantic ring colors</p>
                    <div class="flex flex-wrap gap-3">
                        <x-strata::button>Normal</x-strata::button>
                        <x-strata::button loading>Loading</x-strata::button>
                        <x-strata::button disabled>Disabled</x-strata::button>
                    </div>
                </div>
            </div>
        </section>

        {{-- Radius System --}}
        <section class="space-y-8">
            <div class="text-center">
                <h2>Scalable Radius System</h2>
                <p class="text-muted-foreground">Change <code>--radius-base</code> to adjust all component roundness</p>
            </div>

            <div class="space-y-6 max-w-4xl mx-auto">
                <div class="space-y-4">
                    <h3>Radius Scale</h3>
                    <p class="text-sm text-muted-foreground">All values calculated from base multiplier</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center space-y-2">
                            <div class="h-16 bg-brand-500 rounded-sm flex items-center justify-center text-white">
                                <span class="text-xs">sm</span>
                            </div>
                            <p class="text-xs text-muted-foreground">rounded-sm</p>
                            <code class="text-xs">0.25rem × base</code>
                        </div>
                        <div class="text-center space-y-2">
                            <div class="h-16 bg-brand-500 rounded flex items-center justify-center text-white">
                                <span class="text-xs">default</span>
                            </div>
                            <p class="text-xs text-muted-foreground">rounded</p>
                            <code class="text-xs">0.375rem × base</code>
                        </div>
                        <div class="text-center space-y-2">
                            <div class="h-16 bg-brand-500 rounded-lg flex items-center justify-center text-white">
                                <span class="text-xs">lg</span>
                            </div>
                            <p class="text-xs text-muted-foreground">rounded-lg</p>
                            <code class="text-xs">0.75rem × base</code>
                        </div>
                        <div class="text-center space-y-2">
                            <div class="h-16 bg-brand-500 rounded-xl flex items-center justify-center text-white">
                                <span class="text-xs">xl</span>
                            </div>
                            <p class="text-xs text-muted-foreground">rounded-xl</p>
                            <code class="text-xs">1.25rem × base</code>
                        </div>
                    </div>
                </div>

                <div class="bg-muted p-4 rounded">
                    <p class="text-sm font-medium text-muted-foreground mb-2">Theme Examples</p>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <code>--radius-base: 0.5</code>
                            <span class="text-muted-foreground">Sharp, corporate theme</span>
                        </div>
                        <div class="flex justify-between">
                            <code>--radius-base: 1</code>
                            <span class="text-muted-foreground">Default, balanced theme</span>
                        </div>
                        <div class="flex justify-between">
                            <code>--radius-base: 1.5</code>
                            <span class="text-muted-foreground">Friendly, rounded theme</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="text-center py-8 border-t">
            <p class="text-muted-foreground">
                Strata Design System - Semantic • Generative • Scalable
            </p>
            <p class="text-sm text-muted-foreground mt-2">
                Built with mathematical precision and modern CSS techniques
            </p>
        </footer>
    </div>
</x-strata::main-content>
