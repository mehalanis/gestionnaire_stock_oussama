@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier Entreprise</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('EntrepriseEdit',['id'=>$id]) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="nom" type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $nom }}" required  autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Mot de Passe</label>

                            <div class="col-md-6">
                                <input id='password' type="Text" class="form-control @error('nom') is-invalid @enderror" name="password" value="" required  autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Message.Save') }}
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Supprimer">
                                  Supprimer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Supprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered " role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        Etes-vous sûre de vouloir supprimer l'entreprise <b>{{ $nom }}</b> ?
    </div>
    <div class="modal-footer">
      <form action="{{ route('Entreprise.destroy',['id'=>$id]) }}" method="post">
        @method("DELETE")
        @csrf
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-danger">Confirmer</button>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
