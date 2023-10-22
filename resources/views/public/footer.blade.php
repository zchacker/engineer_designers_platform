<footer class="bg-black text-white py-8">
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
                    <a href="tel:0540000847">0540000847</a>
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

</body>


<script>
    feather.replace()
</script>

</html>