<div>

    <div class="form-group row">
        <label for="nom" class="col-md-4 col-form-label text-md-right">Operation</label>

        <div class="col-md-6">
            <select class="form-control" wire:model='operation' autofocus>
                <option value="1" > Achat des Produits</option>
                <option value="2" >Solde Paysera</option>
                <option value="3" >Frais de transport</option>
                <option value="4" >Paiement des employés</option>
                <option value="6" >centre d’appel</option>
                <option value="7" >stockage Emballages</option>
                <option value="5" >Revenu</option>
            </select>
        </div>
    </div>

    @if($operation==1)
         @livewire('add-charge-produits', ['FicheComptable' => $FicheComptable])
    <!-- Solde Paysera     // 1:payera 2:transport 3:employés 4:Revenu  -->
    @elseif($operation==2)
          @livewire('add-solde-paysera', ['FicheComptable' => $FicheComptable,'type'=>1])
    @elseif($operation==3)
        @livewire('add-solde-paysera', ['FicheComptable' => $FicheComptable,'type'=>2])
     @elseif($operation==4)
        @livewire('add-solde-paysera', ['FicheComptable' => $FicheComptable,'type'=>3])
     @elseif($operation==5)
        @livewire('add-solde-paysera', ['FicheComptable' => $FicheComptable,'type'=>4])
    @elseif($operation==6)
      @livewire('add-appel-stockage', ['FicheComptable' => $FicheComptable,'type'=>1])
    @elseif($operation==7)
      @livewire('add-appel-stockage', ['FicheComptable' => $FicheComptable,'type'=>2])
    @endif
</div>
