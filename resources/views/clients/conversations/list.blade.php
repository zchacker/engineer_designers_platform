{{-- Include header --}}
@include('clients.header')

<div class="content">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                {{-- Conversation List Header --}}
                <div class="p-4 bg-blue-500 text-white">
                    {{-- Title for the conversation list --}}
                    <h2 class="text-xl font-semibold">{{__('conversation_list')}}</h2>
                </div>

                {{-- Conversation List --}}
                <div class="p-4">
                    @forelse($conversations as $conversation)
                    <a href="{{ route('client.conversation.view', ['conversationId' => $conversation->id]) }}" class="block p-4 border-b hover:bg-gray-100">
                        <div class="flex items-center justify-between">
                            {{-- Display the names of participants or other conversation details --}}
                            <p class="text-lg font-semibold">
                                @foreach($conversation->users as $user)
                                {{ $user->name }}
                                @if (!$loop->last)
                                , <!-- Add a comma if it's not the last user -->
                                @endif
                                @endforeach
                            </p>
                            @php
                            // Retrieve the latest message for this conversation
                            $latestMessage = $conversation->messages->last();
                            @endphp
                            @if ($latestMessage)
                            <p class="text-sm text-gray-600">{{ $latestMessage->created_at->format('M d, Y H:i A') }}</p>
                            @endif
                        </div>
                        @if ($latestMessage)
                        <p class="text-gray-800 mt-2">{{ $latestMessage->content }}</p>
                        @endif
                    </a>
                    @empty
                    <p class="p-4 text-gray-600">No conversations found.</p>
                    @endforelse
                </div>


            </div>
        </div>
    </div>
</div>

{{-- Include footer --}}
@include('clients.footer')