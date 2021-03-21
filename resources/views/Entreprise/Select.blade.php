@extends("layouts.app")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Entreprise</div>

                <div class="card-body">
                    <form method="POST" action="{{route('SelectEntreprise')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <select class="form-control @error('nom') is-invalid @enderror" name="Entreprise_id" required autofocus>
                                  @foreach($entreprises as $entreprise)
                                  <option value="{{$entreprise->id}}">{{$entreprise->nom}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Start
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
