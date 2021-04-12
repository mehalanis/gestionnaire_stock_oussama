<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppelStockage extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at'];
    protected $fillable = [
        'id', 'fiche_comptable_id','qte',"prix","type"
    ];
    public function total(){
      return $this->qte*$this->prix;
    }
    public function FicheComptable(){
        return $this->belongsTo(FicheComptable::class);
    }
}
