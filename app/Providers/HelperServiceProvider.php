<?php

namespace App\Providers;

use App\Helpers\CustomValidator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

use Validator;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $file = app_path('Helpers/Helper.php');
//        if (file_exists($file)) {
//            require_once($file);
//        }
//        Or
        foreach (glob(app_path() . '/Helpers/*.php') as $file) {
            require_once($file);
        }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('is_valid_phone', function($attribute, $value, $parameters) {

            if(CustomValidator::validPhone($value)){
                //print_r($matches);exit;
                return true;
            }
            return false;
        });
        Validator::replacer('is_valid_phone', function($message, $attribute, $rule, $parameters) {
            return str_replace($message, "Please provide a valid phone", $message);
        });

    }
}
