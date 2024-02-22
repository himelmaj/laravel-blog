@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex space-x-2 items-center hover:text-blue-500 text-sm text-blue-500'
            : 'flex space-x-2 items-center hover:text-blue-500 text-sm text-gray-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate.hover>
    {{ $slot }}
</a>
