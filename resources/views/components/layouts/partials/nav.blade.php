<flux:header container class="bg-white py-2 px-4">
    <div class="flex items-center w-full">
        <a href="/" class="mr-3 flex items-center space-x-2 lg:ml-0 -mt-2" wire:navigate>
            <div class="grid flex-1 text-left text-2xl sm:text-3xl">
                <img src="/img/fordelplus-logo.svg" alt="FordelPlus" class="h-10">
                <span class="text-white bg-primary">{{ request()->user()->type }}</span>
            </div>
        </a>

        <!-- Desktop Navigation -->
        <flux:navbar class="ml-auto max-lg:hidden -mb-px mr-6">
            @if ( auth()->user() )
                <flux:navbar.item :href="route('home')">
                    {{ __('Markedsplads') }}
                </flux:navbar.item>
                <flux:navbar.item :href="route('companies')">
                    {{ __('Firmaer') }}
                </flux:navbar.item>
                <flux:navbar.item :href="route('profile')">
                    {{ __('Min side') }}
                </flux:navbar.item>

                @if (auth()->user()->hasRole('manager') || auth()->user()->hasRole('admin'))
                    <flux:navbar.item :href="route('admin.all-offers')">
                        {{ __('Admin') }}
                    </flux:navbar.item>
                @endif
            @else 
                <flux:navbar.item :href="'https://fordelplus.dk/'">
                    {{ __('Forside') }}
                </flux:navbar.item>
                <flux:navbar.item :href="'https://fordelplus.dk/om-fordelplus/'">
                    {{ __('Om FordelPlus') }}
                </flux:navbar.item>
                <flux:navbar.item :href="'https://fordelplus.dk/bliv-partner/'">
                    {{ __('Bliv Partner') }}
                </flux:navbar.item>
                <flux:navbar.item :href="'https://fordelplus.dk/medlemmer/'">
                    {{ __('Medlemmer') }}
                </flux:navbar.item>
                <flux:navbar.item :href="'https://fordelplus.dk/kontakt/'">
                    {{ __('Kontakt') }}
                </flux:navbar.item>
            @endif
        </flux:navbar>

        @if (auth()->user())
            <div class="items-center gap-2 sm:gap-4 hidden lg:flex">
                <form class="relative w-32 sm:w-48" action="{{ route('companies')}}" method="get">
                    <input 
                        type="text" 
                        name="s"
                        placeholder="Søg..."
                        class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 text-xs sm:text-sm" />
                    <button type="submit" class="absolute right-0 top-1 bottom-0 px-2 sm:px-4 text-sub-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </form>
            </div>
        @else
            <div class="hidden lg:flex items-center ml-auto">
                <a href="{{ route('login') }}" class="text-xs sm:text-sm font-medium text-primary bg-sub-accent rounded-md px-4 sm:px-6 py-2">
                    {{ __('Login') }}
                </a>
            </div>
        @endif
        
        <!-- Mobile Menu Button -->
        <button 
            type="button" 
            class="js--toggle-mobile-menu // lg:hidden ml-auto p-2 rounded-md text-white hover:text-primary focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
        >
            <span class="sr-only">Open menu</span>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div 
        class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden transition-opacity duration-300 ease-in-out"
        data-mobile-overlay
    ></div>

    <!-- Mobile Menu -->
    <div 
        class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-50"
        data-mobile-menu
    >
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b">
                <h2 class="text-lg font-semibold">Menu</h2>
                <button 
                    type="button" 
                    class="js--toggle-mobile-menu // p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
                >
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
                @if ( auth()->user() )
                    <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        {{ __('Markedsplads') }}
                    </a>
                    <a href="{{ route('companies') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        {{ __('Firmaer') }}
                    </a>
                    <a href="{{ route('profile') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        {{ __('Min side') }}
                    </a>

                    @if (auth()->user()->hasRole('manager') || auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.all-offers') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                            {{ __('Admin') }}
                        </a>
                    @endif
                @else 
                    <a href="https://fordelplus.dk/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        {{ __('Forside') }}
                    </a>
                    <a href="https://fordelplus.dk/om-fordelplus/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        {{ __('Om FordelPlus') }}
                    </a>
                    <a href="https://fordelplus.dk/bliv-partner/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        {{ __('Bliv Partner') }}
                    </a>
                    <a href="https://fordelplus.dk/medlemmer/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        {{ __('Medlemmer') }}
                    </a>
                    <a href="https://fordelplus.dk/kontakt/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">
                        {{ __('Kontakt') }}
                    </a>
                @endif
            </nav>

            @if (!auth()->user())
                <div class="p-4 border-t">
                    <a href="{{ route('login') }}" class="w-full flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-primary bg-sub-accent hover:bg-opacity-90">
                        {{ __('Login') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</flux:header>