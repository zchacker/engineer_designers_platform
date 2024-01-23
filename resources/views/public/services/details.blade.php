@include('public.header')
<section class="flex h-40 justify-center items-center flex-col">
    <div class="w-full flex flex-col justify-center pr-8 h-full bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.webp')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{ $service->name }}</h1>
        </div>
    </div>
</section>

<section class="bg-white grid grid-cols-1 md:grid-cols-2 gap-8 w-3/4 mx-auto py-8">
    <div class="flex flex-col items-start justify-between order-2 md:order-1">
        <div>{!! $service->description !!}</div>
        <a href="{{ route('login') }}" class="normal_button mt-4">{{ __('public')['request_service'] }}</a>
    </div>
    <div class="order-1 md:order-2">        
        <img src="{{ $service->file->fileName ?? asset('imgs/image/s2.png') }}" class="border border-gray-100 shadow-lg p-4 rounded-lg md:h-[420px] text-green-700 mb-4 mx-auto" />
    </div>
</section>



@include('public.footer')