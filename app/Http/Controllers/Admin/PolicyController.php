<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PolicyController extends Controller
{
    
    public function list(Request $request)
    {                
        $query      = PostsModel::orderByDesc('created_at')->where('type' , 'page');           
        $sum        = $query->count('id');
        $posts      = $query->paginate(100);
        return view('admin.posts.list', compact('posts','sum'));
    }


    public function edit(Request $request)
    {

        $post = PostsModel::where('id' , $request->id)->first();

        if($post == null)
        {
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('admin.posts.edit', compact('post'));
    }

    public function edit_action(Request $request)
    {

        $rules = array(
            'title'            => 'required',
            'body'             => 'required',                  
        );

        $messages = [
            'title.required'            => __('name_required'),
            'body.required'             => __('email_required'),  
        ];

        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {
                                                
            $request->merge(['auther_id' => auth()->user()->id]);

            // update post data
            $post = PostsModel::findOrFail($request->id);

            $post->update($request->all());  
            
            // Save the changes
            $post->save();

            return back()->with(['success' => __('updated_successfuly')]); 

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
    
}
