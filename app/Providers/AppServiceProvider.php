<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \DB::listen(function($sql, $bindings, $time)
        {
            \Log::info($sql.','.json_encode($bindings));
            array_unshift($_ENV,$sql.'гм'.json_encode($bindings));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
