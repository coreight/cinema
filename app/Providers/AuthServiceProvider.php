<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Model\Movies;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
//        Movies::class => MoviePolicy::class
        ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        // Définition de la politique d'autorisation pour l'utilisateur connecté
        // superadmin est le nom de la politique de sécurité
        $gate->define('superadmin', function($user) {

            return $user->super_admin == 1? true : false; // (rappel écriture ternaire)
        });

        // Modification possible de l'objet movie que par son créateur
        $gate->define('hasmovie', function($user, $movie) {
            return $user->id ==  $movie->administrators_id;
        });

        $gate->define('notExpired', function($user) {

            $now = new \DateTime('now');
            $expiration = new \DateTime($user->expiration_date);
            return $expiration >= $now;
        });

    }
}
