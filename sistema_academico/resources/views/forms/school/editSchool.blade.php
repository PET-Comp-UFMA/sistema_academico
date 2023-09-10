<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formSchool.css">
    <link rel="stylesheet" href="/css/alert-pop-out.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/header.css">
    <title>Cadastrar Escola</title>
</head>
<body>
    @include('components.header.header_adm');
    <section tabindex="0" onclick="closeSidebar(), closeMenu()" class="cadastrar-escolas">
        <h2>Editar Escola</h2>
            <form method="POST" action="/atualizar-escola/{{$school->id}}" class="cadastro" id="myForm">
                @csrf
                <div class="inputForm">
                    <label for="nome">Novo nome:<span>*</span></label>
                    <input value="{{$school->nome}}" type="text" id="entrada" name="nome" required>
                </div>
                <div class="inputForm">
                    <label for="endereco">Novo endereço:<span>*</span></label>
                    <input value="{{$school->endereco}}" type="text" id="entrada" name="endereco" required>
                </div>
                <div class="buttons">
                    <button type="submit" class="button" id="submitButton">Salvar</button>
                    <button class="button" id="cancelButton"><a href="/administrar-escolas">Cancelar</a></button>
                </div>
            </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script src="/js/alert-pop-out.js"></script>
    <script src="/js/header.js"></script>
</body>
</html>