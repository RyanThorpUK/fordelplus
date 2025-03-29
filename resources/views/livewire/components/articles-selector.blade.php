<div class="bg-[#F9FAFE]">
    <div class="flex max-w-7xl mx-auto py-16">
        <div class="flex flex-col gap-4">

            @if ($title)
                <h2 class="text-xl font-bold">
                    {{ $title }}
                </h2>
            @endif

            <ul class="flex flex-wrap gap-4 mb-4">
                <li class="">
                    <a href="" class="flex flex-wrap p-3 font-bold bg-white hover:bg-gray-50 transition-colors ease-in-out duration-300 rounded-sm border-1 border-primary ">
                        Resturant
                        <span class="text-sm text-blue-500 w-full block">
                            121 tilbud
                        </span>
                    </a>
                </li>

                <li class="">
                    <a href="" class="flex flex-wrap p-3 font-bold bg-white hover:bg-gray-100 transition-colors ease-in-out duration-300 rounded-sm  ">
                        Resturant
                        <span class="text-sm text-blue-500 w-full block">
                            121 tilbud
                        </span>
                    </a>
                </li>

                <li class="">
                    <a href="" class="flex flex-wrap p-3 font-bold bg-white hover:bg-gray-50 transition-colors ease-in-out duration-300 rounded-sm  ">
                        Resturant
                        <span class="text-sm text-blue-500 w-full block">
                            121 tilbud
                        </span>
                    </a>
                </li>
            </ul>

            <div class="grid grid-cols-4 gap-4">
                @foreach ($articles as $article)
                    @include('partials.article', ['article' => $article])
                @endforeach
            </div>
        </div>
    </div>
</div>
