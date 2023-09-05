<h1>Excluir Estudante</h1>
<form method="POST" action="/excluir-estudante/{{$student->id}}">
    @csrf
    @method('DELETE')
    <p>Digite nome do estudante para confirmar exclusão: {{$student->user->nome}}</p>
    <input type="text" name="nome">
    <button type="submit">Excluir</button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>