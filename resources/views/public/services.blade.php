@include('public.header')
<section class="flex h-72 justify-center items-center flex-col">
    <div class="w-full h-screen bg-cover bg-center" style="background-image: url('{{asset('imgs/image/project.jpg')}}');">
        <div class="w-full h-full flex  justify-center items-center bg-black/50 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('public')['services']}}</h1>
        </div>
    </div>
</section>
<section class="bg-gray-50 py-10 md:py-16">
    <div class="container max-w-screen-xl mx-auto px-4">

        <!-- this is for disktop  -->
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
        
        <!-- this is for mobile  -->
        <div id="default-carousel" class="relative md:hidden w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative overflow-hidden px-8 rounded-lg h-[400px]">

                <div class="hidden duration-700 ease-in-out" data-carousel-item><!-- Item 1 -->
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s1.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service1'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service1_details'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s2.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service2'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service2_details'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s3.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service3'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service3_details'] }}</p>
                        </div>
                    </div>
                </div>


                <div class="hidden duration-700 ease-in-out" data-carousel-item><!-- Item 2 -->
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s1.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service4'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service4_details'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s2.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service5'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service5_details'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s3.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service6'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service6_details'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s1.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service7'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service7_details'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s2.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service8'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service8_details'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s3.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service9'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service9_details'] }}</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="4"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="5"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="6"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="7"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="8"></button>
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
    </div>
</section>
@include('public.footer')