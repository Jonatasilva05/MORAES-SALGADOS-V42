<!--delete_order.php-->
<!--user_deleteorder.php-->

<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$order_id = $_GET['id'];


$sql = "DELETE FROM orders WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $order_id, $user_id);

if ($stmt->execute()) {
    header("Location: user_lista.php");
    exit();
} else {
    echo "Erro ao apagar o pedido: " . $stmt->error;
    header("Location: user_lista.php");
    exit();
}

$stmt->close();
$conn->close();
?>
