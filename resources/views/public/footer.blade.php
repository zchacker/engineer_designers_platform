<!-- footer -->
<footer class="bg-white py-10 md:py-16">

<div class="container max-w-screen-xl mx-auto px-4">

    <div class="flex flex-col lg:flex-row justify-between">
        <div class="text-center lg:text-left mb-10 lg:mb-0">
            <div class="flex justify-center lg:justify-start mb-5">
                <img src="{{asset('imgs/image/footer-logo.png')}}" alt="Image">
            </div>

            <p class="font-light text-gray-400 text-xl mb-10">Get your dream house with <br> D’house</p>

            <div class="flex items-center justify-center lg:justify-start space-x-5">
                <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                    <i data-feather="facebook"></i>
                </a>

                <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                    <i data-feather="twitter"></i>
                </a>

                <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500">
                    <i data-feather="linkedin"></i>
                </a>
            </div>
        </div>

        <div class="text-center lg:text-left mb-10 lg:mb-0">
            <h4 class="font-semibold text-gray-900 text-2xl mb-6">{{__('public')['sitemap']}}</h4>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">{{__('public')['home']}}</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">{{__('public')['about']}}</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">{{__('public')['services']}}</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">{{__('public')['projects']}}</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">{{__('public')['contact']}}</a>
        </div>

        <!-- <div class="text-center lg:text-left mb-10 lg:mb-0">
            <h4 class="font-semibold text-gray-900 text-2xl mb-6">Landing</h4>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Mobile App</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Property</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Personal Website</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Web Developer</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Online Course</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">Donation</a>
        </div> -->

        <div class="text-center lg:text-left">
            <h4 class="font-semibold text-gray-900 text-2xl mb-6">{{__('public')['useful_links']}}</h4>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">{{__('public')['faq']}}</a>

            <a href="#" class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300">{{__('public')['terms']}}</a>
        </div>
    </div>

</div> <!-- container.// -->

</footer>
<!-- footer //end -->

<script>
feather.replace()
</script>

</body>

</html>