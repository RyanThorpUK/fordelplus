<article class="bg-white rounded-md border border-gray-200">
    <div class="">
        <img src="https://placehold.co/600x400" alt="" class="w-full h-full object-cover">
    </div>
    <div class="p-3 flex flex-col gap-2">
        <span class="text-sm text-gray-500">
            {{ $article->tag }}
        </span>
        <h2 class="text-lg font-bold">
            {{ $article->title }}
        </h2>
        <div> 
            <a href="{{ $article->link }}" class="bg-black text-white text-sm rounded-2xl px-3 py-1">
                {{ $article->link_text }}
            </a>
        </div>
    </div>
</article>