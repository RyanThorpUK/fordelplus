<div class="mt-4 flex flex-col gap-6">
    <flux:text class="text-center">
        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
    </flux:text>

    @if (session('status') == 'verification-link-sent')
        <flux:text class="text-center font-medium !dark:text-green-400 !text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </flux:text>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <button wire:click="sendVerification" variant="primary" class="w-full btn btn--sub-accent">
            {{ __('Resend verification email') }}
        </button>

        <flux:link class="text-sm cursor-pointer" wire:click="logout">
            {{ __('Log ud') }}
        </flux:link>
    </div>
</div>
