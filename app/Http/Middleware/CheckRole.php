<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $role="";
        $type="";
        if(Session::has('role')){
            $this->$role =Session::get('role');
            $this->$type=Session::get('type');
        }


        return $next($request);
    }
}
