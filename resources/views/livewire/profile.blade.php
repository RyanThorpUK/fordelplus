<div>
    <livewire:components.notification />

    <div class="">
        <div class="bg-white">
            <div class="flex max-w-7xl mx-auto pt-28 pb-8 relative">

                <div class="bg-[#F9FAFE] border-6 border-white rounded-3xl max-w-sm mx-auto absolute top-16 right-0 shadow-lg">
                    <div class="p-3 flex flex-col gap-2">
                        <div class="grid grid-cols-2 gap-4 border-b border-gray-200 pb-2 mb-2">
                            <div class="text-sm">
                             <strong>Detaljer</strong>
                             </div>
                             <div class="text-right text-sub-accent text-sm gap-2">
                                 <button 
                                     wire:click="$dispatch('openModal', { component: 'modals.modal-edit-user-details' })" 
                                     class="text-sub-accent"
                                 >
                                     Edit
                                 </button>
                             </div>
                         </div>

                         <div class="grid grid-cols-2 gap-4">
                            <div class="text-sm">
                                Navn:
                             </div>
                             <div class="text-right text-sm gap-2">
                                {{ auth()->user()->first_name }}
                             </div>
                         </div>

                         <div class="grid grid-cols-2 gap-4">
                            <div class="text-sm">
                                Efternavn:
                             </div>
                             <div class="text-right text-sm gap-2">
                                {{ auth()->user()->last_name }}
                             </div>
                         </div>

                         <div class="grid grid-cols-2 gap-4">
                            <div class="text-sm">
                                Email:
                             </div>
                             <div class="text-right text-sm gap-2">
                                {{ auth()->user()->email }}
                             </div>
                         </div>

                         <div class="grid grid-cols-2 gap-4 border-t border-gray-200 pt-2 mt-2">
                            <div class="text-sm">
                                <button 
                                    wire:click="$dispatch('openModal', { component: 'modals.modal-change-password' })" 
                                    class="underline"
                                >
                                Skift password
                                </button>
                                @if (session('status'))
                                    <div class="text-green-500 text-xs mt-1">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                             <div class="text-right text-sm gap-2">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500">Log ud</button>
                                </form>
                             </div>
                         </div>
                         
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <h1 class="text-5xl font-bold max-w-2xl text-black">
                        Din side
                    </h1>
                </div>
            </div>
        </div>
    
    </div>

    <div class="js--offer-selector">
    
        <div class="bg-white">
            <div class="flex max-w-7xl mx-auto px-2 sm:px-4 over">
                <ul class="js--offer-selector-parent // flex flex-wrap gap-2 sm:gap-4">
                    <li>
                        <button type="button" data-id="gemte-tilbud" 
                        wire:click="setActiveCategory('gemte-tilbud')"
                        class="js--offer-selector-parent-button // cursor-pointer block px-2 py-2 sm:px-4 border-b-2 {{ 'gemte-tilbud' == $activeCategory ? ' border-primary' : 'border-transparent' }} hover:border-primary text-xs sm:text-base">Gemte tilbud</button>
                    </li>
                </ul>
            </div>
        </div>
        
    
        <div class="bg-[#F9FAFE]">
            <div class="flex flex-col max-w-7xl mx-auto pb-8 sm:pb-16 pt-2 sm:pt-4.5 px-2 sm:px-4">
                <div class="flex flex-col gap-4 w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($offers as $offer)
                            @include('partials.article', ['offer' => $offer])
                        @endforeach
                    </div>
                </div>
    
                {{-- <div class="mt-8 w-full">
                    {{ $paginatedOffers->links() }}
                </div> --}}
            </div>
            
        </div>
    </div>


    {{-- <livewire:components.articles-selector :child-filters="false" :offers="" /> --}}
</div>