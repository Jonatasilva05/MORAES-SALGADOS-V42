<!--update_order.php-->

<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $quantity = intval($_POST['quantity']);

    $stmt = $conn->prepare("UPDATE orders SET quantity = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("iii", $quantity, $id, $_SESSION['user_id']);
    $stmt->execute();

    header("Location: user_lista.php");
    exit();
} else {
    header("Location: user_lista.php");
    exit();
}
?>