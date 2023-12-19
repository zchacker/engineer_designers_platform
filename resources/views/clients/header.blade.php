<!DOCTYPE html>
@if(app()->getLocale() == 'ar')
<html lang="ar" dir="rtl">
@else
<html lang="en" dir="ltr">
@endif

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>{{__('client_dashboard')}}</title>
</head>

<body class="bg-dash-bg">
    
    <div class="flex">            
        <!-- header page  -->
        <nav class="lg:w-72">
            @if(app()->getLocale() == 'ar')
            <span class="absolute shadow-none p-2 border-gray-500 border-solid border-2 rounded-md text-black text-4xl top-5  right-4 cursor-pointer" onclick="openSidebar()">
            @else
            <span class="absolute shadow-none p-2 border-gray-500 border-solid border-2 rounded-md text-black text-4xl top-5  left-4 cursor-pointer" onclick="openSidebar()">
            @endif
                <i class="las la-bars la-3xl"></i>
            </span>

            @if(app()->getLocale() == 'ar')
            <div class="sidebar z-50 transition duration-150 ease-in-out  hidden lg:block fixed top-0 bottom-0 lg:right-0 p-2 w-[250px] overflow-y-auto bg-[#151616]">
            @else
            <div class="sidebar z-50 transition duration-150 ease-in-out  hidden lg:block fixed top-0 bottom-0 lg:left-0 p-2 w-[250px] overflow-y-auto bg-[#151616]">
            @endif
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <a href="{{route('home')}}">
                            <h1 class="font-bold text-right text-white lg:text-[1.6rem] mr-0">
                                @if(app()->getLocale() == 'ar')
                                <i class="las la-arrow-circle-right" aria-hidden="true"></i>
                                @else
                                <i class="las la-arrow-circle-left" aria-hidden="true"></i>
                                @endif                                
                                {{__('back_to_site')}} 
                            </h1>
                        </a>

                        @if(app()->getLocale() == 'ar')
                        <div class="lg:hidden left-0 absolute">
                        @else
                        <div class="lg:hidden right-3 absolute">
                        @endif
                            <i class="las la-times-circle la-2x h-8 w-8 ml-5 cursor-pointer" onclick="openSidebar()"></i>                            
                        </div>                        
                        <!-- <img src="{{ asset('imgs/letter-x.svg') }}" class="h-8 w-8 ml-5 cursor-pointer left-0 absolute lg:hidden" onclick="openSidebar()" alt="">                         -->
                    </div>                    
                    <!-- <div class="my-2 bg-white h-[1px]"></div> -->
                </div>

                <div class="navbar_item">
                    @if(app()->getLocale() == 'ar')
                        <a href="{{ route('language.switch' , 'en') }}" ><i class="las la-language la-1x"></i> English</a>
                    @else
                        <a href="{{ route('language.switch' , 'ar') }}"> <i class="las la-language la-1x"></i> عربي</a>
                    @endif
                </div> 

                <div class="navbar_item">
                    <i class="las la-user-friends la-2x"></i>
                    <a href="{{ route('client.engineers.list') }}" class="navbar_item_text"> {{__('engineers')}} </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-box la-2x"></i>
                    <a href="{{route('client.order.list')}}" class="navbar_item_text"> {{__('orders')}} </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-file-alt la-2x"></i>
                    <a href="{{ route('client.contract.list') }}" class="navbar_item_text"> {{__('contracts')}} </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-handshake la-2x"></i>
                    <a href="{{ route('client.meeting.list') }}" class="navbar_item_text"> {{__('meetings')}} </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-envelope la-2x"></i>
                    <a href="{{ route('client.conversation.list') }}" class="navbar_item_text"> {{__('conversations')}} </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-cog la-2x"></i>
                    <a href="{{ route('client.settings') }}" class="navbar_item_text"> {{__('profile')}} </a>
                </div>

                <div class="navbar_item">
                    <i class="las la-lock la-2x"></i>
                    <a href="{{ route('client.password') }}" class="navbar_item_text"> {{__('change_password')}} </a>
                </div>                

                <div class="navbar_item navbar_logout">
                    <i class="las la-power-off la-2x"></i>
                    <a href="{{ route('client.logout') }}" class="navbar_item_text navbar_logout"> {{__('logout')}} </a>
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