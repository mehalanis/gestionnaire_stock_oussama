<?php

namespace App\Policies;

use App\User;
use App\Produit;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProduitPolicy
{
    use HandlesAuthorization;

    public function cond(Produit $produit){
      return (session()->get('entreprise_id')==$produit->entreprise_id) ? true:false;
    }
    /**
     * Determine whether the user can view any produits.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }


    /**
     * Determine whether the user can view the produit.
     *
     * @param  \App\User  $user
     * @param  \App\Produit  $produit
     * @return mixed
     */
    public function view(User $user, Produit $produit)
    {
      return $this->cond($produit);
    }

    /**
     * Determine whether the user can create produits.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can update the produit.
     *
     * @param  \App\User  $user
     * @param  \App\Produit  $produit
     * @return mixed
     */
    public function update(User $user, Produit $produit)
    {
        return ($this->cond($produit)&&($user->admin==1))?true:false;
    }

    /**
     * Determine whether the user can delete the produit.
     *
     * @param  \App\User  $user
     * @param  \App\Produit  $produit
     * @return mixed
     */
    public function delete(User $user, Produit $produit)
    {
      return ($this->cond($produit)&&($user->admin==1))?true:false;
    }

    /**
     * Determine whether the user can restore the produit.
     *
     * @param  \App\User  $user
     * @param  \App\Produit  $produit
     * @return mixed
     */
    public function restore(User $user, Produit $produit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the produit.
     *
     * @param  \App\User  $user
     * @param  \App\Produit  $produit
     * @return mixed
     */
    public function forceDelete(User $user, Produit $produit)
    {
        //
    }
}
