@include('public.header')

<section class="my-4">
    <h1 class="font-bold text-3xl text-center">المدونة</h1>
</section>

<section class="bg-white py-10 md:py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 px-6 gap-x-4 gap-y-20">

        @foreach($posts as $post)
        <div class="relative p-0 shadow-lg shadow-gray-400 border rounded-3xl py-0">
            <div class="flex flex-col items-center justify-center h-full pb-4 max-h-[400px]">
                <a href="{{ route('blog.post', [$post->id, $post->slug]) }}">
                    <img alt="{{ $post->title }}" title="{{ $post->title }}" src="{{ $post->cover_image->fileName ?? asset('imgs/image/post-cover.webp') }}" class="w-full rounded-tl-3xl rounded-tr-3xl text-green-700 mb-4 mx-auto" />
                    <h2 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ $post->title }}</h2>
                </a>
                <a href="{{ route('blog.post', [$post->id, $post->slug]) }}" class="normal_button mt-4">إقرأ المزيد</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

<div class="text-left mt-10" dir="rtl">
    {{ $posts->onEachSide(5)->links('pagination::tailwind') }}
</div>

@include('public.footer')