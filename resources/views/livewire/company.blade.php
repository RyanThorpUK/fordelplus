<div class="relative z-10">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <a class="flex items-center gap-4 text-primary-200 cursor-pointer group" href="{{ route('home') }}">
            <span
                class="bg-white px-3 py-2 rounded-3xl group-hover:bg-primary group-hover:text-white transition-colors ease-in-out duration-300 drop-shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </span>
            Til oversigten
        </a>
    </div>

    <div class="flex flex-col max-w-7xl mx-auto px-4">
        <div class="flex flex-col gap-8 py-8 items-center text-center">

            <div class="w-full flex flex-col items-center">

                <img src="http://fordelplus.dk.test/storage/offer-images/dummy-QqBVvUnkRj.jpg"
                    class="w-full h-56 object-cover rounded-4xl" alt="{{ $company->name }}" />

                <div class="w-32 h-32 sm:w-40 sm:h-40 p-4 bg-white rounded-4xl shadow-md self-center -mt-16 sm:-mt-20">
                    <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}"
                        class="w-full h-full object-contain">
                </div>
            </div>

            <h1 class="text-3xl sm:text-5xl font-semibold text-center text-primary-400">{{ $company->name }}</h1>

            <address class="text-base sm:text-lg text-gray-600 not-italic text-center text-grey">Holsteinsgade 27,
                2100 København Ø</address>

            <p class="text-base max-w-3xl">{{ $company->description }}</p>

            <a href="{{ $company->website }}" target="_blank" class="btn btn--outline w-fit">Gå til hjemmeside</a>
        </div>
    </div>

    <div class="flex flex-col max-w-7xl mx-auto py-12 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-4 gap-y-8">
            @foreach ($offers as $offer)
                @livewire('components.offer', [
                    'offer' => $offer, 
                    'classes' => ['image' => 'h-62 md:h-72', 'title' => 'text-base md:text-lg font-semibold', 'description' => 'text-base'], 
                    'components' => ['offer_link' => true, 'description' => true]])
            @endforeach
        </div>
    </div>


</div>