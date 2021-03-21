@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Budget</div>

                <div class="card-body">
                    <form method="POST" action="{{route('Budget.storeBudget')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Type</label>

                            <div class="col-md-6">
                                <select class="form-control @error('nom') is-invalid @enderror" name="Type" required autofocus>
                                  <option value="1">Depenses</option>
                                  <option value="2">Revenus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Poste</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('nom') is-invalid @enderror" name="Poste" rows="3" ></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Montant</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="Montant" value="" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
