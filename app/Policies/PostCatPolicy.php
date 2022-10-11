<?php

namespace App\Policies;

use App\PostCat;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCatPolicy
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
        return $user->checkPermissionAccess('admin.post_cat.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\PostCat  $postCat
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('admin.post_cat.edit');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('admin.post_cat.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\PostCat  $postCat
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('admin.post_cat.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\PostCat  $postCat
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('admin.post_cat.destroy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\PostCat  $postCat
     * @return mixed
     */
    public function restore(User $user, PostCat $postCat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\PostCat  $postCat
     * @return mixed
     */
    public function forceDelete(User $user, PostCat $postCat)
    {
        //
    }
}
