<?php

namespace App\Models;

use PDO;
use App\Config\Database;

class Turma {
    private $conn;
    private $table = 'turmas';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($nome, $descricao, $tipo) {
        $query = "
            INSERT INTO " . $this->table . " (nome, descricao, tipo)
            VALUES (:nome, :descricao, :tipo)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':tipo', $tipo);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function update($id, $nome, $descricao, $tipo) {
        $query = "
            UPDATE " . $this->table . "
            SET nome = :nome, descricao = :descricao, tipo = :tipo
            WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':tipo', $tipo);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function delete($id) {
        $query = "
            DELETE FROM " . $this->table . "
            WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function getById($id) {
        $query = "
            SELECT * FROM " . $this->table . "
            WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $query = "
            SELECT * FROM " . $this->table . "
            ORDER BY nome ASC";
        
        $stmt = $this->conn->query($query);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
