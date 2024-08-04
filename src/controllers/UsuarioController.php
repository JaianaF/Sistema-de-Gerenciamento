<?php

class UsuarioController {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=fiap_projeto', 'root', 'admin');
    }

    public function register($username, $password, $nome) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->db->prepare("INSERT INTO usuarios (username, password, nome) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $hashedPassword, $nome]);
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['nome'] = $user['nome'];
            return true;
        }

        return false;
    }

    public function UsuarioController:: register($username, $password, $nome) {
    
        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $pdo = new PDO('mysql:host=localhost;dbname=fiap_projeto', 'root', 'admin');

        $stmt = $pdo->prepare('INSERT INTO usuarios (username, password, nome) VALUES (?, ?, ?)');
        return $stmt->execute([$username, $hashedPassword, $nome]);
    }
}
?>
