<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\FilesModel;
use App\Models\TicketsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    public function list(Request $request)
    {

        $query      = TicketsModel::orderByDesc('created_at')
        ->where('user_id', $request->user()->id);
        $sum        = $query->count('id');
        $tickets    = $query->paginate(100);

        return view('clietns.tickets.list', compact('tickets'));

    }

    public function create(Request $request)
    {
        return view('clietns.tickets.create');
    }

    public function create_action(Request $request)
    {
        $rules = array(
            'name' => 'required',            
        );

        $messages = [
            'name.required' => __('name_required'),
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            if($request->hasFile('file'))
            {
                $file_hash = hash_file('sha256', $request->file->getRealPath());
                $fileDB    = FilesModel::where(['hash' => $file_hash])->first();                    

                if ($fileDB == null) 
                {
                    
                    $fileName = $request->file('file')->getClientOriginalName() . '_' . time() . '.' . $request->file('file')->extension();

                    // store it in disk
                    $url = $request->file('file')->storePublicly(
                        "services/images",
                        $this->basicStorage
                    );

                    if ($url != false) // file stored successfully
                    {

                        // save file data in batabase
                        $file_added = FilesModel::create([
                            'fileName'       => $url,
                            'hash'           => $file_hash,
                            'storage_driver' => $this->basicStorage
                        ]);
                        
                        $request['image_file'] = $file_added->id;

                    }

                } else {

                    // save it to database
                    $request['image_file'] = $fileDB->id;

                }
            }                                       

            // create services
            $services = ServicesModel::create($request->all());            

            if($services){
                return back()->with(['success' => __('added_successfuly')]);
            }else{
                return back() ->withErrors(['error' => __('unknown_error')]);
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

    public function update(Request $request)
    {

    }

}
