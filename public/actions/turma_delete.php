<?php
require_once '../../controllers/TurmaController.php';
$controller = new TurmaController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $controller->delete($id);
    header('Location: /views/turma/list.php');
    exit;
}
?>
