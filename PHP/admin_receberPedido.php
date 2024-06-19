<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../login.php");
    exit();
}

// Query para selecionar os pedidos confirmados, incluindo os cancelados pelo usuário
$sql = "SELECT id, user_name, user_email, endereco, numero, bairro, cidade, product, quantity_type, quantity, flavor, order_date, status 
        FROM confirmed_orders 
        ORDER BY order_date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/admin_user.css">
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
                                <?php 
                                $endereco_completo = htmlspecialchars($row['endereco']) . ", " . htmlspecialchars($row['numero']) . ", " . htmlspecialchars($row['bairro']) . ", " . htmlspecialchars($row['cidade']);
                                ?>
                                <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode($endereco_completo); ?>" target="_blank"><?php echo htmlspecialchars($endereco_completo); ?></a>
                            </td>
                            <td><?php echo htmlspecialchars($row['product']); ?></td>
                            <td>
                                <?php 
                                if ($row['quantity_type'] == 'unit') {
                                    echo 'Unidade';
                                } else {
                                    echo htmlspecialchars($row['quantity_type']);
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td>
                                <?php 
                                switch ($row['flavor']) {
                                    case 1: echo "Coxinha"; break;
                                    case 2: echo "Bolinho"; break;
                                    case 3: echo "Risoles"; break;
                                    case 4: echo "Esfirra"; break;
                                    case 5: echo "Salsicha"; break;
                                    case 6: echo "Croquete"; break;
                                    default: echo htmlspecialchars($row['flavor']); break;
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                            <td>
                                <?php 
                                $status_pt = '';
                                switch ($row['status']) {
                                    case 'pending':
                                        $status_pt = 'Aguardando Resposta do Vendedor';
                                        break;
                                    case 'accepted':
                                        $status_pt = 'Pedido Aceito';
                                        break;
                                    case 'generating':
                                        $status_pt = 'Gerando Pedido';
                                        break;
                                    case 'generated':
                                        $status_pt = 'Pedido Gerado';
                                        break;
                                    case 'out_for_delivery':
                                        $status_pt = 'Saiu para Entrega';
                                        break;
                                    case 'delivered':
                                        $status_pt = 'Pedido Recebido';
                                        break;
                                    case 'rejected':
                                        $status_pt = 'Pedido Rejeitado';
                                        break;
                                    case 'cancelled':
                                        $status_pt = 'Pedido Cancelado';
                                        break;
                                    default:
                                        $status_pt = htmlspecialchars($row['status']);
                                        break;
                                }
                                echo $status_pt;
                                ?>
                            </td>
                            <td>
                                <?php if ($row['status'] != 'delivered' && $row['status'] != 'rejected' && $row['status'] != 'cancelled'): ?>
                                    <form action="admin_processaPedido.php" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                        <select name="action">
                                            <?php if ($row['status'] == 'pending'): ?>
                                                <option value="accept">Aceitar</option>
                                                <option value="reject">Rejeitar</option>
                                            <?php elseif ($row['status'] == 'accepted'): ?>
                                                <option value="generating">Gerando Pedido</option>
                                            <?php elseif ($row['status'] == 'generating'): ?>
                                                <option value="generated">Pedido Gerado</option>
                                            <?php elseif ($row['status'] == 'generated'): ?>
                                                <option value="out_for_delivery">Saiu para Entrega</option>
                                            <?php endif; ?>
                                        </select>
                                        <button type="submit">Confirmar</button>
                                    </form>
                                <?php else: ?>
                                    <span><?php echo $row['status'] == 'delivered' ? 'Entregue' : ($row['status'] == 'rejected' ? 'Negado' : 'Pedido Cancelado'); ?></span>
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
        <a href="./dashboard.php">Voltar para o Menu</a>
    </div>
</body>
</html>
<?php
$conn->close();
?>
