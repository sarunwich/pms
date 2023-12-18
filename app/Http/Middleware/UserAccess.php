<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if(auth()->user()->type == 1){
             return $next($request);
        // return response()->json(['You do not have .'.auth()->user()->type.' '.$userType]);
        // Auth::logout();
        }
        if(auth()->user()->type == 2){
            return $next($request);
       // return response()->json(['You do not have .'.auth()->user()->type.' '.$userType]);
       // Auth::logout();
       }
       if(auth()->user()->type == 3){
        return $next($request);
   // return response()->json(['You do not have .'.auth()->user()->type.' '.$userType]);
   // Auth::logout();
   }
       if(auth()->user()->type == 0){
        return $next($request);
   // return response()->json(['You do not have .'.auth()->user()->type.' '.$userType]);
   // Auth::logout();
   }
        // Auth::logout();
        return response()->json(['You do not have permission to access for this page.'.auth()->user()->type.' '.$userType]);
        Auth::logout();
        /* return response()->view('errors.check-permission'); */
    }
}
