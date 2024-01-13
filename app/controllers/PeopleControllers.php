<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se a chave 'newUsername' existe no POST
    if (isset($_POST['newUsername'])) {
        // Recebe o novo nome do formulário
        $newUsername = filter_input(INPUT_POST, 'newUsername', FILTER_SANITIZE_STRING);

        // Adicione aqui a lógica para gerar e verificar o token CSRF

        // Atualiza o nome na sessão
        $_SESSION['username'] = $newUsername;

        // Uso de constante para a URL de redirecionamento
        define('REDIRECT_URL', 'listing-people.html');

        // Redireciona de volta para a página do usuário
        header('Location: ' . REDIRECT_URL);
        exit();
    } else {
        // A chave 'newUsername' não existe no POST
        // Adicione lógica adicional conforme necessário
        header('Location: login.html');
        exit();
    }
} else {
    // Redireciona para a tela de login se a requisição não for POST
    header('Location: login.html');
    exit();
}
?>