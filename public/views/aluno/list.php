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

        <!-- Formulário de busca -->
        <form method="get" action="">
            <label for="search">Buscar Aluno:</label>
            <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" placeholder="Digite o nome do aluno">
            <button type="submit">Buscar</button>
        </form>

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
                <?php 
                $alunos = [
                    ['id' => 1, 'nome' => 'João Silva', 'data_nascimento' => '2000-01-15', 'usuario' => 'joao.silva'],
                    ['id' => 2, 'nome' => 'Ana Oliveira', 'data_nascimento' => '1999-11-23', 'usuario' => 'ana.oliveira'],
                    ['id' => 3, 'nome' => 'Maria Oliveira', 'data_nascimento' => '1999-11-23', 'usuario' => 'maria.oliveira'],
                    ['id' => 4, 'nome' => 'Barbara faria', 'data_nascimento' => '2000-11-30', 'usuario' => 'Barbara.faria'],
                ];

                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $search = $_GET['search'];
                    $alunos = array_filter($alunos, function($aluno) use ($search) {
                        // Verifica se o nome contém o texto de busca
                        return stripos($aluno['nome'], $search) !== false;
                    });
                }

                // Ordenar a lista de alunos por nome em ordem alfabética
                usort($alunos, function($a, $b) {
                    return strcmp($a['nome'], $b['nome']);
                });
                ?>

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
