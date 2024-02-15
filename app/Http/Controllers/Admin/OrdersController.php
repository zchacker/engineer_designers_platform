<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoicesModel;
use App\Models\OrderFeedbackModel;
use App\Models\OrdersModel;
use App\Models\UsersModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{

    public function orders_list(Request $request)
    {
        $query      = OrdersModel::with(['engineer_data', 'user_data'])
            ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $orders     = $query->paginate(100);

        return view('admin.orders.list', compact('orders', 'sum'));
    }

    public function details(Request $request)
    {
        $order = OrdersModel::with(['image', 'engineer_data'])
            ->where('id', $request->order_id)
            ->first();

        $feedbacks = OrderFeedbackModel::with('user_data')
            ->where('order_id', $request->order_id)
            ->orderByDesc('created_at')
            ->get();

        return view('admin.orders.details', compact('order', 'feedbacks'));
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

            // dd($request->submit);

            if ($request->submit == __('accept')) {

                $order_feedback->show_to_client = 0;

                switch ($request->type) {
                    case 'approve_invoice':
                        // get last feedback id to udpate the feedback
                        $feedback = OrderFeedbackModel::where('order_id', $request->order_id)->get()->last();
                        $feedback->show_to_client = 1;
                        $feedback->show_to_engineer = 0;
                        $feedback->save();

                        $invoice = InvoicesModel::where('id', $feedback->invoice)->first();
                        $invoice->update([
                            'status' => 'sent',
                        ]);

                        $order_feedback->comment  = __('accept');
                        break;
                    default:
                        $order_feedback->comment  = __('accept');
                }
            } else {

                switch ($request->type) {
                    case 'approve_invoice':
                        // get last feedback id to udpate the feedback
                        $feedback = OrderFeedbackModel::where('order_id', $request->order_id)->get()->last();
                        $feedback->show_to_client = 0;
                        $feedback->show_to_engineer = 0;
                        $feedback->save();

                        $order_feedback->comment  = __('reject');
                        break;
                    default:
                        $order_feedback->comment  = $request->comment ?? "N/A";
                }
            }

            if ($order_feedback->save()) {

                // send email for client account
                // TODO: send email
                try {

                    $order           = OrdersModel::find($request->order_id);
                    $client_user     = UsersModel::find($order->user_id);
                    $email           = $client_user->email;

                    $title     = "إشعار تعليق جديد";
                    $sub_title = "قام " . auth()->user()->name . " بإرسال رد جديد على طلبك رقم ( " . $request->order_id . " )";
                    $content   = $request->input('content');

                    Mail::send('emails.notification', compact('title', 'sub_title', 'content'), function ($message) use ($request, $email) {
                        $message->to($email);
                        $message->subject('لديك تعليق جديد للطلب رقم ( ' . $request->order_id . ' ) - منصة رشيد العجيان');
                    });

                } catch (Exception $e) {
                    
                }

                return back()->with(['success' => __('added_successfuly')]);
            } else {

                return back()
                    ->withErrors(['error' => __('unable_to_add')])
                    ->withInput($request->all());
            }
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

            if ($order->update()) {

                return back()->with(['status_update_success' => __('updated_successfuly')]);
            } else {

                return back()
                    ->withErrors(['status_update_error' => __('unable_to_add')])
                    ->withInput($request->all());
            }
        } else {

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
