<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
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
        $categorias = DB::select("select * from categorias");
        return view("categoria.listagem")->withCategorias($categorias);
    }

    public function formulario() {
        return view("categoria.formulario");
    }

    public function gravar(Request $request) {
        $maxid = DB::select("select max(IDCategoria)+1 as proximo from categorias");
        //dd($maxid[0]->proximo);
        $nome = $request->input("nome");
        $descricao = $request->input("descricao");
        DB::table('categorias')
        ->insertGetId(
            ['IDCategoria'=> $maxid[0]->proximo,
            'NomeCategoria'=>$nome,
            'Descricao'=>$descricao]
        );
        return redirect('/categorias');
    }

    public function deletar(Request $request, $id) {
        DB::table('categorias')->where('IDCategoria', '=', $id)->delete();
        return redirect('/categorias');
    }

    public function formularioAlterar(Request $request, $id) {
        $categoria = DB::table('categorias')
                        ->where('IDCategoria', '=', $id)
                        ->get();
                        //dd($produto[0]);
        return view("categoria.alterar")->withCategoria($categoria[0]);
    }

    public function alterar(Request $request, $id) {
        //dd($request->all());
        $nome = $request->input("nome");
        $descricao = $request->input("descricao");
        DB::table('categorias')
            ->where('IDCategoria', '=', $id)
            ->update(['NomeCategoria' => $nome,
                      'Descricao'=>$descricao]);
        
        return redirect('/categorias');
    }
}
