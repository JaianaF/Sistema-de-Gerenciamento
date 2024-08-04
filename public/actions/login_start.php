<?php
session_start();
require_once '../controllers/UsuarioController.php'; // Ajustado para o caminho correto

$controller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($controller->login($username, $password)) {
        header('Location: /index.php');
        exit;
    } else {
        $error = "Usuário ou senha incorretos!";
    }
}

<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: /index.php');
    exit;
}
?>
?>