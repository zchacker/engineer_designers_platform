<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $locale = $request->segment(1);

        // If no locale is provided in the URL, set the default locale to 'ar'
        // if (!$locale || !in_array($locale, config('app.available_locales'))) {
        //     $locale = 'ar';
        // }

        // app()->setLocale($locale);

        // // Save the locale in the session for future requests
        // Session::put('locale', $locale);

        if (in_array($locale, config('app.available_locales'))) {
            app()->setLocale($locale);
        }else if(Session::has('locale')){
            app()->setLocale(Session::get('locale'));
        }else{
            app()->setLocale(config('app.fallback_locale'));
        }

        return $next($request);
    }
}
