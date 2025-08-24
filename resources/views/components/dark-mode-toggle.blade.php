<div
    x-data="{
        isDark: false,
        init() {
            this.isDark = localStorage.getItem('theme') === 'dark' ||
                (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
            this.applyTheme();
        },
        async toggle(event) {
            const newTheme = !this.isDark;
            
            // Check for View Transitions API support and user motion preferences
            if (
                !document.startViewTransition ||
                window.matchMedia('(prefers-reduced-motion: reduce)').matches
            ) {
                // Fallback to regular theme switch
                this.isDark = newTheme;
                localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
                this.applyTheme();
                return;
            }

            // Get the toggle switch position for the expanding circle animation
            const toggleElement = event.target.closest('label') || event.target;
            const rect = toggleElement.getBoundingClientRect();
            const x = rect.left + rect.width / 2;
            const y = rect.top + rect.height / 2;
            
            // Calculate maximum radius to cover the entire screen
            const endRadius = Math.hypot(
                Math.max(x, window.innerWidth - x),
                Math.max(y, window.innerHeight - y)
            );

            // Start the view transition
            const transition = document.startViewTransition(async () => {
                this.isDark = newTheme;
                localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
                this.applyTheme();
            });

            // Wait for the transition to be ready, then animate
            try {
                await transition.ready;
                
                // Animate the expanding circle
                document.documentElement.animate(
                    {
                        clipPath: [
                            `circle(0px at ${x}px ${y}px)`,
                            `circle(${endRadius}px at ${x}px ${y}px)`
                        ]
                    },
                    {
                        duration: 500,
                        easing: 'ease-in-out',
                        pseudoElement: '::view-transition-new(root)'
                    }
                );
            } catch (e) {
                // If animation fails, fallback to regular theme switch
                console.warn('View transition animation failed:', e);
            }
        },
        applyTheme() {
            document.documentElement.classList.toggle('dark', this.isDark);
            document.documentElement.classList.toggle('light', !this.isDark);
        }
    }"
    x-init="init()"
    class="inline-flex items-center"
>
    <label
        class="relative inline-flex items-center cursor-pointer"
        aria-label="Toggle dark mode"
    >
        <input
            type="checkbox"
            class="sr-only peer"
            :checked="isDark"
            @change="toggle($event)"
        >
        <div
            class="
                w-14 h-8 bg-input rounded-full peer border border-border
                peer-focus:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-offset-2 peer-focus-visible:ring-ring
                peer-checked:bg-primary transition-all duration-300
            "
        ></div>
        <div
            class="
                absolute top-1 left-1 bg-background rounded-full h-6 w-6 border border-border
                transition-transform duration-300 transform shadow-sm
                peer-checked:translate-x-6
                flex items-center justify-center
            "
        >
            <x-icon
                name="heroicon-o-sun"
                class="w-4 h-4 text-yellow-500"
                x-show="!isDark"
                x-cloak
                x-transition:enter="transition ease-out duration-200 delay-100"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-75"
            />
            <x-icon
                name="heroicon-o-moon"
                class="w-4 h-4 text-indigo-500"
                x-show="isDark"
                x-cloak
                x-transition:enter="transition ease-out duration-200 delay-100"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-75"
            />
        </div>
    </label>
</div>