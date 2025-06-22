<div>
    <a href="{{ route('home') }}" class="flex flex-row items-center justify-between mb-2 py-2 text-sm font-medium text-primary-200">
        Gå til platform
        <svg class="mr-6" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </a>
    <flux:dropdown position="bottom" align="start" class="bg-white rounded-md">
        <flux:profile
            :name="auth()->user()->company->name ?? 'Ingen virksomhed' "
            :initials="auth()->user()->initials()"
            icon-trailing="chevrons-up-down"
        />

        <flux:menu class="w-[220px] h-[650px]">
            <flux:menu.radio.group>
                <div class="p-0 text-sm font-normal">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                            <span
                                class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black"
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

            @if ( auth()->user()->hasRole('admin') || auth()->user()->companies->count() > 1 )
            <flux:menu.radio.group class="h-64 overflow-y-auto">
                @if ( auth()->user()->hasRole('admin') )
                    @foreach (\App\Models\Company::all() as $company)
                        <button type="button" class="flex items-center px-2 py-1.5 w-full focus:outline-hidden rounded-md text-start text-sm font-medium text-zinc-800 data-active:bg-zinc-50 **:data-flux-menu-item-icon:text-zinc-400" data-flux-menu-item="data-flux-menu-item" 
                        wire:click="selectCompany({{ $company->id }})"
                        data-flux-menu-item-has-icon="data-flux-menu-item-has-icon" wire:navigate="" id="lofi-menu-item-920162fee52e08" role="menuitem" tabindex="-1">
                        {{ $company->name }}
                        </button>
                    @endforeach
                @elseif ( auth()->user()->companies->count() > 1 )
                    @foreach (auth()->user()->companies as $company)
                    <button type="button" class="flex items-center px-2 py-1.5 w-full focus:outline-hidden rounded-md text-start text-sm font-medium  text-zinc-800 data-active:bg-zinc-50 **:data-flux-menu-item-icon:text-zinc-400" data-flux-menu-item="data-flux-menu-item" 
                    wire:click="selectCompany({{ $company->id }})"
                    data-flux-menu-item-has-icon="data-flux-menu-item-has-icon" wire:navigate="" id="lofi-menu-item-920162fee52e08" role="menuitem" tabindex="-1">
                    {{ $company->name }}
                    </button>
                    @endforeach
                @endif
            </flux:menu.radio.group>
            @endif

            <flux:menu.separator />

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                    {{ __('Log ud') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</div>