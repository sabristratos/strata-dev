@php
    $hasLeadingSlot = isset($leading);
    $hasTrailingSlot = isset($trailing);
    $hasIcon = !empty($icon);
    $hasClearable = $clearable;
    $hasPasswordToggle = $showPasswordToggle && $type === 'password';
    $hasLabel = !empty($label);
    $hasDescription = !empty($description);
    $hasError = !empty($error);
@endphp

<div class="space-y-2" data-strata-input="wrapper">

    @if($hasLabel)
        <x-strata::form.label 
            :for="$id" 
            :required="$required"
        >
            {{ $label }}
        </x-strata::form.label>
    @endif
    

    @if($hasDescription && !$hasError)
        <x-strata::form.helper 
            :field="$name"
            :text="$description"
        />
    @endif


    <div
        x-data="{
            /** @type {string} Current input value */
            value: @if($attributes->has('wire:model')) @entangle($attributes->get('wire:model')) @else @js($value ?? '') @endif,
            /** @type {string} Input type */
            type: '{{ $type }}',
            
            init() {

                console.log('🔍 INPUT DEBUG - Name:', @js($name ?? 'unnamed'));
                console.log('🔍 INPUT DEBUG - Type:', @js($type));  
                console.log('🔍 INPUT DEBUG - Raw $value type:', typeof(@js($value)));
                console.log('🔍 INPUT DEBUG - Raw $value:', @js($value));
                console.log('🔍 INPUT DEBUG - Final Alpine value:', this.value);
                console.log('🔍 INPUT DEBUG - Has wire:model:', @js($attributes->has('wire:model')));
                console.log('========================');
            },
            
            /** @type {boolean} Whether this is a password input */
            isPassword: '{{ $type === 'password' }}',
            /** @type {boolean} Whether password is currently visible */
            showPassword: false,

            /**
             * Get the current input type, handling password visibility
             * @returns {string} The input type to use
             */
            get inputType() {
                return this.isPassword && !this.showPassword ? 'password' : (this.isPassword ? 'text' : this.type);
            },

            /**
             * Check if input has a value
             * @returns {boolean} Whether input has content
             */
            get hasValue() {
                return this.value && this.value.toString().length > 0;
            },

            /**
             * Clear the input value and focus the field
             */
            clearInput() {
                this.value = '';
                this.$refs.input.focus();
                this.$dispatch('input-cleared', { name: '{{ $name }}' });
            },

            /**
             * Toggle password visibility and focus the field
             */
            togglePassword() {
                this.showPassword = !this.showPassword;
                this.$refs.input.focus();
                this.$dispatch('password-toggled', { visible: this.showPassword });
            }
        }"
    >

        <div 
            class="{{ $getWrapperClasses() }}"
            @click="$refs.input.focus()"
            :class="{ 'opacity-50': {{ $disabled ? 'true' : 'false' }} }"
            data-strata-input="container"
            {{ $attributes->except(['wire:model', 'id', 'name', 'placeholder', 'required', 'disabled', 'readonly', 'type']) }}
        >

            @if($hasIcon || $hasLeadingSlot)
                <div class="flex items-center px-3 py-2">
                    @isset($leading)
                        {{ $leading }}
                    @elseif($hasIcon)
                        <x-dynamic-component 
                            :component="$icon" 
                            class="h-5 w-5 text-muted-foreground" 
                            aria-hidden="true" 
                        />
                    @endisset
                </div>
            @endif


            <input
                x-ref="input"
                :type="inputType"
                x-model="value"
                id="{{ $id }}"
                @if($name) name="{{ $name }}" @endif
                @if($placeholder) placeholder="{{ $placeholder }}" @endif
                @if($required) required aria-required="true" @endif
                @if($disabled) disabled @endif
                @if($readonly) readonly @endif
                @if($hasLabel) aria-labelledby="{{ $id }}-label" @endif
                @if($hasDescription && !$hasError) aria-describedby="{{ $name }}-description" @endif
                @if($hasError) aria-describedby="{{ $name }}-error" aria-invalid="true" @endif
                @if($hasDescription && $hasError) aria-describedby="{{ $name }}-description {{ $name }}-error" @endif
                class="{{ $getInputClasses() }}"
                data-strata-input="field"
            />


            @if($hasClearable || $hasPasswordToggle || $hasTrailingSlot)
                <div class="flex items-center px-3 py-2 gap-1">
                    @isset($trailing)
                        {{ $trailing }}
                    @endif
                    
                    @if($hasClearable)
                        <button
                            type="button"
                            x-show="hasValue"
                            x-on:click.stop="clearInput()"
                            class="text-muted-foreground hover:text-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:text-foreground transition-colors duration-200 rounded-sm p-0.5"
                            aria-label="Clear input"
                            tabindex="0"
                        >
                            <x-icon name="heroicon-o-x-mark" class="h-4 w-4" aria-hidden="true" />
                        </button>
                    @endif

                    @if($hasPasswordToggle)
                        <button
                            type="button"
                            x-on:click.stop="togglePassword()"
                            class="text-muted-foreground hover:text-foreground focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:text-foreground transition-colors duration-200 rounded-sm p-0.5"
                            :aria-label="showPassword ? 'Hide password' : 'Show password'"
                            tabindex="0"
                        >
                            <x-icon x-show="!showPassword" name="heroicon-o-eye" class="h-4 w-4" aria-hidden="true" />
                            <x-icon x-show="showPassword" name="heroicon-o-eye-slash" class="h-4 w-4" aria-hidden="true" />
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>
    

    @if($hasError)
        <x-strata::form.error 
            :field="$name"
            :message="$error"
        />
    @endif
</div>