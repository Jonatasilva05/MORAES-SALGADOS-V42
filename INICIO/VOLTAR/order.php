<?php
session_start();
require_once('config.php');

// Verificar se o usuário está logado e não é administrador
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] == 1) {
    header("Location: ../index.php");
    exit();
}

// Produtos pré-definidos
$products = [
    ['id' => 1, 'sabor' => 'Coxinha'],
    ['id' => 2, 'sabor' => 'Kibe'],
    ['id' => 3, 'sabor' => 'Empada'],
    ['id' => 4, 'sabor' => 'Pastel'],
    ['id' => 5, 'sabor' => 'Esfirra'],
    ['id' => 6, 'sabor' => 'Bolinha de Queijo']
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Pedido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Fazer Pedido</h1>

        <!-- Primeiro formulário de pedido por unidade -->
        <?php foreach ($products as $product): ?>
            <form action="process.php" method="post">
                <h2>Pedido de <?php echo $product['sabor']; ?> por Unidade</h2>
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="order_type" value="unit">
                <label for="quantity_<?php echo $product['id']; ?>">Quantidade:</label>
                <input type="number" id="quantity_<?php echo $product['id']; ?>" name="quantity" required>
                <br>
                <button type="submit">Fazer Pedido</button>
            </form>
            <hr>
        <?php endforeach; ?>

        <!-- Formulário para pedidos por combo -->
        <?php foreach ($products as $product): ?>
            <form action="process.php" method="post">
                <h2>Pedido de Combo de <?php echo $product['sabor']; ?></h2>
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="order_type" value="combo">
                <label for="combo_quantity_<?php echo $product['id']; ?>">Quantidade de Combo:</label>
                <select id="combo_quantity_<?php echo $product['id']; ?>" name="quantity" required>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                </select>
                <br>
                <button type="submit">Fazer Pedido</button>
            </form>
            <hr>
        <?php endforeach; ?>
    </div>
</body>
</html>
