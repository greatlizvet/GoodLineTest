<?php

namespace App\Policies;

use App\Pasta;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PastaPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pasta  $pasta
     * @return mixed
     */
    public function view(User $user, Pasta $pasta)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pasta  $pasta
     * @return mixed
     */
    public function update(User $user, Pasta $pasta)
    {
        //только владелец может обновить пасту
        return $user->id === $pasta->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pasta  $pasta
     * @return mixed
     */
    public function delete(User $user, Pasta $pasta)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pasta  $pasta
     * @return mixed
     */
    public function restore(User $user, Pasta $pasta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pasta  $pasta
     * @return mixed
     */
    public function forceDelete(User $user, Pasta $pasta)
    {
        //
    }
}
