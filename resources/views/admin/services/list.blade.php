@include('admin.header')

<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="px-4 sm:px-0 lg:px-0">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    {{__('services_list')}}
                                </h1>

                                <p class="mt-2 text-sm text-gray-700">
                                    {{ __('total').' : '.$sum}}
                                </p>
                                
                            </div>

                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <a href="{{ route('admin.services.create') }}" class="normal_button">
                                    {{__('service_create')}}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <table class="table">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">#</th>
                                            <th scope="col" class="py-3 px-6"> {{__('name')}} </th>
                                            <th scope="col" class="py-3 px-6"> {{__('type')}} </th>                                            
                                            <th scope="col" class="py-3 px-6"> {{__('created_at')}} </th>
                                            <th scope="col" class="py-3 px-6"> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table_body">
                                        @foreach($services as $service)
                                        <tr data-href="" class="clickable-row cursor-pointer hover:bg-gray-200">
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $service->id}} </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $service->name }} </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ __($service->type) }} </td>                                            
                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $service->created_at }} </td>
                                            <td class="relative flex gap-4 justify-between whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                {{--<a href="{{ route('client.order.details' , 1 ) }}" class="text-gray-600 hover:text-gray-900" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                </a>--}}                                                

                                                <a href="{{ route('admin.services.edit' , $service->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                                <form action="{{ route('admin.services.delete', $service->id) }}" method="POST">
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

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="text-left mt-10" dir="rtl">
            {{ $services->onEachSide(5)->links('pagination::tailwind') }}
        </div>

    </div>

</div>

<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>

<script>
    function confirmDelete() {
        if (confirm(" {{__('service_delete_confirmation')}} ")) {
            // If the user confirms, submit the form
            document.forms[0].submit(); // You may need to adjust the form index if you have multiple forms on the page
        }
    }
</script>

@include('admin.footer')