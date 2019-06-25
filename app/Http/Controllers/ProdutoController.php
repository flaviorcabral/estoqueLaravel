<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;
use estoque\Http\Requests\ProdutosRequest;
/**
 *
 */
class ProdutoController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', ['only' => ['novo', 'remove']]);
    }

    public function lista()
    {
      //$produtos = DB::select('select * from produtos');
      $produtos = Produto::all(); //Utilizando o ORM Eloquent

      if(view( )->exists('produto.listagem'))
      {
        return view('produto.listagem')->with('produtos', $produtos);
      }
    }

    public function listaJson()
    {
      //$produtos = DB::select('select * from produtos');
      $produtos = Produto::all(); //Utilizando o ORM Eloquent

      if(view( )->exists('produto.listagem'))
      {
        //return $produtos;
        return response()->json($produtos);
      }
    }

    public function mostra($id) //recebe automaticamente a variavel e a inseri na consulta SQL
    {
      //$id = Request::Route('id');
      //$resposta = DB::select('select * from produtos where id = ?', [$id]);
      $resposta = Produto::find($id);//Utilizando o ORM Eloquent

      if(empty($resposta))
      {
        return 'Esse produto não existe"';
      }

      return view( 'produto.detalhes')->with('produto', $resposta);
    }

    public function novo()
    {
      return view('produto.formulario');
    }

    public function adiciona(ProdutosRequest $request)
    {
      //$valores = Request::all(); Passo 1
      //$produto = new Produto($valores); Passo 2

      //Produto::create(Request::all());
        Produto::create($request->all());

      //$produto->nome = Request::input('nome');
      //$produto->descricao = Request::input('descricao');
      //$produto->valor = Request::input('valor');
      //$produto->quantidade = Request::input('quantidade');

      //$produto->save(); //Utilizando o ORM Eloquent Passo 3

      //DB::insert('insert into produtos (nome, descricao, valor, quantidade) values (?,?,?,?)',
      //array($nome, $descricao, $valor, $quantidade));

      //return implode(',', array($nome, $descricao, $valor, $quantidade)); Exibe na tela os valores da requisição
      //return view('produto.adicionado')->with('nome', $nome);
      // return redirect( '/produtos')->withInput(); Redireciona para outra URI todos os valores da reuisição anterior
      //return redirect( '/produtos')->withInput(Request::only('nome')); //Retorna apenas o valor
      // return redirect( '/produtos')->withInput(Request::except('valor')); //Retorna apenas os valores exceto valor
      return redirect()->action('ProdutoController@lista')->withInput(request::only('nome'));// Redireciona para o meotodo nao pra uma URI
      //return redirect()-route('listaProdutos');
    }

    public function remove($id)
    {
      $produto = Produto::find($id);
      $produto->delete();

      return redirect()->action('ProdutoController@lista');
    }

    public function editaForm($id)
    {
      $produto = Produto::find($id);
      return view('produto.formulario')->with('produto', $produto);
    }

    public function editar()
    {
      //$params = Request::all();
      $produto = Produto::find(Request::input('id'));

      $produto->nome = Request::input('nome');
      $produto->descricao = Request::input('descricao');
      $produto->valor = Request::input('valor');
      $produto->quantidade = Request::input('quantidade');

      $produto->save(); //Utilizando o ORM Eloquent Passo 3

      return redirect()->action('ProdutoController@lista')->withInput(request::only('nome'));
    }
}

 ?>
