<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 0) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT id, product, quantity_type, quantity, flavor, order_date, status FROM confirmed_orders WHERE user_id = ? ORDER BY order_date DESC";
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
    <link rel="stylesheet" href="./CSS/admin_user.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Meus Pedidos</title>
</head>
<body>
    <div class="container">
        <h1>Meus Pedidos</h1>
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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
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
                                        $status_pt = 'Pendente';
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
                                <?php if ($row['status'] == 'pending'): ?>
                                    <span>Aguardando Resposta do Vendedor</span>
                                <?php elseif ($row['status'] == 'accepted' || $row['status'] == 'generating'): ?>
                                    <form action="user_cancelaPedido.php" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja cancelar o pedido?');">Cancelar Pedido</button>
                                    </form>
                                <?php elseif ($row['status'] == 'out_for_delivery'): ?>
                                    <form action="user_confirmarEntrega.php" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" onclick="return confirm('Confirma que recebeu o pedido?');">Confirmar Entrega</button>
                                    </form>
                                <?php elseif ($row['status'] == 'delivered'): ?>
                                    <span>Pedido Recebido</span>
                                <?php elseif ($row['status'] == 'rejected'): ?>
                                    <span>Pedido Rejeitado</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você não tem pedidos confirmados.</p>
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