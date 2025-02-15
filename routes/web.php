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
 
