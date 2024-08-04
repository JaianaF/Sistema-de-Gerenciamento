<?php
require_once '../config/config.php';

class Aluno {

    private $conn;
    private $table = 'alunos';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function update($id, $nome, $data_nascimento, $usuario) {
        $query = "
            UPDATE " . $this->table . "
            SET nome = :nome, data_nascimento = :data_nascimento, usuario = :usuario
            WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':usuario', $usuario);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    private $conn;

    public function Aluno::__construct() {
        $this->conn = getDB();
    }

    public function create($nome, $data_nascimento, $usuario) {
        $query = "INSERT INTO aluno (nome, data_nascimento, usuario) VALUES (:nome, :data_nascimento, :usuario)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':usuario', $usuario);
        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM aluno ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $data_nascimento, $usuario) {
        $query = "UPDATE aluno SET nome = :nome, data_nascimento = :data_nascimento, usuario = :usuario WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':usuario', $usuario);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM aluno WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
