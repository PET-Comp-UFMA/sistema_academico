<h1>Excluir Escola</h1>
<form method="POST" action="/excluir-escola/{{$school->id}}">
    @csrf
    @method('DELETE')
    <p>Digite nome da escola para confirmar exclusão: {{$school->nome}}</p>
    <input type="text" name="nome">
    <button type="submit">Excluir</button>
</form>