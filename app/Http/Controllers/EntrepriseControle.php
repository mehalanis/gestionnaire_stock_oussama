<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entreprise;
use App\User;
use App\entreprise_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class EntrepriseControle extends Controller
{
    public function __construct(){
      $this->middleware('auth');

    }
    public function ListEntreprise(){
      $entreprise=Auth::user()->Entreprise;
      if($entreprise->count()==1){
        session()->put('entreprise_id',$entreprise[0]->id);
        session()->put('entreprise_nom',$entreprise[0]->nom);
        return redirect()->route('produitIndex');
      }else{
        if($entreprise->count()>0){
          return view('Entreprise/Select',["entreprises"=>$entreprise]);
        }else{
          abort(403);
        }
      }
    }
    public function select(Request $request){
      $entreprise=Entreprise::findOrFail($request->input('Entreprise_id'));
      session()->put('entreprise_id',$entreprise->id);
      session()->put('entreprise_nom',$entreprise->nom);
      return redirect('/');
    }
    public function index(){
      $this->authorize('view', Auth::user());
      $Entreprise=Entreprise::paginate(10);
      return view('Entreprise/Entreprise',['Entreprises'=>$Entreprise]);
    }
    public function create(){
      $this->authorize('view', Auth::user());
      return view('Entreprise/EntrepriseAdd');
    }

    public function store(Request $request){
      $this->authorize('view', Auth::user());
      $entreprise=new Entreprise();
      $entreprise->nom=$request->input("nom");
      $entreprise->save();
      $list_user=User::where("admin","=","1")->get();
      foreach($list_user as $user){
        $entreprise_user =new entreprise_user();
        $entreprise_user->entreprise_id = $entreprise->id;
        $entreprise_user->user_id=$user->id;
        $entreprise_user->save();
      }
      return redirect('/Entreprise');
    }
    public function viewEdit($id){
      $entreprise=Entreprise::findOrFail($id);
      return view('Entreprise/EntrepriseEdit',$entreprise);
    }
    public function Edit(Request $request,$id){
      $entreprise=Entreprise::findOrFail($id);
      $entreprise->nom=$request->input("nom");
      $entreprise->save();
      return redirect('/Entreprise');
    }

    public function ViewAutorisation($id){ //entreprise id
        $this->authorize('view', Auth::user());
        $users = DB::table('users')->join('entreprise_user','users.id', '=', 'entreprise_user.user_id')->where("entreprise_id","=",$id)->select("id","name","admin",'produit',"finance")->get();
        return view('Entreprise/ViewAutorisation',["list_user"=>User::all(),"list_user_auto"=>$users,"entreprise_id"=>$id]);
    }
    public function UpdateAutorisation(Request $request)
    {
      $entreprise_user=entreprise_user::where([['entreprise_id', '=', $request->input("entreprise_id")]
      ,['user_id', '=', $request->input("user_id")]])->update(array("produit"=>($request->input("produit")==null)? 0 : 1,'finance'=>($request->input("finance")==null)? 0 : 1));
      return redirect('/Entreprise/'.$request->input("entreprise_id").'/ViewAutorisation?page');
    }

    public function AddAutorisation(Request $request){
        $this->authorize('view', Auth::user());
        if(!entreprise_user::where([['entreprise_id', '=', $request->input("entreprise_id")]
        ,['user_id', '=', $request->input("user_id_auto")]])->first()){
          $entreprise_user=new entreprise_user();
          $entreprise_user->entreprise_id =$request->input("entreprise_id");
          $entreprise_user->user_id =$request->input("user_id_auto");
          $entreprise_user->produit= ($request->input("produit")==null)? 0 : 1;
          $entreprise_user->finance= ($request->input("finance")==null)? 0 : 1;
          $entreprise_user->save();
        }
        return redirect('/Entreprise/'.$request->input("entreprise_id").'/ViewAutorisation?page');
    }
    public function DeleteAutorisation(Request $request,$entreprise_id){
      $this->authorize('view', Auth::user());
      $result=entreprise_user::where([['entreprise_id', '=', $entreprise_id],['user_id', '=', $request->input("user_id_delete")]])->delete();;
      return redirect('/Entreprise/'.$entreprise_id.'/ViewAutorisation?page');
    }
    public function destroy($id){
      $entreprise=Entreprise::findOrFail($id);
      $this->authorize('delete', $entreprise);
      $entreprise->delete();
      return redirect('/Entreprise');
    }
}
