<?php

namespace App\Http\Middleware;

use App\Models\UsersModel;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class AccountConfirm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // set locale
        /*
        $locale = $request->segment(1);

        // Check if the locale is valid, otherwise default to 'en'
        if (!in_array($locale, ['en', 'ar'])) {
            $locale = 'en';
        }

        App::setLocale($locale);
        */

        if (is_null($request->user()->id) == false) {
            $user = DB::table('users')->where('id', '=', $request->user()->id);

            if ($user->exists()) {
                $data = $user->first();

                if ($data->verified == 0 && $data->user_type != 'admin') {
                    $random_number = rand(100000, 999999);
                    $profile_data  = UsersModel::where(['id' => $request->user()->id])->first();
                    $profile_data->confirm_code = $random_number;
                    $profile_data->save();

                    try {

                        Mail::send('emails.confirm_email', ['code' => $random_number], function ($message) use ($request, $random_number) {
                            $message->to($request->user()->email);
                            $message->subject(' رمز التحقق الخاص بحسابك: ' . $random_number);
                        });
                    } catch (Exception $e) {
                    }

                    return redirect(route('confirm.email'));
                }
            }
        }

        return $next($request);
    }
}
