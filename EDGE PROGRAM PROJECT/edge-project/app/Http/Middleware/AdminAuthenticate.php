<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;  // Import the Auth facade

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     * 
     * register it bootstrap->app
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //if admin not logged in
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        
        return $next($request);
    }
}
