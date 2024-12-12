
<?php
// Função para redirecionar com uma mensagem
function redirecionar($url, $mensagem) {
    $_SESSION['mensagem'] = $mensagem;
    header("Location: $url");
    exit();
}

// Verificar se o administrador já está logado
session_start();
if (isset($_SESSION['admin_logado']) && $_SESSION['admin_logado'] === true) {
    header("Location: index.php"); // Redireciona para a página inicial caso já esteja logado
    exit();
}

if (isset($_POST['login_adm'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Validação do login e senha
    if ($login === 'adm' && $senha === 'adm123') {
        $_SESSION['admin_logado'] = true;
        redirecionar('home.php', 'Bem-vindo ao painel de administração!');
    } else {
        redirecionar('loginadm.php', 'Credenciais inválidas!');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Login - Administrador</h1>
                
                <?php
                // Exibir mensagem de erro se houver
                if (isset($_SESSION['mensagem'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
                    unset($_SESSION['mensagem']);
                }
                ?>


                <form method="POST" action="loginadm.php">
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login_adm">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
