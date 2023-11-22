<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogoutUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();                

        // You might want to create a method on your model to
        // prevent direct access to the `logout` property. Something
        // like `markedForLogout()` maybe.
        if (! empty($user->logout)) {
            // Not for the next time!
            // Maybe a `unmarkForLogout()` method is appropriate here.
            $user->logout = false;
            $user->save();
            
            // Log her out
            Auth::logout();
            
            return redirect()->route('login');
        }

        return $next($request);
    }
}
