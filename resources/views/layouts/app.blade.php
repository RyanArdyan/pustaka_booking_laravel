<!DOCTYPE html>
{{-- {{ str_timpa('_', '-', aplikasi()->dapatkanLokal) }} --}}
{{-- panggil config/app lalu panggil get "locale" di dalamnya --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- mencetak csrf_token jika jquery minta csrf_token() --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Pustaka Booking</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Vite.js adalah alat pembuatan frontend yang cepat dan beropini yang digunakan untuk membangun aplikasi web.  --}}
        {{-- panggil kedua file berikut ini --}}
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            {{-- @termasuk_file tata_letak.navigasi --}}
            @include('layouts.navigation')

            {{-- jika ada $header --}}
            <!-- Page Heading -->
            @if (isset($header))
            {{-- cetak html berikut ini --}}
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{-- cetak header nya --}}
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{-- cetak slot atau konten atau anak nya --}}
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
