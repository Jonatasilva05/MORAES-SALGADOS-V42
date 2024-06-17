<?php
session_start();
require_once('./config.php');

// Verificação de autenticação do administrador (a ser implementada)

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id']) && isset($_POST['action'])) {
    $order_id = intval($_POST['order_id']);
    $action = $_POST['action'];

    $valid_actions = ['accept', 'generating', 'generated', 'out_for_delivery', 'reject'];
    if (!in_array($action, $valid_actions)) {
        header("Location: admin_receber.php");
        exit();
    }

    if ($action == 'accept') {
        $status = 'accepted';
    } elseif ($action == 'generating') {
        $status = 'generating';
    } elseif ($action == 'generated') {
        $status = 'generated';
    } elseif ($action == 'out_for_delivery') {
        $status = 'out_for_delivery';
    } elseif ($action == 'reject') {
        $status = 'rejected';
    }

    $sql = "UPDATE confirmed_orders SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $order_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin_receber.php");
    exit();
} else {
    header("Location: admin_receber.php");
    exit();
}
?>
