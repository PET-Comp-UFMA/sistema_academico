<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formSchool.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/alert-pop-out.css">
    <title>Cadastrar Escola</title>
</head>
<body>
    @include('components.header.header_adm');
    <section class="cadastrar-escolas" tabindex="0" onclick="closeSidebar(), closeMenu()">
        <h2>Cadastrar Escola</h2>
            <form method="POST" action="/cadastrar-escola" class="cadastro" id="myForm">
                @csrf
                <div class="inputForm">
                    <label for="nome">Nome:<span>*</span></label>
                    <input type="text" id="entrada" name="nome" required placeholder="Digite o nome">
                </div>
                <div class="inputForm">
                    <label for="endereco">Endereço:<span>*</span></label>
                    <input type="text" id="entrada" name="endereco" required placeholder="Digite o endereço">
                </div>
                <div class="buttons">
                    <button type="submit" class="button" id="submitButton">Cadastrar</button>
                    <button class="button" id="cancelButton"><a href="/administrar-escolas">Cancelar</a></button>
                </div>
            </form>
    </section>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script src="/js/header.js"></script>
    
</body>
</html>