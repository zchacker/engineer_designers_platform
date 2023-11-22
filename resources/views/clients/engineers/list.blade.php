@include('clients.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h2 class="text-2xl font-bold mb-16"> {{__('engineers_list')}}</h2>
                        </div>
                    </div>

                    <div class="px-4 sm:px-6 lg:px-2 ">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            @foreach($engineers as $engineer)
                            <div class="p-4 shadow-md shadow-gray-400 rounded-2xl">
                                <div class="flex justify-end">
                                    
                                    <form action="{{ route('client.conversation.create') }}" method="post" class="flex">
                                        @csrf
                                        <input type="hidden" name="other_user_id" value="{{ $engineer->id }}">
                                        <button type="submit" class="flex text-yellow-400 hover:underline">
                                            {{-- {{__('start_chat')}} --}}
                                            <img src="{{ asset('imgs/messenger.png') }}" alt="{{__('start_chat')}}" title="{{__('start_chat')}}" class="w-[30px]" />
                                        </button>
                                    </form>
                                </div>
                                <img src="{{ $engineer->avatar->image->fileName ?? asset('imgs/user.png') }}" class="w-[100px] mx-auto p-2 rounded-lg border-0 border-blue-300 object-cover" alt="">
                                <div class="grid place-items-center">
                                    <h3 class="font-bold text-xl">{{ $engineer->name }}</h3>
                                    <div class="my-2">
                                        <a href="{{ route('client.engineers.details' , $engineer->id ) }}" class="text-blue-600">{{__('works_details')}}</a>
                                    </div>
                                    <div class="my-2">
                                        <a href="{{ route('client.order.create' , $engineer->id ) }}" class="normal_button">{{__('create_order')}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    

    <div class="text-left mt-10" dir="rtl">
        {{ $engineers->onEachSide(5)->links('pagination::tailwind') }}
    </div>

</div>
@include('clients.footer')