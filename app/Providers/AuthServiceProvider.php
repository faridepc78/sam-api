<?php

namespace App\Providers;

use App\Models\Clerk;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Space;
use App\Models\User;
use App\Policies\ClerkPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\SpacePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Permission::class => PermissionPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Space::class => SpacePolicy::class,
        Clerk::class => ClerkPolicy::class,
        Order::class => OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
