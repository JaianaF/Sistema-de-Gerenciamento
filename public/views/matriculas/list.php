

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
        <table border="1">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Aluno</th>
                    <th>Turma</th>
                </tr>
            </thead>
            <tbody>
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
                        <td colspan="3">Nenhum aluno matriculado nesta turma.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
