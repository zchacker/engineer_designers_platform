<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\FilesModel;
use App\Models\OrderFeedbackModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrdersController extends Controller
{

    public function list(Request $request)
    {
        $query = OrdersModel::where('user_id', $request->user()->id)
            ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $orders     = $query->paginate(100);

        return view('clients.orders.list', compact('orders', 'sum'));
    }

    public function create(Request $request, $engineer_id)
    {
        return view('clients.orders.create', compact('engineer_id'));
    }

    public function create_action(Request $request, $engineer_id)
    {
        $rules = array(
            'order_details' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg,webp|image|max:8000',
            // 'drawn_image' => 'mimes:jpeg,png,jpg,gif,svg,webp|image|max:8000',
        );

        $messages = [
            'order_details.required' => __('order_details_required'),
            'image.max' => __('image_size_notvalid', ['size' => '8']),
            'drawn_image.max' => __('image_size_notvalid', ['size' => '8']),
            'image.mimes' => __('image_notvalid'),
            'drawn_image.mimes' => __('image_notvalid'),
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            // create order object to save it
            $order = new OrdersModel();
            $order->title = $request->title;
            $order->details = $request->order_details;
            $order->user_id = $request->user()->id;
            $order->to_user_id = $request->engineer_id;
            $order->status  = "pending";

            // look if there an image

            /**
             * if user upload image then dismiss drawn image
             * else if the user draw image then store it
             */

            $file_hash = ""; // hash_file('sha256', $request->item_img->getRealPath());

            // dd($request->hasFile('image'));

            if ($request->hasFile('image')) {

                $file_hash = hash_file('sha256', $request->image->getRealPath());
                $fileDB    = FilesModel::where(['hash' => $file_hash])->first();

                if ($fileDB == null) {

                    // store it in datebae
                    $fileName = $request->file('image')->getClientOriginalName() . '_' . time() . '.' . $request->file('image')->extension();

                    $url = $request->file('image')->storePublicly(
                        "orders/images",
                        "contabo"
                    );


                    if ($url != false) // file stored successfully
                    {
                        $file_added = FilesModel::create([
                            'fileName' => $url,
                            'hash' => $file_hash
                        ]);

                        // save it to database
                        $order->file_id = $file_added->id;
                    }
                } else {

                    // save it to database
                    $order->file_id = $fileDB->id;
                }
            } else if ($request->has('drawn_image')) {

                $base64Image = $request->input('drawn_image');
                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
                $imageName = Str::random(10) . '_' . time() . '.png'; // You can set the desired image format here

                $file_hash = md5($imageData);
                $fileDB    = FilesModel::where(['hash' => $file_hash])->first();

                if ($base64Image != null) { // user draw an image using base64

                    if ($fileDB == null) {

                        // save it in cloud storage
                        $uploaded = Storage::disk('contabo')
                            ->put(
                                'orders/images/' . $imageName,
                                $imageData,
                                'public'
                            );


                        if ($uploaded == true) // file stored successfully
                        {
                            $url = 'orders/images/' . $imageName;

                            $file_added = FilesModel::create([
                                'fileName' => $url,
                                'hash' => $file_hash
                            ]);

                            // save it to database
                            $order->file_id = $file_added->id;
                        } else {

                            // return error in upload file

                            return back()
                                ->withErrors(['error' => __('upload_error')])
                                ->withInput($request->all());
                        }
                    } else {
                        // save it to database
                        $order->file_id = $fileDB->id;
                    }
                }
            }


            // Save Order Data
            $order->save();

            // send email for engineer account
            // TODO: send email

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

    public function details(Request $request)
    {
        $order = OrdersModel::with(['image', 'engineer_data'])
            ->where('id', $request->order_id)
            ->first();

        $comments = OrderFeedbackModel::with('user_data')
            ->where('order_id', $request->order_id)
            ->get();

        return view('clients.orders.details', compact('order', 'comments'));
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

            if ($order->save()) {

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

    public function destroy(OrdersModel $order)
    {
        $order->delete();

        return redirect()->route('client.order.list');
    }
}
