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
        <script src="{{url(mix('js/app.js'))}}"></script>
        <script src="{{url(mix('js/script.js'))}}"></script>
        <link rel="stylesheet" type="text/css" href="{{url(mix('css/app.css'))}}">
        <link rel="stylesheet" type="text/css" href="{{url(mix('css/common.css'))}}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-600">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="dark:text-white bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                @if (session('msg'))
                    <p class="msg"> {{session('msg')}}</p>
                @endif
                @if (session('error'))
                    <p class="error"> {{session('error')}}</p>
                @endif
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
