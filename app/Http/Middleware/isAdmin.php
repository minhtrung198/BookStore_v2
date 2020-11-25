<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        if( Auth::check() ){
            $user = Auth::user();
            if( $user->role_id == 2 ){
                return $next($request);
            }else{
                return redirect('/');
            }
        }
        return redirect('admin/login');
    }
}
