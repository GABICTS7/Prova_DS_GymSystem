<?php
// Verifique se o usuário está autenticado
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'adm') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão - Academia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo personalizado para o sistema de academia */
        body {
            background: url('https://img.freepik.com/vetores-gratis/fundo-branco-abstrato_23-2148806276.jpg?semt=ais_hybrid');
            background-size: cover;
            font-family: 'Arial', sans-serif;
            position: relative;
        }

        body::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Ajuste a opacidade (0.5 = 50% transparente) */
            z-index: -1;
        }

        h1 {
            color:#ced4da;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-title {
            font-size: 1.5rem;
            color: #495057;
            text-transform: uppercase;
        }

        .btn-primary {
            background-color:black;
            border-color: black;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: black;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        table th, table td {
            text-align: left;
            padding: 12px;
            border: 1px solid #dee2e6;
        }

        table th {
            background-color: #343a40;
            color: white;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        /* Menu superior */
        .navbar {
            margin-bottom: 30px;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav a {
            color: white !important;
            font-weight: bold;
            padding: 10px 20px;
        }

        .navbar-nav a:hover {
            background-color: #343a40;
        }

        .container {
            margin-top: 30px;
        }

    </style>
</head>
<body>

    <!-- Menu superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index2.php">Academia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="listarAlunos.php">Listar Alunos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listarProfessores.php">Listar Professores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listarAulas.php">Listar Aulas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastroAluno.php">Cadastrar Aluno</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastroProfessor.php">Cadastrar Professor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastroAula.php">Cadastrar Aula</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editarAluno.php">Editar Aluno</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editarProfessor.php">Editar Professor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editarAula.php">Editar Aula</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deleteAluno.php">Excluir Aluno</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deleteProfessor.php">Excluir Professor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deleteAula.php">Excluir Aula</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo da página -->
    <div class="container">
        <h1>Bem-vindo ao Sistema de Gestão da Academia</h1>
        <!-- Aqui você pode incluir os formulários ou tabelas de exibição conforme necessário -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
