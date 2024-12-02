<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request; // Pastikan Anda mengimpor Request yang benar
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
    public function boot()
    {
        // RateLimiter::for('api', function (Request $request) { // Gunakan Request yang benar di sini
        //     return Limit::perMinute(60);
        // });
    }
}
