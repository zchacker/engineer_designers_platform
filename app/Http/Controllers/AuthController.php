<?php

namespace App\Http\Controllers;

use App\Models\PagesModel;
use App\Models\UsersModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $currentPath = $request->path();
        $page   = PagesModel::where('path' , 'like',  '%' . $currentPath . '%')->first(); 
        return view('auth.login', compact('page'));
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
                $user = UsersModel::withTrashed()
                ->where('email', '=', $request->email)
                ->first();
               
                if ($user->deleted_at !== null) {
                    // Account soft deleted
                    
                    // Redirect with a message indicating that the account is deleted                    
                    return back()
                    ->withErrors(['login_error' => __('account_deleted')])
                    ->withInput($request->all());                            
                }

                if ($user) {

                    if (Auth::guard($user->user_type)->attempt(['email' => $request->email, 'password' => $request->password], true)) {
                        
                        //Auth::guard('user')->logoutOtherDevices( $request->password );
                        

                        // mark this to logged in
                        $logged_user = Auth::guard($user->user_type)->user();
                        $logged_user->logout = false;
                        $logged_user->save();
                        
                        
                        switch ($user->user_type) {
                            
                            case "admin":                                
                                return redirect()->intended(route('admin.engineers.list'));
                                // return redirect()->route('admin.engineers.list');
                                break;
                            case "supervisor":
                                return redirect()->intended(route('supervisor.engineers.list'));
                                // return redirect()->route('supervisor.engineers.list');
                                break;
                            case "client":
                                return redirect()->intended(route('client.engineers.list'));
                                // return redirect()->route('client.engineers.list');
                                break;
                            case "engineer":
                                return redirect()->intended(route('engineer.orders.list'));
                                // return redirect()->route('engineer.orders.list');
                                break;
                            case 'editor':
                                return redirect()->intended(route('editor.post.list'));
                                // return redirect()->route('engineer.orders.list');
                                break;
                            default:
                                return redirect()->intended(route('home'));
                                // return redirect()->route('home');
                        }
                        
                        // return redirect()->intended(route('home'));
                        return redirect()->route('home');
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
                    ->withErrors(['login_error' => __('unknown_error')])
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


    // confirm email
    public function confirm_email(Request $request)
    {
        return view('auth.confirm');
    }

    public function confirm_email_action(Request $request)
    {
        $rules = array(
            'confirm_code' => 'required',
        );

        $messages = [
            'confirm_code.required' => __('code_required'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {            

            // check the code
            if($request->user()->confirm_code != $request->input('confirm_code'))
            {
                return back()->withErrors(['error' => __('incorrect_code')]);
            }

            $profile_data = UsersModel::where(['id' => $request->user()->id])->first();
            $profile_data->verified     = 1;
            $profile_data->email_verified_at = Carbon::now();            
            
            if ($profile_data->update()) {

                switch ($request->user()->user_type) {

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
            } else {

                return back()->withErrors(['error' => __('unknown_error')]);
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

    public function confirm_email_resend(Request $request)
    {
        // dd($request->user()->id);

        $random_number = rand(100000, 999999);
        $profile_data = UsersModel::where(['id' => $request->user()->id])->first();
        $profile_data->confirm_code = $random_number;

        Mail::send('emails.confirm_email', ['code' => $random_number], function ($message) use ($request , $random_number) {
            $message->to($request->user()->email);
            $message->subject(' رمز التحقق الخاص بحسابك: ' .$random_number);
        });

        if ($profile_data->update()) {
            return back()->with(['success' => __('updated_successfuly')]);
        } else {            
            return back()->withErrors(['error' => __('unknown_error')]);
        }

    }

    // forgot password form
    public function forgot_password(Request $request)
    {
        return view('auth.forgotpass');
    }

    public function forgot_password_action(Request $request)
    {

        $validator = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $user_id = DB::getPdo()->lastInsertId();

        Mail::send('emails.forgot_password', ['token' => $token, 'user_id' => $user_id], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject(' طلب استعادة كلمة المرور ');
        });


        return back()->with(['success' => __('forgot_pass_sent')]);
    }

    // this for link in emails
    public function reset_password(Request $request)
    {

        if ($request->get('id')) {
            print 'has id';
        }

        if (strlen($request->id) > 0 && strlen($request->token) > 0) {

            $id      = $request->id;
            $token   = $request->token;
            $isFound =  DB::table('password_resets')
                ->where(['id' => $id, 'token' => $token])
                // ->where('id'    , '=' , $id)
                // ->where('token' , '=' , $token)
                ->count();

            if ($isFound == 0) {
                return abort(Response::HTTP_NOT_FOUND, "Not found");
            }

            return view('auth.setnewpass', compact('id', 'token'));
        } else {

            return abort(Response::HTTP_NOT_FOUND, "Not found");
        }
    }

    public function rest_password_new(Request $request)
    {

        if (strlen($request->id) > 0 && strlen($request->token) > 0) {

            $id             = $request->id;
            $token          = $request->token;
            $reset_data     = DB::table('password_resets')
                                ->where(['id' => $id, 'token' => $token]);

            if ($reset_data->count() == 0) {
                return abort(Response::HTTP_NOT_FOUND, "Not found");
            } else {

                $rules = array(
                    'password' => 'required',
                    're-password' => 'required'
                );

                $messages = [
                    'password.required' => __('password_required'),
                    're-password.required' => __('re-password_required')
                ];

                $validator = Validator::make($request->all(), $rules, $messages);

                if ($validator->fails() == true) {

                    $error     = $validator->errors();
                    $allErrors = "";

                    foreach ($error->all() as $err) {
                        $allErrors .= $err . " <br/>";
                    }

                    return back()->withErrors(['error' => $allErrors]);
                    
                } else {

                    if (strcmp($request->password, $request->get('re-password')) != 0) {

                        return back()->withErrors(['error' => __('password-not-match')]);
                    }

                    $data = $reset_data->first();
                    $profile_data = UsersModel::where(['email' => $data->email])->first();

                    $profile_data->password = Hash::make($request->get('password'));

                    if ($profile_data->update()) {

                        DB::table('password_resets')->where(['email' => $data->email])->delete();
                        return redirect(route('login'))->with(['success' => __('password_updated')]);
                    } else {

                        return back()->withErrors(['error' => __('unknown_error')]);
                    }
                }
            }

        } else {

            return back()->withErrors(['error' => __('unknown_error')]);

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

    public function supervisor_logout(Request $request)
    {
        if (Auth::guard('supervisor')->check()) // this means that the admins was logged in.
        {
            Auth::guard('supervisor')->logout();
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

    public function editor_logout(Request $request)
    {
        if (Auth::guard('editor')->check()) // this means that the engineer was logged in.
        {
            Auth::guard('editor')->logout();
            return redirect()->route('home');
        }
    }

}
