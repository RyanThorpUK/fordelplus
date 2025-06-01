<div class="px-8 py-12 bg-[#e5e2dc] h-screen">
    <form wire:submit="save">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex justify-between items-center relative mb-6">
            <div class="flex items-center gap-2">
                <h1 class="text-3xl font-semibold text-primary">Virksomhedsinfo</h1>
            </div>
        </div>

        <div class="bg-white rounded-xl py-4 px-8 mt-6">
            <div class="flex flex-wrap gap-4">
                <div class="w-40">
                    <h3 class="text-sm font-semibold text-primary mb-3">Information</h3>
                </div>
                <div class="flex-1 grid grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <label for="name" class="block mb-1 text-sm font-medium">Firmanavn</label>
                        <input type="text" wire:model="name" placeholder="Firmanavn" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="cvr_number" class="block mb-1 text-sm font-medium">CVR</label>
                        <input type="text" wire:model="cvr_number" placeholder="CVR number" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2">
                        @error('cvr_number') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="billing_email" class="block mb-1 text-sm font-medium">Email</label>
                        <input type="email" wire:model="billing_email" placeholder="Invoice email" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2">
                        @error('billing_email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-2 mt-4">
                        <button type="submit" class="btn btn--sub-accent">
                            Gem ændringer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
