@include('public.header')

<section class="flex h-40 justify-center items-center flex-col bg-primary">
    <div class="w-full flex flex-col justify-center ps-8 h-full h-max-[1100px]">
        <h1 class="text-black text-3xl font-bold mb-4">{{__('public')['projects']}}</h1>
    </div>
</section>

<section class="bg-white flex flex-col items-start justify-start space-y-4 py-8 px-8 h-max-[1100px]">
    <p class="font-medium text-xl text-start text-black">{{__('public')['design_title']}}</p>
    <p class="font-medium text-xl text-start text-black">{{__('public')['design_subtitle']}}</p>
    <a href="https://wa.me/966536385896" class="cta_button">{{ __('service_cta_button') }}</a>
</section>

<section class="min-h-screen p-8 my-10">

    @if($works->isNotEmpty())

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:mx-8">
        @foreach($works as $work)

        {{--
        <div class="relative p-0 shadow-sm shadow-gray-100 border rounded-3xl py-0 overflow-hidden h-[300px]">
            <div class="relative flex flex-col items-center justify-stretch h-full p-0 pb-4">
                <div class="w-full">
                    <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" alt="مكتب مساحة" title="مكتب مساحة" class="w-full h-[150px] object-cover rounded-none text-green-700 mb-4 mx-auto">
                    @if(app()->getLocale() == 'ar')
                    <a href="{{ route('projects.details' , ['',$work->id] ) }}">
                        <h2 class="font-semibold text-gray-900 text-xl mb-2 text-center"> {{ $work->title }} </h2>
                    </a>                
                    @else
                    <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}">
                        <h2 class="font-semibold text-gray-900 text-xl mb-2 text-center"> {{ $work->title_en ?? $work->title }} </h2>
                    </a>                
                    @endif
                </div>
            
                @if(app()->getLocale() == 'ar')
                <a href="{{ route('projects.details' , ['',$work->id] ) }}" class="absolute bottom-4 cta_button mt-4">{{__('work_details')}}</a>
                @else
                <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}" class="absolute bottom-4 cta_button mt-4">{{__('work_details')}}</a>
                @endif
            </div>
        </div>  
        --}}   
        
        <div class="flex flex-col items-center justify-stretch rounded-3xl overflow-hidden bg-white h-[340px] p-0 shadow-xl w-full  transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110  duration-300">
            @if(app()->getLocale() == 'ar')
            <a href="{{ route('projects.details' , ['',$work->id] ) }}" class="object-cover w-full">
                <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" class="object-cover h-[150px] w-full" alt="">
            </a>
            <a href="{{ route('projects.details' , ['',$work->id] ) }}">
                <div class="flex flex-col justify-center items-center p-3 space-y-3">
                    <h3 class="font-bold text-center text-xl"> {{ $work->title }} </h3>
                    <p class="font-normal text-lg text-center text-gray-500"> {{ strip_tags( Str::limit( $work->description , 55) ) }} </p>
                </div>
            </a>
            @else
            <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}" class="object-cover w-full">
                <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" class="object-cover h-[150px] w-full" alt="">
            </a>
            <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}">
                <div class="flex flex-col items-center p-3 space-y-3">
                    <h3 class="font-bold text-center text-xl"> {{ $work->title_en ?? $work->title }} </h3>
                    <p class="font-normal text-lg text-center text-gray-500"> {{ strip_tags( Str::limit( $work->description_en ?? $work->description , 55) ) }} </p>
                </div>
            </a>
            @endif
            @if(app()->getLocale() == 'ar')
            <a href="{{ route('projects.details' , ['',$work->id] ) }}" class="mb-4 cta_button mt-4">{{__('work_details')}}</a>
            @else
            <a href="{{ route('projects.details' , [app()->getLocale(), $work->id] ) }}" class="mb-4 cta_button mt-4">{{__('work_details')}}</a>
            @endif
        </div>

        @endforeach
    </div>

    <div class="flex justify-center text-left mt-10 w-full mx-auto" dir="rtl">
        {{-- $works->onEachSide(5)->links('pagination::tailwind') --}}
        {{ $works->onEachSide(5)->links('components.pagination') }}
    </div>

    @else

    <div class="flex flex-col  h-[70vh] items-center justify-center mx-8">
        <img src="{{ asset('imgs/empty.png') }}" alt="" class="w-40">
        <h2 class="font-bold text-gray-700 text-xl mt-8">{{ __('public')['no_projects'] }}</h2>
    </div>

    @endif
</section>


@include('public.footer')