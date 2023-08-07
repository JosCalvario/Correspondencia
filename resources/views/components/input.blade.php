@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-sc_gravel focus:border-sc_greener focus:ring-sc_greener rounded-md shadow-sm']) !!}>
