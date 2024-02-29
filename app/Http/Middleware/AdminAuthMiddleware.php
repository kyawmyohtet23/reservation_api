<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log::info('AdminAuthMiddleware: Start');

        // if (Auth::guard('admin')->check()) {
        //     Log::info('AdminAuthMiddleware: Admin authenticated');
        //     return $next($request);
        // }

        // Log::info('AdminAuthMiddleware: Unauthorized');
        // return response()->json(['error' => 'Unauthorized.'], 401);

        if (auth()->user()->tokenCan('role:admin')) {
            return $next($request);
        }
        return response()->json('Not Authorized', 401);
    }
}
