<?php

namespace App\Providers;

use App\Models\Product;
use App\Policies\ProductPolicy;
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
       Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-product', function ($user, $product){
            return $user->id == $product->user_id;
        });
        Gate::define('big-boss', function ($user){
            return $user->role === 3;
        });
        Gate::define('admin', function ($user){
            return $user->role === 1;
        });
    }
}
