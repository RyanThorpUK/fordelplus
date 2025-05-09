<div class="">
    <div class="rounded-lg bg-white p-8 max-w-md">
        <h2 class="text-black font-bold text-base">Edit Details</h2>

        <form wire:submit="updateDetails">
            <div class="mb-4">
                <label class="text-sm font-medium text-black block line-height-1" for="first_name">
                    First Name <span class="text-red-500">*</span>
                </label>
                <input 
                    wire:model="first_name"
                    type="text"
                    class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('first_name') border-red-500 @enderror"
                    id="first_name"
                >
                @error('first_name') 
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-sm font-medium text-black block line-height-1" for="last_name">
                    Last Name <span class="text-red-500">*</span>
                </label>
                <input 
                    wire:model="last_name"
                    type="text"
                    class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('last_name') border-red-500 @enderror"
                    id="last_name"
                >
                @error('last_name') 
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="text-sm font-medium text-black block line-height-1" for="email">
                    Email <span class="text-red-500">*</span>
                </label>
                <input 
                    wire:model="email"
                    type="email"
                    class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('email') border-red-500 @enderror"
                    id="email"
                >
                @error('email') 
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <button 
                    type="button"
                    class="btn btn--offset-white"
                    wire:click="$dispatch('closeModal')"
                >
                    Cancel
                </button>
                <button 
                    type="submit"
                    class="btn btn--sub-accent"
                >
                    Gem ændringer
                </button>
            </div>
        </form>
    </div>
</div> 