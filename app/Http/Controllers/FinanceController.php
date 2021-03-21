<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    public function index()
    {
        $this->authorize('viewFinance', Auth::user());
        return view("Finance/index");
    }
}
