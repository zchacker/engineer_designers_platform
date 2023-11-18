@include('supervisor.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b shadow-sm rounded-md border-gray-200">

                    <div class="px-4 sm:px-6 lg:px-8">

                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    {{__('works')}}
                                </h1>                                
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col">
                            <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="grid grid-cols-3  min-w-full py-2 ">
                                    @foreach($works as $work)
                                    
                                    <a href="{{ route('supervisor.engineers.work.details' , [$engineer->id , $work->id ]) }}">
                                        <div class="shadow-md rounded-md p-4 mx-2 justify-center grid">
                                            <img src="{{ $work->worksFiles[0]->file->fileName ?? asset('imgs/packaging.png') }}" alt="" class="w-40" />
                                            <h2 class="text-center font-bold">{{ $work->title }}</h2>
                                        </div>
                                    </a>
                                                                               
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="text-left mt-10" dir="rtl">
                        {{ $works->onEachSide(5)->links('pagination::tailwind') }}
                    </div>

                </div>

            </div>
        </div>        
    </div>

</div>
@include('supervisor.footer')