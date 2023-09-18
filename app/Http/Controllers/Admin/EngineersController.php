<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EngineersController extends Controller
{
        
    public function list(Request $requests)
    {
        $query      = UsersModel::orderByDesc('created_at')->where('user_type', 'engineer');
        $sum        = $query->count('id');
        $engineers  = $query->paginate(100);
        return view('admin.engineers.list', compact('engineers','sum'));
    }

    public function create(Request $request)
    {
        return view('admin.engineers.create');
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

            $password = $request->password;

            // update password set it as hashed one
            $request['password'] = Hash::make($request->password);
            $request['user_type'] = "engineer";
            
            // create user account
            $user = UsersModel::create($request->all());

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

}
