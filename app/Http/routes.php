<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function(){
  return '<h1>Primeira Lógica  com Laravel</h1>';
});

Route::get('/outra', function(){
  return '<h2>Segunda Lógica com Laravel</h2>';
});

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos', [ //Criando apelido para rota
  'as' => 'listaProdutos',
  'uses' => 'ProdutoController@lista'
]);

Route::get('/produtos/json', 'ProdutoController@listaJson'); // Retorna formato JSON

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+');

Route::get('/produtos/editaForm/{id}', 'ProdutoController@editaForm')->where('id', '[0-9]+');

Route::post('/produtos/editar', 'ProdutoController@editar');

Route::get('home', 'HomeController@index');

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

Route::get('login', 'LoginController@login');
