@include('admin.header')

<div class="content">
    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b border-gray-200">
                {{-- Route::currentRouteName() --}}
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    {{__('engineers_list')}}
                                </h1>

                                <p class="mt-2 text-sm text-gray-700">
                                    {{ __('total').' : '.$sum}}
                                </p>
                            </div>

                            <div class="mt-4 sm:mt-0 flex sm:flex-none justify-end">
                                <a href="{{ route('admin.engineers.create') }}" class="normal_button">
                                    {{__('add_engineer')}}
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="mt-8 flex flex-col">
                        @if(request()->has('type') == 'trashed')
                        <a href="{{ route('admin.engineers.list') }}" class="text-blue-600 font-bold hover:underline mb-6">
                            العودة
                        </a>
                        @else
                        <a href="{{ route('admin.engineers.list') }}?type=trashed" class="text-red-600 font-bold hover:underline mb-6">
                            قائمة المحذوفين
                        </a>
                        @endif
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <table class="table">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">#</th>
                                            <th scope="col" class="py-3 px-6"> {{__('name')}} </th>
                                            <th scope="col" class="py-3 px-6"> {{__('email')}} </th>
                                            <th scope="col" class="py-3 px-6"> {{__('phone')}} </th>
                                            <th scope="col" class="py-3 px-6"> {{__('join_date')}} </th>
                                            <th scope="col" class="py-3 px-6"> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table_body">
                                        @foreach($engineers as $engineer)
                                        <tr data-href="" class="clickable-row cursor-pointer hover:bg-gray-200">
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $engineer->id }} </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $engineer->name }} </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $engineer->email }} </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $engineer->phone }} </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $engineer->created_at }} </td>
                                            <td class="relative flex gap-4 justify-between whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                <a href="{{ route('admin.engineers.details' , $engineer->id ) }}" class="text-gray-600 hover:text-gray-900" title="View">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>

                                                <form action="{{ route('admin.my.conversation.create') }}" method="post" class="flex">
                                                    @csrf
                                                    <input type="hidden" name="other_user_id" value="{{ $engineer->id }}">
                                                    <button type="submit" class="flex text-yellow-400 hover:underline w-6 h-4">
                                                        {{-- {{__('start_chat')}} --}}
                                                        <img src="{{ asset('imgs/messenger.png') }}" alt="{{__('start_chat')}}" title="{{__('start_chat')}}" class="w-6 h-6" />
                                                    </button>
                                                </form>

                                                <a href="{{ route('admin.engineers.edit' , $engineer->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                                @if($engineer->trashed())
                                                <form action="{{ route('admin.engineers.restore', $engineer->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$engineer->id}}" />

                                                    <button type="submit" class="text-red-600 hover:text-red-900" title="استعادة">
                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
                                                            <path fill="#7cb342" d="M24 3A21 21 0 1 0 24 45A21 21 0 1 0 24 3Z"></path>
                                                            <path fill="#dcedc8" d="M24,36.1c-6.6,0-12-5.4-12-12c0-3.6,1.6-7,4.4-9.3l2.5,3.1c-1.8,1.5-2.9,3.8-2.9,6.2c0,4.4,3.6,8,8,8 s8-3.6,8-8c0-2.1-0.8-4-2.2-5.5l2.9-2.7C34.8,18,36,21,36,24.1C36,30.7,30.6,36.1,24,36.1z"></path>
                                                            <path fill="#dcedc8" d="M12 13L21 13 21 22z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                                @else
                                                <form action="{{ route('admin.engineers.delete', $engineer->id) }}" method="POST" onsubmit="return confirmDelete();">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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
</div>

<script>
    // $(document).ready(function($) {
    //     $(".clickable-row").click(function() {
    //         window.location = $(this).data("href");
    //     });
    // });
</script>

<script>
    function confirmDelete() {
        return confirm(" {{__('delete_engineer_confirmation')}} ");

        //if (confirm(" {{__('delete_engineer_confirmation')}} ")) {
        // If the user confirms, submit the form
        //document.forms[0].submit(); // You may need to adjust the form index if you have multiple forms on the page
        //}
    }
</script>

@include('admin.footer')