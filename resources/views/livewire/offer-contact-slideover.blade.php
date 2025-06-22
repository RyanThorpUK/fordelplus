<div class="px-6 md:px-10 gap-12 h-full relative">
    <div class="flex flex-wrap justify-between">
        <div class="flex gap-4 items-center">
            <button
                class="rounded-full bg-white flex justify-center items-center w-10 h-10 border border-gray-200 shadow-sm cursor-pointer"
                wire:click="$dispatch('slide-over.close')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </button>
            <h2 class="text-2xl font-semibold">Bliv kontaktet</h2>
        </div>
        <button
            class="rounded-full bg-white flex justify-center items-center w-10 h-10 border border-gray-200 shadow-sm cursor-pointer"
            wire:click="$dispatch('slide-over.close', { force: true })">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <div class="flex flex-wrap ustify-between">
        <p class="text-base text-black my-8">
            Udfyld formularen herunder, så kontakter Spies Rejser jer vedr. forretningsrejse
        </p>
    </div>
    <form wire:submit.prevent="submitForm" class="w-full">
        <div class="flex flex-wrap gap-4 w-full">
            @if ( $offer->offer_fields && in_array('name', $offer->offer_fields))
            <div class="w-full">
                <label class="text-sm font-medium text-black block line-height-1">Navn <span
                        class="text-red-500">*</span></label>
                <input type="text" wire:model="name"
                    class="mt-1 w-full rounded-md bg-white border border-gray-200 shadow-sm p-2 @error('name') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            @endif
            <div class="w-full">
                <label class="text-sm font-medium text-black block line-height-1">Email <span
                        class="text-red-500">*</span></label>
                <input type="email" wire:model="email"
                    class="mt-1 w-full rounded-md bg-white border border-gray-200 shadow-sm p-2 @error('email') border-red-500 @enderror">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            @if ( $offer->offer_fields && in_array('phone', $offer->offer_fields))
            <div class="w-full">
                <label class="text-sm font-medium text-black block line-height-1">Telefon <span
                        class="text-red-500">*</span></label>
                <input type="tel" wire:model="phone"
                    class="mt-1 w-full rounded-md bg-white border border-gray-200 shadow-sm p-2 @error('phone') border-red-500 @enderror">
                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            @endif
            @if ( $offer->offer_fields && in_array('company_name', $offer->offer_fields))
            <div class="w-full">
                <label class="text-sm font-medium text-black block line-height-1">Virksomhed <span
                        class="text-red-500">*</span></label>
                <input type="text" wire:model="company_name"
                    class="mt-1 w-full rounded-md bg-white border border-gray-200 shadow-sm p-2 @error('company_name') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            @endif
            @if ( $offer->offer_fields && in_array('message', $offer->offer_fields))
            <div class="w-full">
                <label class="text-sm font-medium text-black block line-height-1">Besked <span
                        class="text-red-500">*</span></label>
                <textarea wire:model="message"
                    class="mt-1 w-full rounded-md bg-white border border-gray-200 shadow-sm p-2 @error('message') border-red-500 @enderror"></textarea>
                @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            @endif

        </div>

        <div class="mt-12 px-10 absolute bottom-0 left-0 right-0 flex gap-4">
            <button class="btn btn--accent flex items-center justify-center w-full text-center h-12" wire:click="$dispatch('slide-over.open', { component: 'offer-contact-slideover',  arguments: {
                offer_ulid: '{{ $offer->ulid }}'
            }})">
                Send forespørgsel
            </button>
        </div>
    </form>
</div>