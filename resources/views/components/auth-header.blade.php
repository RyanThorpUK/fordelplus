@props([
    'title',
    'description',
])

<div class="flex w-full flex-col ">
    <flux:heading size="xl" class="text-grey text-center">{{ $title }}</flux:heading>
    {{-- <flux:subheading>{{ $description }}</flux:subheading> --}}
</div>
