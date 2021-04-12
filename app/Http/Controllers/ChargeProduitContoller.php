<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\ChargeProduit;

class ChargeProduitContoller extends Controller
{
    public function AddList(Request $request,$id){
        $validator = Validator::make($request->all(), [
            "Designation.*" =>'required|string',
            "Qte.*"=>'required|numeric',
            "PU.*"=>'required|numeric'
          ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        foreach ($request->input('Designation') as $key => $Designation) {
            $ChargeProduit=new ChargeProduit();
            $ChargeProduit->fiche_comptable_id=$id;
            $ChargeProduit->Designation=$request->input('Designation')[$key];
            $ChargeProduit->Qte=$request->input('Qte')[$key];
            $ChargeProduit->PrixUnit=$request->input('PU')[$key];
            $ChargeProduit->save();
        }
        session()->flash('Mode',"success");
        session()->flash('message',"Vous avez ajouté Produits avec succès ");
        return redirect()->back();
    }
}
