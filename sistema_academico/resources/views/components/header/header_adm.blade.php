
    <header class="header" id="header">
        <button onclick="toggleSidebar()" class="btn-icon-header" >
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </button>
        <div class="logo_header">
            <!-- <img class="icon-user" src="icon-user.png" alt="logo"> -->
            <h4>Sistema Academico</h4>
        </div>
        <div class="buttons_center" id="buttons_center">
            <button class="btn-icon-header" onclick="closeSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </button>
            <a href="">Inicio</a>
            <a href="/dashboard">Dashboard</a>
            <a tabindex="0" onclick="mostrarMenu()" id="administrar-dados">Administrar dados <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
              </svg></a>
            <div class="menuOculto" id="menuOculto">
                <a href="#">Administrar Escolas</a>
                <a href="#">Administrar Supervisores</a>
                <a href="#">Administrar Professores</a>
                <a href="#">Administrar Alunos</a>
                <a href="#">Administrar Disciplinas</a>
                <a href="#">Administrar Turmas</a>
                <a href="#">Sair</a>
            </div>
        </div>
        <div class="icons_right">
           
            <div class="user">
                <img class="icon-user" src="/img/icon-user.png" alt="">
                <p>Fulano</p>
            </div>
            <p id="sair">Sair</p>
        </div>
        <div id="dropdown-content" class="dropdown-content">
        <ul>
                <li class=item id=item1><a href="#">Administrar Escolas</a></li>
                <li class=item id=item2><a href="#">Administrar Supervisores</a></li>
                <li class=item id=item3><a href="#">Administrar Professores</a></li>
                <li class=item id=item4><a href="#">Administrar Alunos</a></li>
                <li class=item id=item5><a href="#">Administrar Disciplinas</a></li>
                <li class=item id=item6><a href="#">Administrar Turmas</a></li>
            </ul>
         </div>
    </header>
    <!-- <div tabindex="0" onclick="closeSidebar(), closeMenu()"class="content">
        <h1>marcosoajkspasjas</h1>
    </div> -->

    
