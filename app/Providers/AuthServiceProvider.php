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
        $this->defineGateCategory();
        // Gate::define('menu-list', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        // });

        // Gate::define('product-edit', function ($user, $id) {
        //     $product = Product::find($id);
        //     if ( $user->checkPermissionAccess('product_edit') && $user->id === $product->user_id ) {
        //         return true;
        //     }
        //     return false;
        // });
    }

    public function defineGateCategory()
    {
        /**Page */
        Gate::define('admin.page.index', 'App\Policies\PagePolicy@viewAny');
        Gate::define('admin.page.create', 'App\Policies\PagePolicy@create');
        Gate::define('admin.page.edit', 'App\Policies\PagePolicy@view');
        Gate::define('admin.page.update', 'App\Policies\PagePolicy@update');
        Gate::define('admin.page.destroy', 'App\Policies\PagePolicy@delete');
        Gate::define('admin.page.action', 'App\Policies\PagePolicy@action');

        /**Post Cat */
        Gate::define('admin.post_cat.index', 'App\Policies\PostCatPolicy@viewAny');
        Gate::define('admin.post_cat.create', 'App\Policies\PostCatPolicy@create');
        Gate::define('admin.post_cat.edit', 'App\Policies\PostCatPolicy@view');
        Gate::define('admin.post_cat.update', 'App\Policies\PostCatPolicy@update');
        Gate::define('admin.post_cat.destroy', 'App\Policies\PostCatPolicy@delete');

        /**Post */
        Gate::define('admin.post.index', 'App\Policies\PostPolicy@viewAny');
        Gate::define('admin.post.create', 'App\Policies\PostPolicy@create');
        Gate::define('admin.post.edit', 'App\Policies\PostPolicy@view');
        Gate::define('admin.post.update', 'App\Policies\PostPolicy@update');
        Gate::define('admin.post.destroy', 'App\Policies\PostPolicy@delete');
        Gate::define('admin.post.action', 'App\Policies\PostPolicy@action');

        /**Product Cat */
        Gate::define('admin.product_cat.index', 'App\Policies\ProductCatPolicy@viewAny');
        Gate::define('admin.product_cat.create', 'App\Policies\ProductCatPolicy@create');
        Gate::define('admin.product_cat.edit', 'App\Policies\ProductCatPolicy@view');
        Gate::define('admin.product_cat.update', 'App\Policies\ProductCatPolicy@update');
        Gate::define('admin.product_cat.destroy', 'App\Policies\ProductCatPolicy@delete');

        /**Product */
        Gate::define('admin.product.index', 'App\Policies\ProductPolicy@viewAny');
        Gate::define('admin.product.create', 'App\Policies\ProductPolicy@create');
        Gate::define('admin.product.edit', 'App\Policies\ProductPolicy@view');
        Gate::define('admin.product.update', 'App\Policies\ProductPolicy@update');
        Gate::define('admin.product.destroy', 'App\Policies\ProductPolicy@delete');
        Gate::define('admin.product.action', 'App\Policies\ProductPolicy@action');

        /**Slider */
        Gate::define('admin.slider.index', 'App\Policies\SliderPolicy@viewAny');
        Gate::define('admin.slider.create', 'App\Policies\SliderPolicy@create');
        Gate::define('admin.slider.edit', 'App\Policies\SliderPolicy@view');
        Gate::define('admin.slider.update', 'App\Policies\SliderPolicy@update');
        Gate::define('admin.slider.destroy', 'App\Policies\SliderPolicy@delete');
        Gate::define('admin.slider.action', 'App\Policies\SliderPolicy@action');

        /**Order */
        Gate::define('admin.order.index', 'App\Policies\OrderPolicy@viewAny');
        Gate::define('admin.order.create', 'App\Policies\OrderPolicy@create');
        Gate::define('admin.order.edit', 'App\Policies\OrderPolicy@view');
        Gate::define('admin.order.update', 'App\Policies\OrderPolicy@update');
        Gate::define('admin.order.destroy', 'App\Policies\OrderPolicy@delete');
        Gate::define('admin.order.action', 'App\Policies\OrderPolicy@action');

        /**User */
        Gate::define('admin.user.index', 'App\Policies\UserPolicy@viewAny');
        Gate::define('admin.user.create', 'App\Policies\UserPolicy@create');
        Gate::define('admin.user.edit', 'App\Policies\UserPolicy@view');
        Gate::define('admin.user.update', 'App\Policies\UserPolicy@update');
        Gate::define('admin.user.destroy', 'App\Policies\UserPolicy@delete');
        Gate::define('admin.user.action', 'App\Policies\UserPolicy@action');
        Gate::define('is-admin', function ($user) {
            return $user->isAdmin();
        });

        /**Customer */
        Gate::define('admin.customer.index', 'App\Policies\CustomerPolicy@viewAny');
        Gate::define('admin.customer.edit', 'App\Policies\CustomerPolicy@view');
        Gate::define('admin.customer.update', 'App\Policies\CustomerPolicy@update');
        Gate::define('admin.customer.destroy', 'App\Policies\CustomerPolicy@delete');

        /**Permission */
        Gate::define('admin.permission.index', 'App\Policies\PermissionPolicy@viewAny');
        Gate::define('admin.permission.create', 'App\Policies\PermissionPolicy@create');
        Gate::define('admin.permission.edit', 'App\Policies\PermissionPolicy@view');
        Gate::define('admin.permission.update', 'App\Policies\PermissionPolicy@update');
        Gate::define('admin.permission.destroy', 'App\Policies\PermissionPolicy@delete');

        /**Role */
        Gate::define('admin.role.index', 'App\Policies\RolePolicy@viewAny');
        Gate::define('admin.role.create', 'App\Policies\RolePolicy@create');
        Gate::define('admin.role.edit', 'App\Policies\RolePolicy@view');
        Gate::define('admin.role.update', 'App\Policies\RolePolicy@update');
        Gate::define('admin.role.destroy', 'App\Policies\RolePolicy@delete');
    }
}
