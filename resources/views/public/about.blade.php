@include('public.header')

<section class="md:grid md:grid-cols-2 md:min-h-[60vh] md:pb-20">
    <div class="p-4 md:pt-28 bg-white/60">
        <div class="flex flex-col space-y-8 justify-start items-start border-s-4 border-yellow-300 ps-4">
            <h1 class="font-bold text-5xl">{{ __('public')['about'] }}</h1>
            <p>
                {!! __('about_message') !!}
            </p>
            <a href="" class="cta_button">{{ __('service_cta_button') }}</a>
        </div>
    </div>

    <div class=" md:relative block md:block ">
        @if(app()->getLocale() == 'ar')
        <img src="{{ asset('imgs/image/yellow-bg.png') }}" alt="" class="absolute top-0 -z-10 left-0 h-[400px] opacity-100">
        @else
        <img src="{{ asset('imgs/image/yellow-bg-l.png') }}" alt="" class="absolute top-0 -z-10  right-0 h-[400px]  opacity-100">
        @endif
    </div>
</section>


<section class="p-4 md:pe-52 py-8">
    <div class="flex md:flex-row flex-col items-center gap-4">
        <div class="flex flex-col items-center space-y-4 md:w-[20%]">
            <img src="{{ asset('imgs/image/mission2.png') }}" class="object-contain w-[340px] h-[130px]" alt="">
            <h2 class="text-xl font-bold mb-4">{{__('public')['mission']}}</h2>
        </div>
        <div class="flex flex-col items-center space-y-4 md:w-[70%]">
            <p class="text-gray-800 leading-7 text-justify text-xl">
                {{__('public')['mission_details']}}
            </p>
        </div>
    </div>
</section>

<section class="p-4 md:pe-52 py-8">
    <div class="flex md:flex-row flex-col items-center gap-4">
        <div class="flex flex-col items-center space-y-4 md:w-[20%]">
            <img src="{{ asset('imgs/image/vision2.png') }}" class="object-contain w-[340px] h-[130px]" alt="">
            <h2 class="text-xl font-bold mb-4">{{__('public')['vision']}}</h2>
        </div>
        <div class="flex flex-col items-center space-y-4 md:w-[70%]">
            <p class="text-gray-800 leading-7 text-justify text-xl">
                {{__('public')['vision_details']}}
            </p>
        </div>
    </div>
</section>

<section style="background-image: url( {{ asset('imgs/image/right-yellow-bg.png') }} );" class="p-4 md:bg-transparent bg-[200px] bg-no-repeat bg-right bg-mobile2 " >
    <div class="flex flex-col items-center ">
        <h2 class="text-4xl font-bold mb-8">{{__('public')['why_us']}}</h2>
        <p class="text-xl text-gray-500">
            {{__('public')['why_us_details']}}
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-24 md:gap-16 gap-y-28">

            <div class="relative flex flex-col items-center bg-white rounded-3xl shadow-md p-8 py-16">
                <div class="absolute border-4 border-black bg-white rounded-full p-4 -top-16">
                    <img src="{{ asset('imgs/image/quality.png') }}" class="w-[70px]" alt="">
                </div>
                <h3 class="text-xl font-semibold mb-2">{{__('public')['quality']}}</h3>
                <p class="text-gray-700">
                    {{__('public')['quality_details']}}
                </p>
            </div>

            <div class="relative flex flex-col items-center bg-white rounded-3xl shadow-md p-8 py-16">
                <div class="absolute border-4 border-black bg-white rounded-full p-4 -top-16">
                    <img src="{{ asset('imgs/image/innovation.png') }}" class="w-[70px]" alt="">
                </div>
                <h3 class="text-xl font-semibold mb-2">{{__('public')['innovation']}}</h3>
                <p class="text-gray-700">
                    {{__('public')['innovation_details']}}
                </p>
            </div>

            <div class="relative flex flex-col items-center bg-white rounded-3xl shadow-md p-8 py-16">
                <div class="absolute border-4 border-black bg-white rounded-full p-4 -top-16">
                    <img src="{{ asset('imgs/image/team.png') }}" class="w-[70px]" alt="">
                </div>
                <h3 class="text-xl font-semibold mb-2">{{__('public')['team']}}</h3>
                <p class="text-gray-700">
                    {{__('public')['team_details']}}
                </p>
            </div>

        </div>
    </div>
</section>

<x-contact/>

@include('public.footer')