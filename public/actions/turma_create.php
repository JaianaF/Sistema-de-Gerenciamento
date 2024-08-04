<?php
require_once '../../vendor/autoload.php';

use App\Controllers\TurmaController;

$controller = new TurmaController();
$turmas = $controller->getAll();
?>