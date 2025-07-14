<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TeacherAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if the user is authenticated as a teacher using the teacher guard
         if (!Auth::guard('teacher')->check()) {
            // Redirect to the teacher login page if not authenticated
            return redirect()->route('teacher.login');
        }

        return $next($request);
    }
}
