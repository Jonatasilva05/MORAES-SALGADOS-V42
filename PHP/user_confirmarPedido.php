<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../login.php");
    exit();
}

if (!isset($_SESSION['user_id']) || !isset($_SESSION['endereco_entrega'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Query to fetch user details
$user_sql = "SELECT name, email FROM users WHERE id = ?";
$user_stmt = $conn->prepare($user_sql);
$user_stmt->bind_param("i", $user_id);
$user_stmt->execute();
$user_result = $user_stmt->get_result();
$user_row = $user_result->fetch_assoc();
$user_name = $user_row['name'];
$user_email = $user_row['email'];

$endereco_entrega = $_SESSION['endereco_entrega'];


$order_sql = "SELECT product, quantity_type, quantity, flavor, order_date FROM orders WHERE user_id = ?";
$order_stmt = $conn->prepare($order_sql);
$order_stmt->bind_param("i", $user_id);
$order_stmt->execute();
$order_result = $order_stmt->get_result();

$insert_sql = "INSERT INTO confirmed_orders (user_id, user_name, user_email, endereco, numero, bairro, cidade, product, quantity_type, quantity, flavor, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$insert_stmt = $conn->prepare($insert_sql);

while ($order_row = $order_result->fetch_assoc()) {
    $insert_stmt->bind_param(
        "issssssssiss",
        $user_id,
        $user_name,
        $user_email,
        $endereco_entrega['endereco'],
        $endereco_entrega['numero'],
        $endereco_entrega['bairro'],
        $endereco_entrega['cidade'],
        $order_row['product'],
        $order_row['quantity_type'],
        $order_row['quantity'],
        $order_row['flavor'],
        $order_row['order_date']
    );
    $insert_stmt->execute();
}


$delete_sql = "DELETE FROM orders WHERE user_id = ?";
$delete_stmt = $conn->prepare($delete_sql);
$delete_stmt->bind_param("i", $user_id);
$delete_stmt->execute();

unset($_SESSION['endereco_entrega']);

header("Location: user_confirmarEntrega.php");
exit();
?>
