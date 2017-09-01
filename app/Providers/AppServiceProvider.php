<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Import Schema
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {

        Validator::extend('fecha', function ($attribute, $value, $parameters, $validator) {
            if (empty($value)) return true;
            if (! is_string($value) && ! is_numeric($value)) {
                return false;
            }
            $date = \DateTime::createFromFormat($parameters[0], $value);
            return $date && $date->format($parameters[0]) == $value;
        });
        DB::statement("SET lc_time_names = 'es_ES'");
        Carbon::setLocale(config('app.locale'));
        Schema::defaultStringLength(191); //Solved by increasing StringLength

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
