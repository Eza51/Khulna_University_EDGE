<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;  // Import the Auth facade

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     //if admin logged in then dashboard
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return $next($request);
    }
}
