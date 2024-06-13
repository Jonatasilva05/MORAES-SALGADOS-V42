<?php
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

// Recupera os dados do formulário
$tipo = $_POST['tipo'];
$mensagem = $_POST['mensagem'];
$rating = $_POST['rating'];

// Insere o feedback no banco de dados
$sql = "INSERT INTO feedbacks (tipo, mensagem, rating) VALUES ('$tipo', '$mensagem', '$rating')";

if ($conn->query($sql) === TRUE) {
    echo "Feedback enviado com sucesso.";
} else {
    echo "Erro ao enviar feedback: " . $conn->error;
}

$conn->close();
?>
