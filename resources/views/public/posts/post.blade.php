@include('public.header')


<section class="flex flex-col items-center mx-0 my-0">
    
    <div class="relative w-full h-[400px] flex flex-col items-center">
        <img class="object-cover w-full h-full" alt="{{ $post->title }}" title="{{ $post->title }}" src="{{ $post->cover_image->fileName ?? asset('imgs/image/post-cover.webp') }}">
        <div class="bg-black/60 w-full h-full absolute top-0 bottom-0 left-0 right-0"></div>
        <h1 class="absolute top-[50%] text-white font-bold text-3xl text-center">{{ $post->title }}</h1>
    </div>
    
    <div class="my-8">
    </div>

    <div class="mx-4 md:mx-16 mb-16 bg-gray-50 p-4 rounded-xl">
        {!! $post->body !!}
    </div>

</section>

@include('public.footer')