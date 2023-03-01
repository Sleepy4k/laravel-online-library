<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Jsonify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (config()->get('api.enable_header')) {
            $request->headers->set('Accept', 'application/json');
            
            if (config()->get('api.force_header')) {
                $request->headers->set('Content-Type', 'application/json');
            }
        }

        if (auth('sanctum')->check()) {
            $user = auth('sanctum')->user()->language;

            app()->setlocale($user);
            $request->headers->set('Accept-Language', $user);
        }

        return $next($request);
    }
}