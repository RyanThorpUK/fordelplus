<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Opret en bruger')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <div class="grid grid-cols-2 gap-6">
            <div class="">
                <label class="text-sm font-medium text-black mb-1 block">Navn</label>
                @error('first_name') 
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
                <input 
                    type="text" 
                    placeholder="Navn"
                    wire:model="first_name" 
                    class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('first_name') border-red-500 @enderror">
            </div>
            <div class="">
                <label class="text-sm font-medium text-black mb-1 block">Efternavn</label>
                @error('last_name') 
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
                <input 
                    type="text" 
                    placeholder="Efternavn"
                    wire:model="last_name"
                    class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2  @error('last_name') border-red-500 @enderror">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2">
                <label class="text-sm font-medium text-black mb-1 block">Email</label>
                @error('email') 
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
                <input 
                    type="email" 
                    placeholder="Email"
                    wire:model="email" 
                    class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('email') border-red-500 @enderror">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2">
                <label class="text-sm font-medium text-black mb-1 block">kodeord</label>
                @error('password') 
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
                <input 
                    type="password" 
                    placeholder="kodeord"
                    wire:model="password" 
                    class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('password') border-red-500 @enderror">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2">
                <label class="text-sm font-medium text-black mb-1 block">Gentag kodeord</label>
                @error('password_confirmation') 
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
                <input 
                    type="password" 
                    placeholder="Gentag kodeord"
                    wire:model="password_confirmation" 
                    class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-[#E3EBF5] p-2 @error('password_confirmation') border-red-500 @enderror">
            </div>
        </div>

        <div class="flex items-center justify-end ">
            <button type="submit" class="btn btn--primary w-full">
                {{ __('Opret en bruger') }}
            </button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600">
        {{ __('Har du allerade en bruger?') }}
        <a href="{{ route('login') }}" class="text-black underline" wire:navigate>{{ __('Log ind') }}</a>
    </div>
</div>
