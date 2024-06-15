<?php

session_start();
require_once('./config.php');

    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 1) {
        header("Location: ../login.php");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <!--IMAGEM ABA-->
   <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Painel de Administração</title>
    
</head>
<body>
    <div class="container">
        <h1>Painel de Administração</h1>
        <h2>Cadastrar Novo Usuário</h2>
        <form action="admin_register.php" method="post">
            <input type="text" name="name" placeholder="Nome" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Cadastrar Usuário</button>
        </form>
        <h2>Cadastrar Novo Administrador</h2>
        <form action="admin_register.php" method="post">
            <input type="text" name="name" placeholder="Nome" required>
            <input type="text" name="email" placeholder="Email (Opcional)">
            <input type="password" name="password" placeholder="Senha" required>
            <input type="hidden" name="is_admin" value="1">
            <button type="submit">Cadastrar Administrador</button>
        </form>
        <br>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>
