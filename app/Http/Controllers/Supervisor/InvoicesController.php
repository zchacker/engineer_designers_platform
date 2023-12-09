<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\InvoiceItemsModel;
use App\Models\InvoicesModel;
use App\Models\OrderFeedbackModel;
use App\Models\UsersModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InvoicesController extends Controller
{
    public function list(Request $requests)
    {

        $query      = InvoicesModel::orderByDesc('created_at');
        $sum        = $query->count('id');
        $invoices   = $query->paginate(100);

        return view('supervisor.invoices.list', compact('invoices','sum'));

    }

    public function create(Request $requests)
    {
        return view('supervisor.invoices.create');
    }

    public function create_action(Request $request)
    {

        $rules = array(
            'description.*' => 'required',
            'quantity.*'    => 'required|numeric',
            'price.*'       => 'required|numeric',            
        );

        $messages = [
            'description.required'  => __('description_required'),
            'quantity.required'     => __('quantity_required'),
            'price.required'        => __('price_required'),
            'quantity.numeric'        => __('quantity_not_number'),
            'price.numeric'        => __('price_not_number'),
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            $total          = 0;
            $taxRate        = 15;
            $quantities     = $request->input('quantity');
            $prices         = $request->input('price');
            $descriptions   = $request->input('description');

            foreach ($quantities as $key => $quantity) {
                // Ensure both quantity and price are numeric before multiplying
                if (is_numeric($quantity) && is_numeric($prices[$key])) {
                    $total += $quantity * $prices[$key];
                }
            }

            // save invoice in db
            $invoice                    = new InvoicesModel();
            $invoice->client_name       = $request->client_name;
            $invoice->order_id          = $request->order_id;
            // $invoice->invoice_number    = 'INV-' . Str::random(8);
            $invoice->invoice_number    = 'INV-' . Carbon::now()->format('YmdHi');
            $invoice->invoice_date      = $request->invoice_date;
            $invoice->due_date          = $request->due_date;
            $invoice->tax               = ($total * ($taxRate / 100));
            $invoice->discount          = $request->discount;
            $invoice->discount_type          = $request->discount_type;            
            $invoice->total_amount      = $total;
            
            if($invoice->save()){

                // save all items
                foreach($descriptions as $key => $description){
                    // Ensure both quantity and price are numeric before multiplying
                    $invoice_item               = new InvoiceItemsModel();
                    $invoice_item->invoice_id   = $invoice->id;
                    $invoice_item->description  = $description;
                    $invoice_item->quantity     = $request->quantity[$key];
                    $invoice_item->price        = $request->price[$key];
                    $invoice_item->amount       = ($request->price[$key] * $request->quantity[$key]);
                    $invoice_item->save();
                }

            }

            // add it to order log
            $order_feedback                     = new OrderFeedbackModel();
            $order_feedback->comment            = '';
            $order_feedback->type               = 'add_invoice';
            $order_feedback->order_id           = $request->order_id;
            $order_feedback->user_id            = $request->user()->id;
            $order_feedback->show_to_client     = 0;
            $order_feedback->show_to_engineer   = 0;
            $order_feedback->invoice            = $invoice->id;
            $order_feedback->save();        
            
            // TODO: add invoice notification
            // send email to admin to check


            return back()->with(['success' => __('added_successfuly')]);            

        } else {

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            return back()
                ->withErrors(['error' => $allErrors])
                ->withInput($request->all());
        }
    }

    
}
