@include('public.header')

<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault(); // Prevent the default right-click context menu
    });
</script>

<section class="flex md:h-40 h-52 justify-center items-center flex-col">
    <div class="w-full h-full bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.webp')}}');">
        <!-- <div class="w-full h-full px-8 py-8 flex justify-center items-end bg-black/5 backdrop-brightness-100"> -->
        <div class="w-full h-full px-8 py-8 flex justify-start items-start md:items-center bg-black/5 ">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('work_details')}}</h1>
        </div>
    </div>
</section>

<section class="flex -mt-20 mx-4 md:mr-20 z-50">
    <div class="flex gap-8 justify-around items-end p-4 bg-transparent">
        <div>
            <img src="{{ $engineer->avatar->image->fileName ?? asset('imgs/user.png') }}" class="w-[100px] h-[100px] mx-auto p-2 rounded-full object-cover border-0 border-blue-300 object-cover" alt="">
            <div class="grid place-items-center ">
                @if(app()->getLocale() == 'ar')
                <h3 class="font-bold text-lg">{{ $engineer->name }}</h3>
                @else
                <h3 class="font-bold text-lg">{{ $engineer->name_en ?? $engineer->name }}</h3>
                @endif
            </div>
            <!-- <section class="flex items-center gap-4">
                <div class="my-2">
                    <a href="{{ route('client.order.create' , $engineer->id ) }}" class="normal_button">{{__('create_order')}}</a>
                </div>
            </section> -->
        </div>
        <div class="flex gap-6 justify-end items-end">
            <form action="{{ route('client.conversation.create') }}" method="post" class="flex">
                @csrf
                <input type="hidden" name="other_user_id" value="{{ $engineer->id }}">
                <button type="submit" class="flex text-yellow-400 hover:underline">
                    {{-- {{__('start_chat')}} --}}
                    <img src="{{ asset('imgs/messenger.png') }}" alt="{{__('start_chat')}}" title="{{__('start_chat')}}" class="w-[30px]" />
                </button>
            </form>
            <a href="{{ route('client.order.create' , $engineer->id ) }}" class="normal_button">{{__('create_order')}}</a>
        </div>

    </div>
</section>

<section>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b shadow-sm rounded-md border-gray-200">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                @if(app()->getLocale() == 'ar')
                                <h2 class="text-2xl font-bold">{{ $work->title }}</h2>
                                @else
                                <h2 class="text-2xl font-bold">{{ $work->title_en ?? $work->title }}</h2>
                                @endif
                            </div>
                        </div>
                        <div class="mt-8 flex flex-col">
                            <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="grid grid-cols-1 md:grid-cols-3  min-w-full py-2 ">
                                    @foreach($work->worksFiles as $file)
                                    @if($file->file_type == 'image')
                                    <div class="relative shadow-none rounded-sm border-none border-gray-300 p-4 mx-2 my-1 justify-center grid">
                                        <a href="{{ $file->file->fileName ?? asset('imgs/packaging.png') }}" data-lightbox="image-{{$file->file->id}}">
                                            <img src="{{ $file->file->fileName ?? asset('imgs/packaging.png') }}" data-src="{{ $file->file->fileName ?? asset('imgs/packaging.png') }}" loading="lazy" alt="" class="w-full object-cover" />
                                            <div class="absolute top-0 bottom-0 left-0 right-0 w-full h-full bg-transparent"></div>
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                                <hr>
                                <h3>{{ __('files') }}</h3>

                                <div class="grid grid-cols-2 md:grid-cols-5  min-w-full py-2 ">
                                    @foreach($work->worksFiles as $file)
                                    @if($file->file_type != 'image')
                                    <div class="shadow-none rounded-sm border-0 border-gray-300 p-4 mx-2 my-1 justify-center grid">
                                        <a href="{{ $file->file->fileName ?? '#' }}" download class="w-full h-full">
                                            <img src="{{ asset('imgs/file.png') }}" alt="" class="w-20" />
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include jQuery (required for Lightbox2) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include Lightbox2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

@include('public.footer')