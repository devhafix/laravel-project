<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    public function handle($request, Closure $next)
    {
        Log::info('Request URL: ' . $request->fullUrl());
        Log::info('Request Method: ' . $request->method());

        return $next($request);
    }
}
