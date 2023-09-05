<h1>Excluir Professor</h1>
<form method="POST" action="/excluir-professor/{{$teacher->id}}">
    @csrf
    @method('DELETE')
    <p>Digite nome do professor para confirmar exclusão: {{$teacher->user->nome}}</p>
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