
<div
    x-data="strataDateRangePicker({
        value: {
            start: <?php echo \Illuminate\Support\Js::from($startDate?->toDateString())->toHtml() ?>,
            end: <?php echo \Illuminate\Support\Js::from($endDate?->toDateString())->toHtml() ?>
        },
        initialDate: <?php echo \Illuminate\Support\Js::from($initialDate->toIso8601String())->toHtml() ?>,
        weekStart: <?php echo \Illuminate\Support\Js::from($weekStart)->toHtml() ?>,
        monthsToShow: <?php echo \Illuminate\Support\Js::from($multiple ? $visibleMonths : 1)->toHtml() ?>,
        range: <?php echo \Illuminate\Support\Js::from($range)->toHtml() ?>,
        locale: <?php echo \Illuminate\Support\Js::from($locale)->toHtml() ?>,
        presets: <?php echo \Illuminate\Support\Js::from($presets)->toHtml() ?>,
        initialSelecting: <?php echo \Illuminate\Support\Js::from($selecting)->toHtml() ?>,
        initialUpdating: <?php echo \Illuminate\Support\Js::from($updating)->toHtml() ?>,
        minDate: <?php echo \Illuminate\Support\Js::from($minDate)->toHtml() ?>,
        maxDate: <?php echo \Illuminate\Support\Js::from($maxDate)->toHtml() ?>,
        disabledDates: <?php echo \Illuminate\Support\Js::from($disabledDates)->toHtml() ?>,
        showClearButton: <?php echo \Illuminate\Support\Js::from($showClearButton)->toHtml() ?>,
        closeOnSelect: <?php echo \Illuminate\Support\Js::from($closeOnSelect)->toHtml() ?>
    })"
    x-modelable="value"
    <?php echo e($attributes->wire('model')); ?>

    class="flex flex-col w-full mx-auto bg-card"
>
    <div class="flex flex-col md:flex-row flex-1">
        <!--[if BLOCK]><![endif]--><?php if(!empty($presets)): ?>
        <div class="shrink-0 w-full md:w-48 p-4 border-b md:border-b-0 md:border-r border-border">
            <h4 class="text-base font-semibold mb-3 text-foreground"><?php echo e(trans('strata::calendar.presets', [], $locale)); ?></h4>
            <div class="flex flex-col space-y-1">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $presets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $dates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button
                        x-on:click="setPreset(<?php echo \Illuminate\Support\Js::from($label)->toHtml() ?>)"
                        type="button"
                        class="px-3 py-1.5 text-left text-sm button-radius hover:bg-primary-50 dark:hover:bg-primary-900/20 transition-colors"
                        :class="{ 'bg-primary/10 font-semibold text-foreground': isPresetActive(<?php echo \Illuminate\Support\Js::from($label)->toHtml() ?>) }"
                    >
                        <?php echo e($label); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $getDayNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-xs font-medium text-muted py-2"><?php echo e($dayName); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

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
                                <!--[if BLOCK]><![endif]--><?php if(isset($day)): ?>
                                    <div class="absolute top-1 left-1 text-xs font-medium leading-none" x-text="day.date"></div>
                                    <div class="w-full h-full p-1 pt-4">
                                        <?php echo e($day); ?>

                                    </div>
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span x-text="day.date"></span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(isset($footer)): ?>
        <div class="w-full border-t border-border p-4">
            <?php echo e($footer); ?>

        </div>
    <?php else: ?>
        <!--[if BLOCK]><![endif]--><?php if($showClearButton): ?>
            <div class="w-full border-t border-border p-4">
                <div class="flex justify-end">
                    <button
                        x-on:click="clearSelection()"
                        type="button"
                        class="px-3 py-1.5 text-sm button-radius-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
                    >
                        <?php echo e(trans('strata::calendar.clear', [], $locale)); ?>

                    </button>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>

<?php /**PATH C:\Users\chaab\Herd\strata-dev\packages\strata-ui\src/../resources/views/components/calendar.blade.php ENDPATH**/ ?>