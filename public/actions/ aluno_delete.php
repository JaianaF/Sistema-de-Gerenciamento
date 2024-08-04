<?php
require_once '../../controllers/AlunoController.php';

$controller = new AlunoController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $controller->delete($id);
    header('Location: /views/aluno/list.php');
    exit;
}
?>
