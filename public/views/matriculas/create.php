<!DOCTYPE html>
<html>
<head>
    <title>Matricular Aluno</title>
    <link rel="stylesheet" href="/css/style.css">
   
</head>
<body>
    <h1>Matricular Aluno</h1>
    <form method="post" action="/views/matricula/list.php">
    <label for="aluno_id">Aluno:</label>
    <select id="aluno_id" name="aluno_id" required>
        <?php foreach ($alunos as $aluno): ?>
            <option value="<?php echo $aluno['id']; ?>"><?php echo htmlspecialchars($aluno['nome']); ?></option>
        <?php endforeach; ?>
    </select>
    <label for="turma_id">Turma:</label>
    <select id="turma_id" name="turma_id" required>
        <?php foreach ($turmas as $turma): ?>
            <option value="<?php echo $turma['id']; ?>"><?php echo htmlspecialchars($turma['nome']); ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Matricular</button>
</form>

</body>
</html>
