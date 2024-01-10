<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if ($usuario == 'usuario_teste' && $senha == 'senha_teste') {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}