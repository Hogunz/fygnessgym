<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    body {
        background-image: url('img/bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        /* Overlay */
        position: relative;
    }

    /* Overlay style */
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: -1;
    }

    main {
        font-family: 'Montserrat', sans-serif;
    }
</style>

<body class="overflow-auto w-full h-full relative dark:text-white bg-slate-500">
    @include('layouts.navigation')
    <div class="min-h-screen flex flex-col justify-between">
        <div class=" ">
            <header> @hasanyrole(['owner', 'admin'])
                    @role('owner')
                        @include('layouts.owner-sidebar')
                    @endrole
                    @role('admin')
                        @include('layouts.sidebar')
                    @endrole
                @else
                    @include('layouts.user-sidebar')
                @endhasanyrole
            </header>
            <main class=" mx-auto max-w-7xl">
                {{ $slot }}
            </main>
        </div>
        <!-- Page Content -->

        <div>
            @include('layouts.footer')
        </div>
    </div>

</body>

</html>
