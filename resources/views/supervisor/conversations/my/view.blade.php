{{-- Include header --}}
@include('supervisor.header')

<div class="content2 w-full py-6 flex flex-col h-[100vh] bg-gray-300">
    <div class="py-0 flex-grow ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full flex flex-col">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg flex-grow">
                {{-- Conversation Header --}}
                <div class="p-4 bg-blue-500 text-white">
                    {{-- Add conversation title or other header content here --}}
                    <h2 class="text-xl font-semibold">{{ $otherUser->name }} | {{ $myUser->name }}</h2>
                    {{-- Assuming you have a $user object with a 'name' property --}}
                    @php
                        $firstCharOther = (substr($otherUser->name, 0, 1));
                        $firstCharMy    = (substr($myUser->name, 0, 1));
                    @endphp
                </div>
                
                {{-- Conversation Messages --}}
                <div class="flex flex-col overflow-y-auto h-[70vh] ">
                    <div class="flex-grow p-4">
                        @foreach($messages as $message)
                            @if($message->user_id != $otherUser->id)
                                <div class="flex items-start justify-start mb-4">
                                    <div class="rounded-full w-10 h-10 bg-blue-500 flex items-center justify-center text-white">
                                        {{$firstCharMy}}
                                    </div>
                                    <div class="ml-2">
                                        <div class="bg-gray-100 p-3 rounded-md shadow-md">
                                            {{-- Display message content here --}}
                                            <p class="text-gray-800">{{ $message->content }}</p>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-1">{{ $message->created_at }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-start justify-end mb-4">                                
                                    <div class="ml-2">
                                        <div class="bg-gray-100 p-3 rounded-md shadow-md">
                                            {{-- Display message content here --}}
                                            <p class="text-gray-800">{{ $message->content }}</p>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-1">{{ $message->created_at }}</p>
                                    </div>
                                    <div class="rounded-full w-10 h-10 bg-gray-500 flex items-center justify-center text-white">
                                        {{$firstCharOther}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- Message Input Form --}}
                <form action="{{ route('admin.my.conversation.message.send', ['conversationId' => $conversation->id]) }}" method="POST" class="px-4 py-6 mt-0">
                    @csrf
                    <div class="flex items-center">
                        <input type="text" autocomplete="off" name="content" placeholder="{{__('write_message')}}" class="flex-grow p-3 rounded-full border border-gray-300 focus:outline-none focus:ring focus:border-blue-500">
                        <button type="submit" class="bg-blue-500 text-white p-3 ml-2 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-500">{{__('send_message')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

{{-- Include footer --}}
@include('supervisor.footer')
