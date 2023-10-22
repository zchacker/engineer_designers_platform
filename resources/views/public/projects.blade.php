@include('public.header')
<section class="flex h-72 justify-center items-center flex-col">
    <div class="w-full h-screen bg-cover bg-center" style="background-image: url('{{asset('imgs/image/project.jpg')}}');">
        <div class="w-full h-full flex  justify-center items-center bg-black/50 backdrop-brightness-100">
            <h2 class="text-white text-3xl font-bold mb-4">{{__('public')['projects']}}</h2>
        </div>
    </div>
</section>

<section class="min-h-screen p-8">
@if($works->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-8">
        @foreach($works as $work)
            <div class="flex flex-col items-center p-8 hover:shadow-sm border">
                <a href="#" class="">
                    <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" alt="" class="w-40" />
                    <h2 class="text-black text-xl mt-4 font-bold">عنوان العمل</h2>
                </a>
            </div>
        @endforeach
    </div>
@else 

<div class="flex flex-col  h-[70vh] items-center justify-center mx-8">
    <img src="{{ asset('imgs/empty.png') }}" alt="" class="w-40">
    <h2 class="font-bold text-gray-700 text-xl mt-8">{{ __('public')['no_projects'] }}</h2>
</div>

@endif
</section>
@include('public.footer')