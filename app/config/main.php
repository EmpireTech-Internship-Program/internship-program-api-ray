<?php

include 'config/Database.php';
include 'models/User.php';
include 'repositories/UserRepository.php';
include 'services/UserService.php';
include 'controllers/LoginController.php';

$host = 'localhost';
$usuario = 'root';
$senha = 'projeto';
$bancoDeDados = 'project';

$database = new Database($host, $usuario, $senha, $bancoDeDados);
$conn = $database->getConnection();

$tabelas = ['banks', 'agency', 'account', 'people'];

foreach ($tabelas as $tabela) {
    $sql = "CREATE TABLE IF NOT EXISTS $tabela 
        id INT AUTO_INCREMENT PRIMARY KEY";

    if ($conn->query($sql) === FALSE) {
        echo "Erro ao criar a tabela $tabela: " . $conn->error;
    } else {
        echo "Tabela $tabela criada ou já existe.";
    }
}


$userRepository = new UserRepository($conn);

$userService = new UserService($userRepository);

$loginController = new LoginController($userService);

$loginController->login("exemplo_usuario", "senha123");

$database->closeConnection();
?>
