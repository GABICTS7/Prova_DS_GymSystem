<?php
session_start();

// Verificar se o administrador está logado
if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    header("Location: loginadm.php");
    exit();
}

include('conexao.php'); // Incluindo a conexão com o banco de dados

// Verificar se o ID da aula foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar os dados da aula com o ID fornecido
    $sql = "SELECT * FROM aulas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $aula = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Atualizar os dados da aula no banco de dados
        $nome = $_POST['nome'];
        $horario = $_POST['horario'];
        $professor_id = $_POST['professor_id'];

        $update_sql = "UPDATE aulas SET nome = ?, horario = ?, professor_id = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssii", $nome, $horario, $professor_id, $id);

        if ($update_stmt->execute()) {
            // Redirecionar após o sucesso
            header("Location: index.php?sucesso=Aula atualizada com sucesso!");
        } else {
            echo "Erro ao atualizar os dados da aula.";
        }
    }
} else {
    echo "ID da aula não encontrado!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aula</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Editar Aula</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome da Aula:</label>
            <input type="text" name="nome" value="<?= $aula['nome']; ?>" required>
        </div>
        <div class="form-group">
            <label for="horario">Horário:</label>
            <input type="text" name="horario" value="<?= $aula['horario']; ?>" required>
        </div>
        <div class="form-group">
            <label for="professor_id">Professor:</label>
            <select name="professor_id" required>
                <?php
                // Buscando todos os professores para exibir no select
                $professores_sql = "SELECT id, nome FROM professores";
                $professores_result = $conn->query($professores_sql);
                while ($professor = $professores_result->fetch_assoc()) {
                    echo "<option value='" . $professor['id'] . "' " . ($aula['professor_id'] == $professor['id'] ? 'selected' : '') . ">" . $professor['nome'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</body>
</html>
