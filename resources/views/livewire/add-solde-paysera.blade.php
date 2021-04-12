<div>
    <form wire:submit.prevent="submit">
        <div class="form-group row">
            <label for="SoldePaysera" class="col-md-4 col-form-label text-md-right"> {{$list[$type]}}</label>

            <div class="col-md-6">
                <input type="text" placeholder="(Montant en dinar algérien)" class="form-control" name="SoldePaysera" wire:model='solde' autocomplete="off">
            </div>
        </div>
        @include("livewire.Message")
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-success" >
                    Ajouter
                </button>
                <a href="{{route('FicheComptable.ViewAll')}}" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </form>
</div>
