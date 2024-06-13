<?php
include_once("./config.php");

// Receber os dados do formulário
$nome = $_POST['nome'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];
$whatsapp = $_POST['whatsapp'];
$pontoReferencia = $_POST['pontoReferencia'];
$moradia = $_POST['moradia'];
$bloco = isset($_POST['bloco']) ? $_POST['bloco'] : null;
$numeroApt = isset($_POST['numeroApt']) ? $_POST['numeroApt'] : null;

// Inserir os dados no banco de dados
$sql = "INSERT INTO enderecos_entrega (nome, endereco, numero, bairro, cidade, cep, telefone, whatsapp, ponto_referencia, moradia, bloco, numero_apt) VALUES ('$nome', '$endereco', '$numero', '$bairro', '$cidade', '$cep', '$telefone', '$whatsapp', '$pontoReferencia', '$moradia', '$bloco', '$numeroApt')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Endereço Cadastrado com Sucesso!'); window.location = './user_lista.php';</script>";
} else {
    echo "Erro ao cadastrar endereço: " . $conn->error;
}

// Fechar conexão
$conn->close();
?>