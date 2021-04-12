<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\ChargeTotal;
use App\Models\AppelStockage;
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
    // 1:payera 2:transport 3:employés 4:Revenu
    public function soldePaysera(){
      return $this->hasMany(ChargeTotal::class)->where("type","=","1");
    }
    public function soldeTransport(){
      return $this->hasMany(ChargeTotal::class)->where("type","=","2");
    }
    public function soldeEmployes(){
      return $this->hasMany(ChargeTotal::class)->where("type","=","3");
    }
    public function soldeRevenu(){
      return $this->hasMany(ChargeTotal::class)->where("type","=","4");
    }
    public function SoldeAppel(){
      return $this->hasMany(AppelStockage::class)->where("type","=","1");
    }
    public function SoldeStockage(){
      return $this->hasMany(AppelStockage::class)->where("type","=","2");
    }
}
