<div class="bg-offset-tan">

    <div class="">
        <div class="relative">
            <div class="bg-[#d0cbc0] absolute top-0 left-0 right-0 h-[70%] md:h-full w-full"></div>
            <div class="flex flex-col max-w-7xl mx-auto pt-16 sm:pt-28 pb-6 sm:pb-8 relative px-2 sm:px-4">

                <div class="order-2 md:order-1 bg-white border-6 border-white rounded-3xl w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-sm mx-auto md:absolute top-8 sm:top-16 right-0 shadow-lg">
                    <div class="relative">
                        <button wire:click="toggleFavorite" class="absolute top-4 right-4 text-sub-accent text-sm px-2 py-1 bg-white rounded-xl drop-shadow-md flex flex-wrap items-center gap-1 cursor-pointer">
                            {{ $isFavourited ? 'Fjern' : 'Gem' }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="{{ $isFavourited ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                        </button>
                        <div class="rounded-tr-3xl rounded-tl-3xl overflow-hidden h-40 sm:h-48">
                            <img src="{{ Storage::url($offer->image) }}" alt="" class="w-full h-full object-cover object-center" />
                        </div>
                    </div>
                    <div class="p-3 flex flex-col gap-2">
                        <div class="flex flex-row justify-between gap-2 sm:gap-6">
                           <div class="text-sm">
                            Tilbud slutter
                            </div>
                            <div class="text-sub-accent text-sm flex items-center gap-2 sm:gap-4">
                                {{ $offer->end_date->format('d/m/Y') }}
                                <span class="inline-block text-sub-accent px-4 py-1 bg-white rounded-2xl drop-shadow-md">
                                    {{ $this->getTimeRemaining($offer->end_date) }}
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            @if ($offer->offer_type === 'discount-code')
                                <button class="js--offer-reveal // cursor-pointer bg-sub-accent text-white px-4 py-2 rounded-md border-2 border-sub-accent">
                                    Brug Tilbud
                                </button>
                                <div class="hidden relative js--offer-code">
                                    <button type="text" class="js--offer-code-btn // relative bg-white text-sub-accent font-semibold px-4 py-2 rounded-md border-2 border-sub-accent text-center w-full" value="{{ $offer->offer_code }}"> <span class="js--offer-code-value">{{ $offer->offer_code }}</span> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute top-1/2 right-4  -translate-y-1/2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    </button>
                                    <div class="js--offer-code-copied // hidden bg-sub-accent text-white px-4 py-2 border-2 border-sub-accent text-center absolute mt-2 left-1/2 -translate-x-1/2">
                                        <span class="w-4 h-4 absolute bg-sub-accent transform rotate-45 left-1/2 -translate-x-1/2 top-0 -translate-y-1/2 -mt-[2px]"></span>
                                        Copied
                                    </div>
                                </div>
                                <a href="{{ $offer->offer_link }}" target="_blank" class="bg-[#F9FAFE] text-center text-sub-accent px-4 py-2 rounded-md block mt-2">
                                    Gå til hjemmeside
                                </a>
                                {{-- <a href="#" class="text-center text-sm text-[#bdbdbd] underline block mt-1">
                                    Read terms and conditions
                                </a> --}}
                            @else
                                <div class="js--offer-claim-form">
                                    @if($formSubmitted)
                                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                                            Tak for din henvendelse. Vi vil kontakte dig hurtigst muligt.
                                        </div>
                                    @else
                                        <form wire:submit.prevent="submitForm" class="flex flex-col gap-2">
                                            @if ( $offer->offer_fields && in_array('company_name', $offer->offer_fields))
                                            <div class="">
                                                <label class="text-sm font-medium text-black block line-height-1">Name <span class="text-red-500">*</span></label>
                                                <input type="text" wire:model="name" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('name') border-red-500 @enderror" placeholder="Name">
                                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            @endif
                                            <div class="">
                                                <label class="text-sm font-medium text-black block line-height-1">Email <span class="text-red-500">*</span></label>
                                                <input type="email" wire:model="email" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('email') border-red-500 @enderror" placeholder="Email">
                                                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            @if ( $offer->offer_fields && in_array('phone', $offer->offer_fields))
                                            <div class="">
                                                <label class="text-sm font-medium text-black block line-height-1">Phone <span class="text-red-500">*</span></label>
                                                <input type="tel" wire:model="phone" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('phone') border-red-500 @enderror" placeholder="Phone">
                                                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            @endif
                                            @if ( $offer->offer_fields && in_array('message', $offer->offer_fields))
                                            <div class="">
                                                <label class="text-sm font-medium text-black block line-height-1">Besked <span class="text-red-500">*</span></label>
                                                <textarea wire:model="message" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('message') border-red-500 @enderror" placeholder="Message"></textarea>
                                                @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            @endif
                                            <button type="submit" class="bg-sub-accent text-white font-semibold px-4 py-2 rounded-md border-2 border-sub-accent mt-2">
                                                Send
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="order-1 mb-12 md:mb-0 md:order-2 flex flex-col gap-4 mt-4 sm:mt-8">
                    <ul class="flex flex-wrap gap-2">
                        @foreach ($breadcrumbs as $breadcrumb)
                            <li class="text-xs sm:text-sm text-white bg-primary py-1 rounded-md">
                                {!! isset($breadcrumb['url']) ? '<a href="' . $breadcrumb['url'] . '">' . $breadcrumb['name'] . '</a>' : $breadcrumb['name'] !!}
                            </li>
                            @if (!$loop->last)
                                <li class="text-xs sm:text-sm text-white bg-primary py-1 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <h1 class="text-2xl sm:text-4xl font-semibold max-w-2xl text-white">
                        {{ $offer->name }}
                    </h1>
                </div>
            </div>
        </div>
    
        <div class="flex flex-col max-w-7xl mx-auto pt-6 sm:pt-8 pb-8 sm:pb-16 px-2 sm:px-4 @if ($offer->offer_type === 'contact-form') md:min-h-[475px] @endif">
            <div class="flex flex-col gap-4">
                <div class="max-w-xl flex flex-wrap">
                    <div class="order-2 mt-6 md:mb-0 md:order-1 w-full">
                        <p>
                            {{ $offer->description }}
                        </p>
                    </div>
                    <div class="order-1 md:order-2 w-full mt-6 sm:mt-8">
                        <div class="flex flex-wrap md:flex-nowrap gap-4 bg-[#F9FAFE] rounded-lg p-4">
                            <div class="col-span-1">
                                <img src="{{ Storage::url($offer->company->logo) }}" alt="" class="h-12 w-12 sm:h-16 sm:w-16 object-cover rounded-lg shadow-md bg-white">
                            </div>
                            <div class="md:col-span-2 flex flex-col justify-center ">
                                <span class="text-xs sm:text-sm text-primary font-semibold block">{{ $offer->company->name }}</span>
                                <a href="{{ route('company', $offer->company->ulid) }}" class="flex flex-wrap items-center gap-1 text-xs sm:text-sm text-sub-accent block">
                                    Gå til virksomhedsside
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @if ($companyOffers->count() > 0)
        <div class="flex flex-col max-w-7xl w-full mx-auto py-8 sm:py-16 px-2 sm:px-4">
            <div class="flex w-full flex-col gap-4">

                <div class="flex flex-wrap items-center gap-2">
                    <h2 class="text-lg sm:text-xl font-semibold">
                        Andre tilbud fra {{ $offer->company->name }}
                    </h2>
                    <a href="{{ route('company', $offer->company->ulid) }}" class="text-xs sm:text-sm text-primary underline ml-4">
                        Gå til deres side
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($companyOffers as $offer)
                        @include('partials.article', ['article' => $offer])
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    
    @if ($relatedOffers->count() > 0)
        <livewire:components.articles-selector title="Relaterede tilbud" :offers="$relatedOffers" />
    @endif
</div>