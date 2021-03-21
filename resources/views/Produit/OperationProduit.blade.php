@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Operation</div>

                <div class="card-body">
                    <form method="POST" action="{{route('ProduitOperation',['id'=>$produit->id])}}">
                        @method("PUT")
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Produit</label>

                            <div class="col-md-6">
                                <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$produit->nom}}" required  autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">Operation</label>

                            <div class="col-md-6">
                                <select class="form-control @error('prenom') is-invalid @enderror" name="Operation">
                                  @foreach ($operations as $operation)
                                  <option value="{{$operation->id}}">{{$operation->Nom}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">Quantite</label>

                            <div class="col-md-6">
                                <input id="quantite" value="" type="text" class="form-control @error('quantite') is-invalid @enderror" name="quantite" required autocomplete="false" >

                                @error('quantite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Ajouter
                                </button>
                                <a href="{{route('produitIndex')}}" class="btn btn-primary">Retour</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
