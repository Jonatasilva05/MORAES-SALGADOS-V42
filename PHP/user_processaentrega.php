<?php
session_start();
require_once('./config.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: login.php");
    exit();
}

// Verificar se o método de requisição é POST e se o endereço foi selecionado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["endereco"])) {
    // Recuperar o ID do endereço selecionado
    $endereco_id = $_POST["endereco"];

    // Consulta para obter as informações do endereço selecionado
    $sql = "SELECT * FROM enderecos_entrega WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $endereco_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o endereço foi encontrado
    if ($result->num_rows > 0) {
        // Armazenar as informações do endereço na sessão
        $_SESSION['endereco_entrega'] = $result->fetch_assoc();
    }

    $stmt->close();

    // Redirecionar de volta para a página user_index.php
    header("Location: user_lista.php");
    exit();
} else {
    // Se não houver endereço selecionado, redirecionar para a página anterior
    header("Location: user_escolherendereco.php");
    exit();
}
?>
