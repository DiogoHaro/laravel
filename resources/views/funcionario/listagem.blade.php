@extends("principal")

@section("conteudo")
    <a href="/funcionarios/formulario" class="btn btn-primary">
        Cadastrar Novos Funcionarios
    </a>
    <hr>
    <h1>Listagem de Funcinários</h1>
    <table class="table table-striped table-bordered table-hove">
        <th>Nome do Funcinário</th>
        <th>Data de Nascimento</th>
        <th>Data de Admissão</th>
        <th>Cidade</th>
        <th>Região</th>
        <th>Ações</th>
        @foreach ($funcionarios as $p)
        <tr>
            <td>{{$p->Nome}} {{$p->Sobrenome}}</td>
            <td>{{$p->DataNac}}</td>
            <td>{{$p->DataAdmissao}}</td>
            <td>{{$p->Cidade}}</td>
            <td>{{$p->Regiao}}</td>
            <td>
                <a href="/funcionarios/alterar/formulario/{{$p->IDFuncionario}}">
                    <i class="fas fa-search"></i>
                </a>
                <a href="/funcionarios/deletar/{{$p->IDFuncionario}}">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
@stop