<?php
require 'conexao.php'; // Arquivo de configuração para conexão com o banco de dados

// Consulta para obter todas as aulas
$sql_aulas = "SELECT * FROM aulas";
$stmt_aulas = $pdo->prepare($sql_aulas);
$stmt_aulas->execute();
$aulas = $stmt_aulas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='styleheest' href='style.css'>
</head>

<body>
<div class="container mt-5">
    <h2>Cadastro de Aulas</h2>
    
    <!-- Formulário de Cadastro de Aulas -->
    <form action="cadAula.php" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Aula</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horário</label>
            <input type="time" class="form-control" id="horario" name="horario" required>
        </div>
        <div class="mb-3">
            <label for="professor_id" class="form-label">Professor</label>
            <select class="form-control" id="professor_id" name="professor_id" required>
                <?php
                    // Consulta para buscar professores
                    $sql_professores = "SELECT * FROM professores";
                    $stmt_professores = $pdo->prepare($sql_professores);
                    $stmt_professores->execute();
                    $professores = $stmt_professores->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($professores as $professor) {
                        echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Aula</button>
    </form>

    <hr>

    <!-- Exibição das Aulas Cadastradas -->
    <h3 class="mt-5">Aulas Cadastradas</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Aula</th>
                <th>Horário</th>
                <th>Professor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($aulas) > 0): ?>
                <?php foreach ($aulas as $aula): ?>
                    <tr>
                        <td><?php echo $aula['id']; ?></td>
                        <td><?php echo htmlspecialchars($aula['nome']); ?></td>
                        <td><?php echo htmlspecialchars($aula['horario']); ?></td>
                        <td>
                            <?php
                                // Consulta para buscar o nome do professor
                                $sql_professor = "SELECT nome FROM professores WHERE id = :professor_id";
                                $stmt_professor = $pdo->prepare($sql_professor);
                                $stmt_professor->execute([':professor_id' => $aula['professor_id']]);
                                $professor = $stmt_professor->fetch(PDO::FETCH_ASSOC);
                                echo $professor['nome'];
                            ?>
                        </td>
                        <td>
                            <a href="editAula.php?id=<?php echo $aula['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="deleteAula.php?id=<?php echo $aula['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja excluir esta aula?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhuma aula cadastrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Voltar à página inicial</a>
</div>
</body>
</html>
