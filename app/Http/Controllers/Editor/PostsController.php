<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\PostsModel;
use Illuminate\Http\Request;
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

    public function create(Request $request)
    {
        return view('editor.posts.create');
    }

    public function create_action(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
        );

        $messages = [
            'name.required' => __('name_required'),
            'email.required' => __('email_required'),
            'email.unique' => __('email_unique'),
            'phone.required' => __('phone_required'),
            'phone.unique' => __('phone_unique'),
            'password.required' => __('password_required'),
        ];

        
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {
            
        }else{

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
