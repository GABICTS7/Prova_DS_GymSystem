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

    // Deletar o professor do banco de dados
    $sql = "DELETE FROM professores WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirecionar após o sucesso
        header("Location: index.php?sucesso=Professor excluído com sucesso!");
    } else {
        echo "Erro ao excluir o professor.";
    }
} else {
    echo "ID do professor não encontrado!";
    exit();
}
?>
