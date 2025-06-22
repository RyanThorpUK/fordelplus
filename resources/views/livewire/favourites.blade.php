<div class="bg-offset-tan py-12">
    <div class="flex flex-col max-w-screen-2xl mx-auto px-4 relative z-10">
        <div class="flex flex-col ">
            <h1 class="text-5xl font-semibold text-black mb-12">Favoritter</h1>

            @if ( $favourites->count() > 0 )
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8">
                @foreach ($favourites as $offer)
                @livewire('components.offer', [
                    'offer' => $offer,
                    'classes' => ['image' => 'h-62 md:h-72', 'title' => 'px-2 text-base md:text-lg font-semibold', 'description' => 'px-2 text-base'],
                    'components' => ['offer_link' => true, 'description' => true],
                    'userFavourites' => true
                ])
                @endforeach
            </div>
            @else
            <div class="flex flex-col items-center justify-center h-full">
                <h2 class="text-2xl font-semibold">Ingen favoritter</h2>
            </div>
            @endif
        </div>
    </div>
</div>