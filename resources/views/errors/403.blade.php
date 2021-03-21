@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="alert alert-danger" role="alert">
              Désolé, vous n’avez pas l’autorisation d’accéder à cette page <a href="{{route('produitIndex')}}">Retour</a>
          </div>
        </div>
    </div>
</div>
@endsection
