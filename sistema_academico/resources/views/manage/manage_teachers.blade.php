<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/manage.css">
    <link rel="stylesheet" href="/css/alert-pop-out.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/index.css">
    <title>Administrar Professores</title>
</head>
<body>
    @include('components.header.header_adm');

    <section tabindex="0" onclick="closeSidebar(), closeMenu()" class="administrar-escolas">
        <h2>Administrar Professores</h2>

        {{-- <section class="pesquisa">
            <form>
                <div class="cima">
                    <p>Nome da Escola</p>
                </div>

                <div class="baixo">
                    <input type="text" placeholder="Informe o nome para a pesquisa">
                    <button class="button" id="cleanButton">Limpar Filtros</button>
                    <button class="button" id="searchButton">Pesquisar Escolas</button>
                </div>
            </form>    
        </section> --}}

        {{-- <section class="quantidade">
            <p>Exibindo X itens</p>
        </section> --}}

        <section class="resultados">
            <table class="tabela">
                <thead>
                    <tr class="cabecalho">
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Escola</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher) 
                        <tr>
                            <td>{{$teacher->user->nome}}</td>
                            <td>{{$teacher->user->email}}</td>
                            <td>{{$teacher->user->endereco}}</td>
                            <td>{{$teacher->user->telefone}}</td>
                            <td>{{$teacher->school->nome}}</td>
                            <td>
                                <button class="buttonResult"><a href="/atualizar-professor/{{$teacher->id}}"><img class="icon-action" src="/img/lapis.svg" alt=""></a></button>
                                <button class="buttonResult" ><a href="/excluir-professor/{{$teacher->id}}"><img class="icon-action" src="/img/lixo.svg" alt=""></a></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="cadastrar-escola">
            <a href="/cadastrar-professor"><button class="button">Cadastrar Professor</button></a> 
        </section>
    </section>
    @if(session('success'))
        <div id="success-message" class="alert alert-success" style="display: none;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div id="error-message" class="alert alert-danger" style="display: none;">
            {{ session('error') }}
        </div>
    @endif
    <script src="/js/alert-pop-out.js"></script>
    @include('components.footer.footer_adm');
</body>
</html>