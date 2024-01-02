@include('admin.header')
<div class="content">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($valid_token)
                <h1 class="text-2xl font-bold mb-8"> {{__('meeting_create')}}</h1>
                <p>
                    <strong>{{__('client_name')}}</strong>:
                    {{ $user->name }}
                </p>

                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto">
                    <div class="overflow-x-auto relative p-2">

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

                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.meeting.create.action' , $client_id) }}" id="file-upload-form">
                            @csrf

                            <div class="mb-4  items-center">
                                <label for="title" class="block mt-4 mb-2">{{__('meeting_title')}}</label>
                                <input type="text" name="title" id="title" class="border py-2 px-3 w-full" value="{{ old('title') }}"  />
                            </div>

                            <div class="mb-4  items-center">
                                <label for="describtion" class="block mt-4 mb-2">{{__('meeting_describtion')}}</label>
                                <textarea name="describtion" id="describtion" cols="30" rows="10" class="border py-2 px-3 w-full">{{ old('describtion') }}</textarea>                                
                            </div>

                            <div class="flex mb-4  items-center">
                                <label for="file-input" class="block mt-4 mb-2 font-bold">{{__('meeting_date')}}</label>
                            </div>

                            <div class="md:flex justify-start gap-4 mb-4 items-center">
                                <div>
                                    <label for="date" class="block mt-4 mb-2">{{__('date')}}</label>
                                    <input type="date" name="date" id="date" class="border py-2 px-3 w-full" value="{{ old('date') }}" />
                                </div>
                                <div>
                                    <label for="time" class="block mt-4 mb-2">{{__('time')}}</label>
                                    <input type="time" name="time" id="time" class="border py-2 px-3 w-full" value="{{ old('time') }}" />
                                </div>
                            </div>                            

                            <hr>
                            <div class="my-4  items-center">
                                <button type="submit" id="submit_btn" class="normal_button">
                                    {{__('create_google_meet')}}
                                    <img src="{{ asset('imgs/G.png') }}" class="bg-white w-10 h-10 p-1 mx-4 rounded-md" alt="">
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
                @else 
                <div class="relative rounded-tl-md min-h-[50vh]  rounded-tr-md overflow-auto">
                    <h1 class="text-2xl font-bold mb-8"> {{__('meeting_create')}}</h1>
                    <img src="{{asset('imgs/image/google_meet.webp')}}" alt="Google Meet" class="w-[350px] h-[350px]">
                    <p class="text-xl my-8">{{__('meeting_permission_required')}}</p>
                    <a href="{{route('admin.google.request.token')}}" class="normal_button my-8">{{__('meeting_permission_garant')}}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('admin.footer')