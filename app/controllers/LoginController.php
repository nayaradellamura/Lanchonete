<?php
require_once '../app/core/Controller.php';
require_once '../app/core/Database.php';

class LoginController extends Controller {
    public function index() {
        $this->view('login');
    }

    public function auth() {
        $usuario = $_POST['usuario'];
        $senha = hash('sha256', $_POST['senha']);
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM admin WHERE usuario = ? AND senha = ?");
        $stmt->execute([$usuario, $senha]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['logado'] = true;
            header("Location: index.php?controller=Produto&action=index");
        } else {
            echo "Login inválido!";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}
