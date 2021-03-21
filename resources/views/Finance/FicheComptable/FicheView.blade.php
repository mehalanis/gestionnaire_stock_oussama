@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fiche Comptable</div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col" style="width:60%">Poste</th>
                        <th scope="col" style="width:15%">Du</th>
                        <th scope="col" style="width:15%">A</th>
                        <th cope="col" >PDF</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($listFiche as $e)
                      <tr>
                        <td>{{$e->NomSociete}}</td>
                        <td>{{$e->du->format('d/m/Y')}}</td>
                        <td>{{$e->a->format('d/m/Y')}}</td>
                        <td>
                          <a href="{{route('FicheComptable.ViewPDF',['id'=>$e->id])}}">
                            <img src="{{ asset('pdf32px.png') }}" alt="">
                          </a>
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
