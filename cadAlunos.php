<?php
require 'conexao.php'; // Arquivo de configuração para conexão com o banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];

    // Validação no servidor (verificando se os campos não estão vazios)
    if (empty($nome) || empty($data_nascimento) || empty($email)) {
        $erro = "Todos os campos são obrigatórios!";
    } else {
        // Insere o aluno no banco de dados
        $sql = "INSERT INTO alunos (nome, data_nascimento, email) VALUES (:nome, :data_nascimento, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            // Redireciona para a lista de alunos após o cadastro
            header('Location: exibir.php');
            exit;
        } else {
            $erro = "Erro ao cadastrar aluno.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="styleheest" href="style.css">
    <script>
        // Validação no lado do cliente
        function validarFormulario() {
            const nome = document.getElementById('nome').value;
            const dataNascimento = document.getElementById('data_nascimento').value;
            const email = document.getElementById('email').value;

            if (nome === '' || dataNascimento === '' || email === '') {
                alert('Todos os campos são obrigatórios!');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastrar Aluno</h2>
        <?php
        if (isset($erro)) {
            echo "<div class='alert alert-danger'>$erro</div>";
        }
        ?>
        <form method="POST" onsubmit="return validarFormulario()">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
