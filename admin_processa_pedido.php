<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id']) && isset($_POST['action'])) {
    $order_id = intval($_POST['order_id']);
    $action = $_POST['action'];

    $valid_actions = ['accept', 'generating', 'generated', 'out_for_delivery', 'reject', 'cancel'];
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
    } elseif ($action == 'cancel') {
        $status = 'cancelled';
    }

    $sql = "UPDATE confirmed_orders SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $order_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin_receberPedido.php");
    exit();
} else {
    header("Location: admin_receberPedido.php");
    exit();
}
?>
