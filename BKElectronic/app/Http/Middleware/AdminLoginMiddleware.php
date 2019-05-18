<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use function Symfony\Component\VarDumper\Dumper\esc;

class AdminLoginMiddleware
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
        if(Auth::check()){
            $user=Auth::user();
            if($user['level']==1||$user['level']==0){
                return $next($request);
            }else{
                return redirect('login');
            }

        }else{
            return redirect('login');
        }

    }
}
