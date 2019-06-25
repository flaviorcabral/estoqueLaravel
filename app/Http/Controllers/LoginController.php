<?php

namespace estoque\Http\Controllers;

//use Illuminate\Http\Request;

use estoque\Http\Controllers\Input;
use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;

use Request;
use Auth;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    $credenciais = $request::only('email', 'password');
    //$credenciais = Request::all();
    //var_dump($credenciais);
    if(Auth::attempt($credenciais)){
      return "Usuário" . Auth::user()->name ." Logado com Sucesso!";
    }

    return "As credenciais não são Válidas!";
  }
}
