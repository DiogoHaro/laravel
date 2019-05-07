@extends("principal")

@section("conteudo")
<form method="POST" action="/funcionarios/gravar">
    @method('POST')
    @csrf
    <h1>Cadastro de Funcinários</h1>
    <label for="nome">Nome</label>
    <input type="text" name="nome">
    <br>
    <label for="sobrenome">Sobrenome</label>
    <input type="text" name="sobrenome" >
    <br>
    <label for="cidade">Cidade</label>
    <input type="text" name="cidade">
    <br>
    <label for="regiao">Regiao</label>
    <input type="text" name="regiao">
    <br>
    <label for="data_nasci">Data de Nascimento</label>
    <input type="date" name="data_nasci" >
    <br>
    <label for="data_admissao">Data de Admissão</label>
    <input type="date" name="data_admissao" >
    <br>
    <input type="submit" name="gravar">
    <input type="reset" name="limpar">
</form>
@stop