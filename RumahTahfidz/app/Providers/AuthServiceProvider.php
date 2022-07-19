<?php

namespace App\Providers;

use App\Models\Role;
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
            if (empty($user->getHakAkses->getRole)) {
                return redirect("/app/logout");
            } else {
                return $user->getHakAkses->getRole->id == "1";
            }
        });

        Gate::define("admin", function ($user) {
            if (empty($user->getHakAkses->getRole)) {
                return redirect("/app/logout");
            } else {
                return $user->getHakAkses->getRole->id == "2";
            }
        });

        Gate::define("asatidz", function ($user) {
            if (empty($user->getHakAkses->getRole)) {
                return redirect("/app/logout");
            } else {
                return $user->getHakAkses->getRole->id == "3";
            }
        });

        Gate::define("santri", function ($user) {
            if (empty($user->getHakAkses->getRole)) {
                return redirect("/app/logout");
            } else {
                return $user->getHakAkses->getRole->id == "4";
            }
        });
    }
}
