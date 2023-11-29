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
                                    {{__('invoices_list')}}
                                </h1>

                                <p class="mt-2 text-sm text-gray-700">
                                    {{ __('total').' : '.$sum}}
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                @if($invoices->isNotEmpty())
                                    <table class="table">
                                        <thead class="">
                                            <tr>                                            
                                                <th scope="col" class="py-3 px-6"> {{__('invoice_number')}} </th>
                                                <th scope="col" class="py-3 px-6"> {{__('order_number')}} </th>
                                                <th scope="col" class="py-3 px-6"> {{__('client_name')}} </th>
                                                <th scope="col" class="py-3 px-6"> {{__('invoice_date')}} </th>
                                                <th scope="col" class="py-3 px-6"> {{__('invoice_due_date')}} </th>
                                                <th scope="col" class="py-3 px-6"> {{__('status')}} </th>
                                                <th scope="col" class="py-3 px-6"> {{__('total')}} </th>
                                                <th scope="col" class="py-3 px-6"> </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_body">
                                            @foreach($invoices as $invoice)
                                            <tr data-href="" class="clickable-row cursor-pointer hover:bg-gray-200">
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $invoice->invoice_number }} </td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-center text-blue-500 font-bold hover:underline">
                                                    <a href="{{ route('supervisor.order.details' , $invoice->order_id) }}">
                                                        {{ $invoice->order_id }} 
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $invoice->client_name }} </td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $invoice->invoice_date }} </td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $invoice->due_date }} </td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500 {{$invoice->status}}"> {{__( $invoice->status )}} </td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"> {{ $invoice->total_amount }} </td>
                                                <td class="relative flex justify-between whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                    <a href="{{ route('invoices.show' , $invoice->id ) }}" target="_blank" class="text-gray-600 hover:text-gray-900" title="View">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else 
                                    <p>
                                        {!! __('empty_invoice_list' ) !!}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="text-left mt-10" dir="rtl">
            {{ $invoices->onEachSide(5)->links('pagination::tailwind') }}
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
        if (confirm(" {{__('delete_engineer_confirmation')}} ")) {
            // If the user confirms, submit the form
            document.forms[0].submit(); // You may need to adjust the form index if you have multiple forms on the page
        }
    }
</script>

@include('supervisor.footer')