<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //custom gates
        
        /* define a admin user role */

        Gate::define('superadmin', function($user) {

            return $user->role === 1;
 
         });
 
        
 
         /* define a manager user role */
 
         Gate::define('admin', function($user) {
 
             return $user->role === 2;
 
         });
 
       
 
         /* define a user role */
 
         Gate::define('client', function($user) {
 
             return $user->role === 3;
 
         });
    }
}
