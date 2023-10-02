<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\FilesModel;
use App\Models\WorksFilesModel;
use App\Models\WorksModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class WorksController extends Controller
{
    public function list(Request $request)
    {

    }

    public function create(Request $request)
    {
        return view('engineer.works.create');
    }

    public function create_action(Request $request) 
    {
        $rules = array(
            'title' => 'required', 
            'work_details' => 'required', 
            // 'images.*' => 'mimes:jpeg,png,jpg,gif,svg,webp|image|max:8000',    
            "files.*" =>  'file|max:8000',       
        );

        $messages = [
            'title.required' => __('title_required'),
            'work_details.required' => __('work_details_required'), 
            'images.max' => __('images_max'),
            'images.mimies' => __('images_mimies'),
            'images.image' => __('images_image'),
            'images.max' => __('images_max' , ["size" => "8"]),            
            "files.max" =>  __('files_max' , ["size" => "8"]), 
            "files.max" =>  __('files_file'), 
        ];

        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            // create order object to save it
            $work = new WorksModel();
            $work->engineer_id = $request->user()->id;
            $work->title       = $request->title;
            $work->description = $request->work_details;                        

            if($work->save())
            {
                                
                $work_id = $work->id;
    
                // dd($request->hasFile('images'));
                // dd($request->images);
                
                // upload all images
                if ($request->hasFile('images')) {
    
                    foreach ($request->file('images') as $file) {
    
                        $file_hash = hash_file('sha256', $file->getRealPath());
                        $fileDB    = FilesModel::where(['hash' => $file_hash])->first();
    
                        // create work file object
                        $workFile = new WorksFilesModel();
                        $workFile->work_id = $work_id;
    
                        if ($fileDB == null) {
    
                            // store it in datebae
                            $fileName = $file->getClientOriginalName() . '_' . time() . '.' . $file->extension();
    
                            $url = $file->storePublicly(
                                "works/images",
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
                                $workFile->file_id = $file_added->id;
                                
                            }
    
                        } else {
                            // save it to database
                            $workFile->file_id = $fileDB->id;
                        }
    
                        // just save the file to database
                        $workFile->save();
    
                    }
    
                }
    
                // upload all files to database
                if ($request->hasFile('files')) {
    
                    foreach ($request->file('files') as $file) {
    
                        $file_hash = hash_file('sha256', $file->getRealPath());
                        $fileDB    = FilesModel::where(['hash' => $file_hash])->first();
    
                        // create work file object
                        $workFile = new WorksFilesModel();
                        $workFile->work_id = $work_id;
    
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
                                $workFile->file_id = $file_added->id;
                                
                            }
    
                        } else {
                            // save it to database
                            $workFile->file_id = $fileDB->id;
                        }
    
                        // just save the file to database
                        $workFile->save();
    
                    }
    
                }

                $status = Response::HTTP_OK;
                $myObj = new \stdClass();
                $myObj->success = true;
                $myObj->status  =  $status;                
                $myObj->data    = __('added_successfuly');
        
                $json = json_encode($myObj, JSON_PRETTY_PRINT);
                $response = response($json, $status);

                return $response;
                // return back()->with(['success' => __('added_successfuly')]);

            }else{
                
                $status         = Response::HTTP_OK;
                $myObj          = new \stdClass();
                $myObj->success = false;
                $myObj->status  =  $status;                
                $myObj->data    = __('unkowen_error');
        
                $json       = json_encode($myObj, JSON_PRETTY_PRINT);
                $response   = response($json, $status);

                return $response;

                // return back()
                // ->withErrors(['error' => __('unkowen_error')])
                // ->withInput($request->all());

            }
            
        }else{
            
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

            return $response;            

            // return back()
            //     ->withErrors(['error' => $allErrors])
            //     ->withInput($request->all());

        }

    }

    public function edit(Request $request)
    {

    }

    public function edit_action(Request $request)
    {

    }

    public function delete(WorksModel $work)
    {
        $work->delete();

        return redirect()->route('client.order.list');
    }

}