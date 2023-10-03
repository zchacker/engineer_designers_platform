<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\ContractFeedbackModel;
use App\Models\ContractsModel;
use App\Models\FilesModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractsController extends Controller
{

    public function list(Request $request)
    {
        $query = ContractsModel::with(['engineer_data', 'order_data', 'contractDoc'])
            ->where('engineer_id', $request->user()->id)
            ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $contracts     = $query->paginate(100);

        return view('engineer.contracts.list', compact('contracts', 'sum'));
    }

    public function details(Request $request)
    {
        $contract = ContractsModel::with(['engineer_data', 'order_data', 'contractDoc'])
        ->where('id', $request->contract_id)
        ->first();

        $contract_feedback = ContractFeedbackModel::with([ 'user_data', 'contractDoc' ])
        ->where('contract_id' , $request->contract_id)
        ->first();

        return view('engineer.contracts.details' , compact('contract' , 'contract_feedback'));
    }

    public function create(Request $request)
    {
        $order_id = $request->order_id;
        return view('engineer.contracts.create', compact('order_id'));
    }

    public function create_action(Request $request)
    {
        
        $rules = array(
            "file" =>  'required|mimes:pdf|file|max:50000',
        );

        $messages = [
            "file.max" =>  __('files_max', ["size" => "50"]),
            "file.file" =>  __('files_file'),
            "file.required" =>  __('files_required'),
            "file.mimes" =>  __('files_mimes'),
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            $order = OrdersModel::where('id', $request->order_id)
            ->first();

            // create order object to save it
            $contract = new ContractsModel();
            $contract->user_id      = $order->user_id;
            $contract->engineer_id  = $order->to_user_id;
            $contract->order_id     = $request->order_id;

            // upload all images
            if ($request->hasFile('file')) {

                $file_hash = hash_file('sha256', $request->file('file')->getRealPath());
                $fileDB    = FilesModel::where(['hash' => $file_hash])->first();

                if ($fileDB == null) {

                    // store it in datebae
                    $fileName = $request->file('file')->getClientOriginalName() . '_' . time() . '.' . $request->file('file')->extension();

                    $url = $request->file('file')->storePublicly(
                        "contract/docs",
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
                        $contract->file_id = $file_added->id;
                    }

                } else {

                    // save it to database
                    $contract->file_id = $fileDB->id;

                }
            }

            if($contract->save())
            {
                
                return back()->with(['success' => __('added_successfuly')]);

            }else{

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

    public function update_status(ContractsModel $contract)
    {
        
        // dd($contract->id);

        // $contract_data = ContractsModel::find($contract->id);
        // $contract_data->status = 'canceled';
        $contract->status = 'canceled';
        $contract->update();
        
        return redirect()->route('engineer.contract.list');

    }
}
