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
        {{$ListProduit=$Fiche->ListProduit()->get()}}
        @foreach($ListProduit as $e)
        <tr>
          <td>{{$e->Designation}}</td>
          <td>{{$e->Qte}}</td>
          <td>{{$e->PrixUnit}}</td>
          <td>{{$e->Total()}}</td>
        </tr>
        {{$totalAchatProduits+=$e->Total()}}
        @endforeach
      </tbody>
    </table>
    <!-- 2eme table-->
    <table >
      <thead>
        <tr >
          <th colspan="4" style="text-align: center;">Les Charge Supplémentaire</th>
        </tr>
      </thead>
      <tr>
        <th>Solde payera</th>
        <td colspan="3">{{number_format($Fiche->SoldePaysera,2," .",",")}}</td>
      </tr>
      <tr>
        <th>Frais de transport</th>
        <td colspan="3">{{number_format($Fiche->transport,2," .",",")}}</td>
      </tr>
      <tr>
        <th>Paiement des employés</th>
        <td colspan="3">{{number_format($Fiche->employes,2," .",",")}}</td>
      </tr>
      <tr >
        <th rowspan="2">Frais centre d’appel </th>
        <td>Quantité Expédier</td>
        <td> PU</td>
        <td>TOTAL</td>

      </tr>
      <tr>
        <td>{{$Fiche->QteAppel}}</td>
        <td> {{$Fiche->PrixAppel}}</td>
        <td>{{number_format($Fiche->TotalAppel(),2," .",",")}}</td>
      </tr>

      <tr >
        <th rowspan="2">Frais stockage Emballages </th>
        <td>Quantité Expédier</td>
        <td> PU</td>
        <td>TOTAL</td>

      </tr>
      <tr>
        <td>{{$Fiche->QteStockage}}</td>
        <td> {{$Fiche->PrixStockage}}</td>
        <td>{{number_format($Fiche->TotalStockage(),2," .",",")}}</td>
      </tr>
    </table>
    <!-- 3eme table-->
    <table>
      <tr>
        <th colspan="2" style="text-align: center;">Calcule Bénéfice</td>
      </tr>
      <tr>
        <th width="250">Revenu</th>
        <td >{{number_format($Fiche->Revenu,2," .",",")}}</td>
      </tr>
      <tr>
        <th>Total Achat des produits</th>
        <td >{{number_format($totalAchatProduits,2," .",",")}}</td>
      </tr>
      <tr>
        <th>Total Les charge supplémentaire</th>
        <td >{{number_format($Fiche->TotalChargeSupplementaire(),2," .",",")}}</td>
      </tr>
      <tr>
        <th>TOTAL</th>
        <td>{{number_format($Fiche->Revenu-($totalAchatProduits+$Fiche->TotalChargeSupplementaire()),2," .",",")}}</td>
      </tr>
    </table>
  </body>
</html>
