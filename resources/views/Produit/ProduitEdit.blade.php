@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Statistique</div>

                <div class="card-body">
                    <form method="post" action="{{route('Produit.Edit',['id'=>$id])}}">
                      @method("put")
                        @csrf
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>
                            <div class="col-md-6">
                                <input id="nom" type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$nom}}" required  autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Stock</label>
                            <div class="col-md-6">
                                <input id="nom" type="Text" class="form-control @error('nom') is-invalid @enderror" name="stock" value="{{$stock}}" required  autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Sortie</label>
                            <div class="col-md-6">
                                <input id="nom"  type="Text" class="form-control @error('nom') is-invalid @enderror" name="sortie" value="{{$sortie}}" required  autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Vendu</label>
                            <div class="col-md-6">
                                <input id="nom"  type="Text" class="form-control @error('nom') is-invalid @enderror" name="vendu" value="{{$vendu}}" required  autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Retoure</label>
                            <div class="col-md-6">
                                <input id="nom"  type="Text" class="form-control @error('nom') is-invalid @enderror" name="retoure" value="{{$retoure}}" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-success" style="margin:2px" value="Modifier">
                                <a href="{{route('produitIndex')}}" class="btn btn-info">Retour</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
