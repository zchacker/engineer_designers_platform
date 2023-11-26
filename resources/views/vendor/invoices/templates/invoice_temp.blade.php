<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "DejaVu Sans, sans-serif";
            text-align: right !important;
        }

        body {
            font-family: "DejaVu Sans, sans-serif";
            font-size: 14px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            direction: rtl;
            /* Set direction to right-to-left */
            text-align: right;
            /* Align text to the right */
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            /* Center the header text */
        }

        .invoice-details {
            display: flex;
            justify-items: start;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-details div {
            width: 100%;
        }

        .invoice-details-item {
            display: block;
            margin: 10px 0px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }        

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            font-weight: bold;
            text-align: center;
            /* Center align table headers */
        }

        .td-borderless{
            border-collapse: unset;
            border: 0px solid #000;
        }

        .summary {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .summary div {
            width: 30%;
            text-align: left;
            /* Align summary content to the left */
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            /* Center align the footer content */
        }

        .draft{
            color: gray;
        }

        .sent{
            color: orange;
        }

        .paid{
            color: green;
        }
    </style>
</head>

<body>    
    <div class="container">
        <!-- Invoice Header -->
        <h1 style="text-align: center;">الفاتورة</h1>
        <div class="invoice-details">
            <div>
                <div  class="invoice-details-item">
                    <p><strong>رقم الفاتورة:</strong> </p>
                    <p>INV-123</p>
                </div>
                <div  class="invoice-details-item">
                    <p><strong>التاريخ:</strong></p>
                    <p>20 November 2023</p>
                </div>
                <div  class="invoice-details-item">
                    <p><strong>الحالة:</strong></p>
                    <h1 class="{{$invoice->status}}">{{__($invoice->status)}}</h1>
                </div>
            </div>
            
        </div>
        
        <table>
            <tr class="td-borderless">

                @if($invoice->buyer->name)
                <td class="td-borderless">
                    <div class="invoice-details">
                        <div>
                            <p><strong>المشتري:</strong></p>    
                            <p>{{$invoice->buyer->name}}</p>            
                            <p>الرياض - المملكة العربية السعودية</p>                            
                        </div>            
                    </div>
                </td>
                @endif

                @if($invoice->seller->name)
                <td class="td-borderless">
                    <div class="invoice-details">
                        <div>
                            <p><strong>البائع:</strong></p>    
                            <p>{!! $invoice->seller->name  !!}</p>                             
                            <p>{{$invoice->seller->custom_fields['email']}}</p>
                            <p>{{$invoice->seller->custom_fields['phone']}}</p>
                            <p>الرياض المملكة العربية السعودية</p>
                            <p>سجل تجاري رقم : {{$invoice->seller->company_no}}</p>
                        </div>            
                    </div>
                </td>
                @endif
            </tr>
        </table>

        <!-- Invoice Table -->
        <table>
            <thead>
                <tr>
                    <th>الاجمالي</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>وصف</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample row, adjust as needed -->
                @foreach($invoice->items as $item)
                <tr>                    
                    <td>{{ $invoice->formatCurrency($item->sub_total_price ?? 0) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price_per_unit }}</td>
                    <td>{{ $item->title }}</td>
                </tr>
                @endforeach                
                <!-- Additional rows for other items -->
            </tbody>
        </table>

        

        <!-- Invoice Summary -->
        <div class="summary2">
            <table>
                <tr class="td-borderless">
                    <td class="td-borderless">
                        
                    </td>
                    <td class="td-borderless">
                        <div>

                            @if($invoice->hasItemOrInvoiceDiscount())
                            <p><strong>الخصم:</strong></p>                
                            <p>{{ $invoice->formatCurrency($invoice->total_discount) }}</p>
                            @endif
                            
                            @if($invoice->hasItemOrInvoiceTax())
                            <p><strong>مبلغ الضريبة:</strong></p>
                            {{ $invoice->formatCurrency($invoice->total_taxes) }}
                            @endif

                            <p><strong>الاجمالي:</strong></p>
                            <p>{{ $invoice->formatCurrency($invoice->total_amount) }}</p>

                        </div>
                    </td>
                </tr>
            </table>

            
        </div>

        <!-- Invoice Footer -->
        {{--<div class="footer">
            <p>Please pay until: 30 November 2023</p>
            <p>Notes: Payment due in 15 days</p>
        </div>--}}
    </div>
</body>

</html>