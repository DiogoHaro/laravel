@extends("principal")

@section("conteudo")
<form method="POST" action="/clientes/alterar/{{$clientes->IDCliente}}">
    @method('POST')
    @csrf
    <label for="nome">Nome da Companhia</label>
    <input type="text" name="nome" value="{{$clientes->NomeCompanhia}}">
    <br>
    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" value="{{$clientes->Cidade}}">
    <br>
    <label for="regiao">Regiao</label>
    <input type="text" name="regiao" value="{{$clientes->Regiao}}">
    <br>
    <label for="nome_contato">Nome de Contato</label>
    <input type="text" name="nome_contato" value="{{$clientes->NomeContato}}">
    <br>

    <input type="submit" name="gravar">
</form>
@stop