@include('public.header')
<section class="flex h-40 justify-center items-center flex-col">
    <div class="w-full flex flex-col justify-center pr-8 h-full bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.webp')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('public')['services']}}</h1>
        </div>
    </div>
</section>

<section class="bg-white flex items-center justify-center py-8">
    <h2 class="font-bold text-3xl text-center text-black">{{__('public')['service_message']}}</h2>
</section>

<section class="bg-white py-10 md:py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 px-6 gap-x-4 gap-y-20">

        @foreach($services as $service)
        <div class="relative p-4 shadow-lg shadow-gray-400 border rounded-3xl py-12">
            <div class="flex flex-col items-center justify-center h-full p-4 pb-0">
                <img src="{{ $service->file->fileName ?? asset('imgs/image/s2.png') }}" class="absolute -top-[70px] h-[120px] text-green-700 mb-4 mx-auto" />
                <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ $service->name }}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-center">{{ Str::limit( $service->description , 100)}}</p>
                <a href="{{ route('services.details' , [ $service->id , $service->name ]) }}" class="normal_button mt-4">{{ __('public')['more'] }}</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@include('public.footer')