<h1>Administrar escolas</h1>
<table>
    <tr>
        <th>Nome</th>
    </tr>
    @foreach ($teachers as $teacher)
    <tr>
        <td>{{$teacher->name}}</td>
    </tr>
    @endforeach
</table>