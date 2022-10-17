<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WithAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('/');
        }

        // Check if user is admin
        if (!auth()->user()->is_superadmin) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
