<div class="bg-offset-tan">
    <div class="relative">
        <div class="bg-[#d0cbc0] absolute top-0 left-0 right-0 h-[70%] md:h-full w-full"></div>
        <div class="flex flex-col max-w-7xl mx-auto pt-16 sm:pt-28 pb-6 sm:pb-8 relative px-2 sm:px-4 ">

            <div class="order-2 md:order-1 bg-white rounded-3xl w-full sm:max-w-md md:max-w-lg lg:max-w-sm mx-auto md:absolute top-8 sm:top-16 right-0 shadow-lg">
                <div class="relative">
                    <button wire:click="toggleFavorite" class="absolute top-4 right-4 text-primary text-sm px-2 py-1 bg-white rounded-xl drop-shadow-md flex flex-wrap items-center gap-1 cursor-pointer">
                        {{-- {{ $isFavourited ? 'Fjern' : 'Gem' }} --}}
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="{{ $isFavourited ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"> --}}
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </button>
                    <div class="rounded-tr-3xl rounded-tl-3xl overflow-hidden h-40 sm:h-48">
                        <img src="{{ Storage::url($company->image) }}" alt="" class="w-full h-full object-cover object-center" />
                    </div>
                </div>
                <div class="p-6 flex flex-col gap-2">
                    <div class="js--offer-claim-form">
                        <form wire:submit.prevent="submitForm" class="flex flex-col gap-2">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="">
                                    <label class="text-xs font-medium text-primary block line-height-1">Navn <span class="text-red-500">*</span></label>
                                    <input type="text" wire:model="name" class="mt-1 w-full rounded-md bg-[#E5E2DC] p-2 @error('name') border-red-500 @enderror" placeholder="Navn">
                                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                                <div class="">
                                    <label class="text-xs font-medium text-primary block line-height-1">Varenavn <span class="text-red-500">*</span></label>
                                    <input type="text" wire:model="product_name" class="mt-1 w-full rounded-md bg-[#E5E2DC] p-2 @error('product_name') border-red-500 @enderror" placeholder="Varenavn">
                                    @error('product_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="">
                                <label class="text-xs font-medium text-primary block line-height-1">Email <span class="text-red-500">*</span></label>
                                <input type="email" wire:model="email" class="mt-1 w-full rounded-md bg-[#E5E2DC] p-2 @error('email') border-red-500 @enderror" placeholder="Email">
                                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="">
                                <label class="text-xs font-medium text-primary block line-height-1">Telefon <span class="text-red-500">*</span></label>
                                <input type="tel" wire:model="phone" class="mt-1 w-full rounded-md bg-[#E5E2DC] p-2 @error('phone') border-red-500 @enderror" placeholder="Telefon">
                                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <button type="submit" class="bg-sub-accent text-primary text-sm px-8 py-2 rounded-md border-2 border-sub-accent w-auto mt-2 cursor-pointer">
                                    Få rabatten
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="order-1 flex  items-center gap-4 mb-12 md:mb-0 md:order-2 gap-4 mt-4 sm:mt-8 ">

                <div class="bg-white w-32 h-32 flex-shrink-0 shadow-lg md:border-3 border-white overflow-hidden rounded-xl">
                    <a href="{{ route('company', $company->ulid) }}" class="relative z-10">
                        <img src="{{ Storage::url($company->logo) }}" alt="" class="w-full h-full object-contain object-center">
                    </a>
                </div>

                <h1 class="text-2xl sm:text-4xl font-semibold max-w-2xl text-primary">
                    {{ $company->name }}
                </h1>
            </div>
        </div>
    </div>

    <div class="flex flex-col max-w-7xl mx-auto pt-6 sm:pt-8 pb-8 sm:pb-16 px-2 sm:px-4 md:min-h-[320px] ">
        <div class="flex flex-col gap-4">
            <div class="max-w-xl flex flex-wrap">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="">
                        <a href="" class="flex items-center gap-2 text-primary text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> 
                            {{ $company->email ?? 'info@kontakt.dk' }}
                        </a>
                    </div>
                    <div class="">
                        <a href="" class="flex items-center gap-2 text-primary text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            {{ $company->phone ?? '+45 12 34 56 78' }}
                        </a>
                    </div>
                </div>

                <div class="order-2 mt-6 md:mb-0 md:order-1 w-full">
                    <p>
                        {{ $company->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-offset-tan">
        <div class="flex flex-col max-w-7xl w-full mx-auto py-8 sm:pb-16 px-2 sm:px-4">
            <div class="w-full flex flex-col gap-4">
                @foreach ($offers as $offer)
                    <div class="w-full bg-white px-6 sm:p-6 rounded-2xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="">
                            <span class="block w-full">{{ $offer->name }}</span>
                            <span class="">{{ $offer->description }}</span>
                        </div>
                        <div class="flex flex-wrap gap-2 sm:gap-4 items-center">
                            <button wire:click="$dispatch('openModal', { component: 'modal-offer', arguments: {
                                    offer_ulid: '{{ $offer->ulid }}'
                                } })" 
                            class="btn btn--sub-accent text-xs sm:text-sm">Få rabatten</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <livewire:components.articles-selector title="Relaterede tilbud" />

</div>