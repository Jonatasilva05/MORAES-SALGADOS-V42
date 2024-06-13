<?php
session_start();
require_once('./PHP/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $address_id = $_POST['address_id'];

    // Obtém os detalhes do pedido
    $sql = "SELECT product, quantity_type, quantity, flavor, order_date FROM orders WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $order_details = [];
    while ($row = $result->fetch_assoc()) {
        $order_details[] = $row;
    }
    $stmt->close();

    $order_details_json = json_encode($order_details);

    // Insere o pedido na tabela admin_pedidos
    $sql = "INSERT INTO admin_pedidos (user_id, order_details, address_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $user_id, $order_details_json, $address_id);
    $stmt->execute();
    $stmt->close();

    // Redireciona o usuário para uma página de confirmação
    header('Location: order_confirmation.php');
    exit;
}
?>
