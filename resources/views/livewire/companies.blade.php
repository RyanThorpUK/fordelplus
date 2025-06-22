<div class="bg-offset-tan">
    <div class="flex flex-col max-w-7xl mx-auto px-2 sm:px-4">
        <div class="flex flex-col gap-4">
            
            <div class="pt-6 sm:pt-12 pb-3">
                <h1 class="text-2xl sm:text-3xl mb-4 sm:mb-6">Søg efter firma</h1>
                <form wire:submit="updateSearch" class="max-w-md">
                    <input type="text" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2" placeholder="Søg..." wire:model.live="search">
                </form>
            </div>
            
            <ul class="js--offer-selector-parent // flex flex-wrap gap-1 sm:gap-2">
                @foreach ($categories as $id => $category)
                    <li>
                        <button type="button" data-id="{{ $id }}" 
                        wire:click="setActiveCategory({{ $id }})"
                        class="js--offer-selector-parent-button // cursor-pointer rounded-2xl px-4 py-1 sm:px-6 {{ ( ($loop->first && $activeCategory === null) || $id == $activeCategory ) ? ' bg-primary text-white' : 'text-primary' }} hover:bg-primary hover:text-white transition-colors ease-in-out duration-300 text-xs md:text-base">{{ $category['name'] }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="bg-offset-tan">
        <div class="flex flex-col max-w-7xl w-full mx-auto py-8 sm:pb-16 px-2 sm:px-4">
            <div class="w-full flex flex-col gap-4">
                @foreach ($categories as $id => $category)
                <ul @class([
                    'js--offer-selector-child // flex flex-wrap gap-2 sm:gap-4 mb-4',
                    'hidden' => $id !== $activeCategory
                ]) data-id="{{ $id }}">
                    @foreach ($category['children'] as $childCategory)
                        <li class="w-1/2 sm:w-auto">
                            <button type="button" data-id="{{ $childCategory['id'] }}" 
                            wire:click="setActiveChildCategory({{ $childCategory['id'] }})"
                            class="js--offer-selector-child-button cursor-pointer flex flex-wrap p-2 sm:p-3 font-semibold bg-white hover:bg-gray-50 transition-colors ease-in-out duration-300 rounded-sm border-1 {{ ( ( $activeChildCategory === null && $loop->first ) || $childCategory['id'] == $activeChildCategory ) ? ' border-primary' : 'border-transparent' }} hover:border-primary text-xs sm:text-base">
                                {{ $childCategory['name'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                @endforeach

                <div class="flex flex-col gap-4">
                    @if ($companies->count() > 0)
                        @foreach ($companies as $company)
                            <div class="w-full bg-white px-2 sm:px-4 py-2 rounded-md flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div class="flex flex-wrap gap-4 sm:gap-6 items-center">
                                    <img src="{{ Storage::url($company->logo) }}" alt="" class="border-r border-[#E3EBF5] pr-4 sm:pr-6 w-24 sm:w-32 h-10 sm:h-12 object-contain">
                                    <span class="font-bold text-base sm:text-lg">{{ $company->name }}</span>
                                </div>
                                <div class="flex flex-wrap gap-2 sm:gap-4 items-center">
                                    <span><span class="underline">{{ $company->active_offers_count }}</span> Tilbud</span>
                                    <a href="{{ route('company.show', $company->ulid) }}" class="btn btn--sub-accent text-xs sm:text-sm">Gå til virksomhed</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="flex max-w-7xl mx-auto">
                            <div class="flex flex-col gap-4">
                                <p>Ingen resultater fundet</p>
                            </div>
                        </div>  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

