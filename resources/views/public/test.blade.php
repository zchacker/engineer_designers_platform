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

                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('about') }}">{{ __('public')['about'] }}</a>
                    </li>

                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('services') }}">{{ __('public')['services'] }}</a>
                    </li>

                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('projects') }}">{{ __('public')['projects'] }}</a>
                    </li>

                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('contact-us') }}">{{ __('public')['contact'] }}</a>
                    </li>

                </ul>

                @if (!auth('client')->check() && !auth('engineer')->check() && !auth('admin')->check())
                <div class="md:flex grid gap-4 space-y-4 justify-start items-center">
                    <!-- <a href="{{ route('login') }}" class="font-semibold bg-yellow-300 p-4 rounded-md text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">{{ __('public')['sigin'] }}</a> -->
                    <a href="{{ route('register.user') }}" class="px-3 py-2 lg:block rounded-md border-0 border-yellow-300 font-semibold text-lg text-white bg-yellow-300 hover:bg-green-700 hover:text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        {{ __('public')['sigin'] }}
                    </a>
                </div>
                @elseif(auth('engineer')->check())
                <div class="md:flex grid gap-4 space-y-4 justify-start items-center">
                    <a href="{{ route('engineer.orders.list') }}" class="font-semibold bg-yellow-300 p-4 rounded-md text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        {{__('public')['controll_panel']}}
                    </a>
                </div>
                @elseif(auth('client')->check())
                <div class="md:flex grid gap-4 space-y-4 justify-start items-center">
                    <a href="{{ route('client.engineers.list') }}" class="font-semibold bg-yellow-300 p-4 rounded-md text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        {{__('public')['controll_panel']}}
                    </a>
                </div>
                @elseif(auth('admin')->check())
                <div class="md:flex grid gap-4 space-y-4 justify-start items-center">
                    <a href="{{ route('admin.engineers.list') }}" class="font-semibold bg-yellow-300 p-4 rounded-md text-white transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        {{__('public')['controll_panel']}}
                    </a>
                </div>
                @endif

            </nav>
        </div>
    </section>

    <!-- about  -->
    <div class="overflow-hidden">
        <section class="bg-white px-8 py-10 items-center relative">
            <div class="grid md:grid-cols-2 grid-cols-1">

                <div class="mt-8 md:mt-28 text-center xl:text-right z-20">
                    <h1 class="font-bold text-2xl md:text-3xl lg:text-4xl leading-normal text-gray-900 mb-6">{!! __('public')['hero_msg'] !!}</h1>
                    <p class="font-normal text-xl text-gray-800 leading-relaxed mb-12">{{__('public')['sub_hero']}}</p>
                    <a href="{{ route('register.user') }}" class="px-6 py-2 bg-yellow-400 text-white font-semibold text-lg rounded-md shadow-md hover:bg-green-900 transition ease-in-out duration-500">{{__('public')['start_now']}}</a>
                </div>

                <div class="z-10 relative top-10 md:block">
                    <img src="{{asset('imgs/image/home.png')}}" alt="Home img" :class="{'hidden':navbarOpen}" />
                </div>

                <div class=" sm:block md:visible md:absolute top-0 bottom-0 left-0 bg-yellow-300/70 w-1/3 bg-blend-color-dodge">

                </div>
            </div>
        </section>

        <section class="bg-[#1E1E1E]/80 py-2 rounded-r-lg shadow-2xl flex justify-start mr-12 px-4 items-center my-24 ">
            <div class="md:flex flex-1 items-center">
                <img src="{{ asset('imgs/image/about-img.png') }}" alt="">
                <div class="flex-col space-y-4">
                    <h2 class="text-white text-3xl font-bold">{{__('public')['get_know_us']}}</h2>
                    <p class="font-normal text-gray-50 text-md md:text-xl text-justify mb-16">{{__('public')['about_message']}}</p>
                </div>
                <div class="hidden md:block p-8 -ml-[300px] z-10">
                    <img src="{{ asset('imgs/image/box.png') }}" alt="" class="w-[800px]">
                </div>
            </div>
            <img src="{{ asset('imgs/image/lines.png') }}" class="hidden sm:block w-[320px] h-[400px] -ml-[40px] -mt-[200px] top-0" alt="">
        </section>
    </div>

    <!-- vision  -->
    <section class="bg-[#1E1E1E]/80 py-2 rounded-l-lg shadow-2xl flex justify-start ml-16 md:ml-52 px-4 items-center my-10">
        <div class="md:flex  items-center">
            <img src="{{ asset('imgs/image/about-img.png') }}" alt="">
            <div class="flex-col space-y-4">
                <h2 class="text-white text-3xl font-bold">{{__('public')['vision']}}</h2>
                <p class="font-normal text-gray-50 text-md md:text-xl text-justify mb-16">{{__('public')['vision_details']}}</p>
            </div>
            <div class="hidden md:block p-8 -ml-[100px] z-10">
                <img src="{{ asset('imgs/image/box2.png') }}" alt="" class="w-[400px] h-[230px]">
            </div>
        </div>
    </section>

    <!-- mission  -->
    <section class="bg-[#1E1E1E]/80 py-12 rounded-r-lg shadow-2xl flex justify-start mr-12 px-4 items-center my-24 ">
        <div class="md:flex  items-center">
            <img src="{{ asset('imgs/image/about-img.png') }}" alt="">
            <div class="flex-col space-y-4">
                <h2 class="text-white text-3xl font-bold">{{__('public')['mission']}}</h2>
                <p class="font-normal text-gray-50 text-md md:text-xl text-justify mb-16">{{__('public')['mission_details']}}</p>
            </div>
            <div class="hidden md:block p-8 ml-[0px] z-10">
                <img src="{{ asset('imgs/image/box3.png') }}" alt="" class="w-[70%] relative -left-20">
            </div>
        </div>
    </section>

    <!-- services  -->
    <section class="px-8">
        <div class="">
            <h2 class="font-bold text-3xl text-center md:text-right my-4 text-black">{{__('public')['services']}}</h2>
        </div>

        <div id="default-carousel" class="relative hidden md:block w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative overflow-hidden rounded-lg h-[400px]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="grid grid-cols-3 gap-4 items-center p-16 py-[50px]">
                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s1.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service1'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service1_details'] }}</p>
                            </div>
                        </div>

                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s2.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service2'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service2_details'] }}</p>
                            </div>
                        </div>

                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s3.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service3'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service3_details'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="grid grid-cols-3 gap-4 items-center p-16 py-[50px]">
                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s1.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service4'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service4_details'] }}</p>
                            </div>
                        </div>

                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s2.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service5'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service5_details'] }}</p>
                            </div>
                        </div>

                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s3.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service6'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service6_details'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="grid grid-cols-3 gap-4 items-center p-16 py-[50px]">
                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s1.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service7'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service7_details'] }}</p>
                            </div>
                        </div>

                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s2.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service8'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service8_details'] }}</p>
                            </div>
                        </div>

                        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[300px]">
                            <div class="flex flex-col items-center justify-center h-full p-4">
                                <img src="{{ asset('imgs/image/s3.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service9'] }}</h4>
                                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service9_details'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50  group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50  group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
        </div>

    </section>

    <!-- testimonil -->
    <section class="px-8 py-8 bg-gradient-to-t from-slate-100 to-gray-100 h-[600px]">
        <p class="font-normal text-gray-700 text-lg md:text-xl text-center uppercase mb-6">{{__('public')['testimonial']}}</p>
        <h2 class="font-semibold text-gray-900 text-2xl md:text-4xl text-center leading-normal mb-14">{{__('public')['testimonial_says']}}</h2>

        <div id="default-test-carousel" class="relative my-8 bg-white rounded-xl mx-auto md:w-[600px] h-[300px]" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative overflow-hidden h-[300px]">
                <!-- item 1  -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex flex-col justify-center items-center">
                        <img src="{{asset('imgs/image/testimoni-4.png')}}" alt="Image" class="mx-8 my-8 h-20 w-20">
                        <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-2">{{__('public')['testimonial1_name']}}</h3>
                        <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-2">{{__('public')['testimonial2']}}</p>
                    </div>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex flex-col justify-center items-center">
                        <img src="{{asset('imgs/image/testimoni-4.png')}}" alt="Image" class="mx-8 my-8 h-20 w-20">
                        <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-2">{{__('public')['testimonial1_name']}}</h3>
                        <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-2">{{__('public')['testimonial2']}}</p>
                    </div>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex flex-col justify-center items-center">
                        <img src="{{asset('imgs/image/testimoni-4.png')}}" alt="Image" class="mx-8 my-8 h-20 w-20">
                        <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-2">{{__('public')['testimonial1_name']}}</h3>
                        <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-2">{{__('public')['testimonial2']}}</p>
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50  group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50  group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
        </div>
    </section>

    <!-- book section -->
    <section class="bg-white py-10 md:py-16">
        <div class="container max-w-screen-xl mx-auto px-4 xl:relative">
            <div class="bg-gray-600 w-full md:w-4/6 flex flex-col lg:flex-row items-center justify-center px-4 py-14 rounded-3xl">
                <div class="text-center lg:text-right mb-10 lg:mb-0 w-full">
                    <h1 class="font-semibold text-white text-4xl md:text-5xl lg:text-7xl leading-normal mb-4">{!! __('public')['talk_us'] !!}</h1>
                    <p class="font-normal text-white text-md md:text-xl">{!! __('public')['more_talk'] !!}</p>
                </div>
                <div class=" md:block bg-white xl:relative md:-ml-52 shadow-md px-4 w-full md:w-auto py-3 rounded-xl">
                    <div class="py-3">
                        <h3 class="font-semibold text-gray-900 text-3xl">{{__('public')['book_meeting']}}</h3>
                    </div>

                    <div class="py-3">
                        <input type="text" placeholder="{{__('name')}}" class="px-4 py-4 md:w-96 w-full bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                    </div>

                    <div class="py-3">
                        <input type="text" placeholder="{{__('email')}}" class="px-4 py-4 md:w-96 w-full bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                    </div>

                    <div class="py-3 relative">
                        <input type="date" placeholder="{{__('date')}}" class="px-4 py-4 md:w-96 w-full bg-gray-100 font-normal text-lg placeholder-gray-400 rounded-xl outline-none">

                        <!-- <div class="absolute inset-y-0 left-80 ml-6 flex items-center text-xl text-gray-600">
                        <i data-feather="calendar"></i>
                    </div> -->
                    </div>

                    <div class="py-3 relative">
                        <input type="text" placeholder="{{__('notes')}}" class="px-4 py-4 md:w-96 w-full bg-gray-100 placeholder-gray-400 rounded-xl outline-none">

                        <!-- <div class="absolute inset-y-0 left-80 ml-6 flex items-center text-xl text-gray-600">
                        <i data-feather="chevron-down"></i>
                    </div> -->
                    </div>

                    <div class="py-3 text-center">
                        <button class="w-auto mx-auto py-2 px-8 font-semibold text-lg text-white bg-yellow-300 rounded-lg hover:bg-green-900 transition ease-in-out duration-500">أرسل</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- book section //end -->

    <footer class="bg-black text-white py-16">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 items-center justify-center">
            <div class="flex items-center justify-center">
                <img src="{{ asset('imgs/image/logo.png') }}" alt="" class="w-32">
            </div>
            <div class="flex flex-wrap justify-center my-4">
                <ul class="flex flex-col md:flex-row gap-4">
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('about') }}">{{ __('public')['about'] }}</a>
                    </li>
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('services') }}">{{ __('public')['services'] }}</a>
                    </li>
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="{{ route('projects') }}">{{ __('public')['projects'] }}</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col flex-wrap items-center justify-center gap-4">                
                <div class="flex md:grid md:grid-cols-2 gap-4 justify-between">
                    <a href="tel:054000847">054000847</a>
                    <img src="{{ asset('imgs/image/call.png') }}" alt="" class="w-auto">
                </div>
                <div class="flex md:grid md:grid-cols-2 gap-4 justify-between">
                    <a href="mailto:info@alojian.com">info@alojian.com</a>
                    <img src="{{ asset('imgs/image/mail.png') }}" alt="" class="w-auto">
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center mt-16">
            <div class="flex items-center justify-center">
                <a href="#" class=" text-gray-400 hover:text-white transition duration-300 mx-2">سياسة الخصوصية</a>
                <span class="text-gray-400"> | </span>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300 mx-2">بنود الخدمة</a>
            </div>
            <p class="text-center my-4">&copy; 2023 شركة رشيد العجيان للاستشارات الهندسية المحدودة</p>
        </div>
    </footer>

    <!-- <div class="w-[1440px] h-[4687px] relative bg-white">
  <div class="w-[1175px] h-[417px] left-[266px] top-[1202px] absolute bg-stone-900 bg-opacity-80 rounded-tl-[50px] rounded-bl-[50px] shadow"></div>
  <div class="w-[1362px] h-[417px] left-0 top-[752px] absolute bg-stone-900 bg-opacity-80 rounded-tr-[50px] rounded-br-[50px] shadow"></div>
  <div class="w-[1362px] h-[417px] left-0 top-[1640px] absolute bg-stone-900 bg-opacity-80 rounded-tr-[50px] rounded-br-[50px] shadow"></div>
  <div class="w-[1439px] h-[530px] left-0 top-[119px] absolute bg-white shadow"></div>
  <div class="w-[1440px] h-[119px] left-0 top-0 absolute bg-black shadow"></div>
  <div class="w-[130px] h-[50px] left-[51px] top-[34px] absolute bg-amber-400 rounded-[20px] shadow"></div>
  <div class="w-40 h-[55px] left-[1202px] top-[490px] absolute bg-amber-400 rounded-[20px] shadow"></div>
  <div class="w-[140px] h-[13px] left-[46px] top-[50px] absolute text-center text-white text-lg font-bold font-['Cairo']">تسجيل دخول</div>
  <div class="w-[140px] h-[13px] left-[1212px] top-[512px] absolute text-center text-white text-3xl font-bold font-['Cairo']">أبدأ الآن</div>
  <div class="w-[92px] h-[13px] left-[1015px] top-[56px] absolute text-center text-stone-900 text-lg font-bold font-['Cairo']">من نحن</div>
  <div class="w-[785px] h-[13px] left-[322px] top-[56px] absolute">
    <div class="w-[92px] h-[13px] left-0 top-0 absolute text-center text-white text-lg font-bold font-['Cairo']">اتصل بنا</div>
    <div class="w-[92px] h-[13px] left-[693px] top-0 absolute text-center text-white text-lg font-bold font-['Cairo']">من نحن</div>
    <div class="w-[92px] h-[13px] left-[471px] top-0 absolute text-center text-white text-lg font-bold font-['Cairo']">خدماتنا</div>
    <div class="w-[92px] h-[13px] left-[233px] top-0 absolute text-center text-white text-lg font-bold font-['Cairo']">المشاريع</div>
  </div>
  <img class="w-[271px] h-[119px] left-[1169px] top-0 absolute" src="https://via.placeholder.com/271x119" />
  <div class="w-[638px] left-[724px] top-[237px] absolute text-right text-stone-900 text-[40px] font-bold font-['Cairo']">الوفرة في الخيارات لتوفير كافةالخدمات في قطاع الاسكان</div>
  <div class="w-[647px] left-[522px] top-[909px] absolute text-right text-white text-xl font-semibold font-['Cairo']">شركة رشيد العجيان للاستشارات الهندسية المحدودة، شركة هندسية مهنية متوافقة مع متطلبات العصر الحديث في نوعية الرؤيا و المشاريع و سبل الإدارة لتحقيق معايير النمو طبقا لمنهج حكومتنا الرشيدة في رؤية 2030. طريقتنا الكيف وليس الكم و هدفنا النجاح مع عملائنا. تنوع الخبرات لدينا أحد أركان قوتنا من خلال علاقة شركتنا بالمحتوى العالمي في شتى المجالات</div>
  <div class="w-[647px] left-[522px] top-[1775px] absolute text-right text-white text-xl font-semibold font-['Cairo']">نحن شركة رشيد العجيان للاستشارات الهندسية المحدودة اخذنا العهد بالتطور و المواكبة و خذمة وطننا المملكة العربية السعودية داخليا و خارجيا لكي نكون يد العون في نجاح نهضتنا كمجتمع يسعى للتقدم في مصاف الدول الصناعية والمتقدمة</div>
  <div class="w-[638px] h-[66px] left-[724px] top-[402px] absolute text-right text-stone-900 text-opacity-80 text-[25px] font-bold font-['Cairo']">نخبة من المصممين يتجاوز عددهم 20 مهندس معماري</div>
  <div class="w-[491px] h-[529px] left-0 top-[119px] absolute bg-amber-400 shadow"></div>
  <img class="w-[474px] h-[377px] left-[260px] top-[176px] absolute rounded-[50px] shadow" src="https://via.placeholder.com/474x377" />
  <img class="w-[244px] h-[100px] left-[1118px] top-[798px] absolute" src="https://via.placeholder.com/244x100" />
  <img class="w-[244px] h-[100px] left-[1118px] top-[1686px] absolute" src="https://via.placeholder.com/244x100" />
  <div class="w-[221px] left-[948px] top-[821px] absolute text-right text-white text-3xl font-bold font-['Cairo']">تعرف علينا</div>
  <div class="w-[221px] left-[948px] top-[1709px] absolute text-right text-white text-3xl font-bold font-['Cairo']">الرسالة</div>
  <div class="w-[378px] h-[465px] left-[-8px] top-[648px] absolute">
    <div class="w-[598.48px] h-[0px] left-[378px] top-[1px] absolute origin-top-left rotate-[129.17deg] border-4 border-amber-400"></div>
    <div class="w-[529.95px] h-[0px] left-[337px] top-0 absolute origin-top-left rotate-[129.49deg] border-4 border-amber-400"></div>
  </div>
  <div class="origin-top-left rotate-180 w-[860px] h-[191px] left-[1382px] top-[1257px] absolute">
    <div class="w-[647px] left-[-860px] top-[117px] absolute text-right text-white text-xl font-semibold font-['Cairo']">مع عملائنا تكمن قوتنا و بمشاركة الخبرات العالمية والمحلية لدينا و طلبات الاحتياج في عصرنا هذا نسعى ان نكون في مواقع الريادة لمجالنا</div>
    <img class="w-[264px] h-[117px] left-0 top-0 absolute origin-top-left rotate-180" src="https://via.placeholder.com/264x117" />
    <div class="w-[221px] left-[-434px] top-[31px] absolute text-right text-white text-3xl font-bold font-['Cairo']">الرؤية</div>
  </div>
  <div class="w-[1439px] h-[530px] left-[1439px] top-[2160px] absolute origin-top-left rotate-180 bg-white"></div>
  <div class="w-[373px] h-[353px] left-[533px] top-[2362px] absolute bg-stone-900 bg-opacity-0 rounded-[50px] shadow"></div>
  <div class="w-[373px] h-[353px] left-[75px] top-[2362px] absolute bg-stone-900 bg-opacity-0 rounded-[50px] shadow"></div>
  <div class="w-[373px] h-[353px] left-[1002px] top-[2362px] absolute bg-stone-900 bg-opacity-0 rounded-[50px] shadow"></div>
  <div class="w-[221px] left-[1102px] top-[2160px] absolute text-right text-stone-900 text-[50px] font-bold font-['Cairo']">خدماتنا</div>
  <div class="w-[260px] left-[1044px] top-[2459px] absolute text-center text-stone-900 text-3xl font-bold font-['Cairo']">الخدمات الهندسية</div>
  <div class="w-[358px] left-[537px] top-[2459px] absolute text-center text-stone-900 text-3xl font-bold font-['Cairo']">تصميم الديكورات الداخلية</div>
  <div class="w-[382px] left-[75px] top-[2431px] absolute text-center text-stone-900 text-3xl font-bold font-['Cairo']">خدمات توكيد الجودة والحماية من الإشعاع</div>
  <div class="w-[351px] left-[1013px] top-[2574px] absolute text-center text-black text-opacity-60 text-xl font-semibold font-['Cairo']">نقدم خدمات هندسية شاملة تشمل الاستشارات وإدارة المشاريع في مجموعة متنوعة من القطاعات.</div>
  <div class="w-[351px] left-[541px] top-[2574px] absolute text-center text-black text-opacity-60 text-xl font-semibold font-['Cairo']">نقدم خدمات تصميم داخلي مميزة تلبي احتياجات عملائنا</div>
  <div class="w-[351px] left-[90px] top-[2574px] absolute text-center text-black text-opacity-60 text-xl font-semibold font-['Cairo']">نقدم خدمات متخصصة في مجال الصحة الإشعاعية وتقديم استشارات للجودة والحماية.</div>
  <div class="w-[1439px] h-[589px] left-0 top-[2805px] absolute bg-gradient-to-r from-black to-white shadow"></div>
  <div class="w-[236px] left-[602px] top-[2864px] absolute text-center text-stone-900 text-[50px] font-bold font-['Cairo']">تعليقاتكم</div>
  <div class="w-[710px] h-[330px] left-[365px] top-[2974px] absolute bg-white rounded-[50px] shadow"></div>
  <div class="w-[236px] h-[50px] left-[602px] top-[3111px] absolute text-center text-stone-900 text-[25px] font-bold font-['Cairo']">الاسم</div>
  <div class="w-[664px] h-[138px] left-[388px] top-[3139px] absolute text-center text-neutral-400 text-lg font-semibold font-['Cairo']">المنصة ممتازة وفيها مهندسين رائعين، وطريقة استخدام المنصة بسيطة وسهله في إيصال المطلوب والادارة أكثر من رائعة</div>
  <div class="w-[149px] h-[7px] left-[645px] top-[3273px] absolute">
    <div class="w-[23px] h-[7px] left-0 top-0 absolute bg-zinc-300 bg-opacity-60 rounded-[20px]"></div>
    <div class="w-[23px] h-[7px] left-[126px] top-0 absolute bg-zinc-300 bg-opacity-60 rounded-[20px]"></div>
    <div class="w-[23px] h-[7px] left-[84px] top-0 absolute bg-zinc-300 bg-opacity-60 rounded-[20px]"></div>
    <div class="w-[23px] h-[7px] left-[42px] top-0 absolute bg-zinc-300 bg-opacity-60 rounded-[20px]"></div>
  </div>
  <div class="w-[989px] h-[637px] left-[342px] top-[3539px] absolute bg-stone-900 bg-opacity-80 rounded-[50px] shadow"></div>
  <div class="w-[624px] h-[530px] left-[206px] top-[3590px] absolute bg-white rounded-[50px] shadow"></div>
  <div class="w-[409px] left-[867px] top-[3662px] absolute text-right text-white text-[50px] font-bold font-['Cairo']">تحدث إلينا لنناقش طلبك</div>
  <div class="w-[409px] left-[867px] top-[3850px] absolute text-right text-white text-[25px] font-semibold font-['Cairo']">هل تريد المزيد من المعلومات؟ وتريد الرد بخصوصها؟ لا بأس فريقنا على استعداد لخدمتك</div>
  <div class="w-[236px] h-[50px] left-[612px] top-[3605px] absolute text-center text-stone-900 text-opacity-80 text-[25px] font-bold font-['Cairo']">احجز موعد</div>
  <div class="w-[550px] h-[60px] left-[244px] top-[3673px] absolute">
    <div class="w-[550px] h-[60px] left-0 top-0 absolute bg-white rounded-[50px] shadow"></div>
    <div class="w-[87px] h-[30px] left-[455px] top-[15px] absolute text-center text-neutral-400 text-opacity-50 text-lg font-bold font-['Cairo']">الأسم</div>
  </div>
  <div class="w-[550px] h-[60px] left-[243px] top-[3861px] absolute bg-white rounded-[50px] shadow"></div>
  <div class="w-[550px] h-[138px] left-[244px] top-[3877px] absolute">
    <div class="w-[550px] h-[60px] left-0 top-[78px] absolute bg-white rounded-[50px] shadow"></div>
    <div class="w-[87px] h-[30px] left-[455px] top-[93px] absolute text-center text-neutral-400 text-opacity-50 text-lg font-bold font-['Cairo']">الملاحظات</div>
    <div class="w-[87px] h-[30px] left-[450px] top-0 absolute text-center text-neutral-400 text-opacity-50 text-lg font-bold font-['Cairo']">التاريخ</div>
  </div>
  <div class="w-[550px] h-[60px] left-[244px] top-[3767px] absolute">
    <div class="w-[550px] h-[60px] left-0 top-0 absolute bg-white rounded-[50px] shadow"></div>
    <div class="w-[137px] h-[30px] left-[405px] top-[15px] absolute text-center text-neutral-400 text-opacity-50 text-lg font-bold font-['Cairo']">البريد الإلكتروني</div>
  </div>
  <div class="w-40 h-[55px] left-[438px] top-[4037px] absolute bg-amber-400 rounded-[20px] shadow"></div>
  <div class="w-[140px] h-[13px] left-[448px] top-[4059px] absolute text-center text-white text-3xl font-bold font-['Cairo']">أرسل</div>
  <div class="w-[90px] h-[81.57px] left-[675px] top-[3018px] absolute">
  </div>
  <div class="w-[25.69px] h-[28.55px] left-[263px] top-[3877px] absolute">
    <div class="w-[10.58px] h-[4.28px] left-[7.56px] top-[16.70px] absolute">
    </div>
  </div>
  <div class="w-[1494px] h-[369px] left-0 top-[4318px] absolute">
    <div class="w-[1450px] h-[369px] left-0 top-0 absolute bg-stone-900"></div>
    <div class="w-[636px] h-[13px] left-[402px] top-[175px] absolute">
      <div class="w-[261px] h-[13px] left-0 top-0 absolute text-center text-white text-3xl font-semibold font-['Cairo']">المشاريع</div>
      <div class="w-[261px] h-[13px] left-[183px] top-0 absolute text-center text-white text-3xl font-semibold font-['Cairo']">خدماتنا</div>
      <div class="w-[261px] h-[13px] left-[375px] top-0 absolute text-center text-white text-3xl font-semibold font-['Cairo']">من نحن</div>
    </div>
    <img class="w-[530px] h-[369px] left-[964px] top-0 absolute" src="https://via.placeholder.com/530x369" />
    <div class="w-[561px] h-[92px] left-[422px] top-[260px] absolute">
      <div class="w-[561px] h-[13px] left-0 top-[79px] absolute text-center text-white text-lg font-semibold font-['Cairo']">© 2023 شركة رشيد العجيان للاستشارات الهندسية المحدودة</div>
      <div class="w-[143px] h-[13px] left-[298px] top-[23px] absolute text-center text-white text-lg font-normal font-['Cairo']">سياسة الخصوصية</div>
      <div class="w-[104px] h-[13px] left-[160px] top-[23px] absolute text-center text-white text-lg font-normal font-['Cairo']">بنود الخدمة</div>
      <div class="w-[45px] h-[0px] left-[281px] top-0 absolute origin-top-left rotate-90 border-2 border-white"></div>
    </div>
    <div class="w-[261px] h-[136.22px] left-[59px] top-[168px] absolute">
      <div class="w-[261px] h-10 left-0 top-0 absolute text-center text-white text-3xl font-semibold font-['Cairo']">اتصل بنا</div>
      <div class="w-[153px] h-[25px] left-[54px] top-[76px] absolute">
        <div class="w-[123px] h-[13px] left-[30px] top-[12px] absolute text-center text-white text-xl font-bold font-['Cairo']">0540000847</div>
      </div>
      <div class="w-[195px] h-[17.22px] left-[54px] top-[119px] absolute">
        <div class="w-[165px] h-[13px] left-[30px] top-[2px] absolute text-center text-white text-xl font-bold font-['Cairo']">name@gmail.com</div>
        <div class="w-[20.26px] h-[17.22px] left-0 top-0 absolute">
        </div>
      </div>
    </div>
    <div class="w-[183px] h-[339px] left-0 top-0 absolute">
      <div class="w-[295.30px] h-[0px] left-[140px] top-0 absolute origin-top-left rotate-[118.30deg] border-4 border-amber-400"></div>
      <div class="w-[385.24px] h-[0px] left-[183px] top-0 absolute origin-top-left rotate-[118.36deg] border-4 border-amber-400"></div>
    </div>
  </div>
  <div class="w-[290px] h-[308.77px] left-[80px] top-[774px] absolute">
    <div class="w-[177.81px] h-[177.81px] left-[145px] top-0 absolute origin-top-left rotate-[35.37deg] bg-neutral-200"></div>
    <div class="w-[177.81px] h-[102.92px] left-[-0px] top-[102.92px] absolute origin-top-left rotate-[35.37deg] bg-stone-300"></div>
    <div class="w-[177.81px] h-[102.92px] left-[145px] top-[205.84px] absolute origin-top-left rotate-[-35.37deg] bg-neutral-400"></div>
  </div>
  <div class="w-[319px] h-[389px] left-[218px] top-[1230px] absolute">
    <div class="w-[63.85px] h-[35.36px] left-[53.17px] top-[70.73px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-400"></div>
    <div class="w-[63.85px] h-[63.85px] left-0 top-[35.36px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-200"></div>
    <div class="w-[63.85px] h-[35.36px] left-[106.33px] top-[141.45px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-400"></div>
    <div class="w-[63.85px] h-[63.85px] left-[53.17px] top-[106.09px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-200"></div>
    <div class="w-[63.85px] h-[35.36px] left-[159.50px] top-[212.18px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-400"></div>
    <div class="w-[63.85px] h-[63.85px] left-[106.33px] top-[176.82px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-200"></div>
    <div class="w-[63.85px] h-[35.36px] left-[212.67px] top-[282.91px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-400"></div>
    <div class="w-[63.85px] h-[63.85px] left-[159.50px] top-[247.55px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-200"></div>
    <div class="w-[63.85px] h-[35.36px] left-[265.83px] top-[353.64px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-400"></div>
    <div class="w-[63.85px] h-[63.85px] left-[212.67px] top-[318.27px] absolute origin-top-left rotate-[-33.63deg] bg-neutral-200"></div>
  </div>
  <div class="w-[413px] h-[212px] left-[18px] top-[1745px] absolute">
    <div class="w-[218.86px] h-[72.51px] left-[206.50px] top-[139.49px] absolute origin-top-left rotate-[-19.35deg] bg-neutral-400 rounded-lg"></div>
    <div class="w-[218.86px] h-[43.51px] left-0 top-[81.48px] absolute origin-top-left rotate-[19.35deg] bg-stone-300"></div>
    <div class="w-[175.09px] h-[218.86px] left-[20.65px] top-[59.73px] absolute origin-top-left rotate-[-19.35deg] bg-neutral-200"></div>
  </div>
</div> -->
</body>


<script>
    feather.replace()
</script>

</html>