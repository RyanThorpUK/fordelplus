<div class="px-8 py-12 bg-offset-tan h-screen">
    <livewire:components.notification />
    <div>
        <div class="flex justify-between items-center relative">
            <div class="flex items-center gap-2">
                <h1 class="text-3xl font-extrabold">Users</h1>
    
                <ul class="flex items-center gap-6 ml-6 pl-6">
                    <li class="border-l border-black pl-6">
                        <a href="{{ route('admin.users', ['type' => 'employees']) }}" class="text-sm text-gray-500 hover:text-sub-accent transition-colors duration-300 @if($type == 'employees') text-sub-accent @endif">Medlemmer</a>
                    </li>
                    <li class="border-l border-black pl-6">
                        <a href="{{ route('admin.users', ['type' => 'managers']) }}" class="text-sm text-gray-500 hover:text-sub-accent transition-colors duration-300 @if($type == 'managers') text-sub-accent @endif">{{ __('Admins') }}</a>
                    </li>
                </ul>
            </div>
    
            <div class="">
                <button class="btn btn--sub-accent" wire:click="togglePrompt">
                    {{ $type == 'employees' ? 'Få oprettelses link' : 'Tilføj ny admin' }}
                </button>
    
                @if ( $type == 'employees' && $prompt )
                <div class="bg-white rounded-lg drop-shadow-sm p-4 max-w-md w-full absolute top-12 right-0">
                    <input type="text" class="mt-1 w-full rounded-md bg-[#FAFAFC] border border-sub-accent p-2" value="{{ url('/register?token=' . $company->userInviteToken->token) }}" />
                </div>
                @endif

                @if ( $type == 'managers' && $prompt )
                <div class="bg-white rounded-lg drop-shadow-sm p-4 max-w-md w-full absolute top-12 right-0">
                    @if (!session()->has('message'))
                    <label for="email" class="text-sm text-black">Tilføj admin</label>
                    <div class="relative mt-1">
                      <form wire:submit="sendInvitation">
                        <input type="text" id="email" wire:model="inviteEmail" class=" w-full rounded-md bg-[#FAFAFC] border border-sub-accent p-2" placeholder="Email address" />
                        <button class="btn btn--sub-accent !py-1 absolute right-1 top-1/2 -translate-y-1/2">
                            Send indvitation
                        </button>
                      </form>
                   </div>
                   @else
                    {{ session('message') }}
                   @endif
                </div>
                @endif
            </div>
        </div>
    </div>

    
    <div class="mt-4">
        <div class="">
            <div class="grid grid-cols-4 w-full items-center px-2">
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
                                        Reset Password
                                    </span>
                                    <span wire:loading wire:target="sendResetLink('{{ $user->ulid }}')">
                                        Sending...
                                    </span>
                                </button>

                                <button class="text-sub-accent flex flex-wrap items-center no-underline cursor-pointer" 
                                wire:click="$dispatch('openModal', { component: 'modal-edit-users',  arguments: {
                                    user_ulid: '{{ $user->ulid }}'
                                } })"
                                 >
                                    Edit
                                </button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white px-2 py-4 border border-[#E0E5EE] rounded-md grid grid-cols-4 w-full items-center">
                        <div class="px-2">
                            <span>No users found</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
