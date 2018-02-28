<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AuthorRoles
{
    const MEMBER_ROLES = 50;
    const AUTHOR_ROLES = 100;
    const MOD_ROLES = 150;
    const ADMIN_ROLES = 200;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->user_roles->roles->id >= self::MOD_ROLES) {
            return $next($request);
            
        }else if(Auth::user()->user_roles->roles->id == self::AUTHOR_ROLES){
            $msg='xin chào tác giả';
            return redirect(route('homepage'))->with('msg',$msg);
        }else{
           $msg='xin chào thành viên';
            return redirect(route('homepage'))->with('msg',$msg);
        }

    }
}
