<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlansController;
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

Auth::routes();

Route::get('/dashboard',[HomeController::class , 'index'])->name('dashboard');

Route::get('/', [PlansController::class, 'index'])->name('home');
Route::get('/plans_form',[PlansController::class, 'PlansFormsGet'])->name('Plans.Forms.get'); 
Route::post('/plans_form',[PlansController::class, 'PlansFormsPost'])->name('Plans.Forms.post'); 
Route::get('/beneficiario_form',[PlansController::class, 'BeneficiarioFormsGet'])->name('Beneficiario.Forms.get'); 
Route::post('/beneficiario_form',[PlansController::class, 'BeneficiarioFormsPost'])->name('Beneficiario.Forms.post'); 
Route::get('/Orcamento_form',[PlansController::class, 'OrcamentoFormsGet'])->name('Orcamento.Forms.get'); 
Route::post('/Orcamento_form',[PlansController::class, 'OrcamentoFormsPost'])->name('Orcamento.Forms.post'); 