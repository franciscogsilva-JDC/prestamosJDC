<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Role
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
        $roles = array_except(func_get_args(), [0,1]);
        if(Auth::user()){
            if(in_array(Auth::user()->type->id, $roles)){
                return $next($request);
            }else{
                return redirect()->back();            
            }
        }elseif(JWTAuth::parseToken()->authenticate()){
            if(in_array(JWTAuth::parseToken()->authenticate()->type->id, $roles)){
                return $next($request);
            }else{
                return response()->json([
                    'error'     =>  'Usuario no autorizado',
                    'success'   =>  false
                ],401)->setEncodingOptions(JSON_NUMERIC_CHECK);           
            }
        }
    }
}
