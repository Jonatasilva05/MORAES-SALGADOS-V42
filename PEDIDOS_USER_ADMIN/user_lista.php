<?php
session_start();
require_once('./PHP/config.php');

$user_id = $_SESSION['user_id'];

// Consulta para obter os pedidos do usuário
$sql = "SELECT id, product, quantity_type, quantity, flavor, order_date FROM orders WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$total_geral = 0; // Inicializa o total geral como 0

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./PHP/CSS/user_lista.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Minha Lista de Pedidos</title>
</head>
<body>
    <div class="container">
        <h1>Minha Lista de Pedidos</h1>
        <?php if ($result->num_rows > 0): ?>
            <table> 
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Sabor</th>
                        <th>Tipo de Quantidade</th>
                        <th>Quantidade</th>
                        <th>Total por Produto</th>
                        <th>Data/Hora do Pedido</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
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
                            <td><?php echo htmlspecialchars($row['product']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <?php
                            //MÉTODO PARA CALCULO DOS PRODUTOS
                            $total_produto = 0;
                            if ($row['quantity_type'] == 'unit') {
                                $total_produto = $row['quantity'] * 5;
                            } elseif ($row['quantity_type'] == 'combo') {
                                $total_produto = $row['quantity'] + 30;
                            }
                            $total_geral += $total_produto; //MOSTRA O VALOR FINAL DA LISTA DE PEDIDOS  
                            ?>
                            <td><?php echo "R$ " . number_format($total_produto, 2, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                            <td>
                                <br>
                                <a href="user_editlista.php?id=<?php echo $row['id'];?>">
                                    <button class="noselect">
                                        <span class="text">Editar</span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                            </svg>
                                        </span>
                                    </button>
                                </a>
                                <a href="user_deletelista.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar este pedido?');">
                                    <button class="noselect">
                                        <span class="text">Apagar</span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </a>                                
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <p>Total Geral: <?php echo "R$ " . number_format($total_geral, 2, ',', '.'); ?></p>
            <form action="user_deletelistaint.php" method="post">
                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar todos os pedidos?');">Apagar Todos os Pedidos</button>
            </form>
            <form action="user_selectaddress.php" method="get">
                <button type="submit">Solicitar Pedido</button>
            </form>
        <?php else: ?>
            <p>Você ainda não fez nenhum pedido.</p>
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

