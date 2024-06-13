<?php
session_start();

// Verifica se o usuário está logado como administrador
if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'admin') {
    header("Location: login.php");
    exit();
}

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

// Consulta para obter todos os feedbacks
$sql = "SELECT * FROM feedbacks";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Sugestões, Avaliações e Reclamações</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Listar Sugestões, Avaliações e Reclamações</h2>
        <table>
            <tr>
                <th>Tipo</th>
                <th>Mensagem</th>
                <th>Avaliação</th>
                <th>Data de Envio</th>
                <th>Ações</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['tipo']}</td>";
                    echo "<td>{$row['mensagem']}</td>";
                    echo "<td>{$row['rating']}</td>";
                    echo "<td>{$row['data_envio']}</td>";
                    echo "<td><a href='excluir_feedback.php?id={$row['id']}'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum feedback encontrado</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
