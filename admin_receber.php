<?php
session_start();
require_once('./config.php');

// Verificação de autenticação do administrador (a ser implementada)

// Query to fetch confirmed orders
$sql = "SELECT id, user_name, user_email, endereco, numero, bairro, cidade, product, quantity_type, quantity, flavor, order_date, status FROM confirmed_orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/admin_lista.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Pedidos Confirmados</title>
</head>
<body>
    <div class="container">
        <h1>Pedidos Confirmados</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome do Usuário</th>
                        <th>Email do Usuário</th>
                        <th>Endereço</th>
                        <th>Produto</th>
                        <th>Tipo de Quantidade</th>
                        <th>Quantidade</th>
                        <th>Sabor</th>
                        <th>Data/Hora do Pedido</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                            <td>
                                <?php echo htmlspecialchars($row['endereco']) . ", " . htmlspecialchars($row['numero']) . ", " . htmlspecialchars($row['bairro']) . ", " . htmlspecialchars($row['cidade']); ?>
                            </td>
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
                            <td>
                                <?php if ($row['status'] != 'delivered' && $row['status'] != 'rejected'): ?>
                                    <form action="admin_processa_pedido.php" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                        <?php if ($row['status'] == 'pending'): ?>
                                            <button type="submit" name="action" value="accept">Aceitar</button>
                                            <button type="submit" name="action" value="reject">Rejeitar</button>
                                        <?php elseif ($row['status'] == 'accepted'): ?>
                                            <button type="submit" name="action" value="generating">Confirmar e Gerar Pedido</button>
                                        <?php elseif ($row['status'] == 'generating'): ?>
                                            <button type="submit" name="action" value="generated">Pedido Gerado</button>
                                        <?php elseif ($row['status'] == 'generated'): ?>
                                            <button type="submit" name="action" value="out_for_delivery">Saiu para Entrega</button>
                                        <?php endif; ?>
                                    </form>
                                <?php else: ?>
                                    <span><?php echo $row['status'] == 'delivered' ? 'Entregue' : 'Negado'; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum pedido confirmado ainda.</p>
        <?php endif; ?>
        <br>
        <a href="./admin_index.php">Voltar para o Menu</a>
    </div>
</body>
</html>
<?php
$conn->close();
?>
