<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $repositories = [
            \App\Repositories\Interfaces\ITenantRepository::class => \App\Repositories\TenantRepository::class,
            \App\Repositories\Interfaces\IUserRepository::class => \App\Repositories\UserRepository::class,
            \App\Repositories\Tenant\Interfaces\IPatientRepository::class => \App\Repositories\Tenant\PatientRepository::class,
        ];

        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
