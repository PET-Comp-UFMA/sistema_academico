<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formSchool.css">
    <link rel="stylesheet" href="/css/alert-pop-out.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/header.css">

    <title>Cadastrar Professor</title>
</head>
<body>
   @include('components.header.header_adm');
    <section class="cadastrar-escolas" tabindex="0" onclick="closeSidebar(), closeMenu()">
        <h2>Cadastrar Professor</h2>
            <form method="POST" action="/cadastrar-professor" class="cadastro" id="myForm">
                @csrf
                <div class="inputForm">
                    <label for="name">Nome:<span>*</span></label>
                    <input type="text" id="entrada" name="name" required placeholder="Digite o nome">
                </div>
                <div class="inputForm">
                    <label for="email">E-mail:<span>*</span></label>
                    <input type="text" id="entrada" name="email" required placeholder="Digite o email">
                </div>
                <div class="inputForm">
                    <label for="password">Senha:<span>*</span></label>
                    <input type="text" id="entrada" name="password" required placeholder="Digite a senha">
                </div>
                <div class="inputForm">
                    <label for="confirmed-password">Confirmar senha:<span>*</span></label>
                    <input type="text" id="entrada" name="confirmed-password" required placeholder="Digite a senha novamente">
                </div>
                <div class="inputForm">
                    <label for="address">Endereço:</label>
                    <input type="text" id="entrada" name="address" placeholder="Digite o endereço">
                </div>
                <div class="inputForm">
                    <label for="phone">Telefone:</label>
                    <input type="text" id="entrada" name="phone" placeholder="Digite o telefone">
                </div>
                <div class="inputForm">
                    <label for="school">Escola:<span>*</span></label>
                    <select id="school" name="school" required>
                        <option value="$school" hidden>Selecione</option>
                            <option value="marcos">Marcos</option>
                        {{-- @foreach ($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                        @enforeach --}}
                    </select>
                </div>
                
                <div class="buttons">
                    <button type="submit" class="button" id="submitButton">Cadastrar</button>
                    <button class="button" id="cancelButton"><a href="/administrar-professores">Cancelar</a></button>
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
    <script src="/js/alert-pop-out.js"></script>
    <script src="/js/header.js"></script>
</body>
</html>