<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FicheComptable extends Model
{
    public $table="fichecomptable";
    protected $dates = [
    'created_at',
    'updated_at',
    'du',
    'a'
  ];
    public function TotalStockage()
    {
      return $this->QteStockage*$this->PrixStockage;
    }
    public function TotalAppel()
    {
      return $this->QteAppel*$this->PrixAppel;
    }
    public function TotalChargeSupplementaire()
    {
      return $this->SoldePaysera+$this->transport+$this->employes+$this->TotalStockage()+$this->TotalAppel();
    }
    public function ListProduit(){
      return $this->hasMany('App\ChargeProduit');
    }
}
