<article>
    <div class="relative">
        <button class="relative w-full cursor-pointer" onclick="Livewire.dispatch('slide-over.open', {component: 'offer-slideover',  arguments: {
            offer_ulid: '{{ $offer->ulid }}'
        }})">
            <img class="rounded-2xl md:rounded-3xl w-full object-cover {{ $classes['image'] ?? 'h-28 md:h-72' }}" src="{{ asset('storage/' . $offer->image) }}"
                alt="">
        </button>
        <span class="text-sm md:text-xl absolute top-4 -left-1 bg-[#DD803E] text-white px-2 py-1 drop-shadow-sm pr-4"
            style=" clip-path: polygon(0% 0%, 100% 0%, 85% 50%, 100% 100%, 0% 100%);">
            @if ( $offer->highlight )
                {{ $offer->highlight }}{{ $offer->highlight_type === 'price' ? 'Kr.' : '%' }}
            @else
                kontakt
            @endif
        </span>
        <a href="{{ route('company.show', $offer->company->ulid) }}"
            class="absolute -bottom-2 md:-bottom-10 right-4 md:right-6 xl:right-10 flex items-center justify-center bg-white rounded-xl md:rounded-3xl text-white border-2 border-white lg:border-5 text-xl drop-shadow-sm overflow-hidden">
            <img class="h-12 w-12 md:h-16 md:w-16 xl:h-20 xl:w-20 object-contain" src="{{ asset('storage/' . $offer->company->logo) }}"
                alt="">
        </a>
        <button class="hidden md:block absolute top-6 right-6 text-white text-sm gap-1 cursor-pointer" wire:click="toggleFavorite">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-heart {{ $isFavourited ? 'fill-white' : '' }}">
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
            </svg>
        </button>
    </div>
    <div class="pt-4">
        <h3 class="{{ $classes['title'] ?? 'px-2 font-semibold text-sm md:text-lg max-w-[260px] xl:max-w-xs' }}">{{ $offer->name }}</h3>
        <p class="text-base px-2 text-gray-500 mt-2">{{ $offer->company->name }}</p>
        @if (isset($components['description']))
            <p class="mt-4 {{ $classes['description'] ?? 'text-gray-500 text-base' }}">{{ Str::limit($offer->description, 100) }}</p>
        @endif

        @if (isset($components['company']))
            <a class="text-xs md:text-sm text-gray-500 mt-6" href="{{ route('company.show', $offer->company->ulid) }}">{{
                $offer->company->name }}</a>
        @endif

        @if (isset($components['offer_link']))
            <a class="btn btn--primary inline-block mt-6" href="{{ route('offer.show', $offer->ulid) }}">Se tilbud</a>
        @endif

    </div>
</article>