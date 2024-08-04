<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Turmas</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>Sistema de Gerenciamento de Cursos</header>
    <nav>
        <ul>
            <li><a href="/views/aluno/list.php">Alunos</a></li>
            <li><a href="/views/turma/list.php">Turmas</a></li>
            <li><a href="/views/matriculas/list.php">Matrículas</a></li>
            <li><a href="/logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Lista de Turmas</h1>
        <div class="action-buttons">
            <a href="/views/turma/create.php">Cadastrar Nova Turma</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($turmas)): ?>
                    <?php foreach ($turmas as $turma): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($turma['nome']); ?></td>
                            <td><?php echo htmlspecialchars($turma['descricao']); ?></td>
                            <td><?php echo htmlspecialchars($turma['tipo']); ?></td>
                            <td class="action-buttons">
                                <a href="/public/views/turma/form.php?id=<?php echo $turma['id']; ?>">Editar</a>
                                <a href="/public/actions/turma_delete.php?id=<?php echo $turma['id']; ?>" class="delete">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhuma turma encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>