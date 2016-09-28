<?php

namespace App\Providers;
use Illuminate\Validation\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('mobile', function($attribute, $value, $parameters, $validator) {
            if(preg_match('/^09(0[1-3]|1[0-9]|3[0-9]|2[0-2]|9[0])-?[0-9]{3}-?[0-9]{4}$/', $value)){
                return true;
            }else{
                return false;
            }
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
