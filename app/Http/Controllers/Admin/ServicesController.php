<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
                                                    
            // create services
           $services = ServicesModel::create($request->all());

            // send email for verification

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
        $user = ServicesModel::find($request->id);

        if($user == null)
        {
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('admin.engineers.edit', compact('user'));
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


    public function delete(ServicesModel $service)
    {        
        $service->delete();
        return redirect()->route('admin.services.list');
    }
    
}
