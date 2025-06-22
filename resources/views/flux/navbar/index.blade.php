@props([
    'scrollable' => false,
    'variant' => null,
])

@php
$classes = Flux::classes()
    ->add('flex items-center gap-1 py-6')
    ->add($scrollable ? ['overflow-x-auto overflow-y-hidden'] : [])
    ;
@endphp

<nav {{ $attributes->class($classes) }} data-flux-navbar>
    {{ $slot }}
</nav>
