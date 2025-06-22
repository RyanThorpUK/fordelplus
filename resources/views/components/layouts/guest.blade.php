<x-layouts.app.header :title="$title ?? null">
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.header>
@livewire('wire-elements-modal')
@livewire('slide-over-pro')