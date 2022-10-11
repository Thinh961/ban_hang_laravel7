<?php

namespace App\Policies;

use App\Page;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
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
        return $user->checkPermissionAccess('admin.page.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('admin.page.edit');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('admin.page.create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('admin.page.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('admin.page.destroy');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function action(User $user)
    {
        return $user->checkPermissionAccess('admin.page.action');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function forceDelete(User $user, Page $page)
    {
        //
    }
}
