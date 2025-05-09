<div class="">
    <div class="rounded-lg bg-white p-8 max-w-md">
        <h2 class="text-black font-bold text-base">Skift password</h2>

    <form wire:submit="changePassword">
        <div class="mb-4">
            <label class="text-sm font-medium text-black block line-height-1" for="current_password">
                Current Password <span class="text-red-500">*</span>
            </label>
            <input 
                wire:model="current_password"
                type="password"
                class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('current_password') border-red-500 @enderror"
                id="current_password"
            >
            @error('current_password') 
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="text-sm font-medium text-black block line-height-1" for="password">
                New Password <span class="text-red-500">*</span>
            </label>
            <input 
                wire:model="password"
                type="password"
                class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('password') border-red-500 @enderror"
                id="password"
            >
            @error('password') 
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label class="text-sm font-medium text-black block line-height-1" for="password_confirmation">
                Confirm New Password <span class="text-red-500">*</span>
            </label>
            <input 
                wire:model="password_confirmation"
                type="password"
                class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('password_confirmation') border-red-500 @enderror"
                id="password_confirmation"
            >
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
            Skift password
            </button>
        </div>
        </form>
    </div> 
</div> 