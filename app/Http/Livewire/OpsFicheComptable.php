<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OpsFicheComptable extends Component
{
    public $operation =1;
    public $FicheComptable;
    public function mount($FicheComptable){
        $this->FicheComptable=$FicheComptable;
     }

    public function render()
    {
        return view('livewire.ops-fiche-comptable');
    }
}
