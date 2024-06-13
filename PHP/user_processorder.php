<!--process_order.php-->

<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$product = $_POST['product'];
$quantity_type = $_POST['quantity_type'];
$quantity = ($quantity_type == 'unit') ? $_POST['unit_quantity'] : $_POST['combo_quantity'];
$flavor = $_POST['flavor'];

// Verifica se os campos obrigatórios estão preenchidos
if (empty($product) || empty($quantity)) {
    echo "Todos os campos são obrigatórios!";
    exit();
}

// Insere o pedido no banco de dados
$sql = "INSERT INTO orders (user_id, product, quantity_type, quantity, flavor) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $user_id, $product, $quantity_type, $quantity, $flavor);

if ($stmt->execute()) {
    echo "Pedido feito com sucesso!";
    header("location: ./user_index.php");
} else {
    echo "Erro ao fazer o pedido: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
