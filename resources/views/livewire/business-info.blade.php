<div class="px-8 py-12 bg-[#F9FAFE] h-screen">

        <div class="flex justify-between items-center relative mb-6">
            <div class="flex items-center gap-2">
                <h1 class="text-3xl font-extrabold">Business info</h1>
            </div>
    
            <div class="">
                <button class="btn btn--sub-accent" wire:click="$dispatch('openModal', { component: 'modal-edit-offers' })">
                    Save
                </button>
            </div>
        </div>

    <div class="bg-white rounded-xl py-4 px-8">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <h3>Brand</h3>
            </div>
            <div class="col-span-1">
                <div class="h-30 w-30 bg-[#FAFAFC] rounded-lg border-2 border-white drop-shadow-md"></div>
                <button class="btn btn-primary">Update logo</button>
            </div>
            {{-- <div class="col-span-2">
                <div class="h-30 w-full bg-gray-200 rounded-lg border-2 border-white drop-shadow-md"></div>
            </div> --}}
        </div>
    </div>

    <div class="bg-white rounded-xl py-4 px-8 mt-6">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <h3>Description</h3>
            </div>
            <div class="col-span-3">
                <textarea class="mt-1 w-full h-30 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 "></textarea>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl py-4 px-8 mt-6">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <h3>Information</h3>
            </div>
            <div class="col-span-3 grid grid-cols-3 gap-4">
                <div class="col-span-1">
                    <input type="text" placeholder="Company name" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 ">
                </div>
                <div class="col-span-1">
                    <input type="text" placeholder="CVR number" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 ">
                </div>
                <div class="col-span-1">
                    <input type="text" placeholder="Invoice email" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 ">
                </div>
            </div>
            <div class="col-span-1"></div>
            <div class="col-span-1">
                <button class="btn btn--sub-accent">Save</button>
            </div>
        </div>
    </div>
</div>
