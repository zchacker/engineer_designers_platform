<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderFeedbackModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    
    public function orders_list(Request $request)
    {
        $query = OrdersModel::orderByDesc('created_at');

        $sum        = $query->count("id");
        $orders     = $query->paginate(100);

        return view('admin.orders.list', compact('orders', 'sum'));
    }

    public function details(Request $request)
    {
        $order = OrdersModel::with(['image' , 'engineer_data'])        
        ->where('id', $request->order_id)
        ->first(); 
            
        $comments = OrderFeedbackModel::with('user_data')
        ->where('order_id', $request->order_id)
        ->get();
       
        return view('admin.orders.details', compact('order','comments'));
    }


    public function add_comment(Request $request)
    {
        $rules = array(
            'comment' => 'required',
        );

        $messages = [
            'comment.required' => __('order_details_required')
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            $order = new OrderFeedbackModel();
            $order->comment = $request->comment;
            $order->order_id = $request->order_id;
            $order->user_id = $request->user()->id;

            if($order->save())
            {
                
                return back()->with(['success' => __('added_successfuly')]);

            }else{

                return back()
                ->withErrors(['error' => __('unable_to_add')])
                ->withInput($request->all());
            
            }            

        }else{

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

    public function update_status(Request $request)
    {
        $rules = array(
            'update_status' => 'required',
        );

        $messages = [
            'update_status.required' => __('update_status_required')
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            $order = OrdersModel::find($request->order_id);
            $order->status = $request->update_status;            

            if($order->update())
            {
                
                return back()->with(['status_update_success' => __('updated_successfuly')]);

            }else{

                return back()
                ->withErrors(['status_update_error' => __('unable_to_add')])
                ->withInput($request->all());
            
            }            

        }else{

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            return back()
                ->withErrors(['status_update_error' => $allErrors])
                ->withInput($request->all());

        }
    }
    
}
