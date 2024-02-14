<?php

class LoginController {

    private $userService;

    public function __construct($userService) {
        $this->userService = $userService;
    }

    public function login($username, $password) {
        $user = $this->userService->authenticateUser($username, $password);

        if ($user) {
            $token = $this->generateToken($user->getId());
            return json_encode(['success' => true, 'token' => $token]);
        } else {
            return json_encode(['success' => false, 'message' => 'Falha na autenticação.']);
        }
    }

    public function signup($username, $password) {
        return json_encode(['success' => true, 'message' => 'Usuário cadastrado com sucesso.']);
    }

    public function logout() {
        return json_encode(['success' => true, 'message' => 'Logout bem-sucedido.']);
    }

    public function authorize($token) {
        if ($this->isValidToken($token)) {
            return json_encode(['success' => true, 'message' => 'Autorização concedida.']);
        } else {
            return json_encode(['success' => false, 'message' => 'Autorização negada.']);
        }
    }

    private function generateToken($userId) {
        return 'seu_token_gerado';
    }

    private function isValidToken($token) {
        return $token === 'seu_token_secreto';
    }
}

$loginController = new LoginController($userService);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case 'login':
    
                $requestData = json_decode(file_get_contents('php://input'), true);
                $username = $requestData['username'];
                $password = $requestData['password'];
                echo $loginController->login($username, $password);
                break;
            case 'signup':
  
                $requestData = json_decode(file_get_contents('php://input'), true);
                $username = $requestData['username'];
                $password = $requestData['password'];
                echo $loginController->signup($username, $password);
                break;
            case 'logout':

                echo $loginController->logout();
                break;
            case 'authorize':
  
                $token = $_POST['token'];
                echo $loginController->authorize($token);
                break;
            default:

                echo json_encode(['success' => false, 'message' => 'Ação inválida.']);
                break;
        }
    } else {
    
        echo json_encode(['success' => false, 'message' => 'Nenhuma ação especificada.']);
    }
}

?>
