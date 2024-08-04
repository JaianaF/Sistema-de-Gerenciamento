<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="post" action="/index.php">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            <p>Não tem uma conta? <a href="/register.php">Registrar</a></p>
        </div>
    </div>
</body>
</html>
