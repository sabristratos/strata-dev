
<div
    x-data="(() => {
        const baseCalendar = strataDateRangePicker({
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
        });

        return {
            ...baseCalendar,
            _isMobile: window.innerWidth < 768,
            _originalMultiple: @js($multiple),
            _originalVisibleMonths: @js($visibleMonths),
            

            isPresetActive: baseCalendar.isPresetActive,
            
            get responsiveMonthsToShow() {
                return this._isMobile ? 1 : (this._originalMultiple ? this._originalVisibleMonths : 1);
            },
            
            init() {

                if (baseCalendar.init) {
                    baseCalendar.init.call(this);
                }
                

                this.config.monthsToShow = this.responsiveMonthsToShow;
                

                const resizeHandler = () => {
                    this._isMobile = window.innerWidth < 768;
                    const newMonthsToShow = this.responsiveMonthsToShow;
                    if (this.config.monthsToShow !== newMonthsToShow) {
                        this.config.monthsToShow = newMonthsToShow;

                        if (this.generateMonths) {
                            this.generateMonths();
                        }
                    }
                };
                
                window.addEventListener('resize', resizeHandler);
            }
        };
    })()"
    x-modelable="value"
    @if($attributes->has('wire:model')) {{ $attributes->get('wire:model') }} @endif
    class="flex flex-col w-full mx-auto bg-card"
    role="application"
    :aria-label="config.range ? 'Date range picker' : 'Date picker'"
>
    <div class="flex flex-col md:flex-row flex-1">
        @if (!empty($presets))
        <div class="shrink-0 w-full md:w-48 p-3 md:p-4 border-b md:border-b-0 md:border-r border-border">
            <h4 class="hidden md:block text-base font-semibold mb-3 text-foreground">{{ trans('strata::calendar.presets', [], $locale) }}</h4>
            <div class="flex flex-row md:flex-col overflow-x-auto md:overflow-x-visible gap-2 md:gap-0 md:space-y-1 py-2 md:py-0 px-1 md:px-0">
                @foreach ($presets as $label => $dates)
                    <x-strata::button
                        variant="ghost"
                        size="sm"
                        type="button"
                        x-on:click="setPreset({{ json_encode($label) }})"
                        class="justify-start whitespace-nowrap px-3 py-1.5 md:w-full md:px-4 md:py-2 shrink-0"
                        x-bind:aria-pressed="isPresetActive({{ json_encode($label) }}) ? 'true' : 'false'"
                        aria-label="Select {{ $label }} date range"
                    >
                        {{ $label }}
                    </x-strata::button>
                @endforeach
            </div>
        </div>
        @endif

        <div class="p-3 md:p-4 w-full flex-1">
        <div class="flex items-center justify-between mb-4 px-1 md:px-2">
            <button
                x-on:click="prevMonths()"
                type="button"
                class="p-2 button-radius hover:bg-muted transition-colors text-foreground"
                :aria-label="`Previous ${config.monthsToShow > 1 ? config.monthsToShow + ' months' : 'month'}`"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div 
                class="grow text-lg font-semibold text-center text-foreground" 
                x-text="headerText" 
                role="heading" 
                aria-level="2"
                aria-live="polite"
            ></div>
            <button
                x-on:click="nextMonths()"
                type="button"
                class="p-2 button-radius hover:bg-muted transition-colors text-foreground"
                :aria-label="`Next ${config.monthsToShow > 1 ? config.monthsToShow + ' months' : 'month'}`"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <div class="grid gap-4" style="grid-template-columns: repeat(auto-fill, minmax(240px, 1fr))">
            <template x-for="(monthData, index) in months" :key="'month-' + index + '-' + monthData.monthYear">
                <div class="w-full" role="grid" :aria-labelledby="'month-' + index + '-heading'">
                    <h5 
                        class="font-semibold text-center mb-2 text-foreground" 
                        x-text="monthData.monthYear" 
                        x-show="$data.config.monthsToShow > 1"
                        :id="'month-' + index + '-heading'"
                    ></h5>
                    <div class="grid grid-cols-7 text-center" role="row">
                        @foreach ($getDayNames() as $dayName)
                            <div class="text-xs font-medium text-muted-foreground py-2" role="columnheader" aria-label="{{ $dayName }}">{{ $dayName }}</div>
                        @endforeach

                        <template x-for="(day, dayIndex) in monthData.days" :key="'day-' + day.fullDate.getTime() + '-' + dayIndex">
                            <div
                                x-on:click="selectDate(day)"
                                role="gridcell"
                                tabindex="0"
                                :aria-label="day.fullDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + 
                                    (day.isStartDate ? ', Selected start date' : '') + 
                                    (day.isEndDate ? ', Selected end date' : '') +
                                    (day.isInRange ? ', In selected range' : '') +
                                    (day.isToday ? ', Today' : '') +
                                    (day.isDisabled ? ', Disabled' : ', Available')"
                                :aria-selected="day.isStartDate || day.isEndDate ? 'true' : 'false'"
                                :aria-disabled="day.isDisabled ? 'true' : 'false'"
                                @keydown.enter="selectDate(day)"
                                @keydown.space.prevent="selectDate(day)"
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
                                    'cursor-pointer hover:bg-muted button-radius-sm': day.isCurrentMonth && !day.isStartDate && !day.isEndDate && !day.isInRange && !this.selecting && !this.updating && !day.isDisabled,
                                    'cursor-pointer hover:bg-accent/20 button-radius-sm': day.isCurrentMonth && this.selecting && !day.isStartDate && !this.updating && !day.isDisabled,
                                    'ring-2 ring-primary/60 animate-pulse': (this.selecting && day.isStartDate) || (this.updating && (day.isStartDate || day.isEndDate)),
                                    'opacity-50': !day.isCurrentMonth && (this.selecting || this.updating),
                                    'text-muted-foreground opacity-50 cursor-not-allowed': day.isDisabled,
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
                    <x-strata::button
                        variant="ghost"
                        size="sm"
                        type="button"
                        x-on:click="clearSelection()"
                    >
                        {{ trans('strata::calendar.clear', [], $locale) }}
                    </x-strata::button>
                </div>
            </div>
        @endif
    @endisset
    

    <div aria-live="polite" aria-atomic="true" class="sr-only">
        <span x-show="selecting" x-text="'Selecting date range. Start date: ' + (startDate && typeof startDate.toLocaleDateString === 'function' ? startDate.toLocaleDateString() : 'Not selected')"></span>
        <span x-show="!selecting && startDate && endDate" x-text="'Date range selected: ' + (startDate && typeof startDate.toLocaleDateString === 'function' ? startDate.toLocaleDateString() : '') + ' to ' + (endDate && typeof endDate.toLocaleDateString === 'function' ? endDate.toLocaleDateString() : '')"></span>
        <span x-show="!selecting && startDate && !endDate && !config.range" x-text="'Date selected: ' + (startDate && typeof startDate.toLocaleDateString === 'function' ? startDate.toLocaleDateString() : '')"></span>
    </div>
</div>

