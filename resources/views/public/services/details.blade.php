@include('public.header')
<section class="flex min-h-40 justify-center items-center flex-col">
    <div class="w-full flex flex-col justify-center pr-8 h-full bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.webp')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            @if(app()->getLocale() == 'ar')
            <h1 class="text-white text-3xl font-bold mb-4">{{ $service->name }}</h1>
            @else
            <h1 class="text-white text-3xl font-bold mb-4">{{ $service->name_en }}</h1>
            @endif
        </div>
    </div>
</section>

<section class="bg-white grid grid-cols-1 md:grid-cols-2 gap-8 w-3/4 mx-auto py-8">
    <div class="flex flex-col items-start justify-between order-2 md:order-1">
        @if(app()->getLocale() != 'ar')
        <div>{!! $service->description_en !!}</div>
        <!-- <a href="{{ route('login', app()->getLocale()) }}" class="normal_button mt-4">{{ __('public')['request_service'] }}</a> -->
        <a href="https://wa.me/966536385896" class="normal_button mt-4">{{ __('public')['request_service'] }}</a>
        @else
        <div>{!! $service->description !!}</div>
        <!-- <a href="{{ route('login') }}" class="normal_button mt-4">{{ __('public')['request_service'] }}</a> -->
        <a href="https://wa.me/966536385896" class="normal_button mt-4">{{ __('public')['request_service'] }}</a>
        @endif
    </div>
    <div class="order-1 md:order-2">
        <img src="{{ $service->file->fileName ?? asset('imgs/image/s2.png') }}" class="border border-gray-100 shadow-lg p-4 rounded-lg md:h-[420px] text-green-700 mb-4 mx-auto" />
    </div>
</section>



@include('public.footer')