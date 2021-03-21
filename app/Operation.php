<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
  public function Commande(){
    return $this->hasMany('App\Commande');
  }
  public function Produit(){
    return $this->belongsToMany('App\Produit');
  }
}
