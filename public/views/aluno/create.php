<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <h1>Cadastrar Aluno</h1>
    <form method="post" action="/views/aluno/list.php">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento" required>
    <label for="usuario">Usuário:</label>
    <input type="text" id="usuario" name="usuario" required>
    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
