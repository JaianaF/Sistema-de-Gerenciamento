<?php
require_once '../../controllers/TurmaController.php';

$controller = new TurmaController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $turma = $controller->getById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $controller->update($id, $nome, $descricao, $tipo);
    header('Location: /views/turma/list.php');
    exit;
}
?>
