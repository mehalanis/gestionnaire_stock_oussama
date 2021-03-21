@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="alert alert-danger" role="alert">
              Désolé, Cette page n'est pas disponible pour le moment <a href="{{route('produitIndex')}}">Retour</a>
          </div>
        </div>
    </div>
</div>
@endsection
