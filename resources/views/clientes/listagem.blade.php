@extends("principal")

@section("conteudo")
    <a href="/clientes/formulario" class="btn btn-primary">
        Cadastrar Novos Clientes
    </a>
    <hr>
    <h1>Listagem de Clientes</h1>
    <table class="table table-striped table-bordered table-hove">
        <th>Nome da Companhia</th>
        <th>Nome de Contato</th>
        <th>Cidade</th>
        <th>Região</th>
        <th>Ações</th>
        @foreach ($clientes as $p)
        <tr>
            <td>{{$p->NomeCompanhia}}</td>
            <td>{{$p->NomeContato}}</td>
            <td>{{$p->Cidade}}</td>
            <td>{{$p->Regiao}}</td>
            <td>
                <a href="/clientes/alterar/formulario/{{$p->IDCliente}}">
                    <i class="fas fa-search"></i>
                </a>
                <a href="/clientes/deletar/{{$p->IDCliente}}">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
@stop