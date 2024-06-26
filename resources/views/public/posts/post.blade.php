@include('public.header')

<style>
    #blog-body a {
        color: #292fd5 !important;
    }

    #blog-body a:hover {
        text-decoration: underline !important;
        color: #3279f9 !important;
    }
</style>

<section class="flex flex-col items-center mx-0 my-0">

    <div class="relative w-full h-[400px] flex flex-col items-center">
        <img class="object-cover w-full h-full" alt="{{ $post->title }}" title="{{ $post->title }}" src="{{ $post->image->fileName ?? asset('imgs/image/post-cover.webp') }}">
        <div class="bg-black/60 w-full h-full absolute top-0 bottom-0 left-0 right-0"></div>
        <h1 class="absolute top-[50%] text-white font-bold text-3xl text-center">{{ $post->title }}</h1>
    </div>

    <div class="my-8">
    </div>

    <div class="mx-[4%] md:mx-16 mb-16 bg-white p-4 rounded-xl w-full md:w-[800px]" id="blog-body">
        @php
        $call_btn = '<div class="my-8">
            <a href="https://wa.me/966536385896" target="_blank" class="flex items-center justify-center gap-4 bg-green-400 w-full h-full !text-white font-bold p-2 rounded-sm shadow-xl hover:!no-underline">
                <span class="!text-white">' . __('call_us_now') . '</span>
            </a>
        </div>';
        @endphp
        
        {!! str_replace('[cta_btn]', $call_btn, $post->body) !!}

    </div>

    <div class="mt-16 mb-0 bg-[#4B4B4B] p-8 w-full">
        <div class="flex flex-col space-y-5 max-w-[1100px] mx-auto">
            <h2 class="font-bold text-3xl text-white">{{ __('related_posts') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($related_posts as $related_post)
                <div class="flex flex-col justify-between space-y-4 bg-white pb-2 rounded-3xl overflow-hidden">
                    <img src="{{ $related_post->image->fileName ?? asset('imgs/image/post-cover.webp') }}" class="h-[170px] object-cover" alt="{{ $related_post->title }}">
                    <a href="{{ route('blog.post', ['',$related_post->id, $related_post->slug]) }}">
                        <h3 class="font-bold text-lg text-black mx-4">{{ $related_post->title }}</h3>
                    </a>
                    <a href="{{ route('blog.post', ['',$related_post->id, $related_post->slug]) }}" class="mx-4 text-primary text-xl">{{ __('read') }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</section>

@include('public.footer')