<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_POST['order_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$order_id = $_POST['order_id'];

// Verificar se o pedido pertence ao usuário atual para evitar ações maliciosas
$sql_check = "SELECT id FROM confirmed_orders WHERE id = ? AND user_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ii", $order_id, $user_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows === 0) {
    // Pedido não encontrado ou não pertence ao usuário atual
    header("Location: user_pedidos.php");
    exit();
}

// Cancelar o pedido (atualizar o status para 'cancelled')
$sql_cancel = "UPDATE confirmed_orders SET status = 'cancelled' WHERE id = ?";
$stmt_cancel = $conn->prepare($sql_cancel);
$stmt_cancel->bind_param("i", $order_id);

if ($stmt_cancel->execute()) {
    // Redirecionar de volta para a página de pedidos com mensagem de sucesso
    $_SESSION['message'] = "Pedido cancelado com sucesso.";
    header("Location: user_pedidos.php");
} else {
    // Em caso de erro, redirecionar com mensagem de erro
    $_SESSION['error'] = "Erro ao cancelar o pedido. Por favor, tente novamente.";
    header("Location: user_pedidos.php");
}

$stmt_check->close();
$stmt_cancel->close();
$conn->close();
?>