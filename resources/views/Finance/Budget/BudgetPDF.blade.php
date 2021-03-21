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

.boxtitre{
  text-align:center;
  font-size: 24px;
  font-weight: bold;
  padding-bottom: 10px;
}
.box{
    font-size: 18px;
    padding-bottom: 8px;
}
</style>
  </head>
  <body>
    <div class="boxtitre">
      {{$nomBudget}}
    </div>
    <div class="box">
       <b>Entreprise :</b> {{$entreprise->nom}}
    </div>
    <table >
      <thead>
        <tr>
          <th style="width:65%">Poste</th>
          <th>Date</th>
          <th>Montant (DZ)</th>
        </tr>
      </thead>
      <tbody>
        {{$total=0}}
        @foreach($Fiche as $e)
        <tr>
          <td>{{$e->Poste}}</td>
          <td>{{$e->created_at->format('d/m/Y H:i:s')}}</td>
          <td>{{number_format($e->Montant,2," .",",")}}</td>
        </tr>
        {{$total+=$e->Montant}}
        @endforeach
        <tr>
          <th colspan="2" style="text-align: right;"> Total </th>
          <td>{{number_format($total,2," .",",")}}</td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
