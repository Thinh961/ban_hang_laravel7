<?php

namespace App\Policies;

use App\ProductCat;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCatPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess('admin.product_cat.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductCat  $productCat
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('admin.product_cat.edit');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('admin.product_cat.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductCat  $productCat
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('admin.product_cat.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductCat  $productCat
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('admin.product_cat.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductCat  $productCat
     * @return mixed
     */
    public function restore(User $user, ProductCat $productCat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ProductCat  $productCat
     * @return mixed
     */
    public function forceDelete(User $user, ProductCat $productCat)
    {
        //
    }
}
