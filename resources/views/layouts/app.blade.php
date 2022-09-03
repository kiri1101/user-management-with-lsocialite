<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @include('layouts.navigation')

        @include('partials.alerts')

        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
            <div class="px-4 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header> --}}
        
        <div class="flex flex-row mx-0 my-3 bg-gray-100 md:mx-5">
            <aside class="flex flex-col w-16 md:w-[12rem] justify-between" aria-label="Left-Sidebar">
                @include('partials.sidebar.right')
            </aside>

            <!-- Page Content -->
            <main class="grid w-auto grid-cols-1 gap-4 mx-3 md:grid-cols-2">
                {{ $slot }}
            </main>

            {{-- Left Sidebar --}}
            @if (url()->current()==route('dashboard'))
                <aside class="hidden overflow-hidden lg:block" aria-label="Right-Sidebar">
                    <div class="flex flex-col lg:w-52">
                        @include('partials.sidebar.left')
                    </div>
                </aside>
            @endif
        </div>

        {{-- Footer Section Code --}}
            @include('partials.footer')
        {{-- End of Footer --}}
        
        @yield('script')
        @livewireScripts
    </body>
</html>
