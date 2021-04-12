<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #000;
  padding: 4px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: left;
}
.box{
  font-size: 18px;
}
.boxtitre{
  display: inline-block;
}
</style>
  </head>
  <body>
    <div class="boxtitre">
      <div class="box">
        <b>Nom :</b>{{$Fiche->NomSociete}}<br>
      </div>
      <div class="box">
        <b>Email :</b>{{$Fiche->Email}}<br>
      </div>
      <div class="box">
        <b>Du </b>{{$Fiche->du->format('d/m/Y')}}<b> A </b>{{$Fiche->a->format('d/m/Y')}}<br>
      </div>
    </div>
    <table >
      <thead>
        <tr>
          <th colspan="4" style="text-align: center;">Les charge Achat des Produits</th>
        </tr>
        <tr>
          <th>Désignation</th>
          <th>Quantité</th>
          <th>PU</th>
          <th>TOTAL </th>
        </tr>
      </thead>
      <tbody>
        {{$totalAchatProduits=0}}
        {{$ChargeSupplementaire=0}}
        {{$ListProduit=$Fiche->ListProduit()->get()}}
        @foreach($ListProduit as $e)
        <tr>
          <td>{{$e->Designation}}</td>
          <td>{{$e->Qte}}</td>
          <td>{{$e->PrixUnit}}</td>
          <td>{{ number_format($e->Total(),2," .",",")}} DZ</td>
        </tr>
        {{$totalAchatProduits+=$e->Total()}}
        @endforeach
      </tbody>
    </table>
    <!-- 2eme table-->
    <table >
      <thead>
        <tr >
          <th colspan="5" style="text-align: center;">Les Charge Supplémentaire</th>
        </tr>
      </thead>
      <tr>
        <th rowspan="{{$Fiche->soldePaysera()->get()->count()+1}}">Solde payera</th>
        <td colspan="2">
          Date
        </td>
        <td colspan="2">
          Solde
        </td>
      </tr>
      @forelse ($Fiche->soldePaysera()->get() as $item)
          <tr  >
            <td  colspan="2">{{$item->created_at->format('d/m/Y H:i:s')}}</td>
            <td  colspan="2">{{ number_format($item->Solde,2," .",",")}} DZ</td>
          </tr>
          {{$ChargeSupplementaire+=$item->Solde}}
      @empty
          <tr>
            <td colspan="5" style="text-align:center"> Vide </td>
          </tr>
      @endforelse
      <tr style="border-top-style: solid;">
        <th rowspan="{{$Fiche->soldeTransport()->get()->count()+1}}">Frais de transport</th>
        <td colspan="2">
          Date
        </td>
        <td colspan="2">
          Solde
        </td>
      </tr>
      @forelse ($Fiche->soldeTransport()->get() as $item)
          <tr  >
            <td  colspan="2">{{$item->created_at->format('d/m/Y H:i:s')}}</td>
            <td  colspan="2">{{ number_format($item->Solde,2," .",",")}} DZ</td>
          </tr>
          {{$ChargeSupplementaire+=$item->Solde}}
      @empty
          <tr>
            <td colspan="5" style="text-align:center"> Vide </td>
          </tr>
      @endforelse
      <tr style="border-top-style: solid;">
        <th rowspan="{{$Fiche->soldeEmployes()->get()->count()+1}}">Paiement des employés</th>
        <td colspan="2">
          Date
        </td>
        <td colspan="2">
          Solde
        </td>
      </tr>
      @forelse ($Fiche->soldeEmployes()->get() as $item)
          <tr  >
            <td  colspan="2">{{$item->created_at->format('d/m/Y H:i:s')}}</td>
            <td  colspan="2">{{ number_format($item->Solde,2," .",",")}} DZ</td>
          </tr>
          {{$ChargeSupplementaire+=$item->Solde}}
      @empty
          <tr>
            <td colspan="5" style="text-align:center"> Vide </td>
          </tr>
      @endforelse
      <tr style="border-top-style: solid;">
        <th rowspan="{{$Fiche->SoldeAppel()->get()->count()+1}}">Frais centre d’appel </th>
        <td>Date</td>
        <td>Quantité Expédier</td>
        <td> PU</td>
        <td >TOTAL</td>
      </tr>
      {{$first =true}}
      {{$totalappel= DB::table('appel_stockages') ->select(DB::raw('sum(qte*prix) as total'))->where([["fiche_comptable_id",'=',$Fiche->id],['type','=','1']])->groupBy('fiche_comptable_id')->get()}}
      
      @forelse ($Fiche->SoldeAppel()->get() as $item)
          <tr  >
            <td >{{$item->created_at->format('d/m/Y H:i:s')}}</td>
            <td  >{{$item->qte}}</td>
            <td  >{{$item->prix}}</td>
            @if($first==true) {{$ChargeSupplementaire+=$totalappel[0]->total}}<td rowspan="{{$Fiche->SoldeAppel()->get()->count()}}">{{ number_format($totalappel[0]->total,2," .",",")}}DZ</td>{{$first=false}}@endif
          </tr>
      @empty
          <tr>
            <td colspan="5" style="text-align:center"> Vide </td>
          </tr>
      @endforelse

      <tr style="border-top-style: solid;">
        <th rowspan="{{$Fiche->SoldeAppel()->get()->count()+1}}">Frais stockage Emballages </th>
        <td>Date</td>
        <td>Quantité Expédier</td>
        <td> PU</td>
        <td >TOTAL</td>

      </tr>
      {{$first =true}}
      {{$totalappel= DB::table('appel_stockages') ->select(DB::raw('sum(qte*prix) as total'))->where([["fiche_comptable_id",'=',$Fiche->id],['type','=','2']])->groupBy('fiche_comptable_id')->get()}}
     
      @forelse ($Fiche->SoldeStockage()->get() as $item)
          <tr  >
            <td >{{$item->created_at->format('d/m/Y H:i:s')}}</td>
            <td  >{{$item->qte}}</td>
            <td  >{{$item->prix}}</td>
            @if($first==true)  {{$ChargeSupplementaire+=$totalappel[0]->total}}<td rowspan="{{$Fiche->SoldeStockage()->get()->count()}}">{{ number_format($totalappel[0]->total,2," .",",")}} DZ</td>{{$first=false}}@endif
          </tr>
      @empty
          <tr>
            <td colspan="5" style="text-align:center"> Vide </td>
          </tr>
      @endforelse
    </table>
    <!-- 3eme table-->
    <table>
      <tr>
        <th colspan="3" style="text-align: center;">Calcule Bénéfice</td>
      </tr>
      <tr>
        @php $Revenu=0; @endphp
        <th width="250" rowspan="{{$Fiche->soldeRevenu()->get()->count()+1}}">Revenu</th>
        <td colspan="1">
          Date
        </td>
        <td colspan="1">
          Solde
        </td>
      </tr>
      @forelse ($Fiche->soldeRevenu()->get() as $item)
          <tr  >
            <td  colspan="1">{{$item->created_at->format('d/m/Y H:i:s')}}</td>
            <td  colspan="1">{{ number_format($item->Solde,2," .",",")}} DZ</td>
          </tr>
          @php $Revenu+=$item->Solde @endphp
      @empty
          <tr>
            <td colspan="3" style="text-align:center"> Vide </td>
          </tr>
      @endforelse
      <tr style="border-top-style: solid;">
        <th>Total Revenu</th>
        <td colspan="2">{{number_format($Revenu,2," .",",")}} DZ</td>
      </tr>
      <tr style="border-top-style: solid;">
        <th>Total Achat des produits</th>
        <td colspan="2">{{number_format($totalAchatProduits,2," .",",")}} DZ</td>
      </tr>
      <tr>
        <th>Total Les charge supplémentaire</th>
        <td colspan="2">{{number_format($ChargeSupplementaire,2," .",",")}} DZ</td>
      </tr>
      <tr>
        <th>TOTAL</th>
        <td colspan="2">{{number_format($Revenu-$totalAchatProduits-$ChargeSupplementaire,2," .",",")}} DZ</td>
      </tr>
    </table>
  </body>
</html>
