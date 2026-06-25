<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   echo "<pre>";
        print_r($request->age);
        if($request->age<18){
            die("You can not visit this page");
        }
        return $next($request);
    }
}
