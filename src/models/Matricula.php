<?php

namespace App\Models;

use PDO;
use App\Config\Database;

class Matricula {
    private $conn;
    private $table = 'matriculas';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }


    public function getAlunosByTurma($turma_id) {
        $query = "
            SELECT matriculas.id AS matricula_id, alunos.nome AS aluno_nome, turmas.nome AS turma_nome
            FROM " . $this->table . "
            JOIN alunos ON matriculas.aluno_id = alunos.id
            JOIN turmas ON matriculas.turma_id = turmas.id
            WHERE matriculas.turma_id = :turma_id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':turma_id', $turma_id);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Matricula::getAlunosByTurma($turma_id) {
        $query = "
            SELECT a.nome, a.data_nascimento, a.usuario 
            FROM " . $this->table . " m
            JOIN alunos a ON m.aluno_id = a.id
            WHERE m.turma_id = :turma_id
            ORDER BY a.nome ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':turma_id', $turma_id);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
