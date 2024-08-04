<?php

namespace App\Controllers;

use App\Models\Turma;

class TurmaController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $turma = new Turma();
            $turma->nome = $_POST['nome'];
            $turma->descricao = $_POST['descricao'];
            $turma->tipo = $_POST['tipo'];

            if (strlen($turma->nome) < 3) {
                echo "O nome deve ter no mínimo 3 caracteres.";
                return;
            }

            if ($turma->create()) {
                echo "Turma cadastrada com sucesso.";
            } else {
                echo "Erro ao cadastrar turma.";
            }
        }
    }

    public function list($page = 1) {
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $turma = new Turma();
        $stmt = $turma->readAll($offset, $limit);
        $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once '../src/views/turmas/list.php';
    }

    public function edit($id) {
        $turma = new Turma();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $turma->id = $id;
            $turma->nome = $_POST['nome'];
            $turma->descricao = $_POST['descricao'];
            $turma->tipo = $_POST['tipo'];

            if (strlen($turma->nome) < 3) {
                echo "O nome deve ter no mínimo 3 caracteres.";
                return;
            }

            if ($turma->update()) {
                echo "Turma atualizada com sucesso.";
            } else {
                echo "Erro ao atualizar turma.";
            }
        } else {
            $turmaData = $turma->read($id);
            include_once '../src/views/turmas/edit.php';
        }
    }

    public function delete($id) {
        $turma = new Turma();
        if ($turma->delete($id)) {
            echo "Turma deletada com sucesso.";
        } else {
            echo "Erro ao deletar turma.";
        }
    }

    private $db;

    public function __construct() {
        // Substitua pelas suas credenciais de conexão ao banco de dados
        $this->db = new PDO('mysql:host=localhost;dbname=fiap_projeto', 'root', 'admin');
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM turmas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM turmas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $descricao, $tipo) {
        $stmt = $this->db->prepare("UPDATE turmas SET nome = ?, descricao = ?, tipo = ? WHERE id = ?");
        return $stmt->execute([$nome, $descricao, $tipo, $id]);
    }

    public function TurmaController:: delete($id) {
        $stmt = $this->db->prepare("DELETE FROM turmas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
