<!--update_order.php-->

<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['key']) && isset($_POST['quantity'])) {
    $key = $_GET['key'];
    $quantity = intval($_POST['quantity']);

    if (isset($_SESSION['orders'][$key])) {
        $_SESSION['orders'][$key]['quantity'] = $quantity;
    }
    header("Location: user_lista.php");
    exit();
} else {
    header("Location: user_lista.php");
    exit();
}
?>
