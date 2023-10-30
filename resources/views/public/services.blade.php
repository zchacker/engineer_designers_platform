@include('public.header')
<section class="flex h-40 justify-center items-center flex-col">
    <div class="w-full h-screen bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.jpg')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('public')['services']}}</h1>
        </div>
    </div>
</section>

<section class="bg-slate-200 flex items-center justify-center py-6">
    <h2 class="font-bold text-3xl text-center text-black">خدماتنا شاملة لجميع المجالات الهندسية</h2>
</section>

<section class="bg-slate-200 py-10 md:py-16">    
    <div class="grid md:grid-cols-3 gap-4 px-6">
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service1'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service1_details'] }}</p>
            </div>
        </div>
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service2'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service2_details'] }}</p>
            </div>
        </div>
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service3'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service3_details'] }}</p>
            </div>
        </div>
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service4'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service4_details'] }}</p>
            </div>
        </div>
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service5'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service5_details'] }}</p>
            </div>
        </div>
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service6'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service6_details'] }}</p>
            </div>
        </div>
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service7'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service7_details'] }}</p>
            </div>
        </div>
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service8'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service8_details'] }}</p>
            </div>
        </div>
        <div class="flex-wrap items-center relative shadow-lg rounded-md bg-white h-[320px]">
            <div class="flex flex-col items-center justify-center h-full p-4">
                <img src="{{ asset('imgs/image/s4.png') }}" class="absolute -top-[2px] h-[100px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service9'] }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ __('public')['service9_details'] }}</p>
            </div>
        </div>        
    </div>
   
</section>
@include('public.footer')