@if(app()->getLocale() == 'ar')
<div class="fixed right-6 bottom-16 md:bottom-8  z-50">
    @else
    <div class="fixed left-2 bottom-16 md:bottom-8  z-50">
        @endif
        <a href="https://wa.me/966536385896" target="_blank" class="flex gap-4 items-center">
            <img src="{{ asset('imgs/image/whatsapp.webp') }}" alt="" class="w-14 h-14">
            <p class="p-1 px-2 rounded-md bg-white text-black">
                {{__('contact_us_now')}}
            </p>
        </a>
    </div>

    <div class="fixed bottom-0 left-0 right-0 md:hidden bg-green-500 text-center z-50">
        <a href="tel:+966536385896" target="_blank" class="flex items-center justify-center gap-4 bg-green-500 w-full h-full text-white font-bold p-3">
            <span>{{__('call_us_now')}}</span>
            <i data-feather="phone-call"></i>
        </a>
    </div>

    <footer class="bg-black text-white pt-16">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 items-start justify-center">
            <div class="flex items-center justify-center mb-6">
                <img src="{{ asset('imgs/image/logo.png') }}" alt="" class="w-32">
            </div>
            <div class="flex flex-wrap justify-center items-end mb-2">
                <ul class="flex text-center flex-col md:flex-row gap-4">
                    @if(app()->getLocale() == 'ar')
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('about') }}">{{ __('public')['about'] }}</a>
                    </li>
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('services') }}">{{ __('public')['services'] }}</a>
                    </li>
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('projects') }}">{{ __('public')['projects'] }}</a>
                    </li>
                    @else
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('about', app()->getLocale()) }}">{{ __('public')['about'] }}</a>
                    </li>
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('services', app()->getLocale()) }}">{{ __('public')['services'] }}</a>
                    </li>
                    <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('projects', app()->getLocale()) }}">{{ __('public')['projects'] }}</a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="flex flex-col flex-wrap items-center justify-center gap-4">
                <div class="flex md:grid md:grid-cols-2 gap-4 justify-between">
                    <h3 class="font-semibold">{{__('public')['contact']}}</h3>
                </div>
                <div class="flex md:grid md:grid-cols-2 gap-4 justify-between">
                    <a href="tel:+966536385896">0536385896</a>
                    <img src="{{ asset('imgs/image/call.png') }}" alt="" class="w-auto">
                </div>
                <div class="flex md:grid md:grid-cols-2 gap-4 justify-between">
                    <a href="tel:+966112666766">0112666766</a>
                    <img src="{{ asset('imgs/image/call.png') }}" alt="" class="w-auto">
                </div>
                <div class="flex md:grid md:grid-cols-2 gap-4 justify-between">
                    <a href="mailto:info@alojian.com">info@alojian.com</a>
                    <img src="{{ asset('imgs/image/mail.png') }}" alt="" class="w-auto">
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center mt-4 pb-28">
            <div class="flex items-center justify-center mb-4">
                @if(app()->getLocale() != 'ar')
                <a href="{{ route('privacy', app()->getLocale()) }}" class=" text-gray-400 hover:text-white transition duration-300 mx-2"> {{__('public')['privacy']}} </a>
                <span class="text-gray-400"> | </span>
                <a href="{{route('terms', app()->getLocale())}}" class="text-gray-400 hover:text-white transition duration-300 mx-2"> {{__('public')['terms']}}</a>
                <span class="text-gray-400"> | </span>
                <a href="{{route('blog.list', app()->getLocale())}}" class="text-gray-400 hover:text-white transition duration-300 mx-2"> {{ __('public')['blog'] }} </a>
                @else
                <a href="{{ route('privacy') }}" class=" text-gray-400 hover:text-white transition duration-300 mx-2"> {{__('public')['privacy']}} </a>
                <span class="text-gray-400"> | </span>
                <a href="{{route('terms')}}" class="text-gray-400 hover:text-white transition duration-300 mx-2"> {{__('public')['terms']}}</a>
                <span class="text-gray-400"> | </span>
                <a href="{{route('blog.list')}}" class="text-gray-400 hover:text-white transition duration-300 mx-2"> {{ __('public')['blog'] }} </a>
                @endif
            </div>
            <p class="text-center mb-2">{{ __('copyright') }}</p>
            <p class="text-center mb-2"> {{ __('cr_no') }} </p>
            <p class="text-center mb-12"> {{ __('tax_no') }} </p>
            <p class="mb-4 text-sm text-gray-600 " dir="ltr">Designed by
                <a href="https://browndiamondstech.com" class="hover:text-gray-300" target="_blank">Brown Diamond Tech Ltd.</a>
            </p>
        </div>
    </footer>


    </body>


    <script>
        feather.replace()
    </script>


    @if(session('scrollTo'))
    <script>
        window.onload = function() {
            var scrollToElement = document.getElementById("{{ session('scrollTo') }}");
            if (scrollToElement) {
                scrollToElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        };
    </script>
    @endif


    </html>