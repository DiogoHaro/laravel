@extends("principal")

@section("conteudo")
<form method="POST" action="/produtos/alterar/{{$produto->IDProduto}}">
    @method('POST')
    @csrf
    <label for="nome">Nome do Produto:</label>
    <input type="text" name="nome" value="{{$produto->NomeProduto}}" minlength="4">
    <br/>
    <label for="preco">Preço Unitário:</label>
    <input type="number" name="preco" value="{{$produto->PrecoUnitario}}">
    <br>
    <label for="quantidade">Quantidade por Unidade:</label>
    <input type="number" name="quantidade" value="{{$produto->QuantidadePorUnidade}}">
    <br>
    <label for="estoque">Estoque</label>
    <input type="number" name="estoque" value="{{$produto->UnidadesEmEstoque}}">
    <br>
    <input type="submit" name="gravar">
    <input type="reset" name="limpar">
</form>
@stop