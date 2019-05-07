<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function lista() {
        $produtos = DB::select("select * from produtos");
        return view("produto.listagem")->withProdutos($produtos);
    }

    public function formulario() {
        return view("produto.formulario");
    }

    public function gravar(Request $request) {
        $maxid = DB::select("select max(IDProduto)+1 as proximo from produtos");
        //dd($maxid[0]->proximo);
        $nome = $request->input("nome");
        $preco = $request->input("preco");
        $quanti = $request->input("quantidade");
        $estoque = $request->input("estoque");
        DB::table('produtos')
        ->insertGetId(
            ['IDProduto'=> $maxid[0]->proximo,
            'NomeProduto'=>$nome,
            'PrecoUnitario'=>$preco,
            'QuantidadePorUnidade'=>$quanti,
            'UnidadesEmEstoque'=>$estoque]
        );
        return redirect('/produtos');
    }

    public function deletar(Request $request, $id) {
        DB::table('produtos')->where('IDProduto', '=', $id)->delete();
        return redirect('/produtos');
    }

    public function formularioAlterar(Request $request, $id) {
        $produto = DB::table('produtos')
                        ->where('IDProduto', '=', $id)
                        ->get();
                        //dd($produto[0]);
        return view("produto.alterar")->withProduto($produto[0]);
    }

    public function alterar(Request $request, $id) {
        //dd($request->all());
        $nome = $request->input("nome");
        $preco = $request->input("preco");
        $quanti = $request->input("quantidade");
        $estoque = $request->input("estoque");
        DB::table('produtos')
            ->where('IDProduto', '=', $id)
            ->update(['NomeProduto' => $nome,
                      'PrecoUnitario'=>$preco,
                      'QuantidadePorUnidade'=>$quanti,
                      'UnidadesEmEstoque'=>$estoque]);
        
        return redirect('/produtos');
    }
}
