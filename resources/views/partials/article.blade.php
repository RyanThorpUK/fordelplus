<article class="js--offer // flex flex-wrap md:block md:flex-nowrap bg-white rounded-2xl overflow-hidden border border-gray-200 w-full" data-category="{{ $offer->category_id }}" wire:key="offer-{{ $offer->ulid }}">
    <div class="relative w-1/3 md:w-full">
        <a href="{{ route('offer.show', $offer->ulid) }}">
            <img src="{{ Storage::url($offer->image) }}" alt="" class="w-full h-full overflow-hidden md:h-48 object-cover">
        </a>
        <div class="bg-white w-16 h-16 flex-shrink-0 shadow-lg md:border-3 border-white overflow-hidden rounded-xl -mt-10 absolute md:top-full md:bottom-auto md:left-4 left-0 bottom-0">
            <a href="{{ route('company', $offer->company->ulid) }}" class="relative z-10">
                <img src="{{ Storage::url($offer->company->logo) }}" alt="" class="w-full h-full object-contain object-center">
            </a>
        </div>
    </div>
    <a href="{{ route('offer.show', $offer->ulid) }}" class="w-2/3 md:w-full relative p-4 md:pt-10 flex flex-col md:items-center md:items-start gap-2">
        {{-- <span class="text-sm text-gray-500">
            {{ $offer->tag }}
        </span> --}}
        <h2 class="text-base text-primary md:text-lg md:text-center font-semibold w-full">
            {{ $offer->name }}
        </h2>
        <p class="text-sm md:text-center">
            {{ $offer->shortDescription(50) }}
        </p>
    </a>
</article>