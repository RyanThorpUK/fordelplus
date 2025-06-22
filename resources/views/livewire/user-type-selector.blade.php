{{-- <div class="relative z-50">
    <button
        class="js--toggle-user-type-selector // rounded-2xl text-white border border-white py-1 px-4 text-sm flex items-center gap-2">
        {{ strtoupper($userType) }}
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-chevron-down">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </button>
    <div class="js--user-type-selector-menu // hidden absolute top-full left-0 w-full bg-white shadow-lg mt-3">
        <span
            class="w-4 h-4 bg-white rounded-sm rotate-45 absolute left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10"></span>
        <ul>
            <li>
                <button wire:click="setUserType('b2b')"
                    class="w-full text-left px-2 py-2 hover:bg-gray-100">B2B</button>
            </li>
            <li>
                <button wire:click="setUserType('b2c')"
                    class="w-full text-left px-2 py-2 hover:bg-gray-100">B2C</button>
            </li>
        </ul>
    </div>
</div> --}}


<div class="items-center gap-2 sm:gap-4 flex">
    <button type="submit" wire:click="setUserType('{{ request()->user()->type == 1 ? 2 : 1 }}')"
        class="cursor-pointer text-xs sm:text-sm font-medium  rounded-3xl px-4 sm:px-6 py-2 flex items-center gap-2 drop-shadow-sm transition-colors duration-300 bg-white border border-gray-300 hover:bg-gray-100">
        {{ request()->user()->type == 1 ? 'Privat' : 'Erhverv' }}
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-arrow-right">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
        </svg>
    </button>
</div>