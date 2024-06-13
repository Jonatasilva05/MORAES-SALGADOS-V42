<!--delete_all_orders.php-->
<!--user_deleteallorders.php-->

<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Apaga todos os pedidos do usuário
$sql = "DELETE FROM orders WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    header("Location: user_lista.php");
    exit();
} else {
    echo "Erro ao apagar todos os pedidos: " . $stmt->error;
    header("Location: user_lista.php");
    exit();
}

$stmt->close();
$conn->close();
?>