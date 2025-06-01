<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="bg-primary">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('admin.all-offers') }}" class="mr-5 flex items-center space-x-2 py-3" wire:navigate>
                <div class="grid flex-1 text-left text-3xl border-b border-white pb-4">
                    <img src="/img/fordelplus_logo_2.svg" alt="FordelPlus" class="h-7">
                </div>
            </a>

            <flux:navlist variant="outline">
                {{-- <flux:navlist.group :heading="__('Platform')" class="grid"> --}}
                    <flux:navlist.item :href="route('admin.all-offers')" :current="request()->routeIs('admin.all-offers')" wire:navigate>{{ __('Alle tilbud') }}</flux:navlist.item>

                    <flux:navlist.item :href="route('admin.users')" :current="request()->routeIs('admin.users')" wire:navigate>{{ __('Brugere') }}</flux:navlist.item>

                    <flux:navlist.item :href="route('admin.business-info')" :current="request()->routeIs('admin.business-info')" wire:navigate>{{ __('Virksomhedsinfo') }}</flux:navlist.item>

                    <flux:navlist.item :href="route('admin.online-profil')" :current="request()->routeIs('admin.online-profil')" wire:navigate>{{ __('Online Profil') }}</flux:navlist.item>
                {{-- </flux:navlist.group> --}}
            </flux:navlist>

            <flux:spacer />

            {{-- <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist> --}}

            <!-- Desktop User Menu -->
            
            @livewire('sidebar-selector')

        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log ud') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
