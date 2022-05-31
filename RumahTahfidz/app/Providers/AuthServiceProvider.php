<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("super_admin", function ($user) {
            return $user->getHakAkses->getRole->keterangan == "Super Admin";
        });

        Gate::define("admin", function ($user) {
            return $user->getHakAkses->getRole->keterangan == "Admin";
        });

        Gate::define("asatidz", function ($user) {
            return $user->getHakAkses->getRole->keterangan == "Asatidz";
        });

        Gate::define("santri", function ($user) {
            return $user->getHakAkses->getRole->keterangan == "Santri";
        });
    }
}
