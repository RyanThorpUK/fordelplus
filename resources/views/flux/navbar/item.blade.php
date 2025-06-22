@php $iconTrailing = $iconTrailing ??= $attributes->pluck('icon:trailing'); @endphp
@php $iconVariant = $iconVariant ??= $attributes->pluck('icon:variant'); @endphp

@aware([ 'variant' ])

@props([
    'iconVariant' => 'outline',
    'iconTrailing' => null,
    'badgeColor' => null,
    'variant' => null,
    'iconDot' => null,
    'accent' => true,
    'square' => null,
    'badge' => null,
    'icon' => null,
])

@php
// Button should be a square if it has no text contents...
$square ??= $slot->isEmpty();

// Size-up icons in square/icon-only buttons...
$iconClasses = Flux::classes($square ? 'size-6' : 'size-5');

$textClasses = request()->user() && request()->user()->type == 1 ? 'text-primary-400' : 'text-[#3E3E3E]';
$textHoverClasses = request()->user() && request()->user()->type == 1 ? 'hover:text-primary-400' : 'hover:text-[#3E3E3E]';
$textCurrentClasses = request()->user() && request()->user()->type == 1 ? 'data-current:text-primary-400' : 'data-current:hover:text-[#3E3E3E]';

$classes = Flux::classes()
    ->add('md:px-2.5! h-8 flex items-center rounded-lg')
    ->add('relative') // This is here for the "active" bar at the bottom to be positioned correctly...
    ->add($square)
    ->add($textClasses)
    // Styles for when this link is the "current" one...
    ->add('data-current:after:absolute data-current:after:-bottom-6 data-current:after:inset-x-0 data-current:after:h-[3px]')
    ->add([
        '[--hover-fill:color-mix(in_oklab,_var(--color-accent-content),_transparent_90%)]',

    ])
    ->add(match ($accent) {
        true => [
            $textCurrentClasses,
            'data-current:after:bg-(--color-primary)',
        ],
        false => [
            'hover:text-primary',
            'data-current:text-primary',
            'data-current:after:bg-primary',
        ],
    })
    ;
@endphp

<flux:button-or-link :attributes="$attributes->class($classes)" data-flux-navbar-items>
    <?php if ($icon): ?>
        <div class="relative">
            <?php if (is_string($icon) && $icon !== ''): ?>
                <flux:icon :$icon :variant="$iconVariant" class="{!! $iconClasses !!}" />
            <?php else: ?>
                {{ $icon }}
            <?php endif; ?>

            <?php if ($iconDot): ?>
                <div class="absolute top-[-2px] end-[-2px]">
                    <div class="size-[6px] rounded-full bg-zinc-500"></div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($slot->isNotEmpty()): ?>
        <div class="{{ $icon ? 'ms-3' : '' }} flex-1 flex items-center md:gap-2 text-sm font-medium leading-none whitespace-nowrap [[data-nav-footer]_&]:hidden [[data-nav-sidebar]_[data-nav-footer]_&]:block" data-content>{{ $slot }}</div>
    <?php endif; ?>

    <?php if (is_string($iconTrailing) && $iconTrailing !== ''): ?>
        <flux:icon :icon="$iconTrailing" variant="micro" class="size-4 ms-1" />
    <?php elseif ($iconTrailing): ?>
        {{ $iconTrailing }}
    <?php endif; ?>

    <?php if ($badge): ?>
        <flux:navbar.badge :color="$badgeColor" class="ms-2">{{ $badge }}</flux:navbar.badge>
    <?php endif; ?>
</flux:button-or-link>
