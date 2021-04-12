<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\ChargeProduit;
class AddChargeProduits extends Component
{
   public $FicheComptable;
    public function mount($FicheComptable){
        $this->FicheComptable=$FicheComptable;
     }
     
    public function render()
    {
        return view('livewire.add-charge-produits');
    }
}
