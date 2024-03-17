@include('public.header')

<section class="relative min-h-[500px] py-16 px-8 md:min-h-[599px] md:pt-32 md:px-32">

    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $service->hero_img->fileName ?? asset('imgs/landing/Engineering Consulting Office.jpeg')}}')"></div>
    <!-- Overlay Div -->
    <div class="absolute inset-0 bg-black opacity-60"></div>

    <div class="absolute top-auto md:bottom-0 md:top-auto grid grid-cols-1 md:grid-cols-2">
        <div class="flex flex-col gap-8 items-start justify-center">
            @if(app()->getLocale() == 'ar')
            <h1 class="text-white text-4xl leading-[1.7] font-bold">{{ $service->name }}</h1>
            <h2 class="text-gray-300">{{ $service->sub_title}}</h2>
            @else
            <h1 class="text-white text-4xl leading-[1.7] font-bold">{{ $service->name_en }}</h1>
            <h2 class="text-gray-300">{{ $service->sub_title_en }}</h2>
            @endif
            <a href="{{ $service->cta_url ?? 'https://wa.me/966536385896' }}" class="cta_button" target="_blank">{{ __('service_cta_button') }}</a>
        </div>
        <div class="p-0 hidden md:block">
            <img class="h-full" src="{{ asset('imgs/landing/engineer-removebg-preview.png') }}" alt="{{ $service->name }}">
        </div>
    </div>

</section>

<section class="about-content py-16 px-8 md:pt-32 md:px-32">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="flex flex-col items-start gap-6">
            <h3 class="text-2xl font-bold">{{ __('about_service') }}</h3>
            @if(app()->getLocale() == 'ar')
            <div class="text-justify">{!! $service->about_service !!}</div>
            @else
            <div class="text-justify">{!! $service->about_service_en !!}</div>
            @endif
            <a href="{{ $service->cta_url ?? 'https://wa.me/966536385896' }}" class="cta_button" target="_blank">{{ __('service_cta_button') }}</a>
        </div>
        <div>
            <img class="h-full object-cover" src="{{ $service->about_img->fileName ?? asset('imgs/landing/shopping-mall.jpeg') }}" alt="{{ $service->about_img_alt }}" title="{{ $service->about_img_alt }}" />
        </div>
    </div>
</section>


<section class="bg-black py-8 px-8 md:py-16 md:px-32">
    <div class="flex justify-center items-center mb-10">
        <h3 class="text-white font-bold text-xl text-center"> {{ __('why_us_best_choice') }} </h3>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-0 gap-y-10 md:mx-auto md:max-w-[600px] items-center justify-center capitalize">
        <!-- beneft -->
        <div class="flex flex-col justify-center items-center gap-4">
            <div class="flex flex-col justify-center items-center rounded-full border-2 border-white p-4">
                <img src="{{ asset('imgs/landing/ph_star-fill.png') }}" alt="الجودة" class="h-8">
            </div>
            <h4 class="text-white font-bold text-xl">{{__('qulity')}}</h4>
        </div>

        <div class="flex flex-col justify-center items-center gap-4">
            <div class="flex flex-col justify-center items-center rounded-full border-2 border-white p-4">
                <img src="{{ asset('imgs/landing/solar_smart-home-bold.png') }}" alt="{{__('creativity')}}" class="h-8">
            </div>
            <h4 class="text-white font-bold text-xl">{{__('creativity')}}</h4>
        </div>

        <div class="flex flex-col justify-center items-center gap-4">
            <div class="flex flex-col justify-center items-center rounded-full border-2 border-white p-4">
                <img src="{{ asset('imgs/landing/mdi_laser-pointer.png') }}" alt="{{__('accuracy')}}" class="h-8">
            </div>
            <h4 class="text-white font-bold text-xl">{{__('accuracy')}}</h4>
        </div>

        <div class="flex flex-col justify-center items-center gap-4">
            <div class="flex flex-col justify-center items-center rounded-full border-2 border-white p-4">
                <img src="{{ asset('imgs/landing/arcticons_apager-pro.png') }}" title="{{__('professionalism')}}" alt="{{__('professionalism')}}" class="h-8">
            </div>
            <h4 class="text-white font-bold text-xl">{{__('professionalism')}}</h4>
        </div>
    </div>
</section>

<style>
    .about-content ul {
        list-style-type: disc;
        margin: 10px 30px;
    }
</style>

<section class="py-16 px-8 md:px-32">
    <div class="flex flex-col justify-start items-center gap-4">

        <h3 class="text-black font-bold text-xl mb-8 text-center">{{ __('get_special_service') }}</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center justify-start">

            <div class="min-w-[320px] md:min-w-[500px] border border-yellow-400 rounded-md p-1">
                <video id="my-video" class="video-js vjs-fluid vjs-16-9 rounded-sm" controls preload="auto" width="640" height="500" data-setup="{}">
                    <source src="{{ $service->video_file->fileName ??  'https://eu2.contabostorage.com/e4d9c3eca4674c9dbce474abbb48ddea:website/videos/rclol3.mp4' }}" type="video/mp4">
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
            </div>

            <div class="about-content flex flex-col items-start justify-start gap-6">
                @if(app()->getLocale() == 'ar')
                <div class="text-justify">{!! $service->about_plus !!}</div>
                @else
                <div class="text-justify">{!! $service->about_plus_en !!}</div>
                @endif
                <a href="{{ $service->cta_url ?? 'https://wa.me/966536385896' }}" class="cta_button" target="_blank">{{ __('service_cta_button') }}</a>
            </div>

        </div>
    </div>
</section>


<section class="relative flex flex-col justify-center min-h-[500px] py-8 px-4 md:min-h-[599px] md:py-16 md:px-32">

    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $service->cta_img->fileName ?? asset('imgs/landing/Engineering Consulting Office.jpeg')}}')"></div>
    <!-- Overlay Div -->
    <div class="absolute inset-0 bg-black opacity-60"></div>

    <!-- content  -->
    <div class="absolute  grid grid-cols-1 md:grid-cols-2 mx-3">
        <div class="flex flex-col gap-8 items-start justify-center">
            @if(app()->getLocale() == 'ar')
            <h2 class="text-white text-3xl leading-[1.5] font-bold">{{ $service->cta }}</h2>
            <h2 class="text-gray-300 text-lg"> {{ $service->sub_cta }}</h2>
            @else
            <h2 class="text-white text-3xl leading-[1.7] font-bold">{{ $service->cta_en }}</h2>
            <h2 class="text-gray-300 text-lg"> {{ $service->sub_cta_en }}</h2>
            @endif
            <a href="{{ $service->cta_url ?? 'https://wa.me/966536385896' }}" class="cta_button" target="_blank">{{ __('service_cta_button') }}</a>
        </div>
    </div>
</section>



<!-- contact us  -->
<section class="py-16 px-8 md:px-32">
    <div class="flex flex-col gap-4 capitalize">
        <h3 class="text-3xl font-bold text-center">{{ __('register_your_interest') }}</h3>
        <p class="text-gray-700 text-lg text-center">{{ __('register_your_interest_msg') }}</p>

        <div class="flex flex-col items-center justify-center md:px-60 mt-16">
            <form action="{{ route('contact-us.send') }}" method="post" class="!w-full">
                @csrf
                <div class="mb-4 flex flex-col md:flex-row gap-4 justify-evenly items-start">
                    <div class="w-full">
                        <label for="name" class="lable_form">{{ __('name') }}</label>
                        <input type="text" name="name" class="form_input !w-full" value="{{ old('name') }}" />
                    </div>
                    <div class="md:w-3/4 w-full">
                        <label for="phone_no" class="lable_form">{{ __('phone') }}</label>
                        <input type="text" name="phone_no" id="phone_no" placeholder="512345678" class="form_input !w-full !border-blue-500 text-left" dir="ltr" value="{{ old('phone') }}" />
                        <input type="hidden" name="phone_no[phone]" />
                    </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="lable_form">{{ __('email') }}</label>
                    <input type="text" name="email" class="form_input !w-full" value="{{ old('email') }}" />
                </div>

                <div class="mb-4">

                </div>


                <div class="mt-9">
                    <input type="submit" value="{{ __('send') }}" class="cta_button !px-16" />
                </div>


            </form>
        </div>
    </div>
</section>

{{--
<!-- find more  -->
<section class="bg-[#6F7678] py-16 px-8 md:px-32">
    <div class="flex flex-col gap-12">
        <h3 class="text-white font-bold text-2xl text-center">اكتشف خدماتنا الاخرى</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
            <div class="relative h-[250px] overflow-hidden rounded-lg">
                <a href="#" class="absolute w-full h-full flex items-center justify-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{asset('imgs/landing/Engineering Consulting Office.jpeg')}}')"></div>
<!-- Overlay Div -->
<div class="absolute inset-0 bg-black opacity-60"></div>

<h2 class="absolute bottom-5 text-white text-xl font-bold text-center z-50">اسم الخدمة</h2>
</a>
</div>

<div class="relative h-[250px] overflow-hidden rounded-lg">
    <a href="#" class="absolute w-full h-full flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{asset('imgs/landing/Engineering Consulting Office.jpeg')}}')"></div>
        <!-- Overlay Div -->
        <div class="absolute inset-0 bg-black opacity-60"></div>

        <h2 class="absolute bottom-5 text-white text-xl font-bold text-center z-50">اسم الخدمة</h2>
    </a>
</div>

<div class="relative h-[250px] overflow-hidden rounded-lg">
    <a href="#" class="absolute w-full h-full flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{asset('imgs/landing/Engineering Consulting Office.jpeg')}}')"></div>
        <!-- Overlay Div -->
        <div class="absolute inset-0 bg-black opacity-60"></div>

        <h2 class="absolute bottom-5 text-white text-xl font-bold text-center z-50">اسم الخدمة</h2>
    </a>
</div>
</div>
</div>
</section>
--}}

<script async src="https://vjs.zencdn.net/8.10.0/video.min.js">
    const player = videojs('my-video');
    player.aspectRatio('16:9');
    player.fluid(true);
    player.responsive(true);
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
    const input = document.querySelector("#phone_no");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        dropdownContainer: document.getElementById("form-cover"),
        initialCountry: 'sa',
        separateDialCode: true,
        preferredCountries: ["sa", "ae", 'uk', 'us'],
        hiddenInput: "phone"
    });
</script>

@include('public.footer')