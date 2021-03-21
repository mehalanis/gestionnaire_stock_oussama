<?php

namespace App\Policies;

use App\User;
use App\entreprise_user;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return ($user->admin==1)?true:false;
    }

    public function viewProduit(User $user, User $model)
    {
      if($user->admin==1) return true;
      $entreprise=entreprise_user::where([["entreprise_id","=",session()->get('entreprise_id')],
    ["user_id","=",$user->id]])->first();
      if($entreprise==null) return false;
      return ($entreprise->produit==1)?true:false;
    }
    public function viewFinance(User $user, User $model)
    {
      if($user->admin==1) return true;
      $entreprise=entreprise_user::where([["entreprise_id","=",session()->get('entreprise_id')],
    ["user_id","=",$user->id]])->first();
      if($entreprise==null) return false;
      return ($entreprise->finance==1)?true:false;
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
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }

}
