<?php

namespace App\Http\Middleware;

use App\Traits\ApiRespons;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    use ApiRespons;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            abort(to_route('login.index'));
        }
    }

    /**
     * Stop all system operation when user not authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\Middleware\Authenticate  $guards
     * @return string|null
     */
    protected function unauthenticated($request, array $guards)
    {
        if ($request->expectsJson()) {
            $response = $this->createResponse(trans('api.unauthenticate.error'), [
                'error' => trans('api.unauthenticate.message')
            ], 401);

            abort($response);
        } else {
            abort(to_route('login.index'));
        }
    }
}
