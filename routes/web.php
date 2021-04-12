<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitControle;
use App\Http\Controllers\EntrepriseControle;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\FicheComptableController;
use App\Http\Controllers\ChargeProduitContoller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProduitControle::class,"index"])->name('produitIndex');
Route::get('/Produit/create',[ProduitControle::class,"create"])->name('Produit.create');
Route::post('/Produit/store',[ProduitControle::class,"store"])->name('ProduitStore');
Route::get('/Produit/{id}/ViewEdit',[ProduitControle::class,"ViewEdit"])->name('Produit.ViewEdit');
Route::Put('/Produit/{id}/Edit',[ProduitControle::class,"Edit"])->name('Produit.Edit');
Route::get('/Produit/{id}/View',[ProduitControle::class,"View"])->name('ProduitView')->where("id","[0-9]+");
Route::get('/Produit/{id}/viewOperation',[ProduitControle::class,"viewOperation"])->name("viewOperation")->where("id","[0-9]+");
Route::put('/Produit/{id}',[ProduitControle::class,"Operation"])->name("ProduitOperation")->where("id","[0-9]+");
Route::delete('/Produit/{id}',[ProduitControle::class,"destroy"])->name('Produit.destroy')->where("id","[0-9]+");

Auth::routes();

Route::get('/ListEntreprise',[EntrepriseControle::class,"ListEntreprise"])->name('ListEntreprise');
Route::post('/SelectEntreprise',[EntrepriseControle::class,"select"])->name('SelectEntreprise');
Route::get('/Entreprise',[EntrepriseControle::class,"index"])->name('EntrepriseIndex');
Route::get('/Entreprise/create',[EntrepriseControle::class,"create"])->name('EntrepriseCreate');
Route::post('/Entreprise/store',[EntrepriseControle::class,"store"])->name('EntrepriseStore');

Route::get('/Entreprise/{id}/viewEdit',[EntrepriseControle::class,"viewEdit"])->name('Entreprise.viewEdit');
Route::Put('/Entreprise/{id}/Edit',[EntrepriseControle::class,"Edit"])->name('EntrepriseEdit');

Route::get('/Entreprise/{id}/ViewAutorisation',[EntrepriseControle::class,"ViewAutorisation"])->name('ViewAutorisation');
Route::post('/Entreprise/AddAutorisation',[EntrepriseControle::class,"AddAutorisation"])->name('AddAutorisation');
Route::post('/Entreprise/UpdateAutorisation',[EntrepriseControle::class,"UpdateAutorisation"])->name('UpdateAutorisation');

Route::delete('/Entreprise/{id}',[EntrepriseControle::class,"destroy"])->name('Entreprise.destroy')->where("id","[0-9]+");

Route::delete('/Entreprise/{entreprise_id}/DeleteAutorisation',[EntrepriseControle::class,"DeleteAutorisation"])->name('DeleteAutorisation');

Route::get("/Budget",[BudgetController::class,"index"])->name("Budget.index");
Route::get("/BudgetADD",[BudgetController::class,"ADD"])->name("Budget.ADD");
Route::post("/BudgetADD/storeBudget",[BudgetController::class,"storeBudget"])->name("Budget.storeBudget");

Route::get("/BudgetADD/ViewBudgetPDF/{type}",[BudgetController::class,"ViewBudgetPDF"])->name("Budget.ViewBudgetPDF");

Route::get("/FicheComptable",[FicheComptableController::class,"FicheADD"])->name('FicheComptable.FicheADD');
Route::post("/FicheComptableInsert",[FicheComptableController::class,"insert"])->name('FicheComptable.insert');
Route::get("/FicheComptableViewAll",[FicheComptableController::class,"ViewAll"])->name('FicheComptable.ViewAll');

Route::get("/FicheComptableViewPDF/{id}",[FicheComptableController::class,"ViewPDF"])->name('FicheComptable.ViewPDF');
Route::get("/FicheComptable/{ficheComptable}",[FicheComptableController::class,"FicheOperation"])->name('FicheComptable.FicheOperation');

Route::post("/ChargeProduit/ADDLIST/{id}",[ChargeProduitContoller::class,"AddList"])->name('ChargeProduit.AddList');
