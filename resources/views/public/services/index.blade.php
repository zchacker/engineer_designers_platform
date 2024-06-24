@include('public.header')

<section class="flex h-40 justify-center items-center flex-col bg-primary">
    <div class="w-full flex flex-col justify-center ps-8 h-full h-max-[1100px]">        
        <h1 class="text-black text-3xl font-bold mb-4">{{__('public')['services']}}</h1>        
    </div>
</section>

<section class="bg-white flex flex-col items-start justify-start space-y-4 py-8 px-8 h-max-[1100px]">
    <p class="font-medium text-xl text-start text-black">{{__('public')['vision_details']}}</p>
    <a href="https://wa.me/966536385896" class="cta_button">{{ __('service_cta_button') }}</a>
</section>

<section class="">
    <div class="flex flex-col items-stretch justify-center space-y-20 p-8 py-16 bg-white">        

        <div class="grid grid-cols-1 md:grid-cols-3  gap-6 gap-y-20 max-w-[1100px] mx-auto">
        @foreach($services as $service)
            <div class="relative flex flex-col justify-center items-start  border-4 border-primary p-4 rounded-3xl h-[200px] w-full">
                <div class="absolute -top-[40px] right-10 p-2 px-6 rounded-md border-4 border-primary bg-white">
                    <img src="{{ asset('imgs/image/build.png') }}" alt="" class="h-[50px]" />
                </div>
                <p class="text-black font-medium">
                    @if(app()->getLocale() == 'ar')
                        <a href="{{ route('services.details' , ['', $service->id , $service->slug_ar ]) }}">
                        {{ $service->name }}
                        </a>
                    @else                        
                        <a href="{{ route('services.details' , [app()->getLocale(), $service->id ,  $service->slug_en ?? $service->slug_ar ]) }}">
                        {{ $service->name_en }}
                        </a>
                    @endif
                </p>
                @if(app()->getLocale() == 'ar')
                <a href="{{ route('services.details' , ['', $service->id , $service->slug_ar ]) }}" class="absolute -bottom-[20px] left-10 px-6 py-1 rounded-full border-2 border-primary text-black font-bold  bg-primary">{{ __('public')['more'] }}</a>
                @else
                <a href="{{ route('services.details' , [app()->getLocale(), $service->id ,  $service->slug_en ?? $service->slug_ar ]) }}" class="absolute -bottom-[20px] left-10 px-6 py-1 rounded-full border-2 border-primary text-black font-bold  bg-primary">{{ __('public')['more'] }}</a>
                @endif
            </div>
        @endforeach
        </div>  
        
        <div class="flex justify-center text-left mt-10 w-full mx-auto" dir="rtl">
            {{-- $posts->onEachSide(5)->links('pagination::tailwind') --}}
            {{ $services->onEachSide(5)->links('components.pagination') }}
        </div>
        
    </div>
</section>


@include('public.footer')