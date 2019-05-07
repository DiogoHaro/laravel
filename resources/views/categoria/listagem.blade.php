@extends("principal")

@section("conteudo")
    <a href="/categorias/formulario" class="btn btn-primary">
        Cadastrar Nova Categoria
    </a>
    <hr>
    <h1>Listagem de Categorias</h1>
    <table class="table table-striped table-bordered table-hove">
        <th>Nome da Categoria</th>
        <th>Descrição</th>
        <th>Ações</th>
        @foreach ($categorias as $p)
        <tr>
            <td>{{$p->NomeCategoria}}</td>
            <td>{{$p->Descricao}}</td>
            <td>
                <a href="/categorias/alterar/formulario/{{$p->IDCategoria}}">
                    <i class="fas fa-search"></i>
                </a>
                <a href="/categorias/deletar/{{$p->IDCategoria}}">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
@stop