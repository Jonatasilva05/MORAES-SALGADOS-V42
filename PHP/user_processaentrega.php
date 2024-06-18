<?php
session_start();
require_once('./config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["endereco"])) {
    $endereco_id = $_POST["endereco"];

    $sql = "SELECT * FROM enderecos_entrega WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $endereco_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['endereco_entrega'] = $result->fetch_assoc();
    }

    $stmt->close();

    header("Location: user_lista.php");
    exit();
} else {
    header("Location: user_escolherendereco.php");
    exit();
}
?>
