<flux:header container class="bg-primary py-3 px-4">
    <div class="flex items-center w-full">

        <a href="/" class="mr-3 flex items-center space-x-2 lg:ml-0" wire:navigate>
            <div class="grid flex-1 text-left text-2xl sm:text-3xl">
                <img src="/img/fordelplus_logo_1.svg" alt="FordelPlus" class="h-6">
            </div>
        </a>

        <flux:navbar class="-mb-px max-lg:hidden flex-1">
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

        <flux:spacer class="hidden lg:block" />

        @if (auth()->user())
            <div class="flex items-center gap-2 sm:gap-4 ml-auto">
                <form class="relative w-32 sm:w-48" action="{{ route('companies')}}" method="get">
                    <input 
                        type="text" 
                        name="s"
                        class="mt-1 w-full rounded-3xl bg-[#FAFAFC] border border-[#E3EBF5] p-2 text-xs sm:text-sm" />
                    <button type="submit" class="absolute right-0 top-1 bottom-0 px-2 sm:px-4 text-[#707070]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </form>
                <a href="{{ route('profile') }}" class="flex items-center text-xs sm:text-sm @if (request()->routeIs('profile')) text-sub-accent @endif">
                    Gemte
                </a>
            </div>
        @else
            <div class="hidden lg:flex items-center ml-auto">
                <a href="{{ route('login') }}" class="text-xs sm:text-sm font-medium text-primary bg-sub-accent rounded-md px-4 sm:px-6 py-2">
                    {{ __('Login') }}
                </a>
            </div>
        @endif
        
        <flux:sidebar.toggle class="lg:hidden ml-auto" icon="bars-2" inset="left" />
    </div>
</flux:header>