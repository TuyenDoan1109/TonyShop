<?php

namespace App\Providers;

use App\Policies\BrandPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Policies\AdminPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\SubcategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;

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
//        Gate::define('admin-view', function ($admin) {
////            dd($user);
//            return $admin->checkPermissionAccess('admin-view');
//        });

//        Gate::define('update-post', function ($user, $post) {
//            return $user->id == $post->user_id;
//        });

        // Admin
        Gate::define('admin-view', [AdminPolicy::class, 'view']);
        Gate::define('admin-add', [AdminPolicy::class, 'create']);
        Gate::define('admin-edit', [AdminPolicy::class, 'update']);
        Gate::define('admin-delete', [AdminPolicy::class, 'delete']);

        // Category
        Gate::define('category-view', [CategoryPolicy::class, 'view']);
        Gate::define('category-add', [CategoryPolicy::class, 'create']);
        Gate::define('category-edit', [CategoryPolicy::class, 'update']);
        Gate::define('category-delete', [CategoryPolicy::class, 'delete']);

        // Brand
        Gate::define('brand-view', [BrandPolicy::class, 'view']);
        Gate::define('brand-add', [BrandPolicy::class, 'create']);
        Gate::define('brand-edit', [BrandPolicy::class, 'update']);
        Gate::define('brand-delete', [BrandPolicy::class, 'delete']);

        // Subcategory
        Gate::define('subcategory-view', [SubcategoryPolicy::class, 'view']);
        Gate::define('subcategory-add', [SubcategoryPolicy::class, 'create']);
        Gate::define('subcategory-edit', [SubcategoryPolicy::class, 'update']);
        Gate::define('subcategory-delete', [SubcategoryPolicy::class, 'delete']);

        // Product
        Gate::define('product-view', [ProductPolicy::class, 'view']);
        Gate::define('product-add', [ProductPolicy::class, 'create']);
        Gate::define('product-edit', [ProductPolicy::class, 'update']);
        Gate::define('product-delete', [ProductPolicy::class, 'delete']);

        // Post
        Gate::define('post-view', [PostPolicy::class, 'view']);
        Gate::define('post-add', [PostPolicy::class, 'create']);
        Gate::define('post-edit', [PostPolicy::class, 'update']);
        Gate::define('post-delete', [PostPolicy::class, 'delete']);

        // User
        Gate::define('user-view', [UserPolicy::class, 'view']);
        Gate::define('user-add', [UserPolicy::class, 'create']);
        Gate::define('user-edit', [UserPolicy::class, 'update']);
        Gate::define('user-delete', [UserPolicy::class, 'delete']);
    }
}
