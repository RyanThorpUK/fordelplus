<div class="px-8 py-12 bg-[#e5e2dc] h-screen">
        
    <div class="flex justify-between items-center relative  mb-6">
        <div class="flex items-center gap-2">
            <h1 class="text-3xl font-extrabold">Alle tilbud</h1>
        </div>

        <div class="">
            <button class="btn btn--sub-accent" wire:click="$dispatch('openModal', { component: 'modal-edit-offers' })">
                Tilføj nyt tilbud
            </button>
        </div>
    </div>

    <div class="mt-4">
        <div class="">
            <div class="grid grid-cols-4 w-full items-center px-2">
                <div class="px-2 py-1">
                    <span class="text-sm text-gray-500">Tilbuds navn</span>
                </div>
                <div class="px-2 py-1">
                    <span class="text-sm text-gray-500">Start Dato</span>
                </div>
    
                <div class="px-2 py-1">
                    <span class="text-sm text-gray-500">Slut Dato</span>
                </div>
                <div class="px-2 py-1">
                </div>
            </div>
            
            <div class="gap-y-2 flex flex-col">
                @if( $offers->count() )
                    @foreach($offers as $index => $offer)
                        <div class="bg-white px-2 py-4 shadow-sm rounded-md grid grid-cols-4 w-full items-center">
                            <div class="px-2 flex items-center gap-x-2">
                                <img src="{{ Storage::url($offer->image) }}" alt="{{ $offer->name }}" class="w-10 h-10 rounded-md">
                                <span class="font-semibold">{{ $offer->name }}</span>
                            </div>
                            <div class="flex items-center px-2">
                                <span>{{ $offer->start_date->format('d/m/Y') }}</span>
                            </div>
                            <div class="flex items-center px-2">
                                <span>{{ $offer->end_date->format('d/m/Y') }}</span>
                            </div>
                            <div class="flex items-center justify-end gap-x-4 px-2 text-sm">
                                <button class="text-blue-500 flex flex-wrap items-center no-underline cursor-pointer" wire:click="$dispatch('openModal', { component: 'modal-edit-offers',  arguments: {
                                    offer_ulid: '{{ $offer->ulid }}'
                                } })">
                                    Rediger
                                </button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white px-2 py-4 border border-[#E0E5EE] rounded-md grid grid-cols-4 w-full items-center">
                        <div class="px-2">
                            <span>Ingen tilbud endnu</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $offers->links() }}
    </div>
</div>
