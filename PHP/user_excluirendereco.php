<?php

include_once("./config.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $endereco_id = $_GET['id'];

    $sql = "DELETE FROM enderecos_entrega WHERE id=$endereco_id";

    if ($conn->query($sql) === TRUE) {
        echo "Endereço excluído com sucesso!";
        header("Location: ./user_enderecoentrega.php");
    } else {
        echo "Erro ao excluir o endereço: " . $conn->error;
    }

    $conn->close();
    } else {
        header("Location: index.php");
        exit();
    }
?>
