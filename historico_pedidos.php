<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Query para buscar o histórico completo de pedidos do usuário
$sql = "SELECT id, product, quantity_type, quantity, flavor, order_date, status FROM order_history WHERE user_id = ? ORDER BY order_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/user_lista.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Meu Histórico de Pedidos</title>
</head>
<body>
    <div class="container">
        <h1>Meu Histórico de Pedidos</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Tipo de Quantidade</th>
                        <th>Quantidade</th>
                        <th>Sabor</th>
                        <th>Data/Hora do Pedido</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['product']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td>
                                <?php 
                                if ($row['flavor'] == 1) {
                                    echo "Coxinha";
                                } elseif ($row['flavor'] == 2) {
                                    echo "Bolinho";
                                } elseif ($row['flavor'] == 3) {
                                    echo "Risoles";
                                } elseif ($row['flavor'] == 4) {
                                    echo "Esfirra";
                                } elseif ($row['flavor'] == 5) {
                                    echo "Salsicha";
                                } elseif ($row['flavor'] == 6) {
                                    echo "Croquete";
                                } else {
                                    echo htmlspecialchars($row['flavor']);
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você ainda não tem nenhum pedido no histórico.</p>
        <?php endif; ?>
        <br>
        <a href="./user_index.php">Voltar para o Menu</a>
    </div>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
