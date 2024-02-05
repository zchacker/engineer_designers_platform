@include('public.header')
<section class=" mx-auto py-0 bg-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
        <div class="flex items-center justify-center">
            <img src="{{asset('imgs/image/about-page.jpg')}}" alt="Image 1" class="rounded-none w-full">
        </div>
        <div class="py-10 justify-center flex flex-col">
            <div class="px-10">
                <h2 class="text-3xl font-bold mb-4">{{__('public')['get_know_us']}}</h2>
                <p class="text-gray-800 leading-7 text-justify">
                    {{__('public')['about_message']}}
                </p>
            </div>
        </div>
    </div>
</section>
<section class=" mx-auto py-0 bg-yellow-50">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
        <div class="flex items-center justify-center md:order-last">
            <img src="{{asset('imgs/image/vision.jpg')}}" alt="Image 1" class="rounded-none w-full">
        </div>
        <div class="py-10 justify-center flex flex-col">
            <div class="px-10">
                <h2 class="text-3xl font-bold mb-4">{{__('public')['vision']}}</h2>
                <p class="text-gray-800 leading-7 text-justify">
                    {{__('public')['vision_details']}}
                </p>
            </div>
        </div>
    </div>
</section>
<section class=" mx-auto py-0 bg-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
        <div class="flex items-center justify-center">
            <img src="{{asset('imgs/image/mission.jpg')}}" alt="Image 1" class="rounded-none w-full">
        </div>
        <div class="py-10 justify-center flex flex-col">
            <div class="px-10">
                <h2 class="text-3xl font-bold mb-4">{{__('public')['mission']}}</h2>
                <p class="text-gray-800 leading-7 text-justify">
                    {{__('public')['mission_details']}}
                </p>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray-100 py-16">
    <div class="container mx-auto">
        <div class="text-center">
            <h2 class="text-4xl font-bold mb-8">{{__('public')['why_us']}}</h2>
            <p class="text-lg text-gray-700">
            {{__('public')['why_us_details']}}
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-check-circle text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">{{__('public')['quality']}}</h3>
                <p class="text-gray-700">
                    {{__('public')['quality_details']}}
                </p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-chart-line text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">{{__('public')['innovation']}}</h3>
                <p class="text-gray-700">
                    {{__('public')['innovation_details']}}
                </p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-users text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">{{__('public')['team']}}</h3>
                <p class="text-gray-700">
                    {{__('public')['team_details']}}
                </p>
            </div>
        </div>
    </div>
</section>
<!-- testimoni section -->
<section class="bg-white py-10 md:py-16">

    <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

        <p class="font-normal text-gray-400 text-lg md:text-xl text-center uppercase mb-6">{{__('public')['testimonial']}}</p>

        <h1 class="font-semibold text-gray-900 text-2xl md:text-4xl text-center leading-normal mb-14">{{__('public')['testimonial_says']}}</h1>

        <div class="hidden xl:block xl:absolute top-0">
            <img src="{{asset('imgs/image/testimoni-1.png')}}" alt="Image">
        </div>

        <div class="hidden xl:block xl:absolute top-32">
            <img src="{{asset('imgs/image/testimoni-2.png')}}" alt="Image">
        </div>

        <div id="default-test-carousel" class="relative my-8 bg-white rounded-xl mx-auto md:w-[600px] h-[300px]" data-carousel="slide">
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

    </div> <!-- container.// -->

</section>
<!-- testimoni section //end -->
@include('public.footer')