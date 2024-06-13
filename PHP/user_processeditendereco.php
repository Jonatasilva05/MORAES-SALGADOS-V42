<?php

include_once("./config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $endereco_id = $_POST['endereco_id'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $sql = "UPDATE enderecos_entrega SET endereco='$endereco', numero='$numero', bairro='$bairro', cidade='$cidade' WHERE id=$endereco_id";

    if ($conn->query($sql) === TRUE) {
        echo "Endereço atualizado com sucesso!";
        header("Location: ./user_enderecoentrega.php");
    } else {
        echo "Erro ao atualizar o endereço: " . $conn->error;
    }

    $conn->close();
    } else {
        header("Location: index.php");
        exit();
    }
?>