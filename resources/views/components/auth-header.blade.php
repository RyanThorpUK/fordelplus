@props([
    'title',
    'description',
])

<div class="flex w-full flex-col ">
    <flux:heading size="xl" class="text-primary">{{ $title }}</flux:heading>
    {{-- <flux:subheading>{{ $description }}</flux:subheading> --}}
</div>
