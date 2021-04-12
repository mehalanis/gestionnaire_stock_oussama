<div>
  <form wire:submit.prevent="submit">
    <div class="form-group row">
      <label for="QteAppel" class="col-4 col-form-label text-md-right"></label>
      <label for="QteAppel" class="col-3 col-form-label text-md-center">Quantité</label>
      <label for="QteAppel" class="col-3 col-form-label text-md-center">Prix Unitaire</label>
    </div>
    <div class="form-group row">
        <label for="QteStockage" class="col-4 col-form-label text-md-right">{{$listType[$type]}}</label>

        <div class="col-3">
            <input type="text" class="form-control" wire:model="qte" value="" autocomplete="off">
        </div>
        <div class="col-3">
            <input type="text" class="form-control" wire:model="prix" value="" autocomplete="off">
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
