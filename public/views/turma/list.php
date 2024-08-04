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

        <!-- Formulário de busca -->
        <form method="get" action="">
            <label for="search">Buscar:</label>
            <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" placeholder="Digite o nome da turma ou tipo">
            <button type="submit">Buscar</button>
        </form>

        <?php 
        // Simulação de dados de turmas
        $turmas = [
            ['id' => 1, 'nome' => 'Matemática Avançada', 'descricao' => 'Curso avançado de matemática', 'tipo' => 'Presencial'],
            ['id' => 2, 'nome' => 'Programação em PHP', 'descricao' => 'Curso de programação em PHP', 'tipo' => 'Online'],
            ['id' => 3, 'nome' => 'História Mundial', 'descricao' => 'Curso sobre história mundial', 'tipo' => 'Presencial'],
            ['id' => 4, 'nome' => 'Química Orgânica', 'descricao' => 'Curso sobre química orgânica', 'tipo' => 'Presencial'],
            ['id' => 5, 'nome' => 'Biologia Celular', 'descricao' => 'Curso sobre biologia celular', 'tipo' => 'Online'],
            ['id' => 6, 'nome' => 'Física Moderna', 'descricao' => 'Curso sobre física moderna', 'tipo' => 'Presencial'],
            ['id' => 7, 'nome' => 'Literatura Brasileira', 'descricao' => 'Curso sobre literatura brasileira', 'tipo' => 'Online'],
        ];

        // Verificar se há um termo de busca e filtrar a lista
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $turmas = array_filter($turmas, function($turma) use ($search) {
                // Verifica se o nome, tipo ou ID contém o texto de busca
                return stripos($turma['nome'], $search) !== false || 
                       stripos($turma['tipo'], $search) !== false || 
                       strpos($turma['id'], $search) !== false;
            });
        }

        usort($turmas, function($a, $b) {
            return strcmp($a['nome'], $b['nome']);
        });

        $items_per_page = 5;
        $total_items = count($turmas);
        $total_pages = ceil($total_items / $items_per_page);

        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $current_page = max(min($current_page, $total_pages), 1);

        $offset = ($current_page - 1) * $items_per_page;

        $turmas_paginated = array_slice($turmas, $offset, $items_per_page);
        ?>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($turmas_paginated)): ?>
                    <?php foreach ($turmas_paginated as $turma): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($turma['nome']); ?></td>
                            <td><?php echo htmlspecialchars($turma['descricao']); ?></td>
                            <td><?php echo htmlspecialchars($turma['tipo']); ?></td>
                            <td class="action-buttons">
                                <a href="/views/turma/form.php?id=<?php echo $turma['id']; ?>">Editar</a>
                                <a href="/actions/turma_delete.php?id=<?php echo $turma['id']; ?>" class="delete">Deletar</a>
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

        <!-- Navegação de páginas -->
        <div class="pagination">
            <?php if ($total_pages > 1): ?>
                <ul>
                    <?php if ($current_page > 1): ?>
                        <li><a href="?page=1<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Primeira</a></li>
                        <li><a href="?page=<?php echo $current_page - 1; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Anterior</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li><a href="?page=<?php echo $i; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>" <?php echo $i == $current_page ? 'class="active"' : ''; ?>><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <li><a href="?page=<?php echo $current_page + 1; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Próxima</a></li>
                        <li><a href="?page=<?php echo $total_pages; ?><?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Última</a></li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
