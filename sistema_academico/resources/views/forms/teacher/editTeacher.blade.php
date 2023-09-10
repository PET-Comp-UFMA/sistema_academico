<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formSchool.css">
    <link rel="stylesheet" href="/css/alert-pop-out.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/header.css">
    <title>Editar Professor</title>
</head>
<body>
    @include('components.header.header_adm');
    <section tabindex="0" onclick="closeSidebar(), closeMenu()" class="cadastrar-escolas">
        <h2>Editar Professor</h2>
        <form method="POST" action="/atualizar-professor/{{$teacher->id}}" class="cadastro" id="myForm">
            @csrf
            <div class="inputForm">
                <label for="name">Nome:<span>*</span></label>
                <input value="{{$teacher->user->nome}}" type="text" id="entrada" name="name" required placeholder="Digite o nome">
            </div>
            <div class="inputForm">
                <label for="email">E-mail:<span>*</span></label>
                <input value="{{$teacher->user->email}}" type="text" id="entrada" name="email" required placeholder="Digite o email">
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
                <input value="{{$teacher->user->endereco}}" type="text" id="entrada" name="address" placeholder="Digite o endereço">
            </div>
            <div class="inputForm">
                <label for="phone">Telefone:</label>
                <input maxlength="12" value="{{$teacher->user->telefone}}" type="text" id="entrada" name="phone" placeholder="Digite o telefone">
            </div>
            <div class="inputForm">
                <label for="school">Escola:<span>*</span></label>
                <select id="school" name="school" required>
                    <option value={{$teacher->school->id}}>{{$teacher->school->nome}}</option>
                        @foreach ($schools as $school)
                            @if ($teacher->school->id != $school->id) 
                                <option value="{{$school->id}}">{{$school->nome}}</option>
                            @endif
                        @endforeach
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
                <a class="button" id="cancelButton" href="/administrar-professores">Cancelar</a>
            </div>
        </form>
            {{-- <form method="POST" action="/atualizar-professor/{{$teacher->id}}" class="cadastro" id="myForm">
                @csrf
                <div class="inputForm">
                    <label for="nome">Novo nome:<span>*</span></label>
                    <input value="{{$teacher->user->nome}}" type="text" id="entrada" name="nome" required>
                </div>
                <div class="inputForm">
                    <label for="email">Novo e-mail:<span>*</span></label>
                    <input value="{{$teacher->user->email}}" type="text" id="entrada" name="email" required>
                </div>
                <div class="inputForm">
                    <label for="password">Nova senha:<span>*</span></label>
                    <input type="text" id="entrada" name="password" required>
                </div>
                <div class="buttons">
                    <button type="submit" class="button" id="submitButton">Editar</button>
                    <button class="button" id="cancelButton"><a href="/administrar-professores">Cancelar</a></button>
                </div>
            </form> --}}
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