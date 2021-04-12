@extends("layouts.app")

@section('content')
@php
$i= (isset($_GET["DepensesPage"])) ? 1:((isset($_GET["RevenusPage"]))? 2:0);
@endphp
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-bottom:0px">
        <a class="nav-item nav-link @if($i==0) active @endif" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">View</a>
        <a class="nav-item nav-link @if($i==1) active @endif" id="nav-Depenses-tab" data-toggle="tab" href="#nav-Depenses" role="tab" aria-controls="nav-Depenses" aria-selected="false">Dépenses</a>
        <a class="nav-item nav-link @if($i==2) active @endif" id="nav-Revenus-tab" data-toggle="tab" href="#nav-Revenus" role="tab" aria-controls="nav-Revenus" aria-selected="false">Revenus</a>
      </div>
      <div class="tab-content" id="nav-tabContent">
        <!-- 1ere page-->
        <div class="tab-pane fade  @if($i==0) show active @endif" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="card">
            <div class="card-body">

              <div class="form-group row">
                <label for="nom" class="col-md-4 col-form-label text-md-right">Revenus</label>
                <div class="col-md-6">
                  <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{number_format($Revenus)}} DZ" required  autofocus>
                </div>
                <div class="col-md-1">
                  <a href="{{route('Budget.ViewBudgetPDF',['type'=>2])}}">
                    <img src="{{ asset('pdf32px.png') }}" alt="">
                  </a>
                </div>
              </div>
              <div class="form-group row">
                <label for="nom" class="col-md-4 col-form-label text-md-right">Dépenses</label>
                <div class="col-md-6">
                  <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{number_format($Depenses)}} DZ" required  autofocus>
                </div>
                <div class="col-md-1">
                  <a href="{{route('Budget.ViewBudgetPDF',['type'=>1])}}">
                    <img src="{{ asset('pdf32px.png') }}" alt="">
                  </a>
                </div>
              </div>
              <div class="form-group row">
                <label for="nom" class="col-md-4 col-form-label text-md-right">SOLDE</label>
                <div class="col-md-6">
                  <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{number_format($Revenus-$Depenses)}} DZ" required  autofocus>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <a href="{{route('Budget.ADD')}}" style="margin:2px" class="btn btn-success">Ajouter</a>
                  <a href="{{route('produitIndex')}}" class="btn btn-info">Retour</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- 2eme page-->
        <div class="tab-pane fade @if($i==1) show active @endif" id="nav-Depenses" role="tabpanel" aria-labelledby="nav-Depenses-tab">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" style="width:60%">Poste</th>
                    <th scope="col" style="width:15%">Montant</th>
                    <th scope="col" style="width:15%">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($DepensesList as $e)
                  <tr>
                    <td>{{$e->Poste}}</td>
                    <td>{{number_format($e->Montant)}} DZ</td>
                    <td>{{$e->created_at->format('d/m/Y H:i:s')}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div style="display: flex; justify-content: center;">
                {{$DepensesList->links()}}
              </div>
            </div>
          </div>
        </div>
        <!-- 3eme page-->
        <div class="tab-pane fade @if($i==2) show active @endif" id="nav-Revenus" role="tabpanel" aria-labelledby="nav-Revenus-tab">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Poste</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($RevenusList as $e)
                  <tr>
                    <td>{{$e->Poste}}</td>
                    <td>{{number_format($e->Montant)}} DZ</td>
                    <td>{{$e->created_at->format('d/m/Y H:i:s')}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div style="display: flex; justify-content: center;">
                {{$RevenusList->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
@endsection
