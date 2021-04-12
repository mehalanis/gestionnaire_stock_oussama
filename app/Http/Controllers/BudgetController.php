<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepensesRevenus;
use App\User;
use App\Entreprise;
use Illuminate\Support\Facades\Auth;
use PDF;

class BudgetController extends Controller
{
  public function viewFinance()
  {
    $this->authorize('viewFinance', Auth::user());
  }
  public function __construct(){
    $this->middleware('auth');
  }
  public function index()
  {
    $this->viewFinance();
    $entreprise=Entreprise::findOrFail(session()->get('entreprise_id'));

    return view("Finance/Budget/BudgetView",['Depenses'=>$entreprise->Depenses,'Revenus'=>$entreprise->Revenus
                    ,"DepensesList"=>$entreprise->Depenses(),'RevenusList'=>$entreprise->Revenus()]);
  }
  public function ADD()
  {
    $this->viewFinance();
    return view("Finance/Budget/BudgetAjouter");
  }
  public function storeBudget(Request $request) {
    $this->viewFinance();

    $DepensesRevenu =new DepensesRevenus();
    $DepensesRevenu->entreprise_id=session()->get('entreprise_id');
    $DepensesRevenu->type=$request->input("Type");
    $DepensesRevenu->Poste=$request->input("Poste");
    $DepensesRevenu->Montant=$request->input("Montant");
    $DepensesRevenu->save();
    $entreprise=Entreprise::findOrFail(session()->get('entreprise_id'));
    switch ($DepensesRevenu->type) {
      case '1':
        $entreprise->Depenses+=$request->input("Montant");
      break;
      case '2':
          $entreprise->Revenus+=$request->input("Montant");
      break;
    }
    $entreprise->save();

    return redirect("Budget");
  }
  public function ViewBudgetPDF($type)
  {
    $nomBudget=($type==1)?"Dépenses":"Revenus";
    $this->viewFinance();
    $Fiche =DepensesRevenus::where([["type","=",$type],["entreprise_id",'=',session()->get('entreprise_id')]])->get();
    $entreprise=Entreprise::findOrFail(session()->get('entreprise_id'));
    $pdf = PDF::loadView('Finance/Budget/BudgetPDF',["Fiche"=>$Fiche,"nomBudget"=>$nomBudget,"entreprise"=>$entreprise]);
     return $pdf->stream($nomBudget.'.pdf');
  }
}
