<?php

namespace App\Http\Controllers\Clients;

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
        $query = ContractsModel::with(['user_data', 'order_data', 'contractDoc'])
        ->where('user_id', $request->user()->id)
        ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $contracts     = $query->paginate(100);

        return view('clients.contracts.list', compact('contracts', 'sum'));
    }

    public function details(Request $request)
    {
        $contract = ContractsModel::with(['engineer_data', 'order_data', 'contractDoc'])
        ->where('id', $request->contract_id)
        ->first();

        $contract_feedback = ContractFeedbackModel::with([ 'user_data', 'contractDoc' ])
        ->where('contract_id' , $request->contract_id)
        ->first();

        return view('clients.contracts.details' , compact('contract' , 'contract_feedback'));
    }

    public function update_action(Request $request)
    {
        
        $rules = array(
            "file" =>  'nullable|mimes:pdf|file|max:50000',
        );

        $messages = [
            "file.max" =>  __('files_max', ["size" => "50"]),
            "file.file" =>  __('files_file'),
            "file.required" =>  __('files_required'),
            "file.mimes" =>  __('files_mimes', ['file_type' => 'PDF']),
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            // create order object to save it
            $contract_feedback = new ContractFeedbackModel();
            $contract_feedback->contract_id  = $request->contract_id;
            $contract_feedback->status       = $request->status;
            $contract_feedback->comment      = $request->comment;
            $contract_feedback->user_id      = $request->user()->id;

            // upload all images
            if ($request->hasFile('file') && $request->status == 'accepted') {

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
                        $contract_feedback->file_id = $file_added->id;
                    }

                } else {

                    // save it to database
                    $contract_feedback->file_id = $fileDB->id;

                }

            }else if($request->status == 'accepted' && $request->hasFile('file') == false){

                return back()
                ->withErrors(['error' => __('attach_signed_contract')])
                ->withInput($request->all());

            }else if($request->status == 'rejected' && $request->filled('comment') == false){

                return back()
                ->withErrors(['error' => __('add_reject_comment')])
                ->withInput($request->all());

            }

            // dd($request->filled('comment'));

            if($contract_feedback->save())
            {
                $contract = ContractsModel::find($request->contract_id);
                $contract->status = $request->status;

                if($contract->update())
                {
                    
                    return back()->with(['success' => __('updated_successfuly')]);

                }else{

                    return back()
                    ->withErrors(['error' => __('unknown_error')])
                    ->withInput($request->all());

                }
                
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


}
