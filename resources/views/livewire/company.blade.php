<div>
    
    <div class="bg-[#F9FAFE] h-24 sm:h-36"></div>

    <div class="bg-white">
        <div class="flex flex-col max-w-7xl mx-auto relative px-2 sm:px-4">

            <div class="w-full grid grid-cols-1 lg:grid-cols-4 gap-4 pt-8">
                <div class="flex flex-col lg:flex-row col-span-1 lg:col-span-3 gap-4 lg:gap-8">
                    <div class="bg-white w-32 h-32 sm:w-56 sm:h-56 flex-shrink-0 shadow-lg border-6 border-white rounded-3xl -mt-16 sm:-mt-20 mx-auto lg:mx-0">
                        <img src="{{ Storage::url($company->logo) }}" alt="" class="w-full h-full object-cover object-center rounded-3xl">
                    </div>
                    <div class="w-full max-w-2xl">
                        <h1 class="text-xl sm:text-2xl font-bold text-black mb-2 sm:mb-4">
                            {{ $company->name }}
                        </h1>
                        <p class="text-sm sm:text-base">
                            {{ $company->description }}
                        </p>
                    </div>
                </div>
                @if ($company->website)
                    <div class="col-span-1 flex items-start justify-end mt-4 lg:mt-0">
                        <a href="{{ $company->website }}" target="_blank" class="btn btn--sub-accent text-xs sm:text-base">
                            {{ str_replace(['https://', 'http://'], '', $company->website) }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="flex flex-col max-w-7xl w-full mx-auto py-8 sm:py-16 px-2 sm:px-4">
        <div class="flex w-full flex-col gap-4">

            <div class="flex flex-wrap items-center gap-2">
                <h2 class="text-lg sm:text-xl font-bold">
                    Tilbud
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($offers as $offer)
                    @include('partials.article', ['offer' => $offer])   
                @endforeach
            </div>
        </div>
    </div>

</div>