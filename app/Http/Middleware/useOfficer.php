<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class useOfficer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth()->user()->ROLE == 'OFFICER'){
            return $next($request);
        };
        if(Auth()->user()->ROLE == 'ADMIN'){
            return redirect('/admin/dashboard');
        }
        return redirect('/401'); 
       
    }
}
