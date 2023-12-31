<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FilesModel;
use App\Models\ServicesModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    

    public function list(Request $requests)
    {
        $query      = ServicesModel::orderByDesc('created_at');
        $sum        = $query->count('id');
        $services   = $query->paginate(100);
        return view('admin.services.list', compact('services','sum'));
    }

    public function create(Request $request)
    {
        return view('admin.services.create');
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

    public function edit(Request $request)
    {
        $service = ServicesModel::find($request->service_id);

        if($service == null)
        {
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('admin.services.edit', compact('service'));
    }

    public function edit_action(Request $request)
    {
        $user_id = $request->user_id;

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

            // dd($request->all());

            $service = ServicesModel::find($request->service_id);
            $service->update($request->all());
            
            if ($service)
            {                            
                return back()->with(['success' => __('updated_successfuly')]);
            } else {            
                return back()->withErrors(['error' => __('unknown_error')]);
            }            

            // send email for verification
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


    public function delete(ServicesModel $service)
    {        
        $service->delete();
        return redirect()->route('admin.services.list');
    }
    
}
