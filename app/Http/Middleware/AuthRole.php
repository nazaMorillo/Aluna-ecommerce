<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(! $request->user()->hasRole($role)) {
            return redirect('/');
        }
        //echo "<br><br><br>Soy un administrador!<br>";
        return $next($request);
    }
}
