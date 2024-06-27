<!DOCTYPE html>
@if(app()->getLocale() == 'ar')
<html lang="ar" dir="rtl">
@else
<html lang="en" dir="ltr">
@endif

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KVHWK9BT');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $page->description ?? '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page->title ?? "شركة رشيد العجيان"}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('imgs/icon.ico')}}">
    <!-- <link rel="stylesheet" href="assets/css/tailwind.css"> -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link defer rel="preconnect" href="https://fonts.googleapis.com">
    <link defer rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link async href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link async href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link async href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
    <script async src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> <!--defer-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Include Lightbox2 CSS-->
    <link defer href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>

    <!-- Swiper CSS -->
    {{--<link defer rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">--}}
    <link defer rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        .swiper-container {
            width: 100%;
            max-width: 1100px;
            overflow: hidden;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
        }

        .star {
            color: #ffd700;
            /* Gold color */
        }

        /* .hidden { display: none; } */
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVHWK9BT" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- header  -->
    <section class="bg-black z-20">
        <div class="container max-w-full mx-auto px-4">
            <!-- <nav class="flex-wrap lg:flex items-center py-14 pb-16 xl:relative z-50 h-40" x-data="{navbarOpen:false}" :class="{'h-20':!navbarOpen,'h-[470px]':navbarOpen}"> -->
            <nav class="flex-wrap md:flex items-center justify-between py-4 z-50" x-data="{navbarOpen:false}" :class="{'block':navbarOpen}">

                <!-- this for mobile only  -->
                <div class="flex items-center justify-center mb-0 lg:mb-0">
                    
                    @if(app()->getLocale() != 'ar')
                    <button class="lg:hidden w-10 h-10 mr-auto flex items-center justify-center stroke-white text-white border border-white rounded-md" @click="navbarOpen = !navbarOpen">
                    @else
                    <button class="lg:hidden w-10 h-10 ml-auto flex items-center justify-center stroke-white text-white border border-white rounded-md" @click="navbarOpen = !navbarOpen">
                    @endif
                        <i data-feather="menu"></i>
                    </button>                    

                    <a href="{{ route('home') }}" class="flex items-center justify-center text-center w-[33%] md:w-full">
                        <img src="{{asset('imgs/image/logo.png')}}" alt="Logo img" class="w-20">
                    </a>

                    <div class="flex justify-end items-center space-x-2 w-[33%]">

                        <div class="relative md:hidden">
                            <button id="searchButton" class="p-2">
                                <img src="{{ asset('imgs/image/search.png') }}" class="h-6" alt="">
                            </button>
                            <div id="searchInputContainer" class="hidden absolute top-full left-0 mt-2 w-64 bg-white shadow-lg p-2 rounded z-50">
                                <input id="searchInput" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Search...">
                            </div>
                        </div>


                        @if (!auth('client')->check() && !auth('engineer')->check() && !auth('admin')->check())
                        <div class="relative md:hidden">
                            <!-- <a href="{{ route('login') }}" class="font-semibold bg-yellow-300 p-4 rounded-md text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">{{ __('public')['sigin'] }}</a> -->
                            <a href="{{ route('login', app()->getLocale() ) }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                                {{-- __('public')['sigin'] --}}
                                <img src="{{ asset('imgs/image/account.png') }}" class="h-6" alt="">
                            </a>
                        </div>
                        @elseif(auth('engineer')->check())
                        <div class="relative md:hidden">
                            <a href="{{ route('engineer.orders.list') }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                                <img src="{{ asset('imgs/image/account.png') }}" class="h-6" alt="">
                            </a>
                        </div>
                        @elseif(auth('client')->check())
                        <div class="relative md:hidden">
                            <a href="{{ route('client.engineers.list') }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                                <img src="{{ asset('imgs/image/account.png') }}" class="h-6" alt="">
                            </a>
                        </div>
                        @elseif(auth('admin')->check())
                        <div class="relative md:hidden">
                            <a href="{{ route('admin.engineers.list') }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                                <img src="{{ asset('imgs/image/account.png') }}" class="h-6" alt="">
                            </a>
                        </div>
                        @elseif(auth('editor')->check())
                        <div class="relative md:hidden">
                            <a href="{{ route('editor.post.list') }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                                <img src="{{ asset('imgs/image/account.png') }}" class="h-6" alt="">
                            </a>
                        </div>
                        @endif

                        <div class="relative md:hidden">
                            @if(app()->getLocale() == 'ar')
                            <a href="{{ route(request()->route()->getName(), ['locale' => 'en'] + request()->route()->parameters()) }}" class="text-white">EN</a>
                            <!-- <a href="{{ route('language.switch' , 'en') }}">English</a> -->
                            @else
                            <a href="{{ route(request()->route()->getName(), ['locale' => ''] + request()->route()->parameters()) }}" class="text-white">ع</a>
                            <!-- <a href="{{ route('language.switch' , 'ar') }}">عربي</a> -->
                            @endif
                        </div>
                    </div>

                </div>

                <ul class="hidden md:flex flex-col md:flex-row justify-between md:gap-8" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                    <!-- <ul class="md:flex flex-col-reverse lg:flex-row text-right lg:items-center lg:mx-auto gap-6 justify-around" :class="{'hidden':!navbarOpen,'flex':navbarOpen}"> -->

                    @if(app()->getLocale() != 'ar')


                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'home') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('home', app()->getLocale()) }}">{{ __('public')['home'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'about') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('about', app()->getLocale()) }}">{{ __('public')['about'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'services') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('services', app()->getLocale()) }}">{{ __('public')['services'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'projects') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('projects', app()->getLocale()) }}">{{ __('public')['projects'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'engineers') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('engineers', app()->getLocale()) }}">{{ __('public')['engineers'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'blog') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{route('blog.list', app()->getLocale())}}"> {{ __('public')['blog'] }} </a>
                    </li>

                    {{--
                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'projects') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('projects', app()->getLocale()) }}">{{ __('public')['ads'] }}</a>
                    </li>
                    --}}


                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'contact') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('contact-us', app()->getLocale()) }}">{{ __('public')['contact'] }}</a>
                    </li>

                    @else

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'home') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('home' ) }}">{{ __('public')['home'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'about') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('about') }}">{{ __('public')['about'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'services') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('services') }}">{{ __('public')['services'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'projects') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('projects') }}">{{ __('public')['projects'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'engineers') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('engineers') }}">{{ __('public')['engineers'] }}</a>
                    </li>

                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'blog') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{route('blog.list')}}"> {{ __('public')['blog'] }} </a>
                    </li>

                    {{--
                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'projects') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('projects') }}">{{ __('public')['ads'] }}</a>
                    </li>
                    --}}


                    <li class="font-semibold text-white hover:text-yellow-300 @if(@$active == 'contact') active_page @endif transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('contact-us') }}">{{ __('public')['contact'] }}</a>
                    </li>

                    @endif


                </ul>

                <div class="flex items-center">

                    <div class="relative hidden md:block">
                        <button id="searchButton" class="p-2">
                            <img src="{{ asset('imgs/image/search.png') }}" class="h-8" alt="">
                        </button>
                        <div id="searchInputContainer" class="hidden absolute top-full left-0 mt-2 w-64 bg-white shadow-lg p-2 rounded z-50">
                            <input id="searchInput" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Search...">
                        </div>
                    </div>


                    @if (!auth('client')->check() && !auth('engineer')->check() && !auth('admin')->check())
                    <div class="hidden md:flex gap-4 space-y-4 justify-start items-center">
                        <!-- <a href="{{ route('login') }}" class="font-semibold bg-yellow-300 p-4 rounded-md text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">{{ __('public')['sigin'] }}</a> -->
                        <a href="{{ route('login', app()->getLocale() ) }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                            {{-- __('public')['sigin'] --}}
                            <img src="{{ asset('imgs/image/account.png') }}" class="h-8" alt="">
                        </a>
                    </div>
                    @elseif(auth('engineer')->check())
                    <div class="hidden md:flex gap-4 space-y-4 justify-start items-center">
                        <a href="{{ route('engineer.orders.list') }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                            <img src="{{ asset('imgs/image/account.png') }}" class="h-8" alt="">
                        </a>
                    </div>
                    @elseif(auth('client')->check())
                    <div class="hidden md:flex gap-4 space-y-4 justify-start items-center">
                        <a href="{{ route('client.engineers.list') }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                            <img src="{{ asset('imgs/image/account.png') }}" class="h-8" alt="">
                        </a>
                    </div>
                    @elseif(auth('admin')->check())
                    <div class="hidden md:flex gap-4 space-y-4 justify-start items-center">
                        <a href="{{ route('admin.engineers.list') }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                            <img src="{{ asset('imgs/image/account.png') }}" class="h-8" alt="">
                        </a>
                    </div>
                    @elseif(auth('editor')->check())
                    <div class="hidden md:flex gap-4 space-y-4 justify-start items-center">
                        <a href="{{ route('editor.post.list') }}" class="px-4 py-3 lg:block font-semibold text-lg text-white tansition ease-linear duration-500" >
                            <img src="{{ asset('imgs/image/account.png') }}" class="h-8" alt="">
                        </a>
                    </div>
                    @endif

                    <div class="mx-2 md:block hidden">
                        @if(app()->getLocale() == 'ar')
                        <a href="{{ route(request()->route()->getName(), ['locale' => 'en'] + request()->route()->parameters()) }}" class="text-white">EN</a>
                        <!-- <a href="{{ route('language.switch' , 'en') }}">English</a> -->
                        @else
                        <a href="{{ route(request()->route()->getName(), ['locale' => ''] + request()->route()->parameters()) }}" class="text-white">ع</a>
                        <!-- <a href="{{ route('language.switch' , 'ar') }}">عربي</a> -->
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </section>