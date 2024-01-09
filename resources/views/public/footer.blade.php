<div class="fixed right-6 bottom-16 md:bottom-8 w-14 h-14 z-50">
    <a href="https://wa.me/966536385896" target="_blank">
        <img src="{{ asset('imgs/image/whatsapp.webp') }}" alt="">
    </a>
</div>

<div class="fixed bottom-0 left-0 right-0 md:hidden bg-green-500 text-center z-50">
    <a href="tel:966536385896" target="_blank" class="bg-green-500 block w-full h-full text-white font-bold p-3">
        {{__('contact_us_now')}}
    </a>
</div>
<footer class="bg-black text-white pt-16">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 items-start justify-center">
        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('imgs/image/logo.png') }}" alt="" class="w-32">
        </div>
        <div class="flex flex-wrap justify-center items-end mb-2">
            <ul class="flex text-center flex-col md:flex-row gap-4">
                <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                    <a href="{{ route('about') }}">{{ __('public')['about'] }}</a>
                </li>
                <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                    <a href="{{ route('services') }}">{{ __('public')['services'] }}</a>
                </li>
                <li class="font-semibold text-white transition ease-in-out duration-300 mb-2 lg:mb-0">
                    <a href="{{ route('projects') }}">{{ __('public')['projects'] }}</a>
                </li>
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
                <a href="mailto:info@alojian.com">info@alojian.com</a>
                <img src="{{ asset('imgs/image/mail.png') }}" alt="" class="w-auto">
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center mt-4 pb-14">
        <div class="flex items-center justify-center mb-4">
            <a href="{{ route('privacy') }}" class=" text-gray-400 hover:text-white transition duration-300 mx-2"> {{__('public')['privacy']}} </a>
            <span class="text-gray-400"> | </span>
            <a href="{{route('terms')}}" class="text-gray-400 hover:text-white transition duration-300 mx-2"> {{__('public')['terms']}}</a>
            <span class="text-gray-400"> | </span>
            <a href="{{route('blog.list')}}" class="text-gray-400 hover:text-white transition duration-300 mx-2"> المدونة </a>
        </div>
        <p class="text-center mb-2">جميع الحقوق محفوظة &copy; 2023 شركة رشيد العجيان للدراسات و الاستشارات الهندسية شركة مهنية</p>
        <p class="text-center mb-12"> سجل تجاري رقم : 1010877829</p>
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
                scrollToElement.scrollIntoView({ behavior: 'smooth' });
            }
        };
    </script>
@endif


</html>