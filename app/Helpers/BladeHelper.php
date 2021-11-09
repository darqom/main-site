<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Blade;

class BladeHelper
{
    public static function boot(): void
    {
        (new self)->greet();
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
}
