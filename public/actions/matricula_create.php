<?php
require_once '../../vendor/autoload.php';

use App\Controllers\MatriculaController;

$controller = new MatriculaController();

if (!isset($_GET['turma_id'])) {
    die('ID da turma não fornecido.');
}

$turma_id = $_GET['turma_id'];
$matriculas = $controller->getAlunosMatriculados($turma_id);
?>