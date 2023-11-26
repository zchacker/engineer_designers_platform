<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientsController extends Controller
{
    public function list(Request $requests)
    {
        $query      = UsersModel::orderByDesc('created_at')->where('user_type', 'client');
        $sum        = $query->count('id');
        $clients  = $query->paginate(100);
        return view('admin.clients.list', compact('clients','sum'));
    }

    public function edit(Request $request)
    {
        $user = UsersModel::find($request->id);

        if($user == null)
        {
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('admin.clients.edit', compact('user'));
    }

    public function edit_action(Request $request)
    {
        $user_id = $request->user_id;

        $rules = array(
            'name' => 'required',            
            'email' => ['required',Rule::unique('users')->ignore($user_id)],
            'phone' => ['required',Rule::unique('users')->ignore($user_id)],
            // 'password' => 'required',
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

            $profile_data = UsersModel::where(['id' => $user_id])->first();            

            $profile_data->name  = $request->name;
            $profile_data->email = $request->email;
            $profile_data->phone = $request->phone; 
                    
            if($request->filled('password'))
            {
                $profile_data->password = Hash::make($request->password);                
            }
                        
            if($profile_data->user_type != $request->user_type)
            {
                $profile_data->user_type = $request->user_type;
                $profile_data->logout = true; 
            }
            
            if ($profile_data->update())
            {
                
                if($request->filled('password'))
                {
                    // log out all other sessions
                    // $user = Auth::user();
                    // dd($user);
                    // Auth::guard('engineer')->login($profile_data);                    
                    // Auth::guard('engineer')->logout($profile_data);
                    // Auth::guard('engineer')->logoutOtherDevices($request->password); //add this line                    
                }               

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
    
    public function delete(UsersModel $user)
    {
        $user->delete();
        return redirect()->route('admin.clients.list');
    }

}
