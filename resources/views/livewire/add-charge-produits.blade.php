<div>
   
    <form method="POST" action="{{route('ChargeProduit.AddList',['id'=>$FicheComptable])}}">
        @csrf
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
        @include("livewire.Message")
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-success" >
                    Ajouter
                </button>
                <a href="{{route('FicheComptable.ViewAll')}}" class="btn btn-primary">Retour</a>
            </div>
        </div>
       
    </form>
    
    
    
    
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
</div>
