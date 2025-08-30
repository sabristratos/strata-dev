
<div
    x-data="strataDateRangePicker({
        value: {
            start: @js($startDate?->toDateString()),
            end: @js($endDate?->toDateString())
        },
        initialDate: @js($initialDate->toIso8601String()),
        weekStart: @js($weekStart),
        monthsToShow: @js($multiple ? $visibleMonths : 1),
        range: @js($range),
        locale: @js($locale),
        presets: @js($presets),
        initialSelecting: @js($selecting),
        initialUpdating: @js($updating),
        minDate: @js($minDate),
        maxDate: @js($maxDate),
        disabledDates: @js($disabledDates),
        showClearButton: @js($showClearButton),
        closeOnSelect: @js($closeOnSelect)
    })"
    x-modelable="value"
    {{ $attributes->wire('model') }}
    class="flex flex-col w-full mx-auto bg-card"
>
    <div class="flex flex-col md:flex-row flex-1">
        @if (!empty($presets))
        <div class="shrink-0 w-full md:w-48 p-4 border-b md:border-b-0 md:border-r border-border">
            <h4 class="text-base font-semibold mb-3 text-foreground">{{ trans('strata::calendar.presets', [], $locale) }}</h4>
            <div class="flex flex-col space-y-1">
                @foreach ($presets as $label => $dates)
                    <button
                        x-on:click="setPreset(@js($label))"
                        type="button"
                        class="px-3 py-1.5 text-left text-sm button-radius hover:bg-primary-50 dark:hover:bg-primary-900/20 transition-colors"
                        :class="{ 'bg-primary/10 font-semibold text-foreground': isPresetActive(@js($label)) }"
                    >
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>
        @endif

        <div class="p-4 w-full flex-1">
        <div class="flex items-center justify-between mb-4 px-2">
            <button
                x-on:click="prevMonths()"
                type="button"
                class="p-2 button-radius hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div class="grow text-lg font-semibold text-center text-foreground" x-text="headerText"></div>
            <button
                x-on:click="nextMonths()"
                type="button"
                class="p-2 button-radius hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <div class="grid gap-6" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr))">
            <template x-for="(monthData, index) in months" :key="'month-' + index + '-' + monthData.monthYear">
                <div class="w-full">
                    <h5 class="font-semibold text-center mb-2 text-foreground" x-text="monthData.monthYear" x-show="$data.config.monthsToShow > 1"></h5>
                    <div class="grid grid-cols-7 text-center">
                        @foreach ($getDayNames() as $dayName)
                            <div class="text-xs font-medium text-muted py-2">{{ $dayName }}</div>
                        @endforeach

                        <template x-for="(day, dayIndex) in monthData.days" :key="'day-' + day.fullDate.getTime() + '-' + dayIndex">
                            <div
                                x-on:click="selectDate(day)"
                                :class="{
                                    'text-muted-foreground opacity-60': !day.isCurrentMonth,
                                    'text-foreground': day.isCurrentMonth && !day.isStartDate && !day.isEndDate && !day.isInRange && !day.isDisabled,
                                    'bg-primary text-primary-foreground font-semibold ring-2 ring-primary/30': day.isStartDate && !day.isDisabled,
                                    'bg-primary text-primary-foreground font-semibold': day.isEndDate && !day.isDisabled,
                                    'bg-primary/20 text-foreground': day.isInRange && !day.isDisabled,
                                    'button-radius-sm rounded-r-none': day.isStartDate && !day.isEndDate,
                                    'button-radius-sm rounded-l-none': day.isEndDate && !day.isStartDate,
                                    'button-radius-sm': day.isStartDate && day.isEndDate,
                                    'rounded-none': day.isInRange && !day.isStartDate && !day.isEndDate,
                                    'font-bold ring-2 ring-primary/50 button-radius-sm': day.isToday && !day.isStartDate && !day.isEndDate && !day.isInRange && !this.selecting && !day.isDisabled,
                                    'cursor-pointer hover:bg-primary-50 dark:hover:bg-primary-900/20 button-radius-sm': day.isCurrentMonth && !day.isStartDate && !day.isEndDate && !day.isInRange && !this.selecting && !this.updating && !day.isDisabled,
                                    'cursor-pointer hover:bg-primary-200 dark:hover:bg-primary-800 button-radius-sm': day.isCurrentMonth && this.selecting && !day.isStartDate && !this.updating && !day.isDisabled,
                                    'ring-2 ring-primary/60 animate-pulse': (this.selecting && day.isStartDate) || (this.updating && (day.isStartDate || day.isEndDate)),
                                    'opacity-50': !day.isCurrentMonth && (this.selecting || this.updating),
                                    'text-gray-300 dark:text-gray-600 cursor-not-allowed': day.isDisabled,
                                    'line-through': day.isDisabled,
                                    'transition-all duration-200 ease-in-out': true
                                }"
                                class="aspect-square transition-colors duration-100 text-sm relative"
                            >
                                @isset($day)
                                    <div class="absolute top-1 left-1 text-xs font-medium leading-none" x-text="day.date"></div>
                                    <div class="w-full h-full p-1 pt-4">
                                        {{ $day }}
                                    </div>
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span x-text="day.date"></span>
                                    </div>
                                @endisset
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>
        </div>
    </div>

    @isset($footer)
        <div class="w-full border-t border-border p-4">
            {{ $footer }}
        </div>
    @else
        @if($showClearButton)
            <div class="w-full border-t border-border p-4">
                <div class="flex justify-end">
                    <button
                        x-on:click="clearSelection()"
                        type="button"
                        class="px-3 py-1.5 text-sm button-radius-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
                    >
                        {{ trans('strata::calendar.clear', [], $locale) }}
                    </button>
                </div>
            </div>
        @endif
    @endisset
</div>

