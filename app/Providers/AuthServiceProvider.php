<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
         Gate::define('admin', function (User $user) {
            return $user->hasProfil('administrateur');
        });

        Gate::define('chefservice', function (User $user) {
            return $user->hasProfil('chefservice');
        });

        Gate::define('employe', function (User $user) {
            return $user->hasProfil('employe');
        });

        Gate::define('president', function (User $user) {
            return $user->hasProfil('president');
        });
    }
}
