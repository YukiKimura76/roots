@props(['active'])

@php
$class = ($acti)

@endphp

<a {{ $attributes }} class="block py-2.5 px-4 rounded hover:bg-blue-700 transition duration-150 ease-in-out">
  {{ $slot }}
</a>