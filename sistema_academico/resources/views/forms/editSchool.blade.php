<h1>Cadastrar escola</h1>
<form method="POST" action="/atualizar-escola/{{$school->id}}">
    @csrf
    <input type="text" value="{{$school->nome}}" name="nome" id="">
    <input type="text" value="{{$school->endereco}}" name="endereco" id="">
    <button type="submit">Editar</button>
</form>