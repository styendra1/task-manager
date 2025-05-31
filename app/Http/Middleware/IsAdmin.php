<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // User is not logged in, redirect to login page
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'admin') {
            // User is logged in but NOT admin, redirect elsewhere (e.g. dashboard/home)
            return redirect()->route('dashboard'); // or home or wherever you want
        }

        // User is admin, allow access
        return $next($request);
    }
}
