var header = document.getElementById("header");
var navigation = document.getElementById("buttons_center");
var showSidebar = false;

function toggleSidebar() {
    showSidebar = !showSidebar
    if (showSidebar) {
        navigation.style.marginLeft = '-10vw';
        navigation.style.animationName = 'showSidebar'
    }
    else {
        navigation.style.marginLeft = '-200vw';
        navigation.style.animationName = ''
    }

}

function closeSidebar() {
    if (showSidebar) {
        toggleSidebar();
    }
}
var menuOculto = document.getElementById("menuOculto");
window.addEventListener('resize', function (event) {
    if (this.window.innerWidth > 860 && showSidebar) {
        toggleSidebar();
    }
})


// let botao = document.getElementById("administrar-dados");
// let menuToggle = document.getElementById("dropdown-content");
// const navLinks = document.querySelector('.nav-links');

// botao.addEventListener('click', () => {
//     menuToggle.style.display = "flex";
// });
var botao = document.getElementById("administrar-dados")
var mostraMenu = false;
var menu = document.getElementById('dropdown-content');
function mostrarMenu() {
    mostraMenu = !mostraMenu
    if (mostraMenu) {
        menu.style.display = 'block';
    }
    else {
        menu.style.display = 'none';
    }
}

function closeMenu() {
    if (mostraMenu) {
        mostrarMenu();
    }
}
window.addEventListener('resize', function (event) {
    if (this.window.innerWidth < 860 && mostraMenu) {
        mostrarMenu();
    }


})


