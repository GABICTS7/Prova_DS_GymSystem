<?php
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Página Inicial - MOVE+</title>
<!-- Link do Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
/* Estilo para o menu lateral */
body {
    background-color: rgb(58, 58, 58);
}

.sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: white;
    padding-top: 20px;
    background-size: cover;
    color: black;
}
.sidenav h2 {
    color: black;
    text-align: center;
    margin-bottom: 30px;
}
.sidenav a {
    padding: 10px 15px;
    text-decoration: none;
    font-size: 18px;
    color: black;
    display: block;
    transition: background-color 0.3s;
}
.sidenav a:hover {
    background-color: #f1f1f1;
}
.main-content {
    margin-left: 270px; /* Espaço para o menu lateral */
    padding: 20px;
}

/* Adicionando as cores ao texto */
#academia-name, #motivational-quote {
    color: white;
}

.logo-img {
    width: 100%;
    height: auto;
}

/* Dropdown */
.dropdown-btn {
    background-color: #fff;
    color: black;
    padding: 10px 15px;
    font-size: 18px;
    text-decoration: none;
    display: block;
    border: none;
    text-align: left;
}
.dropdown-btn:hover {
    background-color: #f1f1f1;
}

.dropdown-container {
    display: none;
    background-color: #fff;
    padding-left: 20px;
}

.dropdown-container a {
    font-size: 16px;
    color: black;
    padding: 10px 15px;
    text-decoration: none;
}

.dropdown-container a:hover {
    background-color: #f1f1f1;
}

.dropdown-container.show {
    display: block;
}
</style>
</head>
<body>

<!-- Menu Lateral -->
<div class="sidenav">
    <h2>Menu</h2>
    <a href="exibir.php">Tabela: Alunos, Professores</a>
    <a href="cadAluno.php">Cadastro aluno</a>
    <a href="cadProf.php">Cadastro professor</a>

    <!-- Editar Cadastro - Dropdown -->
    <a href="javascript:void(0);" class="dropdown-btn">Editar Cadastro</a>
    <div class="dropdown-container">
        <a href="editAluno.php">Editar Aluno</a>
        <a href="editprof.php">Editar Professor</a>
        <a href="editAula.php">Editar Aula</a>
        <a href="deleteAluno.php">Excluir Aluno</a>
        <a href="deleteProf.php">Excluir Professor</a>
        <a href="deleteAula.php">Excluir Aula</a>
    </div>

    <a href="cadAulas.php">Cadastrar aulas e ver grade de aulas</a>

    <!-- Logout -->
    <a href="logout.php">Sair</a>
</div>

<!-- Conteúdo Principal -->
<div class="main-content">
    <h1 class="text-center" id="academia-name">GYM SYSTEM - MOVE+</h1><br><br>

    <p class="text-center" id="motivational-quote">"Sua jornada para a saúde começa aqui!"</p>

    <div class="text-center">
        <img src="imgs/Logo.png" alt="Foto da Academia" class="logo-img">
    </div>
</div>

<!-- Link do Bootstrap JS e dependências -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script para o Dropdown -->
<script>
    var dropdown = document.querySelector('.dropdown-btn');
    var dropdownContent = document.querySelector('.dropdown-container');

    dropdown.addEventListener('click', function() {
        dropdownContent.classList.toggle('show');
    });
</script>

</body>
</html>
