@props(['active'])

<a {{ $attributes->merge(['class' => 'me-4 md:me-6 hover:text-blue-500']) }}>
    {{ $slot }}
</a>
