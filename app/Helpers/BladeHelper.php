<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BladeHelper
{
    public static function role($roles): bool
    {
        $roles = explode(',', trim($roles, "'"));
        $role = Auth::user()->getRole();
        return (in_array($role, $roles));
    }

    /**
     * Active Blade Directive
     * ---------------------->
     * Return true if the route is matched
     */
    public static function active($route): string
    {
        $name = Route::current()->getName();
        $route = str_replace("'", '', $route);

        return preg_match("/$route/", $name) ? 'active' : '';
    }

    /**
     * Greet Blade Directive
     * ---------------------->
     * Return a greeting word
     */
    public static function greet(): string
    {
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
    }
}
