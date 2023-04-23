<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Abertura de la directiva
        Blade::directive('role', function($roles){
            return "<?php if(auth()->check() && auth()->user()->hasRole($roles)) : ?>";
        });
        // Cierre de la directiva
        Blade::directive('endrole', function($roles){
            return "<?php endif; ?>";
        });
    }
}
