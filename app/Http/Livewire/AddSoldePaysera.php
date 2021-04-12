<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ChargeTotal;
class AddSoldePaysera extends Component
{
    public $FicheComptable;
    public $type;
    public $solde;
    public $list=[
        1=>"Solde Paysera",
        2=>'Frais de transport',
        3=>'Paiement des employés',
        4=>'Revenu',
    ];
    protected $rules = [
        'solde' => 'required|numeric',
    ];
    public function mount($FicheComptable,$type){
        $this->FicheComptable=$FicheComptable;
        $this->type=$type;
     }
     // 1:payera 2:transport 3:employés 4:Revenu
     public function submit(){
        $this->validate();
        ChargeTotal::create([
             "fiche_comptable_id"=>$this->FicheComptable,
             "Solde"=>$this->solde,
             'type'=> $this->type
         ]);
         $this->solde="";
         session()->flash('Mode',"success");
         session()->flash('message',"Vous avez ajouté avec succès "); 
     }

    public function render()
    {
        return view('livewire.add-solde-paysera');
    }
}
