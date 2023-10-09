<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite([ 'resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>لوحة تحكم المهندس</title>
</head>

<body class="bg-dash-bg">

    <div class="flex">

        <!-- header page  -->
        <nav class="lg:w-72">
            <span class="absolute shadow-none p-2 border-gray-500 border-solid border-2 rounded-md text-black text-4xl top-5  right-4 cursor-pointer" onclick="openSidebar()">
                <i class="las la-bars la-3xl"></i>
            </span>
            <div class="sidebar z-50 transition duration-150 ease-in-out  hidden lg:block fixed top-0 bottom-0 lg:right-0 p-2 w-[250px] overflow-y-auto text-center bg-[#151616]">
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <a href="{{route('home')}}">
                            <h1 class="font-bold text-right text-white lg:text-[1.6rem] ml-3"> Engineer </h1>
                        </a>
                        <div class="lg:hidden left-0 absolute">
                            <i class="las la-times-circle la-2x h-8 w-8 ml-5 cursor-pointer" onclick="openSidebar()"></i>
                        </div>
                        <!-- <img src="{{ asset('imgs/letter-x.svg') }}" class="h-8 w-8 ml-5 cursor-pointer left-0 absolute lg:hidden" onclick="openSidebar()" alt="">                         -->
                    </div>
                    <!-- <div class="my-2 bg-white h-[1px]"></div> -->
                </div>

                <div class="navbar_item">
                    <i class="las la-file-invoice-dollar la-2x"></i>
                    <a href="{{route('engineer.orders.list')}}" class="navbar_item_text"> الطلبات </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-file-alt la-2x"></i>
                    <a href="{{ route('engineer.contract.list') }}" class="navbar_item_text"> العقود </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-project-diagram la-2x"></i>
                    <a href="{{ route('engineer.work.list') }}" class="navbar_item_text"> الأعمال </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-envelope la-2x"></i>
                    <a href="{{ route('engineer.conversation.list') }}" class="navbar_item_text"> المحادثات </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-cog la-2x"></i>
                    <a href="{{ route('engineer.settings') }}" class="navbar_item_text"> الإعدادات </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-lock la-2x"></i>
                    <a href="{{ route('engineer.password') }}" class="navbar_item_text"> تغيير كلمة المرور </a>
                </div>

                <div class="navbar_item navbar_logout">
                    <i class="las la-power-off la-2x"></i>
                    <a href="{{ route('engineer.logout') }}" class="navbar_item_text navbar_logout">تسجيل الخروج</a>
                </div>

            </div>
        </nav>

        <script type="text/javascript">
            function dropdown() {
                document.querySelector("#submenu").classList.toggle("hidden");
                document.querySelector("#arrow").classList.toggle("rotate-0");
            }

            //dropdown();

            function openSidebar() {
                document.querySelector(".sidebar").classList.toggle("hidden");
            }
        </script>
        <!-- end of header  -->

        <!-- start of body  -->