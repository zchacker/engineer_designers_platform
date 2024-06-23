@include('public.header')



<section class="flex h-40 justify-center items-center flex-col">
    <div class="w-full flex flex-col justify-center pr-8 h-full bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.webp')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('public')['blog']}}</h1>
        </div>
    </div>
</section>

<section class="bg-white py-10 md:py-16">
    @if($posts->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-3 px-6 gap-x-4 gap-y-20">
        @foreach($posts as $post)
        <div class="relative p-0 shadow-sm shadow-gray-200 border rounded-3xl py-0">
            <div class="flex flex-col items-center justify-between h-full pb-4 max-h-[480px] rounded-3xl border-s-4 border-primary">
                <a href="{{ route('blog.post', ['',$post->id, $post->slug]) }}">
                    <img alt="{{ $post->title }}" title="{{ $post->title }}" src="{{ $post->image->fileName ?? asset('imgs/image/post-cover.webp') }}" class="w-full h-[270px] object-cover rounded-tl-3xl rounded-tr-3xl text-green-700 mb-4 mx-auto" />
                    <h2 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ $post->title }}</h2>
                </a>
                <div class="flex items-end justify-between w-full px-4 ">
                    <div class="w-[100px]"></div>
                    <div>
                        <a href="{{ route('blog.post', ['',$post->id, $post->slug]) }}" class="normal_button mt-4">إقرأ المزيد</a>
                    </div>
                    <div class="flex gap-2 px-3 py-2 m-0 bg-gray-200 rounded-full items-center">
                        <span>125</span>
                        <img src="{{ asset('imgs/image/thumbsup.png') }}" alt="" class="h-[20px]">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-left mt-10 w-[500px] mx-auto" dir="rtl">
        {{-- $posts->onEachSide(5)->links('pagination::tailwind') --}}
        {{ $posts->onEachSide(5)->links('components.pagination') }}
    </div>
    @else

    <div class="flex flex-col  h-[70vh] items-center justify-center mx-8">
        <img src="{{ asset('imgs/empty.png') }}" alt="" class="w-40">
        <h2 class="font-bold text-gray-700 text-xl mt-8">{{ __('public')['no_posts'] }}</h2>
    </div>

    @endif
</section>



@include('public.footer')