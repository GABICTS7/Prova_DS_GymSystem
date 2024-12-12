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

    // Deletar a aula do banco de dados
    $sql = "DELETE FROM aulas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirecionar após o sucesso
        header("Location: index.php?sucesso=Aula excluída com sucesso!");
    } else {
        echo "Erro ao excluir a aula.";
    }
} else {
    echo "ID da aula não encontrado!";
    exit();
}
?>
