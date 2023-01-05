<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        /**
         *  1 equivale ao super Admin acesso total
         *  2 equivale ao  Admin acesso em parte
         *  3^ equivale ao  acesso comun
         */

        Gate::define('ver-produto', function (User $user)
        {
            return in_array($user->nivelAcesso->nivel, [1,2]);
        });

        Gate::define('cadastrar-produto', function (User $user)
        {
            return in_array($user->nivelAcesso->nivel, [1,2]);
        });

        Gate::define('criar-produto', function (User $user)
        {
            return in_array($user->nivelAcesso->nivel, [1,2]);
        });

        Gate::define('criar-nivel-acesso', function (User $user)
        {
            return in_array($user->nivelAcesso->nivel, [1,2]);
        });

        Gate::define('salvar-nivel-acesso', function (User $user)
        {
            return in_array($user->nivelAcesso->nivel, [1,2]);
        });

        Gate::define('criar-unidade-medida', function (User $user)
        {
            return in_array($user->nivelAcesso->nivel, [1,2]);
        });

        Gate::define('salvar-unidade-medida', function (User $user)
        {
            return in_array($user->nivelAcesso->nivel, [1,2]);
        });

        Gate::define('categoria-criar', function (User $user)
        {
            return in_array($user->nivel_acesso, [1,2]);
        });

        Gate::define('categoria-salvar', function (User $user)
        {
            return in_array($user->nivel_acesso, [1,2]);
        });

        Gate::define('ver-usuarios', function (User $user)
        {
            return $user->nivelAcesso->nivel == 1;
        });
    }
}
