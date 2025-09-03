<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SidebarGroup component for organizing navigation items into logical sections.
 */
class SidebarGroup extends Component
{
    public function __construct(
        public ?string $label = null,
        public bool $collapsible = false,
        public ?bool $collapsed = null,
    ) {
        if ($this->collapsed === null) {
            $this->collapsed = $this->collapsible;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.sidebar-group');
    }

    /**
     * Check if group has a label.
     */
    public function hasLabel(): bool
    {
        return !empty($this->label);
    }

    /**
     * Generate unique group ID for collapsible functionality.
     */
    public function getGroupId(): string
    {
        static $groupCount = 0;

        return 'strata-sidebar-group-'.(++$groupCount);
    }

    /**
     * Get the CSS classes for the group container.
     */
    public function getContainerClasses(): string
    {
        $classes = ['sidebar-group'];

        if ($this->collapsible) {
            $classes[] = 'collapsible';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the CSS classes for the group label.
     */
    public function getLabelClasses(): string
    {
        $classes = [
            'text-xs',
            'font-medium',
            'text-muted-foreground/80',
            'uppercase',
            'tracking-wide',
            'mt-6',
            'mb-1',
            'first:mt-0',
        ];

        if ($this->collapsible) {
            $classes[] = 'w-full';
            $classes[] = 'px-3';
            $classes[] = 'py-2';
            $classes[] = 'cursor-pointer';
            $classes[] = 'hover:text-muted-foreground/90';
            $classes[] = 'hover:bg-accent/10';
            $classes[] = 'transition-colors';
            $classes[] = 'duration-200';
            $classes[] = 'flex';
            $classes[] = 'items-center';
            $classes[] = 'justify-between';
            $classes[] = 'focus:ring-0';
            $classes[] = 'focus-visible:outline-hidden';
            $classes[] = 'focus-visible:ring-2';
            $classes[] = 'focus-visible:ring-ring';
            $classes[] = 'focus-visible:ring-offset-1';
        } else {
            $classes[] = 'px-3';
            $classes[] = 'py-2';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the CSS classes for the group content.
     */
    public function getContentClasses(): string
    {
        $classes = ['space-y-0.5'];

        if ($this->collapsible) {
            $classes[] = 'transition-all';
            $classes[] = 'duration-200';
            $classes[] = 'relative';
        }

        return implode(' ', $classes);
    }

    /**
     * Get accessibility attributes for collapsible groups.
     */
    public function getAccessibilityAttributes(): array
    {
        if (!$this->collapsible) {
            return [];
        }

        return [
            'aria-expanded' => $this->collapsed ? 'false' : 'true',
            'aria-controls' => $this->getGroupId() . '-content',
        ];
    }
}
