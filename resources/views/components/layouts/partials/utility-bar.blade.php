<div class="flex justify-between items-center gap-4 py-8 relative">
    <div class="flex items-center gap-4">

        <div class="relative inline-block text-left">
            <div>
                <button type="button"
                    class="js--list-toggle // text-xs sm:text-sm font-medium rounded-3xl px-4 sm:px-6 py-2 flex items-center gap-2 bg-white drop-shadow-md"
                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                    Kategori
                    <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div
                class="js--list-menu // hidden absolute left:0 md:right-0 z-10 mt-2 w-56 origin-top-left md:origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden max-h-96 overflow-y-auto"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                    @foreach($categories as $category)
                    <a href="{{ route('category.show', $category->ulid) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-color duration-300"
                        role="menuitem" tabindex="-1" id="menu-item-0">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>




        {{-- <div class="relative">
            <svg class="absolute left-3 top-3 z-10" width="11" height="16" viewBox="0 0 12 17" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 7.8125C10.3438 7 10.5 6.40625 10.5 6C10.5 3.53125 8.46875 1.5 6 1.5C3.5 1.5 1.5 3.53125 1.5 6C1.5 6.40625 1.625 7 1.96875 7.8125C2.28125 8.5625 2.75 9.4375 3.28125 10.3125C4.1875 11.75 5.21875 13.125 6 14.125C6.75 13.125 7.78125 11.75 8.6875 10.3125C9.21875 9.4375 9.6875 8.5625 10 7.8125ZM6.71875 15.625C6.34375 16.0938 5.625 16.0938 5.25 15.625C3.65625 13.5938 0 8.75 0 6C0 2.6875 2.6875 0 6 0C9.3125 0 12 2.6875 12 6C12 8.75 8.34375 13.5938 6.71875 15.625Z"
                    fill="#3E3E3E" />
            </svg>
            <select name="category" id="category"
                class="text-xs sm:text-sm font-medium  rounded-3xl px-8 py-2 flex items-center gap-2 bg-white drop-shadow-md">
                <option value="all">Alle byer</option>
                <option value="premium">Premium</option>
                <option value="free">Gratis</option>
            </select>
        </div> --}}
    </div>

    <form class="relative w-32 sm:w-56" action="https://medlemmer.fordelplus.dk/firmaer" method="get">
        <input type="text" name="s" placeholder="Søg..."
            class="w-full rounded-3xl bg-[#FAFAFC] border border-[#E3EBF5] text-[#3E3E3E] p-2 text-xs sm:text-sm drop-shadow-md">
        <button type="submit" class="absolute right-0 top-1 bottom-0 px-2 sm:px-4 text-[#3E3E3E]">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </button>
    </form>

    {{-- <div class="absolute inset-x-0 top-full -z-10 bg-white pt-16 shadow-lg ring-1 ring-gray-900/5 w-full z-50">
            <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-6 py-10 lg:grid-cols-4 lg:px-8">
               
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
                <a href="#" class="flex gap-x-4 py-2 text-sm/6 font-semibold text-gray-900">
                    <svg class="size-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    About
                </a>
            
            </div>
        </div> --}}
</div>