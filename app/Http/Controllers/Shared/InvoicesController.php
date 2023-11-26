<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Models\InvoicesModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\Seller;
use LaravelDaily\Invoices\Invoice;

class InvoicesController extends Controller
{
    
    public function show(Request $request)
    {
        // to solve Arabic problem see: https://github.com/Ab-Alselwi/laravel-arabic-html
        // just add ->toArabicHTML(); to file invoice at line:
        // View::make($template, ['invoice' => $this])
        // wiil be like View::make($template, ['invoice' => $this])->toArabicHTML();
                
        $invoice_data = InvoicesModel::where('id', $request->invoice_id)->first();
        
        if(!$invoice_data)
        {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $customer_data = $invoice_data->order_data->user_data;        

        $customer = new Buyer([
            'name'          => $invoice_data->client_name,
            'custom_fields' => [
                'email' => $customer_data->email,
                'phone' => $customer_data->phone
            ],
        ]);

        $seller = new Party([
            'name'          => "شركة رشيد العجيان للدراسات <br/>والاستشارات الهندسية شركة مهنية",
            "company_no" => "1010877829",
            'custom_fields' => [
                'email' => "info@alojian.com",
                'phone' => "+966536385896"
            ],
        ]);
        
        $items = [];
        
        foreach($invoice_data->items as $item)
        {
            // dd($item);
            $item_data = new InvoiceItem();
            $item_data->title = $item->description;
            $item_data->price_per_unit = $item->price;  
            $item_data->quantity = $item->quantity;

            array_push($items, $item_data );
        }
          
        // dd($items);

        $invoice = Invoice::make()
            ->template('invoice_temp')
            ->name("عنوان الفاتورة")
            ->buyer($customer)
            ->seller($seller)
            ->status($invoice_data->status)            
            // ->totalDiscount($invoice_data->discount)
            // ->discountByPercent(10)
            ->taxRate(15)
            // ->shipping(1.99)            
            ->totalAmount($invoice_data->total_amount)
            ->addItems($items);        
        
        if($invoice_data->discount_type == 'percentage'){            
            $invoice->discountByPercent($invoice_data->discount);
        }else{
            $invoice->totalDiscount($invoice_data->discount);
        }

        // dd($invoice);

        return $invoice->stream();
    }

}
