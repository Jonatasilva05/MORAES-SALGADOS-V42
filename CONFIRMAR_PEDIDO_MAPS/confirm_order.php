<?php
include_once("config.php");

// Recebe o ID do pedido
$id = $_POST['id'];

// Atualiza o pedido para confirmado
$sql = "UPDATE pedidos SET confirmado = 1 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Pedido confirmado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<br>
<a href="admin.php">Voltar para a página de administração</a>