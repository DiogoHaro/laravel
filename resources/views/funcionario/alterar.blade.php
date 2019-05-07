@extends("principal")

@section("conteudo")
<form method="POST" action="/funcionarios/alterar/{{$funcionarios->IDFuncionario}}">
    @method('POST')
    @csrf
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="{{$funcionarios->Nome}}">
    <br>
    <label for="sobrenome">Sobrenome</label>
    <input type="text" name="sobrenome" value="{{$funcionarios->Sobrenome}}">
    <br>
    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" value="{{$funcionarios->Cidade}}">
    <br>
    <label for="regiao">Regiao</label>
    <input type="text" name="regiao" value="{{$funcionarios->Regiao}}">
    <br>
    <label for="data_nasci">Data de Nascimento</label>
    <input type="text" name="data_nasci" value="{{$funcionarios->DataNac}}">
    <br>
    <label for="data_admissao">Data de Admissão</label>
    <input type="text" name="data_admissao" value="{{$funcionarios->DataAdmissao}}">
    <br>

    <input type="submit" name="gravar">
    <input type="reset" value='Cancelar'>
</form>
@stop