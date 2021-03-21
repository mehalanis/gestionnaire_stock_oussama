<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
  public function Produit(){
    return $this->hasMany('App\Produit')->paginate(10);
  }
  public function User(){
    return $this->belongsToMany('App\User');
  }
  public function Depenses(){
    return $this->hasMany('App\DepensesRevenus')->where("depenses__revenus.type","=","1")->orderBy('depenses__revenus.created_at','desc')->paginate(5,["*"],"DepensesPage");
  }
  public function Revenus(){
    return $this->hasMany('App\DepensesRevenus')->where("depenses__revenus.type","=","2")->orderBy('depenses__revenus.created_at','desc')->paginate(5,["*"],"RevenusPage");
  }
}
