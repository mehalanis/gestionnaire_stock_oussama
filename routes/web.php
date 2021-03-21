<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/',"ProduitControle@index")->name('produitIndex');
Route::get('/Produit/create','ProduitControle@create')->name('Produit.create');
Route::post('/Produit/store',"ProduitControle@store")->name('ProduitStore');
Route::get('/Produit/{id}/ViewEdit','ProduitControle@ViewEdit')->name('Produit.ViewEdit');
Route::Put('/Produit/{id}/Edit','ProduitControle@Edit')->name('Produit.Edit');
Route::get('/Produit/{id}/View','ProduitControle@View')->name('ProduitView')->where("id","[0-9]+");
Route::get('/Produit/{id}/viewOperation',"ProduitControle@viewOperation")->name("viewOperation")->where("id","[0-9]+");
Route::put('/Produit/{id}',"ProduitControle@Operation")->name("ProduitOperation")->where("id","[0-9]+");
Route::delete('/Produit/{id}',"ProduitControle@destroy")->name('Produit.destroy')->where("id","[0-9]+");

Auth::routes();

Route::get('/ListEntreprise','EntrepriseControle@ListEntreprise')->name('ListEntreprise');
Route::post('/SelectEntreprise','EntrepriseControle@select')->name('SelectEntreprise');
Route::get('/Entreprise',"EntrepriseControle@index")->name('EntrepriseIndex');
Route::get('/Entreprise/create','EntrepriseControle@create')->name('EntrepriseCreate');
Route::post('/Entreprise/store',"EntrepriseControle@store")->name('EntrepriseStore');

Route::get('/Entreprise/{id}/viewEdit','EntrepriseControle@viewEdit')->name('Entreprise.viewEdit');
Route::Put('/Entreprise/{id}/Edit','EntrepriseControle@Edit')->name('EntrepriseEdit');

Route::get('/Entreprise/{id}/ViewAutorisation',"EntrepriseControle@ViewAutorisation")->name('ViewAutorisation');
Route::post('/Entreprise/AddAutorisation',"EntrepriseControle@AddAutorisation")->name('AddAutorisation');
Route::post('/Entreprise/UpdateAutorisation',"EntrepriseControle@UpdateAutorisation")->name('UpdateAutorisation');

Route::delete('/Entreprise/{id}',"EntrepriseControle@destroy")->name('Entreprise.destroy')->where("id","[0-9]+");

Route::delete('/Entreprise/{entreprise_id}/DeleteAutorisation',"EntrepriseControle@DeleteAutorisation")->name('DeleteAutorisation');

Route::get("/Finance","FinanceController@index")->name("Finance.inedx");

Route::get("/Budget","BudgetController@index")->name("Budget.index");
Route::get("/BudgetADD","BudgetController@ADD")->name("Budget.ADD");
Route::post("/BudgetADD/storeBudget","BudgetController@storeBudget")->name("Budget.storeBudget");

Route::get("/BudgetADD/ViewBudgetPDF/{type}","BudgetController@ViewBudgetPDF")->name("Budget.ViewBudgetPDF");

Route::get("/FicheComptable","FicheComptableController@FicheADD")->name('FicheComptable.FicheADD');
Route::post("/FicheComptableInsert","FicheComptableController@insert")->name('FicheComptable.insert');
Route::get("/FicheComptableViewAll","FicheComptableController@ViewAll")->name('FicheComptable.ViewAll');

Route::get("/FicheComptableViewPDF/{id}","FicheComptableController@ViewPDF")->name('FicheComptable.ViewPDF');
