<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
            <div class="px-4 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header> --}}
        
        <div class="flex flex-row mx-0 mt-3 bg-gray-100 md:mx-5">
            <aside class="flex flex-col w-16 md:w-[12rem] justify-between" aria-label="Left-Sidebar">
                @include('partials.sidebar.right')
            </aside>

            <!-- Page Content -->
            <main class="grid w-auto grid-cols-1 gap-3 mx-3 md:grid-cols-2 flex-nowrap md:flex-wrap">
                {{ $slot }}
            </main>

            {{-- Right Sidebar --}}
            <aside class="flex flex-col hidden w-16 md:block md:w-[12rem]" aria-label="Right-Sidebar">
                @include('partials.sidebar.left')
            </aside>
        </div>

        {{-- Footer Section Code --}}
            @include('partials.footer')
        {{-- End of Footer --}}
        
        @yield('script')
        @livewireScripts
    </body>
</html>
