<h1>Cadastrar escola</h1>
<form method="POST" action="/cadastrar-escola">
    @csrf
    <input type="text" name="nome" id="">
    <input type="text" name="endereco" id="">
    <button type="submit">Enviar</button>
</form>