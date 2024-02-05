@include('public.header')

<!-- about  -->
<div class="overflow-hidden">
    @if(app()->getLocale() == 'ar')
    <section class="bg-white px-8 py-10 items-center relative">
        <div class="grid md:grid-cols-2 grid-cols-1">

            <div class="mt-8 md:mt-28 text-center xl:text-right z-20 order-2 md:order-1">
                <h1 class="font-bold text-xl md:text-3xl lg:text-4xl leading-normal text-gray-900 mb-6">{!! __('public')['hero_msg'] !!}</h1>
                <p class="font-normal text-xl text-gray-800 leading-relaxed mb-12">{{__('public')['sub_hero']}}</p>
                <a href="{{ route('register.user') }}" class="px-6 py-2 bg-yellow-300 text-white font-semibold text-lg rounded-md shadow-md hover:bg-black transition ease-in-out duration-500">{{__('public')['register_now']}}</a>
            </div>

            <div class="z-10 relative top-10 my-8 md:block order-1 md:order-2">
                <div class="border-2 border-yellow-300 box-border rounded-lg shadow-lg w-auto md:w-[600px]">
                    <video :class="{'hidden':navbarOpen}" class="rounded-lg w-full h-full" controls autoplay="on">
                        <source src="https://eu2.contabostorage.com/e4d9c3eca4674c9dbce474abbb48ddea:website/videos/rclol3.mp4" type="video/mp4">
                        <img src="{{asset('imgs/image/home.png')}}" alt="Home img" :class="{'hidden':navbarOpen}" />
                    </video>
                </div>
            </div>

            <div class=" sm:block md:visible md:absolute top-0 bottom-0 left-0 bg-yellow-300/70 w-2/5 bg-blend-color-dodge">

            </div>
        </div>
    </section>
    @else
    <section class="bg-white px-8 py-10 items-center relative">
        <div class="grid md:grid-cols-2 grid-cols-1">

            <div class="mt-8 md:mt-28 text-center xl:text-left z-20 order-2 md:order-1">
                <h1 class="font-bold text-xl md:text-3xl lg:text-4xl leading-normal text-gray-900 mb-6">{!! __('public')['hero_msg'] !!}</h1>
                <p class="font-normal text-xl text-gray-800 leading-relaxed mb-12">{{__('public')['sub_hero']}}</p>
                <a href="{{ route('register.user') }}" class="px-6 py-2 bg-yellow-300 text-white font-semibold text-lg rounded-md shadow-md hover:bg-black transition ease-in-out duration-500">{{__('public')['register_now']}}</a>
            </div>

            <div class="z-10 relative top-10 right-0 my-8 md:block order-1 md:order-2">
                <div class="border-2 border-yellow-300 box-border rounded-lg shadow-lg w-auto md:w-[600px]">
                    <video :class="{'hidden':navbarOpen}" class="rounded-lg w-full h-full" controls autoplay="on">
                        <source src="https://eu2.contabostorage.com/e4d9c3eca4674c9dbce474abbb48ddea:website/videos/rclol3.mp4" type="video/mp4">
                        <img src="{{asset('imgs/image/home.png')}}" alt="Home img" :class="{'hidden':navbarOpen}" />
                    </video>
                </div>
            </div>

            <div class=" sm:block md:visible md:absolute top-0 bottom-0 right-0 bg-yellow-300/70 w-2/5 bg-blend-color-dodge">

            </div>
        </div>
    </section>
    @endif

    <section class="overflow-hidden bg-[#1E1E1E]/80 py-12 rounded-r-3xl shadow-2xl flex justify-start mr-12 px-8 items-center my-24 relative">
        <div class="md:flex flex-1 items-center relative">
            <img src="{{ asset('imgs/image/about-img2.png') }}" alt="" class="w-[150px] mx-4">
            <div class="flex-col space-y-4">
                <h2 class="text-white text-3xl font-bold">{{__('public')['get_know_us']}}</h2>
                <p class="font-normal text-gray-50 text-md md:text-xl text-justify mb-16">{{__('public')['about_message']}}</p>
            </div>
        </div>
        <div class="max-h-[200px] relative">            
            <div class="hidden md:block p-0 px-8 z-50">
                <img src="{{ asset('imgs/image/box.png') }}" alt="" class=" w-[200px] max-h-[200px]">
            </div>
        </div>
        <img src="{{ asset('imgs/image/lines.png') }}" class="hidden absolute left-10 top-0 z-0 sm:block w-[320px] h-[400px] -ml-[40px] -mt-[200px] " alt="">
    </section>
</div>

<!-- vision  -->
<section class="overflow-hidden bg-[#1E1E1E]/80 md:py-4 py-8 rounded-l-3xl shadow-xl shadow-gray-500 flex justify-start ml-16 md:ml-52 px-8 items-center my-10">
    <div class="md:flex md:items-center">
        <div class="md:flex">
            <img src="{{ asset('imgs/image/about-img2.png') }}" alt="" class="w-[150px] mx-4">
            <div class="flex-col space-y-4">
                <h2 class="text-white text-3xl font-bold">{{__('public')['vision']}}</h2>
                <p class="font-normal text-gray-50 text-md md:text-xl text-justify mb-16">{{__('public')['vision_details']}}</p>
            </div>
        </div>
        <div class="hidden md:block p-8 -ml-[10px] z-10">
            <img src="{{ asset('imgs/image/box2.png') }}" alt="" class="w-[280px] object-cover">
        </div>
    </div>
</section>

<!-- mission  -->
<section class="bg-[#1E1E1E]/80 py-12 rounded-r-2xl shadow-xl shadow-gray-500 flex justify-start mr-12 px-8 items-center my-24 ">
    <div class="md:flex  items-center">
        <div class="md:flex">
            <img src="{{ asset('imgs/image/about-img2.png') }}" alt="" class="w-[150px] mx-4">
            <div class="flex-col space-y-4">
                <h2 class="text-white text-3xl font-bold">{{__('public')['mission']}}</h2>
                <p class="font-normal text-gray-50 text-md md:text-xl text-justify mb-16">{{__('public')['mission_details']}}</p>
            </div>
        </div>
        <div class="hidden md:block p-8 ml-[0px] z-10">
            <img src="{{ asset('imgs/image/box3.png') }}" alt="" class="w-[430px]">
        </div>
    </div>
</section>

<!-- services  -->
<section class="px-8 ">
    <div class="">
        @if(app()->getLocale() == 'ar')
        <h2 class="font-bold text-3xl text-center md:text-right my-4 text-black">{{__('public')['services']}}</h2>
        @else 
        <h2 class="font-bold text-3xl text-center md:text-left my-4 text-black">{{__('public')['services']}}</h2>
        @endif
    </div> 

    <div id="default-carousel" class="relative hidden md:block w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden rounded-lg h-[400px]">
            
            @foreach($services->chunk(3) as $chunk)
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="grid grid-cols-3 gap-4 items-center p-16 py-[50px]">

                    @foreach($chunk as $service)                    
                    <div class="flex-wrap items-center relative shadow-lg shadow-gray-500 rounded-md bg-white h-[300px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ $service->file->fileName ?? asset('imgs/image/s1.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ $service->name }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ strip_tags( Str::limit( $service->description , 100) ) }}</p>
                        </div>
                    </div>
                    @endforeach                                    
                </div>
            </div>
            @endforeach
                      

            {{--
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="grid grid-cols-3 gap-4 items-center p-16 py-[50px]">
                    <div class="flex-wrap items-center relative shadow-lg shadow-gray-500 rounded-md bg-white h-[300px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s1.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service1'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service1_details'] }}</p>
                        </div>
                    </div>

                    <div class="flex-wrap items-center relative shadow-lg shadow-gray-500 rounded-md bg-white h-[300px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s2.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service2'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service2_details'] }}</p>
                        </div>
                    </div>

                    <div class="flex-wrap items-center relative shadow-lg shadow-gray-500 rounded-md bg-white h-[300px]">
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
                    <div class="flex-wrap items-center relative shadow-lg shadow-gray-500 rounded-md bg-white h-[300px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s1.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service4'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service4_details'] }}</p>
                        </div>
                    </div>

                    <div class="flex-wrap items-center relative shadow-lg shadow-gray-500 rounded-md bg-white h-[300px]">
                        <div class="flex flex-col items-center justify-center h-full p-4">
                            <img src="{{ asset('imgs/image/s2.png') }}" class="absolute -top-[40px] h-[100px] text-green-700 mb-4 mx-auto" />
                            <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service5'] }}</h4>
                            <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service5_details'] }}</p>
                        </div>
                    </div>

                    <div class="flex-wrap items-center relative shadow-lg shadow-gray-500 rounded-md bg-white h-[300px]">
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
            --}}
        </div>
        
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <!-- <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button> -->
        </div>
        
        <!-- Slider controls -->        
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent  group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent  group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
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

            @foreach($services as $service)
            <div class="hidden duration-700 ease-in-out" data-carousel-item><!-- Item 1 -->
                <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
                    <div class="flex flex-col items-center justify-center h-full p-4">
                        <img src="{{ $service->file->fileName ?? asset('imgs/image/s1.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                        <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ $service->name }}</h4>
                        <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ Str::limit( $service->description , 50) }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            {{--
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

            --}}

        </div>

        {{--
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
        --}}
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 -left-8 z-30 flex items-center justify-end h-full px-2 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent  group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 -right-6 z-30 flex items-center justify-start h-full px-2 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent  group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
    </div>

</section>

<!-- testimonil -->
<section class="px-8 py-8 bg-gradient-to-t from-gray-100 to-white h-[600px]">
    <!-- <p class="font-normal text-gray-700 text-lg md:text-xl text-center uppercase mb-6">{{__('public')['testimonial']}}</p> -->
    <h2 class="font-semibold text-gray-900 text-2xl md:text-4xl text-center leading-normal mb-14">{{__('public')['testimonial_says']}}</h2>

    <div id="default-test-carousel" class="relative my-8 bg-white rounded-xl shadow-lg shadow-gray-500 mx-auto md:w-[600px] h-[300px]" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden h-[300px]">
            <!-- item 1  -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="flex flex-col justify-center items-center">
                    <img src="{{asset('imgs/image/testimoni-1.png')}}" alt="Image" class="mx-8 my-8 h-20 w-20">
                    <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-2">{{__('public')['testimonial1_name']}}</h3>
                    <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-2">{{__('public')['testimonial1']}}</p>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="flex flex-col justify-center items-center">
                    <img src="{{asset('imgs/image/testimoni-1.png')}}" alt="Image" class="mx-8 my-8 h-20 w-20">
                    <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-2">{{__('public')['testimonial2_name']}}</h3>
                    <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-2">{{__('public')['testimonial2']}}</p>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="flex flex-col justify-center items-center">
                    <img src="{{asset('imgs/image/testimoni-1.png')}}" alt="Image" class="mx-8 my-8 h-20 w-20">
                    <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-2">{{__('public')['testimonial3_name']}}</h3>
                    <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-2">{{__('public')['testimonial3']}}</p>
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
        {{--<button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
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
        </button>--}}
    </div>
</section>

<!-- book section -->
<section class="bg-gradient-to-r from-gray-100 to-gray-300 py-10 md:py-16" id="contact">
    <div class="container max-w-screen-xl mx-auto px-4 xl:relative">
        <div class="bg-[#1E1E1E]/80 w-full  flex flex-col lg:flex-row items-center justify-start px-8 py-14 rounded-3xl">
            <div class="mb-10 lg:mb-0 w-full md:mr-8 flex flex-col gap-8">
                <h1 class="font-bold text-white text-4xl md:text-5xl lg:text-5xl leading-normal mb-4"  style="line-height: 1.5;">{!! __('public')['talk_us'] !!}</h1>
                <p class="font-normal text-white text-md md:text-xl" style="line-height: 1.8;">{!! __('public')['more_talk'] !!}</p>
            </div>
            <div class=" md:block bg-gray-300/95 xl:relative  shadow-xl shadow-gray-800 px-4 w-full md:w-auto py-3 rounded-xl">
                <div class="py-3">
                    <h3 class="font-semibold text-gray-900 text-3xl">{{__('public')['contact']}}</h3>
                </div>

                @if(session('success'))
                    <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                        {!! session('success') !!}
                    </div>
                @endif


                <form action="{{ route('contact-us.send') }}" method="post">
                    @csrf

                    <div class="py-3">
                        @error('name')
                            <span class="text-red-600 font-bold">{{ $message }}</span>
                        @enderror
                        <input type="text" name="name" placeholder="{{__('name')}}" class="px-4 py-4 md:w-96 w-full bg-white shadow-lg rounded-full border-none placeholder-gray-400 outline-none">
                    </div>

                    <div class="py-3">
                        @error('email')
                            <span class="text-red-600 font-bold">{{ $message }}</span>
                        @enderror
                        <input type="text" name="email" placeholder="{{__('email')}}" class="px-4 py-4 md:w-96 w-full bg-white shadow-lg rounded-full border-none placeholder-gray-400 outline-none">
                    </div>
                    

                    <div class="py-3 relative">
                        @error('message')
                            <span class="text-red-600 font-bold">{{ $message }}</span>
                        @enderror
                        <textarea type="text" name="message" placeholder="{{__('notes')}}" class="px-4 py-4 md:w-96 w-full bg-white shadow-lg rounded-3xl border-none placeholder-gray-400 outline-none"></textarea>
                    </div>

                    <div class="py-3 text-center">
                        <button type="submit" class="normal_button">{{__('public')['send_now']}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- book section //end -->

@include('public.footer')