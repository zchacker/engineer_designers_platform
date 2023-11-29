@include('supervisor.header')
<div class="content">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="px-4 sm:px-6 lg:px-8">

                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    {{__('meetings_list')}}
                                </h1>

                                {{--<p class="mt-2 text-sm text-gray-700">
                                    {{__('meetings_list_eng_message')}}
                                </p>--}}
                            </div>

                        </div>

                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    @if(Session::has('success'))
                                    <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                                        {!! session('success') !!}
                                    </div>
                                    @endif

                                    @if($meetings->isNotEmpty())
                                        <table class="min-w-full divide-y divide-gray-300">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                                                        #
                                                    </th>

                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                                                        {{__('meeting_title')}}
                                                    </th>

                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                                                        {{__('client_name')}}
                                                    </th>

                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                                                        {{__('engineer_name')}}
                                                    </th>

                                                    <th scope="col" class="py-3.5 px-3 text-right text-sm font-semibold text-gray-900">
                                                        {{__('meeting_link')}}
                                                    </th>

                                                    <th scope="col" class="py-3.5 px-3 text-right text-sm font-semibold text-gray-900">
                                                        {{__('meeting_date')}}
                                                    </th>

                                                    <th scope="col" class="py-3.5 px-3 text-right text-sm font-semibold text-gray-900">
                                                        {{__('created_at')}}
                                                    </th>

                                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                                                        <span class="sr-only">{{__('action')}}</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody class="divide-y divide-gray-200">
                                                @foreach($meetings as $meet)
                                                <tr>

                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">
                                                        {{ $meet->id }}
                                                    </td>

                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">
                                                        {{ $meet->title }}
                                                    </td>

                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">
                                                        {{ $meet->user_data->name }}
                                                    </td>

                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">
                                                        {{ $meet->engineer_data->name }}
                                                    </td>

                                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                                        <a href="{{$meet->meeting_link}}" target="_blank" class="text-blue-500 hover:text-red-700">{{__('meeting_open_link')}}</a>
                                                    </td>

                                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500 {{ $meet->status }} text-right" dir="ltr">
                                                        {{ Carbon\Carbon::parse($meet->meet_date)->format('Y-m-d H:i') }}
                                                    </td>

                                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500 text-right" dir="ltr">
                                                        {{ Carbon\Carbon::parse($meet->created_at)->format('Y-m-d H:i') }}
                                                    </td>

                                                    <td class="relative flex justify-between whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                        {{--<a href="{{  route('engineer.meeting.show' , $meet->id)  }}" class="text-gray-600 hover:text-gray-900" title="Download File">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </a>

                                                        
                                                        <form action="{{ route('engineer.meeting.cancel', $meet->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf

                                                            <button type="button" onclick="confirmDelete()" class="text-red-600 hover:text-red-900" title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </form>--}}                                                   

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>  
                                    @else 
                                        <p>
                                            {!! __('empty_meeting_list' ) !!}
                                        </p>                                  
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="text-left mt-10" dir="rtl">
                            {{ $meetings->onEachSide(5)->links('pagination::tailwind') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('supervisor.footer')