@include('clients.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b shadow-sm rounded-md border-gray-200">

                    <div class="px-4 sm:px-6 lg:px-8">

                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-md mb-5 font-normal text-gray-600">
                                    {{__('work_details')}}
                                </h1> 
                                <h2 class="text-2xl font-bold">{{ $work->title }}</h2>                               
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col">
                            <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">                                

                                <div class="grid grid-cols-3  min-w-full py-2 ">
                                    @foreach($work->worksFiles as $file)
                                        
                                        @if($file->file_type == 'image')
                                            <div class="shadow-none rounded-sm border border-gray-300 p-4 mx-2 my-1 justify-center grid">
                                                <img src="{{ $file->file->fileName ?? asset('imgs/packaging.png') }}" alt="" class="w-40" />                                            
                                            </div> 
                                        @endif                                   
                                                                               
                                    @endforeach
                                </div>

                                <hr>
                                <h3>{{ __('files') }}</h3>

                                <div class="grid grid-cols-5  min-w-full py-2 ">
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

</div>
@include('clients.footer')