@include('public.header')
<section class="bg-gray-200 py-14">
    <div class="bg-white max-w-screen-md p-8 rounded-md mx-4 md:mx-auto">
        <div class=" py-6 text-center">
            <h1 class="text-4xl font-bold text-gray-800">{{ $post->title ?? 'سياسة الخصوصية' }}</h1>
        </div>        

        {!! $post->body !!}

    </div>
</section>
@include('public.footer')