@extends("layouts.app")

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Fiche Comptable</div>
              <div class="card-body">
                <a href="{{route('FicheComptable.FicheADD')}}" class="btn btn-success" style="float:right;margin-bottom:12px">Ajouter</a>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col" >Poste</th>
                      <th scope="col" >Du</th>
                      <th scope="col">A</th>
                      <th scope="col" >Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listFiche as $e)
                    <tr>
                      <td>{{$e->NomSociete}}</td>
                      <td>{{$e->du->format('d/m/Y')}}</td>
                      <td>{{$e->a->format('d/m/Y')}}</td>
                      <td>
                        <a href="{{route('FicheComptable.FicheOperation',['ficheComptable'=>$e->id])}}" style="margin:2px" class="btn btn-info">Operation</a>
                        <a href="{{route('FicheComptable.ViewPDF',['id'=>$e->id])}}" style="margin:2px" class="btn btn-danger">PDF</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="display: flex; justify-content: center;">
                  {{$listFiche->links()}}
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
