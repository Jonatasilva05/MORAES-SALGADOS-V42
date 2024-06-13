<?php
include_once("config.php");

// Recebe dados do formulário
$item = $_POST['item'];
$quantidade = $_POST['quantidade'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$referencia = $_POST['referencia'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];

// Insere o pedido no banco de dados
$sql = "INSERT INTO pedidos (item, quantidade, endereco, numero, referencia, bairro, cidade, cep, telefone) VALUES ('$item', $quantidade, '$endereco', '$numero', '$referencia', '$bairro', '$cidade', '$cep', '$telefone')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Pedido enviado com sucesso!")</script>';
    header("location ./index.php");
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<br>
