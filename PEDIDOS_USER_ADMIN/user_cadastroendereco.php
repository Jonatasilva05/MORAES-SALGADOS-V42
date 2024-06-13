<?php
session_start();
require_once('./PHP/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $telefone = $_POST['telefone'];
    $referencia = $_POST['referencia'];

    // Verificando se o usuário mora em um apartamento
    if (isset($_POST['moro_apt']) && $_POST['moro_apt'] == "on") {
        $bloco = isset($_POST['bloco']) ? $_POST['bloco'] : NULL;
        $num_apt = isset($_POST['num_apt']) ? $_POST['num_apt'] : NULL;
    } else {
        $bloco = NULL;
        $num_apt = NULL;
    }

    $sql = "INSERT INTO users_enderecos (user_id, nome, endereco, numero, bairro, cidade, cep, telefone, referencia, bloco, num_apt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssssss", $user_id, $nome, $endereco, $numero, $bairro, $cidade, $cep, $telefone, $referencia, $bloco, $num_apt);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Endereço cadastrado com sucesso.";
    } else {
        echo "Erro ao cadastrar endereço.";
    }

    $stmt->close();
    $conn->close();
}
?>