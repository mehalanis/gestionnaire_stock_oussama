<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Produit;
use App\Operation;
use App\operation_produit;
use App\entreprise_user;
use App\Entreprise;

use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProduitControle extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index(){
    if(!session()->exists("entreprise_id")){
      return redirect()->route('ListEntreprise');
    }
    $this->authorize('viewProduit', Auth::user());
    $Entreprise=Entreprise::findOrFail(session()->get('entreprise_id'));
    $Produit=$Entreprise->Produit();
    return view('Produit/Produit',['listProduit'=>$Produit]);
  }
  public function create(){
    $this->authorize('viewProduit', Auth::user());
    return view('Produit/AddProduit');
  }
  public function store(Request $request){
    $this->authorize('viewProduit', Auth::user());
    $Produit=new Produit();
    $this->authorize('create', $Produit);
    $Produit->nom=$request->input("nom");
    $Produit->entreprise_id =session()->get('entreprise_id');
    $Produit->save();
    return redirect('/');
  }
  public function ViewEdit($id){
    $this->authorize('viewProduit', Auth::user());
    $Produit=Produit::findOrFail($id);
    $this->authorize('update', $Produit);
    return view('Produit/ProduitEdit',$Produit);
  }
  public function Edit(Request $request,$id){
    $this->authorize('viewProduit', Auth::user());
    $Produit=Produit::findOrFail($id);
    $this->authorize('update', $Produit);
    $Produit->nom=$request->input("nom");
    $Produit->stock=$request->input("stock");
    $Produit->sortie=$request->input("sortie");
    $Produit->vendu=$request->input("vendu");
    $Produit->retoure=$request->input("retoure");
    $Produit->entreprise_id =session()->get('entreprise_id');
    $Produit->save();
    return redirect('/');
  }
  public function View($id){
    $this->authorize('viewProduit', Auth::user());
    $Produit=Produit::findOrFail($id);
    $this->authorize('view', $Produit);
    return view('Produit/ViewProduit',['Produit'=>$Produit]);
  }
  public function viewOperation($id){
    $this->authorize('viewProduit', Auth::user());

    $Produit =Produit::findOrFail($id);
    $this->authorize('view', $Produit);
    $Operation = Operation::all();
    return view('Produit/OperationProduit',['produit'=>$Produit,'operations'=>$Operation]);
  }
  public function Operation(Request $request,$id){
    $this->authorize('viewProduit', Auth::user());

    $Produit =Produit::findOrFail($id);
    switch($request->input("Operation")){
      case '1': // stock
      $validator = Validator::make($request->all(), [
        'quantite' => 'required|numeric|min:1'
      ]);
      if ($validator->fails()) {
        return Redirect::back()->withErrors($validator)->withInput();
      }else{
        $Produit->stock+=$request->input("quantite");
      }
      break;
      case '2': //sortie
      $validator = Validator::make($request->all(), [
        'quantite' => 'required|numeric|min:1|max:'.$Produit->stock
      ]);
      if ($validator->fails()) {
        return Redirect::back()->withErrors($validator)->withInput();
      }else{
        $Produit->stock-=$request->input("quantite");
        $Produit->sortie+=$request->input("quantite");
      }
      break;
      case '3': //vendue
      $validator = Validator::make($request->all(), [
        'quantite' => 'required|numeric|min:1|max:'.$Produit->sortie
      ]);
      if ($validator->fails()) {
        return Redirect::back()->withErrors($validator)->withInput();
      }else{
        $Produit->sortie-=$request->input("quantite");
        $Produit->vendu+=$request->input("quantite");
      }
      break;
      case '4': //retoure
      $validator = Validator::make($request->all(), [
        'quantite' => 'required|numeric|min:1|max:'.$Produit->sortie
      ]);
      if ($validator->fails()) {
        return Redirect::back()->withErrors($validator)->withInput();
      }else{
        $Produit->sortie-=$request->input("quantite");
        $Produit->stock+=$request->input("quantite");
        $Produit->retoure+=$request->input("quantite");
      }
      break;
    }
    $Produit->save();
    $commande=new operation_produit();
    $commande->produit_id=$id;
    $commande->Operation_id=$request->input("Operation");
    $commande->Qte=$request->input("quantite");
    $commande->save();
    return redirect('/');
  }
  public function destroy($id){
    $this->authorize('viewProduit', Auth::user());
    $Produit =Produit::findOrFail($id);
    $this->authorize('delete', $Produit);
    $Produit->delete();
    return redirect('/');
  }

}
