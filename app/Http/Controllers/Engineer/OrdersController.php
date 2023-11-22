<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\FilesModel;
use App\Models\OrderFeedbackFilesModel;
use App\Models\OrderFeedbackModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{

    public function orders_list(Request $request)
    {
        $query = OrdersModel::with('user_data')
            ->where('to_user_id', $request->user()->id)
            ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $orders     = $query->paginate(100);

        return view('engineer.orders.list', compact('orders', 'sum'));
    }


    public function details(Request $request)
    {
        $order = OrdersModel::with(['image', 'engineer_data'])
            ->where('id', $request->order_id)
            ->first();

        $feedbacks = OrderFeedbackModel::with(['user_data', 'feedback_files'])
            ->where('order_id', $request->order_id)
            ->where('show_to_engineer', 1)
            ->orderByDesc('created_at')
            ->get();

        return view('engineer.orders.details', compact('order', 'feedbacks'));
    }


    public function add_comment(Request $request)
    {
        $rules = array(
            'comment' => 'required',
            "type" => 'required',
            "files.*" =>  'file|max:8000',
        );

        $messages = [
            'comment.required' => __('order_details_required'),
            'type.required' => "نوع الحدث مطلوب",
            "files.max" =>  __('files_max', ["size" => "8"]),
            "files.max" =>  __('files_file'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            $order_feedback           = new OrderFeedbackModel();
            if ($request->type == 'add_quote') {
                $order_feedback->comment  = $request->comment . ' ريال سعودي';
            }else{
                $order_feedback->comment  = $request->comment;
            }
            $order_feedback->type     = $request->type;
            $order_feedback->order_id = $request->order_id;
            $order_feedback->user_id  = $request->user()->id;
            if($request->type == 'upload_design')
                $order_feedback->show_to_client = 0;

            if ($order_feedback->save()) {

                $order_feedback_id = $order_feedback->id;

                if ($request->hasFile('files')) {

                    foreach ($request->file('files') as $file) {

                        $file_hash = hash_file('sha256', $file->getRealPath());
                        $fileDB    = FilesModel::where(['hash' => $file_hash])->first();

                        // create work file object
                        $feedbackFile = new OrderFeedbackFilesModel();
                        $feedbackFile->feedback_id = $order_feedback_id;

                        if ($fileDB == null) {

                            // store it in datebae
                            $fileName = $file->getClientOriginalName() . '_' . time() . '.' . $file->extension();

                            $url = $file->storePublicly(
                                "works/files",
                                $this->basicStorage
                            );

                            if ($url != false) // file stored successfully
                            {

                                $file_added = FilesModel::create([
                                    'fileName' => $url,
                                    'hash' => $file_hash,
                                    'storage_driver' => $this->basicStorage
                                ]);

                                // save it to database
                                $feedbackFile->file_id = $file_added->id;
                            }
                        } else {
                            // save it to database
                            $feedbackFile->file_id = $fileDB->id;
                        }

                        // just save the file to database
                        $feedbackFile->save();
                    }
                }

                $order = OrdersModel::find($request->order_id);
                $order->status = $request->status;
                
                if($request->type == 'add_quote')
                    $order->price_quote = $request->comment;                                

                $order->update();

                $status = Response::HTTP_OK;
                $myObj = new \stdClass();
                $myObj->success = true;
                $myObj->status  =  $status;
                $myObj->data    = __('added_successfuly');

                $json = json_encode($myObj, JSON_PRETTY_PRINT);
                $response = response($json, $status);

                if ($request->type == 'add_quote') {
                    return back()->with(['success' => __('added_successfuly')]);
                }else{
                    return $response;
                }

            } else {

                $status         = Response::HTTP_OK;
                $myObj          = new \stdClass();
                $myObj->success = false;
                $myObj->status  =  $status;
                $myObj->data    = __('unkowen_error');

                $json       = json_encode($myObj, JSON_PRETTY_PRINT);
                $response   = response($json, $status);
                
                if ($request->type == 'add_quote') {
                    return back()
                    ->withErrors(['error' => __('unable_to_add')])
                    ->withInput($request->all());
                }else{
                    return $response;
                }            

            }
        } else {

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            $status         = Response::HTTP_OK;
            $myObj          = new \stdClass();
            $myObj->success = false;
            $myObj->status  =  $status;
            $myObj->data    = $allErrors;

            $json       = json_encode($myObj, JSON_PRETTY_PRINT);
            $response   = response($json, $status);

            if ($request->type == 'add_quote') {
                return back()
                ->withErrors(['error' => __('unable_to_add')])
                ->withInput($request->all());
            }else{
                return $response;
            }

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
