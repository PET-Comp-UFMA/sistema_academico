<h1>Excluir Escola</h1>
<form method="POST" action="/excluir-escola/{{$school->id}}">
    @csrf
    @method('DELETE')
    <p>Digite nome da escola para confirmar exclusão: {{$school->nome}}</p>
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