<div class="px-4 sm:px-8 py-12 bg-offset-tan h-screen">
    <livewire:components.notification />
    <div>
        <div class="flex justify-between items-center relative">
            <div class="flex flex-col md:flex-row  gap-2">
                <h1 class="text-3xl font-semibold">Users</h1>
    
                <ul class="flex  gap-6 md:ml-6">
                    <li class="">
                        <a href="{{ route('admin.users', ['type' => 'employees']) }}" class="cursor-pointer flex rounded-2xl px-4 py-1 sm:px-6 hover:bg-primary-100 hover:text-white transition-colors ease-in-out duration-300 text-xs md:text-base @if($type == 'employees') bg-primary text-white @else text-primary @endif">Medlemmer</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.users', ['type' => 'managers']) }}" class="cursor-pointer flex rounded-2xl px-4 py-1 sm:px-6 hover:bg-primary-100 hover:text-white transition-colors ease-in-out duration-300 text-xs md:text-base @if($type == 'managers') bg-primary text-white @else text-primary @endif">Admins</a>
                    </li>
                </ul>
            </div>
    
            <div class="hidden md:block">
                <livewire:user-invitation :type="$type" :token="$company->userInviteToken->token" />
            </div>
        </div>
    </div>

    
    <div class="mt-4">
        <div class="">
            <div class="grid-cols-4 w-full items-center px-2 hidden md:grid">
                <div class="px-2 py-1">
                    <span class="text-sm text-gray-500">Navn</span>
                </div>
                <div class="px-2 py-1">
                    <span class="text-sm text-gray-500">Email</span>
                </div>
    
                <div class="px-2 py-1">
                    <span class="text-sm text-gray-500">Type</span>
                </div>
                <div class="px-2 py-1">
                </div>
            </div>
            <div class="flex flex-col gap-y-2">
                @if( $users->count() )
                    @foreach($users as $index => $user)
                        <div class="bg-white px-2 py-4 shadow-sm rounded-md grid grid-cols-4 w-full items-center">
                            <div class="px-2">
                                <a href="" class="text-inherit font-semibold no-underline">{{ $user->first_name }} {{ $user->last_name }}</a>
                                    {{-- <span class="block text-xs text-gray-500">{{ $user->full_address }}</span> --}}
                            </div>
                            <div class="flex items-center px-2">
                                <a href="mailto:{{$user->email}}" class="text-inherit no-underline">{{ $user->email }}</a>
                            </div>
                            <div class="flex items-center px-2">
                                <a href="tel:{{$user->phone}}" class="text-inherit no-underline">{{ $user->phone }}</a>
                            </div>
                            <div class="flex items-center justify-end gap-x-4 px-2 text-sm">
                                <button 
                                    class="flex flex-wrap items-center underline" 
                                    wire:click="sendResetLink('{{ $user->ulid }}')"
                                    wire:loading.attr="disabled"
                                    wire:target="sendResetLink('{{ $user->ulid }}')"
                                >
                                    <span wire:loading.remove wire:target="sendResetLink('{{ $user->ulid }}')">
                                        Nulstil adgangskode
                                    </span>
                                    <span wire:loading wire:target="sendResetLink('{{ $user->ulid }}')">
                                        Sender...
                                    </span>
                                </button>

                                <button class="text-secondary hover:text-secondary-200 transition-colors duration-300 flex flex-wrap items-center no-underline cursor-pointer" 
                                wire:click="$dispatch('openModal', { component: 'modal-edit-users',  arguments: {
                                    user_ulid: '{{ $user->ulid }}'
                                } })"
                                 >
                                 Redigere
                                </button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white px-2 py-4 border border-[#E0E5EE] rounded-md grid grid-cols-4 w-full items-center">
                        <div class="px-2">
                            <span>Ingen brugere fundet</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
