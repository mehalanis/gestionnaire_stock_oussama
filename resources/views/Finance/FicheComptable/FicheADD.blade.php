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
                        <div class="tab">
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
                        </div>
                        <!-- -->
                        <div class="tab" id="list_produits">
                          <div class="form-group row">
                              <label  class="col-4 col-form-label ">Désignation</label>
                              <label  class="col-3 col-form-label ">Qte</label>
                              <label  class="col-4 col-form-label ">Prix Unit</label>
                          </div>
                          <div class="form-group row" >
                              <div class="col-4">
                                  <input type="text" class="form-control @error('nom') is-invalid @enderror" name="Designation[]" value="" autocomplete="off">
                              </div>
                              <div class="col-3">
                                  <input type="text" class="form-control @error('nom') is-invalid @enderror" name="Qte[]" value="" autocomplete="off">
                              </div>
                              <div class="col-4">
                                  <input type="text" class="form-control @error('nom') is-invalid @enderror" name="PU[]" value="" autocomplete="off">
                              </div>
                              <img  id="ADD_Produit"  class="col-form-label " src="{{asset('Add24px.png')}}" alt="">
                          </div>

                        </div>
                        <!-- -->
                        <div class="tab">
                          <div class="form-group row">
                              <label for="SoldePaysera" class="col-md-4 col-form-label text-md-right">Solde Paysera</label>

                              <div class="col-md-6">
                                  <input type="text" placeholder="(en dinar algérien)" class="form-control @error('SoldePaysera') is-invalid @enderror" name="SoldePaysera" value="{{old('SoldePaysera')}}" autocomplete="off">
                                  @error('SoldePaysera')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="transport" class="col-md-4 col-form-label text-md-right">transport</label>

                              <div class="col-md-6">
                                  <input type="text" class="form-control @error('transport') is-invalid @enderror" name="transport" value="{{old('transport')}}" autocomplete="off">
                                  @error('transport')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="employes" class="col-md-4 col-form-label text-md-right">employes</label>

                              <div class="col-md-6">
                                  <input type="text" class="form-control @error('employes') is-invalid @enderror" name="employes" value="{{old('employes')}}" autocomplete="off">
                                  @error('employes')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                        </div>
                        <!-- -->
                        <div class="tab">
                          <div class="form-group row">
                            <label for="QteAppel" class="col-4 col-form-label text-md-right"></label>
                            <label for="QteAppel" class="col-3 col-form-label text-md-center">Quantité</label>
                            <label for="QteAppel" class="col-3 col-form-label text-md-center">Prix Unitaire</label>
                          </div>
                          <div class="form-group row">
                              <label for="QteAppel" class="col-4 col-form-label text-md-right">Appel</label>

                              <div class="col-3">
                                  <input type="text" class="form-control @error('QteAppel') is-invalid @enderror" name="QteAppel" value="{{old('QteAppel')}}" autocomplete="off">
                                  @error('QteAppel')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-3">
                                  <input type="text" class="form-control @error('PrixAppel') is-invalid @enderror" name="PrixAppel" value="{{old('PrixAppel')}}" autocomplete="off">
                                  @error('PrixAppel')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="QteStockage" class="col-4 col-form-label text-md-right">Stockage</label>

                              <div class="col-3">
                                  <input type="text" class="form-control @error('QteStockage') is-invalid @enderror" name="QteStockage" value="{{old('QteStockage')}}" autocomplete="off">
                                  @error('QteStockage')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-3">
                                  <input type="text" class="form-control @error('PrixStockage') is-invalid @enderror" name="PrixStockage" value="{{old('PrixStockage')}}" autocomplete="off">
                                  @error('PrixStockage')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                        </div>
                        <div class="tab">
                          <div class="form-group row">
                              <label for="Revenu" class="col-md-4 col-form-label text-md-right">Revenu</label>

                              <div class="col-md-6">
                                  <input type="text" class="form-control @error('Revenu') is-invalid @enderror" name="Revenu" value="{{old('Revenu')}}" autocomplete="off">
                                  @error('Revenu')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-info" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)" >Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none"  id="input_Produits">
  <div class="form-group row moinsRow" >
      <div class="col-4">
          <input type="text" class="form-control @error('nom') is-invalid @enderror" name="Designation[]" value="" autocomplete="off">
      </div>
      <div class="col-3">
          <input type="text" class="form-control @error('nom') is-invalid @enderror" name="Qte[]" value="" autocomplete="off">
      </div>
      <div class="col-4">
          <input type="text" class="form-control @error('nom') is-invalid @enderror" name="PU[]" value="" autocomplete="off">
      </div>
      <img  class="col-form-label btnMoinsRow" src="{{asset('moins24px.png')}}" alt="">
  </div>
</div>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
}

function nextPrev(n) {
  var x = document.getElementsByClassName("tab");
  if (n == 1 && !validateForm()) return false;
  currentTab = currentTab + n;
  if (currentTab >= x.length) {
    document.getElementById("regForm").submit();
    return false;
  }
  x[currentTab-n].style.display = "none";
  showTab(currentTab);
}

function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }
  return valid;
}
$(document).ready(function() {
  $("#ADD_Produit").click(function(){
     $("#list_produits").append(document.getElementById("input_Produits").innerHTML);
     InitMoinsRow();
  });
  $(document).on('click','.btnMoinsRow', function(){
      $("#moinsRow_"+$(this).attr('id')).remove();
      InitMoinsRow();
    });
});

function InitMoinsRow() {
  var List=document.getElementsByClassName("moinsRow");
  var ListBtn=document.getElementsByClassName("btnMoinsRow");
  for(var i=0;i<List.length;i++){
    List[i].id="moinsRow_"+i;
    ListBtn[i].id=i;
  }
}
</script>

@endsection
