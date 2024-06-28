

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
        <div class="flex justify-center md:justify-start items-center px-8 mb-4 mx-auto max-w-[1200px]">
            <img src="{{ asset('imgs/image/logo.png') }}" alt="" class="w-32">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-x-8 gap-y-8 justify-stretch items-start max-w-[1200px] mx-auto px-8">
            <div class="flex flex-col space-y-4">
                <p class="text-justify text-sm">{!! __('about_message') !!}</p>
            </div>
            <div class="flex flex-col justify-start md:items-center space-y-2">
                <h4 class="text-xl font-bold text-start">{{ __('pages') }}</h4>
                <ul class="flex flex-col text-start gap-1">
                    @if(app()->getLocale() == 'ar')
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('about') }}">{{ __('public')['about'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('services') }}">{{ __('public')['services'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('projects') }}">{{ __('public')['projects'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('engineers') }}">{{ __('public')['engineers'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('contact-us') }}">{{ __('public')['contact'] }}</a>
                    </li>
                    @else
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('about', app()->getLocale()) }}">{{ __('public')['about'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('services', app()->getLocale()) }}">{{ __('public')['services'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('projects', app()->getLocale()) }}">{{ __('public')['projects'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('engineers', app()->getLocale()) }}">{{ __('public')['engineers'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('contact-us', app()->getLocale()) }}">{{ __('public')['contact'] }}</a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="flex flex-col justify-start md:items-center space-y-2">
                <h4 class="text-xl font-bold">{{ __('public')['services'] }}</h4>
                <ul class="flex flex-col text-start gap-1">
                    @if(app()->getLocale() == 'ar')
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('about') }}">{{ __('public')['about'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('services') }}">{{ __('public')['services'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('projects') }}">{{ __('public')['projects'] }}</a>
                    </li>
                    @else
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('about', app()->getLocale()) }}">{{ __('public')['about'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('services', app()->getLocale()) }}">{{ __('public')['services'] }}</a>
                    </li>
                    <li class="font-normal text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                        <a href="{{ route('projects', app()->getLocale()) }}">{{ __('public')['projects'] }}</a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="flex flex-col justify-start items-start space-y-2">
                <h4 class="text-xl font-bold">{{ __('public')['contact'] }}</h4>                
                <div class="flex gap-4 justify-start">
                    <img src="{{ asset('imgs/image/footer-call.png') }}" alt="" class="w-[30px]">
                    <a href="tel:+966536385896">0536385896</a>
                </div>
                <div class="flex gap-4 justify-start">
                    <img src="{{ asset('imgs/image/telephone-footer.png') }}" alt="" class="w-[30px]">
                    <a href="tel:+966112666766">0112666766</a>
                </div>
                <div class="flex gap-4 justify-start">
                    <img src="{{ asset('imgs/image/email-footer.png') }}" alt="" class="w-[30px]">
                    <a href="mailto:info@alojian.com">info@alojian.com</a>
                </div>
            </div>
        </div>

        <!-- copyright -->
        <div class="grid grid-cols-1 md:grid-cols-3 items-center justify-center mt-16 pb-4 mx-auto max-w-[1200px] px-8">
            <div class="flex flex-col items-start justify-start text-sm text-gray-400">
                <p class="text-center mb-2"> {{ __('cr_no') }} </p>
                <p class="text-center mb-12"> {{ __('tax_no') }} </p>
            </div>
            <div class="flex flex-col items-center justify-center mb-0 space-y-4">                
                <div class="flex flex-row">
                    @if(app()->getLocale() != 'ar')
                    <a href="{{ route('privacy', app()->getLocale()) }}" class=" text-white hover:text-white transition duration-300 mx-2"> {{__('public')['privacy']}} </a>
                    <span class="text-white"> | </span>
                    <a href="{{route('terms', app()->getLocale())}}" class="text-white hover:text-white transition duration-300 mx-2"> {{__('public')['terms']}}</a>
                    <span class="text-white"> | </span>
                    <a href="{{route('blog.list', app()->getLocale())}}" class="text-white hover:text-white transition duration-300 mx-2"> {{ __('public')['blog'] }} </a>
                    @else
                    <a href="{{ route('privacy') }}" class=" text-white hover:text-white transition duration-300 mx-2"> {{__('public')['privacy']}} </a>
                    <span class="text-white"> | </span>
                    <a href="{{route('terms')}}" class="text-white hover:text-white transition duration-300 mx-2"> {{__('public')['terms']}}</a>
                    <span class="text-white"> | </span>
                    <a href="{{route('blog.list')}}" class="text-white hover:text-white transition duration-300 mx-2"> {{ __('public')['blog'] }} </a>
                    @endif
                </div>
                <p class="text-sm text-gray-400 text-center mb-2">{{ __('copyright') }}</p>
            </div>                        
        </div>
        <div class="flex justify-center m-0 pb-20 md:pb-10">
            <p class="mb-0 text-sm text-gray-600 " dir="ltr">Designed by
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchButton = document.getElementById('searchButton');
            const searchInputContainer = document.getElementById('searchInputContainer');

            searchButton.addEventListener('click', function(event) {
                searchInputContainer.classList.toggle('hidden');
                searchInputContainer.querySelector('input').focus();
                event.stopPropagation();
            });

            document.addEventListener('click', function(event) {
                if (!searchInputContainer.contains(event.target) && !searchButton.contains(event.target)) {
                    searchInputContainer.classList.add('hidden');
                }
            });
        });
    </script>

    </html>