<form wire:submit="save">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="px-4 sm:px-8 py-12 bg-[#e5e2dc] h-screen">

        <div class="flex justify-between items-center relative  mb-6">
            <div class="flex items-center gap-2">
                <h1 class="text-3xl font-semibold text-primary">Online Profil</h1>

                <div class="flex gap-2 p-2 ml-12">
                    <form action="" class="flex gap-2">
                        <div>
                            <div
                                class="bg-primary rounded-2xl px-4 py-1 flex cursor-pointer flex-col items-center justify-center transition-transform duration-150">
                                <label
                                    class="flex cursor-pointer items-center justify-center text-base uppercase text-white peer-checked:text-black"
                                    for="b2b">
                                    <input class="peer sr-only" wire:model="offerUserType" value="b2b" name="user-type"
                                        id="b2b" type="radio" />
                                    B2B
                                </label>
                            </div>
                        </div>
                        <div>
                            <div
                                class="bg-primary rounded-2xl px-4 py-1 flex cursor-pointer flex-col items-center justify-center transition-transform duration-150">
                                <label
                                    class="flex cursor-pointer items-center justify-center text-base uppercase text-white peer-checked:text-black"
                                    for="b2b">
                                    <input class="peer sr-only" wire:model="offerUserType" value="b2c" name="user-type"
                                        id="b2c" type="radio" />
                                    B2C
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="">
                <button class="btn btn--sub-accent"
                    wire:click="$dispatch('openModal', { component: 'modal-edit-offers' })">
                    Tilføj nyt tilbud
                </button>
            </div>
        </div>





        <div class="bg-white rounded-xl py-4 px-8">
            <div class="flex flex-wrap gap-4">
                <div class="w-40">
                    <h3 class="text-sm font-semibold text-primary mb-3">Logo</h3>
                    <ul class="text-xs text-gray-500 list-inside list-['-_']">
                        <li>
                            1200 X 1200 px.
                        </li>
                        <li>
                            PNG eller JPG
                        </li>
                        <li>
                            Maks 1 MB
                        </li>
                    </ul>
                </div>
                <div class="col-span-1">
                    <div class="h-30 w-30 bg-[#F8F8F8] rounded-lg border-2 border-white drop-shadow-md overflow-hidden">
                        @if ($company->logo)
                        <img src="{{ Storage::url($company->logo) }}" alt="Logo" class="w-full h-full object-cover">
                        @endif
                        <label for="logo" class="w-full h-full flex items-center justify-center">
                            <span class="text-gray-500">{{ $company->logo ? 'Skift logo' : 'Upload logo' }}</span>
                        </label>
                        <input type="file" id="logo" wire:model="logo" class="hidden">
                    </div>
                    <label for="logo" class="btn btn--sub-accent mt-2 inline-block">{{ $company->logo ? 'Skift logo' :
                        'Upload logo' }}</label>
                    @error('logo') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="gap-4 grid grid-cols-2">
            <div class="bg-white rounded-xl py-4 px-8 mt-6">
                <div class="flex flex-wrap gap-4">
                    <div class="w-40">
                        <h3 class="text-sm font-semibold text-primary mb-3">Logo</h3>
                        <ul class="text-xs text-gray-500 list-inside list-['-_']">
                            <li>
                                1200 X 800 px.
                            </li>
                            <li>
                                PNG eller JPG
                            </li>
                            <li>
                                Maks 1 MB
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-1">
                        <div
                            class="h-30 w-30 bg-[#F8F8F8] rounded-lg border-2 border-white drop-shadow-md overflow-hidden">
                            @if ($company->logo)
                            <img src="{{ Storage::url($company->logo) }}" alt="Logo" class="w-full h-full object-cover">
                            @endif
                            <label for="logo" class="w-full h-full flex items-center justify-center">
                                <span class="text-gray-500">{{ $company->logo ? 'Skift logo' : 'Upload logo' }}</span>
                            </label>
                            <input type="file" id="logo" wire:model="logo" class="hidden">
                        </div>
                        <label for="logo" class="btn btn--sub-accent mt-2 inline-block">{{ $company->logo ? 'Skift logo'
                            : 'Upload logo' }}</label>
                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl py-4 px-8 mt-6">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-1">
                        <h3 class="text-sm font-semibold text-primary mb-3">Billede</h3>
                        <ul class="text-xs text-gray-500 list-inside list-['-_']">
                            <li>
                                1200 X 450 px.
                            </li>
                            <li>
                                PNG eller JPG
                            </li>
                            <li>
                                Maks 1 MB
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-1">
                        <div
                            class="h-30 w-30 bg-[#F8F8F8] rounded-lg border-2 border-white drop-shadow-md overflow-hidden">
                            @if ($company->logo)
                            <img src="{{ Storage::url($company->logo) }}" alt="Logo" class="w-full h-full object-cover">
                            @endif
                            <label for="logo" class="w-full h-full flex items-center justify-center">
                                <span class="text-gray-500">{{ $company->logo ? 'Skift logo' : 'Upload logo' }}</span>
                            </label>
                            <input type="file" id="logo" wire:model="logo" class="hidden">
                        </div>
                        <label for="logo" class="btn btn--sub-accent mt-2 inline-block">{{ $company->logo ? 'Skift logo'
                            : 'Upload logo' }}</label>
                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl py-4 px-8 mt-6">
            <div class="flex flex-wrap gap-4 mb-4">
                <div class="w-40">
                    <h3 class="text-sm font-semibold text-primary mb-3">Page Title</h3>
                </div>
                <div class="flex-1">
                    <input type="text" wire:model="page_title" class="mt-1 w-full rounded-md bg-[#F8F8F8] p-2">
                    @error('page_title') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-wrap gap-4">
                <div class="w-40">
                    <h3 class="text-sm font-semibold text-primary mb-3">Description</h3>
                </div>
                <div class="flex-1">
                    <textarea wire:model="description" class="mt-1 w-full h-30 rounded-md bg-[#F8F8F8] p-2"></textarea>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>


        <div class="gap-4 grid grid-cols-2">
            <div class="bg-white rounded-xl py-4 px-8 mt-6">
                <div class="flex flex-wrap gap-4">
                    <div class="w-40">
                        <h3 class="text-sm font-semibold text-primary mb-3">Kontakt info</h3>
                    </div>
                    <div class="flex-1">
                        <div class="w-full mb-4">
                            <label for="name" class="block mb-1 text-primary text-xs font-medium">Telefon</label>
                            <input type="text" wire:model="name" placeholder="Telefon"
                                class="w-full h-10 rounded-md bg-[#F8F8F8] border border-[#E3EBF5] p-2">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full">
                            <label for="name" class="block mb-1 text-primary text-xs font-medium">Email</label>
                            <input type="text" wire:model="name" placeholder="Email"
                                class="w-full h-10 rounded-md bg-[#F8F8F8] border border-[#E3EBF5] p-2">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl py-4 px-8 mt-6">
                <div class="flex flex-wrap gap-4">
                    <div class="w-40">
                        <h3 class="text-sm font-semibold text-primary mb-3">Kontakt info</h3>
                    </div>
                    <div class="flex-1">
                        <div class="w-full mb-4">
                            <div class="flex gap-2 p-2">
                                <div>
                                    <label class="flex cursor-pointer items-center justify-center text-xs text-primary peer-checked:text-black" for="b2b">
                                        <input class="peer sr-only" wire:model="offerUserType" value="b2b" name="user-type" id="b2b" type="radio" />
                                        <span class="w-4 h-4 rounded-sm bg-white border border-[#E4ECF5] mr-2 text-white peer-checked:text-primary text-center">&check;</span>
                                        Aktiv
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="name" class="block mb-1 text-primary text-xs font-medium">Email</label>
                            <input type="text" wire:model="name" placeholder="Email"
                                class="w-full h-10 rounded-md bg-[#F8F8F8] border border-[#E3EBF5] p-2">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>