<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SupervisorController extends Controller
{
    public function list(Request $requests)
    {
        $query      = UsersModel::orderByDesc('created_at')->where('user_type', 'supervisor');
        $sum        = $query->count('id');
        $supervisors  = $query->paginate(100);
        return view('admin.supervisors.list', compact('supervisors', 'sum'));
    }

    public function create(Request $request)
    {
        return view('admin.supervisors.create');
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
            $request['password']    = Hash::make($request->password);
            $request['user_type']   = "supervisor";

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


    public function edit(Request $request)
    {
        $user = UsersModel::find($request->id);

        if ($user == null) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('admin.supervisors.edit', compact('user'));
    }

    public function edit_action(Request $request)
    {
        $user_id = $request->user_id;

        $rules = array(
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user_id)],
            'phone' => ['required', Rule::unique('users')->ignore($user_id)],
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

            // dd($request->filled('name'));        
            // dd($request->has('password'));

            if ($request->filled('password')) {
                $profile_data->password = Hash::make($request->password);
            }


            if ($profile_data->update()) {

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
        return redirect()->route('admin.engineers.list');
    }
}
