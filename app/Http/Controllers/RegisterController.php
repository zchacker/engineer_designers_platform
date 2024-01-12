<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PagesModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    function register(Request $request)
    {
        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 
        return view('auth.register', compact('page'));
    }

    function register_action(Request $request)
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
            $request['verified'] = 1;

            // create user account
            $user = UsersModel::create($request->all());

            // send email for verification

            // set login cookies
            if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $password], true)) {
                return redirect()->intended(route('client.engineers.list'));
            }

            return redirect()->intended(route('register.user'));
        } else {

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            return back()
                ->withErrors(['register_error' => $allErrors])
                ->withInput($request->all());
        }
    }
}
