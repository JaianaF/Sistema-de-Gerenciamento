<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Matriculados</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/public/js/scripts.js" defer></script>
</head>
<body>
    <header>Sistema de Gerenciamento de Cursos</header>
    <nav>
        <ul>
            <li><a href="/views/aluno/create.php">Alunos</a></li>
            <li><a href="/views/turma/list.php">Turmas</a></li>
            <li><a href="/views/matriculas/create.php">Matrículas</a></li>
            <li><a href="/logout.php">Logout</a></li>
        </ul>
    </nav>
    
    <div class="container">
        <h1>Alunos Matriculados na Turma</h1>
        <div class="action-buttons">
            <a href="/views/matriculas/create.php">Cadastrar Aluno</a>
        </div>

        <!-- Formulário de busca -->
        <form method="get" action="">
            <label for="search">Buscar:</label>
            <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" placeholder="Digite o nome do aluno, ID ou nome da turma">
            <button type="submit">Buscar</button>
        </form>

        <table border="1">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Aluno</th>
                    <th>Turma</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $matriculas = [
                    ['id' => 1, 'aluno_nome' => 'João Silva', 'turma_nome' => 'Matemática Avançada'],
                    ['id' => 2, 'aluno_nome' => 'Ana Oliveira', 'turma_nome' => 'Programação em PHP'],
                    ['id' => 3, 'aluno_nome' => 'Maria Oliveira', 'turma_nome' => 'História Mundial'],
                ];

                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $search = $_GET['search'];
                    $matriculas = array_filter($matriculas, function($matricula) use ($search) {
                        // Verifica se o nome do aluno, o ID ou o nome da turma contém o texto de busca
                        return stripos($matricula['aluno_nome'], $search) !== false || 
                               strpos($matricula['id'], $search) !== false ||
                               stripos($matricula['turma_nome'], $search) !== false;
                    });
                }

                usort($matriculas, function($a, $b) {
                    return strcmp($a['aluno_nome'], $b['aluno_nome']);
                });
                ?>

                <?php if (!empty($matriculas)): ?>
                    <?php foreach ($matriculas as $matricula): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($matricula['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($matricula['aluno_nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($matricula['turma_nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Nenhum aluno matriculado encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
