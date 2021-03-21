@extends("layouts.app")

@section('content')
@php
$i= (!isset($_GET["page"])) ? 1:0;
@endphp
<style >

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-bottom:0px">
             <a class="nav-item nav-link @if($i==1) active @endif" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ajouter un partenaire</a>
             <a class="nav-item nav-link @if($i==0) active @endif" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">List des partenaires</a>

           </div>
           <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade  @if($i==1) show active @endif" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('AddAutorisation')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                  <select class="form-control" name="user_id_auto" >
                                    @foreach($list_user as $user)
                                      @if($user->admin!=1)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                      @endif
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="nom" class="col-md-4 col-form-label text-md-right">Accès Produit</label>
                              <div class="col-md-6">
                                <input type="checkbox" name="produit" data-on="autorisé" data-off="non autorisé"  class="form-control" data-toggle="toggle" data-size="sm" data-width="150" data-onstyle="success" data-offstyle="danger">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="nom" class="col-md-4 col-form-label text-md-right">Accès Finance</label>
                              <div class="col-md-6">
                                <input type="checkbox" name="finance" data-on="autorisé" data-off="non autorisé"  class="form-control" data-toggle="toggle" data-size="sm" data-width="150" data-onstyle="success" data-offstyle="danger">
                              </div>
                            </div>
                            <input type="hidden" name="entreprise_id" value="{{$entreprise_id}}">
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                  <input type="submit" name="" class="btn btn-primary" style="margin:2px"  value="Ajouter">
                                  <a href="{{route('EntrepriseIndex')}}" class="btn btn-secondary">Retour</a>
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
                              <th scope="col">Nom</th>
                              <th scope="col">Operation</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($list_user_auto as $user)
                              @if($user->admin!=1)
                              <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Update_{{$user->id}}">
                                    accès
                                  </button>
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Supprimer_{{$user->id}}">
                                    Supprimer
                                  </button>
                                  <div class="modal fade" id="Supprimer_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                          Etes-vous sûre de vouloir supprimer le droit d'accés de <b>{{ $user->name }}</b> ?
                                      </div>
                                      <div class="modal-footer">
                                        <form  action="{{route('DeleteAutorisation',['entreprise_id'=>$entreprise_id])}}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                          <input type="submit" class="btn btn-danger" style="margin:2px"  value="Oui">
                                          <input type="hidden" name="user_id_delete" value="{{$user->id}}">
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  </div>
                                  <!--


                                -->
                                  <div class="modal fade" id="Update_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modification des droits d'accès </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form  action="{{route('UpdateAutorisation')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="card-body">
                                            <div class="form-group row">
                                              <label for="nom" class="col-md-4 col-form-label text-md-right">Accès Produit</label>
                                              <div class="col-md-6">
                                                <input type="checkbox"  @if($user->produit==1) checked @endif name="produit" data-on="autorisé" data-off="non autorisé"  class="form-control" data-toggle="toggle" data-width="140" data-onstyle="success" data-offstyle="danger">
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="nom" class="col-md-4 col-form-label text-md-right">Accès Finance</label>
                                              <div class="col-md-6">
                                                <input type="checkbox" @if($user->finance==1) checked @endif name="finance" data-on="autorisé" data-off="non autorisé"  class="form-control" data-toggle="toggle" data-width="140" data-onstyle="success" data-offstyle="danger">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                          <input type="submit" class="btn btn-primary" style="margin:2px"  value="Oui">
                                          <input type="hidden" name="entreprise_id" value="{{$entreprise_id}}">
                                          <input type="hidden" name="user_id" value="{{$user->id}}">
                                        </div>
                                    </form>
                                    </div>
                                  </div>
                                  </div>
                                </td>
                              </tr>
                              @endif
                              @endforeach
                          </tbody>
                      </table>
                      <div style="display: flex; justify-content: center;">
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
