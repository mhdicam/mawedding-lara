<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('post_comment', function (Request $request) {
            return [
                Limit::perSecond(1)->by('second:'. $request->ip()),
                Limit::perMinute(30)->by('minute:'.$request->ip()),
                Limit::perMinute(5)->by('minute:'.$request->author),
            ];
        });
    }
}
