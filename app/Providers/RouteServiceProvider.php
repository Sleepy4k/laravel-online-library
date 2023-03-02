<?php

namespace App\Providers;

use App\Traits\ApiRespons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    use ApiRespons;

    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->as('.api')
                ->prefix('api')
                ->namespace('App\Http\Controllers\Api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace('App\Http\Controllers\Web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(30)->by(optional($request->user())->id ?: $request->ip())->response(function () {
                return $this->createResponse('Too Many Requests', [
                    'data' => 'too many requests in a given amount of time'
                ], 429);
            });
        });

        RateLimiter::for('web', function (Request $request) {
            return Limit::perMinute(30)->by(optional($request->user())->id ?: $request->ip())->response(function () {
                abort(429);
            });
        });
    }
}
