<div class="">
        <div class="rounded-lg bg-white p-8">
            <h2 class="text-primary text-sm mb-4">Rediger tilbud</h2>
    
            <form class="flex flex-col gap-4" wire:submit.prevent>
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label for="offer-image" class="w-full h-48 block relative rounded-md bg-white border border-primary p-2">
                            <input type="file" id="offer-image" wire:model="offerImage">
                            @if ($offerImage)
                                <img src="{{ Storage::url($offerImage) }}" alt="Offer image" class="w-24 h-24 object-cover rounded-md">
                            @endif
                            <span class="btn btn--primary left-2 bottom-2 absolute" >{{ $offerImage ? 'Skift billede' : 'Upload billede' }}</button>
                        </label>
                    </div>
                </div>
    
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="text-sm font-medium text-primary block line-height-1">Tilbuds title <span class="text-red-500">*</span></label>
                        @error('offerName') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <input 
                            type="text" 
                            wire:model="offerName" 
                            class="mt-1 w-full rounded-md bg-white border border-primary p-2 @error('offerName') border-red-500 @enderror">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <label class="text-sm w-full block font-medium text-primary">Start Dato <span class="text-red-500">*</span></label>
                        @error('offerStartDate') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <input 
                            type="date" 
                            wire:model="offerStartDate" 
                            class="mb-1 mt-1 w-full rounded-md bg-white border border-primary p-2 @error('offerStartDate') border-red-500 @enderror">
                    </div>
                    <div class="">
                        <label class="text-sm w-full block font-medium text-primary">Slut Dato <span class="text-red-500">*</span></label>
                        @error('offerEndDate') 
                            <span class="text-red-500 text-xs ">{{ $message }}</span>
                        @enderror
                        <input 
                            type="date" 
                            wire:model="offerEndDate" 
                            class="w-full mt-1 rounded-md bg-white border border-primary p-2 @error('offerEndDate') border-red-500 @enderror">
                        
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="text-sm font-medium text-primary block">Hvem skal se det? <span class="text-red-500">*</span></label>
                        @error('offerUserType') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <div class="flex mt-2 gap-4">
                            <div>
                                <div class="flex cursor-pointer flex-col items-center justify-center transition-transform duration-150 hover:border-blue-400">
                                    <label class="relative flex cursor-pointer items-center justify-center text-xs text-primary peer-checked:text-primary" for="b2b">
                                        <input class="peer sr-only" wire:model="offerUserType" value="b2b" name="user-type" id="b2b" type="radio" />
                                        <span class="w-4 h-4 rounded-sm bg-offset-tan mr-2 text-white peer-checked:after:content-[''] peer-checked:after:absolute peer-checked:after:top-0.5 peer-checked:after:left-0.5 peer-checked:after:w-3 peer-checked:after:h-3 peer-checked:after:bg-primary peer-checked:after:rounded-sm text-center"></span>
                                        B2B Brugere
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="flex cursor-pointer flex-col items-center justify-center transition-transform duration-150 hover:border-blue-400">
                                    <label class="relative flex cursor-pointer items-center justify-center text-xs text-primary peer-checked:text-primary" for="b2c">
                                        <input class="peer sr-only" wire:model="offerUserType" value="b2c" name="user-type" id="b2c" type="radio" />
                                        <span class="w-4 h-4 rounded-sm bg-offset-tan mr-2 text-white peer-checked:after:content-[''] peer-checked:after:absolute peer-checked:after:top-0.5 peer-checked:after:left-0.5 peer-checked:after:w-3 peer-checked:after:h-3 peer-checked:after:bg-primary peer-checked:after:rounded-sm text-center"></span>
                                        B2C Brugere
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="text-sm font-medium text-primary mb-1 block">Vælg emne? <span class="text-red-500">*</span></label>
                        @error('offerCategory') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <select name="" id="" wire:model="offerCategory" class="w-full rounded-md bg-white border border-primary p-2 @error('offerCategory') border-red-500 @enderror">
                            <option value="">Vælg emne</option>
                            @foreach ($offerCategories as $categoryParent)
                                <optgroup label="{{ $categoryParent->name }}">
                                @foreach ($categoryParent->children as $categoryChild)
                                    <option @if($offerCategory == $categoryChild->id) selected @endif value="{{ $categoryChild->id }}">{{ $categoryChild->name }}</option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mt-2">
                    <div class="col-span-2 rounded-lg bg-offset-tan">
                        <div class="flex flex-wrap gap-4 px-4 pt-4">
                            <div 
                            @class([
                                'cursor-pointer rounded-2xl px-4 py-1 sm:px-6 no-underline bg-primary text-white hover:bg-primary hover:text-white transition-colors ease-in-out duration-300 text-sm',
                                'text-sub-accent' => $offerType === 'discount-code',
                                'text-[#3e82c7]' => $offerType !== 'discount-code',
                                'bg-[#FAFAFC]' => $offerType === 'discount-code',
                                'bg-primary' => $offerType !== 'discount-code',
                            ])
                            wire:click='selectOfferType("discount-code")'>
                            Rabat kode
                            </div>
                            <div 
                            @class([
                                'cursor-pointer rounded-2xl px-4 py-1 sm:px-6  no-underline bg-primary text-white hover:bg-primary hover:text-white transition-colors ease-in-out duration-300 text-sm',
                                'underline' => $offerType === 'contact-form',
                                'text-sub-accent' => $offerType === 'contact-form',
                                'text-[#3e82c7]' => $offerType !== 'contact-form',
                                'bg-[#FAFAFC]' => $offerType === 'contact-form',
                                'bg-primary' => $offerType !== 'contact-form',
                            ]) wire:click='selectOfferType("contact-form")'>
                                Kontakt form
                            </div>
                        </div>
                        @if ($offerType === 'discount-code')
                        <div class="grid grid-cols-2 p-4 gap-4">
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-primary mb-1 block">Rabat kode</label>
                                @error('offerCode') 
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                                <input 
                                    type="text" 
                                    wire:model="offerCode" 
                                    class="w-full rounded-md bg-white border border-[#EEEEEE] p-2 @error('offerCode') border-red-500 @enderror">
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-primary mb-1 block">Link til hjemmeside</label>
                                @error('offerLink') 
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                                <input 
                                    type="text" 
                                    wire:model="offerLink" 
                                    class="w-full rounded-md bg-white border border-[#EEEEEE] p-2 @error('offerLink') border-red-500 @enderror">
                            </div>
                            <div class="col-span-2 flex flex-col">
                                <label class="text-sm font-medium text-primary mb-1 block">Beskrivelse</label>
                                @error('offerDescription') 
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                                {{ $offerDescription }}
                                
                            </div>
                        </div>
                        @else
                        <div class="grid grid-cols-2 p-4">
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-primary mb-1 block">Email</label>
                                @error('offerEmail') 
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                                <input type="text" id="email" wire:model="offerEmail" class="w-full rounded-md bg-white border border-[#EEEEEE] p-2 @error('offerEmail') border-red-500 @enderror">
                            </div>
                            <div class="col-span-2 flex flex-col gap-2 my-2">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" wire:model="phoneField" class="sr-only peer">
                                    <div class="relative w-7 h-3.5 bg-[#F6F6F6] border-[#F1F1F1] border peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:left-[4px] peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[1px]  after:start-[1px] after:bg-black after:border-gray-300 after:border after:rounded-full after:h-2.5 after:w-2.5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium">Telefon felt</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" wire:model="messageField" class="sr-only peer">
                                    <div class="relative w-7 h-3.5 bg-[#F6F6F6] border-[#F1F1F1] border peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:left-[4px] peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[1px]  after:start-[1px] after:bg-black after:border-gray-300 after:border after:rounded-full after:h-2.5 after:w-2.5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium">Besked felt</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" wire:model="companyNameField" class="sr-only peer">
                                    <div class="relative w-7 h-3.5 bg-[#F6F6F6] border-[#F1F1F1] border peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:left-[4px] peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[1px]  after:start-[1px] after:bg-black after:border-gray-300 after:border after:rounded-full after:h-2.5 after:w-2.5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium">Firma navn felt</span>
                                </label>
  
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-primary mb-2 block">Beskrivelse</label>
                                @error('offerDescription') 
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                                <textarea 
                                    wire:model="offerDescription"
                                    data-model="offerDescription" 
                                    class="js--wysiwyg // w-full rounded-md bg-white border border-[#EEEEEE] p-2 @error('offerDescription') border-red-500 @enderror"
                                >{{ $offerDescription }}</textarea>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="flex gap-4 mt-4">
                    <div class="flex gap-4">
                        <button type="button" class="btn btn--sub-accent" wire:click='update'>Gem tilbud</button>
                        @if($offer)
                        <button 
                            type="button" 
                            class="btn btn--transparent text-red-500 text-sm" 
                            wire:click="deleteOffer"
                            wire:confirm="Are you sure you want to delete this offer?"
                        >
                            Slet tilbud
                        </button>
                        @endif
                    </div>
                    <button type="button" class="btn btn--primary" wire:click="$dispatch('closeModal')">Luk</button>
                </div>
            </form>
        </div>
</div>
