<?php
session_start();

// Verificar se o administrador está logado
if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    header("Location: loginadm.php");
    exit();
}

include('conexao.php'); // Incluindo a conexão com o banco de dados

// Verificar se o ID do professor foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar os dados do professor com o ID fornecido
    $sql = "SELECT * FROM professores WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $professor = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Atualizar os dados do professor no banco de dados
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        $update_sql = "UPDATE professores SET nome = ?, email = ?, cpf = ?, telefone = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssssi", $nome, $email, $cpf, $telefone, $id);

        if ($update_stmt->execute()) {
            // Redirecionar após o sucesso
            header("Location: index.php?sucesso=Professor atualizado com sucesso!");
        } else {
            echo "Erro ao atualizar os dados do professor.";
        }
    }
} else {
    echo "ID do professor não encontrado!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Professor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Editar Professor</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?= $professor['nome']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $professor['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" value="<?= $professor['cpf']; ?>" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" value="<?= $professor['telefone']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</body>
</html>
