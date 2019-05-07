@extends("principal")

@section("conteudo")
<form method="POST" action="/clientes/gravar">
    @method('POST')
    @csrf
    <h1>Cadastro de Categorias</h1>
    <label for="nome">Nome da Companhia:</label>
    <input type="text" name="nome">
    <br/>
    <label for="nome_contato">Nome do Contato:</label>
    <input type="text" name="nome_contato">
    <br>
    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade">
    <br>
    <label for="regiao">Regiao:</label>
    <input type="text" name="regiao">
    <br>
    <input type="submit" name="gravar">
    <input type="reset" name="limpar">
</form>
@stop