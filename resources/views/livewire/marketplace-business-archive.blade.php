<div>
    <div class="flex max-w-7xl mx-auto">
        <div class="flex flex-col gap-4">
            
            <div class="py-12">
                <h1 class="text-3xl font-bold mb-6">Søg efter firma</h1>
                <form wire:ignore>
                    <input type="text" class="w-full h-10 rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 " placeholder="Search for a company...">
                </form>
            </div>
            
            <ul class="flex flex-wrap gap-4 ">
                <li>
                    <a href="" class="block px-4 py-2 border-b-2 border-white hover:border-primary">Fritid</a>
                </li>
                <li>
                    <a href="" class="block px-4 py-2 border-b-2 border-white hover:border-primary">Arbejde</a>
                </li>
                <li>
                    <a href="" class="block px-4 py-2 border-b-2 border-white hover:border-primary">Mad/Drikke</a>
                </li>
                <li>
                    <a href="" class="block px-4 py-2 border-b-2 border-white hover:border-primary">Hobby</a>
                </li>
            </ul>
        </div>
    </div>

    <livewire:components.articles-archive />
</div>


