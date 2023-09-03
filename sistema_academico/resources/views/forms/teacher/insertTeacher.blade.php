<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formSchool.css">
    <title>Cadastrar Professor</title>
</head>
<body>
    <header>HEADER</header>
    <section class="cadastrar-escolas">
        <h2>Cadastrar Professor</h2>
            <form method="POST" action="/cadastrar-professor" class="cadastro" id="myForm">
                @csrf
                <div class="inputEscola">
                    <label for="nome">Nome:<span>*</span></label>
                    <input type="text" id="entrada" name="nome" required placeholder="Digite o nome">
                </div>
                <div class="inputEscola">
                    <label for="endereco">E-mail:<span>*</span></label>
                    <input type="text" id="entrada" name="email" required placeholder="Digite o email">
                </div>
                <div class="inputEscola">
                    <label for="endereco">Senha:<span>*</span></label>
                    <input type="text" id="entrada" name="senha" required placeholder="Digite a senha">
                </div>
                <div class="buttons">
                    <button type="submit" class="button" id="submitButton">Cadastrar</button>
                    <button class="button" id="cancelButton"><a href="/administrar-escolas">Cancelar</a></button>
                </div>
            </form>
    </section>
</body>
</html>