<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
    <head>
        @include('partials.head')
    </head>
    <body class="bg-offset-tan">

        {{-- @include('components.layouts.partials.nav') --}}

        <div class="relative flex flex-col items-center justify-center gap-6 p-4 sm:p-6 md:p-10 h-screen">
            <div class="flex flex-col md:flex-row w-full">
                <div class="w-full md:w-1/2"></div>
                <div class="w-full md:w-1/2 flex items-center justify-center">
                    <div class="flex flex-col gap-6 max-w-sm w-full">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center justify-center absolute bottom-0 left-0 w-1/2 h-full overflow-hidden">
                <img src="{{ asset('img/auth/login.png') }}" alt="" class="mt-12">
                {{-- <img src="{{ asset('img/auth/login-bg.png') }}" alt="" class="w-full h-full object-cover"> --}}
            </div>
        </div>
        
        {{-- <div class="bg-[#F9FAFE] py-12 sm:py-24">
            <div class="flex flex-col md:flex-row max-w-7xl mx-auto px-4">
                <div class="w-full md:w-1/2 flex flex-wrap items-center mb-8 md:mb-0">
                    <div class="max-w-xl">
                        <h2 class="text-2xl sm:text-4xl font-bold text-primary mb-4 sm:mb-6">Vil du høre mere<br /> om vores platform?</h2>
                        <p class="text-base max-w-xl mb-4 sm:mb-6">Du er altid velkommen til at kontakte og for at høre mere omkring det vi tilbyder og hvilke fordele du kan forvente</p>
                        <a href="https://fordelplus.dk/kontakt/" target="_blank" class="btn bg-accent text-primary">Kontakt os her</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="rounded-3xl bg-primary px-6 sm:px-12 py-6 relative text-white">
                        <h3 class="text-xl sm:text-2xl font-extrabold mb-2">Du kan også ringe til os</h3>
                        <p class="text-secondary mb-2 sm:mb-4">Alle hverdage imellem 08.00 - 17.00</p>
                        <p class="text-lg sm:text-2xl font-bold">Ring: +45 22 44 22 44</p>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- @include('components.layouts.partials.footer') --}}

        @fluxScripts
    </body>
</html>
