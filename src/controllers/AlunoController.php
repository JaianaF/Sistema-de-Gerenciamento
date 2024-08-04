<?php
require_once '../models/Aluno.php';

class AlunoController {


    public function index() {
        $aluno = new Aluno();
        return $aluno->getAll(); // Método que busca todos os alunos no modelo Aluno
    }

    private $alunoModel;

    public function __construct() {
        $this->alunoModel = new Aluno();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $data_nascimento = $_POST['data_nascimento'];
            $usuario = $_POST['usuario'];
            $this->alunoModel->create($nome, $data_nascimento, $usuario);
            header('Location: /views/aluno/list.php');
        }
    }

    public function read() {
        return $this->alunoModel->read();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM alunos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $nome, $data_nascimento, $usuario) {
        $stmt = $this->db->prepare("UPDATE alunos SET nome = ?, data_nascimento = ?, usuario = ? WHERE id = ?");
        return $stmt->execute([$nome, $data_nascimento, $usuario, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM alunos WHERE id = ?");
        return $stmt->execute([$id]);
    }
    }

?>
