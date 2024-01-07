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
                                                    {{ $work->created_at }}
                                                </td>

                                                <td class="relative flex justify-between whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                    <a href="{{  route('admin.work.details' , $work->id)  }}" class="text-gray-600 hover:text-gray-900" title="Download File">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>

                                                    <form action="{{ route('admin.work.update', $work->id) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf

                                                        <button type="submit">
                                                            @if(!$work->publish)
                                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="text-green-600 hover:text-green-900 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path fill="#828282" d="M33.958 12.988C33.531 6.376 28.933 0 20.5 0 12.787 0 6.839 5.733 6.524 13.384 2.304 14.697 0 19.213 0 22.5 0 27.561 4.206 32 9 32h6.5a.5.5 0 0 0 0-1H9c-4.262 0-8-3.972-8-8.5C1 19.449 3.674 14 9 14h1.5a.5.5 0 0 0 0-1H9c-.509 0-.99.057-1.459.139C7.933 7.149 12.486 1 20.5 1 29.088 1 33 7.739 33 14v1.5a.5.5 0 0 0 1 0v-1.509c3.019.331 7 3.571 7 8.509 0 3.826-3.691 8.5-8 8.5h-7.5c-3.238 0-4.5-1.262-4.5-4.5V12.783l4.078 4.07a.5.5 0 1 0 .708-.706l-4.461-4.452c-.594-.592-1.055-.592-1.648 0l-4.461 4.452a.5.5 0 0 0 .707.707L20 12.783V26.5c0 3.804 1.696 5.5 5.5 5.5H33c4.847 0 9-5.224 9-9.5 0-5.167-4.223-9.208-8.042-9.512z"></path>
                                                            </svg> -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-transparent fill-green-600 "  width="48" height="48" id="publish">
                                                                <path fill="none" d="M0 0h48v48H0z"></path>
                                                                <path d="M10 8v4h28V8H10zm0 20h8v12h12V28h8L24 14 10 28z"></path>
                                                            </svg>
                                                            @else
                                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="text-red-600 hover:text-red-900" width="42" height="32" id="upload" stroke="currentColor" stroke-width="1">
                                                                <path fill="#828282" d="M33.958 12.982C33.528 6.372 28.931 0 20.5 0c-1.029 0-2.044.1-3.018.297a.5.5 0 0 0 .199.981A14.156 14.156 0 0 1 20.5 1C29.088 1 33 7.739 33 14v1.5a.5.5 0 0 0 1 0V14l-.001-.016C37.062 14.248 41 16.916 41 22.5c0 4.767-3.514 8.5-8 8.5H9c-3.976 0-8-2.92-8-8.5C1 18.406 3.504 14 9 14h1.5a.5.5 0 0 0 0-1H9v-2c0-3.727 2.299-6.042 6-6.042 3.364 0 6 2.654 6 6.042v12.993l-4.16-3.86a.499.499 0 1 0-.68.732l4.516 4.189c.299.298.563.445.827.445.261 0 .52-.145.808-.433l4.529-4.202a.498.498 0 0 0 .026-.706.497.497 0 0 0-.706-.026L22 23.993V11c0-3.949-3.075-7.042-7-7.042-4.252 0-7 2.764-7 7.042v2.051c-5.255.508-8 5.003-8 9.449C0 27.105 3.154 32 9 32h24c5.047 0 9-4.173 9-9.5 0-6.304-4.557-9.278-8.042-9.518z"></path>
                                                            </svg> -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-red-600 fill-red-600 h-6" viewBox="0 0 16 16" width="48" height="48" id="down">
                                                                <path d="M1 13h14v3H1zm12-6-1.5-1.5-2.506 2.506L8.969 0H7.062l-.05 8.012L4.5 5.5 3 7l5 5z"></path>
                                                            </svg>
                                                            @endif
                                                            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg> -->
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>

                                    </p>
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
        if (confirm(" {{__('cancel_contract_confirmation')}} ")) {
            // If the user confirms, submit the form
            document.forms[0].submit(); // You may need to adjust the form index if you have multiple forms on the page
        }
    }
</script>

@include('admin.footer')