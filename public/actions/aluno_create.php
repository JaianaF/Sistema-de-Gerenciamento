<?php
require_once '../../controllers/AlunoController.php';
$controller = new AlunoController();

$id = '';
$nome = '';
$data_nascimento = '';
$usuario = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch aluno details to populate the form
    $aluno = $AlunoController->getAlunoById($id);
    $nome = $aluno['nome'];
    $data_nascimento = $aluno['data_nascimento'];
    $usuario = $aluno['usuario'];
}
?>