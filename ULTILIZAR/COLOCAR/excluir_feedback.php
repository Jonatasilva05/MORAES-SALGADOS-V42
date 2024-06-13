<?php
session_start();

// Verifica se o usuário está logado como administrador
if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Verifica se o ID do feedback foi enviado
if (!isset($_GET['id'])) {
    echo "ID do feedback não fornecido.";
    exit();
}

$feedback_id = $_GET['id'];

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro_usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Exclui o feedback do banco de dados
$sql = "DELETE FROM feedbacks WHERE id = $feedback_id";

if ($conn->query($sql) === TRUE) {
    echo "Feedback excluído com sucesso.";
} else {
    echo "Erro ao excluir feedback: " . $conn->error;
}

$conn->close();
?>
