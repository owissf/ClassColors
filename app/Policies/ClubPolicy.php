<?php

namespace App\Policies;

use App\Models\Club;
use App\Models\Color;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ClubPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function addSchool(User $user)
    {
        // dd($user->roles);
        return $user->admin == 1 && count($user->clubs) < 1;
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function dashboard(User $user)
    {
        return $user->roles->map->perms->flatten()->pluck('perm')->unique()->contains('adminclub');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Auth\Access\Response|bool
     */

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Club $club)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Club $club)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Club $club)
    {
        //
    }
}
