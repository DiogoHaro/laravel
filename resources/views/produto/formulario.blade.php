@extends("principal")

@section("conteudo")
<form method="POST" action="/produtos/gravar">
    @method('POST')
    @csrf
    <h1>Cadastro de Produtos</h1>
    <label for="nome">Nome do Produto:</label>
    <input type="text" name="nome" minlength="4">
    <br/>
    <label for="preco">Preço Unitário:</label>
    <input type="number" name="preco">
    <br>
    <label for="quantidade">Quantidade por Unidade:</label>
    <input type="number" name="quantidade">
    <br>
    <label for="estoque">Estoque</label>
    <input type="number" name="estoque">
    <br>
    <input type="submit" name="gravar">
    <input type="reset" name="limpar">
</form>
@stop