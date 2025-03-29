<div>

    <div class="">
        <div class="bg-primary">
            <div class="flex max-w-7xl mx-auto pt-28 pb-8 relative">

                <div class="bg-white border-6 border-white rounded-3xl max-w-sm mx-auto absolute top-16 right-0 shadow-lg">
                    <div class="relative">
                        <span class="absolute top-4 right-4 text-sub-accent text-sm px-2 py-1 bg-white rounded-xl drop-shadow-md flex flex-wrap items-center gap-1">
                            Gem
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </span>
                        <img src="{{ $article->image }}" alt="" class="w-full h-full object-cover rounded-tr-3xl rounded-tl-3xl">
                    </div>
                    <div class="p-3 flex flex-col gap-2">
                        <div class="flex justify-between gap-4">
                           <div class="text-sm">
                                Offer ends
                            </div>
                            <div class="text-sub-accent text-sm flex items-center gap-2">
                                {{ $article->end_date->format('d/m/Y') }}
                               <span class="text-sub-accent px-2 py-1 bg-white rounded-xl drop-shadow-md">3 days</span>
                               {{-- <span class="text-sub-accent px-2 py-1 bg-white rounded-md drop-shadow-md"> {{ $article->end_date->diffForHumans() }}</span> --}}
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button class="bg-sub-accent text-white font-bold px-4 py-2 rounded-md border-2 border-sub-accent">
                                Get discount
                            </button>
                            {{-- <button class="bg-white text-sub-accent font-bold px-4 py-2 rounded-md border-2 border-sub-accent"> --}}
                                {{-- #newcoupon25 --}}
                            {{-- </button> --}}

                            <div class="js--offer-claim-form">
                                <form action="" wire:ignore class="flex flex-col gap-2">
                                    <div class="">
                                        <label class="text-sm font-medium text-black block line-height-1">Name <span class="text-red-500">*</span></label>
                                        <input type="text" wire:model="name" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2" placeholder="Name">
                                    </div>
                                    <div class="">
                                        <label class="text-sm font-medium text-black block line-height-1">Email <span class="text-red-500">*</span></label>
                                        <input type="text" wire:model="email" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2" placeholder="Email">
                                    </div>
                                    <div class="">
                                        <label class="text-sm font-medium text-black block line-height-1">Phone <span class="text-red-500">*</span></label>
                                        <input type="tel" wire:model="phone" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2" placeholder="Phone">
                                    </div>
                                    <div class="">
                                        <label class="text-sm font-medium text-black block line-height-1">Message <span class="text-red-500">*</span></label>
                                        <textarea wire:model="message" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2" placeholder="Message"></textarea>
                                    </div>
                                    <button type="submit" class="bg-sub-accent text-white font-bold px-4 py-2 rounded-md border-2 border-sub-accent">
                                        Sign up
                                    </button>
                                </form>
                            </div>

                            <a href="#" class="bg-[#F9FAFE] text-center text-sub-accent font-bold px-4 py-2 rounded-md">
                                Go to webpage
                            </a>
                            <a href="#" class="text-center text-sm text-[#bdbdbd] underline">
                                Read terms and conditions
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    {{-- <div class="">
                        <img src="{{ $article->logo }}" alt="" class="max-w-40 object-cover">
                    </div> --}}
                    <ul class="flex flex-wrap gap-2">
                        <li class="text-sm text-white bg-primary py-1 rounded-md">
                            Offers
                        </li>
                        <li class="text-sm text-white bg-primary py-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </li>
                        <li class="text-sm text-white bg-primary py-1 rounded-md">
                            Food & Drinks
                        </li>
                        <li class="text-sm text-white bg-primary py-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </li>
                        <li class="text-sm text-white bg-primary py-1 rounded-md">
                            Cafe
                        </li>
                    </ul>
                    <h1 class="text-4xl font-bold max-w-2xl text-white">
                        {{ $article->title }}
                    </h1>
                </div>
            </div>
        </div>
    
        <div class="flex max-w-7xl mx-auto pt-8 pb-16">
            <div class="flex flex-col gap-4">
                <div class="max-w-xl flex flex-wrap">
                    <p>
                        {{ $article->description }}
                    </p>
                    <div class="mt-8">
                        <div class="grid grid-cols-3 gap-4 bg-[#F9FAFE] rounded-lg p-4">
                            <div class="col-span-1">
                                <img src="{{ $article->image }}" alt="" class="h-16 w-16 object-cover rounded-lg shadow-md">
                            </div>
                            <div class="col-span-2 flex flex-col justify-center ">
                                <span class="text-sm text-primary font-bold block">Provide business ApS</span>
                                <a href="#" class="flex flex-wrap items-center gap-1 text-sm text-sub-accent block">
                                    Gå til virksomhedsside
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <div class="flex max-w-7xl mx-auto py-16">
        <div class="flex flex-col gap-4">

            <div class="flex flex-wrap items-center gap-2">
                <h2 class="text-xl font-bold">
                    Andre tilbud fra [firma]
                </h2>
                <a href="#" class="text-sm text-primary underline ml-4">
                    Gå til deres side
                </a>
            </div>

            <div class="grid grid-cols-4 gap-4">
    
                @include('partials.article', ['article' => (object)[
                    'title' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                    'image' => 'https://placehold.co/600x400',
                    'logo' => 'https://placehold.co/600x400',
                    'description' => '20% tilbud på alt vinter tøj i vores butikker i odder',
                    'tag' => 'Tøj',
                    'link' => '#',
                    'link_text' => 'Se tilbud',
                ]])
            </div>
        </div>
    </div>

    <livewire:components.articles-selector title="Relaterede tilbud" />
</div>