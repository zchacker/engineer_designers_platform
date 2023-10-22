<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شركة رشيد العجيان</title>
    <!-- <link rel="stylesheet" href="assets/css/tailwind.css"> -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body>

    <!-- header  -->
    <section class="bg-black z-20">
        <div class="container max-w-full mx-auto px-4">
            <!-- <nav class="flex-wrap lg:flex items-center py-14 pb-16 xl:relative z-50 h-40" x-data="{navbarOpen:false}" :class="{'h-20':!navbarOpen,'h-[470px]':navbarOpen}"> -->
            <nav class="flex-wrap md:flex items-center justify-between py-4 z-50" x-data="{navbarOpen:false}" :class="{'block':navbarOpen}">

                <div class="flex items-center justify-between mb-10 lg:mb-0">
                    <button class="lg:hidden w-10 h-10 ml-auto flex items-center justify-center stroke-white text-white border border-white rounded-md" @click="navbarOpen = !navbarOpen">
                        <i data-feather="menu"></i>
                    </button>

                    <a href="{{ route('home') }}">
                        <img src="{{asset('imgs/image/logo.png')}}" alt="Logo img" class="w-20">
                    </a>
                </div>

                <ul class="md:flex flex-col md:flex-row justify-between md:gap-16" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                    <!-- <ul class="md:flex flex-col-reverse lg:flex-row text-right lg:items-center lg:mx-auto gap-6 justify-around" :class="{'hidden':!navbarOpen,'flex':navbarOpen}"> -->

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'about') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('about') }}">{{ __('public')['about'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'services') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('services') }}">{{ __('public')['services'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'projects') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('projects') }}">{{ __('public')['projects'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'contact') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('contact-us') }}">{{ __('public')['contact'] }}</a>
                    </li>

                </ul>

                @if (!auth('client')->check() && !auth('engineer')->check() && !auth('admin')->check())
                <div class="md:flex grid gap-4 space-y-4 justify-start items-center">
                    <!-- <a href="{{ route('login') }}" class="font-semibold bg-yellow-300 p-4 rounded-md text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">{{ __('public')['sigin'] }}</a> -->
                    <a href="{{ route('register.user') }}" class="px-4 py-3 lg:block rounded-md border-0 border-yellow-300 font-semibold text-lg text-white bg-yellow-300 hover:bg-green-700 hover:text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        {{ __('public')['sigin'] }}
                    </a>
                </div>
                @elseif(auth('engineer')->check())
                <div class="md:flex grid gap-4 space-y-4 justify-start items-center">
                    <a href="{{ route('engineer.orders.list') }}" class="px-4 py-3 lg:block rounded-md border-0 border-yellow-300 font-semibold text-lg text-white bg-yellow-300 hover:bg-green-700 hover:text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        {{__('public')['controll_panel']}}
                    </a>
                </div>
                @elseif(auth('client')->check())
                <div class="md:flex grid gap-4 space-y-4 justify-start items-center">
                    <a href="{{ route('client.engineers.list') }}" class="px-4 py-3 lg:block rounded-md border-0 border-yellow-300 font-semibold text-lg text-white bg-yellow-300 hover:bg-green-700 hover:text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        {{__('public')['controll_panel']}}
                    </a>
                </div>
                @elseif(auth('admin')->check())
                <div class="md:flex grid gap-4 space-y-4 justify-start items-center">
                    <a href="{{ route('admin.engineers.list') }}" class="px-4 py-3 lg:block rounded-md border-0 border-yellow-300 font-semibold text-lg text-white bg-yellow-300 hover:bg-green-700 hover:text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        {{__('public')['controll_panel']}}
                    </a>
                </div>
                @endif

            </nav>
        </div>
    </section>