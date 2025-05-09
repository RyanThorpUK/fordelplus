<div class="js--offer-selector // bg-offset-tan">
    
    <div class="">
        <div class="flex max-w-7xl mx-auto px-2 sm:px-4 over">
            @if ($parentFilters !== false)
            <ul class="js--offer-selector-parent // flex flex-wrap gap-2 sm:gap-2">
                @foreach ($categories as $id => $category)
                    <li>
                        <button type="button" data-id="{{ $id }}" 
                        wire:click="setActiveCategory({{ $id }})"
                        class="js--offer-selector-parent-button // cursor-pointer rounded-2xl px-4 py-1 sm:px-6  {{ $id == $activeCategory ? ' bg-primary text-white' : 'text-primary' }} hover:bg-primary hover:text-white transition-colors ease-in-out duration-300 text-xs md:text-base">{{ $category['name'] }}</button>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    

    <div class="bg-offset-tan">
        <div class="flex flex-col max-w-7xl mx-auto pb-8 sm:pb-16 pt-2 sm:pt-4.5 px-2 sm:px-4">
            <div class="flex flex-col gap-4 w-full">
                @if ($title)
                    <h2 class="text-lg sm:text-xl font-bold">
                        {{ $title }} 
                    </h2>
                @endif

                @if ($childFilters !== false)
                @foreach ($categories as $id => $category)
                    <ul @class([
                        'js--offer-selector-child // flex flex-wrap gap-2 sm:gap-4.5 mb-4',
                        'hidden' => $id !== $activeCategory
                    ]) data-id="{{ $id }}">
                        @foreach ($category['children'] as $childCategory)
                            <li class="w-1/2 sm:w-auto">
                                <button type="button" data-id="{{ $childCategory['id'] }}" 
                                wire:click="setActiveChildCategory({{ $childCategory['id'] }})"
                                wire:navigate.preserve-scroll
                                class="js--offer-selector-child-button cursor-pointer flex flex-wrap p-2 sm:p-3 font-semibold bg-white hover:bg-gray-50 transition-colors ease-in-out duration-300 rounded-sm border-1 {{  $childCategory['id'] == $activeChildCategory ? ' border-primary' : 'border-transparent' }} hover:border-primary text-xs sm:text-base">
                                    {{ $childCategory['name'] }}
                                    <span class="text-left text-xs sm:text-sm text-sub-accent w-full block">
                                        {{ $childCategory['count'] }} tilbud
                                    </span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    @endforeach
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($paginatedOffers as $offer)
                        @include('partials.article', ['offer' => $offer])
                    @endforeach
                </div>
            </div>

            <div class="mt-8 w-full">
                {{ $paginatedOffers->links() }}
            </div>
        </div>
        
    </div>

   

</div>