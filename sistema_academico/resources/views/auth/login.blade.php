<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>

<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/styleLogin.css">
</head>
<body>
    <header>
        <h1>header</h1>
    </header>
    <main class="container">
            <form method="POST" action="http://localhost:8000/login">
                @csrf
                <h1>Login</h1>
               
                <div class="elementForm">
                    <label for="email">Login</label>
                    <input class="inputs" type="text" name="email" required>
                </div>
                <div class="elementForm">
                    <label for="password">Senha</label>
                    <input class="inputs" type="password" name="password" required>
                </div>
              <button class="inputs" id="button1" type="submit"  >Entrar</button>
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
    
</body>
</html>