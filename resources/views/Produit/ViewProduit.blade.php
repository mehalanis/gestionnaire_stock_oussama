@extends("layouts.app")

@section('content')
@php
$i= (!isset($_GET["page"])) ? 1:0;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-bottom:0px">
             <a class="nav-item nav-link @if($i==1) active @endif" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">View</a>
             <a class="nav-item nav-link @if($i==0) active @endif" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Statistique</a>

           </div>
           <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade  @if($i==1) show active @endif" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('Produit.destroy',['id'=>$Produit->id])}}">
                          @method("DELETE")
                            @csrf
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                    <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$Produit->nom}}" required  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Stock</label>
                                <div class="col-md-6">
                                    <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$Produit->stock}}" required  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Sortie</label>
                                <div class="col-md-6">
                                    <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$Produit->sortie}}" required  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Vendu</label>
                                <div class="col-md-6">
                                    <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$Produit->vendu}}" required  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Retoure</label>
                                <div class="col-md-6">
                                    <input id="nom" disabled type="Text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{$Produit->retoure}}" required  autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                  <a href="{{route('produitIndex')}}" class="btn btn-info">Retour</a>
                                  @can('update',$Produit)
                                  <a href="{{route('Produit.ViewEdit',['id'=>$Produit->id])}}" style="margin:2px" class="btn btn-secondary">Modifier</a>
                                  @endcan
                                  @can('delete',$Produit)
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Supprimer">
                                    Supprimer
                                  </button>
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
                                            Etes-vous sûre de vouloir supprimer le produit <b>{{$Produit->nom}}</b> ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                          <button type="submit" class="btn btn-danger">Confirmer</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  @endcan
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade @if($i==0) show active @endif" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card">
                    <div class="card-body">
                      <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Operation</th>
                              <th scope="col">Qte</th>
                              <th scope="col">Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($Produit->Operation() as $Operation)
                            <tr>
                              <td>{{$Operation->Nom}}</td>
                              @if($Operation->id!=2)
                                  <td style="color:green">+{{$Operation->pivot->Qte}}</td>
                              @else
                                  <td style="color:red">-{{$Operation->pivot->Qte}}</td>
                              @endif
                              <td>{{$Operation->pivot->created_at->format('d/m/Y H:i:s')}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      <div style="display: flex; justify-content: center;">
                          {{$Produit->Operation()->links()}}
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
