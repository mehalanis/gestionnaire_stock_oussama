<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
  public $table='produits';
  /*public function Commandes(){
    return $this->hasMany('App\Commande');
  }*/
  public function Operation(){
    return $this->belongsToMany('App\Operation')->withPivot(['id','Qte','created_at'])->orderBy('operation_produit.id','desc')->paginate(10);
  }
}
