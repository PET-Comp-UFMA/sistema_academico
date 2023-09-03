<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formSchool.css">
    <title>Editar Professor</title>
</head>
<body>
    <header>HEADER</header>
    <section class="cadastrar-escolas">
        <h2>Editar Professor</h2>
            <form method="POST" action="/atualizar-professor/{{$school->id}}" class="cadastro" id="myForm">
                @csrf
                <div class="inputEscola">
                    <label for="nome">Novo nome:<span>*</span></label>
                    <input value="{{$school->nome}}" type="text" id="entrada" name="nome" required>
                </div>
                <div class="inputEscola">
                    <label for="email">Novo e-mail:<span>*</span></label>
                    <input value="{{$school->endereco}}" type="text" id="entrada" name="email" required>
                </div>
                <div class="inputEscola">
                    <label for="senha">Nova senha:<span>*</span></label>
                    <input value="{{$school->endereco}}" type="text" id="entrada" name="senha" required>
                </div>
                <div class="buttons">
                    <button type="submit" class="button" id="submitButton">Editar</button>
                    <button class="button" id="cancelButton"><a href="/administrar-escolas">Cancelar</a></button>
                </div>
            </form>
    </section>
</body>
</html>