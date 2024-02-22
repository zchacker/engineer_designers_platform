@include('admin.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b shadow-sm rounded-md border-gray-200">

                    <div class="px-4 sm:px-6 lg:px-8">

                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-3xl font-bold text-md mb-5 text-gray-600">
                                    {{__('work_details')}}
                                </h1>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col">
                            <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">

                                @if(Session::has('errors'))
                                <div class="my-3 w-auto p-4 bg-orange-500 text-white rounded-md">
                                    {!! session('errors')->first('error') !!}
                                </div>
                                @endif

                                @if(Session::has('success'))
                                <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                                    {!! session('success') !!}
                                </div>
                                @endif

                                <form action="{{ route('admin.work.edit.action') }}" method="post" class="w-full border-b" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="work_id" value="{{ $work->id }}">

                                    <div class="mb-4 items-center">
                                        <label for="order_title" class="lable_form">{{ __('work_title') }} <span class="text-red-500">*</span> </label>
                                        <input type="text" name="title" id="work_title" class="form_input !w-full" maxlength="25" value="{{ $work->title ?? old('title') }}" />
                                    </div>

                                    <div class="mb-4 items-center">
                                        <label for="work_details" class="lable_form">{{ __('work_details') }} <span class="text-red-500">*</span> </label>
                                        <textarea name="description" id="work_details" class="form_input !w-full" cols="30" rows="10">{{ $work->description ?? old('description') }}</textarea>
                                    </div>

                                    <div class="mb-4 items-center">
                                        <label for="order_title" class="lable_form">English Work Title <span class="text-red-500">*</span> </label>
                                        <input type="text" name="title_en" id="work_title" class="form_input !w-full" maxlength="255" value="{{ $work->title_en ??  old('title_en') }}" />
                                    </div>

                                    <div class="mb-4 items-center">
                                        <label for="work_details" class="lable_form">English Work Details <span class="text-red-500">*</span> </label>
                                        <textarea name="description_en" id="work_details" class="form_input !w-full" cols="30" rows="10">{{ $work->description_en ??  old('description_en') }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <input id="submitButton" type="submit" value="{{ __('save') }}" class="action_btn" />
                                    </div>

                                </form>

                                <div class="grid grid-cols-3 mt-16  min-w-full py-2 bg-gray-50">
                                    @foreach($work->worksFiles as $file)
                                    @if($file->file_type == 'image')
                                    <div class="shadow-none rounded-sm border border-gray-300 p-4 mx-2 my-1 justify-center grid">
                                        <a href="{{ $file->file->fileName ?? asset('imgs/packaging.png') }}" data-lightbox="image-{{$file->file->id}}">
                                            <img src="{{ $file->file->fileName ?? asset('imgs/packaging.png') }}" data-src="{{ $file->file->fileName ?? asset('imgs/packaging.png') }}" loading="lazy" alt="" class="w-40" />
                                        </a>
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

<!-- Include jQuery (required for Lightbox2) -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include Lightbox2 JavaScript -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


@include('admin.footer')