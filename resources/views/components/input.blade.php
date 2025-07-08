@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-white/20 text-white border-gray-300 focus:border-white focus:ring-white rounded-md shadow-sm']) !!}>
