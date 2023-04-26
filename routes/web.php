<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovimentoEstoqueController;
use App\Http\Controllers\MovimentoFinanceiroController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\Relatorio\SaldoEmpresa;
use App\Http\Controllers\Selects\EmpresaNomeTipo;
use App\Http\Controllers\Selects\ProdutoPorNome;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/empresas', EmpresaController::class);
    Route::resource('/produtos', ProdutosController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/movimentos_financeiros', MovimentoFinanceiroController::class)->except([
        'edit', 'update'
    ]);
    Route::post('/empresas/buscar-por/nome', EmpresaNomeTipo::class);
    Route::get('/empresas/relatorio/saldo/{empresa}', SaldoEmpresa::class)->name('empresas.relatorios.saldo');

    Route::delete('/movimento_estoque/{id}', [MovimentoEstoqueController::class, 'destroy'])->name('movimentos_estoque.destroy');
    Route::post('/movimentos_estoque', [MovimentoEstoqueController::class, 'store'])->name('movimentos_estoque.store');
    Route::post('/produtos/buscar-por/nome', ProdutoPorNome::class);

});




