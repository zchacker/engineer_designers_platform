@include('supervisor.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto p-8">
                    <h2 class="text-2xl font-bold mb-4"> {{__('create_invoice')}} </h2>
                    <div class="overflow-x-auto relative">

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

                        <form id="invoiceForm" action="#" method="POST">
                            @csrf
                            <!-- Add fields for invoice details (client, date, etc.) -->
                            <div class="mb-6 border-2 border-gray-300 p-4 shadow-sm shadow-gray-300 rounded-lg">                            
                                
                                <div class="mb-12">
                                    <label for="client_name" class="lable_form">{{__('client_name')}}</label>
                                    <input type="text" name="client_name" placeholder="{{__('client_name')}}" class="form_input !w-full" required>
                                </div>
                                
                                <div class="mb-2 flex gap-2">
                                    <div class="mb-0 flex items-center gap-2 w-1/2">
                                        <label for="invoice_date" class="lable_form">{{__('invoice_date')}}</label>
                                        <input type="date" name="invoice_date" placeholder="{{__('invoice_date')}}" class="form_input" required>
                                    </div>

                                    <div class="mb-0 flex items-center gap-2 w-1/2">
                                        <label for="due_date" class="lable_form">{{__('due_date')}}</label>
                                        <input type="date" name="due_date" placeholder="{{__('due_date')}}" class="form_input" required>
                                    </div>
                                </div>
                                

                            </div>
                            <!-- Line Items -->
                            <div class="mb-6">
                                <h2 class="text-lg font-bold mb-2">{{__('items')}}</h2>
                                <div id="itemsList">
                                    <!-- First line item added by default -->
                                    <div class="flex items-center gap-2 mb-2">
                                        <input type="text" name="description[]" placeholder="{{__('description')}}" class="form_input !w-1/2" required>
                                        <input type="number" name="quantity[]" placeholder="{{__('quantity')}}" class="form_input !w-1/4" required>
                                        <input type="number" name="price[]" placeholder="{{__('price')}}" class="form_input !w-1/4" required>
                                        <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <a href="#" onclick="addItem()" class="text-blue-500 hover:text-blue-600 hover:underline px-4 py-2 rounded inline-block">{{__('add_item')}}</a>
                            </div>

                            <!-- Discounts -->
                            <div class="mb-6 w-1/2">
                                <h2 class="text-lg font-bold mb-2">{{__('discount')}}</h2>
                                <div class="flex items-center gap-2 mb-2">
                                    <input type="number" name="discount" placeholder="{{__('discount')}}" value="0" class="form_input" step="any">
                                    <select name="discount_type" class="form_input">
                                        <option value="percentage">{{__('percentage')}}</option>
                                        <option value="fixed">{{__('fixed')}}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tax Rate (if predefined) -->
                            @php
                            $taxRate = 15; // Example tax rate (you can replace this with your predefined tax rate)
                            @endphp

                            <!-- Tax -->
                            <div class="mb-6 flex items-center">
                                <span class="text-lg font-bold">{{__('tax')}}</span>
                                <span id="tax" class="px-3 py-2 w-full">{{ $taxRate }}%</span>
                                <input type="hidden" name="tax_rate" value="{{ $taxRate }}">
                            </div>

                            <!-- Total -->
                            <div class="mb-6 flex">
                                <span class="text-lg font-bold">{{__('total')}}: </span>
                                <span id="total" class="px-3 w-full"></span>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="normal_button">{{__('create')}}</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    function addItem() {

        // Create fields for a new item
        const itemFields = `
            <div class="flex items-center gap-2 mb-2">
                <input type="text" name="description[]" placeholder="{{__('description')}}" class="form_input !w-1/2" required>
                <input type="number" name="quantity[]" placeholder="{{__('quantity')}}" class="form_input !w-1/4" required>
                <input type="number" name="price[]" placeholder="{{__('price')}}" class="form_input !w-1/4" required>
                <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        `;

        // Append the new item fields to the itemsList div
        document.getElementById('itemsList').insertAdjacentHTML('beforeend', itemFields);
    }

    function removeItem(btn) {
        // Remove the item's fields
        btn.parentNode.remove();
    }

    function calculateTotal() {
        // Calculate total based on item prices and quantities
        const items = document.querySelectorAll('#itemsList .flex');
        let total = 0;

        items.forEach(item => {
            const quantity = parseFloat(item.querySelector('input[name="quantity[]"]').value);
            const price = parseFloat(item.querySelector('input[name="price[]"]').value);
            total += quantity * price;
        });

        // Apply predefined tax rate
        const taxRate = parseFloat(document.querySelector('input[name="tax_rate"]').value || 0);
        total += (total * (taxRate / 100));

        // Apply discount if provided
        const discount = parseFloat(document.querySelector('input[name="discount"]').value || 0);
        const discountType = document.querySelector('select[name="discount_type"]').value;
        if (discountType === 'percentage') {
            total -= (total * (discount / 100));
        } else {
            total -= discount;
        }

        // Display the total
        if (isNaN(total) == false) {
            document.getElementById('total').textContent = total.toFixed(2);
        } else {
            document.getElementById('total').textContent = '';
        }
    }

    // Calculate total when items are added/removed or discount/tax changes
    document.getElementById('invoiceForm').addEventListener('input', calculateTotal);
</script>
@include('supervisor.footer')