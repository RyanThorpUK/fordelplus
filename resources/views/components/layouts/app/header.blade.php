<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white ">
      
        <flux:header container class="bg-white py-3">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <a href="/" class="mr-5 flex items-center space-x-2 lg:ml-0" wire:navigate>
              <div class="grid flex-1 text-left text-3xl">
                <img src="/img/fordelplus_logo_1.svg" alt="FordelPlus" class="h-6">
              </div>
            </a>

            <flux:navbar class="-mb-px max-lg:hidden">
                <flux:navbar.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Markedsplads') }}
                </flux:navbar.item>
                <flux:navbar.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Firmaer') }}
                </flux:navbar.item>
                <flux:navbar.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Min side') }}
                </flux:navbar.item>
            </flux:navbar>

            <flux:spacer />

            {{-- <flux:navbar class="mr-1.5 space-x-0.5 py-0!">
                <flux:tooltip :content="__('Search')" position="bottom">
                    <flux:navbar.item class="!h-10 [&>div>svg]:size-5" icon="magnifying-glass" href="#" :label="__('Search')" />
                </flux:tooltip>
                <flux:tooltip :content="__('Repository')" position="bottom">
                    <flux:navbar.item
                        class="h-10 max-lg:hidden [&>div>svg]:size-5"
                        icon="folder-git-2"
                        href="https://github.com/laravel/livewire-starter-kit"
                        target="_blank"
                        :label="__('Repository')"
                    />
                </flux:tooltip>
                <flux:tooltip :content="__('Documentation')" position="bottom">
                    <flux:navbar.item
                        class="h-10 max-lg:hidden [&>div>svg]:size-5"
                        icon="book-open-text"
                        href="https://laravel.com/docs/starter-kits"
                        target="_blank"
                        label="Documentation"
                    />
                </flux:tooltip>
            </flux:navbar> --}}

            <!-- Desktop User Menu -->
            @if (auth()->user())
            <flux:dropdown position="top" align="end">
                <flux:profile
                    class="cursor-pointer"
                    :initials="auth()->user()->initials()"
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
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
            @endif
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 bg-white py-3" wire:navigate>
              <div class="grid flex-1 text-left text-3xl">
                    <img src="/img/fordelplus_logo_2.svg" alt="FordelPlus" class="h-9">
              </div>
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')">
                    <flux:navlist.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>

        <div>
          {{ $slot }}
        </div>

        @fluxScripts

        <footer class="bg-primary">
            <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
              <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div>
                  <img class="h-9" src="/img/fordelplus_logo_2.svg" alt="FordelPlus">
                  <ul>
                    <li>
                      <a href="#" class="text-sm/6 text-white hover:text-gray-900">
                        
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="mt-16 col-span-2 xl:mt-0">
                  <div class="md:grid md:grid-cols-3 md:gap-8">
                    <div class="mt-10 md:mt-0">
                      <h3 class="text-sm/6 font-semibold text-white">Kontakt</h3>
                      <ul role="list" class="mt-6 space-y-2">
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">info@fordelplus.dk</a>
                        </li>
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">+45 70 34 56 11</a>
                        </li>
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">mandag–fredag</a>
                        </li>
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">08:00–16:00</a>
                        </li>
                      </ul>
                    </div>
                    <div>
                      <h3 class="text-sm/6 font-semibold text-white">Hjælp</h3>
                      <ul role="list" class="mt-6 space-y-2">
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">Kontakt</a>
                        </li>
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">Bliv partner</a>
                        </li>
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">Persondatapolitik</a>
                        </li>
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">Terms & Conditions</a>
                        </li>
                      </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                      <h3 class="text-sm/6 font-semibold text-white">Links</h3>
                      <ul role="list" class="mt-6 space-y-2">
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">Forside</a>
                        </li>
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">Om os</a>
                        </li>
                        <li>
                          <a href="#" class="text-sm/6 text-white hover:text-gray-900">Kontaktformular</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </footer>
    </body>
</html>
