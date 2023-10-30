@include('public.header')

<section class="flex h-40 justify-center items-center flex-col">
    <div class="w-full h-screen bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.jpg')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('works')}}</h1>
        </div>
    </div>
</section>


<section>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
            {{-- Content--}}
            <div class="p-6 bg-white border-b shadow-sm rounded-md border-gray-200">

                <section class="flex items-center gap-4 py-8 px-8">
                    <div class="my-2">
                        <a href="{{ route('client.order.create' , $engineer->id ) }}" class="normal_button">{{__('create_order')}}</a>
                    </div>
                </section>

                <div class="px-4 sm:px-6 lg:px-8">

                    <div class="mt-8 flex flex-col">
                        <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="grid grid-cols-1 md:grid-cols-3  min-w-full py-2 ">
                                @foreach($works as $work)

                                <a href="{{ route('engineers.work.details' , [$engineer->id , $work->id ]) }}">
                                    <div class="shadow-md rounded-md shadow-gray-400 p-4 mx-2 justify-center grid">
                                        <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" alt="" class="w-full object-cover" />
                                        <h2 class="text-center font-bold">{{ $work->title }}</h2>
                                    </div>
                                </a>

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
    </div>
</section>
@include('public.footer')