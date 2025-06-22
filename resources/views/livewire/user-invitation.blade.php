<div class="">
    <button class="btn btn---primary !rounded-lg" wire:click="togglePrompt">
        {{ $type == 'employees' ? 'Få oprettelses link' : 'Tilføj ny admin' }}
    </button>

    @if ( $type == 'employees' && $prompt )
    <div class="bg-white rounded-lg drop-shadow-sm p-4 max-w-md w-full absolute top-12 right-0">
        <input type="text" class="mt-1 w-full rounded-lg bg-[#f6f6f3] p-2" value="{{ url('/register?token=' . $token) }}" />
    </div>
    @endif

    @if ( $type == 'managers' && $prompt )
    <div class="bg-white rounded-lg drop-shadow-sm p-4 max-w-md w-full absolute top-12 right-0">
        @if (!session()->has('message'))
        <label for="email" class="text-sm text-black">Tilføj admin</label>
        <div class="relative mt-1">
          <form wire:submit="sendInvitation">
            <input type="text" id="email" wire:model="inviteEmail" class=" w-full rounded-lg bg-[#f6f6f3] p-2" placeholder="Email address" />
            <button class="btn btn---primary !rounded-lg !py-1 absolute right-1 top-1/2 -translate-y-1/2">
                Tilføj admin
            </button>
          </form>
       </div>
       @else
        {{ session('message') }}
       @endif
    </div>
    @endif
</div>