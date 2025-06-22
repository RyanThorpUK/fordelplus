<div class="">
    <div class="rounded-lg bg-white p-8">
        <h2 class="text-black font-bold text-base">Edit user</h2>

        <form class="flex flex-col gap-2" wire:submit.prevent="update">
            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <label class="text-sm font-medium text-black block line-height-1">First Name <span class="text-red-500">*</span></label>
                    @error('first_name') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                    <input 
                        type="text" 
                        wire:model="first_name" 
                        class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('first_name') border-red-500 @enderror">
                </div>
                <div class="">
                    <label class="text-sm font-medium text-black block line-height-1">Last Name <span class="text-red-500">*</span></label>
                    @error('last_name') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                    <input 
                        type="text" 
                        wire:model="last_name" 
                        class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('last_name') border-red-500 @enderror">
                </div>
                <div class="col-span-2">
                    <label class="text-sm font-medium text-black block line-height-1">Email <span class="text-red-500">*</span></label>
                    @error('email') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                    <input 
                        type="email" 
                        wire:model="email" 
                        class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('email') border-red-500 @enderror">
                </div>

                <div class="col-span-2">
                    <label class="text-sm font-medium text-black block">Hvem skal se det? <span class="text-red-500">*</span></label>
                    @error('type') 
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                    <div class="flex gap-2 p-2">
                        @if (request()->user()->userTypes()->where('type_id', 1)->exists())
                        <div>
                            <div class="rounded-md bg-[#FAFAFC] p-1.5 flex cursor-pointer flex-col items-center justify-center transition-transform duration-150 hover:border-blue-400">
                                <label class="flex cursor-pointer items-center justify-center text-xs uppercase text-black peer-checked:text-black" for="b2b">
                                    <input class="peer sr-only" wire:model="type" value="1" name="user-type-b2b" id="b2b" type="checkbox" />
                                    <span class="w-4 h-4 rounded-sm bg-white border border-[#E4ECF5] mr-2 text-white peer-checked:text-black text-center">&check;</span>
                                    B2B Brugere
                                </label>
                            </div>
                        </div>
                        @endif

                        @if (request()->user()->userTypes()->where('type_id', 2)->exists())
                        <div>
                            <div class="rounded-md bg-[#FAFAFC] p-1.5 flex cursor-pointer flex-col items-center justify-center transition-transform duration-150 hover:border-blue-400">
                                <label class="flex cursor-pointer items-center justify-center text-xs uppercase text-black peer-checked:text-black" for="b2c">
                                    <input class="peer sr-only" wire:model="type" value="2" name="user-type-b2c" id="b2c" type="checkbox" />
                                    <span class="w-4 h-4 rounded-sm bg-white border border-[#E4ECF5] mr-2 text-white peer-checked:text-black text-center">&check;</span>
                                    B2C Brugere
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex justify-between mt-4">
                <div class="flex gap-4">
                    <button type="submit" class="btn btn---primary !rounded-md">Save User</button>
                    <button 
                        type="button" 
                        class="btn btn--transparent text-red-500 text-sm" 
                        wire:click="deleteUser"
                        wire:confirm="Are you sure you want to delete this user?"
                    >
                        Delete User
                    </button>
                </div>
                <button type="button" class="btn btn--g-alt !rounded-md" wire:click="$dispatch('closeModal')">Luk</button>
            </div>
        </form>
    </div>
</div>
