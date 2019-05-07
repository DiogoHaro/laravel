<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/marcondes', function () {
    return "<h1>Funciona?</h1>";
});

//Produtos
Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/formulario', "ProdutoController@formulario");

Route::post("/produtos/gravar", "ProdutoController@gravar");

Route::get("/produtos/deletar/{id}", "ProdutoController@deletar");

Route::get("/produtos/alterar/formulario/{id}", "ProdutoController@formularioAlterar");
Route::post("/produtos/alterar/{id}", "ProdutoController@alterar");

//Categorias
Route::get('/categorias', 'CategoriaController@lista');

Route::get('/categorias/formulario', "CategoriaController@formulario");

Route::post("/categorias/gravar", "CategoriaController@gravar");

Route::get("/categorias/deletar/{id}", "CategoriaController@deletar");

Route::get("/categorias/alterar/formulario/{id}", "CategoriaController@formularioAlterar");
Route::post("/categorias/alterar/{id}", "CategoriaController@alterar");

//Clientes
Route::get('/clientes', 'ClienteController@lista');

Route::get('/clientes/formulario', "ClienteController@formulario");

Route::post("/clientes/gravar", "ClienteController@gravar");

Route::get("/clientes/deletar/{id}", "ClienteController@deletar");

Route::get("/clientes/alterar/formulario/{id}", "ClienteController@formularioAlterar");
Route::post("/clientes/alterar/{id}", "ClienteController@alterar");

//Funcionários
Route::get('/funcionarios', 'FuncionarioController@lista');

Route::get('/funcionarios/formulario', "FuncionarioController@formulario");

Route::post("/funcionarios/gravar", "FuncionarioController@gravar");

Route::get("/funcionarios/deletar/{id}", "FuncionarioController@deletar");

Route::get("/funcionarios/alterar/formulario/{id}", "FuncionarioController@formularioAlterar");
Route::post("/funcionarios/alterar/{id}", "FuncionarioController@alterar");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware('auth')->group(function() {
//     Route::get("/home3")->group(function() {
//         Route::get('/home2', 'HomeController@index')->name('home');
//     });
//     Route::get('/home2', 'HomeController@index')->name('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
