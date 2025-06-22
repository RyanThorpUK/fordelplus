<div class="bg-offset-tan">
    <div class="flex flex-col max-w-screen-2xl mx-auto px-4">
        <div class="flex flex-col ">

            @include('components.layouts.partials.utility-bar')

            <div class="js--slide // relative" data-slides-per-view="1" data-mobile-slides-per-view="1">

                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($premiumOffers as $offer)
                        <div class="swiper-slide ">
                            <div
                                class="flex flex-col md:flex-row gap-x-0 md:gap-x-8 gap-y-6 bg-white rounded-3xl overflow-hidden">
                                <div class="w-full md:w-1/2">
                                    <div class="relative h-full w-full" onclick="Livewire.dispatch('slide-over.open', {component: 'offer-slideover',  arguments: {
                                        offer_ulid: '{{ $offer->ulid }}'
                                    }})">
                                        <img src="{{ asset('storage/' . $offer->image) }}" alt=""
                                            class="w-full h-full max-h-48 sm:max-h-none max-w-full w-full object-cover object-center">
                                        {{-- <span
                                            class="absolute top-4 left-0 bg-primary text-white px-2 py-1 pr-4 text-xl"
                                            style=" clip-path: polygon(0% 0%, 100% 0%, 85% 50%, 100% 100%, 0% 100%);">19%
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 p-4 sm:p-6 flex flex-wrap items-center">
                                    <div>
                                        <p class="text-base !text-gray-500 font-semibold uppercase mb-2">{{
                                            $offer->company->name }}</p>
                                        <h2 class="text-2xl sm:text-3xl md:text-4xl mb-4 sm:mb-6 font-semibold">{{
                                            $offer->name }}</h2>
                                        <button onclick="Livewire.dispatch('slide-over.open', {component: 'offer-slideover',  arguments: {
                                                offer_ulid: '{{ $offer->ulid }}'
                                            }})" class="btn btn--primary inline-flex">Se tilbud</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>

                @if ($premiumOffers->count() > 3)
                <div
                    class="bottom-5 absolute right-2 flex flex-wrap gap-8 md:static md:bottom-auto md:right-auto md:inset-0">
                    <button
                        class="js--slide-prev // swiper-button-prev !relative md:!absolute drop-shadow-sm bg-white rounded-full !w-8 !h-8 md:!w-12 md:!h-12 p-0 !text-grey flex items-center md:-ml-20 justify-center after:content-[''] after:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="!h-6 !w-6 -ml-1.5">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <button
                        class="js--slide-next // swiper-button-next !relative md:!absolute drop-shadow-sm bg-white rounded-full !w-8 !h-8 md:!w-12 md:!h-12 p-0 !text-grey flex items-center md:-mr-20 justify-center after:content-[''] after:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="!h-6 !w-6 -mr-1.5">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
                @endif
            </div>

        </div>
    </div>

    @foreach ($paginatedOffers as $category)
    @if ( $category['offers']->count() > 0)
    <div class="js--slide //  max-w-screen-2xl mx-auto {{ $loop->first ? 'pt-8' : 'pt-0' }} pb-8 px-4 md:pt-9 md:pb-9"
        data-slides-per-view="3" data-mobile-slides-per-view="2.5">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex w-full items-center justify-between mb-4">
                <h3 class="text-2xl font-semibold">{{ $category['name'] }}</h3>

                @if ($category['offers']->count() > 3)
                <div class="flex gap-12 items-center">
                    <button
                        class="js--slide-prev // swiper-button-prev !relative drop-shadow-sm bg-white rounded-full !w-7 !h-7 p-0 !text-[#3E3E3E] flex items-center justify-center after:content-[''] after:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="!h-5 !w-5 -ml-1.5">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <button
                        class="js--slide-next // swiper-button-next !relative drop-shadow-sm bg-white rounded-full !w-7 !h-7 p-0 !text-[#3E3E3E] flex items-center justify-center after:content-[''] after:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="!h-5 !w-5 -mr-1.5">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
                @endif
            </div>

            <div class="w-full">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper px-1">
                        @foreach ($category['offers'] as $offer)
                        <div class="swiper-slide">
                            @livewire('components.offer', [
                            'offer' => $offer,
                            'userFavourites' => auth()->check() ? auth()->user()->favourites()->get() : false
                            ])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endif
    @endforeach

    <div class="max-w-screen-2xl mx-auto px-4 pb-12">
        <div class="border-t border-t-black py-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-primary--500 cursor-pointer">Log ud</button>
            </form>
        </div>
        {{-- :offers="$offers" --}}
        {{--
        <livewire:components.articles-selector /> --}}
    </div>
</div>