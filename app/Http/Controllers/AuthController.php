<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function login_action(Request $request)
    {
        $rules = array(
            'email'    => 'required',
            'password' => 'required',
        );

        $messages = [
            'email.required'    => __('email_required'),
            'password.required' => __('password_required'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // dd('hello');

        if ($validator->fails() == false) {
            $debug = "user";
            try {

                // looking for email if exists
                $user = UsersModel::where('email', '=', $request->email)->first();

                if ($user) {

                    if (Auth::guard($user->user_type)->attempt(['email' => $request->email, 'password' => $request->password], true)) {
                        
                        //Auth::guard('user')->logoutOtherDevices( $request->password );

                        switch($user->user_type) {

                            case "admin":                                
                                return redirect()->intended(route('admin.engineers.list'));
                                break;
                            case "client": 
                                return redirect()->intended(route('client.engineers.list'));
                                break;
                            case "engineer":
                                return redirect()->intended(route('engineer.orders.list'));
                                break;
                            default:
                                return redirect()->intended(route('home'));

                        }

                        return redirect()->intended(route('home'));
                    
                    } else {

                        return back()
                        ->withErrors(['login_error' => __('worng_password')])
                        ->withInput($request->all());

                    }

                } else {

                    return back()
                    ->withErrors(['login_error' => __('worng_password')])
                    ->withInput($request->all());
                
                }

            } catch (Exception $ex) {
                // dd($ex , $debug);
                return back()
                    ->withErrors(['login_error' => __('worng_password')])
                    ->withInput($request->all());
            }

        } else {

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            return back()
                ->withErrors(['login_error' => $allErrors])
                ->withInput($request->all());
        }
    }

    public function admin_logout(Request $request)
    {
        if (Auth::guard('admin')->check()) // this means that the admins was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect()->route('home');
        }

        // any way logged out

        // $this->guard()->logout();
        // $request->session()->invalidate();

        // return $this->loggedOut($request) ?: redirect('/');
    }


    public function client_logout(Request $request)
    {
        if (Auth::guard('client')->check()) // this means that the client was logged in.
        {
            Auth::guard('client')->logout();
            return redirect()->route('home');
        }    
    }

    public function engineer_logout(Request $request)
    {
        if (Auth::guard('engineer')->check()) // this means that the engineer was logged in.
        {
            Auth::guard('engineer')->logout();
            return redirect()->route('home');
        }    
    }

}
