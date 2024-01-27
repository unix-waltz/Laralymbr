<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user() && auth()->user()->role == $role) {
            return $next($request);
        }else{
            if (auth()->user() && auth()->user()->role == 'ADMIN') {
                return redirect('/admin/dashboard');
        } 
        if (auth()->user() && auth()->user()->role == 'OFFICER') {
            return redirect('/officer/dashboard');
    } 
    if (auth()->user() && auth()->user()->role == 'OFFICER') {
        return redirect('/');
} 

        }
            
        }
    }

