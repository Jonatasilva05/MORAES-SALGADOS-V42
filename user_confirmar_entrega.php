<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);

    // Atualiza o status do pedido para entregue
    $sql = "UPDATE confirmed_orders SET status = 'delivered' WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $order_id, $user_id);
    $stmt->execute();
    $stmt->close();

    // Redireciona de volta para a página de pedidos do usuário
    header("Location: user_pedidos.php");
    exit();
}

// Caso não haja order_id enviado por POST, redireciona para a página de pedidos
header("Location: user_pedidos.php");
exit();
?>
