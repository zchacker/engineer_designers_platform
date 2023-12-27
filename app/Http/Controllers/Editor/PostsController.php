<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\FilesModel;
use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    
    public function list(Request $request)
    {                
        $query      = PostsModel::orderByDesc('created_at');           
        $sum        = $query->count('id');
        $engineers  = $query->paginate(100);
        return view('editor.posts.list', compact('engineers','sum'));
    }

    public function upload(Request $request)
    {
        $rules = array(
            'file' => 'required|mimes:jpeg,png,jpg,webp|image|max:7000',
        );

        $messages = [
            'file.mimes' => __('images_image'),
            'file.max'   => __('images_max', ['size' => '7']),
            'file.image' => __('images_image'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == true) {

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            return response(json_encode([
                'error' => $allErrors
            ]), Response::HTTP_BAD_REQUEST);
            
        }else{

            if($request->hasFile('file'))
            {
                $file_hash = hash_file('sha256', $request->file->getRealPath());
                $fileDB    = FilesModel::where(['hash' => $file_hash])->first();                    

                if ($fileDB == null) 
                {

                    $url = $request->file('file')->storePublicly(
                        "avatar/images",
                        $this->basicStorage
                    );

                    if ($url == true) // file stored successfully
                    {
                        $file_added = FilesModel::create([
                            'fileName'       => $url,
                            'hash'           => $file_hash,
                            'storage_driver' => $this->basicStorage
                        ]);
                        
                        $url = $file_added->fileName;

                        return response(json_encode([
                            'location' => $url ,                        
                        ]), Response::HTTP_OK);

                    }

                }
                else
                {

                    $url = $fileDB->fileName;
                    
                    return response(json_encode([
                        'location' => $url ,                        
                    ]), Response::HTTP_OK);

                }
                

            }else{

                return response(json_encode([
                    'error' => 'No image'
                ]), Response::HTTP_BAD_REQUEST);

            }
        }
    }

    public function create(Request $request)
    {
        return view('editor.posts.create');
    }

    public function create_action(Request $request)
    {
        $rules = array(
            'title'     => 'required',
            'body'      => 'required',
            'slug'      => 'required',
            'language'  => 'required',
            'keywords'  => 'required',
            'seo_title' => 'required',
            'seo_description'  => 'required',            
        );

        $messages = [
            'title.required' => __('name_required'),
            'body.required' => __('email_required'),
            'slug.unique' => __('email_unique'),
            'language.required' => __('phone_required'),
            'keywords.unique' => __('phone_unique'),
            'seo_title.required' => __('password_required'),
            'seo_description.required' => __('password_required'),            
        ];

        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {
            
            

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

    public function delete(PostsModel $post)
    {
        $post->delete();
        return redirect()->route('admin.engineers.list');
    }

    public function restore(Request $request)
    {        
        $id   = $request->id;
        $post = PostsModel::withTrashed()->find($id);

        if ($post->trashed()) {
            if ($post) {
                $post->restore();
                // Optionally, you can add a success message or redirect the user
                return redirect()->back()->with('success', 'User restored successfully!');
            }
        }       
    }

}
