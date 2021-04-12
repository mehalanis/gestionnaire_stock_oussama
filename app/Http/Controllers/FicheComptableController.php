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
    return view("Finance/FicheComptable/FicheADDN");
  }
  public function FicheOperation($ficheComptable){
   // $List=FicheComptable::find($ficheComptable);
    return view("Finance/FicheComptable/FicheOperation",['idficheComptable'=>$ficheComptable]);
  }
  public function ViewAll()
  {
    $this->viewFinance();
    $List=FicheComptable::where("entreprise_id","=",session()->get('entreprise_id'))->orderBy('fichecomptable.created_at','desc')->paginate(10,["id","NomSociete","du","a"]);
    return view("Finance/FicheComptable/FicheView",['listFiche'=>$List]);
  }
    public function insert(Request $request)
    {
      $this->viewFinance();
      $validator = Validator::make($request->all(), [
        'NomSociete' => 'required|string',
        'Email'=>"required|string",
        "du"=>"required|before_or_equal:".$request->input('a')

      ]);
      if ($validator->fails()) {
        return Redirect::back()->withErrors($validator)->withInput();
      }
      $Fiche=new FicheComptable();
      $Fiche->entreprise_id=session()->get('entreprise_id');
      $Fiche->NomSociete=$request->input('NomSociete');
      $Fiche->Email=$request->input('Email');
      $Fiche->du=$request->input('du');
      $Fiche->a=$request->input('a');
      $Fiche->save();
      return $this->ViewAll();
    }
    public function ViewPDF($id)
    {
      $this->viewFinance();
      $Fiche =FicheComptable::findOrFail($id);
      $pdf = PDF::loadView('Finance/FicheComptable/FicheComptablePDF',["Fiche"=>$Fiche]);
	    return $pdf->stream('FicheComptable_'.$Fiche->du->format('d/m/Y').'_'.$Fiche->a->format('d/m/Y').'.pdf');
       return view("Finance/FicheComptable/FicheComptablePDF",["Fiche"=>$Fiche]);
    }
}
