CREATE DATABASE fiap_projeto;
USE fiap_projeto;

CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    data_nascimento DATE NOT NULL,
    usuario VARCHAR(255) NOT NULL
);

CREATE TABLE turmas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    tipo VARCHAR(255) NOT NULL
);

CREATE TABLE `matriculas` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `aluno_id` INT,
    `turma_id` INT,
    FOREIGN KEY (`aluno_id`) REFERENCES `alunos`(`id`),
    FOREIGN KEY (`turma_id`) REFERENCES `turmas`(`id`)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL
);