<div class="">
    <div class="rounded-lg bg-white p-8 max-w-md">
        <div class="grid grid-cols-6">
            <div class="col-span-1">
                <div class="bg-white w-24 h-24 flex-shrink-0 shadow-lg md:border-3 border-white overflow-hidden rounded-xl">
                    <img src="{{ Storage::url($offer->image) }}" alt="{{ $offer->name }}" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="col-span-5">
                <h2 class="text-2xl font-bold">{{ $offer->name }}</h2>
                <p>{{ $offer->description }}</p>
            </div>
        </div>
    </div>
</div>
