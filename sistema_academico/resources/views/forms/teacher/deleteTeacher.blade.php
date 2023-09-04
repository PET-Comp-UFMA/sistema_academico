<h1>Excluir Professor</h1>
<form method="POST" action="/excluir-professor/{{$teacher->id}}">
    @csrf
    @method('DELETE')
    <p>Digite nome do professor para confirmar exclusão: {{$teacher->user->nome}}</p>
    <input type="text" name="nome">
    <button type="submit">Excluir</button>
</form>