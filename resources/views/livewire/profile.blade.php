<div class="bg-offset-tan flex flex-col">
    <livewire:components.notification />

    <div class="order-2 md:order-1">
        <div class="">
            <div class="flex flex-col md:flex-row max-w-7xl px-2 sm:px-4 mx-auto md:pt-28 relative">
                <div class="order-2 md:order-1 bg-[#F9FAFE] rounded-md w-full md:w-auto md:max-w-sm mx-auto md:absolute top-16 right-0 shadow-lg">
                    <div class="p-3 flex flex-col gap-2">
                        <div class="grid grid-cols-2 gap-4 border-b border-gray-200 pb-2 mb-2">
                            <div class="text-sm">
                                <strong class="text-primary">Detaljer</strong>
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
            </div>
        </div>
    </div>

    <div class="js--offer-selector // bg-offset-tan order-1 md:order-2">
    
        <div class="">
            <div class="flex max-w-7xl flex-col mx-auto px-2 sm:px-4 over">

                <h1 class="text-2xl md:text-5xl text-center md:text-left font-semibold max-w-2xl text-primary mt-12 mb-6">
                    Din side
                </h1>

                <div class="w-full">
                    <ul class="js--offer-selector-parent // flex flex-wrap justify-center md:justify-start mb-6 gap-2 sm:gap-4">
                        <li>
                            <button type="button" data-id="gemte-tilbud" 
                            wire:click="setActiveCategory('gemte-tilbud')"
                            class="js--offer-selector-parent-button // cursor-pointer rounded-2xl px-4 py-1 sm:px-6 hover:bg-primary hover:text-white transition-colors ease-in-out duration-300 text-xs md:text-base {{ 'gemte-tilbud' == $activeCategory ? ' bg-primary text-white' : 'text-primary' }}">Gemte tilbud</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    
        <div class="">
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