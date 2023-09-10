<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formSchool.css">
    <link rel="stylesheet" href="/css/alert-pop-out.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/header.css">
    <title>Editar Estudante</title>
</head>
<body>
    @include('components.header.header_adm');
    <section tabindex="0" onclick="closeSidebar(), closeMenu()" class="cadastrar-escolas">
        <h2>Editar Estudante</h2>
        <form method="POST" action="/atualizar-estudante/{{$student->id}}" class="cadastro" id="myForm">
            @csrf
            <div class="inputForm">
                <label for="name">Nome:<span>*</span></label>
                <input value="{{$student->user->nome}}" type="text" id="entrada" name="name" required placeholder="Digite o nome">
            </div>
            <div class="inputForm">
                <label for="email">E-mail:<span>*</span></label>
                <input value="{{$student->user->email}}" type="text" id="entrada" name="email" required placeholder="Digite o email">
            </div>
            {{-- <div class="inputForm">
                <label for="password">Senha:<span>*</span></label>
                <input value="{{$teacher->user->senha}}" type="password" id="entrada" name="password" required placeholder="Digite a senha">
            </div>
            <div class="inputForm">
                <label for="confirmed-password">Confirmar senha:<span>*</span></label>
                <input type="password" id="entrada" name="confirmed-password" required placeholder="Digite a senha novamente">
            </div> --}}
            <div class="inputForm">
                <label for="address">Endereço:</label>
                <input value="{{$student->user->endereco}}" type="text" id="entrada" name="address" placeholder="Digite o endereço">
            </div>
            <div class="inputForm">
                <label for="phone">Telefone:</label>
                <input value="{{$student->user->telefone}}" type="text" id="entrada" name="phone" placeholder="Digite o telefone">
            </div>
            <div class="inputForm">
                <label for="school">Escola:<span>*</span></label>
                <select id="school" name="school" required>
                    <option value="$school" hidden>{{$student->user->escola}}"</option>
                        {{-- @foreach ($schools as $school)
                            <option value="{{$school->id}}">{{$school->nome}}</option>
                        @endforeach --}}
                </select>
            </div>
            {{-- <div class="radio">
                <label for="manager">Supervisor:<span>*</span></label>
                <div class="check">
                    <label>
                        <input type="radio" name="supervisor" value="yes" required> Sim
                    </label>
                    <label>
                        <input type="radio" name="supervisor" value="not"> Não
                    </label>
                </div>
                
            </div> --}}
            
            <div class="buttons">
                <button type="submit" class="button" id="submitButton">Salvar</button>
                <a class="button" id="cancelButton" href="/administrar-estudante">Cancelar</a>
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