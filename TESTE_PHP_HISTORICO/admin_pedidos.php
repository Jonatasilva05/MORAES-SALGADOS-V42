<?php
session_start();
require_once('./config.php');

// Verificação de autenticação do administrador (a ser implementada)

// Query para buscar todos os pedidos confirmados
$sql = "SELECT id, user_name, user_email, endereco, numero, bairro, cidade, product, quantity_type, quantity, flavor, order_date, status FROM confirmed_orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/admin_pedidos.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Pedidos Confirmados - Admin</title>
</head>
<body>
    <div class="container">
        <h1>Pedidos Confirmados - Admin</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
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
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
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
                                <a href="admin_excluir_pedido.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este pedido?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <form action="executar_script_python.php" method="post">
                <button type="submit" name="action" value="processar_pedidos">Processar Pedidos (Python)</button>
            </form>
        <?php else: ?>
            <p>Nenhum pedido confirmado encontrado.</p>
        <?php endif; ?>
        <br>
        <a href="./admin_index.php">Voltar para o Menu</a>
    </div>
</body>
</html>
<?php
$conn->close();
?>
