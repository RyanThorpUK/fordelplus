<div class="">
        <div class="rounded-lg bg-white p-8 max-w-md">
            <h2 class="text-black font-bold text-base">Edit offer</h2>
    
            <form class="flex flex-col gap-2" wire:submit.prevent>
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label for="offer-image" class="w-full h-48 block relative rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2">
                            <input type="file" id="offer-image" class="sr-only">
                            <button class="btn btn--primary left-2 bottom-2 absolute">Upload image</button>
                        </label>
                    </div>
                </div>
    
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="text-sm font-medium text-black block line-height-1">Offer Title <span class="text-red-500">*</span></label>
                        @error('offerName') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <input 
                            type="text" 
                            wire:model="offerName" 
                            class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('offerName') border-red-500 @enderror">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <label class="text-sm w-full block font-medium text-black">Start date</label>
                        @error('offerStartDate') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <input 
                            type="date" 
                            wire:model="offerStartDate" 
                            class="mb-1 mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('offerStartDate') border-red-500 @enderror">
                    </div>
                    <div class="">
                        <label class="text-sm w-full block font-medium text-black">End date</label>
                        @error('offerEndDate') 
                            <span class="text-red-500 text-xs ">{{ $message }}</span>
                        @enderror
                        <input 
                            type="date" 
                            wire:model="offerEndDate" 
                            class="w-full mt-1 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('offerEndDate') border-red-500 @enderror">
                        
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="text-sm font-medium text-black block">Who is this for? <span class="text-red-500">*</span></label>
                        @error('offerType') 
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <div class="flex gap-2 p-2">
                            <div>
                                <div class="rounded-md bg-[#FAFAFC] p-1.5 flex cursor-pointer flex-col items-center justify-center transition-transform duration-150 hover:border-blue-400">
                                    <label class="flex cursor-pointer items-center justify-center text-xs uppercase text-black peer-checked:text-black" for="b2b">
                                        <input class="peer sr-only" wire:model="offerType" value="b2b" name="user-type" id="b2b" type="radio" />
                                        <span class="w-4 h-4 rounded-sm bg-white border border-[#E4ECF5] mr-2 text-white peer-checked:text-black text-center">&check;</span>
                                        B2B Users
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="rounded-md bg-[#FAFAFC] p-1.5 flex cursor-pointer flex-col items-center justify-center transition-transform duration-150 hover:border-blue-400">
                                    <label class="flex cursor-pointer items-center justify-center text-xs uppercase text-black peer-checked:text-black" for="b2c">
                                        <input class="peer sr-only" wire:model="offerType" value="b2c" name="user-type" id="b2c" type="radio" />
                                        <span class="w-4 h-4 rounded-sm bg-white border border-[#E4ECF5] mr-2 text-white peer-checked:text-black text-center">&check;</span>
                                        B2C Users
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="text-sm font-medium text-black mb-1 block">Select a category? <span class="text-red-500">*</span></label>
                        <select name="" id="" class="w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2">
                            <optgroup label="Oplevelser & Fritid">
                                <option>Sport & Bevægelse</option>
                                <option>Turisme</option>
                                <option>Begivenheder</option>
                                <option>Rejser</option>
                                <option>Kultur & Underholdning</option>
                                <option>Hobby & Fritidsaktiviteter</option>
                              </optgroup>
                              <optgroup label="Mad & Drikke">
                                <option>Takeaway</option>
                                <option>Restauranter & Caféer</option>
                                <option>Dagligvarer</option>
                                <option>Specialbutikker</option>
                                <option>Catering</option>
                              </optgroup>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mt-2">
                    <div class="col-span-2 rounded-lg bg-[#FAFAFC]">
                        <div class="grid grid-cols-2">
                            <div 
                            @class([
                                'text-center',
                                'px-4',
                                'py-2',
                                'text-sm',
                                'cursor-pointer',
                                'rounded-tl-xl',
                                'underline' => $tab === 'discount-code',
                                'text-sub-accent' => $tab === 'discount-code',
                                'text-[#3e82c7]' => $tab !== 'discount-code',
                                'bg-[#FAFAFC]' => $tab === 'discount-code',
                                'bg-primary' => $tab !== 'discount-code',
                            ])
                            wire:click='selectTab("discount-code")'>
                                Discount Code
                            </div>
                            <div 
                            @class([
                                'text-center',
                                'px-4',
                                'py-2',
                                'text-sm',
                                'cursor-pointer',
                                'rounded-tr-xl',
                                'underline' => $tab === 'contact-form',
                                'text-sub-accent' => $tab === 'contact-form',
                                'text-[#3e82c7]' => $tab !== 'contact-form',
                                'bg-[#FAFAFC]' => $tab === 'contact-form',
                                'bg-primary' => $tab !== 'contact-form',
                            ]) wire:click='selectTab("contact-form")'>
                                Contact form
                            </div>
                        </div>
                        @if ($tab === 'discount-code')
                        <div class="grid grid-cols-2 p-4">
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-black mb-1 block">Discount code</label>
                                @error('offerCode') 
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                                <input 
                                    type="text" 
                                    wire:model="offerCode" 
                                    class="w-full rounded-md bg-white border border-[#EEEEEE] p-2 @error('offerCode') border-red-500 @enderror">
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-black mb-1 block">Link to webpage</label>
                                @error('offerLink') 
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                                <input 
                                    type="text" 
                                    wire:model="offerLink" 
                                    class="w-full rounded-md bg-white border border-[#EEEEEE] p-2 @error('offerLink') border-red-500 @enderror">
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-black mb-1 block">Description</label>
                                @error('offerDescription') 
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                                <textarea 
                                    wire:model="offerDescription" 
                                    class="w-full rounded-md bg-white border border-[#EEEEEE] p-2 @error('offerDescription') border-red-500 @enderror">
                                </textarea>
                            </div>
                        </div>
                        @else
                        <div class="grid grid-cols-2 p-4">
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-black mb-1 block">Email</label>
                                <input type="text" id="email" class="w-full rounded-md bg-white border border-[#EEEEEE] p-2">
                            </div>
                            <div class="col-span-2 flex flex-col gap-2">
                                <label class="text-sm font-medium text-black mb-1 block">Link to webpage</label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer">
                                    <div class="relative w-7 h-3.5 bg-[#F6F6F6] border-[#F1F1F1] border peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[1px] after:start-[1px] after:bg-black after:border-gray-300 after:border after:rounded-full after:h-2.5 after:w-2.5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium">Phone field</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer">
                                    <div class="relative w-7 h-3.5 bg-[#F6F6F6] border-[#F1F1F1] border peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[1px] after:start-[1px] after:bg-black after:border-gray-300 after:border after:rounded-full after:h-2.5 after:w-2.5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium">Message field</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer">
                                    <div class="relative w-7 h-3.5 bg-[#F6F6F6] border-[#F1F1F1] border peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[1px] after:start-[1px] after:bg-black after:border-gray-300 after:border after:rounded-full after:h-2.5 after:w-2.5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium">Company name field</span>
                                </label>
  
                            </div>
                            <div class="col-span-2">
                                <label class="text-sm font-medium text-black mb-2 block">Description</label>
                                <textarea name="" id="" class="w-full rounded-md bg-white border border-[#EEEEEE] p-2"></textarea>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="flex gap-4">
                    <button type="button" class="btn btn--sub-accent" wire:click='update'>Save Offer</button>
                    <button type="button" class="btn btn--offset-white" wire:click="$dispatch('modal.close')">Cancel</button>
                </div>
            </form>
        </div>
</div>
