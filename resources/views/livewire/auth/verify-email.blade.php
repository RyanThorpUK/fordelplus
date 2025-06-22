<div class="mt-4 flex flex-col gap-6">
    <flux:heading level="2" class="text-center">
        {{ __('Vi har sendt dig en bekræftelsesmail.') }}
    </flux:heading>

    <flux:text class="text-center">
        {{ __('Klik på linket i e-mailen for at bekræfte din adresse.') }}
    </flux:text>

    <flux:text class="text-center">
        {{ __('Hvis du ikke modtager mailen, kan du få den sendt igen ved at klikke her:') }}
    </flux:text>

    @if (session('status') == 'verification-link-sent')
        <flux:text class="text-center font-medium !text-green-600">
            {{ __('Et nyt bekræftelseslink er blevet sendt til den e-mailadresse, du angav under registreringen.') }}
        </flux:text>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <button wire:click="sendVerification" variant="primary" class="w-full btn btn--primary">
            {{ __('Send bekræftelsesmail igen') }}
        </button>

        <flux:link class="text-sm cursor-pointer" wire:click="logout">
            {{ __('Log ud') }}
        </flux:link>
    </div>
</div>
