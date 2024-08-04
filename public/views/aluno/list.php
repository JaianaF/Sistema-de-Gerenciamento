<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <header>Sistema de Gerenciamento de Cursos</header>
    <nav>
        <ul>
            <li><a href="/views/aluno/create.php">Alunos</a></li>
            <li><a href="/views/turma/list.php">Turmas</a></li>
            <li><a href="/views/matriculas/list.php">Matrículas</a></li>
            <li><a href="/logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Lista de Alunos</h1>
        <div class="action-buttons">
            <a href="/views/aluno/create.php">Cadastrar Novo Aluno</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($alunos)): ?>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['data_nascimento']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['usuario']); ?></td>
                            <td class="action-buttons">
                                <a href="/views/aluno/edit.php?id=<?php echo $aluno['id']; ?>">Editar</a>
                                <a href="/actions/aluno_delete.php?id=<?php echo $aluno['id']; ?>" class="delete">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhum aluno encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
