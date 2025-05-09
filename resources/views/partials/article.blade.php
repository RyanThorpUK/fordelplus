<article class="js--offer // p-2 md:p-0 flex flex-wrap md:block md:flex-nowrap bg-white rounded-2xl overflow-hidden border border-gray-200 w-full" data-category="{{ $offer->category_id }}" wire:key="offer-{{ $offer->ulid }}">
    <div class="relative w-1/3 md:w-full">
        <a href="{{ route('offer.show', $offer->ulid) }}">
            <img src="{{ Storage::url($offer->image) }}" alt="" class="w-full h-full overflow-hidden rounded-xl md:h-48 md:rounded-none object-cover">
        </a>
        <div class="bg-white w-16 h-16 flex-shrink-0 shadow-lg md:border-3 border-white overflow-hidden rounded-xl -mt-10 absolute md:top-full md:bottom-auto md:left-4 left-2 bottom-2">
            <a href="{{ route('company', $offer->company->ulid) }}" class="relative z-10">
                <img src="{{ Storage::url($offer->company->logo) }}" alt="" class="w-full h-full object-contain object-center">
            </a>
        </div>
    </div>
    <div class="w-2/3 md:w-full relative p-4 md:pt-12 flex md:flex-col items-center md:items-start gap-2">
        {{-- <span class="text-sm text-gray-500">
            {{ $offer->tag }}
        </span> --}}
        <h2 class="text-base md:text-lg font-semibold">
            <a href="{{ route('offer.show', $offer->ulid) }}" class="">{{ $offer->name }}</a>
        </h2>
        <div> 
            <a href="{{ route('offer.show', $offer->ulid) }}" class="bg-black text-white text-sm rounded-2xl px-3 py-1  hidden md:inline-block">
                {{ $offer->link_text ?? 'Se tilbud' }}
            </a>

            <a href="{{ route('offer.show', $offer->ulid) }}" class="bg-[#F9FAFE] text-white text-sm rounded-2xl w-6 h-6 flex items-center justify-center block md:hidden absolute bottom-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>
</article>