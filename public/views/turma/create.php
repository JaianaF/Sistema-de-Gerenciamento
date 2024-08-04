<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Turma</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/js/scripts.js" defer></script>
</head>
<body>
    <h1>Cadastrar Nova Turma</h1>
    <form method="post" action="/views/turma/list.php">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required>
    <label for="tipo">Tipo:</label>
    <input type="text" id="usuario" name="usuario" required>
    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
