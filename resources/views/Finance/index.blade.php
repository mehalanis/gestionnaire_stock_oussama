@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Finance</div>
                <div class="card-body">
                <a href="" class="btn btn-success" style="float:right;margin-bottom:12px;background-color:#FFF;border-color:#FFF"></a>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">{{__('Message.Operation')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td>Budget</td>
                        <td>
                          <a href="{{route('Budget.ADD')}}" style="margin:2px" class="btn btn-success">Ajouter</a>
                          <a href="{{route('Budget.index')}}" style="margin:2px" class="btn btn-primary">View</a>
                        </td>
                      </tr>
                      <tr>
                          <td>Fiche Comptable</td>
                        <td>
                          <a href="{{route('FicheComptable.FicheADD')}}" style="margin:2px" class="btn btn-success">Ajouter</a>
                          <a href="{{route('FicheComptable.ViewAll')}}" style="margin:2px" class="btn btn-primary">View</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div style="display: flex; justify-content: center;">
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
