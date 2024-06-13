<?php
session_start();
require_once('./PHP/config.php');


// Atualiza o status do pedido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $action = $_POST['action'];
    $status = ($action == 'accept') ? 'accepted' : 'denied';

    $sql = "UPDATE admin_pedidos SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $order_id);
    $stmt->execute();

    if ($status == 'accepted') {
        // Limpa os pedidos do usuário
        $sql = "DELETE FROM orders WHERE user_id = (SELECT user_id FROM admin_pedidos WHERE id = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
    }

    // Notifica o usuário
    $user_id = $_POST['user_id'];
    $notification = ($status == 'accepted') ? 'Pedido em produção' : 'Pedido negado';

    // Salva a notificação na sessão do usuário
    $sql = "UPDATE users SET notification = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $notification, $user_id);
    $stmt->execute();

    $_SESSION['notification'] = $notification;

    header('Location: admin_pedidos.php');
    exit;
}

$sql = "SELECT ao.id, ao.user_id, ao.order_details, ao.address_id, u.name, u.email, ue.endereco, ue.numero, ue.bairro, ue.cidade, ue.cep, ue.telefone 
        FROM admin_pedidos ao
        JOIN users u ON ao.user_id = u.id
        JOIN users_enderecos ue ON ao.address_id = ue.id
        WHERE ao.status = 'pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./PHP/CSS/user_lista.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Administração de Pedidos</title>
</head>
<body>
    <div class="container">
        <h1>Administração de Pedidos</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th>Detalhes do Pedido</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['order_details']); ?></td>
                            <td><?php echo htmlspecialchars($row['endereco']) . ", " . htmlspecialchars($row['numero']) . " - " . htmlspecialchars($row['bairro']) . ", " . htmlspecialchars($row['cidade']) . " - " . htmlspecialchars($row['cep']); ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                    <button type="submit" name="action" value="accept">Aceitar</button>
                                    <button type="submit" name="action" value="deny">Negar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Não há pedidos pendentes.</p>
        <?php endif; ?>
        <br>
        <a href="user_index.php">Voltar ao Menu Principal</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
