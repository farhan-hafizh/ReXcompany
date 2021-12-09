<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdult
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        // dd($request['dob']);
        $dob=date_create($request['dob']);
        $today=date_create(date('Y-m-d'));
        $diff=date_diff($dob,$today);
        // dd($request['slug']);
        if($diff->format('%y')>18){
            // dd($next($request));
            return $next($request);
        }
        return back();
    }
}
