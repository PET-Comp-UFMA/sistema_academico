<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/styleLogin.css">
    <link rel="stylesheet" href="/css/alert-pop-out.css">
</head>
<body>
    <header>
        <h1>header</h1>
    </header>
    <main class="container">
            <form method="POST" action="{{route('login')}}" class="formLogin">
            @csrf 
            <h1>Login</h1>
                <div class="elementForm">
                    <label for="perfis">Perfil</label>
                    <select class="inputs" id="perfis" name="perfil" required>
                        <option value="" hidden>Selecione</option>
                        <option value="student">Aluno</option>
                        <option value="teacher">Professor</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <div class="elementForm">
                    <label for="login">Email</label>
                    <input  class="inputs @error('email') is-invalid @enderror" type="email" name="email" required>
                </div>
                <div class="elementForm">
                    <label for="senha">Senha</label>
                    <input class="inputs" type="password" name="password" required>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
               <button class="inputs" id="button1" type="submit">Entrar</button>
               @if(session('error'))
                <div id="error-message" class="alert alert-danger" style="display: none;">
                    {{ session('error') }}
                </div>
                @endif

                <!-- <div class="opcoes">
                    <div class="op1">
                        <input type="checkbox" name="contLogin" id="">
                        <label for="contLogin"><p>Manter conectado</p></label>
                    </div>
                    <div class="op2">
                        <p>Esqueci a senha</p>
                    </div>
                </div> -->
            </form>
    </main>
    <script src="/js/alert-pop-out.js"></script>
</body>
</html>