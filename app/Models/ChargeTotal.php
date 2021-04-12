<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\FicheComptable;
class ChargeTotal extends Model
{
    use HasFactory;
    public $table="charge_totals";
    protected $dates = [
        'created_at',
        'updated_at'];
    protected $fillable = [
        'id', 'fiche_comptable_id','Solde',"type"
    ];
    public function FicheComptable(){
        return $this->belongsTo(FicheComptable::class);
    }
}
