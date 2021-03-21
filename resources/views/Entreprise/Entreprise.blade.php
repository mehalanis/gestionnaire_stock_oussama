@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Entreprise</div>
                <div class="card-body">
                <a href="{{route('EntrepriseCreate')}}" class="btn btn-success" style="float:right;margin-bottom:12px">Ajouter</a>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">{{__('Message.Operation')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Entreprises as $Entreprise)
                      <tr>
                          <td>{{ $Entreprise->nom}}</td>
                        <td>
                          <a href="{{route('ViewAutorisation',['id'=>$Entreprise->id])}}" style="margin:2px" class="btn btn-primary">Autorisation</a>
                          <a href="{{route('Entreprise.viewEdit',['id'=>$Entreprise->id])}}" style="margin:2px" class="btn btn-info">Edit</a>
                          
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div style="display: flex; justify-content: center;">
                     {{$Entreprises->links()}}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
