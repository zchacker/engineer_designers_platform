@include('public.header')
<section class=" mx-auto py-0 bg-green-50">
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
<section class=" mx-auto py-0 bg-green-50">
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
<section class=" mx-auto py-0 bg-green-50">
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
            <h2 class="text-4xl font-bold mb-8">لماذا نحن</h2>
            <p class="text-lg text-gray-700">
            نحن نقدم خدمات من الدرجة الأولى لعملائنا.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-check-circle text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">الجودة</h3>
                <p class="text-gray-700">نحن نركز على تحقيق نتائج عالية الجودة.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-chart-line text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">ابتكار</h3>
                <p class="text-gray-700">نبقى في المقدمة مع الحلول المبتكرة.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <i class="fas fa-users text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">الفريق</h3>
                <p class="text-gray-700">فريقنا ذو الخبرة موجود هنا لمساعدتك.</p>
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-32 md:items-center justify-center md:space-x-8 lg:space-x-12 mb-10 md:mb-20">

            <div class="bg-gray-100 rounded-lg mb-10 md:mb-0">
                <img src="{{asset('imgs/image/testimoni-3.png')}}" alt="Image" class="mx-8 my-8">

                <div class="flex items-center gap-5 mx-8">
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <!-- <i data-feather="star" class="text-yellow-500"></i> -->
                </div>

                <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-8">{{__('public')['testimonial1']}}</p>

                <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-8">{{__('public')['testimonial1_name']}}</h3>
            </div>

            <div class="bg-gray-100 rounded-lg">
                <img src="{{asset('imgs/image/testimoni-4.png')}}" alt="Image" class="mx-8 my-8">

                <div class="flex items-center gap-5 mx-8">
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                </div>

                <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-8">{{__('public')['testimonial2']}}</p>

                <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-8">{{__('public')['testimonial1_name']}}</h3>
            </div>

        </div>

    </div> <!-- container.// -->

</section>
<!-- testimoni section //end -->
@include('public.footer')