<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Queue;
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
            //\Log::info($sql.','.json_encode($bindings));
            array_unshift($_ENV,$sql.'гм'.json_encode($bindings));
        });

        Queue::failing(function ($connection, $job, $data) {

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
