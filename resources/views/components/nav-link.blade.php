@props(['active' => false])

@php
    $classes = ($active ?? false) ? 'nav-link active' : 'nav-link';
@endphp
<li class="nav-item">
    <a {{ $attributes->merge(['class'=> $classes ]) }}>
        {{ $slot }}
    </a>
</li>


{{-- <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Home</a>
</li> --}}
