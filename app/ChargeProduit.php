<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeProduit extends Model
{
    public $table="chargeproduits";
    public function Total()
    {
      return $this->Qte*$this->PrixUnit;
    }
}
