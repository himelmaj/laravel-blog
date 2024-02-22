@props(['textColor' => '#000000', 'bgColor' => '#ffffff'])
<button {{ $attributes }} class="rounded-xl px-3 py-1 text-base" style="background-color:{{ $bgColor }};color:{{ $textColor }}">{{ $slot }}</button>

