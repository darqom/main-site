<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

class BladeHelper
{
    public static function boot(): void
    {
        (new self)
            ->greet()
            ->active();
    }

    private function greet(): BladeHelper
    {
        Blade::directive('greet', function() {
           $time = intval(date('H'));

           if($time >= 10 && $time <= 13){
                return "Selamat Siang";
            }else if($time >= 13 && $time <= 17){
                return "Selamat Sore";
            }else if($time >= 17 || $time <= 4){
                return "Selamat Malam";
            }else{
                return "Selamat Pagi";
            }
        });

        return $this;
    }

    private function active()
    {
        Blade::directive('active', function($route) {
            $name = Route::current()->getName();
            return preg_match("/$name/", $route) ? 'active' : '';
        });
    }
}
