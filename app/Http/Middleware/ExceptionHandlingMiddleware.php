<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
  
class ExceptionHandlingMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            return $next($request);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => 'There was an error.'], 500);
        }
    }
}
