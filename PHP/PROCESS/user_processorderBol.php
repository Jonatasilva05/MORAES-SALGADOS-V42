<!--process_order.php-->

<?php
session_start();
require_once('../config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../user_index.php");
    exit();
}


$user_id = $_SESSION['user_id'];
$product = $_POST['product1'];
$quantity_type = $_POST['quantity_type1'];
$quantity = ($quantity_type == 'unit') ? $_POST['unit_quantity1'] : $_POST['combo_quantity1'];
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
    header("Location: ../user_index.php");
} else {
    echo "Erro ao fazer o pedido: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
