<?php

namespace App\Policies;

use App\User;
use App\Entreprise;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntreprisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any entreprises.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the entreprise.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function view(User $user, Entreprise $entreprise)
    {
        return ($user->admin==1)?true:false;
    }

    /**
     * Determine whether the user can create entreprises.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the entreprise.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function update(User $user, Entreprise $entreprise)
    {
        //
    }

    /**
     * Determine whether the user can delete the entreprise.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function delete(User $user, Entreprise $entreprise)
    {
        return ($user->admin==1)?true:false;
    }

    /**
     * Determine whether the user can restore the entreprise.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function restore(User $user, Entreprise $entreprise)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the entreprise.
     *
     * @param  \App\User  $user
     * @param  \App\Entreprise  $entreprise
     * @return mixed
     */
    public function forceDelete(User $user, Entreprise $entreprise)
    {
        //
    }
}
