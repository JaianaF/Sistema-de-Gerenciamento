<?php
require_once '../../controllers/MatriculaController.php';
$controller = new MatriculaController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $controller->delete($id);
    header('Location: /views/matricula/list.php');
    exit;
}
?>
