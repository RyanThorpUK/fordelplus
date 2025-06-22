<div class="px-6 md:px-10 gap-12 h-full relative ">
  <div class="overflow-y-auto pb-20 h-full pb-12 scrollbar">
    <div class="flex flex-wrap justify-between items-center">
      <h2 class="text-2xl font-semibold">{{ $offer->name }}</h2>
      <button class="rounded-full bg-white flex justify-center items-center w-10 h-10 border border-gray-200 shadow-sm"
        wire:click="$dispatch('slide-over.close', { force: true })">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-x">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    <div class="mt-4 grid gap-4 sm:mt-8 grid-cols-6 grid-rows-2">
      <div class="relative col-span-4 row-span-2">
        <div class="max-h-96 relative flex h-full flex-col overflow-hidden rounded-3xl shadow-lg">
          <img src="{{ Storage::url($offer->image) }}" class="w-full h-full object-cover">
        </div>
      </div>
      <div class="relative col-span-2">
        <div class="absolute inset-px rounded-3xl bg-white "></div>
        <div class="relative flex items-center justify-center h-full flex-col overflow-hidden rounded-3xl">
          <p class="mt-2 text-2xl md:text-5xl font-semibold tracking-tight !text-[#DD803E] text-center">
            @if ( $offer->highlight )
            {{ $offer->highlight }}{{ $offer->highlight_type === 'price' ? 'Kr.' : '%' }}
            @else
            kontakt
            @endif
          </p>
        </div>
        <div
          class="pointer-events-none absolute inset-px rounded-3xl shadow-lg ring-1 ring-black/5  border border-[#DD803E] border-dashed">
        </div>
      </div>
      <div class="relative col-span-2">
        <div class="bg-white relative flex items-center justify-center h-full flex-col overflow-hidden rounded-3xl p-6">
          <a href="{{ route('company.show', $offer->company->ulid) }}" class="flex items-center justify-center">
            <img class="object-contain max-h-24" src="{{ Storage::url($offer->company->logo) }}"
              alt="{{ $offer->company->name }}">
          </a>
        </div>
        <div class="pointer-events-none absolute inset-px rounded-3xl shadow-lg ring-1 ring-black/5"></div>
      </div>
    </div>
    <div class="mt-12">
      <p class="text-base md:text-lg">{{ $offer->description }}</p>
    </div>
    <div class="mt-12">
      <dl class="mt-16 divide-y divide-gray-900/10">
        <div class="js--accordion-item // py-3 first:pt-0 last:pb-0">
          <dt>
            <!-- Expand/collapse question button -->
            <button type="button"
              class="js--accordion-item-btn // flex w-full items-start justify-between text-left text-gray-900 cursor-pointer overflow-hidden"
              aria-controls="faq-0" aria-expanded="false">
              <span class="text-base/7 font-semibold">Hvordan bruger jeg rabatkoden?</span>
              <span class="ml-6 flex h-7 items-center">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
                <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                </svg>
              </span>
            </button>
          </dt>
          <dd class="js--accordion-item-content // mt-2 pr-12 hidden" id="faq-0">
            <p class="text-sm md:text-base/7 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Quas
              cupiditate
              laboriosam fugiat.</p>
          </dd>
        </div>

        <div class="js--accordion-item // py-3 first:pt-0 last:pb-0 overflow-hidden">
          <dt>
            <!-- Expand/collapse question button -->
            <button type="button"
              class="js--accordion-item-btn // flex w-full items-start justify-between text-left text-gray-900 cursor-pointer"
              aria-controls="faq-0" aria-expanded="false">
              <span class="text-base/7 font-semibold">
                Kan jeg bruge rabatkoden mere end én gang?</span>
              <span class="ml-6 flex h-7 items-center">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
                <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                </svg>
              </span>
            </button>
          </dt>
          <dd class="js--accordion-item-content // mt-2 pr-12 hidden" id="faq-0">
            <p class="text-sm md:text-base/7 text-gray-600">I don&#039;t know, but the flag is a big plus. Lorem ipsum
              dolor sit
              amet
              consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.</p>
          </dd>
        </div>

        <div class="js--accordion-item // py-3 first:pt-0 last:pb-0 overflow-hidden">
          <dt>
            <!-- Expand/collapse question button -->
            <button type="button"
              class="js--accordion-item-btn // flex w-full items-start justify-between text-left text-gray-900 cursor-pointer"
              aria-controls="faq-0" aria-expanded="false">
              <span class="text-base/7 font-semibold">Endnu et spørgsmål her?</span>
              <span class="ml-6 flex h-7 items-center">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
                <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                </svg>
              </span>
            </button>
          </dt>
          <dd class="js--accordion-item-content // mt-2 pr-12 hidden" id="faq-0">
            <p class="text-sm md:text-base/7 text-gray-600">I don&#039;t know, but the flag is a big plus. Lorem ipsum
              dolor sit
              amet
              consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.</p>
          </dd>
        </div>
      </dl>
    </div>
  </div>

  <div class="bg-offset-tan mt-12 px-6 md:px-10 absolute bottom-0 left-0 right-0 flex flex-col md:flex-row gap-4">
    @if ($offer->offer_type === 'discount-code')

    @if ($offer->offer_code)
    <div class="relative js--offer-code w-full rounded-3xl border-2 border-[#DD803E] z-10">
      <div
        class="flex items-center justify-center text-xs px-3 py-1 rounded-tl-3xl rounded-bl-3xl bg-[#DD803E] absolute left-0 top-0 h-full text-white -z-10 -ml-[2px]">
        RABAT<br />
        KODE
      </div>
      <button type="text"
        class="js--offer-code-btn // relative outline-none border-none font-semibold px-4 py-2 w-full h-12"
        value="{{ $offer->offer_code }}"> <span class="js--offer-code-value">{{ $offer->offer_code }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#DD803E"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="absolute top-1/2 right-4  -translate-y-1/2">
          <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
          <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
        </svg>
      </button>
      <div
        class="js--offer-code-copied // hidden bg-primary drop-shadow-md text-white px-4 py-2 border-2 border-primary text-center absolute mt-2 left-1/2 -translate-x-1/2 bottom-full transition-opacity duration-300 ">
        <span
          class="w-4 h-4 absolute bg-primary transform rotate-45 left-1/2 -translate-x-1/2 bottom-0 -translate-y-1/2 top-full"></span>
        Kopieret
      </div>
    </div>
    @endif

    <a class="btn btn--primary flex items-center justify-center w-full text-center h-12" href="{{ $offer->offer_link }}"
      target="_blank">
      Benyt tilbud
    </a>

    @else
    <button class="btn btn--primary flex items-center justify-center w-full text-center h-12" wire:click="$dispatch('slide-over.open', { component: 'offer-contact-slideover',  arguments: {
            offer_ulid: '{{ $offer->ulid }}'
        }})">
      Bliv kontaktet
    </button>
    @endif

  </div>
</div>