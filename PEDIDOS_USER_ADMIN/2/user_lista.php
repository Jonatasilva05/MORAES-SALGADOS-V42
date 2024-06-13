<?php
session_start();
require_once('./PHP/config.php');



$sql = "SELECT id, product, quantity_type, quantity, flavor, order_date FROM orders WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Verifica notificações de pedidos
$notification = '';
if (isset($_SESSION['notification'])) {
    $notification = $_SESSION['notification'];
    unset($_SESSION['notification']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./PHP/CSS/user_lista.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Seus Pedidos</title>
</head>
<body>
    <div class="container">
        <h1>Seus Pedidos</h1>
        <?php if (!empty($notification)): ?>
            <p><?php echo htmlspecialchars($notification); ?></p>
        <?php endif; ?>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Tipo de Quantidade</th>
                        <th>Quantidade</th>
                        <th>Sabor</th>
                        <th>Data do Pedido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['product']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($row['flavor']); ?></td>
                            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você não tem pedidos no momento.</p>
        <?php endif; ?>
        <br>
        <a href="user_index.php">Voltar ao Menu Principal</a>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
