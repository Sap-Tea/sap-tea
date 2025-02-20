<?php
/*
...
*/
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;




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
/*
  Route::get('/', function () {
    return "inicio";
}) 
*/
Route::get('/','PrincipalController@Principal');

Route::get('/Sobre-nos','SobreNosController@sobreNos');
    

Route::get('/contato', 'ContatoController@contato');

Route::get('/login', 'Authcontroller@showLoginForm')->name('login');

Route::get('/index', function () {
  return view('index');
})->name('index');
 
Route::get('/tabelas', function () {
  $tabelas = DB::select('SHOW TABLES');
  return response()->json($tabelas);
});
use App\Http\Controllers\SondagemController;

Route::get('/sondagem-inicial', [SondagemController::class, 'index'])->name('sondagem.inicial');


Route::get('/formulario', function () {
  return view('formulario');
})->name('formulario.view');

Route::post('/formulario-submit', function (Request $request) {
  // Processar os dados do formulário aqui
  return back()->with('success', 'Formulário enviado com sucesso!');
})->name('formulario.submit');

use App\Http\Controllers\SondagemInicialController;

Route::prefix('sondagem')->group(function () {
    Route::get('/inicial', [SondagemInicialController::class, 'inicial'])->name('sondagem.inicial');
    Route::get('/continuada1', [SondagemInicialController::class, 'continuada1'])->name('sondagem.continuada1');
    Route::get('/continuada2', [SondagemInicialController::class, 'continuada2'])->name('sondagem.continuada2');
    Route::get('/final', [SondagemInicialController::class, 'final'])->name('sondagem.final');
});

