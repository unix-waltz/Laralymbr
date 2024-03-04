<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class useAdminOfficer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth()->user()->ROLE == 'ADMIN' || Auth()->user()->ROLE == 'OFFICER'){
            return $next($request);
        }else{
            return redirect('/401'); 
        }
       
    }
}
