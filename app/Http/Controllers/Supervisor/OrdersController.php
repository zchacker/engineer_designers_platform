<?php

namespace App\Http\Controllers\Supervisor;

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

        return view('supervisor.orders.list', compact('orders', 'sum'));
    }

    public function details(Request $request)
    {
        $order = OrdersModel::with(['image' , 'engineer_data'])        
        ->where('id', $request->order_id)
        ->first(); 
            
        $feedbacks = OrderFeedbackModel::with('user_data')
        ->where('order_id', $request->order_id)
        ->orderByDesc('created_at')
        ->get();
       
        return view('supervisor.orders.details', compact('order','feedbacks'));
    }


    public function add_comment(Request $request)
    {
        $rules = array(
            // 'comment' => 'required',
        );

        $messages = [
            'comment.required' => __('order_details_required')
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            $order_feedback             = new OrderFeedbackModel();
            $order_feedback->comment    = $request->comment;
            $order_feedback->type       = $request->type;
            $order_feedback->order_id   = $request->order_id;
            $order_feedback->user_id    = $request->user()->id;

            $order = OrdersModel::find($request->order_id);
            if($request->submit == __('accept'))
            {
                $order_feedback->show_to_client = 0;

                switch($request->type)
                {
                    case 'supervisor_design_review':

                        // get last feedback id to udpate the feedback
                        $feedback = OrderFeedbackModel::where('order_id', $request->order_id)->get()->last();
                        $feedback->show_to_client = 1;
                        $feedback->save();

                        $order_feedback->comment  = __('accept');
                        $order->status = 'client_review';
                    break;
                    default:
                        $order->status = 'client_review';
                        $order_feedback->comment  = __('accept');
                }

            }else{

                $order_feedback->show_to_client = 0;

                switch($request->type)
                {
                    case 'supervisor_design_review':
                        $order_feedback->comment  = __('rejected_by_supervisor');
                        $order->status = 'progress';
                    break;
                    default:
                    $order_feedback->comment  = __('rejected_by_supervisor');
                    $order->status = 'progress';
                }
                
            }

            $order->update();

            if($order_feedback->save())
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
