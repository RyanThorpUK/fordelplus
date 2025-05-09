<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white ">
        
        @include('components.layouts.partials.nav')

        <div>
          {{ $slot }}
        </div>

        @include('components.layouts.partials.footer')

        @fluxScripts

        
    </body>
</html>
