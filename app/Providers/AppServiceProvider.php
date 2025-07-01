<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

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
        if (app()->environment('production')) {
        try {
            Artisan::call('migrate', ['--force' => true]);
        } catch (\Exception $e) {
            \Log::error("Migration failed: " . $e->getMessage());
        }
    }
    }
}
 
