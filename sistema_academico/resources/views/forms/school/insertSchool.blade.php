<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formSchool.css">
    <title>Cadastrar Escola</title>
</head>
<body>
    <header>HEADER</header>
    <section class="cadastrar-escolas">
        <h2>Cadastrar Escola</h2>
            <form method="POST" action="/cadastrar-escola" class="cadastro" id="myForm">
                @csrf
                <div class="inputEscola">
                    <label for="nome">Nome:<span>*</span></label>
                    <input type="text" id="entrada" name="nome" required placeholder="Digite o nome">
                </div>
                <div class="inputEscola">
                    <label for="endereco">Endereço:<span>*</span></label>
                    <input type="text" id="entrada" name="endereco" required placeholder="Digite o endereço">
                </div>
                <div class="buttons">
                    <button type="submit" class="button" id="submitButton">Cadastrar</button>
                    <button class="button" id="cancelButton"><a href="/administrar-escolas">Cancelar</a></button>
                </div>
            </form>
    </section>
</body>
</html>