@extends("principal")

@section("conteudo")
<form method="POST" action="/categorias/alterar/{{$categoria->IDCategoria}}">
    @method('POST')
    @csrf
    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome" value="{{$categoria->NomeCategoria}}">
    <br/>
    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" value="{{$categoria->Descricao}}">
    <br>
    <input type="submit" name="gravar">
    <input type="reset" name="limpar">
</form>
@stop