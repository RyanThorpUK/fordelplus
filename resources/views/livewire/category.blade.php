<div class="bg-offset-tan py-12">
    <div class="flex flex-col max-w-screen-2xl mx-auto px-2 sm:px-4 relative z-10">
        <div class="flex flex-col ">
            
            @include('components.layouts.partials.utility-bar')
            
            <h1 class="text-5xl font-semibold text-black mb-12">{{ $category->name }}</h1>

            
            {{-- <div class="js--slide // relative" data-slides-per-view="1">

                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($premiumOffers as $offer)
                        <div class="swiper-slide ">
                            <div
                                class="flex flex-col md:flex-row gap-x-0 md:gap-x-8 gap-y-6 bg-offset-tan-600  rounded-3xl overflow-hidden">
                                <div class="w-full md:w-1/2">
                                    <div class="relative">
                                        <a href="{{ route('offer.show', $offer->ulid) }}">
                                            <img src="{{ asset('storage/' . $offer->image) }}" alt=""
                                                class="w-full h-48 sm:h-64 md:h-96 max-w-full w-full object-cover object-center">
                                            <span
                                                class="absolute top-4 left-0 bg-primary text-white px-2 py-1 pr-4 text-xl"
                                                style=" clip-path: polygon(0% 0%, 100% 0%, 85% 50%, 100% 100%, 0% 100%);">19%
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 p-4 sm:p-6 flex flex-wrap items-center">
                                    <div>
                                        <h2 class="text-2xl sm:text-3xl md:text-4xl mb-4 sm:mb-6">{{ $offer->name }}
                                        </h2>
                                        <p class="text-base max-w-xl mb-4 sm:mb-6">{{ Str::limit($offer->description,
                                            180, '...') }}</p>
                                        <a href="{{ route('offer.show', $offer->ulid) }}"
                                            class="btn btn--primary inline-flex">Se tilbud</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>

                @if ($premiumOffers->count() > 3)
                    <button
                        class="js--slide-prev // swiper-button-prev drop-shadow-sm bg-white rounded-full !w-12 !h-12 p-0 !text-grey flex items-center -ml-22 justify-center after:content-[''] after:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="!h-6 !w-6 -ml-1.5">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <button
                        class="js--slide-next // swiper-button-next drop-shadow-sm bg-white rounded-full !w-12 !h-12 p-0 !text-grey flex items-center -mr-22 justify-center after:content-[''] after:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="!h-6 !w-6 -mr-1.5">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                @endif
            </div> --}}

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8">
                @foreach ($offers as $offer)
                    @livewire('components.offer', [
                    'offer' => $offer,
                    'userFavourites' => true
                    ])
                @endforeach
            </div>
        </div>
    </div>
</div>