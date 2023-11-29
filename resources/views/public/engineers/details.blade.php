@include('public.header')

<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault(); // Prevent the default right-click context menu
    });
</script>

<section class="flex md:h-40 h-52 justify-center items-center flex-col">
    <div class="w-full h-full bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.jpg')}}');">
        <!-- <div class="w-full h-full px-8 py-8 flex justify-center items-end bg-black/5 backdrop-brightness-100"> -->
        <div class="w-full h-full px-8 py-8 flex justify-start items-start md:items-center bg-black/5 ">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('works')}}</h1>
        </div>
    </div>
</section>

<section class="flex -mt-20 mx-4 md:mr-20 z-50">
    <div class="flex gap-8 justify-around items-end p-4 bg-transparent">
        <div>
            <img src="{{ $engineer->avatar->image->fileName ?? asset('imgs/user.png') }}" class="w-[100px] h-[100px] mx-auto p-2 rounded-full object-cover border-0 border-blue-300 object-cover" alt="">
            <div class="grid place-items-center ">
                <h3 class="font-bold text-lg">{{ $engineer->name }}</h3>
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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if($works->isNotEmpty())
        <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
            {{-- Content--}}
            <div class="p-6 bg-white border-b shadow-sm rounded-md border-gray-200">

                <!-- <section class="flex items-center gap-4 py-8 px-8">
                    <div class="my-2">
                        <a href="{{ route('client.order.create' , $engineer->id ) }}" class="normal_button">{{__('create_order')}}</a>
                    </div>
                </section> -->

                <div class="px-2 sm:px-4 lg:px-6">
                    <div class="mt-8 flex flex-col">
                        <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="grid grid-cols-1 md:grid-cols-3  min-w-full py-2 ">
                                @foreach($works as $work)
                                <div class="flex flex-col items-center justify-center gap-2 shadow-md rounded-md shadow-gray-400 p-4 mx-2">
                                    <div class="relative">                                         
                                        @if($work->worksFiles[0]->file_type == 'image')                              
                                            <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}"
                                            data-src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" loading="lazy"
                                            alt="" class="h-[300px] object-cover" />
                                        @else 
                                            <img src="{{ asset('imgs/packaging.png') }}"
                                            data-src="{{ asset('imgs/packaging.png') }}" loading="lazy"
                                            alt="" class="h-[300px] object-cover" />
                                        @endif
                                        <div class="absolute top-0 bottom-0 left-0 right-0 w-full h-full bg-transparent"></div>
                                    </div>
                                    <h2 class="text-center font-bold">{{ $work->title }}</h2>
                                    <a href="{{ route('engineers.work.details' , [$engineer->id , $work->id ]) }}" class="normal_button !w-auto">{{__('work_details')}}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <section class="flex items-center gap-4 py-8 px-8">
                    <div class="my-2">
                        <a href="{{ route('client.order.create' , $engineer->id ) }}" class="normal_button">{{__('create_order')}}</a>
                    </div>
                </section>

                <div class="text-left mt-10" dir="rtl">
                    {{ $works->onEachSide(5)->links('pagination::tailwind') }}
                </div>

            </div>
        </div>
        @else
        <div class="flex flex-col  h-[70vh] items-center justify-center mx-8">
            <img src="{{ asset('imgs/empty.png') }}" alt="" class="w-40">
            <h2 class="font-bold text-gray-700 text-xl mt-8">{{ __('public')['no_works_profile'] }}</h2>
        </div>
        @endif
    </div>
</section>
@include('public.footer')