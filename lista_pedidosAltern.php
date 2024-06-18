<?php
session_start();
require_once('./PHP/config.php');



// Query para selecionar todos os pedidos ordenados por data de pedido
$sql = "SELECT id, user_name, user_email, endereco, numero, bairro, cidade, product, quantity_type, quantity, flavor, order_date, status 
        FROM confirmed_orders 
        ORDER BY order_date DESC";

$result = $conn->query($sql);

// Array para armazenar os pedidos por status
$pedidos = [
    'pending' => [],
    'accepted' => [],
    'generating' => [],
    'generated' => [],
    'out_for_delivery' => [],
    'delivered' => [],
    'rejected' => [],
    'cancelled' => []
];

// Organizar os pedidos no array por status
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $status = $row['status'];
        $pedido = [
            'id' => $row['id'],
            'user_name' => htmlspecialchars($row['user_name']),
            'user_email' => htmlspecialchars($row['user_email']),
            'endereco' => htmlspecialchars($row['endereco']) . ", " . htmlspecialchars($row['numero']) . ", " . htmlspecialchars($row['bairro']) . ", " . htmlspecialchars($row['cidade']),
            'product' => htmlspecialchars($row['product']),
            'quantity_type' => $row['quantity_type'] == 'unit' ? 'Unidade' : htmlspecialchars($row['quantity_type']),
            'quantity' => htmlspecialchars($row['quantity']),
            'flavor' => flavorName($row['flavor']),
            'order_date' => htmlspecialchars($row['order_date']),
        ];

        // Adicionar o pedido ao array correspondente ao status
        $pedidos[$status][] = $pedido;
    }
}

function flavorName($flavor){
    switch ($flavor){
        case 1: return "Coxinha";
        case 2: return "Salsicha";
        case 3: return "Risoles";
        case 4: return "Esfirra";
        case 5: return "Bolinho";
        case 6: return "Croquete";
        default: return "Outro";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/admin_lista.css">
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">
    <title>Pedidos Confirmados</title>
</head>
<body>
    <div class="container">
        <h1>Pedidos Confirmados</h1>
        
        <?php foreach ($pedidos as $status => $listaPedidos): ?>
            <?php if (!empty($listaPedidos)): ?>
                <h2><?php echo statusName($status); ?></h2>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaPedidos as $pedido): ?>
                            <tr>
                                <td><?php echo $pedido['user_name']; ?></td>
                                <td><?php echo $pedido['user_email']; ?></td>
                                <td>
                                    <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode($pedido['endereco']); ?>" target="_blank">
                                        <?php echo $pedido['endereco']; ?>
                                    </a>
                                </td>
                                <td><?php echo $pedido['product']; ?></td>
                                <td><?php echo $pedido['quantity_type']; ?></td>
                                <td><?php echo $pedido['quantity']; ?></td>
                                <td><?php echo $pedido['flavor']; ?></td>
                                <td><?php echo $pedido['order_date']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endforeach; ?>

        <br>
        <a href="./dashboard.php">Voltar para o Menu</a>
    </div>
</body>
</html>

<?php
function statusName($status){
    switch ($status){
        case 'pending': return "Pedidos Pendentes";
        case 'accepted': return "Pedidos Aceitos";
        case 'generating': return "Pedidos em Processamento";
        case 'generated': return "Pedidos Gerados";
        case 'out_for_delivery': return "Pedidos em Entrega";
        case 'delivered': return "Pedidos Recebidos";
        case 'rejected': return "Pedidos Rejeitados";
        case 'cancelled': return "Pedidos Cancelados";
        default: return "Desconhecido";
    }
}
?>
