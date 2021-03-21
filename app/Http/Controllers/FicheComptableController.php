<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\FicheComptable;
use App\ChargeProduit;
use App\User;
use PDF;
use Illuminate\Support\Facades\Auth;

class FicheComptableController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function viewFinance()
  {
    $this->authorize('viewFinance', Auth::user());
  }
  public function FicheADD()
  {
    $this->viewFinance();
    return view("Finance/FicheComptable/FicheADD");
  }

  public function ViewAll()
  {
    $this->viewFinance();
    $List=FicheComptable::where("entreprises_id","=",session()->get('entreprise_id'))->orderBy('fichecomptable.created_at','desc')->paginate(10,["id","NomSociete","du","a"]);
    return view("Finance/FicheComptable/FicheView",['listFiche'=>$List]);
  }
    public function insert(Request $request)
    {
      $this->viewFinance();
      $validator = Validator::make($request->all(), [
        'NomSociete' => 'required|string',
        'Email'=>"required|string",
        "du"=>"required|before_or_equal:".$request->input('a'),
        "SoldePaysera"=>'required|numeric',
        "transport"=>'required|numeric',
        "employes"=>'required|numeric',
        "PrixAppel"=>'required|numeric',
        "QteAppel"=>'required|numeric',
        "QteStockage"=>'required|numeric',
        "PrixStockage"=>'required|numeric',
        "Revenu"=>'required|numeric',

      ]);
      if ($validator->fails()) {
        return Redirect::back()->withErrors($validator)->withInput();
      }
      $Fiche=new FicheComptable();
      $Fiche->entreprises_id=session()->get('entreprise_id');
      $Fiche->NomSociete=$request->input('NomSociete');
      $Fiche->Email=$request->input('Email');
      $Fiche->du=$request->input('du');
      $Fiche->a=$request->input('a');
      $Fiche->SoldePaysera=$request->input('SoldePaysera');
      $Fiche->transport=$request->input('transport');
      $Fiche->employes=$request->input('employes');
      $Fiche->QteAppel=$request->input('QteAppel');
      $Fiche->PrixAppel=$request->input('PrixAppel');
      $Fiche->QteStockage=$request->input('QteStockage');
      $Fiche->PrixStockage=$request->input('PrixStockage');
      $Fiche->Revenu=$request->input('Revenu');
      $Fiche->save();
      foreach ($request->input('Designation') as $key => $Designation) {
        $ChargeProduit=new ChargeProduit();
        $ChargeProduit->fiche_comptable_id=$Fiche->id;
        $ChargeProduit->Designation=$request->input('Designation')[$key];
        $ChargeProduit->Qte=$request->input('Qte')[$key];
        $ChargeProduit->PrixUnit=$request->input('PU')[$key];
        $ChargeProduit->save();
      }
      return $this->ViewAll();
    }
    public function ViewPDF($id)
    {
      $this->viewFinance();
      $Fiche =FicheComptable::findOrFail($id);
      $pdf = PDF::loadView('Finance/FicheComptable/FicheComptablePDF',["Fiche"=>$Fiche]);
	     return $pdf->stream('FicheComptable_'.$Fiche->du.'_'.$Fiche->a.'.pdf');
      // return view("Finance/FicheComptable/FicheComptablePDF",["Fiche"=>$Fiche]);
    }
}
