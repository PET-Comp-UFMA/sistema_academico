<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/formSchool.css">
    <link rel="stylesheet" href="/css/alert-pop-out.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/header.css">
    <title>Apagar escola</title>
</head>
<body>
    @include('components.header.header_adm');
    <section class="cadastrar-escolas" tabindex="0" onclick="closeSidebar(), closeMenu()">
        <h2>Excluir Professor</h2>
        <form method="POST" action="/excluir-professor/{{$teacher->id}}" class="cadastro" id="myForm">
            @csrf
            @method('DELETE')
            <div class="inputForm">
                <label>Digite nome do professor para confirmar exclusão: {{$teacher->user->nome}}</label>
                <input id="inputExcluir" type="text" name="nome">
            </div> 
            <div class="buttons">
                <button type="submit" class="button" id="submitButton">Apagar</button>
                <a class="button" id="cancelButton" href="/administrar-professores">Cancelar</a>
            </div>
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
</section>
<script src="/js/header.js"></script>
</body>
</html>





{{-- <h1>Excluir Professor</h1>
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
</form> --}}