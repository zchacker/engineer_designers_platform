<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="منصة المهندسين">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>منصة المهندسين</title>
</head>

<body>
    <!-- Navbar goes here -->
    <nav class="bg-primary block shadow-lg transition-all duration-500 ">
        <div class="max-w-6xll w-full px-[10%] mx-auto">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <!-- Website Logo -->
                        <a href="{{ route('home' ) }}" class="flex items-center py-4 pl-4">
                            <h1 class="text-white text-[25px] font-bold">Platform</h1>
                        </a>
                    </div>
                    <!-- Primary Navbar items -->
                    <div class="hidden md:flex items-center space-x-1 text-white">
                        <a href="{{route('home')}}/#head" class="scrollTo py-4 px-2  hover:text-secondary font-semibold ">الرئيسية</a>
                        <a href="{{route('home')}}/#features" class="scrollTo py-4 px-2  font-semibold hover:text-secondary transition duration-300">المميزات</a>                        
                        <a href="{{route('home')}}/#menu" class="scrollTo py-4 px-2  font-semibold hover:text-secondary transition duration-300">من نحن</a>                        
                        <a href="{{route('home')}}/#prices" class="scrollTo py-4 px-2  font-semibold hover:text-secondary transition duration-300">الخدمات</a>
                        <a href="{{route('home')}}/#prices" class="scrollTo py-4 px-2  font-semibold hover:text-secondary transition duration-300">المشاريع</a>
                        <a href="{{route('home')}}/#contact" class="scrollTo py-4 px-2  font-semibold hover:text-secondary transition duration-300">اتصل بنا</a>
                    </div>
                </div>
                <!-- Secondary Navbar items -->
                <div class="hidden md:flex items-center space-x-3 ">
                    <!-- <a href="{{ route('login' , app()->getLocale() ) }}" class="py-2 px-2 font-bold text-secondary transition duration-300">دخول</a> -->
                    <!-- <a href="{{ route('register.user' , app()->getLocale() ) }}" class="call_to_action !text-black !px-4 !p-2">انضم الان</a> -->
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-9 h-9 text-white hover:text-secondary text-3xl" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="hidden mobile-menu">
            <ul class="px-5 pb-4">
                <li class="active"><a href="{{route('home')}}/#head" class="scrollTo block text-md px-2 py-4 text-white hover:bg-yellow-400 font-semibold">الرئيسية</a></li>
                <li><a href="{{route('home')}}/#features" class="scrollTo block text-md px-2 py-4 text-white hover:bg-yellow-400 transition duration-300">المميزات</a></li>
                <li><a href="{{route('home')}}/#menus" class="scrollTo block text-md px-2 py-4 text-white hover:bg-yellow-400 transition duration-300">القوالب</a></li>
                <li><a href="{{route('home')}}/#prices" class="scrollTo block text-md px-2 py-4 text-white hover:bg-yellow-400 transition duration-300">الاسعار</a></li>
                <li><a href="{{route('home')}}/#contact" class="scrollTo block text-md px-2 py-4 text-white hover:bg-yellow-400 transition duration-300">اتصل بنا</a></li>
                <li><a href="{{ route('login' , app()->getLocale() ) }}" class="block text-md px-2 py-4 text-white hover:bg-yellow-400 transition duration-300"> دخول </a></li>
                <li><a href="{{ route('register.user' , app()->getLocale() ) }}" class="block call_to_action my-5  mb-8"> انضم الان </a></li>
            </ul>
        </div>
        <script>
            const btn = document.querySelector("button.mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");

            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });

            /*-- Scroll Up/Down add class --*/
            /*var lastScrollTop = 0;
            $(window).scroll(function(event) {
                var st = $(this).scrollTop();
                console.log('rs: ' , st);
                console.log('lastScrollTop: ' , lastScrollTop);
                if (st > lastScrollTop) {
                    //âíèç
                    $('nav').addClass('fix_menue');
                    //$('nav').removeClass('fix_menue');
                } else {
                    // ââåðõ 
                    //$('nav').addClass('fix_menue');
                    $('nav').removeClass('fix_menue');
                }
                lastScrollTop = st;
            });*/

            $(document).ready(function(){
                $(window).bind('scroll', function() {
                    var navHeight = $( window ).height() - 400;                    
                    if ($(window).scrollTop() > navHeight) {
                        $('nav').addClass('fix_menue');
                        $('nav').removeClass('-top-[10%]');
                    }
                    else {
                        $('nav').removeClass('fix_menue');
                        $('nav').addClass('-top-[10%]');
                    }
                });
            });
        </script>
    </nav>

    