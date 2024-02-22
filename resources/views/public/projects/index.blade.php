@include('public.header')
<section class="flex h-40 justify-center items-center flex-col">
    <div class="w-full h-full bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.webp')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('public')['projects']}}</h1>
        </div>
    </div>
</section>

<section class="min-h-fit py-8 px-8 text-center">
    <p>
        {{ __('public')['design_title'] }}
    </p>
    <p>
        {{ __('public')['design_subtitle'] }}
    </p>
</section>

<section class="min-h-screen p-8">
    @if($works->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:mx-8">
        @foreach($works as $work)
        <div class="flex flex-col items-center justify-center p-8 shadow-md shadow-gray-400 rounded-2xl h-[380px]">
            @if(app()->getLocale() == 'ar')
            <a href="{{ route('projects.details' , ['',$work->id] ) }}" class="text-center  h-full">
                @else
                <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}" class="text-center  h-full">
                    @endif
                    <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" alt="{{$work->title}}" class="h-[250px] object-cover" loading="lazy" />
                    @if(app()->getLocale() == 'ar')
                    <h2 class="text-black text-xl mt-4 font-bold"> {{ $work->title }} </h2>
                    @else
                    <h2 class="text-black text-xl mt-4 font-bold"> {{ $work->title_en ?? $work->title  }} </h2>
                    @endif
                </a>
                @if(app()->getLocale() == 'ar')
                <a href="{{ route('projects.details' , ['',$work->id] ) }}" class="normal_button mt-4">{{__('work_details')}}</a>
                @else
                <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}" class="normal_button mt-4">{{__('work_details')}}</a>
                @endif
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