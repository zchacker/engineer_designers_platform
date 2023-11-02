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
