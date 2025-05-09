<div class="bg-offset-tan">
    <div class="flex flex-col max-w-7xl mx-auto px-2 sm:px-4">
        <div class="flex flex-col gap-4 w-full">
            
            <div class="js--slide // py-8 sm:py-12 relative">
                
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @foreach ($premiumOffers as $offer)
                            <div class="swiper-slide">
                                <div class="flex flex-col md:flex-row gap-x-0 md:gap-x-8 gap-y-6 bg-[#FCFDFF] inset-shadow-sm rounded-lg overflow-hidden">
                                    <div class="w-full md:w-1/2">
                                        <div class="relative bg-white">
                                            <a href="{{ route('company', $offer->company->ulid) }}">
                                                <img src="{{ asset('storage/' . $offer->company->logo) }}" alt="" class="absolute top-4 left-4 w-16 h-16 sm:w-24 sm:h-24 object-cover rounded-lg shadow-md bg-white">
                                            </a>
                                            <a href="{{ route('offer.show', $offer->ulid) }}">
                                                <img src="{{ asset('storage/' . $offer->image) }}" alt="" class="w-full h-48 sm:h-64 md:h-96 max-w-full md:max-w-[600px] object-cover object-center">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 p-4 sm:p-6 flex flex-wrap items-center">
                                        <div>
                                            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 sm:mb-6">{{ $offer->name }}</h2>
                                            <p class="text-base max-w-xl mb-4 sm:mb-6">{{ Str::limit($offer->description, 180, '...') }}</p>
                                            <a href="{{ route('offer.show', $offer->ulid) }}" class="btn btn--sub-accent inline-flex">Get this offer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>  
                  
                <button class="js--slide-prev // swiper-button-prev drop-shadow-sm -ml-2 sm:-ml-6 bg-white rounded-full !w-8 !h-8 p-0 !text-primary flex items-center justify-center after:content-[''] after:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="!h-6 !w-6 -ml-1.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <button class="js--slide-next // swiper-button-next drop-shadow-sm -mr-2 sm:-mr-6 bg-white rounded-full !w-8 !h-8 p-0 !text-primary flex items-center justify-center after:content-[''] after:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="!h-6 !w-6 -mr-1.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
            
        </div>
    </div>
    {{-- :offers="$offers"  --}}
    <livewire:components.articles-selector />
</div>


