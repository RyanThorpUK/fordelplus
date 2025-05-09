<div class="px-8 py-12 bg-[#e5e2dc] h-screen">
    <form wire:submit="save">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex justify-between items-center relative mb-6">
            <div class="flex items-center gap-2">
                <h1 class="text-3xl font-extrabold">Virksomhedsinfo</h1>
            </div>
        </div>

        <div class="bg-white rounded-xl py-4 px-8">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-1">
                    <h3>Logo</h3>
                </div>
                <div class="col-span-1">
                    <div class="h-30 w-30 bg-[#FAFAFC] rounded-lg border-2 border-white drop-shadow-md overflow-hidden">
                        @if ($company->logo)
                            <img src="{{ Storage::url($company->logo) }}" alt="Logo" class="w-full h-full object-cover">
                        @endif
                        <label for="logo" class="w-full h-full flex items-center justify-center">
                            <span class="text-gray-500">{{ $company->logo ? 'Skift logo' : 'Upload logo' }}</span>
                        </label>
                        <input type="file" id="logo" wire:model="logo" class="hidden">
                    </div>
                    <label for="logo" class="btn btn--sub-accent mt-2 inline-block">{{ $company->logo ? 'Skift logo' : 'Upload logo' }}</label>
                    @error('logo') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl py-4 px-8 mt-6">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-1">
                    <h3>Beskrivelse</h3>
                </div>
                <div class="col-span-3">
                    <textarea wire:model="description" class="mt-1 w-full h-30 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2"></textarea>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl py-4 px-8 mt-6">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-1">
                    <h3>Information</h3>
                </div>
                <div class="col-span-3 grid grid-cols-2 gap-4 max-w-2xl">
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
                        <label for="phone_number" class="block mb-1 text-sm font-medium">Telefonnr.</label>
                        <input type="text" wire:model="phone_number" placeholder="Telefonnr." class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2">
                        @error('phone_number') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="billing_email" class="block mb-1 text-sm font-medium">Email</label>
                        <input type="email" wire:model="billing_email" placeholder="Invoice email" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2">
                        @error('billing_email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="website" class="block mb-1 text-sm font-medium">Website</label>
                        <input type="text" wire:model="website" placeholder="Website" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2">
                        @error('website') <span class="error">{{ $message }}</span> @enderror
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
