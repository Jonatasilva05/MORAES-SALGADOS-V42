<?php
session_start();
require_once('./config.php');


// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Buscar informações do usuário logado
$user_id = $_SESSION['user_id'];
$is_admin = $_SESSION['is_admin'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Dashboard</h1>
        
        <?php if ($is_admin) { ?>
            <!-- Funcionalidades específicas para administradores -->
            <p>Você está logado como administrador.</p>
            <a href="admin_page.php">Página do Administrador</a>
        <?php } else { ?>
            <!-- Funcionalidades para usuários normais -->
            <p>Você está logado como usuário.</p>
            <a href="user_addlista.php" class="button">Fazer Pedido</a>
        <?php } ?>

        <br><br>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
