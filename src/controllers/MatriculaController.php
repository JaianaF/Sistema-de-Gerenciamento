<?php

namespace App\Controllers;

use App\Models\Matricula;

class MatriculaController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $matricula = new Matricula();
            $matricula->aluno_id = $_POST['aluno_id'];
            $matricula->turma_id = $_POST['turma_id'];

            if ($matricula->isAlreadyEnrolled($matricula->aluno_id, $matricula->turma_id)) {
                echo "O aluno já está matriculado nesta turma.";
                return;
            }

            if ($matricula->create()) {
                echo "Aluno matriculado com sucesso.";
            } else {
                echo "Erro ao matricular aluno.";
            }
        }
    }


    public function getAlunosMatriculados($turma_id) {
        $matricula = new Matricula();
        return $matricula->getAlunosByTurma($turma_id);
    }
    
    public function listByTurma($turma_id) {
        $matricula = new Matricula();
        $stmt = $matricula->readByTurma($turma_id);
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once '../src/views/matriculas/list.php';
    }

    public function getAlunosByTurma($turma_id) {
        $matricula = new Matricula();
        return $matricula->getAlunosByTurma($turma_id);
    }
}
