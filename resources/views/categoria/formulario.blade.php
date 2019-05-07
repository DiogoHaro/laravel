@extends("principal")

@section("conteudo")
<form method="POST" action="/categorias/gravar">
    @method('POST')
    @csrf
    <h1>Cadastro de Categorias</h1>
    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome">
    <br/>
    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao">
    <br>
    <input type="submit" name="gravar">
    <input type="reset" name="limpar">
</form>
@stop