// Função para mostrar a mensagem de sucesso
function showSuccessMessage() {
    var successMessage = document.getElementById('success-message');
    if (successMessage) {
        successMessage.style.display = 'block';
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, 3000); // Ocultar após 3 segundos (3000 milissegundos)
    }
}

// Função para mostrar a mensagem de erro
function showErrorMessage() {
    var errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        errorMessage.style.display = 'block';
        setTimeout(function () {
            errorMessage.style.display = 'none';
        }, 3000); // Ocultar após 3 segundos (3000 milissegundos)
    }
}

// Chame as funções ao carregar a página
window.onload = function () {
    showSuccessMessage();
    showErrorMessage();
};