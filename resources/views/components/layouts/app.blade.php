<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{ $slot }}
    </flux:main>

    <div class="hidden sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl"></div>
</x-layouts.app.sidebar>
@livewire('wire-elements-modal')
