@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Produits ( {{session()->get('entreprise_nom')}} ) </div>
                <div class="card-body">
                <a href="{{route('Produit.create')}}" class="btn btn-success" style="float:right;margin-bottom:12px">Ajouter</a>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Stock</th>
                        <th scope="col">{{__('Message.Operation')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($listProduit as $Produit)
                      <tr>
                          <td>{{ $Produit->nom}}</td>
                          <td>{{ $Produit->stock}}</td>
                        <td>
                          <form action="" method="post" >
                            @csrf
                            <a href="{{route('ProduitView',['id'=>$Produit->id])}}" style="margin:2px" class="btn btn-primary">View</a>
                            <a href="{{route('viewOperation',['id'=>$Produit->id])}}" style="margin:2px" class="btn btn-info">Operation</a>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div style="display: flex; justify-content: center;">
                      {{$listProduit->links()}}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
