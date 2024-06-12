<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(90)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('api/basic', function (Request $request) {
            return Limit::perHour(30)->by($request->ip());
        });

        $this->routes(function () {
            //basic api file
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            //api file for authorization endpoints
            Route::middleware('api')
                ->prefix('api/auth')
                ->group(base_path('routes/api_auth.php'));

            //basic routes without any authorization required
            Route::middleware('api')
                ->prefix('api/basic')
                ->group(base_path('routes/api_basic.php'));

            //admin routes - can only be accessed by staff members at any time
            Route::middleware('api')
                ->prefix('api/admin')
                ->group(base_path('routes/api_admin.php'));

            //dog routes - endpoints with interacting the dog model
            Route::middleware('api')
                ->prefix('api/dog')
                ->group(base_path('routes/api_dog.php'));

            //customer routes - endpoints with interacting the customer model
            Route::middleware('api')
                ->prefix('api/customer')
                ->group(base_path('routes/api_customer.php'));

            //Booking routes - endpoints with interacting the Booking model
            Route::middleware('api')
                ->prefix('api/booking')
                ->group(base_path('routes/api_booking.php'));

            //kennel routes
            Route::middleware('api')
                ->prefix('api/kennel')
                ->group(base_path('routes/api_kennel.php'));

            //food routes
            Route::middleware('api')
                ->prefix('api/food')
                ->group(base_path('routes/api_food.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
