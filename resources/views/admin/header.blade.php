<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Include Lightbox2 CSS-->
    <link defer href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <title>المدير</title>
    <x-head.tinymce-config/>
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
            <div class="sidebar z-50 transition duration-150 ease-in-out  hidden md:block  fixed top-0 bottom-0 lg:right-0 p-2 w-[250px] overflow-y-auto bg-[#151616]">
            @else
            <div class="sidebar z-50 transition duration-150 ease-in-out  hidden md:block  fixed top-0 bottom-0 lg:left-0 p-2 w-[250px] overflow-y-auto bg-[#151616]">
            @endif
              <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <a href="{{route('home')}}">                            
                            <h1 class="font-bold text-right text-white lg:text-[1.6rem] ml-3">
                                @if(app()->getLocale() == 'ar')
                                <i class="las la-arrow-circle-right" aria-hidden="true"></i>
                                @else
                                <i class="las la-arrow-circle-left" aria-hidden="true"></i>
                                @endif                                
                                {{__('back_to_site')}} 
                            </h1>
                        </a>
                        <div class="lg:hidden left-0 absolute">
                            <i class="las la-times-circle la-2x h-8 w-8 ml-5 cursor-pointer" onclick="openSidebar()"></i>
                        </div>
                        <!-- <img src="{{ asset('imgs/letter-x.svg') }}" class="h-8 w-8 ml-5 cursor-pointer left-0 absolute lg:hidden" onclick="openSidebar()" alt="">                         -->
                    </div>
                    <!-- <div class="my-2 bg-white h-[1px]"></div> -->
                </div>                                                                        
                
                <div class="navbar_item {{ preg_match('/\b(engineers|clients|supervisors)\b/i', Route::currentRouteName()) ? 'navbar_active' : '' }}" onclick="dropdown(this)">
                    <i class="las la-user-tie la-2x"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="navbar_item_text_header">المستخدمين</span>
                        <span class="text-sm rotate-180 arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
                <div class="text-right text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold {{ preg_match('/\b(engineers|clients|supervisors)\b/i', Route::currentRouteName()) ? '' : 'hidden' }} ">
                    <div class="navbar_item {{ strpos(Route::currentRouteName(), 'engineers')? 'navbar_active' : '' }} ">                    
                        <i class="las la-user-tie la-2x"></i>
                        <a href="{{ route('admin.engineers.list') }}" class="navbar_item_text"> المهندسين </a>
                    </div>

                    <div class="navbar_item {{ strpos(Route::currentRouteName(), 'clients')? 'navbar_active' : '' }} ">                    
                        <i class="las la-users la-2x"></i>
                        <a href="{{ route('admin.clients.list') }}" class="navbar_item_text"> العملاء </a>
                    </div>

                    <div class="navbar_item {{ strpos(Route::currentRouteName(), 'supervisors')? 'navbar_active' : '' }} ">                    
                        <i class="las la-user-tie la-2x"></i>
                        <a href="{{ route('admin.supervisors.list') }}" class="navbar_item_text"> المشرفين </a>
                    </div>                   
                </div>                        
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'orders')? 'navbar_active' : '' }} ">                    
                    <i class="las la-box la-2x"></i>
                    <a href="{{ route('admin.orders.list') }}" class="navbar_item_text"> الطلبات </a>
                </div>
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'invoices')? 'navbar_active' : '' }} ">                    
                    <i class="las la-file-invoice-dollar la-2x"></i>
                    <a href="{{ route('admin.invoices.list') }}" class="navbar_item_text"> الفواتير </a>
                </div>
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'work')? 'navbar_active' : '' }} ">                    
                    <i class="las la-project-diagram la-2x"></i>
                    <a href="{{ route('admin.work.list') }}" class="navbar_item_text"> الأعمال المرفوعة </a>
                </div>
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'meeting')? 'navbar_active' : '' }} ">                    
                    <i class="las la-handshake la-2x"></i>
                    <a href="{{ route('admin.meeting.list') }}" class="navbar_item_text"> الاجتماعات </a>
                </div> 

                <div class="navbar_item {{ preg_match('/\b(conversation)\b/i', Route::currentRouteName()) ? 'navbar_active' : '' }}" onclick="dropdown(this)">
                    <i class="las la-envelope la-2x"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="navbar_item_text_header">المحادثات</span>
                        <span class="text-sm rotate-180 arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
                <div class="text-right text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold {{ preg_match('/\b(engineers|clients|supervisors)\b/i', Route::currentRouteName()) ? '' : 'hidden' }} ">
                    <div class="navbar_item {{ (Route::currentRouteName() == 'admin.conversation.list')? 'navbar_active' : '' }} ">                    
                        <i class="las la-envelope la-2x"></i>
                        <a href="{{ route('admin.conversation.list') }}" class="navbar_item_text"> المحادثات </a>
                    </div>

                    <div class="navbar_item {{ strpos(Route::currentRouteName(), 'my.conversation')? 'navbar_active' : '' }} ">                    
                        <i class="las la-envelope la-2x"></i>
                        <a href="{{ route('admin.my.conversation.list') }}" class="navbar_item_text"> محادثاتي </a>
                    </div>

                </div>                 
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'contract')? 'navbar_active' : '' }} ">                    
                    <i class="las la-file-contract la-2x"></i>
                    <a href="{{ route('admin.contract.list') }}" class="navbar_item_text"> العقود </a>
                </div>   
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'services')? 'navbar_active' : '' }} ">                    
                    <i class="lab la-servicestack la-2x"></i>
                    <a href="{{ route('admin.services.list') }}" class="navbar_item_text"> الخدمات </a>
                </div>
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'policy')? 'navbar_active' : '' }} ">                    
                        <i class="las la-user-tie la-2x"></i>
                        <a href="{{ route('admin.policy.list') }}" class="navbar_item_text"> السياسات </a>
                </div>                
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'settings')? 'navbar_active' : '' }} ">                    
                    <i class="las la-cog la-2x"></i>
                    <a href="{{ route('admin.settings') }}" class="navbar_item_text"> الملف الشخصي </a>
                </div>
                
                
                <div class="navbar_item {{ strpos(Route::currentRouteName(), 'password')? 'navbar_active' : '' }} ">                    
                    <i class="las la-lock la-2x"></i>
                    <a href="{{ route('admin.password') }}" class="navbar_item_text"> تغيير كلمة المرور </a>
                </div>  
                
                {{--
                <div class="navbar_item" onclick="dropdown(this)">
                    <i class="las la-lock la-2x"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="navbar_item_text_header">Chatbox</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
                <div class="text-right text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold hidden" id="submenu">
                    <h1 class="navbar_item_text">
                        Social
                    </h1>
                    <h1 class="navbar_item_text">
                        Personal
                    </h1>
                    <h1 class="navbar_item_text">
                        Friends
                    </h1>
                </div>


                <div class="navbar_item" onclick="dropdown(this)">
                    <i class="las la-lock la-2x"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="navbar_item_text_header">Chatbox2</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
                <div class="text-right text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold hidden" id="submenu">
                    <h1 class="navbar_item_text">
                        Social
                    </h1>
                    <h1 class="navbar_item_text">
                        Personal
                    </h1>
                    <h1 class="navbar_item_text">
                        Friends
                    </h1>
                </div>


                <div class="navbar_item" onclick="dropdown(this)">
                    <i class="las la-lock la-2x"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="navbar_item_text_header">Chatbox2</span>
                        <span class="text-sm rotate-180 arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>
                <div class="text-right text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold submenu hidden">
                    <h1 class="navbar_item_text">
                        Social
                    </h1>
                    <h1 class="navbar_item_text">
                        Personal
                    </h1>
                    <h1 class="navbar_item_text">
                        Friends
                    </h1>
                </div>
                --}}

                <div class="navbar_item navbar_logout">
                    <i class="las la-power-off la-2x"></i>
                    <a href="{{ route('admin.logout') }}" class="navbar_item_text navbar_logout">تسجيل الخروج</a>
                </div>

            </div>
        </nav>

        <script type="text/javascript">
            // function dropdown() {
            //     document.querySelector("#submenu").classList.toggle("hidden");
            //     document.querySelector("#arrow").classList.toggle("rotate-0");
            // }

            function dropdown(element) {
                const submenu = element.nextElementSibling;
                const arrow = element.querySelector('.arrow');
                submenu.classList.toggle('hidden');
                arrow.classList.toggle('rotate-0');
            }

            //dropdown();

            function openSidebar() {
                document.querySelector(".sidebar").classList.toggle("hidden");
            }
        </script>
        <!-- end of header  -->
        
        <!-- start of body  -->