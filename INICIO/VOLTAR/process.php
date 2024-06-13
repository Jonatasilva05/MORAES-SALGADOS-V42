<?php
session_start();
require_once('config.php');

// Verificar se o usuário está logado e não é administrador
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] == 1) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $user_id, $product_id, $quantity);

    if ($stmt->execute()) {
        header("Location: order.php?success=1");
    } else {
        header("Location: order.php?error=1");
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando Pedido</title>
</head>
<body>
    <div class="container">
        <p>Processando pedido...</p>
    </div>
</body>
</html>
