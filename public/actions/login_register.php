<?php
require_once '../../controllers/UsuarioController.php';

$controller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nome = $_POST['nome'];

    if ($controller->register($username, $password, $nome)) {
        header('Location: /login.php');
        exit;
    } else {
        $error = "Erro ao registrar o usuário!";
    }
}
?>