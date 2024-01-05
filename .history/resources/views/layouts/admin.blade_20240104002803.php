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
    <body class="font-sans antialiased">
        <div class="relative min-h-screen md:flex" x-data="{ open: true }">
            <!-- sidebar -->
            <aside :class="{ '-translate-x-full': !open }" class="z-10 bg-blue-800 text-blue-100 w-64 px-2 py-4 absolute inset-y-0 left-0 md:relative transform  md:translate-x-0
                overflow-y-auto transition ease-in-out duration-200 shadow-lg">
                <!-- Logo -->
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center space-x-2">
                        <a href="">
                            <x-application-logo class="block h-10 w-auto fill-current text-blue-100" />
                        </a>
                        <span class="text-2xl font-extrabold">Admin</span>
                    </div>
                    <button type="button" @click="open =!open" class="md:hidden inline-flex p-2 items-center justify-center rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="block w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          
                    </button>
                </div>
                <!-- Nav links -->
                <nav>
                    <x-side-nav-link href="{{ route('dashboard') }}" :active="route()->rou">
                        Dashboard
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('features') }}">
                        Features
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('about') }}">
                        About
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('contact') }}">
                        Contact
                    </x-side-nav-link>

                </nav>
            </aside>
            <!-- Main content -->
            <main class="flex-1 bg-gray-100 h-screen">
                <nav class="bg-blue-900 shadow-lg">
                    <div class="mx-auto px-2 sm:px-6 lg:px-8">
                        <div class="relative flex items-center justify-between md:justify-end h-16">
                            <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                                <!-- Mobile button -->
                                <button type="button" @click="open =!open" @click.away="open=false" class="inline-flex items-center justify-center
                                    p-2 rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                      </svg>
                                      
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>
                <div>
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
