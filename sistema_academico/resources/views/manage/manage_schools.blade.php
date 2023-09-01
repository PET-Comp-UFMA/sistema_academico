<h1>Administrar escolas</h1>
<a href="/cadastrar-escola"><button>Inserir Escola</button></a>
<table>
    <tr>
        <th>Nome</th>
        <th>Endereço</th>
    </tr>
    @foreach ($schools as $school)
    <tr>
        <td>{{$school->nome}}</td>
        <td>{{$school->endereco}}</td>
    </tr>
    @endforeach
</table>