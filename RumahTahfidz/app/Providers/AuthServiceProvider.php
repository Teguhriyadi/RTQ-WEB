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
            return $user->getHakAkses->getRole->id == "19dd2155-9d1e-4c50-9b0e-bbede07953a4";
        });

        Gate::define("admin", function ($user) {
            return $user->getHakAkses->getRole->id == "337740fc-021a-46dd-a2e6-7ad08e76422b";
        });

        Gate::define("asatidz", function ($user) {
            return $user->getHakAkses->getRole->id == "bb2ae906-3904-4d6c-b4cd-1ad59a191978";
        });

        Gate::define("santri", function ($user) {
            return $user->getHakAkses->getRole->id == "cc2503ce-f743-412a-a6b5-925850632807";
        });
    }
}
