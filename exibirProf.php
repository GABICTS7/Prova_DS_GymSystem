<?php
require 'config.php'; // Arquivo de configuração para conexão com o banco de dados

// Consulta para obter todos os professores
$sql_professores = "SELECT * FROM professores";
$stmt_professores = $pdo->prepare($sql_professores);
$stmt_professores->execute();
$professores = $stmt_professores->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Professores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Professores</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($professores) > 0): ?>
                <?php foreach ($professores as $professor): ?>
                    <tr>
                        <td><?php echo $professor['id']; ?></td>
                        <td><?php echo htmlspecialchars($professor['nome']); ?></td>
                        <td><?php echo htmlspecialchars($professor['especialidade']); ?></td>
                        <td><?php echo htmlspecialchars($professor['email']); ?></td>
                        <td>
                            <a href="editar_professor.php?id=<?php echo $professor['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="excluir_professor.php?id=<?php echo $professor['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja excluir este professor?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhum professor cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Voltar à página inicial</a>
</div>
</body>
</html>
