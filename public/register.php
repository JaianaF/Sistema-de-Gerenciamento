<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="container">
        <h1>Registrar</h1>
        <?php if (isset($error)): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="post" action="/login.php">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
