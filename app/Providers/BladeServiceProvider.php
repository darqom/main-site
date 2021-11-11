<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('role', function ($roles) {
            return "<?php if(App\Helpers\BladeHelper::role($roles)): ?>";
        });

        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('active', function($route) {
            return "<?= App\Helpers\BladeHelper::active($route) ?>";
        });

        Blade::directive('greet', function() {
            return "<?= App\Helpers\BladeHelper::greet() ?>";
        });
    }
}
