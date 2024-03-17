@include('admin.header')
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
                                    {{__('works_list')}}
                                </h1>

                                <p class="mt-2 text-sm text-gray-700">
                                    {{__('works_list_eng_message')}}
                                </p>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <a href="{{ route('admin.my.work.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">
                                    {{__('create_work')}}
                                </a>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    @if($works->isNotEmpty())
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                            <tr>

                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                                                    #
                                                </th>

                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-right text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">
                                                    {{__('work_title')}}
                                                </th>

                                                <th scope="col" class="py-3.5 px-3 text-right text-sm font-semibold text-gray-900">
                                                    {{__('engineer_name')}}
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
                                            @foreach($works as $work)
                                            <tr>

                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">
                                                    {{ $work->id }}
                                                </td>

                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">
                                                    {{ $work->title }}
                                                </td>

                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                                    <a href="{{ route('admin.engineers.details' , $work->engineer->id ) }}" class="text-blue-700 hover:underline">
                                                        {{ strip_tags( Str::limit( $work->engineer->name , 25) ) }}
                                                    </a>
                                                </td>

                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                                    {{ $work->created_at }}
                                                </td>

                                                <td class="relative flex justify-between whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                    <a href="{{  route('admin.my.work.details' , $work->id)  }}" class="text-gray-600 hover:text-gray-900" title="Download File">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>

                                                    <form action="{{ route('admin.my.work.delete', $work->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf

                                                        <button type="button" onclick="confirmDelete()" class="text-red-600 hover:text-red-900" title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>
                                        {!! __('empty_work_list' , ['work_btn' => "<a href='" . route(' admin.my.work.create') . "'  class='font-sans text-blue-600 hover:text-blue-500'>" . __('create_work') . "</a>" ] ) !!} </p>
                                            @endif
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

</div>

<script>
    function confirmDelete() {
        if (confirm(" {{__('cancel_work_confirmation')}} ")) {
            // If the user confirms, submit the form
            document.forms[0].submit(); // You may need to adjust the form index if you have multiple forms on the page
        }
    }
</script>

@include('admin.footer')