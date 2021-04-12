@extends("layouts.app")

@section('content')
<style>

input.invalid {
  background-color: #ffdddd;
}

.tab {
  display: none;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Budget</div>

                <div class="card-body">
                    <form method="POST" id="regForm" action="{{route('FicheComptable.insert')}}">
                        @csrf
                          <div class="form-group row">
                              <label for="nom" class="col-md-4 col-form-label text-md-right">Nom Societe</label>

                              <div class="col-md-6">
                                  <input type="text" class="form-control @error('NomSociete') is-invalid @enderror" name="NomSociete" value="{{old('NomSociete')}}" autocomplete="off">
                                  @error('NomSociete')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="Email" class="col-md-4 col-form-label text-md-right">Email</label>

                              <div class="col-md-6">
                                  <input type="text" class="form-control @error('Email') is-invalid @enderror" name="Email" value="{{old('Email')}}" autocomplete="off">
                                  @error('Email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="du" class="col-md-4 col-form-label text-md-right">du</label>

                              <div class="col-md-6">
                                  <input type="date" class="form-control @error('du') is-invalid @enderror" name="du" value="{{old('du')}}" autocomplete="off">
                                  @error('du')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="a" class="col-md-4 col-form-label text-md-right">a</label>

                              <div class="col-md-6">
                                  <input type="date" class="form-control @error('a') is-invalid @enderror" name="a" value="{{old('a')}}" autocomplete="off">
                              </div>
                          </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success" >Ajouter</button>
                                <button type="button" class="btn btn-info" >Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
