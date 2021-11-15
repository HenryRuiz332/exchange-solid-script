<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
           
            if (Auth::guard($guard)->check()) {
                if($request->wantsJson()){
                    $user = User::with('roles')->where('id', $request->user()->id)->first();
                     $token = Str::random(40);
                    return response()->json([
                       
                        'message' => 'User Authenticated',
                        'user' => $user,
                        'token' => $token,
                    ]);
                }
                
                foreach ($request->user()->roles as $key => $role) {
                    if ($role->name == 'Admin') {
                       return redirect(RouteServiceProvider::HOME);
                    }else{
                         return redirect(RouteServiceProvider::GUEST);
                    }
                }
             
               
            }
        }

        return $next($request);
    }
}
