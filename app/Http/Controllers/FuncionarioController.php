<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FuncionarioController extends Controller
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
        $funcionarios = DB::select("select * from funcionarios");
        return view("funcionario.listagem")->withFuncionarios($funcionarios);
    }

    public function formulario() {
        return view("funcionario.formulario");
    }

    public function gravar(Request $request) {
        $maxid = DB::select("select max(IDFuncionario)+1 as proximo from funcionarios");
        //dd($maxid[0]->proximo);
        $nome = $request->input("nome");
        $sobrenome = $request->input("sobrenome");
        $dataNac = $request->input("data_nasci");
        $dataAdmissao = $request->input("data_admissao");
        $cidade = $request->input("cidade");
        $regiao = $request->input("regiao");
        DB::table('funcionarios')
        ->insertGetId(
            ['IDFuncionario'=> $maxid[0]->proximo,
            'Nome'=>$nome,
            'Sobrenome'=>$sobrenome,
            'Cidade' => $cidade,
            'Regiao' => $regiao,
            'DataNac' =>$dataNac,
            'DataAdmissao' =>$dataAdmissao]
        );
        return redirect('/funcionarios');
    }

    public function deletar(Request $request, $id) {
        DB::table('funcionarios')->where('IDFuncionario', '=', $id)->delete();
        return redirect('/funcionarios');
    }

    public function formularioAlterar(Request $request, $id) {
        $funcionarios = DB::table('funcionarios')
                        ->where('IDFuncionario', '=', $id)
                        ->get();
                        //dd($produto[0]);
        $funcionarios[0]->DataNac = Carbon::parse($funcionarios[0]->DataNac)->format('d/m/Y');
        $funcionarios[0]->DataAdmissao = Carbon::parse($funcionarios[0]->DataAdmissao)->format('d/m/Y');
        return view("funcionario.alterar")->withFuncionarios($funcionarios[0]);
    }

    public function alterar(Request $request, $id) {
        //dd($request->all());
        $nome = $request->input("nome");
        $sobrenome = $request->input("sobrenome");
        $dataNac = $request->input("data_nasci");
        $dataAdmissao = $request->input("data_admissao");
        $cidade = $request->input("cidade");
        $regiao = $request->input("regiao");
        DB::table('funcionarios')
            ->where('IDFuncionario', '=', $id)
            ->update([
            'Nome'=>$nome,
            'Sobrenome'=>$sobrenome,
            'Cidade' => $cidade,
            'Regiao' => $regiao,
            'DataNac' =>date('y/m/d',strtotime($dataNac)),
            'DataAdmissao' =>date('y/m/d',strtotime($dataAdmissao))]);
        
        return redirect('/funcionarios');
    }
}
