<?php
session_start();
require_once('./PHP/config.php');

$user_id = $_SESSION['user_id'];

// Consulta para obter os endereços do usuário
$sql = "SELECT id, nome, endereco, numero, bairro, cidade, cep, telefone FROM users_enderecos WHERE user_id = ?";
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
    <link rel="stylesheet" href="./PHP/CSS/user_lista.css">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Selecionar Endereço</title>
</head>
<body>
    <div class="container">
        <h1>Selecionar Endereço de Entrega</h1>
        <?php if ($result->num_rows > 0): ?>
            <form action="user_confirmorder.php" method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>CEP</th>
                            <th>Telefone</th>
                            <th>Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                                <td><?php echo htmlspecialchars($row['endereco']); ?></td>
                                <td><?php echo htmlspecialchars($row['numero']); ?></td>
                                <td><?php echo htmlspecialchars($row['bairro']); ?></td>
                                <td><?php echo htmlspecialchars($row['cidade']); ?></td>
                                <td><?php echo htmlspecialchars($row['cep']); ?></td>
                                <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                                <td>
                                    <input type="radio" name="address_id" value="<?php echo $row['id']; ?>">
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <button type="submit">Confirmar Pedido</button>
            </form>
            <br>
            <a href="user_addaddress.php">Cadastrar Novo Endereço</a>
        <?php else: ?>
            <p>Você ainda não cadastrou nenhum endereço.</p>
            <a href="user_addaddress.php">Cadastrar Novo Endereço</a>
        <?php endif; ?>
        <br>
        <a href="user_lista.php">Voltar para a Lista de Pedidos</a>
    </div>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
