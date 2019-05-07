<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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
        $clientes = DB::select("select * from clientes");
        return view("clientes.listagem")->withClientes($clientes);
    }

    public function formulario() {
        return view("clientes.formulario");
    }

    public function gravar(Request $request) {
        
        //dd($maxid[0]->proximo);
        $nome = $request->input("nome");
        $nome_contato = $request->input("nome_contato");
        $cidade = $request->input("cidade");
        $regiao = $request->input("regiao");
        DB::table('clientes')
        ->insertGetId(
            ['IDCliente'=> substr(md5($nome),0,4),
            'NomeCompanhia'=>$nome,
            'NomeContato'=>$nome_contato,
            'Cidade' => $cidade,
            'Regiao' => $regiao]
        );
        return redirect('/clientes');
    }

    public function deletar(Request $request, $id) {
        DB::table('clientes')->where('IDCliente', '=', $id)->delete();
        return redirect('/clientes');
    }

    public function formularioAlterar(Request $request, $id) {
        $clientes = DB::table('clientes')
                        ->where('IDCliente', '=', $id)
                        ->get();
                        //dd($produto[0]);
        return view("clientes.alterar")->withClientes($clientes[0]);
    }

    public function alterar(Request $request, $id) {
        //dd($request->all());
        $nome = $request->input("nome");
        $regiao = $request->input("regiao");
        $cidade = $request->input("cidade");
        $nome_contato = $request->input("nome_contato");
        DB::table('clientes')
            ->where('IDCliente', '=', $id)
            ->update(['NomeCompanhia' => $nome,
                      'Regiao' => $regiao,
                      'Cidade' => $cidade,
                      'NomeContato' => $nome_contato]);
        
        return redirect('/clientes');
    }
}
