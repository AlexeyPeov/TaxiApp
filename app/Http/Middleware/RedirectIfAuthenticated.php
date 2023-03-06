<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            /*if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }*/

            if (Auth::guard($guard)->check()) {
                if (Auth::user()->user_type === 'TaxiDriver') {
                    return redirect('taxidriver/accounts/' . Auth::user()->id);
                } elseif (Auth::user()->user_type === 'Customer') {
                    return redirect('customer/accounts/' . Auth::user()->id);
                }
            }
        }

        return $next($request);
    }
}
