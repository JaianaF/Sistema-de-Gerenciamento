<!DOCTYPE html>
<html>
<head>
    <title>Editar Turma</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/js/scripts.js" defer></script>
</head>
<body>
    <h1>Editar Turma</h1>
    <form method="POST" action="/turmas/edit/<?php echo $turmaData['id']; ?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($turmaData['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label>Descrição:</label>
        <input type="text" name="descricao" value="<?php echo htmlspecialchars($turmaData['descricao'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label>Tipo:</label>
        <input type="text" name="tipo" value="<?php echo htmlspecialchars($turmaData['tipo'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
