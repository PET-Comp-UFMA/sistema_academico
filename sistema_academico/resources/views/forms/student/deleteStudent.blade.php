<h1>Excluir Estudante</h1>
<form method="POST" action="/excluir-estudante/{{$student->id}}">
    @csrf
    @method('DELETE')
    <p>Digite nome do estudante para confirmar exclusão: {{$student->user->nome}}</p>
    <input type="text" name="nome">
    <button type="submit">Excluir</button>
</form>