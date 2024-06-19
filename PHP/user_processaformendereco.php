<?php
session_start(); 
include_once("./config.php");

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit();
    }

$user_id = $_SESSION['user_id'];

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

$sql = "INSERT INTO enderecos_entrega (nome, endereco, numero, bairro, cidade, cep, telefone, whatsapp, ponto_referencia, moradia, bloco, numero_apt, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssii", $nome, $endereco, $numero, $bairro, $cidade, $cep, $telefone, $whatsapp, $pontoReferencia, $moradia, $bloco, $numeroApt, $user_id);

if ($stmt->execute()) {
    echo "<script>alert('Endereço Cadastrado com Sucesso!'); window.location = './user_lista.php';</script>";
} else {
    echo "Erro ao cadastrar endereço: " . $conn->error;
}

$stmt->close();
$conn->close();
?>