<?php

namespace App\Http\Middleware;
use Auth;
use Session;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->admin){
            Session::flash('info', 'You dont have the access right to view this page');

            return redirect()->back();
        }
        
        
        return $next($request);
    }
}
