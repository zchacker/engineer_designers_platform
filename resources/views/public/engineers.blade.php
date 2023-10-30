@include('public.header')
<section class="flex h-40 justify-center items-center flex-col">
    <div class="w-full h-screen bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.jpg')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('public')['engineers']}}</h1>
        </div>
    </div>
</section>

<section class="min-h-screen p-8">
@if($engineers->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:mx-8">
        @foreach($engineers as $engineer)
            <div class="flex flex-col items-center justify-center text-center p-8 hover:shadow-lg border rounded-lg shadow-md">
                <a href="{{ route('engineers.details', $engineer->id) }}" class="">
                    <img src="{{ $engineer->avatar->image->fileName ?? asset('imgs/user.png') }}" alt="" class="w-full object-cover" />
                    <h2 class="text-black text-xl mt-4 font-bold">{{ $engineer->name }}</h2>
                </a>
            </div>            
        @endforeach
    </div>
@else 

<div class="flex flex-col  h-[70vh] items-center justify-center mx-8">
    <img src="{{ asset('imgs/empty.png') }}" alt="" class="w-40">
    <h2 class="font-bold text-gray-700 text-xl mt-8">{{ __('public')['no_engineers'] }}</h2>
</div>

@endif
</section>
@include('public.footer')