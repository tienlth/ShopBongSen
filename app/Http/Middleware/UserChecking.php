<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserChecking
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
        $role = $request->get('role');
        if($role=='user'){
            return $next($request);
        }
        else return redirect()->route('index');
    }
}
