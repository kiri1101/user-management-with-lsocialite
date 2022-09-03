<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ Config::get('app.name') }} - {{ $title }}</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles

        <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        html {
            font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        </style>
    </head>

    <body class="m-6 leading-normal tracking-normal text-indigo-400 bg-fixed bg-cover" style="background-image: url('{{ asset('maintenance/header.png') }}');">
        
        <main>
            @yield('content')
        </main>

        @livewireScripts
    </body>
</html>
