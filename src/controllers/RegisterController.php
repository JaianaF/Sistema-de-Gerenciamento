<?php
// RegisterController.php

require_once '../controllers/UsuarioController.php';

$controller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nome = $_POST['nome'];

    $result = $controller->register($username, $password, $nome);

    if ($result) {
        header('Location: /login.php');
        exit;
    } else {
        $error = "Erro ao registrar o usuário!";
        include '../views/register.php';
    }
}
?>
