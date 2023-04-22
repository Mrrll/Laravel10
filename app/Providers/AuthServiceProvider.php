<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Definimos puerta si el usuario es admin
        Gate::define('isAdmin', function (User $user) {
            return $user->roles->first()->slug == 'admin';
        });
        // Definimos puerta si el usuario es manager
        Gate::define('isManager', function (User $user) {
            return $user->roles->first()->slug == 'manager';
        });
    }
}
