<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AppelStockage;
class AddAppelStockage extends Component
{
    public $FicheComptable;
    public $type;
    public $listType=[
      1=>'centre d’appel',
      2=>'stockage Emballages'
    ];
    public $qte;
    public $prix;
    protected $rules = [
        'qte' => 'required|numeric',
        'prix' => 'required|numeric',
    ];
    public function mount($FicheComptable,$type){
        $this->FicheComptable=$FicheComptable;
        $this->type=$type;
     }
     public function submit(){
       $this->validate();
       AppelStockage::create([
         'fiche_comptable_id'=>  $this->FicheComptable,
         'qte'=>$this->qte,
         'prix'=>$this->prix,
         'type'=>$this->type,
       ]);
       $this->prix="";
       $this->qte="";
       session()->flash('Mode',"success");
       session()->flash('message',"Vous avez ajouté avec succès ");

     }
    public function render()
    {
        return view('livewire.add-appel-stockage');
    }
}
