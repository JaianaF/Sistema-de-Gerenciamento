<?php
require_once '../../controllers/AlunoController.php';

$controller = new AlunoController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $aluno = $controller->getById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $usuario = $_POST['usuario'];
    $controller->update($id, $nome, $data_nascimento, $usuario);
    header('Location: /views/aluno/list.php');
    exit;
}
?>