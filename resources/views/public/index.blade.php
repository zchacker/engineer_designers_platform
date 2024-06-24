@include('public.header')

<!-- hero section  -->
<div class="min-h-[60vh] md:min-h-[80vh] relative flex flex-col items-center justify-top bg-cover bg-[#333333]" style="background-image: url({{ asset('imgs/image/hero-bg.jpg') }});">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <div class="flex flex-col items-center justify-center z-50 mt-[100px]">
        <h1 class="text-center font-bold text-2xl md:text-2xl lg:text-3xl leading-tight text-white mb-6">{!! __('public')['hero_msg'] !!}</h1>
        <p class="text-center font-normal text-xl text-white leading-relaxed mb-12">{{__('public')['sub_hero']}}</p>
        <a href="{{ route('register.user') }}" class="cta_button">{{__('public')['register_now']}}</a>

        <div class="absolute -bottom-[100px] md:-bottom-[220px] w-[310px] md:w-[565px] rounded-xl border-2 overflow-hidden p-0 shadow-lg">
            <video id="my-video" class="video-js vjs-fluid vjs-16-9" controls preload="auto" width="640" height="360" data-setup="{}">
                <source src="https://eu2.contabostorage.com/e4d9c3eca4674c9dbce474abbb48ddea:website/videos/rclol3.mp4" type="video/mp4">
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
        </div>
    </div>
</div>

<!-- benefits  -->
<div class="mt-[38%] md:mt-[20%]">
    <div class="flex flex-col items-center justify-center space-y-8">
        <h2 class="text-black font-bold text-3xl text-center"> {{ __('why_us_best_choice') }} </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8">

            <div class="flex flex-col justify-between items-center space-y-4">
                <div class="border-4 rounded-full p-4 border-black">
                    <img src="{{ asset('imgs/image/arch4.jpg') }}" class="w-12 h-12" alt="">
                </div>
                <h4 class="font-bold text-xl">
                    الإحترافية
                </h4>
            </div>

            <div class="flex flex-col justify-between items-center space-y-4">
                <div class="border-4 rounded-full p-4 border-black">
                    <img src="{{ asset('imgs/image/arch3.jpg') }}" class="w-12 h-12" alt="">
                </div>
                <h4 class="font-bold text-xl">
                    الابداع
                </h4>
            </div>

            <div class="flex flex-col justify-between items-center space-y-4">
                <div class="border-4 rounded-full p-4 border-black">
                    <img src="{{ asset('imgs/image/arch2.jpg') }}" class="w-12 h-12" alt="">
                </div>
                <h4 class="font-bold text-xl">
                    الجودة
                </h4>
            </div>

            <div class="flex flex-col justify-between items-center space-y-4">
                <div class="border-4 rounded-full p-4 border-black">
                    <img src="{{ asset('imgs/image/arch1.jpg') }}" class="w-12 h-12" alt="">
                </div>
                <h4 class="font-bold text-xl">
                    الدقة
                </h4>
            </div>
        </div>
    </div>
</div>

<!-- our works  -->
<div class="mt-[5%]">
    <div class="flex flex-col items-center justify-center space-y-8">
        <h2 class="text-black font-bold text-3xl text-center">{{ __('works')}}</h2>

        <!-- Swiper -->
        <div class="swiper-container mx-auto relative">
            <div class="swiper-wrapper mb-16">
                @foreach($works as $work)
                <div class="swiper-slide">
                    <div class="flex flex-col items-center justify-stretch rounded-3xl overflow-hidden bg-white h-[300px] p-0 shadow-xl w-full max-w-xs">
                        @if(app()->getLocale() == 'ar')
                        <a href="{{ route('projects.details' , ['',$work->id] ) }}" class="object-cover w-full">
                            <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" class="object-cover h-[150px] w-full" alt="">
                        </a>
                        <a href="{{ route('projects.details' , ['',$work->id] ) }}">
                            <div class="flex flex-col justify-center items-center p-3 space-y-3">
                                <h3 class="font-bold text-center text-xl"> {{ $work->title }} </h3>
                                <p class="font-normal text-lg text-center text-gray-500"> {{ $work->description }} </p>
                            </div>
                        </a>
                        @else
                        <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}" class="object-cover w-full">
                            <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" class="object-cover h-[150px] w-full" alt="">
                        </a>
                        <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}">
                            <div class="flex flex-col items-center p-3 space-y-3">
                                <h3 class="font-bold text-center text-xl"> {{ $work->title_en }} </h3>
                                <p class="font-normal text-lg text-center text-gray-500"> {{ $work->description_en }} </p>
                            </div>
                        </a>
                        @endif 
                    </div>
                </div>
                @endforeach
                {{--
                <div class="swiper-slide">
                    <div class="flex flex-col items-end justify-start rounded-3xl overflow-hidden bg-white h-[300px] p-0 shadow-xl w-full max-w-xs">
                        <a href="#" class="object-cover w-full">
                            <img src="{{ asset('imgs/image/gallery-5.png') }}" class="object-cover h-[150px] w-full" alt="">
                        </a>
                        <a href="#">
                            <div class="flex flex-col items-center p-3 space-y-3">
                                <h3 class="font-bold text-center text-xl">تصميم مودرن فله شاليه</h3>
                                <p class="font-normal text-lg text-center text-gray-500">نقدم خدمات هندسية شاملة تشمل الاستشارات وإدارة المشاريع في مجموعة متنوعة من القطاعات.</p>
                            </div>
                        </a>
                    </div>
                </div>
                --}}
                <!-- Add more slides as needed -->
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <!-- <div class="swiper-button-next"></div> -->
            <!-- <div class="swiper-button-prev"></div> -->
        </div>

    </div>
</div>

<!-- our services  -->
<div class="mt-[5%]">
    <div class="flex flex-col items-center justify-center space-y-20 p-8 py-16 bg-[#333333]">
        <h2 class="text-white font-bold text-3xl text-center">{{ __('public')['services'] }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 gap-y-20 max-w-[1100px]">

            @foreach($services as $service)
            <div class="relative flex flex-col justify-center items-center  border-2 border-white p-4 rounded-3xl h-[200px] w-full">
                <div class="absolute -top-[50px] right-10 p-4 rounded-md border-0 border-white bg-[#333333]">
                    <img src="{{ asset('imgs/image/cert.png') }}" alt="" class="w-[60px]" />
                </div>
                <p class="text-white">
                    @if(app()->getLocale() == 'ar')
                        <a href="{{ route('services.details' , ['', $service->id , $service->slug_ar ]) }}">
                        {{ $service->name }}
                        </a>
                    @else                        
                        <a href="{{ route('services.details' , [app()->getLocale(), $service->id ,  $service->slug_en ?? $service->slug_ar ]) }}">
                        {{ $service->name_en }}
                        </a>
                    @endif
                </p>
                @if(app()->getLocale() == 'ar')
                <a href="{{ route('services.details' , ['', $service->id , $service->slug_ar ]) }}" class="absolute -bottom-[20px] left-10 px-6 py-1 rounded-full border-2 border-white text-white  bg-[#333333]">{{ __('public')['more'] }}</a>
                @else
                <a href="{{ route('services.details' , [app()->getLocale(), $service->id ,  $service->slug_en ?? $service->slug_ar ]) }}" class="absolute -bottom-[20px] left-10 px-6 py-1 rounded-full border-2 border-white text-white  bg-[#333333]">{{ __('public')['more'] }}</a>
                @endif
            </div>
            @endforeach
            
        </div>

        <a href="{{ route('services') }}" class="cta_button">{{ __('public')['all_services'] }}</a>
        
    </div>
</div>

<!-- testmonial  -->
<div class="mt-[5%]">
    <div class="flex flex-col items-center justify-center space-y-20 p-8 py-0 bg-white">
        <h2 class="text-black font-bold text-3xl text-center">{{ __('public')['testimonial'] }}</h2>

        <div class="max-w-[1100px]">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center mb-4">
                        <!-- <img src="{{ asset('imgs/user1.png') }}" alt="Client 1" class="w-16 h-16 rounded-full mr-4 border-2 border-yellow-400"> -->
                        <div>
                            <h3 class="text-lg font-bold">أحمد الخالدي</h3>
                            <p class="text-gray-500">مدير مشروع</p>
                            <div class="flex">
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700">الشركة قدمت لنا استشارات هندسية على أعلى مستوى. بفضل رشيد العجيان، تمكنا من إتمام مشروعنا بنجاح وفي الوقت المحدد.</p>
                </div>
                <!-- Testimonial 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center mb-4">
                        <!-- <img src="{{ asset('imgs/user2.png') }}" alt="Client 2" class="w-16 h-16 rounded-full mr-4 border-2 border-yellow-400"> -->
                        <div>
                            <h3 class="text-lg font-bold">سارة العلي</h3>
                            <p class="text-gray-500">مهندسة معمارية</p>
                            <div class="flex">
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700">تجربتي مع رشيد العجيان كانت ممتازة. فريق العمل محترف ومتفهم، ويقدم حلولاً مبتكرة تناسب احتياجاتنا.</p>
                </div>
                <!-- Testimonial 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center mb-4">
                        <!-- <img src="{{ asset('imgs/user3.png') }}" alt="Client 3" class="w-16 h-16 rounded-full mr-4 border-2 border-yellow-400"> -->
                        <div>
                            <h3 class="text-lg font-bold">محمد الفهيد</h3>
                            <p class="text-gray-500">مدير تنفيذي</p>
                            <div class="flex">
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700">خدمات رشيد العجيان كانت متميزة. حصلنا على استشارات مهنية وفعّالة، مما ساعدنا في تحسين أداء مشاريعنا بشكل كبير.</p>
                </div>
                <!-- Testimonial 4 -->
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center mb-4">
                        <!-- <img src="{{ asset('imgs/user4.png') }}" alt="Client 4" class="w-16 h-16 rounded-full mr-4 border-2 border-yellow-400"> -->
                        <div>
                            <h3 class="text-lg font-bold">ليلى البدر</h3>
                            <p class="text-gray-500">رئيسة قسم التصميم</p>
                            <div class="flex">
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700">التعاون مع رشيد العجيان كان خطوة ممتازة. فريقهم يملك الخبرة والكفاءة اللازمة لتقديم استشارات قيّمة وفعّالة.</p>
                </div>
                <!-- Testimonial 5 -->
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center mb-4">
                        <!-- <img src="{{ asset('imgs/user5.png') }}" alt="Client 5" class="w-16 h-16 rounded-full mr-4 border-2 border-yellow-400"> -->
                        <div>
                            <h3 class="text-lg font-bold">ناصر العتيبي</h3>
                            <p class="text-gray-500">مستثمر</p>
                            <div class="flex">
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                                <svg class="w-5 h-5 star" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .587l3.668 7.428 8.214 1.193-5.93 5.771 1.399 8.156L12 18.897l-7.35 3.862 1.399-8.156-5.93-5.771 8.214-1.193z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700">رشيد العجيان قدمت لنا استشارات قيمة ساهمت في نجاح مشاريعنا الاستثمارية. نوصي بهم بشدة.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<x-contact />

<script async src="https://vjs.zencdn.net/8.10.0/video.min.js">
    const player = videojs('my-video');
    player.aspectRatio('16:9');
    player.fluid(true);
    player.responsive(true);
</script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        }
    });
</script>

<!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
<script type="application/ld+json">
    [{
        "@context": "http://schema.org",
        "@type": "LocalBusiness",
        "name": "شركة رشيد العجيان للاستشارات الهندسية",
        "telephone": "+966536385896",
        "email": "info@alojian.com",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Wadi Laban, Dhahrat Laban",
            "addressLocality": "Riyadh",
            "addressRegion": "Riyadh",
            "addressCountry": "Saudi Arabia",
            "postalCode": "13784"
        }
    }]
</script>

@include('public.footer')