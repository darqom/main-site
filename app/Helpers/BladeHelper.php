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
    public static function active($routes): string
    {
        $name = Route::current()->getName();
        $routes = str_replace("'", '', $routes);
        $routes = explode(',', $routes);

        $match = array_filter($routes, function($route) use($name) {
            return preg_match("/$route/", $name);
        });

        return (count($match) > 0) ? 'active' : '';
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
